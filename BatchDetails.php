<!-- BLOCK#1 START DON'T CHANGE THE ORDER -->
<?php 
$title = "Batch Details | SLGTI" ;
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
                    <h1 class="display-3 text-center">Batch Details</h1>
                    <h3 class="display-10 text-center"></h3>
                    <!-- <p class="text-center"></p> -->

                </div>
            </div>
        </div>
    </div>
<!-- <h1>Batch Details of ICT Department</h1> -->

<?php if(($_SESSION['user_type'] =='ADM')) { ?> <a href="AddNewBatch" button type="button" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Add New Batch </a><?php }?> 
<!-- <button type="button" class="btn btn-success">+ Add New Batch</button> -->
<br><br>
<table class="table table-hover">
  <thead class="thead-dark">
 
    <tr >
    <th scope="col">Batch_ID</th>
      <th scope="col">Course_ID</th>
      <th scope="col">Academic Year</th>
      <?php if(($_SESSION['user_type'] =='ADM')) { ?> <th scope="col">Options</th><?php }?> 

     
      
    </tr>
  </thead>
  <tbody>
 
  <tr class="table-light">
      
<!--    
      <td>5IT01</td>
<td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"><div class="btn-group mr-2" role="group" aria-label="First group">
<a href="module" class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;NVQ Level - 05</i></a> 
      <td>2018/2019 <span class="badge badge-success">Active </span> </td> 
      <td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group"> -->
  
    </tr>
    <?php
    
    if(isset($_GET['batch']))
    {
  
    $id =$_GET['batch'];
    $sql = "SELECT b.batch_id, b.course_id, b.academic_year from batch as b, course 
    as c,department as d where d.department_id=c.department_id and c.course_id=b.course_id 
    and d.department_id='$id'"; 
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)){
        echo'
        <tr>
        <td>' . $row ["batch_id"].'</td>
        <td>' . $row ["course_id"].'</td>
        <td>' .$row["academic_year"].'</td>
        <td>';?>
        <?php if(($_SESSION['user_type'] =='ADM')) { ?><?php echo'
    <a href="BatchStudent.php?BSt='.$row["course_id"].'&AcY='.$row["academic_year"].'" class="btn btn-sm btn-primary" role="button"  aria-pressed="true"><i class="fas fa-user-graduate">&nbsp;&nbsp;Students</i></a>
    <a href="AddNewBatch.php?edit='.$row["batch_id"].'" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
    <button class="btn btn-sm btn-danger" data-href="?delete='.$row["batch_id"].'" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i> </button>
    ';?><?php }?> 
    <?php echo'</tr>';
    }
}
else{
echo "0 results";
}
    }


?>
   
    <!-- <tr class="table-light">
      <td>5IT01</td>
      <td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"><div class="btn-group mr-2" role="group" aria-label="First group">
  <a href="module" class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;NVQ Level - 04</i></a> 
      <td>2018/2019 <span class="badge badge-success">Active </span></td> 
      <td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
  <a href="BatchStudent" class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;&nbsp;Students</i></a>
    </tr>
   

    <tr class="table-light">
      <td>5IT02</td>
      <td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"><div class="btn-group mr-2" role="group" aria-label="First group">
  <a href="module" class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;NVQ Level - 05</i></a>
      <td>2019/2020 <span class="badge badge-success">New </span></td> 
      <td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
  <a href="BatchStudent" class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;&nbsp;Students</i></a>
    </tr>

    <tr class="table-light">
      <td>5IT02</td>
      <td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"><div class="btn-group mr-2" role="group" aria-label="First group">
  <a href="module" class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;NVQ Level - 04</i></a>  
      <td>2019/2020 <span class="badge badge-success">New </span></td> 
      <td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
  <a href="BatchStudent" class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;&nbsp;Students</i></a>
    </tr> -->


  </tbody>
  </form>
</table>
<?php

if(isset($_GET['delete'])){
    $batch_id = $_GET['delete'];
    $sql = "DELETE FROM `batch` WHERE `batch_id` = '$batch_id'";
    
    if (mysqli_query($con, $sql)){
        echo '<a class = "text-danger"><div class="fa-1.5x"><i class="fas fa-trash fa-pulse "></i>&nbsp;&nbsp;Delete Success</div></a>';
    }else{
        echo "Error deleting record:" . mysqli_error($con);
    }
}

?>
<a href="Department" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
<br>
<!-- END YOUR CODER HERE -->

    <!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
    <?php 
    include_once("footer.php");
    ?>
    <!-- END DON'T CHANGE THE ORDER -->