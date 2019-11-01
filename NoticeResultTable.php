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
<div class="alert bg-dark text-white text-center" role="alert"><h1>SriLanka German Training Institute<br>Notice Result Table.</h1>
</div>
<br>
<hr>
<br>

<table class="table table-bordered">
  <thead>
    <tr>
    <th >ID</th>
      <th > Department </th>
      <th > Course </th>
      <th > Module </th>
      <th > Academic Year</th>
      <th > Upload File</th>
      <th > Option</th>
     
    </tr>
  </thead>

  <?php 

//for edit



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
$sql = "SELECT result_id,department_id,course_id,module_id,academic_year,upload  FROM notice_result";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{ //output data of each row
    while($row = mysqli_fetch_assoc($result))
    {
        echo '
        <tr>
          <td>'. $row["result_id"] . "<br>" .'</td>
          <td>'. $row["department_id"]."<br>".'</td>
          <td>'. $row["course_id"]."<br>".'</td>
          <td>'. $row["module_id"]."<br>".'</td>
          <td>'. $row["academic_year"]."<br>".'</td>
          <td>'. $row["upload"]."<br>".'</td>
            <td>   
                    <a href="NoticeResultView.php?id='. $row["result_id"].'" class="btn btn-primary btn-sm btn-icon-split"> <span class="text"><i class="fas fa-eye"></i>&nbsp;&nbsp;View</span>  </a>  
                    <a href="NoticeAddResult.php?edit='.$row["result_id"].' " class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                    <button class="btn btn-sm btn-danger" data-href="?delete='.$row["result_id"].'" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i> </button>     
            </td>     
        </tr>';
    }
}
else {
        echo "0 results";
    }
?>
<a href="NoticeAddResult.php"> back</a>
</table>


<!--bLOCK#3  start don't change the order-->
    <?php include_once("footer.php");?>
<!-- end don't change the order-->
   
