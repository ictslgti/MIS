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
<div class="alert bg-dark text-white" role="alert">
  <h1>Add New Events</h1>
</div>

<hr>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Event Type</label>
    <div class="col-sm-10">
	<select id="inputState" class="form-control">
      <option selected>Choose the Event...</option>
      <option>Certificate Awarding Ceremony and Anniversary</option>
      <option>Christmas Day Celebration</option>
      <option>Hon Minister's Visit</option>
      <option>Blood Donation and Helth Awareness Programme</option>
      <option>Other</option>
    </select>
  </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Venue</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3"required >
    </div>
  </div>

 
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3"required >
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Time</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3"required >
    </div>
  </div>
  
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Upload File</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file...</label>
  </div>
</div>

<h1 class="text-right">
 
 <div class="row"> 

 <div class="col-12">
<button type="button" class="btn btn-primary btn-lg">Add</button>
<button type="button" class="btn btn-secondary btn-lg">Edit</button>
<button type="button" class="btn btn-secondary btn-lg">Delete</button>
<button type="button" class="btn btn-outline-danger btn-lg"><a href="AddNotice.php">Back</a></button>
</div>
</div>
 <!-- end your code here-->




<!--bLOCK#3  start don't change the order-->
    <?php include_once("footer.php");?>
<!-- end don't change the order-->
   