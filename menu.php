<?php
// Ensure session and safely read session variables
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$u_n  = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
$u_ta = isset($_SESSION['user_table']) ? $_SESSION['user_table'] : '';
$u_t  = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : '';
$d_c  = isset($_SESSION['department_code']) ? $_SESSION['department_code'] : '';

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
        <a href="#">MIS@SLGTI</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="img/user.jpg" alt="<?php echo $u_n;?> picture">
        </div>
        <div class="user-info">
          <span class="user-name">
            <strong><?php echo $u_n;?></strong>
          </span>
          <span class="user-role"><?php echo htmlspecialchars($u_t ?: ''); ?> | <?php echo htmlspecialchars($d_c ?: ''); ?> </span>
          <span class="user-status">
            <i class="fa fa-user"></i>
            <span><a href="<?php echo ($_SESSION['user_type']=='STU') ? '/MIS/student/Student_profile.php' : '/MIS/Profile.php'; ?>">Profile</a></span>
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
            <a href="../dashboard/index.php">
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
                <a  href="../department/Department.php">Departments Info</a>
                </li>
                <li>
                <?php if(($_SESSION['user_type'] =='ADM')) { ?>  <a href="../department/AddDepartment.php">Add a Department<?php }?>
                </a>
                </li>
                <li>
                <a  href="../academic/AcademicYear.php">Academic Years Info</a>
                </li>
                <li>
                <?php if(($_SESSION['user_type'] =='ADM')) { ?>  <a href="../academic/AddAcademicYear.php">Add a Academic Year<?php }?>
                </a>
                </li>

                <li>
                <a  href="../Course/course.php">Courses Info</a>
                </li>
                <li>
                <?php if(($_SESSION['user_type'] =='ADM') || ($_SESSION['user_type'] =='HOD')) { ?><a href="../Course/Addcourse.php">Add a Course<?php }?>
                </a>
                </li>

                <li>
                <?php if(($_SESSION['user_type'] =='ADM') || ($_SESSION['user_type'] =='HOD')) { ?><a  href="../module/Module.php">Modules Info</a><?php }?>
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
                  <a target="_blank" href="/MIS/library/pdf/student_application.php?Sid=<?php echo urlencode($u_n); ?>">Application Form</a>
                </li>
                <li>
                  <a target="_blank" href="/MIS/library/pdf/hostel_request.php?Sid=<?php echo urlencode($u_n); ?>">Hostel Request</a>
                </li>
                <li>
                  <a target="_blank" href="/MIS/library/pdf/student_id_card.php?Sid=<?php echo urlencode($u_n); ?>">Student ID Card Request (A4)</a>
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
                  <a href="../Staff/staff.php">Staffs Info</a>
                </li>
                <li>
                  <a href="../staff/AddStaff.php">Add a Staff</a>
                  <hr>
                </li>              
                <li>
                  <a href="../staff/StaffModuleEnrollment.php">Module Enrollment</a>
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
                  <a href="../student/Student.php" onclick="myFunction()">Students Info</a><script>function myFunction() { alert("Welcome to SLGTI Active & Following Students Informations");}</script>
                </li>
                <li>
                  <a href="../student/AddStudent.php">Add a Student</a>
                </li>
                <hr>
                <li>
                  <a href="../student/StudentReEnroll.php">Student Re Enroll</a>
                </li>
                <li>
                  <a href="../student/StudentEnrollmentReport.php">Student Enrollment Report</a>
                </li>
                <li>
                  <a href="../student/ImportStudentEnroll.php">Import Student Enrollment</a>
                </li>
              </ul>
            </div>
          </li>  <?php } ?>
          <?php if($_SESSION['user_type'] =='HOD'){ ?>
          <li>
            <a href="/MIS/student/DepartmentStudents.php">
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
                  <a href="../timetable/Timetable.php">Timetable</a>
                </li>
                <?php if($_SESSION['user_type']!='STU'){ ?>
                <li>
                  <a href="../timetable/AddTimetable">Add a Timetable</a>
                </li>
                <?php } ?>
                <hr>
                <?php if($_SESSION['user_type']!='STU'){ ?>
                <li>
                  <a href="../notices/Notice.php">Notice Info</a>
                </li>
                <?php } ?>
                <?php if($_SESSION['user_type']=='ADM'){ ?> 
                <li>
                  <a href="../notices/AddNotice.php">Add a Notice</a>
                </li>
                <?php } ?>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-award"></i>
              <span>Examinations</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <?php if($_SESSION['user_type'] == 'STU') { ?>
                <li>
                  <a href="/MIS/assessment/AssessmentResults.php">My Results</a>
                </li>
                <li>
                  <a href="/MIS/assessment/AssessmentReport.php">Results Report</a>
                </li>
                <?php } else { ?>
                <li>
                  <a href="../assessment/AssessmentResults.php">Assessment Results</a>
                </li>
                <li>
                  <a href="../assessment/AddAssessment.php">Add Assessment</a>
                </li>
                <li>
                  <a href="../assessment/AddAssessmentType.php">Add Assessment Type</a>
                </li>
                <li>
                  <a href="../assessment/AddAssessmentResults.php">Add Assessment Results</a>
                </li>
                <li>
                  <a href="../assessment/AssessmentReport.php">Assessment Report</a>
                <?php } ?>
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

          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Attendances</span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul>
                <?php if($_SESSION['user_type'] == 'STU') { ?>
                <li>
                  <a href="/MIS/attendance/Attendance.php">My Attendance</a>
                </li>
                <li>
                  <a href="/MIS/attendance/AttendanceReport.php">Attendance Report</a>
                </li>
                <?php } else { ?>
                <li>
                  <a href="/MIS/attendance/Attendance.php">Attendances Info</a>
                </li>
                <li>
                  <a href="/MIS/attendance/MarkAttendance.php">Mark Attendance</a>
                  <hr>
                </li>
                <li>
                  <a href="/MIS/attendance/AttendanceReport.php">Attendance Report</a>
                </li>
                <li>
                  <a href="/MIS/attendance/WarningsLetters.php">Warnings Letters</a>
                </li>
                <?php } ?>
              </ul>
            </div>
          </li>

          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-briefcase"></i>
              <span>On-the-job Training</span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->  
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li><?php if($_SESSION['user_type']=='ADM'){ ?> 
                  <a href="/MIS/ojt/OJT.php">On-the-job Training Info</a>
                </li>
                <li>
                  <a href="/MIS/ojt/addojt.php">Add a Training Place</a>
                  <hr>
                </li> <?php } ?>             
                <li><?php if($_SESSION['user_type']=='STU'){ ?>
                  <a href="/MIS/student/StudentsRequest.php">Students Request</a>
                </li><?php } ?>
                <li> <?php if($_SESSION['user_type']=='STU'){ ?>
                  <a href="/MIS/reguest/PlacementRequest.php">Student Placement Request</a>
                </li> <?php } ?>
                <li><?php if($_SESSION['user_type']=='STU'){ ?>
                  <a href="/MIS/ojt/OJTInfo.php">Training Place Info</a>
                </li><?php } ?>
                <li><?php if($_SESSION['user_type']=='ADM'){ ?>
                  <a href="#">Placement Change</a>
                </li>
                <li>
                  <a href="/MIS/ojt/OJTReport.php">OJT Report</a>
                </li><?php } ?>
              </ul>
            </div>
          </li>

          <li class="sidebar-dropdown">
            <a href="#">
              <i class="far fa-building"></i>
              <span>Hostels</span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li><?php if($_SESSION['user_type']=='WAR'||'ADM' ){ ?>
                  <a href="/MIS/hostel/Hostel.php">Hostels Info</a>
                </li>
                <li>
                  <a href="/MIS/hostel/AddHostel.php">Add a Hostel</a>    
                </li>              
                <li>
                  <a href="#">Add a Room</a>
                  <hr>
                </li><?php } ?>
                <li><?php if($_SESSION['user_type']=='STU' ){ ?>
                  <a href="/MIS/student/RequestHostel.php">Request Hostel</a>
                </li><?php } ?>
              </ul>
            </div>
          </li>


          <li class="sidebar-dropdown"><?php if($_SESSION['user_type']=='ADM'){ ?> 
            <a href="#">
              <i class="far fa-grin"></i>
              <span>Feedbacks</span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="StudentFeedbackinfo">Students Feedback Info</a>
                </li>
                <li>
                  <a href="AddStudentFeedback">Create a Student Feedback</a>
                  <hr>
                </li>              
                <li>
                  <a href="TeacherFeedback">Teacher Feedback Info</a>
                </li>
                <li>
                  <a href="AddTeacherFeedback">Create a Teacher Feedback</a>
                </li>
                <li>
                  <a href="IndustryFeedback">Industry Feedback Info</a>
                </li>
                <li>
                  <a href="AddIndustryFeedback">Create a Industry Feedback</a>
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
                  <a href="InventoryInfo">Inventory Info</a>
                </li>
                <li>
                  <a href="AddInventory">Add a Inventory</a>
                  <hr>
                </li>              
                <li>
                  <a href="AddItem">Add a Item</a>
                </li>
                <li>
                  <a href="AddSupplier">Add a Supplier</a>
                </li>
                <li>
                  <a href="InventoryReport">Inventory Report</a>
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
                  <a href="LibraryHome">Library Home</a>
                </li>
                <li>
                  <a href="AddBook">Add a Book</a>
                </li>
                <li>
                  <a href="IssueBook">Issue a Book</a>
                </li>
                <li>
                  <a href="ViewBooks">All Book</a>
                </li>
                <li>
                  <a href="IssuedBook">Issued Books Info</a>
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
                  <a href="FoodItems">Food Items</a>
                </li> <?php } ?>
                <li><?php if($_SESSION['user_type']!='STU'){ ?>
                  <a href="AddFoodItem">Add a Food Item</a>
                  <hr>
                </li>  <?php } ?>             
                <li>
                  <a href="FoodOrders">Food Orders</a>
                  <hr>
                </li>
                <li> <?php if($_SESSION['user_type']!='STU'){ ?>
                  <a href="CanteenReport">Daily Report</a>
                </li> <?php } ?> 
                <li><?php if($_SESSION['user_type']!='STU'){ ?>
                  <a href="dailyorder">Daily Orders</a>
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
                  <a href="Payments">Payments Info</a>
                </li>
                <li> 
                  <a href="Payment">Make a Payment</a>
                  <hr>
                </li>           
                <li>
                  <a href="PaymentsReport">Payments Report</a>
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
                  <a href="OnPeak">On-Peak Info </a>
                </li> <?php } ?>
                <li> <?php if($_SESSION['user_type']=='STU' ){ ?>
                  <a href="RequestOnPeak">Request a On-Peak</a>
                  <hr>
                </li> <?php } ?>             
                <li><?php if($_SESSION['user_type']=='WAR' ){ ?>
                  <a href="OffPeak">Off-Peak Info</a>
                </li><?php } ?>
                <li><?php if($_SESSION['user_type']=='STU' ){ ?>
                  <a href="RequestOffPeak">Request a Off-Peak</a>
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
                  <a href="/MIS/blood/BloodDonations.php">Blood Donations Info</a>
                </li> <?php } ?> 
                <li><?php if((($_SESSION['user_type'] =='WAR') || ($_SESSION['user_type'] =='HOD') || ($_SESSION['user_type'] =='STU'))) { ?>
                  <a href="/MIS/blood/BloodDonors.php">Blood Donors</a>
                  <hr>
                </li>  <?php } ?>             
                <li><?php if($_SESSION['user_type'] =='ADM') { ?>
                  <a href="#">Donate Blood</a>
                </li>  <?php } ?>         
              </ul>
            </div>
          </li>



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
            <a href="Timetable.new">
              <i class="fa fa-calendar"></i>
              <span>Calendar</span>
            </a>
          </li>        
          <li>
            <a href="/MIS/password/change_password.php">
              <i class="fa fa-key"></i>
              <span>Change Password</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="notifications">
        <i class="fa fa-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="chat">
        <i class="fab fa-facebook-messenger"></i>
        <span class="badge badge-pill badge-success notification">7</span>
      </a>
      <a href="<?php if($_SESSION['user_type']=='STU'){echo '/MIS/student/Student_profile.php';}else{echo '/MIS/Profile.php';}  ?>">
        <i class="fa fa-cog"></i>
        <span class="badge-sonar"></span>
      </a>
      <a href="/MIS/index?signout">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>

  <main class="page-content">
    <div class="container-fluid">
