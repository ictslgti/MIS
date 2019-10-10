<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<div class="row">
    <div class="col form-group  container p-3 mb-2 " >
      <h1 class=" text-center  "><i class="fas fa-file-alt"></i> MODULE ENROLLMENT</h1>
    </div>
</div>

<form>
  <div  class="row pb-3">  
    <div class="col-5">
      <div class="form-row align-items-center">
        <label for="inputFirstName">Staff_Name</label>
        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Staff_Name</label>
          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Choose...</option>
            <option ></option>
          </select>
      </div>
    </div>
  </div>

  <div  class="row pb-3">  
    <div class="col-5">
      <div class="form-row align-items-center">
        <label for="inputFirstName">Module_Name</label>
        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Module_ID</label>
          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Choose...</option>
          </select>
      </div>
    </div>
  </div>

  <div  class="row pb-3">  
    <div class="col-5">
      <div class="form-row align-items-center">
        <label for="inputFirstName">Staff_Name</label>
        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Staff_Name</label>
          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Choose...</option>
            <option ></option>
          </select>
      </div>
    </div>
  </div>

  <div  class="row pb-3">  
    <div class="col-5">
      <div class="form-row align-items-center">
        <label for="inputFirstName">Staff_Name</label>
        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Staff_Name</label>
          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Choose...</option>
            <option ></option>
          </select>
      </div>
    </div>
  </div>
</form>


<div class="btn-group-horizontal">
    <button type="submit" class="btn btn-outline-info"><i class="fas fa-user-plus"></i>   ADD</button> 
    <button type="submit" class="btn btn-outline-info"><i class="fas fa-user-edit"></i>   UPDATE</button> 
    <button type="submit" class="btn btn-outline-info"><i class="fas fa-user-slash"></i>   DELETE</button> 
    <button type="submit" class="btn btn-outline-info"><i class="fas fa-redo"></i>   REFRESH</button> 
    <a href="StaffModuleEnrollment.php" class="btn btn-outline-info" role="button" aria-pressed="true"><i class="fas fa-chevron-left"></i> Back</i></a>
  </div>
 
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->