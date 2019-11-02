<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->
<form>
        <div class="row border rounded-lg border-info mr-5 ml-5 mt-5 mb-5">
        <div class="col-md-12 col-sm-12  form-group  container bg-info">
            <h2  class="pt-2" style="color:white"> <i class="fas fa-newspaper"></i>Timetable Info</h2>
            </div>
            <div class="w-100"></div>
            <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                <label class="font-weight-bold" for="category">01. Department</label> <span style="color:red;">*</span></label>
                <select class="selectpicker mr-sm-2" id="department" onchange="showModule(this.value)" name="department_id"
                    data-live-search="true" data-width="100%">
                    <option value="null" selected disabled>-- Select a department --</option>
                                <?php
                            $sql = "SELECT * FROM `department`";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '<option  value="'.$row["department_id"].'" required>('.$row["department_id"].') '.$row["department_name"].'</option>';
                            }
                            }else{
                                echo '<option value="null"   selected disabled>-- No Teacher --</option>';
                            }
                            ?>
                </select>
            </div>
            <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                    <label class="font-weight-bold" for="category">02.Academic Year</label> <span style="color:red;">*</span></label>
                    <select class="selectpicker mr-sm-2" id="academic" onchange="showModule(this.value)" name="academic_id"
                    data-live-search="true" data-width="100%">
                        <option value="null" selected disabled>-- Select a Academic Year --</option>
                                    <?php
                            $sql = "SELECT * FROM `academic` ORDER BY `academic_year` DESC";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '<option  value="'.$row["academic_year"].'"'; 
                                if($row["academic_year_status"]=='Active') echo ' selected ';
                                echo 'required>'.$row["academic_year"].'</option>';
                            }
                            }else{
                                echo '<option value="null"   selected disabled>-- No Teacher --</option>';
                            }
                            ?>
                </select>
             </div>
                <div class="w-100"></div>
                <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                    <label class="font-weight-bold" for="pubName">03. Course</label> <span style="color:red;">*</span></label>
                    <select class="selectpicker mr-sm-2" id="Course" onchange="showModule(this.value)" name="course_id"
                        data-live-search="true" data-width="100%">
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
        

                <div class="col-md-12 col-sm-12 form-group pl-3 pr-3">
                <input class="btn btn-dark ml-2 mt-2 float-right" type="reset" value="Reset">
                <button type="submit" class="btn btn-info mt-2 float-right"><a href="Timetable.php">View</button></a>
                </div>
            
                </div>
                </div>
        </form>

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
    xmlhttp.send("Department=" + did + "&Course="+ cid );
}
</script>
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
