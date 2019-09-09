 <!-- Sidebar -->
 <div class="border-right" id="sidebar-wrapper">
     <div class="sidebar-heading"> <a href="index"> <img src="img/logo-1.png" height="30"
                 class="d-inline-block align-top" alt=""></a>
     </div>
     <div class="list-group list-group-flush">
         <a class="list-group-item list-group-item-action" href="index"> <i class="fas fa-home"></i>
             Dashboard <span class="sr-only">(current)</span></a>

         <div class="dropdown">
             <a class="list-group-item list-group-item-action dropdown-toggle" href="#" id="Department" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-university"></i> Department
             </a>
             <div class="dropdown-menu " aria-labelledby="Department">
                 <a class="dropdown-item" href="Department">Department Info</a>
                 <a class="dropdown-item" href="AddDepartment">Add a Department</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="AcademicYear">Academic Year Info</a>
                 <a class="dropdown-item" href="AddAcademicYear">Add a Academic Year</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="Course">Course Info</a>
                 <a class="dropdown-item" href="AddCourse">Add a Course</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="Module">Module Info</a>
                 <a class="dropdown-item" href="addModule">Add a Module</a>
             </div>
         </div>
         <div class="dropdown">
             <a class="list-group-item list-group-item-action dropdown-toggle" href="#" id="Staff" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-user-tie"></i> Staff
             </a>
             <div class="dropdown-menu" aria-labelledby="Staff">
                 <a class="dropdown-item" href="Staff">Staff Info</a>
                 <a class="dropdown-item" href="AddStaff">Add a Staff</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="StaffModuleEnrollment">Module Enrollment</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="StaffExit">Staff Exit</a>
             </div>
         </div>
         <div class="dropdown">
             <a class="list-group-item list-group-item-action dropdown-toggle" href="#" id="Student" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-user-graduate"></i> Student
             </a>
             <div class="dropdown-menu" aria-labelledby="Student">
                 <a class="dropdown-item" href="Student">Student Info</a>
                 <a class="dropdown-item" href="AddStudent">Add a Student</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="StudentReEnroll">Student Re Enroll</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="StudentEnrollmentReport">Student Enrollment Report</a>
             </div>
         </div>
         <div class="dropdown">
             <a class="list-group-item list-group-item-action dropdown-toggle" href="#" id="Assessment" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-chalkboard-teacher"></i> Examination
             </a>
             <div class="dropdown-menu" aria-labelledby="Assessment">
                 <a class="dropdown-item" href="Assessment">Assessment Info</a>
                 <a class="dropdown-item" href="AddAssessment">Add a Assessment</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="AssessmentReport">Assessment Report</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="TVECExamination">TVEC Examination Info</a>
                 <a class="dropdown-item" href="AddTVECExamination">Add TVEC Examination</a>
             </div>
         </div>
         <div class="dropdown">
             <a class="list-group-item list-group-item-action dropdown-toggle" href="#" id="Assessment" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-chalkboard-teacher"></i> Attendance
             </a>
             <div class="dropdown-menu" aria-labelledby="Assessment">
                 <a class="dropdown-item" href="Attendance">Attendance Info</a>
                 <a class="dropdown-item" href="AddAttendance">Add a Attendance</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="AttendanceReport">Attendance Report</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="WarningsLetters">Warnings Letters</a>
             </div>
         </div>
         <div class="dropdown">
             <a class="list-group-item list-group-item-action dropdown-toggle" href="#" id="ojt" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-briefcase"></i> On-the-job Training
             </a>
             <div class="dropdown-menu" aria-labelledby="ojt">
                 <a class="dropdown-item" href="OJT">On-the-job Training Info</a>
                 <a class="dropdown-item" href="AddOJT">Add a Training Place</a>
                 <a class="dropdown-item" href="OJTRequest">Students Request</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="PlacementRequest">Student Placement Request</a>
                 <a class="dropdown-item" href="OJTInfo">Training Place Info </a>
                 <a class="dropdown-item" href="OJTChange">Placement Chage</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="OJTReport">OJT Report</a>
             </div>
         </div>
         <div class="dropdown">
             <a class="list-group-item list-group-item-action dropdown-toggle" href="#" id="library" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="far fa-grin"></i> Feedback
             </a>
             <div class="dropdown-menu" aria-labelledby="library">
                 <a class="dropdown-item" href="StudentFeedback">Student Feedback Info</a>
                 <a class="dropdown-item" href="AddStudentFeedback">Create a Student Feedback</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="TeacherFeedback">Teacher Feedback Info</a>
                 <a class="dropdown-item" href="AddTeacherFeedback">Create a Teacher Feedback</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="IndustryFeedback">Industry Feedback Info</a>
                 <a class="dropdown-item" href="AddIndustryFeedback">Create a Industry Feedback</a>
             </div>
         </div>
         <div class="dropdown">
             <a class="list-group-item list-group-item-action dropdown-toggle" href="#" id="Inventory" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-file-alt"></i> Inventory
             </a>
             <div class="dropdown-menu" aria-labelledby="Inventory">
                 <a class="dropdown-item" href="Inventory">Inventory Info</a>
                 <a class="dropdown-item" href="AddInventory">Add a Inventory</a>
                 <a class="dropdown-item" href="AddItem">Add a Item</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="InventoryReport">Inventory Report</a>
             </div>
         </div>
         <div class="dropdown">
             <a class="list-group-item list-group-item-action dropdown-toggle" href="#" id="library" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-book-open"></i> Library
             </a>
             <div class="dropdown-menu" aria-labelledby="library">
                 <a class="dropdown-item" href="Library">Library Info</a>
                 <a class="dropdown-item" href="AddBook">Add a Book</a>
                 <a class="dropdown-item" href="AddBookCategory">Add a category</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="IssuedBook">Issued book Info</a>
                 <a class="dropdown-item" href="IssueBook">Issue a Book</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="LibraryReport">Library Report</a>
             </div>
         </div>

         <a class="list-group-item list-group-item-action" href="Foodorder"> <i class="fas fa-hamburger"></i>
             Canteen</a>

         <a class="list-group-item list-group-item-action" href="#"><i class="fab fa-amazon-pay"></i> Payment </a>
        
         <a class="list-group-item list-group-item-action" href="onpeak"><i class="fas fa-leaf"></i> Onpeak</a>

         <a class="list-group-item list-group-item-action" href="notice"><i class="fas fa-"></i>Notice</a>

     </div>
 </div>
 <!-- /#sidebar-wrapper -->
 <!-- Page Content -->
 <div id="page-content-wrapper">

     <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
         <button class="btn btn-dark" id="menu-toggle"><i class="fas fa-bars"></i> </button>

         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div id="timestamp" class="pr-5 pl-2 ml-auto text-info"></div>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                 <li class="nav-item">
                     <a class="nav-link" href="chat"><i class="fab fa-facebook-messenger"></i> <span
                             class="badge badge-primary badge-pill">109</span></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="notifications"><i class="fas fa-bell"></i> <span
                             class="badge badge-warning badge-pill">14</span></a>
                 </li>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         John Smith
                         <img src="img/user.png" class="userpicture" role="presentation" aria-hidden="true" width="35"
                             height="35">
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                         <a class="dropdown-item" href="#">Profile</a>
                         <a class="dropdown-item" href="signin">Signout</a>
                     </div>
                 </li>
             </ul>
         </div>
     </nav>
     <div class="container-fluid">