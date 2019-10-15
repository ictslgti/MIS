<!-- BLOCK#1 START DON'T CHANGE THE ORDER -->
<?php 
$title = "Department Details | SLGTI" ;
include_once("config.php"); 
include_once("head.php"); 
include_once("menu.php");
 ?>
<!-- END DON'T CHANGE THE ORDER -->

<!-- BLOCK#2 START YOUR CODER HERE -->



<div class="shadow p-3 mb-5 bg-white rounded">

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
           echo "New record created successfully";
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
            echo '<span class="badge badge-success">Edit Success</span>'; 
        }else{
            echo "Error:" .$sql. "<br>". mysqli_error($con);
        }
    }
    // echo "EDIT";
}

?>
<br><br>
<form method = "POST">
<input class="form-control" type = "text" name= "id" value ="<?php echo $id;?>" placeholder="Department ID" required><br>
<input class="form-control" type = "text" name= "name" value ="<?php echo $name;?>" placeholder="Department Name" required><br>
<?php
if(isset($_GET['edit'])){
    echo '<input type = "submit" value="Edit" name="Edit"<a href="" class="btn btn-success" role="button" aria-pressed="true"></a> '; 
    echo '<a href="Department" class="btn btn-primary" role="button" aria-pressed="true">Back</a>';
}else{
    echo '<input type="submit" value = "Add" name="Add" <a href="" class="btn btn-success" role="button" aria-pressed="true"></a> ';
    echo '<a href="Department" class="btn btn-primary" role="button" aria-pressed="true">Back</a>';
}




?>
</form>


<!-- END YOUR CODER HERE -->

    <!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
    <?php 
    include_once("footer.php");
    ?>
    <!-- END DON'T CHANGE THE ORDER -->
