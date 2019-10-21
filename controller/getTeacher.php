<?php
include_once("../config.php");
if(isset($_POST['Department'])){
    $id = $_POST['Department'];
    $cid = $_POST['Course'];
   echo'     <tr>
        <th scope="row">1</th>
        <td>Depaertment#'.$id.'</td>
        <td>Course#'.$cid.'</td>
        <td>@mdo</td>
        </tr>
        <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        </tr>
        <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
        </tr> ';
}

if(isset($_POST['StaffModuleEnrollment'])){
     $tid = $_POST['staff_id'];
     $cid = $_POST['course_id'];
     $mid = $_POST['module_id'];
     $aid = $_POST['academic_year'];

    $sql = "SELECT `staff_module_enrollment`.`academic_year`,`module`.`module_name`,`staff`.`staff_name`,`staff`.`staff_status`,`academic`.`academic_year_status`,`staff_module_enrollment`.`staff_module_enrollment_id`,`staff_module_enrollment`.`course_id`,`staff_module_enrollment`.`staff_module_enrollment_date`
    FROM `staff_module_enrollment`
    LEFT JOIN `staff` ON `staff_module_enrollment`.`staff_id` = `staff`.`staff_id`
    LEFT JOIN `module` ON `staff_module_enrollment`.`module_id` = `module`.`module_id`
    LEFT JOIN `academic` ON `staff_module_enrollment`.`academic_year` = `academic`.`academic_year`";

    if($tid=='null'){
      if($cid=='null'){
        if($mid == 'null'){
          if($aid != 'null'){
            $sql .=" WHERE staff_module_enrollment.academic_year = '$aid' ";
          }
        }else{
          $sql .=" WHERE staff_module_enrollment.module_id = '$mid' ";
          if($aid != 'null')
              $sql .=" AND staff_module_enrollment.academic_year = '$aid' ";
        }
      }
      else{
        $sql .=" WHERE staff_module_enrollment.course_id = '$cid' ";
        if($mid !='null' )  $sql .=" AND staff_module_enrollment.module_id = '$mid' ";
        if($aid !='null' )  $sql .=" AND staff_module_enrollment.academic_year = '$aid' ";
      }
    }else{
      $sql .=" WHERE staff_module_enrollment.staff_id = '$tid' ";
      if($mid !='null' )  $sql .=" AND staff_module_enrollment.module_id = '$mid' ";
      if($aid !='null' )  $sql .=" AND staff_module_enrollment.academic_year = '$aid' ";
      if($cid !='null' )  $sql .=" AND staff_module_enrollment.course_id = '$cid' ";
    }
    $result = mysqli_query($con, $sql) or die();
    if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      echo '
      <tr>
      <td> '.$row['staff_module_enrollment_id'].'</td>
      <td>'.$row["staff_name"].'<span class="badge ';
      if($row["staff_status"]=='Working'){
        echo ' badge-success';
      }else{
        echo ' badge-danger';
      } 
      echo '">'.$row["staff_status"].' </span></td>

      <td>'.$row['course_id'].'</td>
      <td>'.$row['module_name'].'</td>
      <td>'.$row["academic_year"].' <span class="badge ';
      if($row["academic_year_status"]=='Active'){
        echo ' badge-success';
      }else{
        echo ' badge-danger';
      }
      
      echo '"> '.$row["academic_year_status"].' </span></td>
      <td> 
          <a href="?edit='.$row['staff_module_enrollment_id'].'" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
          <a class="btn btn-sm btn-danger" data-href="?delete_id='.$row["staff_module_enrollment_id"].'" data-toggle="modal" data-target="#confirm-delete"><i class="far fa-trash-alt"></i></a>
      </td>        
    </tr>
      ';
    }
    }else{
      echo '<tr>0 result</tr>';
    }
}

if(isset($_POST['Staff'])){
   $did = $_POST['department_id'];
   $spid = $_POST['staff_position_type_id'];
  $sql="
  SELECT 
  `staff`.`staff_id`,
  `staff`.`staff_name`,    
  `staff`.`staff_pno`, 
  `staff`.`staff_epf`,
  `staff`.`staff_position`,
  `staff`.`staff_type`,
  `staff`.`staff_status`,
  `department`.`department_name`, 
  `staff_position_type`.`staff_position_type_name` 
  FROM `staff` 
  LEFT JOIN 
      `department` 
          ON `staff`.`department_id` = `department`.`department_id` 
  LEFT JOIN 
      `staff_position_type`
          ON `staff`.`staff_position` = `staff_position_type`.`staff_position_type_id`";
  if($did!='null' && $spid == 'null'){
    $sql .="  WHERE `staff`.`department_id` = '$did'";
  }
  if($did=='null' && $spid != 'null'){
     $sql.="  WHERE `staff`.`staff_position` = '$spid'";
  }
  if($did!='null' && $spid != 'null'){
      $sql.="  WHERE `staff`.`department_id` = '$did' AND `staff`.`staff_position` = '$spid'";
  }
  $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result)>0)
  {
      while($row=mysqli_fetch_assoc($result))
      {
      echo '   
      <tr>
          <td>'.$row["staff_name"].'<span class="badge ';
          if($row["staff_status"]=='Working'){
            echo ' badge-success';
          }else{
            echo ' badge-danger';
          }
          
          echo '"> '.$row["staff_status"].' </span></td>
          <td>'.$row["department_name"].'</td>
          <td>'.$row["staff_position_type_name"].'<span class="badge badge-primary">'.$row["staff_type"].' </span> </td>
          <td>'.$row["staff_pno"].'</td>
          <td> 
          <a href="AddStaff?edit='.$row["staff_id"].'" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
          <a  class="btn btn-sm btn-danger" data-href="?delete_id='.$row["staff_id"].'" data-toggle="modal" data-target="#confirm-delete"><i class="far fa-trash-alt"></i></a>
          </td>
      </tr>';
      }
  }
  else {
    echo '<tr>0 result</tr>';
  }
}


?>