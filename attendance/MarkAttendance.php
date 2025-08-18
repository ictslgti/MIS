<!--Block#1 start dont change the order-->
<?php 
$title="attendance | SLGTI";    
include_once ("../config.php");
include_once ("../head.php");
include_once ("../menu.php");
include_once ("../attendancenav.php");
?>
<!-- end dont change the order-->


<!-- Block#2 start your code -->

<div class="container" style="margin-top:30px">

<div class="card">
<div class="card-header">
<div class="row">
<div class="col-md-9">Mark Student Attendance</div>
<div class="col-md-3" >
 
</div>
</div>
</div>





<div class="row">
<div class="col-sm-12" >
<?php
$student_id =  $student_fullname = null ;
// Validate required GET params to avoid undefined index errors
$mid = isset($_GET['mid']) ? $_GET['mid'] : null;
$cid = isset($_GET['cid']) ? $_GET['cid'] : null;
$ay = isset($_GET['ay']) ? $_GET['ay'] : null;
$staff_id = isset($_GET['staff']) ? $_GET['staff'] : null;

if ($mid === null || $cid === null || $ay === null || $staff_id === null) {
  echo '<div class="alert alert-danger">Missing required parameters. Please navigate via the proper attendance flow.</div>';
  // Stop rendering the rest of the page if params are missing
  include_once ("../footer.php");
  exit;
}

   $sql = "SELECT `student_enroll`.`student_id`,`student_enroll`.`course_id`,`student`.`student_fullname`
   FROM `student_enroll` 
   LEFT JOIN `student` ON `student`.`student_id` = `student_enroll`.`student_id` 
   WHERE `student_enroll`.`course_id` = '$cid' AND `student_enroll`.`academic_year` ='$ay'     
   ORDER BY `student_enroll`.`student_id`  DESC  ";


if(isset($_POST['Add'])){

  $date = isset($_POST['date']) ? $_POST['date'] : date('Y-m-d');
  $sql_y = '';
  $result_y = mysqli_query ($con, $sql);
  if (mysqli_num_rows($result_y)>0)
  {
    while($row_y = mysqli_fetch_assoc($result_y))
    { 
    $student_id =    $stid=$row_y["student_id"];
    $post_stid = 'ATT'.$stid;

    // Default to Absent if not set
    $AttendanceStatus = isset($_POST[$post_stid]) ? $_POST[$post_stid] : 'Absent';

    $sql_y .= "INSERT INTO `attendance` (`student_id`, `module_name`, `staff_name`, `attendance_status`, `date`) VALUES ('".mysqli_real_escape_string($con,$student_id)."', '".mysqli_real_escape_string($con,$mid)."', '".mysqli_real_escape_string($con,$staff_id)."', '".mysqli_real_escape_string($con,$AttendanceStatus)."', '".mysqli_real_escape_string($con,$date)."');";
    }
  }

  if(mysqli_multi_query($con,$sql_y))
  {
    echo '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>'.$mid.'</strong> Staff details inserted
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>    
    ';
  }
  else{
    
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error:</strong> '.htmlspecialchars(mysqli_error($con)).'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    
    ';
  }

}
?>

</div>
</div>


<div class="row">
<div class="col-sm-9 " ></div>
<div class="col-sm-3 " > 
</div>
</div>

<div class="card-body">
<div class="table-responsive">
<form method="POST" >


<input type="date" name="date" >
<table class="table table-striped table-bordered" id="student_table">
<thead>
<tr>
<th scope="col" width="8%" name="student_id">RollNumber</th>

<th scope="col" width="8%" name="student_fullname">Student Name </th>

<th scope="col" width="8%" name="Present">Present</th>



 <th scope="col" width="8%" name="Absent">Absent </th>
</tr>
</td>
</thead>
<?php

   $result = mysqli_query ($con, $sql);

   if (mysqli_num_rows($result)>0)
   {
   
     $count=1;
     while($row = mysqli_fetch_assoc($result))
     { 
        $stid=$row["student_id"];
       
        $stname=$row["student_id"];
       
         
       echo '
       <tr style="text-align:left";>
       
         
          <td>'. $row["student_id"]."<br>".'</td>
          
          <td>'. $row["student_fullname"]."<br>".'</td>
          <td align="center"> 
            <input type="radio"  name= "ATT' . $row["student_id"]. '"  value="Present">     
         </td>
        <td align="center">
        <input type="radio"  name="ATT' .$row["student_id"] . '"  value="Absent">
        </td>
        </tr>     
                
         ';
         $count=$count+1;
     }
   }
  ?>
  
<tbody>
</tbody>
</table>

<nav aria-label="Page navigation example">
<ul class="pagination justify-content-end">
<li class="page-item ">
<a class="page-link" href="#" tabindex="-1">Previous</a>
</li>
<li class="page-item"><a class="page-link" href="#">1</a></li>
<li class="page-item"><a class="page-link" href="#">2</a></li>
<li class="page-item"><a class="page-link" href="#">3</a></li>
<li class="page-item">
<a class="page-link" href="#">Next</a>



<?PHP 
echo '<div class="btn-group-horizontal">';
  if(isset($_GET['edit']))
  {
    echo '<button type="submit"  class="btn btn-primary mr-2"><i class="fas fa-user-edit"></i>UPDATE</button>'; 
    echo'<button type="reset" value="Reset" class="btn btn-primary mr-2"><i class="fas fa-redo"></i>REFRESH</button>';
  }
  if(isset($_GET['delete']))
  {
    echo '<button type="submit"  class="btn btn-danger mr-2"><i class="fas fa-user-slash"></i>DELETE</button>';
  }
  if(!isset($_GET['delete']) && !isset($_GET['edit'])){
    echo '<button type="submit" value="Add" name="Add" class="btn btn-primary mr-2"><i class="fas fa-user-plus"></i>   ADD</button>';
  }
    
    echo '</div>';
    ?>
  





</li>
</ul>
</nav>

</form>
</div>
</div>
</div>
</div>




<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("../footer.php"); ?>  
<!--  end dont change the order-->