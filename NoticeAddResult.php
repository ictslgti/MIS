<!--  bLOCK#1 start don't change the order-->
<?php 
$title =" Department Deatils| SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!-- end don't change the order-->

<?php
//for add
if(isset($_POST['Add'])){
  if( !empty($_POST['result_id']) && !empty($_POST['department_id']) && !empty($_POST['academic_year']) )
  {
     $result_id= $_POST['result_id'];
     $Department = $_POST['Department'];
     $AcademicYear = $_POST['AcademicYear'];
     $Course = $_POST['Course'];
     $Module = $_POST['Module'];
     $sql = "INSERT INTO `notice_result`(`result_id`, `department_id`, `academic_year`,`course_id`,`module_id`)
     
      VALUES ('$result_id','$Department',`$AcademicYear`,'$Course',`$Module`,)";  
     if(mysqli_query($con,$sql))
     {
         echo "Record has been Inserted succesfully";
     }
     else {
    echo "Error in insert" . mysqli_error($con);
     }
   }
}



//for edit
if(isset($_POST['Edit']))
{  
   if(!empty($_POST['code'])&& !empty($_POST['name'])&& !empty($_GET['edit']))
   {   
      $result_id= $_POST['result_id'];
      $Department = $_POST['Department'];
      $AcademicYear = $_POST['AcademicYear'];
      $Course = $_POST['Course'];
      $Module = $_POST['Module'];

      $sql = "UPDATE `department` SET `department_code`='$code' , `department_name`= '$name'WHERE `department`.`department_id`= $id";
      if(mysqli_query($con,$sql))
      {
           echo"Record has been updated succesfully";
      }
      else{
     echo "Error in update" . mysqli_error($con);
     }
   }
}

?>


<?php


$Department=$Course=$Module=$AcademicYear=$Type=null;



  if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $sql="SELECT * FROM `notice_result` WHERE `result_id`='$id'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)==1){
            $row=mysqli_fetch_assoc($result);
     $Department_id=$_POST['Department'];
     $cours=$_POST['AcademicYear'];
     $Module=$_POST['Course'];
     $AcademicYear=$_POST['Modules'];
    
        }
        else{
          echo "Error".$sql."<br>".mysqli_error($con);
        }
    }
  
?>






<!-- bLOCK#2 start your code here & u can change -->




<br><br>
<div class="alert bg-dark text-white" role="alert">
  <h1>Add New Result</h1>
</div>
<hr>

<form method="POST" action="#">
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Department</label>
    <div class="col-sm-10">
	<select id="inputState" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['Department_id'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Department_id'])){echo ' is-valid';} ?>"  id="Department_id" name="Department_id">
 
  <option selected disabled required>Department</option>
  <?php          
            $sql = "SELECT * FROM `department`";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                echo '<option  value="'.$row["department_id"].'" required';
                if($row["department_id"]==$Department) echo ' selected';
                echo '>'.$row["department_name"].'</option>';
                }
            }
            ?>
    </select>
  </div>
   </div>


  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Academic Year</label>
    <div class="col-sm-10">
    <select id="inputState" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['academic_year'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['academic_year'])){echo ' is-valid';} ?>"  id="academic_year" name="academic_year">
      <option selected disabled required >Select the Academic Year...</option>
      <?php          
            $sql = "SELECT * FROM `academic`";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                echo '<option  value="'.$row["academic_year"].'" required';
                if($row["academic_year"]==$AcademicYear) echo ' selected';
                echo '>'.$row["academic_year"].'</option>';
                }
            }
            ?>
    </select>
  </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Course</label>
    <div class="col-sm-10">
    <select id="inputState" class="form-control <?php  if(isset($_POST['Add']) && empty($_POST['course_id']))
    {echo ' is-invalid';
    }if(isset($_POST['Add']) && !empty($_POST['course_id'])){echo ' is-valid';} ?>" 
    
     id="course_id" name="course_id">


      <option selected disabled required  >Select Your Course...</option>

      <?php          
            $sql = "SELECT * FROM `course`";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                echo '<option  value="'.$row["course_id"].'" required';
                if($row["course_id"]==$Course) echo ' selected';
                echo '>'.$row["course_name"].'</option>';
                }
            }
            ?>

    </select>
  </div>
  </div>
 
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Modules</label>
    <div class="col-sm-10">
    <select id="inputState" class="form-control<?php  if(isset($_POST['Add'])
    && empty($_POST['module_id'])){echo ' is-invalid';
    }if(isset($_POST['Add']) && !empty($_POST['module_id'])){echo ' is-valid';} ?>" 
    
     id="module_id" name="module_id">
      <option selected disabled required >Select the Module...</option>

      <?php          
            $sql = "SELECT * FROM `module`";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                echo '<option  value="'.$row["module_id"].'" required';
                if($row["module_id"]==$Module) echo ' selected';
                echo '>'.$row["module_name"].'</option>';
                }
            }
            ?>
    </select>
  </div>
  </div>

 
  
<!--<div class="input-group mb-3">

    <label for="inputEmail3" class="col-sm-2 col-form-label">Upload  Your File and Link</label>
		<input class="form-control" type="file" name="file" required/></td>
  </div>

 <h1 class="text-right">
 <hr>
 <div class="row"> 

 <div class="col-12">
<button type="button" class="btn btn-primary btn-lg">Add</button>
<button type="button" class="btn btn-secondary btn-lg">Edit</button>
<button type="button" class="btn btn-secondary btn-lg">Delete</button>
<button type="button" class="btn btn-outline-primary btn-lg"><a href="AddNotice.php">Back</a></button>
</div>
</div>
<hr>
  
end your code here-->
 
 





<?php
       if(isset($_GET['edit'])) {
        echo'<input id="button" type="submit" name="Edit" value="Edit">';
       }
        else{
        echo'<input id="button" type="submit" name="Add" value="Add">';
       }  
       ?>
</form>

<!--bLOCK#3  start don't change the order-->
    <?php include_once("footer.php");?>
<!-- end don't change the order-->
   
