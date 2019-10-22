

<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>




<?PHP
$Department=$Course=$Module=$AcademicYear=$Lecture=$WeekDays=$Time=$ClassRoom=$startdate=$endeate= $tid=null;

if(isset($_GET['edit']))

{
  $id = $_GET['edit'];
  $sql = "SELECT * FROM `timetable` WHERE `time_id` = '$id'";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result)==1)
   {
      $row = mysqli_fetch_assoc($result);
      $department_id = $row['department_id'];
      $course_id = $row['course_id'];
      $module_id = $row['module_id'];
      $academic_year= $row['academic_year'];
      $staff_id = $row['staff_id'];
      $weekdays = $row['weekdays'];
      $classroom = $row['classroom'];

  }

}

// Add coding



if(isset($_POST['Add'])){
  echo "ok";

  if(!empty($_POST['Department_id'])
  &&!empty($_POST['course_id'])
  &&!empty($_POST['module_id'])
  &&!empty($_POST['academic_year'])
  &&!empty($_POST['staff_id'])
  &&!empty($_POST['weekdays'])
  &&!empty($_POST['time'])
  &&!empty($_POST['classroom']))
  { 
     echo "ok2";
     echo $department_id   =  $_POST['Department_id'];
     echo $course_id   =  $_POST['course_id'];
     echo $module_id  =   $_POST['module_id'];
     echo $academic_year  =   $_POST['academic_year'];
     echo $staff_id   =   $_POST['staff_id'];
     echo $weekdays  =  $_POST['weekdays'];
     echo $time   =    $_POST['time'];
     echo $classroom   =  $_POST['classroom'];
  
     echo $sql = "INSERT INTO `timetable` (`department_id`, `course_id`, `module_id`, `academic_year`, `staff_id`, `weekdays`, `time`, `classroom`)
      VALUES ('$department_id','$course_id','$module_id','$academic_year','$staff_id','$weekdays','$time','$classroom')";
   
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


 <h1 class="text-center">Add Time Table </h1>
 <br>
         <div class="row"> 
		
         <div class="col-12">
         <p style="font-size:20px;"> Time table   <hr color ="black" style="height:1px;"></p><br>
 </div>
 </div>


 <form method="POST" action="#">

  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Department</label>
    <div class="col-sm-10"> 
    <select id="inputState" class="form-control"  
    id="Department_id" name="Department_id">

        <option selected disabled>Department</option>
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
    <label for="inputPassword3" class="col-sm-2 col-form-label">Course</label>
    <div class="col-sm-10">
  <select id="inputState" class="form-control" <?php  if(isset($_POST['Add']) && empty($_POST['course_id']))
    {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['course_id'])){echo ' is-valid';} ?>  id="module_id" name="course_id">
        <option selected disabled required>Course</option>
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
    <label for="inputEmail3" class="col-sm-2 col-form-label">Module</label>
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
                if($row["module_id"]==$Module) echo ' selected';
                echo '>'.$row["module_name"].'</option>';
                }
            }
            ?>
       

      </select>
    </div>
  </div>


  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">AcademicYear</label>
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
                if($row["academic_year"]==$AcademicYear) echo ' selected';
                echo '>'.$row["academic_year"].'</option>';
                }
            }
            ?>

      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Lecture</label>
    <div class="col-sm-10"> 
    <select id="inputState" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['staff_id']))
    {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['staff_id'])){echo ' is-valid';} ?>"  id="staff_id" name="staff_id">
        <option selected disabled required >Lecture</option>

        <?php          
            $sql = "SELECT * FROM `staff`";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                echo '<option  value="'.$row["staff_id"].'"';
                if($row["staff_id"]==$Lecture) echo ' selected';
                echo '>'.$row["staff_name"].'</option>';
                }
            }
            ?>


      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">WeekDays</label>
    <div class="col-sm-10"> 
    <select id="inputState" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['weekdays']))
    {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['weekdays'])){echo ' is-valid';} ?>"  id="weekdays" name="weekdays">
        <option selected disabled required >Days</option>


        <option  value="Monday" <?php if($WeekDays=="Monday")  echo 'selected';?>

        >Monday</option>

    <option value="Tuesday"

    <?php if($WeekDays=="Tuesday")  echo 'selected';?>

    >Tuesday</option>

    <option value="Wednesday"

    <?php if($WeekDays=="Wednesday")  echo 'selected';?>

    >Wednesday</option>

    <option value="Thursday"

    <?php if($WeekDays=="Thursday")  echo 'selected';?>

    >Thursday</option>


    <option value="Friday"

     <?php if($WeekDays=="Friday")  echo 'selected';?>
    
    >Friday</option>

      </select>
    </div>
  </div>
  


  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Time</label>
    <div class="col-sm-10"> 
    <select id="inputState" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['time']))
    {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['time'])){echo ' is-valid';} ?>"  id="time" name="time">

        <option selected disabled required >Time</option>

        <option value="P1"

        <?php if($Time=="P1")  echo 'selected';?>

        >P1-8.30-10.00</option>

    <option value="P2"

    <?php if($Time=="P2")  echo 'selected';?>
    
    >P2-10.30-12.00</option>


    <option value="P3"


    <?php if($Time=="P3")  echo 'selected';?>

    >P3-13.00-14.30</option>

    <option value="P4"

    <?php if($Time=="P4")  echo 'selected';?>
    >P4-14.45-16.15</option>
	
      

      </select>
    </div>
  </div>



  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">ClassRoom</label>
    <div class="col-sm-10"> 
    <select name="classroom"  class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['classroom']))
                  {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['classroom'])){echo ' is-valid';} ?>" name="classroom">
        <option selected disabled required >ClassRoom</option>

        <option  value="LAP-01"

        <?php if($ClassRoom=="LAP-01")  echo 'selected';?>
        
        >LAP-01</option>

    <option value="LAP-02"
    <?php if($ClassRoom=="LAP-02")  echo 'selected';?>
    >LAP-02</option>

    <option  value="LAP-03"
    <?php if($ClassRoom=="LAP-03")  echo 'selected';?>
    >LAP-03</option>
    <option  value="LAP-04"
    <?php if($ClassRoom=="LAP-04")  echo 'selected';?>
    
    >LAP-04</option>
	
      

      </select>
    </div>
  </div>
  


 
 <!--
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Startdate</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" <?php echo $startdate; ?> <?php  if(isset($_POST['Add'])
       && empty($_POST['startdate'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['startdate'])){echo ' is-valid';} ?>"  >
    </div>
  </div>


  <div class="form-group row">
    <label class="col-sm-2 col-form-label">EndDate</label>
    <div class="col-sm-10">
      <input type="date" class="form-control<?php echo $endeate; ?>"
       class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['endeate']))
       {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['endeate'])){echo 
       ' is-valid';} ?>




    </div>
  </div>

       -->


  

        
     

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
                    </div>













    </div>
  </div>

 </form>

          
 <?php include_once("footer.php"); ?>