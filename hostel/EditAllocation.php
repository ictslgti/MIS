<?php
// hostel/EditAllocation.php - edit an existing hostel allocation
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../head.php';
require_once __DIR__ . '/../menu.php';

if (session_status() === PHP_SESSION_NONE) { session_start(); }

$alloc_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$success = $error = '';

if ($alloc_id <= 0) {
  echo '<div class="alert alert-danger m-3">Invalid allocation ID.</div>';
  require_once __DIR__ . '/../footer.php';
  exit;
}

// Fetch allocation
$allocation = null;
$st = mysqli_prepare($con, 'SELECT id, student_id, room_id, allocated_at, leaving_at, status FROM hostel_allocations WHERE id = ?');
mysqli_stmt_bind_param($st, 'i', $alloc_id);
if (mysqli_stmt_execute($st)) {
  $res = mysqli_stmt_get_result($st);
  if ($res) { $allocation = mysqli_fetch_assoc($res); mysqli_free_result($res); }
}
if (!$allocation) {
  echo '<div class="alert alert-danger m-3">Allocation not found.</div>';
  require_once __DIR__ . '/../footer.php';
  exit;
}

// Handle update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $room_id      = isset($_POST['room_id']) ? (int)$_POST['room_id'] : 0;
  $allocated_at = isset($_POST['allocated_at']) ? trim($_POST['allocated_at']) : '';
  $leaving_at   = isset($_POST['leaving_at']) && $_POST['leaving_at'] !== '' ? trim($_POST['leaving_at']) : null;
  $status       = isset($_POST['status']) ? trim($_POST['status']) : '';

  $validStatuses = ['active','left','cancelled'];
  if ($room_id <= 0 || $allocated_at === '' || !in_array($status, $validStatuses, true)) {
    $error = 'Please provide Room, Allocated date and a valid Status.';
  } else {
    // Validate room exists
    $q = mysqli_query($con, 'SELECT id FROM hostel_rooms WHERE id='.(int)$room_id);
    if (!$q || !mysqli_fetch_assoc($q)) {
      $error = 'Selected room does not exist.';
    } else {
      // If room is changed, override allocated_at to today to mark the change time
      $roomChanged = ((int)$allocation['room_id'] !== $room_id);
      if ($roomChanged) {
        $allocated_at = date('Y-m-d');
      }
      if ($stU = mysqli_prepare($con, 'UPDATE hostel_allocations SET room_id=?, allocated_at=?, leaving_at=?, status=? WHERE id=?')) {
        mysqli_stmt_bind_param($stU, 'isssi', $room_id, $allocated_at, $leaving_at, $status, $alloc_id);
        if (mysqli_stmt_execute($stU)) {
          $success = $roomChanged
            ? ('Room changed on '.$allocated_at.' and allocation updated successfully.')
            : 'Allocation updated successfully.';
          // Refresh loaded data
          $allocation['room_id'] = $room_id;
          $allocation['allocated_at'] = $allocated_at;
          $allocation['leaving_at'] = $leaving_at;
          $allocation['status'] = $status;
          // Also keep hostel_requests.status in sync to avoid empty/invalid status
          $reqStatusMap = [
            'active'    => 'allocated',
            'left'      => 'left',
            'cancelled' => 'rejected'
          ];
          if (isset($reqStatusMap[$status])) {
            if ($stR = mysqli_prepare($con, "UPDATE hostel_requests SET status=? WHERE student_id=?")) {
              $mapped = $reqStatusMap[$status];
              mysqli_stmt_bind_param($stR, 'ss', $mapped, $allocation['student_id']);
              mysqli_stmt_execute($stR);
              mysqli_stmt_close($stR);
            }
          }
        } else {
          $error = 'Update failed: ' . htmlspecialchars(mysqli_stmt_error($stU));
        }
        mysqli_stmt_close($stU);
      } else {
        $error = 'Failed to prepare update: ' . htmlspecialchars(mysqli_error($con));
      }
    }
  }
}

?>
<div class="container mt-3">
  <h3>Edit Allocation #<?php echo (int)$allocation['id']; ?></h3>
  <p>Student: <strong><?php echo htmlspecialchars($allocation['student_id']); ?></strong></p>

  <?php if ($success): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?php echo htmlspecialchars($success); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
  <?php endif; ?>
  <?php if ($error): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?php echo htmlspecialchars($error); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
  <?php endif; ?>

  <form method="POST">
    <div class="form-row">
      <div class="form-group col-md-3">
        <label>Room ID</label>
        <input type="number" class="form-control" name="room_id" value="<?php echo (int)$allocation['room_id']; ?>" required>
      </div>
      <div class="form-group col-md-3">
        <label>Allocated At</label>
        <input type="date" class="form-control" name="allocated_at" value="<?php echo htmlspecialchars($allocation['allocated_at']); ?>" required>
      </div>
      <div class="form-group col-md-3">
        <label>Leaving At</label>
        <input type="date" class="form-control" name="leaving_at" value="<?php echo htmlspecialchars($allocation['leaving_at']); ?>">
      </div>
      <div class="form-group col-md-3">
        <label>Status</label>
        <select class="form-control" name="status" required>
          <?php
            $opts = ['active'=>'Active','left'=>'Left','cancelled'=>'Cancelled'];
            foreach ($opts as $k=>$v) {
              $sel = ($allocation['status'] === $k) ? 'selected' : '';
              echo '<option value="'.htmlspecialchars($k).'" '.$sel.'>'.htmlspecialchars($v).'</option>';
            }
          ?>
        </select>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-2">
        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Save</button>
      </div>
      <div class="form-group col-md-2">
        <a href="<?php echo (defined('APP_BASE') ? APP_BASE : ''); ?>/hostel/Hostel.php" class="btn btn-secondary btn-block">Back</a>
      </div>
    </div>
  </form>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>
