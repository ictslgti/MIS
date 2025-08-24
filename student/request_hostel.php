<?php
// student/request_hostel.php — standalone CRUD for hostel_requests
require_once __DIR__ . '/../config.php';

// Start output buffering to avoid premature output
if (!headers_sent()) { ob_start(); }
if (session_status() === PHP_SESSION_NONE) { session_start(); }

$user = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;
$successMsg = $errorMsg = '';

if (!$user) {
  echo '<div class="alert alert-danger m-3">You must be logged in to access this page.</div>';
  require_once __DIR__ . '/../footer.php';
  exit;
}

// Ensure the hostel_requests table exists with the expected schema
$createSql = "CREATE TABLE IF NOT EXISTS `hostel_requests` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `student_id` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `distance_km` decimal(6,2) NOT NULL,
  `status` enum('pending_payment','paid','allocated','rejected') NOT NULL DEFAULT 'pending_payment',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_student` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci";
mysqli_query($con, $createSql);

$validStatuses = ['pending_payment','paid','allocated','rejected'];

// Ensure payments table exists (in case admin page hasn't created it yet)
mysqli_query($con, "CREATE TABLE IF NOT EXISTS hostel_fee_payments (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  allocation_id INT UNSIGNED NOT NULL,
  month_year CHAR(7) NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  paid_on DATE NOT NULL,
  method VARCHAR(30) DEFAULT NULL,
  notes VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY(id),
  UNIQUE KEY uniq_alloc_month (allocation_id, month_year),
  CONSTRAINT fk_pay_alloc_student FOREIGN KEY (allocation_id) REFERENCES hostel_allocations(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

// Handle actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
  $action = $_POST['action'];

  if ($action === 'save') {
    $distance_in = isset($_POST['distance_km']) ? trim($_POST['distance_km']) : '';
    $status = 'pending_payment'; // default enforced; no dropdown

    // Accept inputs like "12" or "12.5", also strip any stray non-numeric
    $distance_num = preg_replace('/[^0-9.]/', '', $distance_in);
    if ($distance_num === '' || !is_numeric($distance_num)) {
      $errorMsg = 'Distance must be numeric (e.g., 12 or 12.5).';
    } else {
      $distance_km = number_format((float)$distance_num, 2, '.', '');
      // Upsert: create or update the request for this student
      $sql = "INSERT INTO hostel_requests (student_id, distance_km, status)
              VALUES (?, ?, ?)
              ON DUPLICATE KEY UPDATE distance_km = VALUES(distance_km), status = VALUES(status), updated_at = CURRENT_TIMESTAMP";
      if ($st = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($st, 'sds', $user, $distance_km, $status);
        if (mysqli_stmt_execute($st)) {
          $successMsg = 'Hostel request saved successfully.';
        } else {
          $errorMsg = 'Failed to save: ' . htmlspecialchars(mysqli_stmt_error($st));
        }
        mysqli_stmt_close($st);
      } else {
        $errorMsg = 'Failed to prepare save: ' . htmlspecialchars(mysqli_error($con));
      }
    }
  } elseif ($action === 'delete') {
    // Delete the student's request
    if ($st = mysqli_prepare($con, 'DELETE FROM hostel_requests WHERE student_id = ?')) {
      mysqli_stmt_bind_param($st, 's', $user);
      if (mysqli_stmt_execute($st)) {
        $successMsg = 'Hostel request deleted.';
      } else {
        $errorMsg = 'Failed to delete: ' . htmlspecialchars(mysqli_stmt_error($st));
      }
      mysqli_stmt_close($st);
    } else {
      $errorMsg = 'Failed to prepare delete: ' . htmlspecialchars(mysqli_error($con));
    }
  } elseif ($action === 'request_again') {
    // Allow student to request again if not currently allocated
    // This simply resets status to pending_payment on existing record
    if ($st = mysqli_prepare($con, 'UPDATE hostel_requests SET status="pending_payment", updated_at=CURRENT_TIMESTAMP WHERE student_id = ?')) {
      mysqli_stmt_bind_param($st, 's', $user);
      if (mysqli_stmt_execute($st)) {
        $successMsg = 'Status reset to pending_payment. You can update your distance and save.';
      } else {
        $errorMsg = 'Failed to reset: ' . htmlspecialchars(mysqli_stmt_error($st));
      }
      mysqli_stmt_close($st);
    } else {
      $errorMsg = 'Failed to prepare reset: ' . htmlspecialchars(mysqli_error($con));
    }
  }
}

// Fetch current record for display
$current = null;
if ($st = mysqli_prepare($con, 'SELECT id, student_id, distance_km, status, created_at, updated_at FROM hostel_requests WHERE student_id = ?')) {
  mysqli_stmt_bind_param($st, 's', $user);
  if (mysqli_stmt_execute($st)) {
    $res = mysqli_stmt_get_result($st);
    if ($res) {
      $current = mysqli_fetch_assoc($res) ?: null;
      mysqli_free_result($res);
    } else {
      // Fallback for environments without mysqlnd: use bind_result
      mysqli_stmt_store_result($st);
      if (mysqli_stmt_num_rows($st) > 0) {
        mysqli_stmt_bind_result($st, $rid, $rstu, $rdist, $rstat, $rcreated, $rupdated);
        if (mysqli_stmt_fetch($st)) {
          $current = [
            'id' => $rid,
            'student_id' => $rstu,
            'distance_km' => $rdist,
            'status' => $rstat,
            'created_at' => $rcreated,
            'updated_at' => $rupdated,
          ];
        }
      }
    }
  }
  mysqli_stmt_close($st);
}

// Fetch student's hostel allocation details (if any)
$allocation = null;
if ($st2 = mysqli_prepare($con, 'SELECT h.hosttler_id, h.student_id, h.department_id, h.distance, h.block_no, h.room_no, h.date_of_addmission, h.date_of_leaving, d.department_name
                                 FROM hostel_student_details h
                                 LEFT JOIN department d ON d.department_id = h.department_id
                                 WHERE h.student_id = ?')) {
  mysqli_stmt_bind_param($st2, 's', $user);
  if (mysqli_stmt_execute($st2)) {
    $res2 = mysqli_stmt_get_result($st2);
    if ($res2) {
      $allocation = mysqli_fetch_assoc($res2) ?: null;
      mysqli_free_result($res2);
    } else {
      mysqli_stmt_store_result($st2);
      if (mysqli_stmt_num_rows($st2) > 0) {
        mysqli_stmt_bind_result($st2, $aid, $astu, $adept, $adist, $ablock, $aroom, $aadd, $aleave, $adeptname);
        if (mysqli_stmt_fetch($st2)) {
          $allocation = [
            'hosttler_id' => $aid,
            'student_id' => $astu,
            'department_id' => $adept,
            'distance' => $adist,
            'block_no' => $ablock,
            'room_no' => $aroom,
            'date_of_addmission' => $aadd,
            'date_of_leaving' => $aleave,
            'department_name' => $adeptname,
          ];
        }
      }
    }
  }
  mysqli_stmt_close($st2);
}

// Fetch active allocation with room/block/hostel details (normalized tables)
$activeAlloc = null;
if ($st3 = mysqli_prepare($con, 'SELECT a.id, a.allocated_at, a.leaving_at, r.room_no, r.capacity, b.name AS block_name, h.name AS hostel_name
                                 FROM hostel_allocations a
                                 JOIN hostel_rooms r ON r.id = a.room_id
                                 JOIN hostel_blocks b ON b.id = r.block_id
                                 JOIN hostels h ON h.id = b.hostel_id
                                 WHERE a.student_id = ? AND a.status = "active"')) {
  mysqli_stmt_bind_param($st3, 's', $user);
  if (mysqli_stmt_execute($st3)) {
    $res3 = mysqli_stmt_get_result($st3);
    if ($res3) {
      $activeAlloc = mysqli_fetch_assoc($res3) ?: null;
      mysqli_free_result($res3);
    } else {
      mysqli_stmt_store_result($st3);
      if (mysqli_stmt_num_rows($st3) > 0) {
        mysqli_stmt_bind_result($st3, $aaid, $aaalloc, $aaleave, $aaroom, $aacap, $aablock, $aahostel);
        if (mysqli_stmt_fetch($st3)) {
          $activeAlloc = [
            'id' => $aaid,
            'allocated_at' => $aaalloc,
            'leaving_at' => $aaleave,
            'room_no' => $aaroom,
            'capacity' => $aacap,
            'block_name' => $aablock,
            'hostel_name' => $aahostel,
          ];
        }
      }
    }
  }
  mysqli_stmt_close($st3);
}

// Only allow Save when status is pending_payment or no request exists
$canSave = (!$current) || ($current && isset($current['status']) && $current['status'] === 'pending_payment');

// Layout includes
require_once __DIR__ . '/../head.php';
require_once __DIR__ . '/top_nav.php';
require_once __DIR__ . '/../menu.php';
?>
<div class="container mt-3">
  <h2 class="text-center">Hostel Request (Student)</h2>
  <p class="text-center">Create, view, update or delete your hostel request.</p>

  <?php if ($successMsg): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?php echo htmlspecialchars($successMsg); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
  <?php endif; ?>
  <?php if ($errorMsg): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?php echo htmlspecialchars($errorMsg); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
  <?php endif; ?>

  <div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title mb-3">Current Request</h5>
      <?php if ($current): ?>
        <ul class="list-unstyled mb-0">
          <li><strong>ID:</strong> <?php echo (int)$current['id']; ?></li>
          <li><strong>Student ID:</strong> <?php echo htmlspecialchars($current['student_id']); ?></li>
          <li><strong>Distance (km):</strong> <?php echo htmlspecialchars(number_format((float)$current['distance_km'], 2)); ?></li>
          <li><strong>Status:</strong> <?php echo htmlspecialchars($current['status']); ?></li>
          <li><strong>Created:</strong> <?php echo htmlspecialchars($current['created_at']); ?></li>
          <li><strong>Updated:</strong> <?php echo htmlspecialchars($current['updated_at']); ?></li>
        </ul>
      <?php else: ?>
        <em>No request found.</em>
      <?php endif; ?>
    </div>
  </div>

  <?php if ($activeAlloc): ?>
  <div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title mb-3">Allocated Room</h5>
      <ul class="list-unstyled mb-0">
        <li><strong>Hostel:</strong> <?php echo htmlspecialchars($activeAlloc['hostel_name']); ?></li>
        <li><strong>Block:</strong> <?php echo htmlspecialchars($activeAlloc['block_name']); ?></li>
        <li><strong>Room:</strong> <?php echo htmlspecialchars($activeAlloc['room_no']); ?></li>
        <li><strong>Capacity:</strong> <?php echo (int)$activeAlloc['capacity']; ?></li>
        <li><strong>Allocated on:</strong> <?php echo htmlspecialchars($activeAlloc['allocated_at']); ?></li>
        <li><strong>Leaving on:</strong> <?php echo htmlspecialchars($activeAlloc['leaving_at']); ?></li>
      </ul>
    </div>
  </div>
  <div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title mb-3">Payment History</h5>
      <div class="table-responsive">
        <table class="table table-sm table-striped table-bordered mb-0">
          <thead>
            <tr>
              <th>#</th>
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
              $sql = "SELECT p.* FROM hostel_fee_payments p
                      JOIN hostel_allocations a ON a.id = p.allocation_id
                      WHERE a.student_id = ?
                      ORDER BY p.paid_on DESC, p.id DESC";
              if ($st = mysqli_prepare($con, $sql)) {
                mysqli_stmt_bind_param($st, 's', $user);
                if (mysqli_stmt_execute($st)) {
                  $res = mysqli_stmt_get_result($st);
                  if ($res && mysqli_num_rows($res) > 0) {
                    while ($r = mysqli_fetch_assoc($res)) {
                      echo '<tr>';
                      echo '<td>'.(int)$r['id'].'</td>';
                      echo '<td>#'.(int)$r['allocation_id'].'</td>';
                      echo '<td>'.htmlspecialchars($r['month_year']).'</td>';
                      echo '<td>'.number_format((float)$r['amount'], 2).'</td>';
                      echo '<td>'.htmlspecialchars($r['paid_on']).'</td>';
                      echo '<td>'.htmlspecialchars($r['method']).'</td>';
                      echo '<td>'.htmlspecialchars($r['notes']).'</td>';
                      echo '</tr>';
                    }
                  } else {
                    echo '<tr><td colspan="7" class="text-center">No payments found.</td></tr>';
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
  <?php endif; ?>

  <?php if (!$current || !isset($current['status']) || $current['status'] !== 'allocated'): ?>
  <form method="POST" class="mb-3">
    <input type="hidden" name="action" value="save" />

    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Distance (km)</label>
        <input type="text" name="distance_km" class="form-control" placeholder="e.g., 12 or 12.5" value="<?php echo $current ? htmlspecialchars($current['distance_km']) : ''; ?>" <?php echo $canSave ? '' : 'disabled'; ?> required>
        <?php if (!$canSave && $current): ?>
          <small class="form-text text-muted">Editing disabled. Status is "<?php echo htmlspecialchars($current['status']); ?>".</small>
        <?php endif; ?>
      </div>
      <div class="form-group col-md-4">
        <label>Status</label>
        <input type="text" class="form-control" value="pending_payment" disabled>
        <small class="form-text text-muted">Status defaults to pending_payment on save.</small>
      </div>
    </div>

    <div class="form-row">
      <?php if ($canSave): ?>
        <div class="form-group col-md-3">
          <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Save</button>
        </div>
      <?php endif; ?>
    </div>
  </form>
  <?php endif; ?>

  

  <?php if ($current && isset($current['status']) && $current['status'] !== 'allocated'): ?>
  <form method="POST" onsubmit="return confirm('Delete your hostel request?');" class="mb-3">
    <input type="hidden" name="action" value="delete" />
    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
  </form>
  <form method="POST" onsubmit="return confirm('Set your request back to pending and edit again?');" class="mb-3">
    <input type="hidden" name="action" value="request_again" />
    <button type="submit" class="btn btn-secondary"><i class="fa fa-undo"></i> Request Again</button>
  </form>
  <?php endif; ?>
</div>
<?php
require_once __DIR__ . '/../footer.php';
if (function_exists('ob_get_level') && ob_get_level() > 0) { @ob_end_flush(); }
