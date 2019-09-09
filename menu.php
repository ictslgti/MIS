 <!-- Sidebar -->
 <div class="border-right" id="sidebar-wrapper">
     <div class="sidebar-heading">  <a href="index.php"> <img src="img/logo-1.png" height="30" class="d-inline-block align-top"
                alt=""></a>       
    </div>
     <div class="list-group list-group-flush">    
         <a class="list-group-item list-group-item-action" href="index.php"> <i class="fas fa-home"></i>
             Dashboard <span class="sr-only">(current)</span></a>

         <div class="dropdown">
             <a class="list-group-item list-group-item-action dropdown-toggle" href="#" id="Department"
                 role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-university"></i> Department
             </a>
             <div class="dropdown-menu " aria-labelledby="Department">
                 <a class="dropdown-item" href="#">Course</a>
                 <a class="dropdown-item" href="#">Academic Year</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="#">Something else here</a>
             </div>
        </div>
        <div class="dropdown">
             <a class="list-group-item list-group-item-action dropdown-toggle" href="#" id="Staff" role="button" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-user-tie"></i> Staff
             </a>
             <div class="dropdown-menu" aria-labelledby="Staff">
                 <a class="dropdown-item" href="#">Leave Request</a>
                 <a class="dropdown-item" href="#">Academic Year</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="staffdetails.php">staffdetails</a>
             </div>
        </div>
        <div class="dropdown">
             <a class="list-group-item list-group-item-action dropdown-toggle" href="#" id="Student" role="button" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-user-graduate"></i> Student
             </a>
             <div class="dropdown-menu" aria-labelledby="Student">
                 <a class="dropdown-item" href="#">On-Peak/Off-Peak Request</a>
                 <a class="dropdown-item" href="#">Academic Year</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="#">Something else here</a>
             </div>
        </div>
        <div class="dropdown">
             <a class="list-group-item list-group-item-action dropdown-toggle" href="#" id="ojt" role="button" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-briefcase"></i> OJT
             </a>
             <div class="dropdown-menu" aria-labelledby="ojt">
                 <a class="dropdown-item" href="#">Requesting to a place</a>
                 <a class="dropdown-item" href="#">view your training place</a>
                 <a class="dropdown-item" href="#">Changing request to your training place</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="#">Something else here</a>
             </div>
        </div>
             <a class="list-group-item list-group-item-action" href="examinations.php"><i class="fas fa-chalkboard-teacher"></i> Assessment</a>

             <a class="list-group-item list-group-item-action" href="library.php"><i class="far fa-file-alt"></i> Inventory</a>
        <div class="dropdown">
             <a class="list-group-item list-group-item-action dropdown-toggle" href="#" id="library" role="button" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-book-open"></i> Library 
             </a>
             <div class="dropdown-menu" aria-labelledby="library">
                 <a class="dropdown-item" href="library.php">Manage books</a>
                 <a class="dropdown-item" href="library.php">Add new book</a>
                 <a class="dropdown-item" href="library_issue.php">Issue Book</a>
                 <a class="dropdown-item" href="library_issue.php">Manage Issued books</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="library_dashboard">Library Home</a>
             </div>
        </div>

             <a class="list-group-item list-group-item-action" href="Foodorder.php"> <i class="fas fa-hamburger"></i> Canteen</a>

             <a class="list-group-item list-group-item-action" href="#"><i class="fab fa-facebook-messenger"></i> Messaging</a>
        <div class="dropdown">
             <a class="list-group-item list-group-item-action dropdown-toggle" href="#" id="library" role="button" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false">
                 <i class="far fa-grin"></i> Feedback 
             </a>
             <div class="dropdown-menu" aria-labelledby="library">
                 <a class="dropdown-item" href="feedbacksummery.php">Feedback info</a>
                 <a class="dropdown-item" href="feedback.php">Student report feedback</a>
               
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="Feedback_dashboard">Feedback Home</a>
             </div>
        </div>
             <a class="list-group-item list-group-item-action" href="onpeak.php"><i class="fas fa-leaf"></i> Onpeak</a>

             <a class="list-group-item list-group-item-action" href="notice.php"><i class="fas fa-"></i>Notice</a>

     </div>
 </div>
 <!-- /#sidebar-wrapper -->
 <!-- Page Content -->
 <div id="page-content-wrapper">

     <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
         <button class="btn btn-dark" id="menu-toggle"><i class="fas fa-bars"></i> </button>

         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div id="timestamp" class="pr-5 pl-2 ml-auto"></div>  
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                 <li class="nav-item">
                     <a class="nav-link" href="notifications.php"><i class="fas fa-bell"></i> <span
                             class="badge badge-primary badge-pill">14</span></a>
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
                         <a class="dropdown-item" href="signin.php">Signout</a>
                     </div>
                 </li>
             </ul>
         </div>
     </nav>
     <div class="container-fluid">