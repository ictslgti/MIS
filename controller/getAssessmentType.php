<?php
include_once("../config.php");
if(isset($_POST['course_id'])){
    $id = $_POST['course_id'];
    // $sql = "SELECT * FROM `assessments_type`  WHERE `course_id` = '$id' ";
    // $result = mysqli_query($con, $sql);

    // if (mysqli_num_rows($result) > 0) {
    //     while($row = mysqli_fetch_assoc($result)) {
    //     echo '<option  value="'.$row["module_id"].'" required>'.$row["module_name"].'</option>';
    //     }
    // }else{
    //     echo '<option value="null"   selected disabled>-- No Module --</option>';
    // }

    echo "HHHHHHHHHHHHHHHHHHHH $id";

}

if(isset($_POST['assessmentType'])){
    $id = $_POST['assessmentType'];
    echo '<option value="null"  selected disabled>-- Select Assessment --</option>';
    $sql = "SELECT * FROM `assessments_type`  WHERE `module_id` = '$id' ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
        echo '<option  value="'.$row["assessment_type_id"].'" required>['.$id.'-'.$row["assessment_name"].']</option>';
        // echo '<option value="'.$row["assessment_type_id"].'" required></option>';
        }
    }else{
        echo '<option value="null"   selected disabled>-- No Assessments --</option>';
    }

}


if(isset($_POST['academyYear'])){
    $id = $_POST['academyYear'];
    echo '<option value="null"  selected disabled>-- Select Academy Year --</option>';
    $sql = "SELECT * FROM `assessments`  WHERE `assessment_type_id` = '$id'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
        echo '<option  value="'.$row["assessment_type_id"].'" required>['.$id.'-'.$row["academic_year"].']</option>';
        // echo '<option value="'.$row["assessment_type_id"].'" required></option>';
        }
    }else{
        echo '<option value="null"   selected disabled>-- No Academy Year --</option>';
    }

}

if(isset($_POST['getmodule'])){
    $id = $_POST['getmodule'];
    echo '<option value="null"  selected disabled>-- Select Module --</option>';
    $sql = "SELECT * FROM `assessments_type`  WHERE `course_id` = '$id'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
        echo '<option  value="'.$row["module_id"].'" required>['.$id.'-'.$row["module_id"].']</option>';
        // echo '<option value="'.$row["assessment_type_id"].'" required></option>';
        }
    }else{
        echo '<option value="null"   selected disabled>-- No Module --</option>';
    }

}



?>