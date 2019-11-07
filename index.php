<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->



<?php
// echo $_SESSION['user_table'];
// echo $_SESSION['user_name'];
if($_SESSION['user_type']  == 'STU'){
   $u_type= $_SESSION['user_name'];
   $table = $_SESSION['user_table'];
    $sql ="SELECT course_id from student_enroll where  student_id= '$u_type'";

    $result = mysqli_query($con,$sql);
    if (mysqli_num_rows($result)>0) {
         while($row=mysqli_fetch_assoc($result)){
            $course=$row["course_id"];
            $sql1="SELECT module_id from module where course_id='$course'";
            $result4 = mysqli_query($con,$sql1);
            if (mysqli_num_rows($result4)>0) {
                 while($row=mysqli_fetch_assoc($result4)){
                      $module=$row["module_id"];
                     $sql2="SELECT survey_id FROM feedback_survey where  course_id='$course' and module_id='$module' and end_date > curdate() and start_date <= curdate()";
                     $result5 = mysqli_query($con,$sql2);
                     if (mysqli_num_rows($result5)>0) {
                          while($row=mysqli_fetch_assoc($result5)){
                           $survey_id=$row["survey_id"];
                           $sql3="SELECT survey_id,student_id FROM feedback_done where survey_id='$survey_id' and student_id='$u_type'";
                           $result6 = mysqli_query($con,$sql3);
                           if (mysqli_num_rows($result6)==0) {

                           echo '
                           <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong > New Notification! <span style="font-size:20px;">&#129335;</span> </strong> New Survey Added For <strong> '.$module.' </strong>&nbsp;Pleace Give Your Feedback &nbsp;
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                                </button>
                            <a href="Addfbdetail.php?id='. $row["survey_id"].'" class="btn btn-sm btn-warning float-right mr-5"><i class="fas fa-eye"></i></a> 
                                </div>
                           ';
                     
                          }}
                        }else{
                           
                        }
                     
                 }
                }else{
                   
                }

    }}else{
       
    }
}else{
   // echo 'your not a student'.$_SESSION['user_type'];
}

?>

<!--BLOCK#2 START YOUR CODE HERE -->
<!-- <form onsubmit="showTeacher()">
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
</div> -->

<?php
$total_course = 0;
$total_students = 0;
?>

<div class="row mt-3">
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
                <p class="card-text display-2 font-weight-lighter">
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
<hr>




<div class="row">
<div class="col-md-2">
    Academic Year is : 
                </div>
    <div class="col-md-3">
        <select class="mb-2 selectpicker show-tick custom-select-sm" required onchange="showStudent(this.value)" data-live-search="true" data-width="100%">
            <option value="ALL" selected>ALL</option>
            <?php
            $sql = "SELECT * FROM `academic` ORDER BY `academic_year`  DESC ";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
            echo '<option  value="'.$row ['academic_year'].'" data-subtext="'.$row ['academic_year_status'].'">'.$row ['academic_year'].'</option>';
            }
            }
            ?>
        </select>
    </div>
</div>
<div class="text-center loading">
  <div class="spinner-border text-primary" role="completed">
    <span class="sr-only">Loading...</span>
  </div>
</div>
<div class="row m-2">
    <div class="col-md-12">
        <canvas id="myChart1"></canvas>
    </div>
</div>
<hr>






<div class="row">
    <div class="col-md-4 col-sm-12">
        <!-- <button type="button" class="btn btn-primary btn-sm btn-block mb-2">Small button</button> -->

        <div class="card overflow-auto mh-20">
            <h6 class="card-header font-weight-lighter">Students Course Enrollment Distribution</h6>
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
    <h6 class="card-title font-weight-lighter"><small>'.$cname.'</small></h6>
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
            <h6 class="card-header font-weight-lighter">Students Course Dropout Distribution </h6>
            <div class="card-body">
                <?php
$sql = "SELECT * FROM `course` ORDER BY `course_name` ASC ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)){

    $cid = $row['course_id'];
    $cname = $row['course_name'];
    $sql_c = "SELECT COUNT(`student_id`) AS `c_count` FROM `student_enroll` WHERE `course_id` = '$cid' AND `student_enroll_status` = 'Dropout' ";
    $result_c = mysqli_query($con, $sql_c);
    $row_c = mysqli_fetch_assoc($result_c);
    $course_count =  $row_c['c_count'];
    $student_percentage = 0;
    $student_percentage = round ( ($course_count/$total_students)*100); 
    // echo $total_students;
    echo '
    <h6 class="card-title font-weight-lighter"><small>'.$cname.'</small></h6>
    <p class="card-text">
        <div class="progress">
            <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" style="width: '.$student_percentage.'%;" aria-valuenow="'.$student_percentage.'"
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
            <h6 class="card-header font-weight-lighter">Students Course Following Distribution </h6>
            <div class="card-body">
                <?php
