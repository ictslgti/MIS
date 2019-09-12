<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->
<html>

<head>
   
</head>
<body>
<br><br>
      <div class="row">
      <div class="col form-group  container p-3 mb-2 " >
    <h1 class=" text-center  "><i class="fas fa-file-alt"></i> MODULE ENROLLMENT</h1>
    </div>
   </div>
   <br><br>

<form >
<div  class="row">  
         <div class="col-4">
         <div class="form-row align-items-center">
       <label for="inputFirstName">Staff_Name</label>
       <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Staff_Name</label>
       <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Choose...</option>
            <option ></option>
      </select>
     </div><br>
     <div class="form-row align-items-center">
       <label for="inputFirstName">Module_Name</label>
       <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Module_ID</label>
       <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Choose...</option>
      </select>
    </div><br>
    <div class="form-row align-items-center">
       <label for="inputFirstName">Course_Name</label>
       <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Course_ID</label>
       <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Choose...</option>
            <option >4TE</option>
            <option >BIT</option>
            <option >5IT</option>
      </select>
    </div><br>
    <div class="form-row align-items-center">
       <label for="inputFirstName">Academic_Year</label>
       <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Academic_Year</label>
       <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Choose...</option>
            <option >2016/2017</option>
            <option >2017/2018</option>
            <option >2018/2019</option>
      </select>
    </div><br> 
</form>
</div>
  </div>
  <button type="submit" class="btn btn-outline-primary">ADD STAFF </button>
    <button type="button" class="btn btn-outline-primary">UPDATE STAFF</button>
    <button type="button" class="btn btn-outline-primary">DELETE STAFF</button>
    <button type="button" class="btn btn-outline-primary">EDIT STAFF</button>
    <button type="button" class="btn btn-outline-primary">REFRESH STAFF</button>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->