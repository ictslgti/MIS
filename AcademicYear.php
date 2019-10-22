<!-- BLOCK#1 START DON'T CHANGE THE ORDER -->
<?php 
$title = "Department Details | SLGTI" ;
include_once("config.php"); 
include_once("head.php"); 
include_once("menu.php");

 ?>
<!-- END DON'T CHANGE THE ORDER -->

<!-- BLOCK#2 START YOUR CODER HERE -->
<div class="shadow  p-3 mb-5 bg-white rounded">

        <div class="highlight-blue">
            <div class="container">
                <div class="intro">
                    <h1 class="display-4 text-center">SLGTI Academic Year</h1>
                    
                   
                </div>
            </div>
        </div>
    </div>
    <a href="AddAcademicYear" button type="button" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Add Academic Year </a>



<!-- <h1 class="col text-center">Department Details</h1> -->
<br><br>
<table class="table table-hover">
  <thead class="thead-dark">
 
    <tr >
      <th scope="col">Academic Year</th>
      <th scope="col">First Semi Start Date</th>
      <th scope="col">First Semi End Date</th>
      <th scope="col">Second Semi Start Date</th>
      <th scope="col">Second Semi End Date</th>
      <th scope="col">Academic Year Status</th>
      <th scope="col">Option</th>
      </tr>
      </thead>
      <tbody>
      <tr class="table-light">
      </tr>
      <?php

$sql = "SELECT * FROM `academic`";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)){
        echo'
        <tr>
        <td>' . $row ["academic_year"].'</td>
        <td>' . $row ["first_semi_start_date"].'</td>
        <td>' . $row ["first_semi_end_date"].'</td>
        <td>' . $row ["second_semi_start_date"].'</td>
        <td>' . $row ["second_semi_end_date"].'</td>
        <td>' . $row ["academic_year_status"].'</td>
        <td>
        <a href= "AddAcademicYear.php?edit='.$row["academic_year"].'"class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;Edit</i></a>
    <a href= "?delete='.$row["academic_year"].'"class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;Delete</i></a>
    
    
    
      
        </tr>';
    }
}else{
echo "0 results";
}


?>

  
</tbody>
  </form>
</table>
</div>
<?php

if(isset($_GET['delete'])){
    $academic_year = $_GET['delete'];
    $sql = "DELETE FROM `academic` WHERE `academic_year` = '$academic_year'";
    
    if (mysqli_query($con, $sql)){
        echo '<div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%">Delete Success</div>
      </div>';
    }else{
        echo "Error deleting record:" . mysqli_error($con);
    }
}

?>
<!-- END YOUR CODER HERE -->

    <!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
    <?php 
    include_once("footer.php");
    ?>
    <!-- END DON'T CHANGE THE ORDER -->
