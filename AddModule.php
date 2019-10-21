	
<!--Block#1 start dont change the order-->
<?php 
$title="Add Module details | SLGTI";    
include_once ("config.php");
include_once ("head.php");
include_once ("menu.php");
?>
<!-- end dont change the order-->


<!-- Block#2 start your code -->
<?php
 echo $_SESSION['user_name'];
  $mid = $m_name = $m_aim = $m_learning_h =  $m_resources = $m_l_outcomes =  $sid = $m_references= $m_r_unit= $m_lecture_h = $m_practical_h = $m_selfstudy_h = $cid= null;

  if(isset($_GET['edits']))
  {
    $mid = $_GET['edits'];
    $sql = "SELECT * FROM module WHERE module_id = '$mid'";
    $result = mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result)==1)
    {
    $row = mysqli_fetch_assoc($result);
    $m_name = $row['module_name'];
    $m_aim = $row['module_aim'];
    $m_learning_h = $row['module_learning_hours'];
    $m_resources = $row['module_resources'];
    $m_l_outcomes = $row['module_learning_outcomes'];
    $sid = $row['semester_id'];
    $m_references = $row['module_reference'];
    $m_r_unit = $row['module_relative_unit'];
    $m_lecture_h = $row['module_lecture_hours'];
    $m_practical_h = $row['module_practical_hours'];
    $m_selfstudy_h = $row['module_self_study_hours'];
    $cid = $row['course_id'];
    

    
   }
   
  }

