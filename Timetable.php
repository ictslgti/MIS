<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->
<?php
                    if(isset($_GET['delete_id']))
                    {                
                        $c_id = $_GET['delete_id'];

                        $sql = "DELETE from timetable where time_id = '$c_id' ";

                        if(mysqli_query($con,$sql))
                        {
                          echo '
                      
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>  ';
                        }
                        else
                        {
                          echo '
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong> Error </strong> Cannot delete or update a parent row (foreign key constraint fails)
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>  ';               
                         
                        }
                    }
                    ?>

<!-- STAFF info design  -->
<div class="pt-2 bg-white ">
    <h1 class="display-4 text-center">Time Table</h1>
   


<table class="table table-bordered" scope="col" height="150">
  <thead>
    <tr>
      <th scope="col" width="5%">timep</th>
      <th scope="col" width="5%">Monday</th>
      <th scope="col" width="5%">Tuesday</th>
      <th scope="col" width="5%">Wednesday</th>
      <th scope="col" width="5%">Thursday</th>
      <th scope="col" width="5%">Friday</th>
      <th scope="col" width="5%">Saturday </th>
      <th scope="col" width="5%">Sunday</th>
     
                  </thead>
    </tr>


    
       <tr style="text-align:left"scope="col" height="150";>
  

       <td></td>
          <td> <?php
 
 $sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Monday' AND  timep='P1'";
 
 $result = mysqli_query ($con, $sql);
 if (mysqli_num_rows($result)>0)
 {

   while($row = mysqli_fetch_assoc($result))
   {
     echo $row['module_id'].'-'.$row['staff_id'].'-'.$row['department_id'].'-'.$row['course_id'].'-'.$row['academic_year'].'-'.$row['classroom'].'<br>';
   }
 }
 else
 {
   echo "0 results";
 }
  
?>
</td>
          <td>
          <?php
 
 $sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Tuesday' AND  timep='P1'";
 
 $result = mysqli_query ($con, $sql);
 if (mysqli_num_rows($result)>0)
 {

   while($row = mysqli_fetch_assoc($result))
   {
     echo $row['module_id'].'-'.$row['staff_id'].'-'.$row['department_id'].'-'.$row['course_id'].'-'.$row['academic_year'].'-'.$row['classroom'].'<br>';
   }
 }
 else
 {
   echo "0 results";
 }
  
?>
          </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td> </td>
           
 

 
  
 </table>
 <td>
         
         <a href="?Student_Id='.$row["time_id"].'"> View More
         <a href="AddTimetable.php ?edit='.$row["time_id"].' " class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
         <button class="btn btn-sm btn-danger" data-href="?delete_id='.$row["time_id"].'" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i> </button>      
         </td>
        
<!--END OF YOUR COD-->
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->


