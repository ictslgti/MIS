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



?>