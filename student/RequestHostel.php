<!------START DON'T CHANGE ORDER HEAD,MANU,FOOTER----->
<!---BLOCK 01--->
<?php 
// robust includes from student/
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../head.php';
// Show student top navigation on this page (place before sidebar so it spans full width)
require_once __DIR__ . '/top_nav.php';
require_once __DIR__ . '/../menu.php';

if (session_status() === PHP_SESSION_NONE) { session_start(); }
$user = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;
if (!$user) {
  echo '<div class="alert alert-danger m-3">You must be logged in to request hostel.</div>';
  require_once __DIR__ . '/../footer.php';
  exit;
}

// Fetch current student + dept info
$stu = [
  'student_fullname' => '',
  'student_dob' => '',
  'student_phone' => '',
  'student_address' => '',
  'student_zip' => '',
  'student_district' => '',
  'student_gender' => '',
  'student_nic' => '',
  'department_id' => '',
  'department_name' => '',
];

$sql = "SELECT s.student_fullname,s.student_dob,s.student_phone,s.student_address,s.student_zip,s.student_district,s.student_gender,s.student_nic, c.department_id, d.department_name
        FROM student s 
        JOIN student_enroll e ON e.student_id = s.student_id
        JOIN course c ON c.course_id = e.course_id
        JOIN department d ON d.department_id = c.department_id
        WHERE s.student_id = ? AND e.student_enroll_status = 'Following'
        ORDER BY e.academic_year DESC LIMIT 1";
if ($stmt = mysqli_prepare($con, $sql)) {
  mysqli_stmt_bind_param($stmt, 's', $user);
  if (mysqli_stmt_execute($stmt)) {
    $res = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($res)) {
      $stu = array_merge($stu, $row);
    }
  }
  mysqli_stmt_close($stmt);
}

// Handle submit
$successMsg = $errorMsg = '';
$requestId = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action']==='request_hostel') {
  $distance = isset($_POST['distance']) ? trim($_POST['distance']) : '';
  $req_date = isset($_POST['request_date']) ? trim($_POST['request_date']) : '';
  // normalize distance, allow numeric or values like "12km"
  if ($distance !== '') {
    $distance_num = preg_replace('/[^0-9.]/', '', $distance);
    if ($distance_num !== '') { $distance = $distance_num . 'km'; }
  }
  if ($distance === '' || $req_date === '') {
    $errorMsg = 'Please provide both Distance and Request Date.';
  } else {
    // ensure department id
    $dept = $stu['department_id'];
    if (!$dept && isset($_SESSION['department_code'])) {
      $dept = $_SESSION['department_code'];
    }
    if (!$dept) {
      $errorMsg = 'Missing department for the student. Please contact admin.';
    } else {
    // ensure not exists
    $chkSql = "SELECT hosttler_id FROM hostel_student_details WHERE student_id = ?";
    if ($chk = mysqli_prepare($con, $chkSql)) {
      mysqli_stmt_bind_param($chk, 's', $user);
      mysqli_stmt_execute($chk);
      $chkRes = mysqli_stmt_get_result($chk);
      if (mysqli_fetch_assoc($chkRes)) {
        $errorMsg = 'You already have a hostel record. Contact warden for changes.';
      } else {
        // insert with blank block/room, leaving date null
        $ins = "INSERT INTO hostel_student_details (student_id, department_id, distance, block_no, room_no, date_of_addmission, date_of_leaving) VALUES (?,?,?,?,?,?,NULL)";
        if ($st = mysqli_prepare($con, $ins)) {
          $block = '';
          $room = '';
          mysqli_stmt_bind_param($st, 'ssssss', $user, $dept, $distance, $block, $room, $req_date);
          if (mysqli_stmt_execute($st)) {
            $requestId = mysqli_insert_id($con);
            $successMsg = 'Hostel request submitted successfully.';
          } else {
            $errorMsg = 'Failed to submit request: ' . htmlspecialchars(mysqli_error($con));
          }
          mysqli_stmt_close($st);
        } else {
          $errorMsg = 'Failed to prepare insert statement: ' . htmlspecialchars(mysqli_error($con));
        }
      }
      mysqli_stmt_close($chk);
    }
    }
  }
}
?>
<!----END DON'T CHANGE THE ORDER---->

