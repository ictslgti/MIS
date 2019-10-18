<?php
header('Content-Type: application/json');
require_once('../config.php');
$sql = "SELECT COUNT(`student_id`) AS `d_count` FROM `student`";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
    $row['d_count'];
    $total_students = $row['d_count'];
}

$sql = "SELECT DISTINCT `course_id` FROM `student_enroll` ";
$result = mysqli_query($con, $sql);
$data = array();
$i=0;
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        $cid = $row['course_id'];
        $sql_c = "SELECT COUNT(`student_id`) AS `c_count`,`course_id` 
        FROM `student_enroll` 
        WHERE `course_id` = '$cid'";
        $result_c = mysqli_query($con, $sql_c);
        foreach ($result_c as $row) {
            $data[] = $row;
        }
        
        
    }


        

}

mysqli_close($con);
echo json_encode($data);
?>