<?php
include_once("../config.php");
if(isset($_POST['department'])){
    $id = $_POST['department'];
    echo '<option value="null"   selected disabled>--Select Course--</option>';
    $sql = "SELECT * FROM `course`  WHERE `department_id` = '$id'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
        echo '<option  value="'.$row["course_id"].'" required>'.$row["course_name"].'</option>';
        }
    }else{
        echo '<option value="null"   selected disabled>-- No Courses --</option>';
    }
}

if(isset($_POST['course'])){
    $id = $_POST['course'];
    echo '<option value="null"   selected disabled>--Select Course--</option>';
    $sql = "SELECT * FROM `course`  WHERE `course_id` = '$id'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
        echo '<option  value="'.$row["course_id"].'" required>'.$row["course_name"].'</option>';
        }
    }else{
        echo '<option value="null"   selected disabled>-- No Courses --</option>';
    }
}

?>