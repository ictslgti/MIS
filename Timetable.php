<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<!-- STAFF info design  -->
<div class="pt-2 bg-white ">
    <h1 class="display-4 text-center">Time Table</h1>
   
</div>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" width="8%"> Department </th>
      <th scope="col" width="18%"> Course </th>
      <th scope="col" width="10%"> Module </th>
      <th scope="col" width="5%"> AcademicYear</th>
      <th scope="col" width="5%"> Lecture </th>
      <th scope="col" width="20%"> WeekDays </th>
      <th scope="col" width="5%"> ClassRoom </th>
      <th scope="col" width="8%"> StartDate</th>
      <th scope="col" width="8%"> EndDate</th>
    </tr>





   
<?php
   $sql = "SELECT department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable";
   $result = mysqli_query ($con, $sql);
   if (mysqli_num_rows($result)>0)
   {
     while($row = mysqli_fetch_assoc($result))
     {
       echo '
       <tr style="text-align:left";>
          <td>'. $row["department_id"]."<br>".'</td>
          <td>'. $row["course_id"]."<br>".'</td>
          <td>'. $row["module_id"]."<br>".'</td>
          <td>'. $row["academic_year"]."<br>".'</td>
          <td>'. $row["staff_id"]."<br>".'</td>
          <td>'. $row["weekdays"]."<br>".'</td>
          <td>'. $row["classroom"]."<br>".'</td>
           
        
          <td>
          <a href="AddTimetable.php? edit='.$row["department_id"].'"> Edit </a> |
          <a href="?Student_Id='.$row["department_id"].'"> View More
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


