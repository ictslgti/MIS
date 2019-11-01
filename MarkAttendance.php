<!--Block#1 start dont change the order-->
<?php 
$title="Home | SLGTI";    
include_once ("config.php");
include_once ("head.php");
include_once ("menu.php");
include_once ("attendancenav.php");
?>
<!-- end dont change the order-->
<?php
$stid=$stname=$attendance_status=$date=$tid=null;


if(isset($_POST['Add'])){
    
    if(!empty($_POST['student_id'])
    &&!empty($_POST['student_fullname'])){ 
      
       echo $stid   =  $_POST['student_id'];
       echo $stname   =  $_POST['student_fullname'];
    //    echo $attendance_status   =  $_POST['attendance_status'];
    //    echo $date  =   $_POST['date'];
   
       
      echo "ok2";
    
      $sql = "INSERT INTO `attendance` (`student_id`,`student_fullname`)
        VALUES ('$stid','$stname')";
     
        if (mysqli_query($con, $sql)) {
          echo "record add";
      
  
        } else {
           echo "Error: " . $sql .
          "<br>" . 	mysqli_error($con);
        
          
  
        }
    }
  }
  
  
    ?>

<!-- Block#2 start your code -->

<div class="container" style="margin-top:30px">
<div class="card">
<div class="card-header">
<div class="row">
<div class="col-md-9">Mark Student Attendance</div>
<div class="col-md-3" align="right">
 
</div>
</div>
</div>



<form method="POST" action="#" >

<div class="row">
<div class="col-sm-9 " ></div>
<div class="col-sm-3 " > 

<form method="POST" action="#" >
<input class="selectpicker" multiple data-live-search="true" type="date" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['date']))
    {echo ' is-invalid';}
    if(isset($_POST['Add']) && !empty($_POST['date'])){echo ' is-valid';} ?>"  id="date" name="date">



</div>
</div>

<div class="card-body">
<div class="table-responsive">
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

 if(isset($_POST['Add']) && empty($_POST['student_id']))
{echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['student_fullname'])){echo ' is-valid';} 

   $sql = "SELECT	student_fullname,student_id,module_id FROM student,module group by student_fullname";
   $result = mysqli_query ($con, $sql);
   if (mysqli_num_rows($result)>0)
   {
   

     $count=1;
     while($row = mysqli_fetch_assoc($result))
     { 
        $stid=$row["student_id"];
        echo $stid;

        $stname=$row["student_fullname"];
        echo $stname;
         
       echo '
       <tr style="text-align:left";>
       
         
          <td>'. $row["student_id"]."<br>".'</td>
          
          <td>'. $row["student_fullname"]."<br>".'</td>
          <td align="center"> 
            <input type="radio"  name= "' . $row["student_id"]. '"  value="Present">     
         </td>
        <td align="center">
        <input type="radio"  name="' .$row["student_id"] . '"  value="Absent">
        </td>
        </tr>     
                
         ';
         $count=$count+1;
     }
   }
   else if ($AttendanceStatus == "Second")
   {
    echo("Second, eh?");
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
</div>
</div>
</div>
</div>

</form>


<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("footer.php"); ?>  
<!--  end dont change the order-->