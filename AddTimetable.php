

<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>

 


<?PHP
$department_id=$course_id=$module_id=$academic_year=$staff_id=$weekdays=$timep=$classroom=$start_date=$end_date=$tid=null;

if(isset($_GET['edit']))

{
  $tid = $_GET['edit'];
  $sql = "SELECT * FROM `timetable` WHERE `time_id` =$tid";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result)==1)

   {
      $row = mysqli_fetch_assoc($result);
      echo  $department_id = $row['department_id'];
      echo  $course_id = $row['course_id'];
      echo  $module_id = $row['module_id'];
      echo  $academic_year= $row['academic_year'];   
      echo  $staff_id = $row['staff_id'];
      echo  $weekdays = $row['weekdays'];
      echo $timep = $row['timep'];
      echo $classroom = $row['classroom'];
      echo $start_date = $row['start_date'];
      echo $end_date = $row['end_date'];

  }

}

// Add coding



if(isset($_POST['Add'])){
  

  if(!empty($_POST['department_id'])
  &&!empty($_POST['course_id'])
  &&!empty($_POST['module_id'])
  &&!empty($_POST['academic_year'])
  &&!empty($_POST['staff_id'])
  &&!empty($_POST['weekdays'])
  &&!empty($_POST['timep'])
  &&!empty($_POST['classroom'])
  &&!empty($_POST['start_date'])
  &&!empty($_POST['end_date']))


  { 

     $department_id   =  $_POST['department_id'];
     $course_id   =  $_POST['course_id'];
     $module_id  =   $_POST['module_id'];
     $academic_year  =   $_POST['academic_year'];
     $staff_id   =   $_POST['staff_id'];
    //  $weekdays  =  $_POST['weekdays'];
    //  $timep    =    $_POST['timep'];
     $classroom   =  $_POST['classroom'];
     $start_date   =   $_POST['start_date'];
     $end_date   =   $_POST['end_date'];
     $sql_insert = null;
     foreach ($_POST['weekdays'] as $weekdays)
     {
       foreach ($_POST['timep'] as $timep)
     {
       $sql_insert .= "INSERT INTO `timetable` (`department_id`, `course_id`, `module_id`, `academic_year`, `staff_id`, `weekdays`, `timep`, `classroom`,`start_date`,`end_date`)
       VALUES ('$department_id','$course_id','$module_id','$academic_year','$staff_id','$weekdays','$timep','$classroom','$start_date','$end_date');";
 
     }
     }
    //  echo  $sql_insert;
    
      if (mysqli_multi_query($con, $sql_insert)) {
        echo "record add";
    

      } else {
         echo "Error: " . $sql_insert .
        "<br>" . 	mysqli_error($con);
      
        

      }
  }
}


  ?>


