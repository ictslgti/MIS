	
<!--Block#1 start dont change the order-->
<?php 
$title="Add Course details | SLGTI";    
include_once ("config.php");
include_once ("head.php");
include_once ("menu.php");
?>
<!-- end dont change the order-->


<!-- Block#2 start your code -->
<?php
  $cid = $cname = $c_i_training = $c_ojt = $dname = $nvq = null;

  if(isset($_GET['edits']))
  {
    $cid = $_GET['edits'];
    $sql = "SELECT * FROM course WHERE course_id = '$cid'";
    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result)==1)
    {
    $row = mysqli_fetch_assoc($result);
    $cname = $row['course_name'];
    $c_i_training = $row['course_institute_training'];
    $c_ojt = $row['course_ojt_duration'];
    $did = $row['department_id'];
    $nvq = $row['course_nvq_level'];
   }
  
  }

if(isset($_POST['Edit']))
{
  if(!empty($_POST['co_learning']) && !empty($_POST['co_name']) && !empty($_POST['co_ojt']) && !empty($_POST['edits']))
  {
  $cid =$_POST['edits'];
  $cname = $_POST['co_name'];
  $c_i_training = $_POST['co_training'];
  $c_ojt = $_POST['co_ojt'];
  $did = $_POST['department_id'];
  $nvq = $_POST['course_id'];

  $sql =  "UPDATE course SET course_name='$cname' ,
  course_nvq_level= '$nvq',
  department_id = '$did',
  course_ojt_duration = '$c_ojt',
  course_institute_training = '$c_i_training',
   WHERE `course`.`course_id`= $cid";
   if(mysqli_query($con,$sql))
   {
      
        echo"Record has been updated succesfully";
   }
   else
   {
    echo "Error in update" . mysqli_error($con);
   }
   }
}

?>

<hr class="mb-8 mt-4">
		<div class="card mt-12 ">
			<div class="card"><br>
				<h4 style="text-align:center">ADD Course Details</h4><br>
      </div>
    </div>
 <br>
 <br>
        <form method="POST">
            <div class="row">

              <div class="col-md-6 mb-3">
                <label for="Course ID">Course ID</label>
                <input type="text" class="form-control"  placeholder="" name="co_id" value="<?php echo $cid?>" required>
               <div class="invalid-feedback">
                  Valid Course ID is required.
               </div>
              </div>

              
              <div class="col-md-6 mb-3">
                <label for="Course Name">Course Name</label>
                <input type="text" class="form-control"  placeholder="" name="co_name" value="<?php echo $cname?>" required>
              <div class="invalid-feedback">
                  Valid Course Name is required.
              </div>
              </div>

            </div>

            <div class="row">

              <div class="col-md-6 mb-3"> 
                <label for="Duration-Institute Training">Duration-Institute Training</label>
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Months</span>
              </div>
                <input type="text" class="form-control"  placeholder="Month in Digits" name="co_training" value ="<?php echo $c_i_training?>" required>
              <div class="invalid-feedback" style="width: 50%;">
                Duration is required.
              </div>
              </div>
              </div>
              
              <div class="col-md-6 mb-3"> 
                <label for="Duration-OJT">Duration-OJT</label>
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Months</span>
              </div>
                <input type="text" class="form-control"  placeholder="Month in Digits" name="co_ojt" value="<?php echo $c_ojt?>"required>
              <div class="invalid-feedback" style="width: 50%;">
                  Duration is required.
              </div>
              </div>
              </div>
            
            </div>

            <div class="row">

              <div class="col-md-6 mb-3">
                <label for="Department">Department</label>
                <select class="custom-select d-block w-100" id="Department" name="department_id" required>
                    <option selected  disabled selected>Select Department Name...</option>
                    <?php
                     $sql = "SELECT * FROM department";
                     $result = mysqli_query($con, $sql);
                     if(mysqli_num_rows($result)>0)
                     {
                       while($row = mysqli_fetch_assoc($result))
                       {
                         echo '<option value ="'.$row['department_id'].'" ';

                         if($row['department_id']==$did)
                         {
                           echo 'selected';
                         }
                         echo '>' .$row['department_name'].'</option>';
                       }
                     }
                    ?>
                    
                </select>
              <div class="invalid-feedback">
                Please provide a Department.
              </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="Level">NVQ Level</label>
                <select class="custom-select d-block w-100" name="course_id" required>
                    <option selected  disabled selected>Choose NVQ Level</option>
                    <?php
                    $sql = "SELECT course_nvq_level FROM course ";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_num_rows($result)>0)
                    {
                      while($row = mysqli_fetch_assoc($result))
                      {
                      echo '<option value="'.$row['course_nvq_level'].'" ';
                      if($row['course_nvq_level']==$nvq)
                      {
                        echo 'selected';
                      }
                      echo '>'.$row['course_nvq_level']. '</option>';
                    }
                  }
                    ?>
                </select>
                </form >
              <div class="invalid-feedback">
                Please select a valid Level.
              </div>
              </div>
<br><br>
            </div>
<br>
      <?php
      if(isset($_GET['edits']))
      {
        echo '<input id ="button" class="btn btn-primary btn-lg btn-block" type="submit" name="Edit" value ="Continue To Edit Course Details">';
      }
      else
      {
        echo '<input id ="buttuon"  class="btn btn-primary btn-lg btn-block"type="submit" name="Add" value ="Continue To Add Course Details">';
      }
      ?>

<body>

</body>
<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("footer.php"); ?>  
<!--  end dont change the order-->
    
    
  
