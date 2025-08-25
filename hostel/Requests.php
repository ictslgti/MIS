<?php
// hostel/Requests.php - List hostel requests and allow ADM/WAR to mark paid or reject
$title = "Hostel Requests | SLGTI";
include_once("../config.php");
include_once("../head.php");
include_once("../menu.php");

if (!isset($_SESSION['user_type']) || !in_array($_SESSION['user_type'], ['ADM','WAR'])) {
  echo '<div class="container mt-4"><div class="alert alert-danger">Forbidden</div></div>';
  include_once("../footer.php");
  exit;
}

$base = defined('APP_BASE') ? APP_BASE : '';
$ok = isset($_GET['ok']) ? $_GET['ok'] : '';
$err = isset($_GET['err']) ? $_GET['err'] : '';

// If user is a Warden, get their gender to filter requests
$wardenGender = null;
if ($_SESSION['user_type'] === 'WAR' && !empty($_SESSION['user_name'])) {
  if ($st = mysqli_prepare($con, "SELECT staff_gender FROM staff WHERE staff_id=? LIMIT 1")) {
    mysqli_stmt_bind_param($st, 's', $_SESSION['user_name']);
    mysqli_stmt_execute($st);
    $rs = mysqli_stmt_get_result($st);
    if ($rs) { $r = mysqli_fetch_assoc($rs); if ($r && isset($r['staff_gender'])) { $wardenGender = $r['staff_gender']; } }
    mysqli_stmt_close($st);
  }
}
?>
<div class="container mt-4">
  <?php if ($ok): ?>
    <?php
      $okMsg = 'Action completed.';
      if ($ok === 'marked_paid') { $okMsg = 'Payment marked as paid.'; }
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?php echo htmlspecialchars($okMsg); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
  <?php endif; ?>
  <?php if ($err): ?>
    <?php
      $errMap = [
        'notfound' => 'Hostel request not found for the specified student.',
        'already_paid' => 'This request has already been marked as paid.',
        'invalid_status' => 'Only requests in Pending Payment status can be marked as paid.',
        'db_update' => 'Database update failed. Please try again.',
        'db' => 'Database error. Please contact administrator.'
      ];
      $errMsg = isset($errMap[$err]) ? $errMap[$err] : ('Action failed: ' . $err);
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?php echo htmlspecialchars($errMsg); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
  <?php endif; ?>

  <h3>Hostel Requests</h3>
  <div class="table-responsive mt-3">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Student</th>
          <th>Gender</th>
          <th>Distance (km)</th>
          <th>Status</th>
          <th>Requested</th>
          <th>Updated</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Build base SQL joining student to get gender
        $sql = "SELECT hr.id, hr.student_id, s.student_gender, hr.distance_km, hr.status, hr.created_at, hr.updated_at
                FROM hostel_requests hr
                INNER JOIN student s ON s.student_id = hr.student_id";
        $params = [];
        $types = '';
        if ($_SESSION['user_type'] === 'WAR' && $wardenGender) {
          $sql .= " WHERE s.student_gender = ?";
          $params[] = $wardenGender;
          $types .= 's';
        }
        $sql .= " ORDER BY hr.created_at DESC";

        if ($stmt = mysqli_prepare($con, $sql)) {
          if (!empty($params)) { mysqli_stmt_bind_param($stmt, $types, ...$params); }
          mysqli_stmt_execute($stmt);
          $res = mysqli_stmt_get_result($stmt);
          while ($res && ($r = mysqli_fetch_assoc($res))) {
            echo '<tr>';
            echo '<td>'.(int)$r['id'].'</td>';
            echo '<td>'.htmlspecialchars($r['student_id']).'</td>';
            $g = $r['student_gender'];
            $badge = ($g==='Male'?'primary':($g==='Female'?'danger':'secondary'));
            echo '<td><span class="badge badge-'.$badge.'">'.htmlspecialchars($g ?: 'N/A').'</span></td>';
            echo '<td>'.htmlspecialchars($r['distance_km']).'</td>';
            echo '<td><span class="badge badge-'.($r['status']==='paid'?'success':($r['status']==='pending_payment'?'warning':($r['status']==='allocated'?'info':'secondary'))).'">'.htmlspecialchars($r['status']).'</span></td>';
            echo '<td>'.htmlspecialchars($r['created_at']).'</td>';
            echo '<td>'.htmlspecialchars($r['updated_at']).'</td>';
            echo '<td class="d-flex">';
            // Mark paid
            echo '<form method="POST" action="'.$base.'/controller/HostelPaymentConfirm.php?back=/hostel/Requests.php" class="mr-2">';
            echo '<input type="hidden" name="student_id" value="'.htmlspecialchars($r['student_id']).'" />';
            echo '<button type="submit" class="btn btn-sm btn-success" '.($r['status']!=='pending_payment'?'disabled':'').'>Mark Paid</button>';
            echo '</form>';
            // Reject
            echo '<form method="POST" action="'.$base.'/controller/HostelRequestReject.php?back=/hostel/Requests.php" class="mr-2" onsubmit="return confirm(\'Reject this request?\')">';
            echo '<input type="hidden" name="student_id" value="'.htmlspecialchars($r['student_id']).'" />';
            echo '<button type="submit" class="btn btn-sm btn-danger" '.($r['status']==='allocated'?'disabled':'').'>Reject</button>';
            echo '</form>';
            // Assign link if paid
            $assignClasses = ($r['status'] === 'paid') ? 'btn btn-sm btn-primary' : 'btn btn-sm btn-secondary disabled';
            $assignAttrs = ($r['status'] === 'paid') ? '' : 'aria-disabled="true" tabindex="-1"';
            echo '<a class="'.$assignClasses.'" '.$assignAttrs.' href="'.$base.'/hostel/AssignHostel.php?student_id='.urlencode($r['student_id']).'">Assign</a>';
            echo '</td>';
            echo '</tr>';
          }
          mysqli_stmt_close($stmt);
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<?php include_once("../footer.php"); ?>
