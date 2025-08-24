<?php
// finance/HostelPayments.php — Finance Officer portal for hostel payments
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../auth.php';

if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_login();
require_roles('FIN'); // Only Finance Officer role

if (!headers_sent()) { ob_start(); }

$success = $error = '';

// Handle create payment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action']==='create_payment') {
  $allocation_id = isset($_POST['allocation_id']) ? (int)$_POST['allocation_id'] : 0;
  $month_year    = isset($_POST['month_year']) ? trim($_POST['month_year']) : '';
  $amount        = isset($_POST['amount']) ? (float)$_POST['amount'] : 0.00;
  $paid_on       = isset($_POST['paid_on']) ? trim($_POST['paid_on']) : '';
  $method        = isset($_POST['method']) ? trim($_POST['method']) : null;
  $notes         = isset($_POST['notes']) ? trim($_POST['notes']) : null;

  if ($allocation_id <= 0 || !preg_match('/^\d{4}-\d{2}$/', $month_year) || $amount <= 0 || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $paid_on)) {
    $error = 'Please provide Allocation, Month (YYYY-MM), Amount > 0 and Paid On date (YYYY-MM-DD).';
  } else {
    // ensure table exists
    mysqli_query($con, "CREATE TABLE IF NOT EXISTS hostel_fee_payments (\n      id INT UNSIGNED NOT NULL AUTO_INCREMENT,\n      allocation_id INT UNSIGNED NOT NULL,\n      month_year CHAR(7) NOT NULL,\n      amount DECIMAL(10,2) NOT NULL,\n      paid_on DATE NOT NULL,\n      method VARCHAR(30) DEFAULT NULL,\n      notes VARCHAR(255) DEFAULT NULL,\n      PRIMARY KEY(id),\n      UNIQUE KEY uniq_alloc_month (allocation_id, month_year),\n      CONSTRAINT fk_pay_alloc_fin FOREIGN KEY (allocation_id) REFERENCES hostel_allocations(id) ON DELETE CASCADE ON UPDATE CASCADE\n    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    // verify allocation exists
    $exists = false;
    if ($st = mysqli_prepare($con, 'SELECT 1 FROM hostel_allocations WHERE id=? LIMIT 1')) {
      mysqli_stmt_bind_param($st, 'i', $allocation_id);
      mysqli_stmt_execute($st);
      mysqli_stmt_store_result($st);
      $exists = mysqli_stmt_num_rows($st) > 0;
      mysqli_stmt_close($st);
    }
    if (!$exists) {
      $error = 'Invalid allocation selected.';
    } else {
      // insert or replace same month: on duplicate update amount/paid_on/method/notes
      $sql = "INSERT INTO hostel_fee_payments (allocation_id, month_year, amount, paid_on, method, notes)\n              VALUES (?, ?, ?, ?, ?, ?)\n              ON DUPLICATE KEY UPDATE amount=VALUES(amount), paid_on=VALUES(paid_on), method=VALUES(method), notes=VALUES(notes)";
      if ($st2 = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($st2, 'isdsss', $allocation_id, $month_year, $amount, $paid_on, $method, $notes);
        if (mysqli_stmt_execute($st2)) {
          $success = 'Payment saved.';
        } else {
          $error = 'Failed to save payment: ' . htmlspecialchars(mysqli_stmt_error($st2));
        }
        mysqli_stmt_close($st2);
      } else {
        $error = 'Failed to prepare insert: ' . htmlspecialchars(mysqli_error($con));
      }
    }
  }
}

// Filters
$filter_student = isset($_GET['student_id']) ? trim($_GET['student_id']) : '';
$filter_month   = isset($_GET['month_year']) ? trim($_GET['month_year']) : '';
$filter_method  = isset($_GET['method']) ? trim($_GET['method']) : '';

