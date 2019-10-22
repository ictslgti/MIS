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
   
</div>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" width="8%"> ID</th>
      <th scope="col" width="8%"> Department </th>
      <th scope="col" width="8%"> Course </th>
      <th scope="col" width="8%"> Module </th>
      <th scope="col" width="5%"> AcademicYear</th>
      <th scope="col" width="5%"> Lecture </th>
      <th scope="col" width="5%"> WeekDays </th>
      <th scope="col" width="5%"> Time </th>
      <th scope="col" width="5%"> ClassRoom </th>
    <th scope="col" width="8%"  ></th>
    </tr>





   
<?php
   $sql = "SELECT time_id,department_id,course_id,module_id,academic_year,staff_id,weekdays,time,classroom FROM timetable";
   
   $result = mysqli_query ($con, $sql);
   if (mysqli_num_rows($result)>0)
   {
     while($row = mysqli_fetch_assoc($result))
     {
       echo '
       <tr style="text-align:left";>
       <td>'. $row["time_id"]."<br>".'</td>
          <td>'. $row["department_id"]."<br>".'</td>
          <td>'. $row["course_id"]."<br>".'</td>
          <td>'. $row["module_id"]."<br>".'</td>
          <td>'. $row["academic_year"]."<br>".'</td>
          <td>'. $row["staff_id"]."<br>".'</td>
          <td>'. $row["weekdays"]."<br>".'</td>
          <td>'. $row["time"]."<br>".'</td>
          <td>'. $row["classroom"]."<br>".'</td>
           
        
          <td>
         
          <a href="?Student_Id='.$row["time_id"].'"> View More
          <a href="AddTimetable.php ?edit='.$row["time_id"].' " class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>

                                       
          <button class="btn btn-sm btn-danger" data-href="?delete_id='.$row["time_id"].'" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i> </button>      
          </td>
         
       </tr> ';
     }
   }
   else
   {
     echo "0 results";
   }
    
  ?>
 
 </table>
<!--END OF YOUR COD-->
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->


