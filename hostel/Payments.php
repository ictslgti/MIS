<?php
// hostel/Payments.php - Admin CRUD for hostel monthly fee payments
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../head.php';
require_once __DIR__ . '/../menu.php';
if (session_status() === PHP_SESSION_NONE) { session_start(); }

// Optional: restrict to admin/warden
if (!isset($_SESSION['user_type']) || !in_array($_SESSION['user_type'], ['ADM','WAR'])) {
  echo '<div class="alert alert-danger m-3">Access denied.</div>';
  require_once __DIR__ . '/../footer.php';
  exit;
}

// Determine warden gender if WAR
$wardenGender = null;
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'WAR' && !empty($_SESSION['user_name'])) {
  if ($st = mysqli_prepare($con, "SELECT staff_gender FROM staff WHERE staff_id=? LIMIT 1")) {
    mysqli_stmt_bind_param($st, 's', $_SESSION['user_name']);
    mysqli_stmt_execute($st);
    $rs = mysqli_stmt_get_result($st);
    if ($rs) { $r = mysqli_fetch_assoc($rs); if ($r && isset($r['staff_gender'])) { $wardenGender = $r['staff_gender']; } }
    mysqli_stmt_close($st);
  }
}

// Ensure table exists
mysqli_query($con, "CREATE TABLE IF NOT EXISTS hostel_fee_payments (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  allocation_id INT UNSIGNED NOT NULL,
  month_year CHAR(7) NOT NULL, -- YYYY-MM
  amount DECIMAL(10,2) NOT NULL,
  paid_on DATE NOT NULL,
  method VARCHAR(30) DEFAULT NULL,
  notes VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY(id),
  UNIQUE KEY uniq_alloc_month (allocation_id, month_year),
  CONSTRAINT fk_pay_alloc FOREIGN KEY (allocation_id) REFERENCES hostel_allocations(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

$success = $error = '';

// Normalize any hostel_requests rows with empty/NULL/invalid status to 'pending_payment'
$normalizeSql = "UPDATE hostel_requests SET status='pending_payment' WHERE status IS NULL OR status='' OR status NOT IN ('pending_payment','paid','allocated','rejected')";
mysqli_query($con, $normalizeSql);

// Handle create/update/delete
$action = isset($_POST['action']) ? $_POST['action'] : (isset($_GET['action']) ? $_GET['action'] : '');
if ($action === 'create' || $action === 'update') {
  $id            = isset($_POST['id']) ? (int)$_POST['id'] : 0;
  $allocation_id = isset($_POST['allocation_id']) ? (int)$_POST['allocation_id'] : 0;
  $month_year    = isset($_POST['month_year']) ? trim($_POST['month_year']) : '';
  $amount        = isset($_POST['amount']) ? (float)$_POST['amount'] : 0.00;
  $paid_on       = isset($_POST['paid_on']) ? trim($_POST['paid_on']) : '';
  $method        = isset($_POST['method']) ? trim($_POST['method']) : null;
  $notes         = isset($_POST['notes']) ? trim($_POST['notes']) : null;

  // Basic validation
  if ($allocation_id <= 0 || !preg_match('/^\d{4}-\d{2}$/', $month_year) || $amount <= 0 || $paid_on === '') {
    $error = 'Please provide Allocation, Month (YYYY-MM), Amount > 0 and Paid On date.';
  } else {
    // Ensure allocation exists
    $allowed = true;
    if ($wardenGender) {
      // Check that selected allocation belongs to allowed hostel gender
      $sqlG = "SELECT h.gender FROM hostels h INNER JOIN hostel_blocks b ON b.hostel_id=h.id INNER JOIN hostel_rooms r ON r.block_id=b.id INNER JOIN hostel_allocations a ON a.room_id=r.id WHERE a.id=? LIMIT 1";
      if ($stG = mysqli_prepare($con, $sqlG)) {
        mysqli_stmt_bind_param($stG, 'i', $allocation_id);
        mysqli_stmt_execute($stG);
        $rsG = mysqli_stmt_get_result($stG);
        $rowG = $rsG ? mysqli_fetch_assoc($rsG) : null;
        mysqli_stmt_close($stG);
        if (!$rowG || !($rowG['gender'] === 'Mixed' || $rowG['gender'] === $wardenGender)) { $allowed = false; }
      }
    }
    $chk = mysqli_query($con, 'SELECT id FROM hostel_allocations WHERE id='.(int)$allocation_id);
    if (!$chk || !mysqli_fetch_assoc($chk) || !$allowed) {
      $error = 'Invalid allocation ID.';
    } else if ($action === 'create') {
      $st = mysqli_prepare($con, 'INSERT INTO hostel_fee_payments (allocation_id, month_year, amount, paid_on, method, notes) VALUES (?,?,?,?,?,?)');
      if ($st) {
        mysqli_stmt_bind_param($st, 'isdsss', $allocation_id, $month_year, $amount, $paid_on, $method, $notes);
        if (mysqli_stmt_execute($st)) { $success = 'Payment recorded.'; } else { $error = 'Save failed: '.htmlspecialchars(mysqli_stmt_error($st)); }
        mysqli_stmt_close($st);
      } else { $error = 'Prepare failed: '.htmlspecialchars(mysqli_error($con)); }
    } else { // update
      if ($id <= 0) { $error = 'Invalid payment ID.'; }
      else {
        $st = mysqli_prepare($con, 'UPDATE hostel_fee_payments SET allocation_id=?, month_year=?, amount=?, paid_on=?, method=?, notes=? WHERE id=?');
        if ($st) {
          mysqli_stmt_bind_param($st, 'isdsssi', $allocation_id, $month_year, $amount, $paid_on, $method, $notes, $id);
          if (mysqli_stmt_execute($st)) { $success = 'Payment updated.'; } else { $error = 'Update failed: '.htmlspecialchars(mysqli_stmt_error($st)); }
          mysqli_stmt_close($st);
        } else { $error = 'Prepare failed: '.htmlspecialchars(mysqli_error($con)); }
      }
    }
  }
}

if ($action === 'delete') {
  $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
  if ($id > 0) {
    $st = mysqli_prepare($con, 'DELETE FROM hostel_fee_payments WHERE id=?');
    if ($st) {
      mysqli_stmt_bind_param($st, 'i', $id);
      $ok = mysqli_stmt_execute($st);
      mysqli_stmt_close($st);
      $success = $ok ? 'Payment deleted.' : 'Delete failed.';
    }
  }
}

// For form: list allocations select (gender-filter for WAR)
$allocOptions = [];
if ($wardenGender) {
  $sql = "SELECT a.id, a.student_id, a.status
          FROM hostel_allocations a
          INNER JOIN hostel_rooms r ON r.id=a.room_id
          INNER JOIN hostel_blocks b ON b.id=r.block_id
          INNER JOIN hostels h ON h.id=b.hostel_id
          WHERE (h.gender='Mixed' OR h.gender=?)
          ORDER BY a.id DESC";
  if ($stA = mysqli_prepare($con, $sql)) {
    mysqli_stmt_bind_param($stA, 's', $wardenGender);
    mysqli_stmt_execute($stA);
    $resA = mysqli_stmt_get_result($stA);
    while ($resA && $r = mysqli_fetch_assoc($resA)) { $allocOptions[] = $r; }
    mysqli_stmt_close($stA);
  }
} else {
  $q = mysqli_query($con, "SELECT a.id, a.student_id, a.status FROM hostel_allocations a ORDER BY a.id DESC");
  if ($q) {
    while ($r = mysqli_fetch_assoc($q)) { $allocOptions[] = $r; }
  }
}

// If editing
$editPayment = null;
if ($action === 'edit') {
  $eid = isset($_GET['id']) ? (int)$_GET['id'] : 0;
  if ($eid > 0) {
    $res = mysqli_query($con, 'SELECT * FROM hostel_fee_payments WHERE id='.(int)$eid);
    $editPayment = $res ? mysqli_fetch_assoc($res) : null;
  }
}
?>
<div class="container mt-3">
  <h3>Hostel Payments</h3>
  <?php if ($success): ?><div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo htmlspecialchars($success); ?><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button></div><?php endif; ?>
  <?php if ($error): ?><div class="alert alert-danger alert-dismissible fade show" role="alert"><?php echo htmlspecialchars($error); ?><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button></div><?php endif; ?>

  <div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title mb-3"><?php echo $editPayment ? 'Edit Payment #'.(int)$editPayment['id'] : 'Add Payment'; ?></h5>
      <form method="POST">
        <input type="hidden" name="action" value="<?php echo $editPayment ? 'update' : 'create'; ?>">
        <?php if ($editPayment): ?><input type="hidden" name="id" value="<?php echo (int)$editPayment['id']; ?>"><?php endif; ?>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label>Allocation</label>
            <select name="allocation_id" class="form-control" required>
              <option value="">-- Select Allocation --</option>
              <?php foreach ($allocOptions as $opt): $sel = ($editPayment && (int)$editPayment['allocation_id'] === (int)$opt['id']) ? 'selected' : ''; ?>
                <option value="<?php echo (int)$opt['id']; ?>" <?php echo $sel; ?>>#<?php echo (int)$opt['id']; ?> (<?php echo htmlspecialchars($opt['student_id']); ?>) - <?php echo htmlspecialchars($opt['status']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label>Month (YYYY-MM)</label>
            <input type="text" name="month_year" class="form-control" placeholder="2025-08" value="<?php echo $editPayment ? htmlspecialchars($editPayment['month_year']) : ''; ?>" required>
          </div>
          <div class="form-group col-md-2">
            <label>Amount</label>
            <input type="number" step="0.01" min="0" name="amount" class="form-control" value="<?php echo $editPayment ? htmlspecialchars($editPayment['amount']) : ''; ?>" required>
          </div>
          <div class="form-group col-md-2">
            <label>Paid On</label>
            <input type="date" name="paid_on" class="form-control" value="<?php echo $editPayment ? htmlspecialchars($editPayment['paid_on']) : date('Y-m-d'); ?>" required>
          </div>
          <div class="form-group col-md-3">
            <label>Method</label>
            <input type="text" name="method" class="form-control" placeholder="Cash/Bank" value="<?php echo $editPayment ? htmlspecialchars($editPayment['method']) : ''; ?>">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Notes</label>
            <input type="text" name="notes" class="form-control" value="<?php echo $editPayment ? htmlspecialchars($editPayment['notes']) : ''; ?>">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-2">
            <button type="submit" class="btn btn-primary btn-block">Save</button>
          </div>
          <?php if ($editPayment): ?>
          <div class="form-group col-md-2">
            <a class="btn btn-secondary btn-block" href="Payments.php">Cancel</a>
          </div>
          <?php endif; ?>
        </div>
      </form>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Allocation</th>
          <th>Student</th>
          <th>Month</th>
          <th>Amount</th>
          <th>Paid On</th>
          <th>Method</th>
          <th>Notes</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if ($wardenGender) {
            $sql = "SELECT p.*, a.student_id
                    FROM hostel_fee_payments p
                    JOIN hostel_allocations a ON a.id = p.allocation_id
                    JOIN hostel_rooms r ON r.id = a.room_id
                    JOIN hostel_blocks b ON b.id = r.block_id
                    JOIN hostels h ON h.id = b.hostel_id
                    WHERE (h.gender='Mixed' OR h.gender=?)
                    ORDER BY p.paid_on DESC, p.id DESC";
            if ($stL = mysqli_prepare($con, $sql)) {
              mysqli_stmt_bind_param($stL, 's', $wardenGender);
              mysqli_stmt_execute($stL);
              $res = mysqli_stmt_get_result($stL);
              mysqli_stmt_close($stL);
            } else {
              $error = 'Failed to load payments list: '.htmlspecialchars(mysqli_error($con));
              $res = false;
            }
          } else {
            $sql = "SELECT p.*, a.student_id FROM hostel_fee_payments p JOIN hostel_allocations a ON a.id = p.allocation_id ORDER BY p.paid_on DESC, p.id DESC";
            $res = mysqli_query($con, $sql);
          }
          if ($res && mysqli_num_rows($res) > 0) {
            while ($r = mysqli_fetch_assoc($res)) {
              echo '<tr>';
              echo '<td>'.(int)$r['id'].'</td>';
              echo '<td>#'.(int)$r['allocation_id'].'</td>';
              echo '<td>'.htmlspecialchars($r['student_id']).'</td>';
              echo '<td>'.htmlspecialchars($r['month_year']).'</td>';
              echo '<td>'.number_format((float)$r['amount'], 2).'</td>';
              echo '<td>'.htmlspecialchars($r['paid_on']).'</td>';
              echo '<td>'.htmlspecialchars($r['method']).'</td>';
              echo '<td>'.htmlspecialchars($r['notes']).'</td>';
              echo '<td>';
              echo '<a class="btn btn-sm btn-outline-info mr-1" href="Payments.php?action=edit&id='.(int)$r['id'].'">Edit</a>';
              echo '<a class="btn btn-sm btn-outline-danger" onclick="return confirm(\'Delete this payment?\');" href="Payments.php?action=delete&id='.(int)$r['id'].'">Delete</a>';
              echo '</td>';
              echo '</tr>';
            }
          } else {
            echo '<tr><td colspan="9" class="text-center">No payments found.</td></tr>';
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>