require_once __DIR__ . '/../head.php';
require_once __DIR__ . '/../menu.php';
?>
<div class="container mt-3">
  <h2 class="text-center">Finance: Hostel Payments</h2>
  <p class="text-center">View, filter, and record hostel fee payments.</p>

  <?php if ($success): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?php echo htmlspecialchars($success); ?>
      <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
  <?php endif; ?>
  <?php if ($error): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?php echo htmlspecialchars($error); ?>
      <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
  <?php endif; ?>

  <div class="card mb-3">
    <div class="card-body">
      <form method="get" class="form-row">
        <div class="form-group col-md-3">
          <label>Student ID</label>
          <input type="text" name="student_id" class="form-control" value="<?php echo htmlspecialchars($filter_student); ?>" />
        </div>
        <div class="form-group col-md-3">
          <label>Month (YYYY-MM)</label>
          <input type="text" name="month_year" class="form-control" placeholder="2025-01" value="<?php echo htmlspecialchars($filter_month); ?>" />
        </div>
        <div class="form-group col-md-3">
          <label>Method</label>
          <input type="text" name="method" class="form-control" value="<?php echo htmlspecialchars($filter_method); ?>" />
        </div>
        <div class="form-group col-md-3 align-self-end">
          <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-filter"></i> Apply Filters</button>
        </div>
      </form>
    </div>
  </div>

  <div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title">Record Payment</h5>
      <form method="post" class="form-row">
        <input type="hidden" name="action" value="create_payment" />
        <div class="form-group col-md-2">
          <label>Allocation ID</label>
          <input type="number" name="allocation_id" class="form-control" required />
        </div>
        <div class="form-group col-md-2">
          <label>Month (YYYY-MM)</label>
          <input type="text" name="month_year" class="form-control" placeholder="2025-01" required />
        </div>
        <div class="form-group col-md-2">
          <label>Amount</label>
          <input type="number" step="0.01" name="amount" class="form-control" required />
        </div>
        <div class="form-group col-md-2">
          <label>Paid On</label>
          <input type="date" name="paid_on" class="form-control" required />
        </div>
        <div class="form-group col-md-2">
          <label>Method</label>
          <input type="text" name="method" class="form-control" />
        </div>
        <div class="form-group col-md-2">
          <label>Notes</label>
          <input type="text" name="notes" class="form-control" />
        </div>
        <div class="form-group col-md-2">
          <button type="submit" class="btn btn-success btn-block" style="margin-top: 31px;"><i class="fa fa-save"></i> Save</button>
        </div>
      </form>
    </div>
  </div>

  <div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title">Payments</h5>
      <div class="table-responsive">
        <table class="table table-sm table-striped table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Student</th>
              <th>Allocation</th>
              <th>Month</th>
              <th>Amount</th>
              <th>Paid On</th>
              <th>Method</th>
              <th>Notes</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $conds = [];
            $params = [];
            $types = '';
            $sql = "SELECT p.*, a.student_id FROM hostel_fee_payments p\n                    JOIN hostel_allocations a ON a.id = p.allocation_id";
            if ($filter_student !== '') { $conds[] = 'a.student_id = ?'; $types .= 's'; $params[] = $filter_student; }
            if ($filter_month !== '') { $conds[] = 'p.month_year = ?'; $types .= 's'; $params[] = $filter_month; }
            if ($filter_method !== '') { $conds[] = 'p.method = ?'; $types .= 's'; $params[] = $filter_method; }
            if ($conds) { $sql .= ' WHERE ' . implode(' AND ', $conds); }
            $sql .= ' ORDER BY p.paid_on DESC, p.id DESC LIMIT 500';

            if ($st = mysqli_prepare($con, $sql)) {
              if ($types !== '') { mysqli_stmt_bind_param($st, $types, ...$params); }
              if (mysqli_stmt_execute($st)) {
                $res = mysqli_stmt_get_result($st);
                if ($res && mysqli_num_rows($res) > 0) {
                  while ($r = mysqli_fetch_assoc($res)) {
                    echo '<tr>';
                    echo '<td>'.(int)$r['id'].'</td>';
                    echo '<td>'.htmlspecialchars($r['student_id']).'</td>';
                    echo '<td>#'.(int)$r['allocation_id'].'</td>';
                    echo '<td>'.htmlspecialchars($r['month_year']).'</td>';
                    echo '<td>'.number_format((float)$r['amount'], 2).'</td>';
                    echo '<td>'.htmlspecialchars($r['paid_on']).'</td>';
                    echo '<td>'.htmlspecialchars($r['method']).'</td>';
                    echo '<td>'.htmlspecialchars($r['notes']).'</td>';
                    echo '</tr>';
                  }
                } else {
                  echo '<tr><td colspan="8" class="text-center">No records</td></tr>';
                }
              }
              mysqli_stmt_close($st);
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php if ($filter_student !== ''): ?>
  <div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title">Student Bank Details</h5>
      <?php
        $bank = null;
        if ($bs = mysqli_prepare($con, "SELECT student_fullname, bank_name, bank_account_no, bank_branch, bank_frontsheet_path FROM student WHERE student_id = ? LIMIT 1")) {
          mysqli_stmt_bind_param($bs, 's', $filter_student);
          if (mysqli_stmt_execute($bs)) {
            $bres = mysqli_stmt_get_result($bs);
            if ($bres) { $bank = mysqli_fetch_assoc($bres) ?: null; mysqli_free_result($bres); }
          }
          mysqli_stmt_close($bs);
        }
      ?>
      <?php if ($bank): ?>
        <ul class="list-unstyled mb-0">
          <li><strong>Name:</strong> <?php echo htmlspecialchars($bank['student_fullname']); ?></li>
          <li><strong>Bank:</strong> <?php echo htmlspecialchars($bank['bank_name'] ?: "People's Bank"); ?></li>
          <li><strong>Account No:</strong> <?php echo htmlspecialchars($bank['bank_account_no'] ?: '—'); ?></li>
          <li><strong>Branch:</strong> <?php echo htmlspecialchars($bank['bank_branch'] ?: '—'); ?></li>
          <li><strong>Front Page:</strong>
            <?php if (!empty($bank['bank_frontsheet_path'])): ?>
              <a href="/<?php echo htmlspecialchars($bank['bank_frontsheet_path']); ?>" target="_blank">View File</a>
            <?php else: ?>
              <span>Not uploaded</span>
            <?php endif; ?>
          </li>
        </ul>
      <?php else: ?>
        <em>No bank details found for the student.</em>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>
</div>
<?php require_once __DIR__ . '/../footer.php'; if (function_exists('ob_get_level') && ob_get_level() > 0) { @ob_end_flush(); } ?>