if(isset($_POST['Editing']))
{
  if(!empty($_POST['mname'])
  && !empty($_POST['aim'])
  && !empty($_POST['learning'])
  && !empty($_POST['resources'])
  && !empty($_POST['outcomes'])
  &&!empty($_POST['semester'])
  &&!empty($_POST['references'])
  &&!empty($_POST['unit'])
  &&!empty($_POST['lecture'])
  &&!empty($_POST['practical'])
  &&!empty($_POST['selfstudy'])
  &&!empty($_POST['cname'])
  &&!empty($_GET['edits']))
  {
  
  $m_name = $_POST['mname'];
  $m_aim = $_POST['aim'];
  $m_learning_h = $_POST['learning'];
  $m_resources = $_POST['resources'];
  $m_l_outcomes = $_POST['outcomes'];
  $sid = $_POST['semester'];
  $m_references = $_POST['references'];
  $m_r_unit = $_POST['unit'];
  $m_lecture_h = $_POST['lecture'];
  $m_practical_h = $_POST['practical'];
  $m_selfstudy_h = $_POST['selfstudy'];
  $cid = $_POST['cname'];
  $cid = $_POST['cname'];
  $mid =$_GET['edits'];

  

   $sql="UPDATE `module` SET `module_name`='$m_name',`module_aim`= '$m_aim',`module_learning_hours`='$m_learning_h',`module_resources`='$m_resources',`module_learning_outcomes`='$m_l_outcomes',`semester_id`='$sid',`module_reference`='$m_references',`module_relative_unit`='$m_r_unit',`module_lecture_hours`='$m_lecture_h',`module_practical_hours`='$m_practical_h',`module_self_study_hours`='$m_selfstudy_h',`course_id`='$cid' WHERE `module_id`='$mid'";

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

if(isset($_POST['Adding']))
{
  
  
  if(!empty($_POST['mname'])
  && !empty($_POST['aim'])
  && !empty($_POST['learning'])
  && !empty($_POST['resources'])
  && !empty($_POST['outcomes'])
  &&!empty($_POST['semester'])
  &&!empty($_POST['references'])
  &&!empty($_POST['unit'])
  &&!empty($_POST['lecture'])
  &&!empty($_POST['practical'])
  &&!empty($_POST['selfstudy'])
  &&!empty($_POST['cname'])
  &&!empty($_POST['mid']))
  {
  $m_name = $_POST['mname'];
  $m_aim = $_POST['aim'];
  $m_learning_h = $_POST['learning'];
  $m_resources = $_POST['resources'];
  $m_l_outcomes = $_POST['outcomes'];
  $sid = $_POST['semester'];
  $m_references = $_POST['references'];
  $m_r_unit = $_POST['unit'];
  $m_lecture_h = $_POST['lecture'];
  $m_practical_h = $_POST['practical'];
  $m_selfstudy_h = $_POST['selfstudy'];
  $cid = $_POST['cname'];
  $mid =$_POST['mid'];

     $sql = "INSERT INTO `module`(`module_id`, `module_name`, `module_aim`, `module_learning_hours`, `module_resources`, `module_learning_outcomes`, `semester_id`, `module_reference`, `module_relative_unit`, `module_lecture_hours`, `module_practical_hours`, `module_self_study_hours`, `course_id`) ( '$mid' ,'$m_name','$m_aim','$m_learning_h', '$m_resources' ,'$m_l_outcomes', '$sid','$m_references','$m_r_unit','$m_lecture_h','$m_practical_h','$m_selfstudy_h','$cid'  )";
     
     if(mysqli_query($con,$sql))
     {
         echo "Record has been Inserted succesfully";
     }
     else
   {
    echo "Error in insert" . mysqli_error($con);
   }

  }

}

?>
<hr class="mb-8 mt-4">
  
		<div class="card mt-12 ">
			<div class="card"><br>
      <?php
       if(isset($_GET['edits']))
       {echo' <h4 style="text-align:center">Edit Module Details</h4> <br>';}
       else
       {echo' <h4 style="text-align:center">Add Module Details</h4> <br>';}
      ?>
      </div>
    </div>
<br>
<br>
            <div class="row">

              <div class="col-md-6 mb-3">
                <label for="ID">Module ID</label>
                <input type="text" class="form-control" id="ID" placeholder="" value="<?php echo $mid ?>" name="mid" required disabled>
              <div class="invalid-feedback">
                  Valid Module ID is required.
              </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="Name">Module Name</label>
                <input type="text" class="form-control" id="Name" placeholder="" value="<?php echo $m_name ?>" name="mname" required>
              <div class="invalid-feedback">
                Valid Module Name is required.
              </div>
              </div>

            </div>


            <div class="row">

              
              <div class="col-md-6 mb-3">
                <label for="Self">Learning Hours</label>
                <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Hrs</span>
                </div>
                  <input type="text" class="form-control" id="Self" placeholder="Hours in Digits" name="learning" value="<?php echo $m_learning_h ?>" required>
                <div class="invalid-feedback" style="width: 50%;">
                  Duration is required.
                </div>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                  <label for="Department">Course Name</label>
                  <select class="custom-select d-block w-100"  name="cname" required>
                    <option selected  disabled selected>Select Course Name...</option>
                    <?php
                     $sql = "SELECT * FROM course";
                     $result = mysqli_query($con, $sql);
                     if(mysqli_num_rows($result)>0)
                     {
                       while($row = mysqli_fetch_assoc($result))
                       {
                         echo '<option value ="'.$row['course_id'].'" ';

                         if($row['course_id']== $cid)
                         {
                           echo 'selected';
                         }
                         echo '>' .$row['course_name'].'</option>';
                       }
                     }
                    ?>
                    
                </select>
                  <div class="invalid-feedback">
                    Please provide a Department.
                  </div>
                </div>

            </div>

            

            <div class="row">

            <div class="col-md-3 mb-3"> 
                <label for="Notional">Notional Hours</label>
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Hrs</span>
              </div>
                <input type="text" class="form-control" id="Notional" placeholder="Hours in Digits"  name="notional"  required>
              <div class="invalid-feedback" style="width: 50%;">
                Duration is required.
              </div>
              </div>
              </div>

              <div class="col-md-3 mb-3"> 
                <label for="Lectures">Lecture Hours</label>
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Hrs</span>
              </div>
                <input type="text" class="form-control" id="Lectures" placeholder="Hours in Digits" name="lecture" value="<?php echo $m_lecture_h ?>" required>
              <div class="invalid-feedback" style="width: 50%;">
                Duration is required.
              </div>
              </div>
              </div>

              <div class="col-md-3 mb-3"> 
                <label for="Practical">Practical & Site Visits</label>
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Hrs</span>
              </div>
                <input type="text" class="form-control" id="Practical" placeholder="Hours in Digits" name="practical" value="<?php echo $m_practical_h ?>" required>
              <div class="invalid-feedback" style="width: 50%;">
                Duration is required.
              </div>
              </div>
              </div>

              <div class="col-md-3 mb-3"> 
                <label for="Self">Self Study</label>
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Hrs</span>
              </div>
                <input type="text" class="form-control" id="Self" placeholder="Hours in Digits" name="selfstudy" value="<?php echo $m_selfstudy_h ?>" required>
              
              </div>
              </div>


            </div>
            

            <div class="row">

              <div class="col-md-6 mb-3">
              <label for="Department">Semester Name</label>
              <select class="custom-select d-block w-100"  name="semester" required>
                    <option selected  disabled selected>Select Semester Name...</option>
                    <?php
                     $sql = "SELECT semester_id FROM module";
                     $result = mysqli_query($con, $sql);
                     if(mysqli_num_rows($result)>0)
                     {
                       while($row = mysqli_fetch_assoc($result))
                       {
                         echo '<option value ="'.$row['semester_id'].'" ';

                         if($row['semester_id']== $sid)
                         {
                           echo 'selected';
                         }
                         echo '>' .$row['semester_id'].'</option>';
                       }
                     }
                    ?>
                    
                </select>
              <div class="invalid-feedback">
                Please provide a Department.
              </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="unit">Relative Unit</label>
                <input type="text" class="form-control" id="unit" placeholder=""   name="unit" value="<?php echo $m_r_unit ?>" required>
                <div class="invalid-feedback">
                  Please provide a Relative Unit name
                </div>
              </div>

            </div>
               
                
            <div class="row">

              <div class="col-md-3 mb-3">
                <label for="aim">Module aim</label>
                <textarea class="form-control" id="Module aim" rows="8" name="aim"><?php echo $m_aim; ?></textarea>
              <div class="invalid-feedback">
                Module is required.
              </div>
              </div>
              
              <div class="col-md-3 mb-3">
                <label for="unit">Learning Outcomes</label>
                <textarea class="form-control" id="Outcomes" rows="8" name="outcomes" value="<?php echo $m_l_outcomes ?>"><?php echo $m_l_outcomes; ?></textarea>
              <div class="invalid-feedback">
                Learning Outcomes is required.
              </div>
              </div>

              <div class="col-md-3 mb-3">
                <label for="resources">Resources</label>
                <textarea class="form-control" id="resources" rows="8" name="resources" value="<?php echo $m_resources ?>"><?php echo $m_resources; ?></textarea>
              <div class="invalid-feedback">
                Resources is required.
              </div>
              </div>

              <div class="col-md-3 mb-3">
                <label for="references">References</label>
                <textarea class="form-control" id="References" rows="8" name="references" value="<?php echo $m_references ?>"><?php echo $m_references; ?></textarea>
              <div class="invalid-feedback">
                References is required.
              </div>
              </div>
            
            </div>

<?php
      if(isset($_GET['edits']))
      {
        echo '<input id="button" class="btn btn-primary btn-lg btn-block" type="submit" name="Editing" value ="Continue To Edit Module Details">';
      }
      else
      {
        echo '<input id="buttuon"  class="btn btn-primary btn-lg btn-block"type="submit" name="Adding" value ="Continue To Add Module Details">';
      }
      ?>
<body>

</body>
<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("footer.php"); ?>  
<!--  end dont change the order-->
    
    
  
