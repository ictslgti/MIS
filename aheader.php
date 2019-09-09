
<!--Block#1 start dont change the order-->
<?php 
$title="Home | SLGTI";    
include_once ("config.php");
include_once ("head.php");
include_once ("menu.php");
?>
<!-- end dont change the order-->


<!-- Block#2 start your code -->
    




<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Attendance System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.min.css">
    <style>
      
    </style>
</head>
<body>










<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="grade-tab" data-toggle="tab" href="grade.php" role="tab" aria-controls="grade" aria-selected="false">Grade</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="teacher-tab" data-toggle="tab" href="teacher.php" role="tab" aria-controls="teacher" aria-selected="false">Teacher</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="student-tab" data-toggle="tab" href="student.php" role="tab" aria-controls="student" aria-selected="false">Student</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="attendance-tab" data-toggle="tab" href="attendance.php" role="tab" aria-controls="attendance" aria-selected="false">Attendance</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="logout-tab" data-toggle="tab" href="logout.php" role="tab" aria-controls="logout" aria-selected="false">Logout</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
  <div class="tab-pane fade" id="grade" role="tabpanel" aria-labelledby="grade-tab">...</div>
  <div class="tab-pane fade" id="teacher" role="tabpanel" aria-labelledby="teacher-tab">...</div>
  <div class="tab-pane fade" id="student" role="tabpanel" aria-labelledby="student-tab">...</div>
  <div class="tab-pane fade" id="attendance" role="tabpanel" aria-labelledby="attendance-tab">...</div>
  <div class="tab-pane fade" id="logout" role="tabpanel" aria-labelledby="logout-tab">...</div>
</div>






</body>
</html>

























<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("menu.php"); ?>  
<!--  end dont change the order-->