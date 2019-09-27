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
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Type</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3"required placeholder="Result...">
    </div>
  </div>


  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Department</label>
    <div class="col-sm-10">
	<select id="inputState" class="form-control">
      <option selected>Choose the Department...</option>
      <option>Electrical & Electronic Technology Department Department</option>
      <option>Construction Technology Department</option>
      <option>Information & Communications Technology Department</option>
      <option>Mechanical Technology Department</option>
      <option>Food Technology Department</option>
      <option>Automotive & Agricultural Technology Department</option>
    </select>
  </div>
</div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Batch No</label>
    <div class="col-sm-10">
    <select id="inputState" class="form-control">
      <option selected>Choose the Batch No...</option>
      <option>Batch 01</option>
      <option>Batch 02</option>
      <option>Batch 03</option>
    </select>
  </div>
  </div>

 
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Modules</label>
    <div class="col-sm-10">
    <select id="inputState" class="form-control">
      <option selected>Choose the Module...</option>
      <option>Module 01</option>
      <option>Module 02</option>
      <option>Module 03</option>
      <option>Module 04</option>
      <option>Module 05</option>
      <option>Module 06</option>
      <option>Module 07</option>
      <option>Module 08</option>
      <option>Module 09(Manage Workplace Information)</option>
      <option>Module 03(Manage Workplace Communication)</option>
    </select>
  </div>
  </div>

 
  
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Upload File</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
<h1 class="text-right">
 
 <div class="row"> 

 <div class="col-12">
<button type="button" class="btn btn-primary btn-lg">Add</button>
<button type="button" class="btn btn-secondary btn-lg">Edit</button>
<button type="button" class="btn btn-secondary btn-lg">Delete</button>

</div>
</div>

 <!-- end your code here-->




<!--bLOCK#3  start don't change the order-->
    <?php include_once("footer.php");?>
<!-- end don't change the order-->
   