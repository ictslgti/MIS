<?php 
/** START DON'T CHANGE ORDER HEAD, MENU, FOOTER (converted to PHP comment to avoid early output) */
// Start output buffering so we can safely send redirects after includes
if (!headers_sent()) { ob_start(); }

// Always include root-level files using absolute paths
require_once __DIR__ . '/../config.php';


// Check once if optional last-updated column exists
$hasUpdatedAt = false;
$__col = mysqli_query($con, "SHOW COLUMNS FROM `student` LIKE 'student_updated_at'");
if ($__col && mysqli_num_rows($__col) === 1) { $hasUpdatedAt = true; }
if ($__col) { mysqli_free_result($__col); }

// Handle profile updates for logged-in student (no Sid view) BEFORE output
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_profile' && !isset($_GET['Sid'])) {
  if (session_status() === PHP_SESSION_NONE) { session_start(); }
  $loggedUser = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;
  if ($loggedUser) {
    $p_title   = isset($_POST['title']) ? trim($_POST['title']) : null;
    $p_fname   = isset($_POST['fullname']) ? trim($_POST['fullname']) : null;
    $p_ininame = isset($_POST['ininame']) ? trim($_POST['ininame']) : null;
    $p_gender  = isset($_POST['gender']) ? trim($_POST['gender']) : null;
    $p_civil   = isset($_POST['civil']) ? trim($_POST['civil']) : null;
    $p_dob     = isset($_POST['dob']) ? trim($_POST['dob']) : null;
    $p_blood   = isset($_POST['blood']) ? trim($_POST['blood']) : null;
    $u_email   = isset($_POST['email']) ? trim($_POST['email']) : null;
    $u_phone   = isset($_POST['phone']) ? trim($_POST['phone']) : null;
    $u_address = isset($_POST['address']) ? trim($_POST['address']) : null;
    $u_zip     = isset($_POST['zip']) ? trim($_POST['zip']) : null;
    $u_district= isset($_POST['district']) ? trim($_POST['district']) : null;
    $u_division= isset($_POST['division']) ? trim($_POST['division']) : null;
    $u_province= isset($_POST['province']) ? trim($_POST['province']) : null;
    $u_ename   = isset($_POST['ename']) ? trim($_POST['ename']) : null;
    $u_ephone  = isset($_POST['ephone']) ? trim($_POST['ephone']) : null;
    $u_eaddress= isset($_POST['eaddress']) ? trim($_POST['eaddress']) : null;
    $u_erel    = isset($_POST['erelation']) ? trim($_POST['erelation']) : null;

    $sqlUpd = "UPDATE student SET student_title=?, student_fullname=?, student_ininame=?, student_gender=?, student_civil=?, student_dob=?, student_blood=?, student_email=?, student_phone=?, student_address=?, student_zip=?, student_district=?, student_divisions=?, student_provice=?, student_em_name=?, student_em_phone=?, student_em_address=?, student_em_relation=? WHERE student_id=?";
    if ($stmt = mysqli_prepare($con, $sqlUpd)) {
      mysqli_stmt_bind_param($stmt, 'sssssssssssssssssss', $p_title, $p_fname, $p_ininame, $p_gender, $p_civil, $p_dob, $p_blood, $u_email, $u_phone, $u_address, $u_zip, $u_district, $u_division, $u_province, $u_ename, $u_ephone, $u_eaddress, $u_erel, $loggedUser);
      if (mysqli_stmt_execute($stmt)) {
        if ($hasUpdatedAt) {
          if ($ts = mysqli_prepare($con, "UPDATE student SET student_updated_at=NOW() WHERE student_id=?")) {
            mysqli_stmt_bind_param($ts, 's', $loggedUser);
            mysqli_stmt_execute($ts);
            mysqli_stmt_close($ts);
          }
        }
        // Clean buffer and redirect (PRG)
        if (!headers_sent()) {
          header('Location: /student/Student_profile.php?updated=1');
        } else {
          echo '<script>window.location.href = "/student/Student_profile.php?updated=1";</script>';
        }
        exit;
      } else {
        // fall-through to page render with error alert
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Failed to update profile. Please try again.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
      }
      mysqli_stmt_close($stmt);
    }
  }
}

