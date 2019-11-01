<!-- BLOCK#1 START DON'T CHANGE THE ORDER -->
<?php 
$title = "Add Department | SLGTI" ;
include_once("config.php"); 
include_once("head.php"); 
include_once("menu.php");
 ?>
<!-- END DON'T CHANGE THE ORDER -->

<!-- BLOCK#2 START YOUR CODER HERE -->



<!-- <div class="shadow p-3 mb-5 bg-white rounded"> -->
<div class="shadow p-3 mb-5  alert bg-dark rounded  text-white text-center" role="alert">

<!-- </div> -->

        <div class="highlight-blue">
            <div class="container">
                <div class="intro">
                    <h1 class="display-3 text-center">Add New Department</h1>
                    

                </div>
            </div>
        </div>
    </div>



<table class="table table-hover">
  <thead class="thead-dark">
 
  
  </thead>
  <tbody>
 
  


  </tbody>
  </form>
</table>
<?php

$id= $name = null;
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $sql = "SELECT * FROM `department` WHERE `department_id`='$id'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)==1){
    $row = mysqli_fetch_assoc($result);
    $id = $row['department_id'];
    $name = $row['department_name']; 
}
}
if(isset($_POST['Add'])){
   if (!empty($_POST['id']) && !empty ($_POST['name'])){
       $id = $_POST['id'];
       $name = $_POST['name'];
       $sql = "INSERT INTO `department` (`department_id`,`department_name`) VALUE ('$id','$name')";
       if (mysqli_query($con, $sql)){
           echo '<a class = "text-success"><div class="fa-1.5x"><i class="fas fa-spinner fa-pulse "></i>Insert Success</div></a>';
       }else{
           echo "Error:" .$sql. "<br>". mysqli_error($con);
       }
   }
    // echo "Add";
}
if(isset($_POST['Edit'])){
    if (!empty($_POST['id']) && !empty ($_POST['name'])&& !empty($_GET['edit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $id = $_GET['edit'];
        $sql = " UPDATE `department` SET `department_id`='$id',`department_name`='$name' WHERE `department`.`department_id`= '$id'";
        if (mysqli_query($con, $sql)){
            echo '<a class = "text-success"><div class="fa-1.5x"><i class="fas fa-spinner fa-pulse "></i>Edit Success</div></a>';
        }else{
            echo "Error:" .$sql. "<br>". mysqli_error($con);
        }
    }
    // echo "EDIT";
}

?>
<br><br>
<div class = "mx-auto">
<form method = "POST">
<div class ="row">
<div class ="col-4"><label for="Duration-Institute Training">Department ID</label>
<input class="form-control" type = "text" name= "id" value ="<?php echo $id;?>" placeholder="Department ID" required><br></div>
<div class ="col-8"><label for="Duration-Institute Training">Department Name</label>
<input class="form-control" type = "text" name= "name" value ="<?php echo $name;?>" placeholder="Department Name" required><br></div>
</div>
</div>
<?php
if(isset($_GET['edit'])){
    echo '<input type = "submit" value="Edit" name="Edit"<a href="" class="btn btn-sm btn-success" role="button" aria-pressed="true"></a> '; 
    echo '<a href="Department" class="btn btn-sm btn-primary" role="button" aria-pressed="true">Back</a>';
}else{
    echo '<input type="submit" value = "Add" name="Add" <a href="" class="btn btn-sm btn-success" role="button" aria-pressed="true"></a> ';
    echo '<a href="Department" class="btn btn-sm btn-primary" role="button" aria-pressed="true">Back</a>';
}




?>
</form>


<!-- END YOUR CODER HERE -->

    <!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
    <?php 
    include_once("footer.php");
    ?>
    <!-- END DON'T CHANGE THE ORDER -->
