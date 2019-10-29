<!--  bLOCK#1 start don't change the order-->
<?php 
$title =" Department Deatils| SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!-- end don't change the order-->



<!-- bLOCK#2 start your code here & u can change -->

<br>
<hr>
<div class="alert bg-dark text-white text-center" role="alert"><h1>Notice Add Result</h1>
</div>
<hr>




<?PHP
$department_id=$course_id=$module_id=$academic_year=$tid=null;

if(isset($_GET['edit']))

{
  $id = $_GET['edit'];
  $sql = "SELECT * FROM `notice_result` WHERE `result_id` = $id";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result)==1)
   {
      $row = mysqli_fetch_assoc($result);
      $result_id = $row['result_id'];
     $department_id = $row['department_id'];
    $course_id = $row['course_id'];
    $module_id = $row['module_id'];
      $academic_year= $row['academic_year'];
    
  }

}

// Add coding



if(isset($_POST['Add'])){
  echo "ok";

  if(!empty($_POST['department_id'])
  &&!empty($_POST['course_id'])
  &&!empty($_POST['module_id'])
  &&!empty($_POST['academic_year'])
  &&!empty($_POST['upload']))

  $upload = $upload["ima"];
  $upload = basename($upload["ima"]["upload"]);
  $test_dir = 'docs/events';
  move_uploaded_file($upload, $upload.'/'.$upload);
 
 
  { 
     echo "ok2";
     echo $department_id   =  $_POST['department_id'];
     echo $course_id   =  $_POST['course_id'];
     echo $module_id  =   $_POST['module_id'];
     echo $academic_year  =   $_POST['academic_year'];
     echo $upload  =   $_POST['upload'];
     
  
     echo $sql = "INSERT INTO `notice_result` (`department_id`, `course_id`, `module_id`, `academic_year`,`upload`)
      VALUES ('$department_id','$course_id','$module_id','$academic_year',`$upload`)";
   
      if (mysqli_query($con, $sql)) {
        echo "record add";
    

      } else {
         echo "Error: " . $sql .
        "<br>" . 	mysqli_error($con);
      
        

      }
  }
}


  ?>


<!-- Add timetable design  -->

<form method="POST" action="#">

  
<div class="form-group row">
  <label for="inputEmail3" class="col-sm-2 col-form-label">&nbsp;&nbsp;&nbsp;Department</label>
  <div class="col-sm-10"> 
  <select id="inputState" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['department_id']))
  {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['department_id'])){echo ' is-valid';} ?>" id="department_id" name="department_id">


      <option selected disabled>Department</option>
      <?php          
          
          $sql="SELECT * from department";
          $result = mysqli_query($con,$sql);
          if(mysqli_num_rows($result)>0)
          while($row = mysqli_fetch_assoc($result)) 
          {
          echo '<option value="'.$row['department_id'].'"';
          if ($row["department_id"]==$department_id )
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
  <label for="inputPassword3" class="col-sm-2 col-form-label">&nbsp;&nbsp;&nbsp;Course</label>
  <div class="col-sm-10">
<select id="inputState" class="form-control <?php  if(isset($_POST['Add']) && empty($_POST['course_id']))
  {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['course_id'])){echo ' is-valid';} ?>"  id="course_id" name="course_id">
      <option selected disabled required>Course</option>
      <?php          
          $sql = "SELECT * FROM `course`";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
              echo '<option  value="'.$row["course_id"].'" required';
              if($row["course_id"]==$course_id) echo ' selected';
              echo '>'.$row["course_name"].'</option>';
              }
          }
          ?>

    </select>
  </div>
</div>                       


<div class="form-group row">
  <label for="inputEmail3" class="col-sm-2 col-form-label">&nbsp;&nbsp;&nbsp;Module</label>
  <div class="col-sm-10"> 
  <select id="inputState" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['module_id']))
  {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['module_id'])){echo ' is-valid';} ?>"  id="module_id" name="module_id">
      <option selected disabled required >Module</option>
      <?php          
          $sql = "SELECT * FROM `module`";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
              echo '<option  value="'.$row["module_id"].'" required';
              if($row["module_id"]==$module_id) echo ' selected';
              echo '>'.$row["module_name"].'</option>';
              }
          }
          ?>
     

    </select>
  </div>
</div>



<div class="form-group row">
  <label for="inputEmail3" class="col-sm-2 col-form-label">&nbsp;&nbsp;&nbsp;AcademicYear</label>
  <div class="col-sm-10"> 
  <select id="inputState" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['academic_year']))
  {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['academic_year'])){echo ' is-valid';} ?>"  id="academic_year" name="academic_year">
      <option selected disabled required >AcademicYear</option>

      <?php          
          $sql = "SELECT * FROM `academic`";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
              echo '<option  value="'.$row["academic_year"].'" required';
              if($row["academic_year"]==$academic_year) echo ' selected';
              echo '>'.$row["academic_year"].'</option>';
              }
          }
          ?>

    </select>
  </div>
</div>


<div class="input-group mb-3">

<label for="inputEmail3" class="col-sm-2 col-form-label">Upload Your File</label>
<input class="form-control" type="file" value="<?php  if(isset($_POST['Add']) && empty($_POST['upload']))
  {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['upload'])){echo ' is-valid';} ?>"  id="upload" name="upload"></td>
</div>     
   

       <div class="col-12">

       <h1 class="text-right">

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
  
    <a href="NoticeResultTable.php" class="btn btn-sm btn-warning"><i class="far fa-edit"></i> View</a></button>












  </div>
</div>

</form>

        
<?php include_once("footer.php"); ?>