$title ="STUDENT PROFILE | SLGTI"; //YOUR HEAD TITLE CREATE VARIABLE BEFORE FILE NAME
require_once __DIR__ . '/../head.php';
require_once __DIR__ . '/../menu.php';
?>
<?php /** END DON'T CHANGE THE ORDER (moved to PHP comment) */ ?>


<!---BLOCK 02--->
<!---START YOUR CODER HERE----->


<!-----END YOUR CODE----->
<?php
// Show flash message after redirects (PRG pattern)
if (isset($_GET['updated']) && $_GET['updated'] === '1' && !isset($_GET['Sid'])) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Profile updated successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
}
$stid = $title = $fname = $ininame = $gender = $civil = $img = $email = $nic = $dob = $phone = $address = $zip = $district = $division = $province = $blood = $mode = $depth = $level =
$ename = $eaddress = $ephone = $id =$erelation = $enstatus = $coid = $year = $enroll = $exit = $qutype = $index = $yoe = $subject = $results = $pass = $npass = $cpass = $updatedAt = null;

// (removed duplicate POST handler; handled at the top before any output)
// Handle profile image upload for logged-in student (no Sid view)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['do_upload']) && !isset($_GET['Sid'])) {
  if (session_status() === PHP_SESSION_NONE) { session_start(); }
  $loggedUser = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;
  if ($loggedUser && isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $tmpName = $_FILES['image']['tmp_name'];
    // No server-side size limit here; relies on PHP upload_max_filesize/post_max_size
      $imgData = file_get_contents($tmpName);
      if ($imgData !== false) {
        // Optional: basic type check
        $mime = null;
        if (class_exists('finfo')) {
          $fi = new finfo(FILEINFO_MIME_TYPE);
          $mime = $fi ? $fi->buffer($imgData) : null;
        }
        $allowed = ['image/jpeg','image/png','image/gif','image/webp'];
        if ($mime !== null && !in_array($mime, $allowed, true)) {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">Unsupported image type. Use JPG, PNG, GIF, or WEBP.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        } else {
          $sqlUpdImg = "UPDATE student SET student_profile_img=? WHERE student_id=?";
          if ($stmt = mysqli_prepare($con, $sqlUpdImg)) {
            // Bind and execute. MySQLi prepared statements handle BLOBs as strings.
            mysqli_stmt_bind_param($stmt, 'ss', $imgData, $loggedUser);
            if (mysqli_stmt_execute($stmt)) {
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Profile image updated.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            } else {
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Failed to update image.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            }
            mysqli_stmt_close($stmt);
          }
        }
      }
  }
}
if(isset($_GET['Sid']))
{
 $username =$_GET['Sid'];
 $sql = "SELECT user_name,e.course_id,`student_title`,`student_fullname`,`student_profile_img`,`student_ininame`,`student_gender`,`student_civil`,`student_email`,`student_nic`,`student_profile_img`,
`student_dob`,`student_phone`,`student_address`,`student_zip`,`student_district`,`student_divisions`,`student_provice`,`student_blood`,`student_em_name`,`student_em_address`,
`student_em_phone`,`student_em_relation`,`student_status`,`course_name`,`department_name`,`course_mode`,course_nvq_level,`academic_year`,`student_enroll_date`,`student_enroll_exit_date`,
`student_enroll_status`,`user_password_hash`" . ($hasUpdatedAt ? ", `student_updated_at`" : "") . " FROM `student` as s, student_enroll as e, user as u, course as c, department as d WHERE user_name=s.student_id and s.student_id=e.student_id 
 and e.course_id=c.course_id and  c.department_id=d.department_id and `student_enroll_status`='Following' and user_name='$username'";
$result = mysqli_query($con,$sql);

  if(mysqli_num_rows($result)==1)
  {
    //echo "success";
    $row =mysqli_fetch_assoc($result);
    //$stid = $row['student_id'];
    $title = $row['student_title'];
    $fname = $row['student_fullname'];
    $ininame = $row['student_ininame'];
    $gender = $row['student_gender'];
    $civil = $row['student_civil'];
    $email = $row['student_email'];
    $nic = $row['student_nic'];
    $dob = $row['student_dob'];
    $phone = $row['student_phone'];
    $address = $row['student_address'];
    $zip = $row['student_zip'];
    $district = $row['student_district'];
    $division = $row['student_divisions'];
    $province = $row['student_provice'];
    $blood = $row['student_blood'];
    $ename = $row['student_em_name'];
    $eaddress = $row['student_em_address'];
    $ephone = $row['student_em_phone'];
    $erelation = $row['student_em_relation'];
    $coid = $row['course_name'];
    $depth = $row['department_name'];
    $level = $row['course_nvq_level'];
    $mode = $row['course_mode'];
    $year = $row['academic_year'];
    $enstatus =$row['student_enroll_status'];
    $enroll = $row['student_enroll_date'];
    $exit = $row['student_enroll_exit_date'];
    $id=$row['course_id'];
    $pass=$row['user_password_hash'];
    $img=$row['student_profile_img'];
    if ($hasUpdatedAt && isset($row['student_updated_at'])) { $updatedAt = $row['student_updated_at']; }
  }
}
else
{
$username = $_SESSION['user_name'];

$sql = "SELECT user_name,e.course_id,`student_title`,`student_fullname`,`student_profile_img`,`student_ininame`,`student_gender`,`student_civil`,`student_email`,`student_nic`,`student_profile_img`,
`student_dob`,`student_phone`,`student_address`,`student_zip`,`student_district`,`student_divisions`,`student_provice`,`student_blood`,`student_em_name`,`student_em_address`,
`student_em_phone`,`student_em_relation`,`student_status`,`course_name`,`department_name`,`course_mode`,course_nvq_level,`academic_year`,`student_enroll_date`,`student_enroll_exit_date`,
`student_enroll_status`,`user_password_hash` FROM `student` as s, student_enroll as e, user as u, course as c, department as d WHERE user_name=s.student_id and s.student_id=e.student_id 
 and e.course_id=c.course_id and  c.department_id=d.department_id and `student_enroll_status`='Following' and user_name='$username'";
$result = mysqli_query($con,$sql);

  if(mysqli_num_rows($result)==1)
  {
    //echo "success";
    $row =mysqli_fetch_assoc($result);
    //$stid = $row['student_id'];
    $title = $row['student_title'];
    $fname = $row['student_fullname'];
    $ininame = $row['student_ininame'];
    $gender = $row['student_gender'];
    $civil = $row['student_civil'];
    $email = $row['student_email'];
    $nic = $row['student_nic'];
    $dob = $row['student_dob'];
    $phone = $row['student_phone'];
    $address = $row['student_address'];
    $zip = $row['student_zip'];
    $district = $row['student_district'];
    $division = $row['student_divisions'];
    $province = $row['student_provice'];
    $blood = $row['student_blood'];
    $ename = $row['student_em_name'];
    $eaddress = $row['student_em_address'];
    $ephone = $row['student_em_phone'];
    $erelation = $row['student_em_relation'];
    $coid = $row['course_name'];
    $depth = $row['department_name'];
    $level = $row['course_nvq_level'];
    $mode = $row['course_mode'];
    $year = $row['academic_year'];
    $enstatus =$row['student_enroll_status'];
    $enroll = $row['student_enroll_date'];
    $exit = $row['student_enroll_exit_date'];
    $id=$row['course_id'];
    $pass=$row['user_password_hash'];
    $img=$row['student_profile_img'];
  }
}

