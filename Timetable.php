


<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>


<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="table-responsive">
            <table class="table table-sm ">
                <thead>
                    <tr>
                    <th scope="col" class="p-3" style="width: 6%;">Timep</th>
                        <th scope="col" class="p-3" style="width: 6%;">Monday</th>
                        <th scope="col" class="p-3" style="width: 6%;"> Tuesday</th>
                        <th scope="col" class="p-3" style="width: 6%;">Wednesday</th>
                        <th scope="col" class="p-3" style="width: 6%;">Thursday</th>
                        <th scope="col" class="p-3" style="width: 6%;">Friday</th>
                        
                    </tr>
                </thead>
                <tbody>

              
    <tr>
    
               <td scope="row">
               <?php
 
 $sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE  timep='P1'";
 
 $result = mysqli_query ($con, $sql);
 if (mysqli_num_rows($result)>0)
 {

   while($row = mysqli_fetch_assoc($result))
   {
     echo $row['timep'].'<br>';
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


<td>
<?php
 
 $sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Wednesday' AND  timep='P1'";
 
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
 
 $sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Thursday' AND  timep='P1'";
 
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
 
 $sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Friday' AND  timep='P1'";
 
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

                </tr>


                <!-- 2end period-->
                <tr>
    
    <td scope="row">
    <?php

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE  timep='P2'";

$result = mysqli_query ($con, $sql);
if (mysqli_num_rows($result)>0)
{

while($row = mysqli_fetch_assoc($result))
{
echo $row['timep'].'<br>';
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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Monday' AND  timep='P2'";

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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Tuesday' AND  timep='P2'";

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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Wednesday' AND  timep='P2'";

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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Thursday' AND  timep='P2'";

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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Friday' AND  timep='P2'";

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

             <tr>
    
    <td scope="row">
    <?php

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE  timep='P2'";

$result = mysqli_query ($con, $sql);
if (mysqli_num_rows($result)>0)
{

while($row = mysqli_fetch_assoc($result))
{
echo $row['timep'].'<br>';
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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Monday' AND  timep='P2'";

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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Tuesday' AND  timep='P2'";

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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Wednesday' AND  timep='P2'";

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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Thursday' AND  timep='P2'";

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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Friday' AND  timep='P2'";

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



<!--gndjkfgjdfhgj-->
<tr>
    
    <td scope="row">
    <?php

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE  timep='P3'";

$result = mysqli_query ($con, $sql);
if (mysqli_num_rows($result)>0)
{

while($row = mysqli_fetch_assoc($result))
{
echo $row['timep'].'<br>';
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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Monday' AND  timep='P3'";

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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Tuesday' AND  timep='P3'";

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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Wednesday' AND  timep='P3'";

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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Thursday' AND  timep='P3'";

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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Friday' AND  timep='P3'";

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


<!--4th period-->
<tr>
    
    <td scope="row">
    <?php

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE  timep='P4'";

$result = mysqli_query ($con, $sql);
if (mysqli_num_rows($result)>0)
{

while($row = mysqli_fetch_assoc($result))
{
echo $row['timep'].'<br>';
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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Monday' AND  timep='P4'";

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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Tuesday' AND  timep='P4'";

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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Wednesday' AND  timep='P4'";

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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Thursday' AND  timep='P4'";

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

$sql = "SELECT time_id,timep,department_id,course_id,module_id,academic_year,staff_id,weekdays,classroom FROM timetable WHERE weekdays='Friday' AND  timep='P4'";

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


        <?php include_once("footer.php"); ?>





