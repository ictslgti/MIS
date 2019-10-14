

<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>



<?PHP

// Add coding
$period=$selecttimetable=$Department=$Course=$Day=$Class=$Timestart=$Timeend=$Subject=$Yearofstudy=$Position=$Type=null;

if(isset($_POST['Add'])){
  if(!empty($_POST['period'])
    &&!empty($_POST['selecttimetable'])
    &&!empty($_POST['Department'])
    &&!empty($_POST['Course'])
    &&!empty($_POST['Day'])
    &&!empty($_POST['Class'])
    &&!empty($_POST['Time Start'])
    &&!empty($_POST['Time End'])
    &&!empty($_POST['Subject'])
    &&!empty($_POST['Year of study'])){
   
     $period=$_POST['period'];
      $SelectTimetable=$_POST['selecttimetable'];
      $Department=$_POST['Department'];
      $Course=$_POST['Course'];
      $Day=$_POST['Day'];
      $Class=$_POST['Class'];
      $Time_Start=$_POST['Time Start'];
      $Time_End=$_POST['Time End'];
      $Subject=$_POST['Subject'];
      $Year_of_study=$_POST['Year of study'];
    

      $sql="INSERT INTO `timetable`(`period`, `selecttimetable`, `Department`, `Course`,`Day`, `Class`, `Timestart`, `Timeend`, `Subject`, `Yearofstudy`) 
      VALUES (`$period`, `$selecttimetable`, `$Department`, `$Course`,`$Day`, `$Class`, `$Timestart`, `$Timeend`, `$Subject`, `$Yearofstudy`)";

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




  <!-- search coding -->
 <?php
  if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $sql="SELECT * FROM `timetable` WHERE `period`='$period'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)==1){
            $row=mysqli_fetch_assoc($result);
            $period=$_POST['period'];
            $SelectTimetable=$_POST['selecttimetable'];
            $Department=$_POST['Department'];
            $Course=$_POST['Course'];
            $Day=$_POST['Day'];
            $Class=$_POST['Class'];
            $Time_Start=$_POST['Time Start'];
            $Time_End=$_POST['Time End'];
            $Subject=$_POST['Subject'];
            $Year_of_study=$_POST['Year of study'];
          
        }
        else{
          echo "Error".$sql."<br>".mysqli_error($con);
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




 <form method="POST" action="#">
 <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">period</label>
    <div class="col-sm-10">
      <input type="text"  name="period" value="<?php echo $period; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['period'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['period'])){echo ' is-valid';} ?>" placeholder="period">   
    </div>
  </div>

  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Department</label>
    <div class="col-sm-10"> 
    <select id="inputState" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['Department_id'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Department_id'])){echo ' is-valid';} ?>"  id="Department_id" name="Department_id">
        <option selected>choose</option>
        <?php          
            $sql = "SELECT * FROM `department`";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                echo '<option  value="'.$row["department_id"].'" required';
                if($row["department_id"]==$Department_id) echo ' selected';
                echo '>'.$row["department_name"].'</option>';
                }
            }
            ?>
      </select>
    </div>
  </div>



 <form>
 <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Select Timetable</label>
    <div class="col-sm-10"> 
    <select id="inputState" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['Timetable'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Timetable'])){echo ' is-valid';} ?>"  id="Timetable" name="Timetable">
        <option selected>choose Timetable</option>
        <option>Exam</option>
		<option>Class</option>
		<option>##</option>
	

      </select>
    </div>
  </div>




  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Course</label>
    <div class="col-sm-10">
	<select id="inputState" class="form-control <?php  if(isset($_POST['Add']) && empty($_POST['Level'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Level'])){echo ' is-valid';} ?>"  id="Level" name="Level">
        <option selected>choose Level</option>
        <option>Level-06</option>
		<option>Level-05</option>
		<option>Bridging-L5</option>
		<option>Level-4</option>
		<option>##</option>

      </select>
    </div>
  </div>                       









  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Day</label>
    <div class="col-sm-10"> 
    <select id="inputState" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['Day'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Day'])){echo ' is-valid';} ?>" id="Day" name="Day">
        <option selected>choose Day</option>
        <option>Monday</option>
		<option>Tuesday</option>
		<option>Wednesday</option>
		<option>Thursday</option>
		<option>Friday</option>

      </select>
    </div>
  </div>



  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Class</label>
    <div class="col-sm-10">
	<select id="inputState" class="form-control class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['lab'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['lab'])){echo ' is-valid';} ?>   id="lab" name="lab">
        <option selected>choose lab</option>
        <option>Lab-01</option>
		<option>Lab-02</option>
		<option>Lab-03</option>
		<option>Lab-04</option>
		<option>##</option>

      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Time Start</label>
    <div class="col-sm-10">
      <input type="time" class="form-control" id="time" required value="<?php echo $Times; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['Times'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Times'])){echo ' is-valid';} ?>"  placeholder="Time Start"><br>  
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Time End</label>
    <div class="col-sm-10">
      <input type="time" class="form-control" id="time" required value="<?php echo $Timee; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['Timee'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Timee'])){echo ' is-valid';} ?>"  placeholder="Time End"><br>  
    </div>
  </div>




  

 

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Subject</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3"required >
    </div>
  </div>


  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Year of study</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3"required >
    </div>
  </div>


 

  <h1 class="text-right">
 
         <div class="row"> 
		
         <div class="col-12">
         <a href="Timetable.php" button type="button" class="btn btn-success"  aria-pressed="true" >Back</button>
         <a href="AddTimetable.php" button type="button" class="btn btn-success"  aria-pressed="true" >Add</button>
  </a>
         
  </h1>
  
  </div>
 </div>
    </div>
  </div>

 </form>



 <div class="form-row pt-3">
    <?PHP 
  echo '<div class="btn-group-horizontal">';

    if(isset($_GET['edit'])){
      echo '<button type="submit"  class="btn btn-primary mr-2"><i class="fas fa-user-edit"></i>UPDATE</button>'; 
      echo'<button type="submit"  class="btn btn-primary mr-2"><i class="fas fa-redo"></i>REFRESH</button>';

    }if(isset($_GET['delete']))
    {
      echo '<button type="submit"  class="btn btn-danger mr-2"><i class="fas fa-user-slash"></i>DELETE</button>';

    }if(!isset($_GET['delete']) && !isset($_GET['edit'])){
      echo '<button type="submit" value="Add" name="Add" class="btn btn-primary mr-2"><i class="fas fa-user-plus"></i>   ADD</button>';

    }
      
      echo '</div>';
      ?>
  </div>

          
 <?php include_once("footer.php"); ?>