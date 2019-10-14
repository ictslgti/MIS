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
    <div class="col-sm-12 col-md-12 col-lg-12">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody id="Teacher">

            </tbody>
        </table>
    </div>
</div>



<div class="row">
    <div class="col-md-3 col-sm-12">
        <div class="card text-light bg-dark text-center">
            <div class="card-header text-center"> Registered Students <a href="" class="btn btn-primary btn-sm">View</a>
            </div>
            <div class="card-body">
                <h1 class="display-4 "><i class="fa fa-user-graduate text-light"></i>1235</h1>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                aria-valuemax="100">25%</div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
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
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("Teacher").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "controller/getTeacher", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("Department=" + did + "&Course=" + cid);
}
</script>
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->