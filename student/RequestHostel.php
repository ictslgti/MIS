<?php 
// robust includes from student/
require_once __DIR__ . '/../config.php';

// Start output buffering to prevent premature output issues
if (!headers_sent()) { ob_start(); }

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
  // Enforce one-time request: prevent if already exists in hostel_requests
  $alreadyRequested = false;
  if ($chk = mysqli_prepare($con, 'SELECT 1 FROM hostel_requests WHERE student_id = ? LIMIT 1')) {
    mysqli_stmt_bind_param($chk, 's', $user);
    mysqli_stmt_execute($chk);
    mysqli_stmt_store_result($chk);
    $alreadyRequested = mysqli_stmt_num_rows($chk) > 0;
    mysqli_stmt_close($chk);
  }
  if ($alreadyRequested) {
    $errorMsg = 'You have already submitted a hostel request. It cannot be submitted again online.';
  } else {
  // normalize distance for display and numeric decimal(6,2) for hostel_requests
  $distance_km = null; // float for hostel_requests.distance_km
  if ($distance !== '') {
    $distance_num = preg_replace('/[^0-9.]/', '', $distance);
    if ($distance_num !== '') {
      $distance_km = round((float)$distance_num, 2);
      $distance = number_format($distance_km, 2, '.', '') . 'km';
    }
  }
  if ($distance === '' || $req_date === '') {
    $errorMsg = 'Please provide both Distance and Request Date.';
  } elseif ($distance_km === null) {
    $errorMsg = 'Distance must be a number (e.g., 12 or 12.5).';
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
        // insert with blank block/room. Some DBs may not have date_of_leaving; detect and adapt.
        $block = '';
        $room = '';
        $hasLeaving = false;
        if ($colRes = mysqli_query($con, "SHOW COLUMNS FROM hostel_student_details LIKE 'date_of_leaving'")) {
          $hasLeaving = (mysqli_num_rows($colRes) > 0);
          mysqli_free_result($colRes);
        }
        if ($hasLeaving) {
          $ins = "INSERT INTO hostel_student_details (student_id, department_id, distance, block_no, room_no, date_of_addmission, date_of_leaving) VALUES (?,?,?,?,?,?,?)";
          if ($st = mysqli_prepare($con, $ins)) {
            $leaving = '0000-00-00';
            mysqli_stmt_bind_param($st, 'sssssss', $user, $dept, $distance, $block, $room, $req_date, $leaving);
          } else {
            $errorMsg = 'Failed to prepare insert statement: ' . htmlspecialchars(mysqli_error($con));
          }
        } else {
          $ins = "INSERT INTO hostel_student_details (student_id, department_id, distance, block_no, room_no, date_of_addmission) VALUES (?,?,?,?,?,?)";
          if ($st = mysqli_prepare($con, $ins)) {
            mysqli_stmt_bind_param($st, 'ssssss', $user, $dept, $distance, $block, $room, $req_date);
          } else {
            $errorMsg = 'Failed to prepare insert statement: ' . htmlspecialchars(mysqli_error($con));
          }
        }
        if (isset($st) && $st) {
          if (mysqli_stmt_execute($st)) {
            $requestId = mysqli_insert_id($con);
            $successMsg = 'Hostel request submitted successfully.';
            // Ensure hostel_requests exists with expected schema, then upsert
            $createHr = "CREATE TABLE IF NOT EXISTS `hostel_requests` (
              `id` int unsigned NOT NULL AUTO_INCREMENT,
              `student_id` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
              `distance_km` decimal(6,2) NOT NULL,
              `status` enum('pending_payment','paid','allocated','rejected') NOT NULL DEFAULT 'pending_payment',
              `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
              `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              PRIMARY KEY (`id`),
              UNIQUE KEY `uniq_student` (`student_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci";
            mysqli_query($con, $createHr);
            // Also record into hostel_requests table (decimal distance_km, enum status), insert-only
            if ($distance_km !== null) {
              if ($hr = mysqli_prepare($con, "INSERT INTO hostel_requests (student_id, distance_km, status) VALUES (?, ?, 'pending_payment')")) {
                mysqli_stmt_bind_param($hr, 'sd', $user, $distance_km);
                if (!mysqli_stmt_execute($hr)) {
                  // don't override success message, but expose detail if needed
                  $errorMsg = 'Saved but failed to log in hostel_requests: ' . htmlspecialchars(mysqli_stmt_error($hr));
                }
                mysqli_stmt_close($hr);
              } else {
                $errorMsg = 'Saved but failed to prepare hostel_requests insert: ' . htmlspecialchars(mysqli_error($con));
              }
            }
          } else {
            $errorMsg = 'Failed to submit request: ' . htmlspecialchars(mysqli_stmt_error($st));
          }
          mysqli_stmt_close($st);
        }
      }
      mysqli_stmt_close($chk);
    }
    }
  }
}

// Include layout only after processing to avoid premature HTML output
require_once __DIR__ . '/../head.php';
require_once __DIR__ . '/top_nav.php';
require_once __DIR__ . '/../menu.php';
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
  <?php
    // Pre-check: has the student already submitted a hostel request?
    $alreadyRequestedView = false;
    if ($chk2 = mysqli_prepare($con, 'SELECT 1 FROM hostel_requests WHERE student_id = ? LIMIT 1')) {
      mysqli_stmt_bind_param($chk2, 's', $user);
      mysqli_stmt_execute($chk2);
      mysqli_stmt_store_result($chk2);
      $alreadyRequestedView = mysqli_stmt_num_rows($chk2) > 0;
      mysqli_stmt_close($chk2);
    }
  ?>

  <?php if ($alreadyRequestedView): ?>
    <div class="alert alert-info">You have already submitted a hostel request. You cannot submit another online. Please contact the hostel warden for any changes.</div>
  <?php else: ?>
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
  <?php endif; ?>
</div>

<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php 
require_once __DIR__ . '/../footer.php';
// Flush buffered output safely
if (function_exists('ob_get_level') && ob_get_level() > 0) { @ob_end_flush(); }
?>