$sql = "SELECT * FROM `course` ORDER BY `course_name` ASC ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)){

    $cid = $row['course_id'];
    $cname = $row['course_name'];
    $sql_c = "SELECT COUNT(`student_id`) AS `c_count` FROM `student_enroll` WHERE `course_id` = '$cid' AND `student_enroll_status` = 'Following' ";
    $result_c = mysqli_query($con, $sql_c);
    $row_c = mysqli_fetch_assoc($result_c);
    $course_count =  $row_c['c_count'];
    $student_percentage = 0;
    $student_percentage = round ( ($course_count/$total_students)*100); 
    // echo $total_students;
    echo '
    <h6 class="card-title font-weight-lighter"><small>'.$cname.'</small></h6>
    <p class="card-text">
        <div class="progress">
            <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" style="width: '.$student_percentage.'%;" aria-valuenow="'.$student_percentage.'"
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
            <h6 class="card-header font-weight-lighter">Students Course Completion Distribution</h6>
            <div class="card-body">
                <?php
$sql = "SELECT * FROM `course` ORDER BY `course_name` ASC ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)){

    $cid = $row['course_id'];
    $cname = $row['course_name'];
    $sql_c = "SELECT COUNT(`student_id`) AS `c_count` FROM `student_enroll` WHERE `course_id` = '$cid' AND `student_enroll_status` = 'Completed'";
    $result_c = mysqli_query($con, $sql_c);
    $row_c = mysqli_fetch_assoc($result_c);
    $course_count =  $row_c['c_count'];
    $student_percentage = 0;
    $student_percentage = round ( ($course_count/$total_students)*100); 
    // echo $total_students;
    echo '
    <h6 class="card-title font-weight-lighter"><small>'.$cname.'</small></h6>
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
    <!-- COL-3 END -->

    <div class="col-md-4 col-sm-12">
        <div class="card">
            <h6 class="card-header font-weight-lighter">Students Course Dropout Distribution </h6>
            <div class="card-body">
                <?php
$sql = "SELECT * FROM `course` ORDER BY `course_name` ASC ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)){

    $cid = $row['course_id'];
    $cname = $row['course_name'];
    $sql_c = "SELECT COUNT(`student_id`) AS `c_count` FROM `student_enroll` WHERE `course_id` = '$cid' AND `student_enroll_status` = 'Dropout' ";
    $result_c = mysqli_query($con, $sql_c);
    $row_c = mysqli_fetch_assoc($result_c);
    $course_count =  $row_c['c_count'];
    $student_percentage = 0;
    $student_percentage = round ( ($course_count/$total_students)*100); 
    // echo $total_students;
    echo '
    <h6 class="card-title font-weight-lighter"><small>'.$cname.'</small></h6>
    <p class="card-text">
        <div class="progress">
            <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" style="width: '.$student_percentage.'%;" aria-valuenow="'.$student_percentage.'"
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
</div>
<hr>





<!-- 
<div class="row m-2">
    <div class="col-md-12  ">
        <canvas id="myChart"></canvas>
    </div>
</div> -->


<!-- 
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

 -->

<script>
showStudent('ALL');

function showStudent(val) {
    var course_id_label = [];
    var course_total_count = [];
    var course_completed_count = [];
    var course_droupout_count = [];
    var course_following_count = [];

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data_students_count = JSON.parse(this.responseText);
            for (var i in data_students_count) {
                course_id_label.push(data_students_count[i].course_id);
                course_total_count.push(data_students_count[i].t_count);
                course_completed_count.push(data_students_count[i].c_count);
                course_droupout_count.push(data_students_count[i].d_count);
                course_following_count.push(data_students_count[i].d_count);
            }
            
            var ctx = document.getElementById('myChart1');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: course_id_label,
                    datasets: [{
                        label: "Total Students ",
                        backgroundColor: "#5a407d",
                        data: course_total_count
                    }, {
                        label: "Dropout Students ",
                        backgroundColor: "#dc3545",
                        data: course_droupout_count
                    }, {
                        label: "Completed Students ",
                        backgroundColor: "#28a745",
                        data: course_completed_count
                    },{
                        label: "Following Students ",
                        backgroundColor: "#007bff",
                        data: course_droupout_count
                    },{
                        label: "LongAbsent Students",
                        backgroundColor: "#deb647",
                        data: course_droupout_count
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Course vs Students Enrollments Distribution'
                    },
                    legend: {
                        display: true,
                        labels: {
                            fontColor: 'rgb(0, 0, 0)'
                        }
                    }
                }
            });

            document.getElementsByClassName('loading')[0].style.visibility = 'hidden';
        }
    };
    xmlhttp.open("POST", "controller/StudentsCourseDistribution", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("AcademicYear=" + val);
}
</script>
<!-- <script>
var course_id = [];
var c_count = [];
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var datax = JSON.parse(this.responseText);
        for (var i in datax) {
            c_count.push(parseInt(datax[i].c_count, 10));
            course_id.push(datax[i].course_id);

        }
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: course_id,
                datasets: [{
                    label: '# of Students',
                    data: c_count,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ]
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
};
xmlhttp.open("POST", "controller/getChartData", true);
xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xmlhttp.send("x=1");
</script> -->
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->