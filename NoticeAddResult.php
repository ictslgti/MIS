<!--  bLOCK#1 start don't change the order-->
<?php 
$title =" Department Deatils| SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!-- end don't change the order-->



<!-- bLOCK#2 start your code here & u can change -->
<hr>
<div class="alert bg-dark text-white" role="alert">
  <h1>Add New Result</h1>
</div>
<hr>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">&nbsp;&nbsp;&nbsp;Type</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3"required placeholder="Result...">
    </div>
  </div>


  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">&nbsp;&nbsp;&nbsp;Department</label>
    <div class="col-sm-10">
	<select id="inputState" class="form-control">
      <option selected>Select the Department...</option>
      <option>Electrical & Electronic Technology Department</option>
      <option>Construction Technology Department</option>
      <option>Information & Communications Technology Department</option>
      <option>Mechanical Technology Department</option>
      <option>Food Technology Department</option>
      <option>Automotive & Agricultural Technology Department</option>
    </select>
  </div>
</div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">&nbsp;&nbsp;&nbsp;Academic Year</label>
    <div class="col-sm-10">
    <select id="inputState" class="form-control">
      <option selected>Select the Academic Year...</option>
      <option>2016/2017</option>
      <option>2017/2018</option>
      <option>2018/2019</option>
    </select>
  </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">&nbsp;&nbsp;&nbsp;Course</label>
    <div class="col-sm-10">
    <select id="inputState" class="form-control">
      <option selected>Select Your Course...</option>
      <option>Level 04</option>
      <option>Bridging</option>
      <option>Level 05</option>
      <option>Level 06</option>
    </select>
  </div>
  </div>
 
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">&nbsp;&nbsp;&nbsp;Modules</label>
    <div class="col-sm-10">
    <select id="inputState" class="form-control">
      <option selected>Select the Module...</option>
      <option>Module 01</option>
      <option>Module 02</option>
      <option>Module 03</option>
      <option>Module 04</option>
      <option>Module 05</option>
      <option>Module 06</option>
      <option>Module 07</option>
      <option>Module 08</option>
      <option>Module 09(Manage Workplace Information)</option>
      <option>Module 10(Manage Workplace Communication)</option>
    </select>
  </div>
  </div>

 
  
<div class="input-group mb-3">

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
  
 <!-- end your code here-->




<!--bLOCK#3  start don't change the order-->
    <?php include_once("footer.php");?>
<!-- end don't change the order-->
   
