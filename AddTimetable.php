

<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
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



<form>

<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Department</label>
    <div class="col-sm-10"> 
    <select id="inputState" class="form-control">
        <option selected>choose</option>
        <option>Information & Communications Technology Department</option>
		<option>Mechanical Technology Department</option>
		<option>Electrical & Electronic Technology Department</option>
		<option>Food Technology Department</option>
    <option>Automotive & Agricultural Technology Department</option>
    <option>Construction Technology Department </option>

      </select>
    </div>
  </div>













  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Day</label>
    <div class="col-sm-10"> 
    <select id="inputState" class="form-control">
        <option selected>choose</option>
        <option>Monday</option>
		<option>Tuesday</option>
		<option>Wednesday</option>
		<option>Thursday</option>
		<option>Friday</option>

      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Time Start</label>
    <div class="col-sm-10">
      <input type="time" class="form-control" id="inputEmail3" required >
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Time End</label>
    <div class="col-sm-10">
      <input type="time" class="form-control" id="inputEmail3" required>
    </div>
  </div>




  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Year of study</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3"required >
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">batch</label>
    <div class="col-sm-10">
	<select id="inputState" class="form-control">
        <option selected>choose</option>
        <option>Monday</option>
		<option>Tuesday</option>
		<option>Wednesday</option>
		<option>Thursday</option>
		<option>Friday</option>

      </select>
    </div>
  </div>

  <h1 class="text-right">
 
         <div class="row"> 
		
         <div class="col-12">
         <a href="classtimetable.php" button type="button" class="btn btn-success"  aria-pressed="true" >Back</button>
         <a href="AddTimetable.php" button type="button" class="btn btn-success"  aria-pressed="true" >Save</button>
  </a>
         
  </h1>
  
  </div>
</div>
    </div>
  </div>

</form>
<?php include_once("footer.php"); ?>