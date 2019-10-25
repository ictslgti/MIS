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
                    <h1 class="display-4 text-center">SLGTI Department Details</h1>
                    
                    <p class="text-center">Welcome to department page. This section to view course & batch details.&nbsp;</p>

                </div>
            </div>
        </div>
    </div>
    <a href="AddDepartment" button type="button" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Add New Department </a>



<!-- <h1 class="col text-center">Department Details</h1> -->
<br><br>
<table class="table table-hover">
  <thead class="thead-dark">
 
    <tr >
      <th scope="col">Department_ID</th>
      <th scope="col">Department Name</th>
      <th scope="col">Option</th>
    </tr>
  </thead>
  <tbody>
 
  <tr class="table-light">
      
  
      <!-- <td>ICT/001</td> -->
      <!-- <td>Information & Communications Technology Department</td> -->
      <!-- <td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"> -->
  <!-- <div class="btn-group mr-2" role="group" aria-label="First group"> -->
  <!-- <button type="button" class="btn btn-outline-success"><i class="fas fa-eye">&nbsp;&nbsp;Course</i></button> -->
  <!-- <div class="input-group-text" ><i class="fas fa-eye"></i></div> -->
  <!-- <a href="Course"  class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;Course</i></a> -->
    <!-- <a href="BatchDetails" class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;Batch</i></a> -->
    <!-- </td> -->
     
  
  
      <!-- <td><button type="button" class="btn btn-light dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20"> -->
      
      <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset"> -->
       <!-- <a class="dropdown-item" href="#">Course</a> -->
      <!-- <a class="dropdown-item" href="#">Batches</a> -->
      
    <!-- </div> -->
    <!-- <button type="submit" formaction="academic.php" value="Add" name="Add"  class="btn btn-link">Add</button> </td>                            -->
    </tr>
    <?php

$sql = "SELECT department.department_id as department_id, 
department.department_name as department_name, 
course.course_id as course_id, 
course.course_name as course_name, 
course.course_nvq_level as course_nvq_level
from `department` 
left JOIN `course` 
ON department.department_id = course.course_id";

$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)){
        echo'
        <tr>
        <td>' . $row ["department_id"].'</td>
        <td>' . $row ["department_name"].'</td>
        <td>
        <a href="Course.php?id='.$row["department_id"].'" class="btn btn-sm btn-primary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;Course</i></a>
    <a href="BatchDetails" class="btn btn-sm btn-primary" role="button"  aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;Batch</i></a>
    <a href="AddDepartment.php?edit='.$row["department_id"].'" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
    <button class="btn btn-sm btn-danger" data-href="?delete='.$row["department_id"].'" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i> </button>
      
        </tr>';
    }
}else{
echo "0 results";
}


?>

    <!-- <tr class="table-light"> -->
     
     
      <!-- <td>MT/002</td>
      <td>Mechanical Technology Department</td> -->
      <!-- <td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"> -->
  <!-- <div class="btn-group mr-2" role="group" aria-label="First group"> -->
  <!-- <a href="Course"  class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;Course</i></a> -->
    <!-- <a href="BatchDetails"  class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;Batch</i></a> -->
    <!-- </td> -->
    
    <!-- <button type="button" class="btn btn-secondary">Courses</button> -->
    <!-- <div class="input-group-text" ><i class="fas fa-eye"></i></div> -->
    <!-- <button type="button" class="btn btn-secondary">Batches</button></td> -->
      

      <!-- <td><button type="button" class="btn btn-link">Add</button> </td>  -->
    <!-- </tr> -->
    <!-- <tr class="table-light"> -->
    
     
      <!-- <td>EET/003</td> -->
      <!-- <td>Electrical & Electronic Technology Department</td> -->
      <!-- <td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"> -->
  <!-- <div class="btn-group mr-2" role="group" aria-label="First group"> -->
  <!-- <a href="Course"  class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;Course</i></a> -->
    <!-- <a href="BatchDetails"  class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;Batch</i></a> -->
    <!-- </td> -->
    <!-- <button type="button" class="btn btn-secondary">Courses</button> -->
    <!-- <div class="input-group-text" ><i class="fas fa-eye"></i></div> -->
    <!-- <button type="button" class="btn btn-secondary">Batches</button></td> -->
      <!-- <td><button type="button" class="btn btn-link">Add</button> </td>  -->
    <!-- </tr> -->
    <!-- <tr class="table-light "> -->
     
     
      <!-- <td>FT/004</td> -->
      <!-- <td>Food Technology Department</td> -->
      <!-- <td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"> -->
  <!-- <div class="btn-group mr-2" role="group" aria-label="First group"> -->
  <!-- <a href="Course"  class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;Course</i></a> -->
    <!-- <a href="BatchDetails" class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;Batch</i></a> -->
    <!-- </td> -->
    <!-- <button type="button" class="btn btn-secondary">Courses</button> -->
    <!-- <div class="input-group-text" ><i class="fas fa-eye"></i></div> -->
    <!-- <button type="button" class="btn btn-secondary">Batches</button></td> -->
      <!-- <td><button type="button" class="btn btn-link">Add</button> </td>  -->
    <!-- </tr> -->
    <!-- <tr class="table-light"> -->
    
     
      <!-- <td>AAT/005</td> -->
      <!-- <td>Automotive & Agricultural Technology Department</td> -->
      <!-- <td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"> -->
  <!-- <div class="btn-group mr-2" role="group" aria-label="First group"> -->
  <!-- <a href="Course"  class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;Course</i></a> -->
    <!-- <a href="BatchDetails"  class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;Batch</i></a> -->
    <!-- </td> -->
    <!-- <button type="button" class="btn btn-secondary">Courses</button> -->
    <!-- <div class="input-group-text" ><i class="fas fa-eye"></i></div> -->
    <!-- <button type="button" class="btn btn-secondary">Batches</button></td> -->
      <!-- <td><button type="button" class="btn btn-link">Add</button> </td>  -->
    <!-- </tr> -->
    <!-- <tr class="table-light"> -->
     
     
      <!-- <td>CT/006</td> -->
      <!-- <td>  </td> -->
      <!-- <td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"> -->
  <!-- <div class="btn-group mr-2" role="group" aria-label="First group"> -->
  <!-- <a href="Course"  class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;Course</i></a> -->
    <!-- <a href="BatchDetails" class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;Batch</i></a> -->
    <!-- </td> -->
    <!-- <button type="button" class="btn btn-secondary">Courses</button> -->
    <!-- <div class="input-group-text" ><i class="fas fa-eye"></i></div> -->
    <!-- <button type="button" class="btn btn-secondary">Batches</button></td> -->
      <!-- <td><button type="button" class="btn btn-link">Add</button> </td>  -->
    <!-- </tr> -->
   
  </tbody>
  </form>
</table>
</div>

<?php

if(isset($_GET['delete'])){
    $department_id = $_GET['delete'];
    $sql = "DELETE FROM `department` WHERE `department_id` = '$department_id'";
    
    if (mysqli_query($con, $sql)){
        echo '<a class = "text-danger"><div class="fa-1.5x"><i class="fas fa-trash fa-pulse "></i>&nbsp;&nbsp;Delete Success</div></a>';
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