<!---BLOCK 02--->
<style>
  /* Hide sidebar and its toggle for a clean request page */
  #show-sidebar { display: none !important; }
  #sidebar { display: none !important; }
  .page-wrapper { padding-left: 0 !important; }
</style>
<div class="container mt-3">
  <h2 class="text-center">Hostel Request</h2>
  <p class="text-center">Submit a hostel request using your student details.</p>
  <?php if($successMsg): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?php echo htmlspecialchars($successMsg); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <?php if($requestId): ?>
    <div class="card mb-3" id="print-area">
      <div class="card-body">
        <h5 class="card-title">Hostel Request Receipt</h5>
        <p class="card-text">Request No: <strong><?php echo (int)$requestId; ?></strong></p>
        <p class="card-text">Student ID: <strong><?php echo htmlspecialchars($user); ?></strong></p>
        <p class="card-text">Name: <strong><?php echo htmlspecialchars($stu['student_fullname']); ?></strong></p>
        <p class="card-text">Department: <strong><?php echo htmlspecialchars($stu['department_name']); ?></strong></p>
        <p class="card-text">Distance: <strong><?php echo htmlspecialchars($distance); ?></strong></p>
        <p class="card-text">Request Date: <strong><?php echo htmlspecialchars($req_date); ?></strong></p>
      </div>
    </div>
    <button class="btn btn-outline-secondary mb-4" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
    <?php endif; ?>
  <?php endif; ?>
  <?php if($errorMsg): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?php echo htmlspecialchars($errorMsg); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
  <?php endif; ?>

  <form method="POST">
    <input type="hidden" name="action" value="request_hostel" />

    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Full Name</label>
        <input type="text" class="form-control" value="<?php echo htmlspecialchars($stu['student_fullname']); ?>" disabled>
      </div>
      <div class="form-group col-md-3">
        <label>Date of Birth</label>
        <input type="date" class="form-control" value="<?php echo htmlspecialchars($stu['student_dob']); ?>" disabled>
      </div>
      <div class="form-group col-md-3">
        <label>Phone</label>
        <input type="text" class="form-control" value="<?php echo htmlspecialchars($stu['student_phone']); ?>" disabled>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Address</label>
        <input type="text" class="form-control" value="<?php echo htmlspecialchars($stu['student_address']); ?>" disabled>
      </div>
      <div class="form-group col-md-3">
        <label>Postal Code</label>
        <input type="text" class="form-control" value="<?php echo htmlspecialchars($stu['student_zip']); ?>" disabled>
      </div>
      <div class="form-group col-md-3">
        <label>District</label>
        <input type="text" class="form-control" value="<?php echo htmlspecialchars($stu['student_district']); ?>" disabled>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-3">
        <label>Gender</label>
        <input type="text" class="form-control" value="<?php echo htmlspecialchars($stu['student_gender']); ?>" disabled>
      </div>
      <div class="form-group col-md-3">
        <label>NIC</label>
        <input type="text" class="form-control" value="<?php echo htmlspecialchars($stu['student_nic']); ?>" disabled>
      </div>
      <div class="form-group col-md-3">
        <label>Department</label>
        <input type="text" class="form-control" value="<?php echo htmlspecialchars($stu['department_name']); ?>" disabled>
      </div>
      <div class="form-group col-md-3">
        <label>Request Date</label>
        <input type="date" name="request_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Distance (Home to SLGTI) in Km</label>
        <input type="text" name="distance" class="form-control" placeholder="e.g., 12km or 12">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-4">
        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> Request</button>
      </div>
      <div class="form-group col-md-3">
        <a href="/MIS/student/Student_profile.php" class="btn btn-secondary">Cancel</a>
      </div>
    </div>

  </form>
</div>

<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php 
require_once __DIR__ . '/../footer.php';
?>