<!-- Add timetable design  -->


 <h1 class="text-center">Add Time Table </h1>
 <br>
         <div class="row" class="row d-flex justify-content-center"> 
		
         <div class="col-12" >
         <p style="font-size:20px;"> Time table   <hr color ="black" style="height:1px;"></p><br>
 </div>
 </div>


 <form method="POST" action="#" >

  
  <div class="form-group row"  >
 
    <label  label="Picnic"for="inputEmail3" class="col-sm-2 control-label">Department</label>
    <div class="col-sm-10"> 
    <select required class="selectpicker" multiple data-live-search="true" id="inputState" data-live-search="true" <?php  if(isset($_POST['Add']) && empty($_POST['department_id']))
    {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['department_id'])){echo ' is-valid';} ?>" id="department_id" name="department_id">


        
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
    <label for="inputPassword3" class="col-sm-2 col-form-label">Course</label>
    <div class="col-sm-10">
  <select id="inputState" class="selectpicker" multiple data-live-search="true"  class="form-control <?php  if(isset($_POST['Add']) && empty($_POST['course_id']))
    {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['course_id'])){echo ' is-valid';} ?>"  id="course_id" name="course_id">
       
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
    <label for="inputEmail3" class="col-sm-2 col-form-label">Module</label>
    <div class="col-sm-10"> 
    <select id="inputState" class="selectpicker" multiple data-live-search="true" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['module_id']))
    {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['module_id'])){echo ' is-valid';} ?>"  id="module_id" name="module_id">
        
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
    <label for="inputEmail3" class="col-sm-2 col-form-label">AcademicYear</label>
    <div class="col-sm-10"> 
    <select id="inputState" class="selectpicker" multiple data-live-search="true"  class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['academic_year']))
    {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['academic_year'])){echo ' is-valid';} ?>"  id="academic_year" name="academic_year">
  

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

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Lecture</label>
    <div class="col-sm-10"> 
    <select id="inputState" class="selectpicker" multiple data-live-search="true" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['staff_id']))
    {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['staff_id'])){echo ' is-valid';} ?>"  id="staff_id" name="staff_id">
       

        <?php          
            $sql = "SELECT * FROM `staff`";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                echo '<option  value="'.$row["staff_id"].'"';
                if($row["staff_id"]==$staff_id) echo ' selected';
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
    <select class="selectpicker" multiple data-live-search="true" id="inputState" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['weekdays']))
    {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['weekdays'])){echo ' is-valid';} ?>"  id="weekdays" name="weekdays[]">
       


        <option  value="Monday" <?php if($weekdays=="Monday")  echo 'selected';?>

        >Monday</option>

    <option value="Tuesday"

    <?php if($weekdays=="Tuesday")  echo 'selected';?>

    >Tuesday</option>

    <option value="Wednesday"

    <?php if($weekdays=="Wednesday")  echo 'selected';?>

    >Wednesday</option>

    <option value="Thursday"

    <?php if($weekdays=="Thursday")  echo 'selected';?>

    >Thursday</option>


    <option value="Friday"

     <?php if($weekdays=="Friday")  echo 'selected';?>
    
    >Friday</option>

      </select>
    </div>
  </div>
  


  <div  class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Time</label>
    <div class="col-sm-10"> 
    <select class="selectpicker" multiple data-live-search="true" id="inputState" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['timep']))
    {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['timep'])){echo ' is-valid';} ?>"  id="timep" name="timep[]">


        <option value="P1"

        <?php if($timep=="P1")  echo 'selected';?>

        >P1-8.30-10.00</option>

    <option value="P2"

    <?php if($timep=="P2")  echo 'selected';?>
    
    >P2-10.30-12.00</option>


    <option value="P3"


    <?php if($timep=="P3")  echo 'selected';?>

    >P3-13.00-14.30</option>

    <option value="P4"

    <?php if($timep=="P4")  echo 'selected';?>
    >P4-14.45-16.15</option>
	
      

      </select>
    </div>
  </div>



  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">ClassRoom</label>
    <div class="col-sm-10"> 
    <select name="classroom" class="selectpicker"multiple data-live-search="true"  class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['classroom']))
                  {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['classroom'])){echo ' is-valid';} ?>" name="classroom">
        

        <option  value="LAP-01"

        <?php if($classroom=="LAP-01")  echo 'selected';?>
        
        >LAP-01</option>

    <option value="LAP-02"
    <?php if($classroom=="LAP-02")  echo 'selected';?>
    >LAP-02</option>

    <option  value="LAP-03"
    <?php if($classroom=="LAP-03")  echo 'selected';?>
    >LAP-03</option>
    <option  value="LAP-04"
    <?php if($classroom=="LAP-04")  echo 'selected';?>
    
    >LAP-04</option>
	
      

      </select>
    </div>
  </div>
  


 

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Startdate</label>
    <div class="col-sm-10">
      <input class="selectpicker" multiple data-live-search="true" type="date" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['start_date']))
    {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['start_date'])){echo ' is-valid';} ?>"  id="start_date" name="start_date">
</div>

  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">EndDate</label>
    <div class="col-sm-10">
      <input class="selectpicker" multiple data-live-search="true" type="date" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['end_date']))
    {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['end_date'])){echo ' is-valid';} ?>"  id="end_date" name="end_date">




    </div>
  </div>
          
     


        
     

         <div class="col-12">

         <h1 class="text-center">
        
         <?PHP 
  // echo '<div class="btn-group-horizontal">';

  //   if(isset($_GET['edit']))
  //   {
  //     echo '<button type="submit"  class="btn btn-primary mr-2"><i class="fas fa-user-edit"></i>UPDATE</button>'; 
  //     echo'<button type="reset" value="Reset" class="btn btn-primary mr-2"><i class="fas fa-redo"></i>REFRESH</button>';

  //   }
  //   if(isset($_GET['delete']))
  //   {
  //     echo '<button type="submit"  class="btn btn-danger mr-2"><i class="fas fa-user-slash"></i>DELETE</button>';

  //   }
  //   if(!isset($_GET['delete']) && !isset($_GET['edit'])){
  //     echo '    ';

  //   }
      
  //     echo '</div>';
      ?>
      <div class="btn-group">
      <button type="submit" value="Add" name="Add" class="btn btn-primary">ADD</button>
    <a href="Timetable.php" class="btn btn-primary ">View</a>  
                    </div>






 







    </div>
  </div>

 </form>



 <?php include_once("footer.php"); ?>