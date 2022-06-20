<?php
$u_n = $_SESSION['user_name'];
$u_ta = $_SESSION['user_table'];
$u_t = $_SESSION['user_type'];
$d_c = $_SESSION['department_code'];

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
          <span class="user-role"><?php echo $_SESSION['user_type'];?> | <?php echo $_SESSION['department_code'];?> </span>
          <span class="user-status">
            <i class="fa fa-user"></i>
            <span><a href="<?php if($_SESSION['user_type']=='STU'){echo 'Student_profile';}else{echo 'Profile';}  ?>">Profile</a></span>
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
          <li>
            <a href="index">
              <i class="fa fa-home"></i>
              <span>Dashboard</span>
              <!-- <span class="badge badge-pill badge-primary">Beta</span> -->
            </a>
          </li>

          <li class="sidebar-dropdown">
          

            <a href="#">
              <i class="fas fa-university"></i>
              <span>Departments</span>
              <!-- <span class="badge badge-pill badge-warning">New</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                <a  href="Department">Departments Info</a>
                </li>
                <li>
                <?php if(($_SESSION['user_type'] =='ADM')) { ?>  <a href="AddDepartment">Add a Department<?php }?>
                </a>
                </li>
                <li>
                <a  href="AcademicYear">Academic Years Info</a>
                </li>
                <li>
                <?php if(($_SESSION['user_type'] =='ADM')) { ?>  <a href="AddAcademicYear">Add a Academic Year<?php }?>
                </a>
                </li>

                <li>
                <a  href="Course">Courses Info</a>
                </li>
                <li>
                <?php if(($_SESSION['user_type'] =='ADM') || ($_SESSION['user_type'] =='HOD')) { ?><a href="AddCourse">Add a Course<?php }?>
                </a>
                </li>

                <li>
                <?php if(($_SESSION['user_type'] =='ADM') || ($_SESSION['user_type'] =='HOD')) { ?><a  href="Module">Modules Info</a><?php }?>
                </li>
                <li>
                <?php if(($_SESSION['user_type'] =='ADM') || ($_SESSION['user_type'] =='HOD')) { ?><a href="AddModule">Add a Module<?php }?>
                </a>
                </li>

              </ul>
            </div>
          </li>
          <?php if($_SESSION['user_type']!='STU'){ ?> <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-user-tie"></i>
              <span>Staffs</span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="Staff">Staffs Info</a>
                </li>
                <li>
                  <a href="AddStaff">Add a Staff</a>
                  <hr>
                </li>              
                <li>
                  <a href="StaffModuleEnrollment">Module Enrollment</a>
                </li>
                <li>
                  <a href="StaffExit">Staff Exit</a>
                </li>
              </ul>
            </div>
          </li>          <?php } ?>
          <?php if($_SESSION['user_type'] =='ADM'){ ?> <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-user-graduate"></i>
              <span>Students</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="Student" onclick="myFunction()">Students Info</a><script>function myFunction() { alert("Welcome to SLGTI Active & Following Students Informations");}</script>
                </li>
                <li>
                  <a href="AddStudent">Add a Student</a>
                </li>
                <hr>
                <li>
                  <a href="StudentReEnroll">Student Re Enroll</a>
                </li>
                <li>
                  <a href="StudentEnrollmentReport">Student Enrollment Report</a>
                </li>
              </ul>
            </div>
          </li>  <?php } ?>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-calendar-alt"></i>
              <span>Timetable & Notice</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="Timetable">Timetable</a>
                </li>
                <li>
                  <a href="AddTimetable">Add a Timetable</a>
                </li>
                <hr>
                <li><?php if($_SESSION['user_type']=='STU'){ ?> 
                  <a href="Notice">Notice Info</a>
                </li><?php } ?>
                 <li><?php if($_SESSION['user_type']=='ADM'){ ?> 
                  <a href="AddNotice">Add a Notice</a>
                </li><?php } ?>
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
                <li>
                  <a href="Assessment">Assessments Results</a>
                </li>
                <?php if($_SESSION['user_type']!='STU'){ ?> <li>
                  <a href="AddAssessment">Add Assessment</a>
                </li>
                <li>
                  <a href="AddAssessmentType">Add a Assessment Type</a>
                </li>
                <li>
                  <a href="AddAssessmentResults">Add a Assessment Results</a>
                </li> <?php } ?>
                <li>
                  <a href="AssessmentReport">Assessment Report</a>
                </li>
                <hr>
                <li>
                  <a href="TVECExamination">TVEC Examinations Info</a>
                </li>
                <li>
                  <a href="AddTVECExamination">Add TVEC Examination</a>
                </li>
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
                <li>
                  <a href="Attendance">Attendances Info </a>
                </li>
                <li>
                  <a href="MarkAttendance">Add a Attendance </a>
                  <hr>
                </li>              
                <li>
                  <a href="AttendanceReport">Attendance Report</a>
                </li>
                <li>
                  <a href="WarningsLetters">Warnings Letters</a>
                </li>
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
                  <a href="OJT">On-the-job Training Info</a>
                </li>
                <li>
                  <a href="AddTrainingPlace">Add a Training Place</a>
                  <hr>
                </li> <?php } ?>             
                <li><?php if($_SESSION['user_type']=='STU'){ ?>
                  <a href="StudentsRequest">Students Request</a>
                </li><?php } ?>
                <li> <?php if($_SESSION['user_type']=='STU'){ ?>
                  <a href="PlacementRequest">Student Placement Request</a>
                </li> <?php } ?>
                <li><?php if($_SESSION['user_type']=='STU'){ ?>
                  <a href="OJTInfo">Training Place Info</a>
                </li><?php } ?>
                <li><?php if($_SESSION['user_type']=='ADM'){ ?>
                  <a href="OJTChange">Placement Change</a>
                </li>
                <li>
                  <a href="OJTReport">OJT Report</a>
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
                  <a href="Hostel">Hostels Info</a>
                </li>
                <li>
                  <a href="AddHostel">Add a Hostel</a>    
                </li>              
                <li>
                  <a href="AddRoom">Add a Room</a>
                  <hr>
                </li><?php } ?>
                <li><?php if($_SESSION['user_type']=='STU' ){ ?>
                  <a href="RequestHostel">Request Hostel</a>
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

          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fab fa-amazon-pay"></i>
              <span>Payments</span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul> 
                <li> <?php if($_SESSION['user_type']=='ACC'||'ADM'){ ?>
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
                  <a href="BloodDonations">Blood Donations Info</a>
                </li> <?php } ?> 
                <li><?php if((($_SESSION['user_type'] =='WAR') || ($_SESSION['user_type'] =='HOD') || ($_SESSION['user_type'] =='STU'))) { ?>
                  <a href="BloodDonors">Blood Donors</a>
                  <hr>
                </li>  <?php } ?>             
                <li><?php if($_SESSION['user_type'] =='ADM') { ?>
                  <a href="DonateBlood">Donate Blood</a>
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
      <a href="<?php if($_SESSION['user_type']=='STU'){echo 'Student_profile';}else{echo 'Profile';}  ?>">
        <i class="fa fa-cog"></i>
        <span class="badge-sonar"></span>
      </a>
      <a href="signin?signout">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>

  <main class="page-content">
    <div class="container-fluid">
