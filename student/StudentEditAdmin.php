<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once __DIR__ . '/../config.php';

// Admin only
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'ADM') {
  http_response_code(403);
  echo 'Forbidden: Admins only';
  exit;
}

function h($s){ return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }
$base = defined('APP_BASE') ? APP_BASE : '';

// Get student id
$sid = isset($_GET['Sid']) ? trim($_GET['Sid']) : (isset($_POST['Sid']) ? trim($_POST['Sid']) : '');
if ($sid === '') {
  $_SESSION['flash_errors'] = ['Missing Student ID'];
  header('Location: '.$base.'/student/ManageStudents.php');
  exit;
}

// Handle update
$messages = [];
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
  // Collect fields
  $fields = [
    'student_title','student_fullname','student_ininame','student_gender','student_email','student_nic','student_dob','student_phone','student_address',
    'student_zip','student_district','student_division','student_province','student_blood','student_mode',
    'student_em_name','student_em_relation','student_em_phone','student_status'
  ];
  $data = [];
  foreach ($fields as $f) { $data[$f] = isset($_POST[$f]) ? trim($_POST[$f]) : null; }

  $sql = "UPDATE student SET student_title=?, student_fullname=?, student_ininame=?, student_gender=?, student_email=?, student_nic=?, student_dob=?, student_phone=?, student_address=?, student_zip=?, student_district=?, student_division=?, student_province=?, student_blood=?, student_mode=?, student_em_name=?, student_em_relation=?, student_em_phone=?, student_status=? WHERE student_id=?";
  $stmt = mysqli_prepare($con, $sql);
  if ($stmt) {
    // 19 fields to update + 1 for WHERE student_id => 20 's'
    mysqli_stmt_bind_param($stmt, 'ssssssssssssssssssss',
      $data['student_title'],$data['student_fullname'],$data['student_ininame'],$data['student_gender'],$data['student_email'],$data['student_nic'],$data['student_dob'],$data['student_phone'],$data['student_address'],$data['student_zip'],$data['student_district'],$data['student_division'],$data['student_province'],$data['student_blood'],$data['student_mode'],$data['student_em_name'],$data['student_em_relation'],$data['student_em_phone'],$data['student_status'],$sid
    );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $_SESSION['flash_messages'] = ['Student updated successfully'];
    header('Location: '.$base.'/student/ManageStudents.php');
    exit;
  } else {
    $errors[] = 'Database error while preparing update';
  }
}

// Fetch student
$st = mysqli_prepare($con, "SELECT * FROM student WHERE student_id=? LIMIT 1");
if (!$st) {
  die('DB error');
}
mysqli_stmt_bind_param($st,'s',$sid);
mysqli_stmt_execute($st);
$res = mysqli_stmt_get_result($st);
$student = $res ? mysqli_fetch_assoc($res) : null;
mysqli_stmt_close($st);
if (!$student) {
  $_SESSION['flash_errors'] = ['Student not found'];
  header('Location: '.$base.'/student/ManageStudents.php');
  exit;
}

$title = 'Edit Student (Admin) | SLGTI';
include_once __DIR__ . '/../head.php';
include_once __DIR__ . '/../menu.php';
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <h3>Edit Student (Admin)</h3>
      <?php foreach ($errors as $e): ?>
        <div class="alert alert-danger"><?php echo h($e); ?></div>
      <?php endforeach; ?>
      <form method="post">
        <input type="hidden" name="Sid" value="<?php echo h($sid); ?>">
        <div class="card mb-3">
          <div class="card-header">Basic Info</div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-2">
                <label>Title</label>
                <input type="text" name="student_title" class="form-control" value="<?php echo h($student['student_title'] ?? ''); ?>">
              </div>
              <div class="form-group col-md-5">
                <label>Full Name</label>
                <input type="text" name="student_fullname" class="form-control" value="<?php echo h($student['student_fullname'] ?? ''); ?>" required>
              </div>
              <div class="form-group col-md-5">
                <label>Name with Initials</label>
                <input type="text" name="student_ininame" class="form-control" value="<?php echo h($student['student_ininame'] ?? ''); ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label>Gender</label>
                <select name="student_gender" class="form-control">
                  <?php foreach (['Male','Female','Other'] as $g): ?>
                    <option value="<?php echo h($g); ?>" <?php echo ((($student['student_gender'] ?? '')===$g)?'selected':''); ?>><?php echo h($g); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md-5">
                <label>Email</label>
                <input type="email" name="student_email" class="form-control" value="<?php echo h($student['student_email'] ?? ''); ?>">
              </div>
              <div class="form-group col-md-4">
                <label>NIC</label>
                <input type="text" name="student_nic" class="form-control" value="<?php echo h($student['student_nic'] ?? ''); ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label>Date of Birth</label>
                <input type="date" name="student_dob" class="form-control" value="<?php echo h($student['student_dob'] ?? ''); ?>">
              </div>
              <div class="form-group col-md-3">
                <label>Phone</label>
                <input type="text" name="student_phone" class="form-control" value="<?php echo h($student['student_phone'] ?? ''); ?>">
              </div>
              <div class="form-group col-md-6">
                <label>Address</label>
                <input type="text" name="student_address" class="form-control" value="<?php echo h($student['student_address'] ?? ''); ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-2">
                <label>Zip</label>
                <input type="text" name="student_zip" class="form-control" value="<?php echo h($student['student_zip'] ?? ''); ?>">
              </div>
              <div class="form-group col-md-3">
                <label>District</label>
                <input type="text" name="student_district" class="form-control" value="<?php echo h($student['student_district'] ?? ''); ?>">
              </div>
              <div class="form-group col-md-3">
                <label>Division</label>
                <input type="text" name="student_division" class="form-control" value="<?php echo h($student['student_division'] ?? ''); ?>">
              </div>
              <div class="form-group col-md-2">
                <label>Province</label>
                <input type="text" name="student_province" class="form-control" value="<?php echo h($student['student_province'] ?? ''); ?>">
              </div>
              <div class="form-group col-md-2">
                <label>Blood Group</label>
                <input type="text" name="student_blood" class="form-control" value="<?php echo h($student['student_blood'] ?? ''); ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label>Mode</label>
                <input type="text" name="student_mode" class="form-control" value="<?php echo h($student['student_mode'] ?? ''); ?>">
              </div>
              <div class="form-group col-md-3">
                <label>Status</label>
                <select name="student_status" class="form-control">
                  <?php $statuses=['Active','Following','Completed','Suspended','Inactive']; foreach($statuses as $st): ?>
                    <option value="<?php echo h($st); ?>" <?php echo ((($student['student_status'] ?? '')===$st)?'selected':''); ?>><?php echo h($st); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="card mb-3">
          <div class="card-header">Emergency Contact</div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Name</label>
                <input type="text" name="student_em_name" class="form-control" value="<?php echo h($student['student_em_name'] ?? ''); ?>">
              </div>
              <div class="form-group col-md-4">
                <label>Relation</label>
                <input type="text" name="student_em_relation" class="form-control" value="<?php echo h($student['student_em_relation'] ?? ''); ?>">
              </div>
              <div class="form-group col-md-4">
                <label>Phone</label>
                <input type="text" name="student_em_phone" class="form-control" value="<?php echo h($student['student_em_phone'] ?? ''); ?>">
              </div>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <button type="submit" name="save" class="btn btn-primary">Save Changes</button>
          <a class="btn btn-secondary" href="<?php echo $base; ?>/student/ManageStudents.php">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include_once __DIR__ . '/../footer.php'; ?>
