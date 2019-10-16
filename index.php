<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->
<form onsubmit="showTeacher()">
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
            <button type="submit" id="submit" class="btn btn-primary btn-block"><i
                    class="fa fa-user-tie text-light"></i> Search Teachers</button>
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

<?php
$total_course = 0;
$total_students = 0;
?>

<div class="row">
    <div class="col-md-2 col-sm-12">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Departments</h5>
                <p class="card-text display-2 ">
                    <?php          
                    $sql = "SELECT COUNT(`department_id`) AS `d_count` FROM `department`";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                        echo $row['d_count'];
                    }
                ?>
                </p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Courses</h5>
                <p class="card-text display-2 ">
                    <?php          
                    $sql = "SELECT COUNT(`course_id`) AS `d_count` FROM `course`";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                        echo $row['d_count'];
                        $total_course = $row['d_count'];
                    }
                ?>
                </p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Modules</h5>
                <p class="card-text display-2 ">
                    <?php          
                    $sql = "SELECT COUNT(`module_id`) AS `d_count` FROM `module`";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                        echo $row['d_count'];
                    }
                ?>
                </p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Academic Years</h5>
                <p class="card-text display-2 ">
                    <?php          
                    $sql = "SELECT COUNT(`academic_year`) AS `d_count` FROM `academic`";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                        echo $row['d_count'];
                    }
                ?>
                </p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>

    <div class="col-md-2 col-sm-12">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Staff</h5>
                <p class="card-text display-2 ">
                    <?php          
                    $sql = "SELECT COUNT(`staff_id`) AS `d_count` FROM `staff`";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                        echo $row['d_count'];
                    }
                ?>
                </p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Students</h5>
                <p class="card-text display-2 ">
                    <?php          
                    $sql = "SELECT COUNT(`student_id`) AS `d_count` FROM `student`";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                        echo $row['d_count'];
                        $total_students = $row['d_count'];
                    }
                ?>
                </p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
</div>



<div class="row">

    <div class="col-md-4 col-sm-12">
        <div class="card">
            <h5 class="card-header">Students Course Enrollment Distribution</h5>
            <div class="card-body">
<?php
$sql = "SELECT * FROM `course` ORDER BY `course_name` ASC ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)){

    $cid = $row['course_id'];
    $cname = $row['course_name'];
    $sql_c = "SELECT COUNT(`student_id`) AS `c_count` FROM `student_enroll` WHERE `course_id` = '$cid' ";
    $result_c = mysqli_query($con, $sql_c);
    $row_c = mysqli_fetch_assoc($result_c);
    $course_count =  $row_c['c_count'];
    $student_percentage = 0;
    $student_percentage = round ( ($course_count/$total_students)*100); 
    // echo $total_students;
    echo '
    <h5 class="card-title">'.$cname.'</h5>
    <p class="card-text">
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: '.$student_percentage.'%;" aria-valuenow="'.$student_percentage.'"
                aria-valuemin="0" aria-valuemax="100">'.$student_percentage.'%</div>
        </div>
    </p>
    ';
}
}
?>            
            </div>
        </div>

    </div>

<!-- COL-1 END -->

    <div class="col-md-4 col-sm-12">
        <div class="card">
            <h5 class="card-header">Students Course Dropout Distribution</h5>
            <div class="card-body">
<?php
$sql = "SELECT * FROM `course` ORDER BY `course_name` ASC ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)){

    $cid = $row['course_id'];
    $cname = $row['course_name'];
    $sql_c = "SELECT COUNT(`student_id`) AS `c_count` FROM `student_enroll` WHERE `course_id` = '$cid' ";
    $result_c = mysqli_query($con, $sql_c);
    $row_c = mysqli_fetch_assoc($result_c);
    $course_count =  $row_c['c_count'];
    $student_percentage = 0;
    $student_percentage = round ( ($course_count/$total_students)*100); 
    // echo $total_students;
    echo '
    <h5 class="card-title">'.$cname.'</h5>
    <p class="card-text">
        <div class="progress">
            <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" style="width: '.$student_percentage.'%;" aria-valuenow="'.$student_percentage.'"
                aria-valuemin="0" aria-valuemax="100">'.$student_percentage.'%</div>
        </div>
    </p>
    ';
}
}
?>            
            </div>
        </div>
    </div>
    <!-- <col2-end -->
    <div class="col-md-4 col-sm-12">
        <div class="card">
            <h5 class="card-header">Students Course Completion  Distribution</h5>
            <div class="card-body">
<?php
$sql = "SELECT * FROM `course` ORDER BY `course_name` ASC ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)){

    $cid = $row['course_id'];
    $cname = $row['course_name'];
    $sql_c = "SELECT COUNT(`student_id`) AS `c_count` FROM `student_enroll` WHERE `course_id` = '$cid' ";
    $result_c = mysqli_query($con, $sql_c);
    $row_c = mysqli_fetch_assoc($result_c);
    $course_count =  $row_c['c_count'];
    $student_percentage = 0;
    $student_percentage = round ( ($course_count/$total_students)*100); 
    // echo $total_students;
    echo '
    <h5 class="card-title">'.$cname.'</h5>
    <p class="card-text">
        <div class="progress">
            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: '.$student_percentage.'%;" aria-valuenow="'.$student_percentage.'"
                aria-valuemin="0" aria-valuemax="100">'.$student_percentage.'%</div>
        </div>
    </p>
    ';
}
}
?>            
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