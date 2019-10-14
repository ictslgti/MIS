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

    $sql = "SELECT * FROM `staff_module_enrollment`";
    if($tid!='null' || $cid!='null' || $mid!='null' || $aid!='null'){
        $sql .=" WHERE ";
    }
    if($tid!='null'){$sql .=" staff_id = '$tid' ";}
    if($tid==null && $aid!='null'){$sql .=" academic_year = '$aid' ";}
    if($tid!=null && $aid!='null'){$sql .=" AND academic_year = '$aid' ";}

    
    if($tid!=null && $cid!='null'){ $sql .=" AND course_id = '$cid' ";}
    if($tid!=null && $cid!='null' && $mid!='null'){$sql .=" AND module_id = '$mid' ";}
    if($aid!='null'){}

    $result = mysqli_query($con, $sql) or die();
    if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      echo '
      <tr>
      <td> '.$row['staff_module_enrollment_id'].'</td>
      <td>'.$row['staff_id'].'</td>
      <td>'.$row['course_id'].'</td>
      <td>'.$row['module_id'].'</td>
      <td>'.$row['academic_year'].'</td>
      <td> 
          <a href="?edit=1" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
          <a href="?delete=1" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
      </td>        
    </tr>
      ';
    }
    }else{
      echo '<tr>0 result</tr>';
    }
}

?>