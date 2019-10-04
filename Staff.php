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
      <div class="col form-group  container p-3 mb-2 col-4 " >
    <h1 ><i class="fas fa-file-alt"></i>STAFF INFO</h1></div>
    <div class="col form-group  container p-3 mb-2 col-4 " ></div>
    <div class="col form-group  container p-3 mb-2 col-4 " >
  
    
    
        
    </div>
    
    </div>
   </div>
   <br><br>
   <div class="row">
   <div class="col-sm-12" >
   <hr color ="black" style="height:1px;">
   </div>
  </div>
  <form>
<div class="form-row pl-3">
    <div class="col-3" >
    <div class="form-row align-items-center">
      
       <select class="custom-select  mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Department Name</option>
      </select>
    </div><br></div>

    <div class="col-2" >
    <div class="form-row align-items-center">
       
       <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Academic_Year</option>
      </select>
    </div></div><br><br><br>

    <div class="col-1" >
    <div class="form-row align-items-center">
    <button type="button" class="btn btn-outline-primary align= right">Search</button>
    </div><br></div></div>
    <table class="table table-bordered">
  <thead >
    <tr>
      <th scope="col">Staff_ID</th>
      <th scope="col">Staff_Name</th>
      <th scope="col">Module_Name</th>
      <th scope="col">Position</th>
      <th scope="col">Academic_Year</th>
      <th scope="col">Department</th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      
    </tr>
  </tbody>
</table>
   
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