// Compute simple profile completion percentage for progress bar
$__profileFields = [
  $fname, $ininame, $gender, $dob, $civil, $blood,
  $email, $phone, $address, $province, $district, $zip, $division,
  $ename, $ephone, $eaddress, $erelation
];
$__total = count($__profileFields) + 1; // +1 for profile image
$__filled = 0;
foreach ($__profileFields as $__f) { if (!empty($__f)) { $__filled++; } }
if (!empty($img)) { $__filled++; }
$profileCompletion = $__total > 0 ? (int)round($__filled * 100 / $__total) : 0;

//<!-- password change -->


    
// if(isset($_POST['Save Changes']))
// {
//     //echo "hi";
// if(!empty($_POST['password']) && !empty($_POST['npassword']) && (!empty($_POST['cpassword']))
// {
//     if((isset($_POST['password']) == (isset($pass)))
//     {
//         if((isset($_POST['npassword'])) == (isset($_POST['cpassword'])))
//         {

//         }
//         else
//         {
//             echo "Please check password Field";
//         }
//     }
//     else
//     {
//         echo "wrong password";
//     }
// }
// else
// {
//     echo "please fill Required field";
// }
// }

?>
<?php
// if(isset($_POST["insert"]))
// {
//     $file = addcslashes(file_get_contents($_FILES["image"]["tmp_name"]));
//     $query = "UPDATE `student` SET `student_profile_img`='$file' WHERE `student_id`='$username'";
//     if(mysqli_query($con,$query))
//     {
//         echo '<script> alert("Images Insert into Databases") </script>';
//     }
// }
?>
<!-- form start---->
<div class="col text-center shadow p-5 mb-5 bg-white rounded">
<h1 style="text-align:center"  > SRI LANKA GERMAN TRAINING INSTITUTE  </h1>
<h5 style="text-align:center"> Killinochchi </h5>
</div>

