<?php
header('Content-Type: application/json');
include_once("../config.php");

$sql_s = "SELECT COUNT(`student_id`) AS `d_count` FROM `student_enroll`";
$sql = "SELECT DISTINCT `course_id` FROM `student_enroll` ";
if(!empty($_POST['AcademicYear']) && $_POST['AcademicYear']!='ALL'){
    
     $academic_year = $_POST['AcademicYear'];
     $sql_s.= " WHERE  academic_year='$academic_year'"; 
     $sql.= " WHERE  academic_year='$academic_year'"; 
}


$result = mysqli_query($con, $sql_s);
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
    $row['d_count'];
    $total_students = $row['d_count'];
}               
$data = array();

    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $i=0;
    while($row = mysqli_fetch_assoc($result)){
        $cid = $row['course_id'];

    $sql_t = "SELECT COUNT(`student_id`) AS `t_count`,`course_id` FROM `student_enroll` WHERE `course_id` = '$cid' ";
    $sql_d = "SELECT COUNT(`student_id`) AS `d_count` FROM `student_enroll` WHERE `course_id` = '$cid' AND `student_enroll_status` = 'Dropout' ";
    $sql_c = "SELECT COUNT(`student_id`) AS `c_count` FROM `student_enroll` WHERE `course_id` = '$cid' AND `student_enroll_status` = 'Completed' ";

    if(!empty($_POST['AcademicYear']) && $_POST['AcademicYear']!='ALL'){
        $academic_year = $_POST['AcademicYear'];
        $sql_t.= " AND  academic_year='$academic_year'"; 
        $sql_d.= " AND  academic_year='$academic_year'"; 
        $sql_c.= " AND  academic_year='$academic_year'"; 
    }

    //total
    $result_t = mysqli_query($con, $sql_t);
    $row_t = mysqli_fetch_assoc($result_t);
    $courset_count =  $row_t['t_count'];
    $studentt_percentage = 0;
    $studentt_percentage = round ( ($courset_count/$total_students)*100); 

    //droupout
    $result_d = mysqli_query($con, $sql_d); 
    $row_d = mysqli_fetch_assoc($result_d);
    $coursed_count =  $row_d['d_count'];
    $studentd_percentage = 0;
    $studentd_percentage = round ( ($coursed_count/$total_students)*100); 

    //complted
    $result_c = mysqli_query($con, $sql_c); 
    $row_c = mysqli_fetch_assoc($result_c);
    $coursec_count =  $row_c['c_count'];
    $studentc_percentage = 0;
    $studentc_percentage = round ( ($coursec_count/$total_students)*100); 

    $data[$i]['course_id'] =  $cid;
    $data[$i]['t_count'] =  (int)  $courset_count;
    $data[$i]['t_count_p'] =  $studentt_percentage;

    $data[$i]['d_count'] =  (int)  $coursed_count;
    $data[$i]['d_count_p'] =  $studentd_percentage;

    $data[$i]['c_count'] =  (int)  $coursec_count;
    $data[$i]['c_count_p'] =  $studentc_percentage;

    $i++;

    }
}
    echo json_encode($data);
?>