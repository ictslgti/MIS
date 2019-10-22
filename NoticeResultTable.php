<!--  bLOCK#1 start don't change the order-->
<?php 
$title =" Department Deatils| SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!-- end don't change the order-->


<br>
<hr>
<div class="alert bg-dark text-white text-center" role="alert"><h1>Notice Result Table</h1>
</div>
<hr>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Result Id</th>
      <th>Department</th>
      <th>Acedamic Year</th>
      <th>Course</th>
      <th>Module</th>
      <th>Options</th>
    </tr>
  </thead>

  <?php 
// for delete
if(isset($_GET['delete']))
{
    $result_id = $_GET['delete'];
    // echo 'Your sql code is here'.$result_id;
    $sql = "Delete From `notice_result` where result_id = $result_id";
    if(mysqli_query($con,$sql)){
        echo"Record has been deleted succesfully";
    }
    else {
        echo "Error deleting" . mysqli_error($con);
    }
}
?>

<?php 
//for insert
$sql = "Select * from notice_result";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{ //output data of each row
    while($row = mysqli_fetch_assoc($result))
    {
        echo '
        <tr>
            <td>'. $row["result_id"] . "<br>" .'</td>
            <td>'. $row["department_id"] . "<br>" .'</td>
            <td>'. $row["academic_year"] .  "<br>" .'</td>
            <td>'. $row["course_id"] .  "<br>" .'</td>
            <td>'. $row["module_id"] .  "<br>" .'</td>
            <td>  <a href=" NoticeAddResult.php ?edit='.$row["result_id"].' "> Edit </a>      
                  <a href=" ?delete='.$row["result_id"].' "> Delete </a> 
            </td>     
        </tr>';
    }
}
else {
        echo "0 results";
    }
?>
</table>


<!--bLOCK#3  start don't change the order-->
    <?php include_once("footer.php");?>
<!-- end don't change the order-->
   
