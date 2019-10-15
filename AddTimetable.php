

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
    <select id="inputState" class="form-control">
        <option selected>Lecture</option>
      

      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">WeekDays</label>
    <div class="col-sm-10"> 
    <select id="inputState" class="form-control">
        <option selected>Days</option>
        <option>Monday</option>
		<option>Tuesday</option>
		<option>Wednesday</option>
		<option>Thursday</option>
		<option>Friday</option>

      </select>
    </div>
  </div>
  


  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Time</label>
    <div class="col-sm-10"> 
    <select id="inputState" class="form-control">
        <option selected>Time</option>

        <option>P1-8.30-10.00</option>
		<option>P2-10.30-12.00</option>
		<option>P3-13.00-14.300</option>
		<option>P4-14.45-16.15</option>
	
      

      </select>
    </div>
  </div>
  
  



  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Class Room</label>
    <div class="col-sm-10"> 
    <select id="inputState" class="form-control">
        <option selected>Class  Room</option>

        <option>LAP-01</option>
		<option>LAP-02</option>
		<option>LAP-03</option>
		<option>LAP-04</option>
	
      

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
 
         <div class="row"> 
		
         <div class="col-12">
         <a href="Timetable.php" button type="button" class="btn btn-success"  aria-pressed="true" >Back</button>
         <a href="#" button type="button" class="btn btn-success"  aria-pressed="true" >Add</button>
  </a>
         
  </h1>
  
  </div>
 </div>
    </div>
  </div>

 </form>



 <div class="form-row pt-3">
   
  
  </div>

          
 <?php include_once("footer.php"); ?>