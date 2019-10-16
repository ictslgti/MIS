<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->
<form onsubmit="showTeacher(this.value)">
    <div class="row p-3">
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="form-group">
                <select class="form-control custom-select" id="Departmentx" name="Department"
                    onchange="showCouese(this.value)" required>
                    <option value="null" selected disabled>--Select Department--</option>
                    <?php          
$sql = "SELECT * FROM `department`";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    echo '<option  value="'.$row["department_id"].'" required>'.$row["department_name"].'</option>';
    }
}
?>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="form-group">
                <select class="form-control custom-select" id="Course" name="Course" onchange="showModule(this.value)"
                    required>
                    <option value="null" selected disabled>--Select Department--</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="form-group">
                <select class="form-control custom-select" id="Module" name="module" required>
                    <option value="null" selected disabled>--Select Course--</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
            <button type="button" id="submit" class="btn btn-primary btn-block" onclick="showTeacher()"><i
                    class="fa fa-user-tie text-light"></i> Searach
                Teachers</button>
        </div>
    </div>
</form>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 table-responsive">
        <table class="table table-sm table-striped ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Staff ID</th>
                    <th scope="col">Course ID</th>
                    <th scope="col">Module ID</th>
                    <th scope="col">Academic Year</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody id="Teacher">

            </tbody>
        </table>
    </div>
</div>



<div class="row">
    <div class="col-md-2 col-sm-12">
    <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Departments</h5>
                <p class="card-text display-2 ">6</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Courses</h5>
                <p class="card-text display-2 ">25</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Modules</h5>
                <p class="card-text display-2 ">352</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Academic Years</h5>
                <p class="card-text display-2 ">3</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>

    <div class="col-md-2 col-sm-12">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Teachers</h5>
                <p class="card-text display-2 ">65</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Students</h5>
                <p class="card-text display-2 ">6995</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
</div>

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
<script>
function showCouese(val) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("Course").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "controller/getCourse", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("department=" + val);
}

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
    var did = document.getElementById("Departmentx").value;
    var cid = document.getElementById("Course").value;
    var mid = document.getElementById("Module").value;
    var aid = null;
    var tid = null;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("Teacher").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "controller/getTeacher", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("StaffModuleEnrollment=1&staff_id=" + tid + "&course_id=" + cid + "&module_id=" + mid +
        "&academic_year=" + aid);
}
</script>
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->