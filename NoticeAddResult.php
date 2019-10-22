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
$Department=$AcademicYear=$Course=$Module=$Type=null;

if(isset($_POST['Add'])){
  echo "ok";

  if(!empty($_POST['department_id'])
  &&!empty($_POST['academic_year'])
  &&!empty($_POST['course_id'])
  &&!empty($_POST['module_id']))


  { 
     echo "ok2";
     echo $department_id   =  $_POST['department_id'];
     echo $academic_year  =   $_POST['academic_year'];
     echo $course_id   =  $_POST['course_id'];
     echo $module_id  =   $_POST['module_id'];
   
  
     echo $sql = "INSERT INTO `notice_result` (`department_id`, `academic_year`,`course_id`, `module_id`)
      VALUES (`$department_id`,`$academic_year`,`$course_id`,`$module_id`)";
   
      if (mysqli_query($con, $sql)) {
        echo "record add";
    

      } else {
         echo "Error: " . $sql .
        "<br>" . 	mysqli_error($con);
      
        

      }
  }
}


  ?>






<!-- bLOCK#2 start your code here & u can change -->

<br>
<hr>
<div class="alert bg-dark text-white text-center" role="alert"><h1>Notice Add Result</h1>
</div>
<hr>


  <form method="POST" action="#">

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Department</label>
    <div class="col-sm-10">
  <select id="inputState" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['department_id'])){echo ' is-invalid';}
  if(isset($_POST['Add']) && !empty($_POST['department_id'])){echo ' is-valid';} ?>"  id="department_id" name="department_id">
 
  <option selected disabled required>Department</option>
  <?php          
            
            $sql="SELECT * from department";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0)
            while($row = mysqli_fetch_assoc($result)) 
            {
            echo '<option value="'.$row['department_id'].'"';
            if ($row["department_id"]==$Department )
            {
              echo 'selected'; 
            }
            echo '>'.$row['department_name'].'</option>';
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
 
 




<?PHP 
  echo '<div class="btn-group-horizontal">';

    if(isset($_GET['edit']))
    {
      echo '<button type="submit"  class="btn btn-primary mr-2"><i class="fas fa-user-edit"></i>UPDATE</button>'; 
      echo'<button type="reset" value="Reset" class="btn btn-primary mr-2"><i class="fas fa-redo"></i>REFRESH</button>';

    }
    if(isset($_GET['delete']))
    {
      echo '<button type="submit"  class="btn btn-danger mr-2"><i class="fas fa-user-slash"></i>DELETE</button>';

    }
    if(!isset($_GET['delete']) && !isset($_GET['edit'])){
      echo '<button type="submit" value="Add" name="Add" class="btn btn-primary mr-2"><i class="fas fa-user-plus"></i>   ADD</button>';

    }
      
      echo '</div>';
      ?>

          <a href="NoticeResultTable.php">View</a></button>
    
</form>

<!--bLOCK#3  start don't change the order-->
    <?php include_once("footer.php");?>
<!-- end don't change the order-->
   
