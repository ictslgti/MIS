<?php
// Ensure session and safely read session variables
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$u_n  = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
$u_ta = isset($_SESSION['user_table']) ? $_SESSION['user_table'] : '';
$u_t  = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : '';
$d_c  = isset($_SESSION['department_code']) ? $_SESSION['department_code'] : '';

// Normalize user_type for consistent comparisons
if (isset($_SESSION['user_type'])) {
  $_SESSION['user_type'] = strtoupper(trim($_SESSION['user_type']));
  $u_t = $_SESSION['user_type'];
}

$username = null;
if($u_ta=='staff'){
  $sql = "SELECT * FROM `staff` WHERE `staff_id` = '$u_n'";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_assoc($result);
  $username =  $row['staff_name'];
  }

}if($u_ta=='student'){
  $sql = "SELECT * FROM `student` WHERE `student_id` = '$u_n'";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_assoc($result);
  $username =  $row['student_fullname'];
  }
}

?>
<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?><?php echo ($_SESSION['user_type']=='STU') ? '/home/home.php' : '/dashboard/index.php'; ?>">MIS@SLGTI</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/img/user.jpg" alt="<?php echo $u_n;?> picture">
        </div>
        <div class="user-info">
          <span class="user-name">
            <strong><?php echo $u_n;?></strong>
          </span>
          <span class="user-role"><?php echo htmlspecialchars($u_t ?: ''); ?> | <?php echo htmlspecialchars($d_c ?: ''); ?> </span>
          <span class="user-status">
            <i class="fa fa-user"></i>
            <span>
              <a href="<?php echo (defined('APP_BASE') ? APP_BASE : ''); echo ($_SESSION['user_type']=='STU') ? '/student/Student_profile.php' : '/Profile.php'; ?>">Profile</a>
              &nbsp;|&nbsp;
              <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/logout.php">Logout</a>
            </span>
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
      <!-- <div class="sidebar-search">
        <div>
          <div class="input-group">
            <input type="text" class="form-control search-menu" placeholder="Search...">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
            </div>
          </div>
        </div>
      </div> -->
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <?php if($_SESSION['user_type'] != 'STU') { ?>
          <li>
            <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/dashboard/index.php">
              <i class="fa fa-home"></i>
              <span>Dashboard</span>
              <!-- <span class="badge badge-pill badge-primary">Beta</span> -->
            </a>
          </li>
          <?php } ?>

          <li class="sidebar-dropdown">
          

            <a href="#">
              <i class="fas fa-university"></i>
              <span>Departments</span>
              <!-- <span class="badge badge-pill badge-warning">New</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                <a  href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/department/Department.php">Departments Info</a>
                </li>
                <li>
                <?php if(($_SESSION['user_type'] =='ADM')) { ?>  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/department/AddDepartment.php">Add a Department<?php }?>
                </a>
                </li>
                <li>
                <a  href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/academic/AcademicYear.php">Academic Years Info</a>
                </li>
                <li>
                <?php if(($_SESSION['user_type'] =='ADM')) { ?>  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/academic/AddAcademicYear.php">Add a Academic Year<?php }?>
                </a>
                </li>

                <li>
                <a  href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/course/Course.php">Courses Info</a>
                </li>
                <li>
                <?php if(($_SESSION['user_type'] =='ADM') || ($_SESSION['user_type'] =='HOD')) { ?><a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/course/AddCourse.php">Add a Course<?php }?>
                </a>
                </li>

                <li>
                <?php if(($_SESSION['user_type'] =='ADM') || ($_SESSION['user_type'] =='HOD')) { ?><a  href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/module/Module.php">Modules Info</a><?php }?>
                </li>
                <!-- <li>
                <?php if(($_SESSION['user_type'] =='ADM') || ($_SESSION['user_type'] =='HOD')) { ?><a href="../module/ModuleEnrollement.php">Add a Module<?php }?>
                </a>
                </li> -->

              </ul>
            </div>
          </li>

          <?php if($_SESSION['user_type'] == 'STU') { ?>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-file-pdf"></i>
              <span>Downloads</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a target="_blank" href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/library/pdf/student_application.php?Sid=<?php echo urlencode($u_n); ?>">Application Form</a>
                </li>
                <li>
                  <a target="_blank" href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/library/pdf/hostel_request.php?Sid=<?php echo urlencode($u_n); ?>">Hostel Request</a>
                </li>
                <li>
                  <a target="_blank" href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/library/pdf/student_id_card.php?Sid=<?php echo urlencode($u_n); ?>">Student ID Card Request (A4)</a>
                </li>
              </ul>
            </div>
          </li>
          <?php } ?>
          <?php if($_SESSION['user_type']!='STU'){ ?> <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-user-tie"></i>
              <span>Staffs</span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/staff/Staff.php">Staffs Info</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/staff/AddStaff.php">Add a Staff</a>
                  <hr>
                </li>              
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/staff/StaffModuleEnrollment.php">Module Enrollment</a>
                </li>
                <!-- <li>
                  <a href="../staff/StaffExit">Staff Exit</a>
                </li> -->
              </ul>
            </div>
          </li>       
           <?php } ?>
          <?php if($_SESSION['user_type'] =='ADM'){ ?> <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-user-graduate"></i>
              <span>Students</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/student/Student.php" onclick="myFunction()">Students Info</a><script>function myFunction() { alert("Welcome to SLGTI Active & Following Students Informations");}</script>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/student/AddStudent.php">Add a Student</a>
                </li>
                <hr>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/student/StudentReEnroll.php">Student Re Enroll</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/student/StudentEnrollmentReport.php">Student Enrollment Report</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/student/ImportStudentEnroll.php">Import Student Enrollment</a>
                </li>
              </ul>
            </div>
          </li>  <?php } ?>
          <?php if($_SESSION['user_type'] =='HOD'){ ?>
          <li>
            <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/student/DepartmentStudents.php">
              <i class="fas fa-user-graduate"></i>
              <span>My Dept Students</span>
            </a>
          </li>
          <?php } ?>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-calendar-alt"></i>
              <span>Timetable & Notice</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/timetable/Timetable.php">Timetable</a>
                </li>
                <?php if(isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], ['WAR','HOD','ADM'])){ ?>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/timetable/AddTimetable.php">Add a Timetable</a>
                </li>
                <?php } ?>
                <hr>
                <?php if(isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], ['WAR','HOD','ADM'])){ ?>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/notices/Notice.php">Notice Info</a>
                </li>
                <?php } ?>
                <?php if($_SESSION['user_type']=='ADM'){ ?> 
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/notices/AddNotice.php">Add a Notice</a>
                </li>
                <?php } ?>
              </ul>
            </div>
          </li>
          <?php if($_SESSION['user_type'] != 'STU') { ?>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-award"></i>
              <span>Examinations</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/assessment/AssessmentResults.php">Assessment Results</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/assessment/AddAssessment.php">Add Assessment</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/assessment/AddAssessmentType.php">Add Assessment Type</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/assessment/AddAssessmentResults.php">Add Assessment Results</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/assessment/AssessmentReport.php">Assessment Report</a>
                </li>
                <hr>
                <!-- <li>
                  <a href="TVECExamination">TVEC Examinations Info</a>
                </li>
                <li>
                  <a href="AddTVECExamination">Add TVEC Examination</a>
                </li> -->
              </ul>
            </div>
          </li>
          <?php } ?>

          <?php if($_SESSION['user_type'] != 'STU') { ?>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Attendances</span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/attendance/Attendance.php">Attendances Info</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/attendance/MarkAttendance.php">Mark Attendance</a>
                  <hr>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/attendance/AttendanceReport.php">Attendance Report</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/attendance/WarningsLetters.php">Warnings Letters</a>
                </li>
              </ul>
            </div>
          </li>
          <?php } ?>

          <?php if($_SESSION['user_type'] != 'STU') { ?>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-briefcase"></i>
              <span>On-the-job Training</span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->  
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li><?php if($_SESSION['user_type']=='ADM'){ ?> 
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/ojt/OJT.php">On-the-job Training Info</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/ojt/addojt.php">Add a Training Place</a>
                  <hr>
                </li> <?php } ?>             
                <li><?php if($_SESSION['user_type']=='ADM'){ ?>
                  <a href="#">Placement Change</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/ojt/OJTReport.php">OJT Report</a>
                </li><?php } ?>
              </ul>
            </div>
          </li>
          <?php } ?>

          <?php if($_SESSION['user_type'] != 'STU') { ?>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="far fa-building"></i>
              <span>Hostels</span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li><?php if($_SESSION['user_type']=='WAR'||'ADM' ){ ?>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/hostel/Hostel.php">Hostels Info</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/hostel/AddHostel.php">Add a Hostel</a>    
                </li>              
                <li>
                  <a href="#">Add a Room</a>
                  <hr>
                </li><?php } ?>
              </ul>
            </div>
          </li>
          <?php } ?>


          <li class="sidebar-dropdown"><?php if($_SESSION['user_type']=='ADM'){ ?> 
            <a href="#">
              <i class="far fa-grin"></i>
              <span>Feedbacks</span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/student/StudentFeedbackinfo.php">Students Feedback Info</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/student/AddStudentFeedback.php">Create a Student Feedback</a>
                  <hr>
                </li>              
                <li>
                  <a href="#">Teacher Feedback Info</a>
                </li>
                <li>
                  <a href="#">Create a Teacher Feedback</a>
                </li>
                <li>
                  <a href="#">Industry Feedback Info</a>
                </li>
                <li>
                  <a href="#">Create a Industry Feedback</a>
                </li>
              </ul>
            </div>
          </li><?php } ?>


          <li class="sidebar-dropdown"><?php if($_SESSION['user_type']!='STU' ){ ?>
            <a href="#">
              <i class="fas fa-file-alt"></i>
              <span>Inventory</span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/inventory/InventoryInfo.php">Inventory Info</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/inventory/AddInventory.php">Add a Inventory</a>
                  <hr>
                </li>              
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/item/AddItem.php">Add a Item</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/supplier/AddSupplier.php">Add a Supplier</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/inventory/InventoryReport.php">Inventory Report</a>
                </li>
              </ul>
            </div>
          </li><?php } ?>   


          <li class="sidebar-dropdown"><?php if($_SESSION['user_type']=='ADM'){ ?> 
            <a href="#">
              <i class="fas fa-book-open"></i>
              <span>Library</span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/LibraryHome.php">Library Home</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/book/AddBook.php">Add a Book</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/book/IssueBook.php">Issue a Book</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/book/ViewBooks.php">All Book</a>
                </li>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/book/IssuedBook.php">Issued Books Info</a>
                </li>
              </ul>
            </div>
          </li><?php } ?>  

          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-hamburger"></i>
              <span>Canteen</span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li><?php if($_SESSION['user_type']!='STU'){ ?>
                  <a href="#">Food Items</a>
                </li> <?php } ?>
                <li><?php if($_SESSION['user_type']!='STU'){ ?>
                  <a href="#">Add a Food Item</a>
                  <hr>
                </li>  <?php } ?>             
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/food/FoodOrders.php">Food Orders</a>
                  <hr>
                </li>
                <li> <?php if($_SESSION['user_type']!='STU'){ ?>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/canteen/CanteenReport.php">Daily Report</a>
                </li> <?php } ?> 
                <li><?php if($_SESSION['user_type']!='STU'){ ?>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/order/dailyorder.php">Daily Orders</a>
                </li> <?php } ?>
              </ul>
            </div>
          </li>

          <?php if($_SESSION['user_type'] != 'STU') { ?>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fab fa-amazon-pay"></i>
              <span>Payments</span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul> 
                <li> <?php if(($_SESSION['user_type']=='ACC') || ($_SESSION['user_type']=='ADM')) { ?>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/payment/Payments.php">Payments Info</a>
                </li>
                <li> 
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/payment/Payment.php">Make a Payment</a>
                  <hr>
                </li>           
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/payment/PaymentsReport.php">Payments Report</a>
                </li> <?php } ?> 
                  </ul>
            </div>
          </li>
          <?php } ?>

          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-door-open"></i>
              <span>On-Peak & Off-Peak</span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul> <?php if($_SESSION['user_type']!='STU'){ ?>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/onpeak&offpeak/OnPeak.php">On-Peak Info </a>
                </li> <?php } ?>
                <li> <?php if($_SESSION['user_type']=='STU' ){ ?>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/onpeak&offpeak/RequestOnPeak.php">Request a On-Peak</a>
                  <hr>
                </li> <?php } ?>             
                <li><?php if($_SESSION['user_type']=='WAR' ){ ?>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/onpeak&offpeak/OffPeak.php">Off-Peak Info</a>
                </li><?php } ?>
                <li><?php if($_SESSION['user_type']=='STU' ){ ?>
                  <a href="#">Request a Off-Peak</a>
                </li><?php } ?> 
              </ul>
            </div>
          </li>

          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-tint"></i>
              <span>Blood Donations</span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>  <?php if((($_SESSION['user_type'] =='WAR') || ($_SESSION['user_type'] =='HOD') || ($_SESSION['user_type'] =='STU'))) { ?>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/blood/BloodDonations.php">Blood Donations Info</a>
                </li> <?php } ?> 
                <li><?php if((($_SESSION['user_type'] =='WAR') || ($_SESSION['user_type'] =='HOD') || ($_SESSION['user_type'] =='STU'))) { ?>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/blood/BloodDonors.php">Blood Donors</a>
                  <hr>
                </li>  <?php } ?>             
                <li><?php if($_SESSION['user_type'] =='ADM') { ?>
                  <a href="#">Donate Blood</a>
                </li>  <?php } ?>         
              </ul>
            </div>
          </li>
          <?php if(isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], ['WAR','HOD','ADM'])){ ?>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-tint"></i>
              <span>Attendance </span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>  <?php if((($_SESSION['user_type'] =='WAR') || ($_SESSION['user_type'] =='HOD'))) { ?>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/attendance/Attendance.php">Attendance Info</a>
                </li> <?php } ?> 
                <li><?php if((($_SESSION['user_type'] =='WAR') || ($_SESSION['user_type'] =='HOD'))) { ?>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/attendance/Attendance.php">Attendance </a>
                  <hr>
                </li>  <?php } ?>             
                <li><?php if($_SESSION['user_type'] =='ADM') { ?>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/attendance/ManageAttendance.php">Attendance (Admin)</a>
                </li>  <?php } ?>         
              </ul>
            </div>
          </li>
          <?php } ?>
          <?php if(isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], ['WAR','HOD','ADM'])){ ?>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-tint"></i>
              <span>Payroll System </span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>  <?php if((($_SESSION['user_type'] =='WAR') || ($_SESSION['user_type'] =='HOD'))) { ?>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/attendance/Payroll.php">Payroll Info</a>
                </li> <?php } ?> 
                <li><?php if((($_SESSION['user_type'] =='WAR') || ($_SESSION['user_type'] =='HOD'))) { ?>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/attendance/Payroll.php">Payroll </a>
                  <hr>
                </li>  <?php } ?>             
                <li><?php if($_SESSION['user_type'] =='ADM') { ?> 
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/attendance/ManagePayroll.php">Payroll (Admin)</a>
                </li>  <?php } ?>         
              </ul>
            </div>
          </li>
          <?php } ?>



          <?php if($_SESSION['user_type'] != 'STU') { ?>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-network-wired"></i>
              <span>Network Management</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/devices/DeviceDiscovery.php">Device Discovery</a>
                </li>
                <?php if($_SESSION['user_type'] == 'ADM') { ?>
                <li>
                  <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/devices/NetworkSettings.php">Network Settings</a>
                </li>
                <?php } ?>
              </ul>
            </div>
          </li>
          <?php } ?>

          <li class="header-menu">
            <span>Extra</span>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Documentation</span>
              <!-- <span class="badge badge-pill badge-primary">Beta</span> -->
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-calendar"></i>
              <span>Calendar</span>
            </a>
          </li>        
          <li>
            <a href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/password/change_password.php">
              <i class="fa fa-key"></i>
              <span>Change Password</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer" style="display:none;"></div>
  </nav>

  <main class="page-content">
    <div class="container-fluid">
