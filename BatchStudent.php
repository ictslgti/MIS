<!-- BLOCK#1 START DON'T CHANGE THE ORDER -->
<?php 
$title = "Batch Student Details | SLGTI" ;
include_once("config.php"); 
include_once("head.php"); 
include_once("menu.php");
 ?>
<!-- END DON'T CHANGE THE ORDER -->

<!-- BLOCK#2 START YOUR CODER HERE -->
<div class="shadow p-3 mb-5  alert bg-dark rounded  text-white text-center" role="alert">

        <div class="highlight-blue">
            <div class="container">
                <div class="intro">
                    <h1 class="display-3 text-center">Student Details</h1>
                    <!-- <h3 class="display-5 text-center">Department Of Information & Communication Technology</h3> -->
                    <!-- <p class="text-center"></p> -->

                </div>
            </div>
        </div>
    </div>
<!-- <h1>Batch Details of ICT Department</h1> -->

<a href="AddStudent" button type="button" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Add New Student </a>
<!-- <button type="button" class="btn btn-success">+ Add New Batch</button> -->
<br><br>
<table class="table table-hover">
  <thead class="thead-dark">
 
    <tr >
    <th scope="col">Student_ID</th>
      <th scope="col">Student Name</th>
      <th scope="col">Enroll Date</th>
      <th scope="col">Status</th>
      <!-- <th scope="col">Profile</th> -->

     
      <!-- cid=5IT&ay=2017/2018 -->
    </tr>
  </thead>
  <tbody>
 
  <tr class="table-light">
  <?php

if(isset($_GET['BSt'])&& isset($_GET['AcY']))
{
  $C_id= $_GET['BSt'];
$academic_year= $_GET['AcY'];

$sql = "SELECT `student_enroll`.`student_enroll_date`,`student`.`student_fullname`,
`student`.`student_id`,`student_enroll`.`student_enroll_status`

FROM 
`student_enroll` 


LEFT JOIN  `student` ON
`student`.`student_id` = `student_enroll`.`student_id`

WHERE `student_enroll`.`course_id` = '$C_id' 
AND `student_enroll`.`academic_year` = '$academic_year'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)){
        echo'
        <tr>
        <td>' . $row ["student_id"].'</td>
         <td>' . $row ["student_fullname"].'</td>
        <td>' . $row ["student_enroll_date"].'</td>
        <td>' . $row ["student_enroll_status"].'</td>
      
       
        
        
    </td>
    
    
      
        </tr>';
    }
}else{
echo "0 results";
}

}
?>
     <!-- <td> -->
     <!-- <a href="Student.php?S_Id='.$row["student_id"].'" class="btn btn-sm btn-primary" role="button" aria-pressed="true"><i class="fas fa-file-alt">&nbsp;&nbsp;View</i></a> -->
      <!-- <td>2018/ICT/5IT/15</td>
      <td>N.Abdullah</td>
        <td>2018.10.15 </td> 
        <td><span class="badge badge-success">Active </span></td> -->
        <!-- <th><a href="" class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;View</i></a></th> -->
     
    </tr>
    
   



  </tbody>
  </form>
</table>
<br>
<a href="BatchDetails" class="btn btn-primary" role="button" aria-pressed="true">Back</a>



<!-- SELECT `student_enroll`.`student_enroll_date`,`student`.`student_fullname`,
`student`.`student_id`,`student_enroll`.`student_enroll_status`

FROM 
`student_enroll` 


LEFT JOIN  `student` ON
`student`.`student_id` = `student_enroll`.`student_id`

WHERE `student_enroll`.`course_id` = '5IT' 
AND `student_enroll`.`academic_year` = '2018/2019' -->

<!-- END YOUR CODER HERE -->

    <!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
    <?php 
    include_once("footer.php");
    ?>
    <!-- END DON'T CHANGE THE ORDER -->