<!-- Balance + Placeholder Row -->
<div class="form-row shadow p-2 mb-4 bg-white rounded">
  <div class="col-md-6 mb-3">
    <div class="card border-0">
      <div class="card-body p-3">
        <h6 class="card-title mb-2">Balance</h6>
        <div class="d-flex align-items-baseline">
          <span class="h4 mb-0 mr-2">Rs. <span id="student-balance">—</span></span>
          <a class="btn btn-sm btn-outline-primary ml-auto" href="/payment/Payments.php?Sid=<?php echo urlencode($username); ?>">View Payments</a>
        </div>
        <small class="text-muted d-block mt-1">Outstanding amount for current course</small>
      </div>
    </div>
  </div>
  <div class="col-md-6 mb-3">
    <div class="card border-0">
      <div class="card-body p-3">
        <h6 class="card-title mb-2">Summary</h6>
        <div class="text-muted">No data available</div>
      </div>
    </div>
  </div>
</div>

<div class="container">
<form method="POST" enctype="multipart/form-data">

<div class="form-row shadow p-2 mb-4 bg-white rounded">
    <div class="col-md-3 mb-3 " > 
    <img src="/student/get_student_image.php?Sid=<?php echo urlencode($username); ?>&t=<?php echo time(); ?>" alt="user image" class="img-thumbnail rounded-circle" style="width:200px;height:200px;object-fit:cover;">
    <?php
    // $query= "select `student_profile_img` from student where student_id='$username'";
    // $result=mysqli_query($con,$query);
    // if(mysqli_num_rows($result)==1)
    // {
    // echo '';
    // }
    ?>
    <?php if(!isset($_GET['Sid'])): ?>
      <div class="mt-2">
        <div class="form-group mb-2">
          <input type="hidden" name="do_upload" value="1" />
          <input type="file" name="image" id="image" accept="image/*" class="form-control-file d-none" />
          <button type="button" id="triggerImageUpload" class="btn btn-sm btn-outline-primary">Upload New Photo</button>
        </div>
        <div class="text-muted small mt-1">
          <strong>Photo Guidelines:</strong>
          <ul class="mb-0 pl-3">
            <li>Photo Size: Standard passport size</li>
            <li>Background: Blue</li>
            <li>Boys' Dress Code: White shirt with black trousers, proper haircut, clean-shaven</li>
            <li>Girls' Dress Code: White blouse with black skirt/trousers, neat hairstyle</li>
          </ul>
        </div>
        <noscript>
          <button type="submit" class="btn btn-sm btn-outline-primary">Upload</button>
        </noscript>
      </div>
    <?php endif; ?>
    <script>
      (function(){
        var btn = document.getElementById('triggerImageUpload');
        var file = document.getElementById('image');
        if (btn && file) {
          btn.addEventListener('click', function(){ file.click(); });
          file.addEventListener('change', function(){
            if (file.files && file.files.length) {
              // Auto-submit the parent form to upload immediately
              var form = file.closest('form');
              if (form) form.submit();
            }
          });
        }
      })();
    </script>
    
    <!-- <button type="button" class="btn btn-outline-success">Success</button> -->
    </div>
    <div class="col-md-7 col-sm-4">
        <div class="d-flex justify-content-between align-items-start flex-wrap">
          <div class="mb-2">
            <h5 class="text-muted mb-1"><b><?php echo htmlspecialchars(($title? $title.'. ' : '').$fname); ?></b></h5>
            <div class="text-muted small">ID: <?php echo htmlspecialchars($username); ?> | NIC: <?php echo htmlspecialchars($nic); ?></div>
            <?php if ($hasUpdatedAt): ?>
            <small class="text-muted d-block">Last Edited: <?php echo $updatedAt ? date('Y-m-d H:i', strtotime($updatedAt)) : 'N/A'; ?></small>
            <?php endif; ?>
          </div>
          <?php if(!isset($_GET['Sid'])): ?>
          <div class="mb-2">
            <a class="btn btn-sm btn-primary" href="/student/Student_profile.php?edit=1">Edit Profile</a>
          </div>
          <?php endif; ?>
        </div>
        <div class="mb-2">
          <a class="btn btn-sm btn-outline-secondary" target="_blank" href="/library/pdf/student_application.php?Sid=<?php echo urlencode($username); ?>">Application PDF</a>
          <a class="btn btn-sm btn-outline-secondary" target="_blank" href="/library/pdf/Student Code of Conduct.pdf">Student Code of Conduct</a>
          <a class="btn btn-sm btn-outline-secondary" target="_blank" href="/library/pdf/hostel_request.php?Sid=<?php echo urlencode($username); ?>">Hostel Request PDF</a>
        </div>
        <div class="mb-1">
          <?php if ($depth): ?>
            <span class="badge badge-info mr-1">Department: <?php echo htmlspecialchars($depth); ?></span>
          <?php endif; ?>
          <?php if ($coid): ?>
            <span class="badge badge-secondary mr-1">Course: <?php echo htmlspecialchars($coid); ?></span>
          <?php endif; ?>
          <?php if ($level): ?>
            <span class="badge badge-light border mr-1">Level: <?php echo htmlspecialchars($level); ?></span>
          <?php endif; ?>
          <?php if ($year): ?>
            <span class="badge badge-light border mr-1">Batch: <?php echo htmlspecialchars($year); ?><?php echo $exit ? ' ( '.htmlspecialchars($exit).' )' : ''; ?></span>
          <?php endif; ?>
        </div>
        <div class="mt-2">
          <label class="small text-muted mb-1">Profile completion</label>
          <div class="progress" style="height: 10px;">
            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $profileCompletion; ?>%;" aria-valuenow="<?php echo $profileCompletion; ?>" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <small class="text-muted"><?php echo $profileCompletion; ?>%</small>
        </div>
    </div>
    <!-- <div class="col-md-4 col-sm-4 shadow p-3 mb-5 bg-white rounded">
    <h5 style="border-bottom: 2px solid #aaa;"> Personal Information </h5>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    </div> -->
