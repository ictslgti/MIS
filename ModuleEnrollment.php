<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Module Enrollment | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<div class="shadow p-3 mb-5 bg-white rounded">
  <div class="highlight-blue">
      <div class="container">
          <div class="intro">
              <h1 class="display-4 text-center">Module Enrollment</h1>
              <!-- <H3 class="display-5 text-center">Department Of Information & Communication Technology</H3> -->
              <p class="text-center">Enroll a module to teacher in academic year</p>
          </div>
      </div>
  </div>
  </div>

<form method="GET">
  <div  class="row pb-3">  
    <div class="col-6">
      <div class="form-row align-items-center">
        <label for="TeacherName">Teacher Name</label>
          <select class="custom-select mr-sm-2" id="TeacherName" name="staff_id">
          <option value="null" selected disabled>-- Select a Teacher --</option>
          <?php
          $sql = "SELECT * FROM `staff`";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo '<option  value="'.$row["staff_id"].'" required>'.$row["staff_name"].'</option>';
          }
          }else{
            echo '<option value="null"   selected disabled>-- No Teacher --</option>';
          }
          ?>
          </select>
      </div>
    </div>

    <div class="col-6">
      <div class="form-row align-items-center">
        <label for="Course">Course</label>
          <select class="custom-select mr-sm-2" id="Course" onchange="showModule(this.value)" name="course_id">
          <option value="null" selected disabled>-- Select a Course --</option>
          <?php
          $sql = "SELECT * FROM `course`";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo '<option  value="'.$row["course_id"].'" required>'.$row["course_name"].'</option>';
          }
          }else{
            echo '<option value="null"   selected disabled>-- No Teacher --</option>';
          }
          ?>
          </select>
      </div>
    </div>
  </div>

  <div  class="row pb-3">  
    <div class="col-6">
      <div class="form-row align-items-center">
        <label for="inputFirstName">Module</label>
        <label class="mr-sm-2 sr-only" for="Module">Staff_Name</label>
          <select class="custom-select mr-sm-2" id="Module" name="module_id">
          <option value="null" selected disabled>-- Select a Course --</option>
          </select>
      </div>
    </div>
 
    <div class="col-6">
      <div class="form-row align-items-center">
        <label for="academic_year">Academic Year</label>
        <select class="custom-select mr-sm-2" id="academic_year" name="academic_year">
                    <option value="null" selected disabled>-- Select a Academic Year --</option>
                    <?php
          $sql = "SELECT * FROM `academic` ORDER BY `academic_year` DESC";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo '<option  value="'.$row["academic_year"].'" required>'.$row["academic_year"].'</option>';
          }
          }else{
            echo '<option value="null"   selected disabled>-- No Teacher --</option>';
          }
          ?>
      </select>
      </div>
    </div>
  </div>
  <div class="btn-group-horizontal">
    <button type="submit" class="btn btn-outline-info"><i class="fas fa-user-plus"></i>   Enroll</button> 
    <button type="submit" class="btn btn-outline-info"><i class="fas fa-user-edit"></i>   UPDATE</button> 
    <button type="submit" class="btn btn-outline-info"><i class="fas fa-user-slash"></i>   DELETE</button> 
    <button type="submit" class="btn btn-outline-info"><i class="fas fa-redo"></i>   REFRESH</button> 
    <a href="StaffModuleEnrollment.php" class="btn btn-outline-info" role="button" aria-pressed="true"><i class="fas fa-chevron-left"></i> Back</i></a>
  </div>
</form>



 
<!--END OF YOUR COD-->
<script>
function showModule(val) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("Module").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "controller/getModule", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("course=" + val);
}

</script>
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->