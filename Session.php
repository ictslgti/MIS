<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
include_once("attendancenav.php");
$username = $_SESSION['user_name'];
?>
<!--END DON'T CHANGE THE ORDER-->


<div class="container" style="margin-top:30px">
  <div class="card">
   <div class="card-header">
      <div class="row">
        <div class="col-md-9">Student Attendance Status</div>
        <div class="col-md-3" align="right">
          
        </div>
      </div>
    </div>
    <div class="row">

<div class="col-sm-9 " ></div>
<div class="col-sm-3 " > 
<form class="form-inline md-form form-sm mt-4">
  <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="text" placeholder="Search ID" aria-label="Search"id="search"> 
  <i class="fas fa-search ml-3" aria-hidden="true"></i>
</form>
</div>
</div>
   <div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="student_table">
          <thead>
          <tr>
      <th scope="col">#</th>
      <th scope="col">Staff Name</th>
      <th scope="col">Course Name</th>
      <th scope="col">Module  Name</th>
      <th scope="col">Academic Year</th>
      <th scope="col">Options</th>
    </tr>
          </thead>
          <tbody>
          <?php
        
        $sql_m = "SELECT `staff_module_enrollment`.`staff_id`,`staff_module_enrollment`.`course_id`,`staff_module_enrollment`.`staff_module_enrollment_id`, `staff_module_enrollment`.`module_id`, `staff_module_enrollment`.`academic_year`,`staff_module_enrollment`.`staff_module_enrollment_date`,`module`.`module_name` FROM `staff_module_enrollment` LEFT JOIN `module` ON `module`.`module_id` = `staff_module_enrollment`.`module_id` AND `module`.`course_id` = `staff_module_enrollment`.`course_id` WHERE `staff_module_enrollment`.`staff_id` = '$username'  ORDER BY `staff_module_enrollment`.`staff_module_enrollment_date` DESC";
        $result_m = mysqli_query($con,$sql_m);
        while($row_m = mysqli_fetch_assoc($result_m)){

            echo '
        <tr>
        <th scope="row">'.$row_m['staff_module_enrollment_id'].'</th>
        <th scope="row">'.$row_m['staff_id'].'</th> 
        <th scope="row">'.$row_m['course_id'].'</th> 
        <th scope="row">'.$row_m['module_id'].'</th> 
        <th scope="row">'.$row_m['academic_year'].'</th>
        <th scope="row">
            <a href="MarkAttendance?id='.$row_m['staff_module_enrollment_id'].'&mid='.$row_m['module_id'].'&cid='.$row_m['course_id'].'&ay='.$row_m['academic_year'].'&staff='.$row_m['staff_id'].'" class="btn btn-sm btn-info"><i class="far fa-info"></i></a>
        </th>
        </tr>
        ';
        }
        ?>

          </tbody>
        </table>
    </div>
   </div>
  </div>
</div>

</body>
</html>



<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->