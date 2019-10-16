

<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>

<?PHP

// Add coding
$Department=$Course=$Module=$AcademicYear=$Lecture=$WeekDays=$Time=$ClassRoom=$Startdate=$EndDate=$Type=null;

if(isset($_POST['Add'])){
  if(!empty($_POST['Department'])
    &&!empty($_POST['Course'])
    &&!empty($_POST['Module'])
    &&!empty($_POST['Academic Year'])
    &&!empty($_POST['Lecture'])
    &&!empty($_POST['WeekDays'])
    &&!empty($_POST['Time'])
    &&!empty($_POST['Class Room'])
    &&!empty($_POST['Start date'])
    &&!empty($_POST['End Date'])){
   
     $Department_id=$_POST['Department_id'];
      $cours=$_POST['course'];
      $Module=$_POST['Module'];
      $AcademicYear=$_POST['AcademicYear'];
      $Lecture=$_POST['Lecture'];
      $WeekDays=$_POST['Weekdays'];
      $Time=$_POST['Time'];
      $ClassRoom=$_POST['Class Room'];
      $Subject=$_POST['Start date'];
      $EndDate=$_POST['End Date'];
    

      $sql="INSERT INTO `timetable`(`department_id`, `course_id`, `module_id`, `academic_year`, `weekdays`, `time`, `classroom`, `startdate`, `enddate`) 
      VALUES (`$department_id`, `$course_id`, `$module_id`, `$academic_year`,`$weekdays`, `$time`, `$classroom`, `$startdate`, `$enddate`)";

      if(mysqli_query($con,$sql))
     
      {
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>'.$selecttimetable.'</strong> Staff details inserted
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>    
      ';
    }
    else{
      
      echo '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>'.$selecttimetable.'</strong> echo "Error".$sql."<br>".mysqli_error($con);
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
      
      ';


    }

  }




}
  ?>



 <h1 class="text-center">Add Time Table </h1>
 <br>
         <div class="row"> 
		
         <div class="col-12">
         <form>
         <p style="font-size:20px;"> Time table   <hr color ="black" style="height:1px;"></p><br>
         </form>
 </div>
 </div>




  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Department</label>
    <div class="col-sm-10"> 
    <select id="inputState" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['Department_id'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Department_id'])){echo ' is-valid';} ?>"  id="Department_id" name="Department_id">
        <option selected>Department</option>
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
    <label for="inputPassword3" class="col-sm-2 col-form-label">Course</label>
    <div class="col-sm-10">
	<select id="inputState" class="form-control <?php  if(isset($_POST['Add']) && empty($_POST['course_id'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['course_id'])){echo ' is-valid';} ?>"  id="course_id" name="course_id">
        <option selected>Course</option>
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
    <select id="inputState" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['module_id'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['module_id'])){echo ' is-valid';} ?>"  id="module_id" name="module_id">
        <option selected>Module</option>
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
    <select id="inputState" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['academic_year'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['academic_year'])){echo ' is-valid';} ?>"  id="academic_year" name="academic_year">
        <option selected>AcademicYear</option>

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
    <select id="inputState" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['staff_id'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['staff_id'])){echo ' is-valid';} ?>"  id="staff_id" name="staff_id">
        <option selected>Lecture</option>

        <?php          
            $sql = "SELECT * FROM `staff`";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                echo '<option  value="'.$row["staff_id"].'" required';
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
    <select id="inputState" class="form-control <?php  if(isset($_POST['Add']) && empty($_POST['WeekDays'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['WeekDays'])){echo ' is-valid';} ?>"  id="WeekDays" name="WeekDays">
        <option selected>Days</option>


        <option  value="Monday"
        <?php if($WeekDays=="Monday")  echo 'selected';?>

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
    <select id="inputState" class="form-control <?php  if(isset($_POST['Add']) && empty($_POST['Time'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Time'])){echo ' is-valid';} ?>"  id="Time" name="Time">
        <option selected>Time</option>

        <option value="P1-8.30-10.00"

        <?php if($Time=="P1-8.30-10.00")  echo 'selected';?>

        >P1-8.30-10.00</option>

    <option value="P2-10.30-12.00"

    <?php if($Time=="P2-10.30-12.00")  echo 'selected';?>
    
    >P2-10.30-12.00</option>


    <option value="P3-13.00-14.30"


    <?php if($Time=="P3-13.00-14.30")  echo 'selected';?>

    >P3-13.00-14.30</option>

    <option value="P4-14.45-16.15"

    <?php if($Time=="P4-14.45-16.15")  echo 'selected';?>
    >P4-14.45-16.15</option>
	
      

      </select>
    </div>
  </div>
  
  



  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">ClassRoom</label>
    <div class="col-sm-10"> 
    <select id="inputState" class="form-control  <?php  if(isset($_POST['Add']) && empty($_POST['ClassRoom'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['ClassRoom'])){echo ' is-valid';} ?>"  id="ClassRoom" name="ClassRoom">
        <option selected>Class  Room</option>

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
  

  

 

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Start date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="inputEmail3"required >
    </div>
  </div>


  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">End Date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="inputEmail3"required >
    </div>
  </div>


 

  <h1 class="text-right">

        
     

         <div class="col-12">


         <?PHP 
  echo '<div class="btn-group-horizontal">';

    if(isset($_GET['edit'])){
      echo '<button type="submit"  class="btn btn-primary mr-2"><i class="fas fa-user-edit"></i>UPDATE</button>'; 
      echo'<button type="reset" value="Reset" class="btn btn-primary mr-2"><i class="fas fa-redo"></i>REFRESH</button>';

    }if(!isset($_GET['delete']) && !isset($_GET['edit'])){
      echo '<button type="submit" value="Add" name="Add" class="btn btn-primary mr-2"><i class="fas fa-user-plus"></i>ADD</button>';

    }
      
      echo '</div>';
      ?>
         
         
  
              
                    </div>













    </div>
  </div>

 </form>

          
 <?php include_once("footer.php"); ?>