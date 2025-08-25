<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once __DIR__ . '/../config.php';

// Access control: Admin only
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'ADM') {
  http_response_code(403);
  echo 'Forbidden: Admins only';
  exit;
}

// Helpers
function h($s){ return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }
$base = defined('APP_BASE') ? APP_BASE : '';

// Handle actions
$messages = [];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Single delete
  if (isset($_POST['delete_sid'])) {
    $sid = $_POST['delete_sid'];
    $stmt = mysqli_prepare($con, "UPDATE student SET student_status='Inactive' WHERE student_id=?");
    if ($stmt) {
      mysqli_stmt_bind_param($stmt, 's', $sid);
      mysqli_stmt_execute($stmt);
      $affected = mysqli_stmt_affected_rows($stmt);
      mysqli_stmt_close($stmt);
      if ($affected > 0) { $messages[] = "Student $sid set to Inactive"; }
      else { $errors[] = "No changes for $sid"; }
    } else {
      $errors[] = 'DB error (single)';
    }
  }
  // Bulk delete
  if (isset($_POST['bulk_action']) && $_POST['bulk_action'] === 'bulk_inactivate') {
    $sids = isset($_POST['sids']) && is_array($_POST['sids']) ? array_values(array_filter($_POST['sids'])) : [];
    if (!$sids) {
      $errors[] = 'No students selected for bulk inactivate.';
    } else {
      // Build a single UPDATE ... IN (...) with proper escaping
      $inParts = [];
      foreach ($sids as $sid) {
        $inParts[] = "'" . mysqli_real_escape_string($con, $sid) . "'";
      }
      $inList = implode(',', $inParts);
      $q = "UPDATE student SET student_status='Inactive' WHERE student_id IN (".$inList.")";
      if (mysqli_query($con, $q)) {
        $affected = mysqli_affected_rows($con);
        $messages[] = ($affected > 0) ? 'Selected students set to Inactive' : 'No rows updated';
      } else {
        $errors[] = 'Bulk update failed';
      }
    }
  }
  // Redirect to avoid resubmission
  if ($messages || $errors) {
    $_SESSION['flash_messages'] = $messages;
    $_SESSION['flash_errors'] = $errors;
    header('Location: ' . $base . '/student/ManageStudents.php');
    exit;
  }
}

// Flash
if (!empty($_SESSION['flash_messages'])) { $messages = $_SESSION['flash_messages']; unset($_SESSION['flash_messages']); }
if (!empty($_SESSION['flash_errors'])) { $errors = $_SESSION['flash_errors']; unset($_SESSION['flash_errors']); }

// Filters
$fid = isset($_GET['student_id']) ? trim($_GET['student_id']) : '';
$fstatus = isset($_GET['status']) ? $_GET['status'] : '';

$where = [];
$params = [];
$sql = "SELECT student_id, student_fullname, student_email, student_phone, student_status FROM student";
if ($fid !== '') {
  $where[] = "student_id = '" . mysqli_real_escape_string($con, $fid) . "'";
}
if ($fstatus !== '') {
  $where[] = "student_status = '" . mysqli_real_escape_string($con, $fstatus) . "'";
}
if ($where) { $sql .= ' WHERE ' . implode(' AND ', $where); }
$sql .= ' ORDER BY student_id DESC LIMIT 500';
$res = mysqli_query($con, $sql);

// Include standard head and menu to load CSS/JS
$title = 'Manage Students | SLGTI';
include_once __DIR__ . '/../head.php';
include_once __DIR__ . '/../menu.php';
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <h3>Manage Students (Admin)</h3>

      <?php foreach ($messages as $m): ?>
        <div class="alert alert-success"><?php echo h($m); ?></div>
      <?php endforeach; ?>
      <?php foreach ($errors as $e): ?>
        <div class="alert alert-danger"><?php echo h($e); ?></div>
      <?php endforeach; ?>

      <form class="form-inline mb-3" method="get" action="">
        <div class="form-group mr-2">
          <label for="fid" class="mr-2">Student ID</label>
          <input type="text" id="fid" name="student_id" class="form-control" value="<?php echo h($fid); ?>" placeholder="2025/AUT/...">
        </div>
        <div class="form-group mr-2">
          <label for="fstatus" class="mr-2">Status</label>
          <select id="fstatus" name="status" class="form-control">
            <option value="">-- Any --</option>
            <?php foreach (["Active","Inactive","Following","Completed","Suspended"] as $st): ?>
              <option value="<?php echo h($st); ?>" <?php echo ($fstatus===$st?'selected':''); ?>><?php echo h($st); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
      </form>

      <form method="post" onsubmit="return confirm('Inactivate selected students?');">
        <div class="mb-2">
          <button type="submit" name="bulk_action" value="bulk_inactivate" class="btn btn-danger btn-sm">Bulk Inactivate</button>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th><input type="checkbox" onclick="var c=this.checked; document.querySelectorAll('.sel').forEach(function(cb){cb.checked=c;});"></th>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($res && mysqli_num_rows($res) > 0): $i=0; while ($row = mysqli_fetch_assoc($res)): ?>
                <tr>
                  <td><input type="checkbox" class="sel" name="sids[]" value="<?php echo h($row['student_id']); ?>"></td>
                  <td><?php echo h($row['student_id']); ?></td>
                  <td><?php echo h($row['student_fullname']); ?></td>
                  <td><?php echo h($row['student_email']); ?></td>
                  <td><?php echo h($row['student_phone']); ?></td>
                  <td><?php echo h($row['student_status']); ?></td>
                  <td>
                    <?php 
                      $viewUrl = $base.'/student/Student_profile.php?Sid='.urlencode($row['student_id']);
                      $editUrl = $base.'/student/StudentEditAdmin.php?Sid='.urlencode($row['student_id']);
                    ?>
                    <a class="btn btn-sm btn-success" title="Edit" href="<?php echo $editUrl; ?>"><i class="far fa-edit"></i></a>
                    <a class="btn btn-sm btn-info" title="View" href="<?php echo $viewUrl; ?>"><i class="fas fa-angle-double-right"></i></a>
                    <button type="submit" name="delete_sid" value="<?php echo h($row['student_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Inactivate <?php echo h($row['student_id']); ?>?');"><i class="far fa-trash-alt"></i></button>
                  </td>
                </tr>
              <?php endwhile; else: ?>
                <tr><td colspan="7" class="text-center">No students found</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include_once __DIR__ . '/../footer.php'; ?>