</div>

<!-- <div class="form-row shadow p-2 mb-4 bg-white rounded"> -->
<nav>
  <div class="nav nav-tabs shadow p-2 mb-4 bg-white rounded" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Personal Info</a>
    <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Qualification Info</a>
    <a class="nav-item nav-link" id="nav-modules-tab" data-toggle="tab" href="#nav-modules" role="tab" aria-controls="nav-modules" aria-selected="false">Modules Info</a> -->
  </div>
</nav>
<div class="tab-content shadow p-2 mb-4 bg-white rounded" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><br>
        <?php if(!isset($_GET['edit'])): ?>
        <h5 style="border-bottom: 2px solid #aaa;"> Personal Information </h5><br>
        <div class="row" id="personal info">
            <div class="col-md-2 col-sm-4">
            <h6> Name with Initials: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo $title.".".$ininame; ?> </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Gender: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo htmlspecialchars($gender ?: '—'); ?> </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Date of Birth: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo htmlspecialchars($dob ?: '—'); ?> </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Civil Status: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo htmlspecialchars($civil ?: '—'); ?> </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Enroll Date:  </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo htmlspecialchars($enroll ?: '—'); ?> </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6>Exit Date:</h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo htmlspecialchars($exit ?: '—'); ?> </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Blood Group: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo htmlspecialchars($blood ?: '—'); ?>  </h6>
            </div>
            <?php if ($hasUpdatedAt): ?>
            <div class="col-md-2 col-sm-4">
                <h6> Last Edited: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo $updatedAt ? date('Y-m-d H:i', strtotime($updatedAt)) : 'N/A'; ?> </h6>
            </div>
            <?php endif; ?>
        </div><br>
        <?php endif; ?>
        <?php if(isset($_GET['edit']) && !isset($_GET['Sid'])): ?>
        <h5 style="border-bottom: 2px solid #aaa;"> Edit Personal Information </h5><br>
        <div class="row">
          <div class="col-12">
            <input type="hidden" name="action" value="update_profile" />
            <div class="d-flex justify-content-end mb-3">
              <button type="submit" class="btn btn-success">Save Changes</button>
              <a href="/student/Student_profile.php" class="btn btn-secondary ml-2">Cancel</a>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label>Title</label>
                <select class="form-control" name="title">
                  <?php $__titles = ['Mr','Mrs','Ms']; ?>
                  <?php foreach ($__titles as $__t): ?>
                    <option value="<?php echo $__t; ?>" <?php echo ($title===$__t)?'selected':''; ?>><?php echo $__t; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md-5">
                <label>Full Name</label>
                <input type="text" class="form-control" name="fullname" value="<?php echo htmlspecialchars($fname); ?>" />
              </div>
              <div class="form-group col-md-4">
                <label>Name with Initials</label>
                <input type="text" class="form-control" name="ininame" value="<?php echo htmlspecialchars($ininame); ?>" />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Gender</label>
                <select class="form-control" name="gender">
                  <option value="Male" <?php echo ($gender==='Male')?'selected':''; ?>>Male</option>
                  <option value="Female" <?php echo ($gender==='Female')?'selected':''; ?>>Female</option>
                  <option value="Other" <?php echo ($gender==='Other')?'selected':''; ?>>Other</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label>Civil Status</label>
                <select class="form-control" name="civil">
                  <option value="Single" <?php echo ($civil==='Single')?'selected':''; ?>>Single</option>
                  <option value="Married" <?php echo ($civil==='Married')?'selected':''; ?>>Married</option>
                  <option value="Other" <?php echo ($civil==='Other')?'selected':''; ?>>Other</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label>Date of Birth</label>
                <input type="date" class="form-control" name="dob" value="<?php echo htmlspecialchars($dob); ?>" />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Blood Group</label>
                <input type="text" class="form-control" name="blood" value="<?php echo htmlspecialchars($blood); ?>" />
              </div>
            </div>
        
        <h5 style="border-bottom: 2px solid #aaa;"> Edit Contact & Emergency Info </h5><br>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($email); ?>" />
              </div>
              <div class="form-group col-md-6">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($phone); ?>" />
              </div>
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($address); ?>" />
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Province</label>
                <select class="form-control" id="provinceSelect" name="province"></select>
              </div>
              <div class="form-group col-md-4">
                <label>District</label>
                <select class="form-control" id="districtSelect" name="district"></select>
              </div>
              <div class="form-group col-md-4">
                <label>Zip</label>
                <input type="text" class="form-control" name="zip" value="<?php echo htmlspecialchars($zip); ?>" />
              </div>
            </div>
            <script>
              (function(){
                // Sri Lanka provinces and districts
                const pd = {
                  "Western": ["Colombo","Gampaha","Kalutara"],
                  "Central": ["Kandy","Matale","Nuwara Eliya"],
                  "Southern": ["Galle","Matara","Hambantota"],
                  "Northern": ["Jaffna","Kilinochchi","Mannar","Mullaitivu","Vavuniya"],
                  "Eastern": ["Trincomalee","Batticaloa","Ampara"],
                  "North Western": ["Kurunegala","Puttalam"],
                  "North Central": ["Anuradhapura","Polonnaruwa"],
                  "Uva": ["Badulla","Monaragala"],
                  "Sabaragamuwa": ["Kegalle","Ratnapura"]
                };
                const provSel = document.getElementById('provinceSelect');
                const distSel = document.getElementById('districtSelect');
                if (!provSel || !distSel) return;
                const currentProv = <?php echo json_encode($province); ?> || '';
                const currentDist = <?php echo json_encode($district); ?> || '';

                function renderProvinces(){
                  provSel.innerHTML = '<option value="">Select Province</option>' +
                    Object.keys(pd).map(p => `<option value="${p}">${p}</option>`).join('');
                  if (currentProv && pd[currentProv]) provSel.value = currentProv;
                }
                function renderDistricts(prov){
                  const list = pd[prov] || [];
                  distSel.innerHTML = '<option value="">Select District</option>' +
                    list.map(d => `<option value="${d}">${d}</option>`).join('');
                  if (prov === currentProv && list.includes(currentDist)) distSel.value = currentDist;
                }
                provSel.addEventListener('change', function(){ renderDistricts(this.value); });
                // init
                renderProvinces();
                renderDistricts(currentProv);
              })();
            </script>
            <div class="form-group">
              <label>Divisional Secretariat</label>
              <input type="text" class="form-control" name="division" value="<?php echo htmlspecialchars($division); ?>" />
            </div>
            <h6 class="mt-3">Emergency Contact</h6>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Name</label>
                <input type="text" class="form-control" name="ename" value="<?php echo htmlspecialchars($ename); ?>" />
              </div>
              <div class="form-group col-md-6">
                <label>Phone</label>
                <input type="text" class="form-control" name="ephone" value="<?php echo htmlspecialchars($ephone); ?>" />
              </div>
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" class="form-control" name="eaddress" value="<?php echo htmlspecialchars($eaddress); ?>" />
            </div>
            <div class="form-group">
              <label>Relationship</label>
              <input type="text" class="form-control" name="erelation" value="<?php echo htmlspecialchars($erelation); ?>" />
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success">Save Changes</button>
              <a href="/student/Student_profile.php" class="btn btn-secondary ml-2">Cancel</a>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <?php if(!isset($_GET['edit'])): ?>
        <h5 style="border-bottom: 2px solid #aaa;"> Contact Information </h5><br>
        <div class="row" id="personal info">
            <div class="col-md-2 col-sm-4">
            <h6> Email: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo htmlspecialchars($email ?: '—'); ?>  </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Phone No: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo htmlspecialchars($phone ?: '—'); ?>  </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Address: </h6>
            </div>
            <div class="col-md-10 col-sm-4">
                <h6 class="text-muted"> <?php echo htmlspecialchars($address ?: '—'); ?>  </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Province: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo htmlspecialchars($province ?: '—'); ?>  </h6>
            </div>

            <div class="col-md-2 col-sm-4">
            <h6> District:  </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo htmlspecialchars($district ?: '—'); ?>  </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Zip Code: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo htmlspecialchars($zip ?: '—'); ?>  </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Divisional Secretariat: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo htmlspecialchars($division ?: '—'); ?>  </h6>
            </div>
        </div><br>

        <h5 style="border-bottom: 2px solid #aaa;"> Emergency Contact Information </h5><br>
        <div class="row container" id="personal info">
            <div class="col-md-2 col-sm-4">
            <h6> Name: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo htmlspecialchars($ename ?: '—'); ?> </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Phone No: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo htmlspecialchars($ephone ?: '—'); ?></h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Address: </h6>
            </div>
            <div class="col-md-10 col-sm-4">
                <h6 class="text-muted"> <?php echo htmlspecialchars($eaddress ?: '—'); ?> </h6>
            </div>

            <div class="col-md-2 col-sm-4">
            <h6> Relationship  </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo htmlspecialchars($erelation ?: '—'); ?> </h6>
            </div>
        </div>
        <?php endif; ?>
  </div>

  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
          <div id="results-student_education" class="form-group table-responsive">               
            <table class="table table-hover" width="100%" id="table">
              <thead>
              <tr>
              <th width="15%"> Qualification Type </th>
              <th width="20%"> Index No </th>
              <th width="15%"> Year of Exam </th>
              <th width="30%"> Subject </th>
              <th width="10%"> Result </th>
              </tr>
              </head>
              <tbody>
              <?php
            
                  $sql ="SELECT`qualification_type`,`qualification_index_no`,`qualification_year`,`qualification_description`,`qualification_results`
                  FROM `user`,student_qualification WHERE `user_name`= qualification_student_id and `user_name`='$username'";
                  $result = mysqli_query ($con, $sql);
                  if (mysqli_num_rows($result)>0)
                  {
                    while($row = mysqli_fetch_assoc($result))
                    {
                      echo '
                      <tr style="text-align:left";>
                          <td>'. $row["qualification_type"].'</td>
                          <td>'. $row["qualification_index_no"].'</td>
                          <td>'. $row["qualification_year"].'</td>
                          <td>'. $row["qualification_description"].'</td>
                          <td>'. $row["qualification_results"].'</td>
                      </tr> ';
                    }
                  }
                  else
                  {
                    echo "0 results";
                  }

               ?>
              </tbody>
            </table>  
      </div>
  </div>


