<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Staff Module Enrollment Details | MIS | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<div class="shadow p-3 mb-2 bg-white rounded">
    <div class="highlight-blue">
        <div class="container">
            <div class="intro">
                <h1 class="display-4 text-center">Staff Module Enrollment Details</h1>
                <p class="text-center">List of teacher's details</p>
            </div>
        </div>
    </div>
</div>

<div class="row mb-2">
    <div class="col-sm-12">
        <a href="ModuleEnrollment.php" class="btn btn-primary" role="button" aria-pressed="true"><i
                class="fas fa-user-plus"></i> Enroll a Staff </a>
    </div>
</div>


<form method="GET">
    <div class="form-row pb-4">
        <div class="col-3">
            <div class="form-row align-items-center">
                <select class="selectpicker mr-sm-2" id="TeacherName" name="staff_id" data-live-search="true" data-width="100%">
                    <option value="null" selected disabled>-- Select a Teacher --</option>
                    <?php
          $sql = "SELECT * FROM `staff`";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo '<option  value="'.$row["staff_id"].'" required>('.$row["staff_epf"].') '.$row["staff_name"].'</option>';
          }
          }else{
            echo '<option value="null"   selected disabled>-- No Teacher --</option>';
          }
          ?>
                </select>
            </div>
        </div>

        <div class="col-md-3 col-sm-12">
            <div class="form-row align-items-center">
                <select class="selectpicker mr-sm-2" id="Course" onchange="showModule(this.value)" name="course_id" data-live-search="true" data-width="100%">
                    <option value="null" selected disabled>-- Select a Course --</option>
                    <?php
          $sql = "SELECT * FROM `course`";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo '<option  value="'.$row["course_id"].'" required>('.$row["course_id"].') '.$row["course_name"].'</option>';
          }
          }else{
            echo '<option value="null"   selected disabled>-- No Teacher --</option>';
          }
          ?>
                </select>
            </div>
        </div>

        <div class="col-md-3 col-sm-12">
            <div class="form-row align-items-center">
                <select class="custom-select mr-sm-2" id="Module" name="module_id">
                    <option value="null" selected disabled>-- Select a Course --</option>
                </select>
            </div>
        </div>

        <div class="col-md-2 col-sm-12">
            <div class="form-row align-items-center">
                <select class="selectpicker mr-sm-2" id="academic_year" name="academic_year" data-live-search="true" data-width="100%">
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

        <div class="col-md-1 col-sm-12">
            <div class="form-row align-items-center">
                <button type="button" class="btn btn-primary align= right" onclick="showTeacher()"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
</form>


<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Staff Name</th>
            <th scope="col">Course Name</th>
            <th scope="col">Module Name</th>
            <th scope="col">Academic Year</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
 
          ?>
    </tbody>

    <tbody id="Teacher">

            </tbody>
</table>

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

function showTeacher() {
    var tid = document.getElementById("TeacherName").value;
    var cid = document.getElementById("Course").value;
    var mid = document.getElementById("Module").value;
    var aid = document.getElementById("academic_year").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("Teacher").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "controller/getTeacher", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("StaffModuleEnrollment=1&staff_id=" + tid + "&course_id=" + cid+ "&module_id=" + mid+ "&academic_year=" + aid);
}

</script>
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->