<div class="tab-pane fade" id="nav-modules" role="tabpanel" aria-labelledby="nav-modules-tab">
         <div id="results-student_education" class="form-group table-responsive">               
            <table class="table table-hover" width="100%" id="table">
              <thead>
              <tr>
              <th width="15%"> Module ID </th>
              <th width="20%"> Module Name </th>
              <th width="15%"> Semester ID </th>
              <th width="30%"> Learning Hours</th>
              <th width="30%"> Assessment </th>
              </tr>
              </head>
              <tbody>
              <?php
            //    if(isset($_GET['edit']))
            //    {
                  //$stid =$_GET['edit'];WHERE `qualification_student_id`= '$stid'"
                  //include_once("mysqli_connect.php");
                  //$username = $_SESSION['user_name'];
                  $sql ="SELECT `module_id`, `module_name`, `module_aim`, `module_learning_hours`, `module_resources`, `module_learning_outcomes`, `semester_id`, `module_reference`, `module_relative_unit`, `module_lecture_hours`, `module_practical_hours`, `module_self_study_hours` 
                  FROM `module` as m, course as c WHERE c.course_id=m.course_id and c.course_id='$id'";
                  $result = mysqli_query ($con, $sql);
                  if (mysqli_num_rows($result)>0)
                  {
                    while($row = mysqli_fetch_assoc($result))
                    {
                      echo '
                      <tr style="text-align:left";>
                          <td>'. $row["module_id"].'</td>
                          <td>'. $row["module_name"].'</td>
                          <td>'. $row["semester_id"].'</td>
                          <td>'. $row["module_learning_hours"].'</td>
                          <td>
                          <a href="/assessment/Assessment.php?Mid='.$row["module_id"].'" class="btn btn-info"> <i class="fas fa-angle-double-right"></i>
                          </td>
                      </tr> ';
                    }
                  }
                  else
                  {
                    echo "0 results";
                  }

               ?>
              </tbody>
            </table>  
      </div>
      </div>
  </div>
</form>
</div>
<script>
// Image input validation and auto-submit
(function(){
  var img = document.getElementById('image');
  if(!img) return;
  img.addEventListener('change', function(){
    var val = this.value || '';
    if(!val){
      alert('Please select an image');
      return;
    }
    var ext = val.split('.').pop().toLowerCase();
    var ok = ['gif','png','jpg','jpeg','webp'];
    if (ok.indexOf(ext) === -1) {
      alert('Invalid image file. Allowed: GIF, PNG, JPG, JPEG, WEBP');
      this.value = '';
      return;
    }
    // submit the parent form
    if (this.form) this.form.submit();
  });
})();
</script>

<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php 
require_once __DIR__ . '/../footer.php';
?>