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
    <h1 class=" text-center  "><i class="fas fa-file-alt"></i>   STAFF DETAILS</h1>
    </div>
   </div>


   <div class="row">

<div class=" col-sm-6 mt-4">
<p style="font-size: 20px; font-weight: 700; ">Personal Information</p>
</div>
<div class="col-sm-3 " > 
<form class="form-inline md-form form-sm mt-4 ">

  <input class="form-control form-control-sm ml-3 w-65 rounded-pill" type="text" placeholder="Search_Student_ID" aria-label="Search"id="search"> 
  <i class="fas fa-search ml-3 " aria-hidden="true"></i> 
</form>
</div>
</div>
<div class="row">
<div class="col-sm-12" >
<hr color ="black" style="height:1px;">
</div>
</div>

<form>
<div class="form-row">
    <div class="col-4" >
    <br>
     
      <label for="text" class="font-weight-bolder" >Staff_ID :</label><br>
      <input type="text" class="form-control" placeholder="Staff_ID" ><br>
     
      <label for="text" class="font-weight-bolder"  >Staff_Name :</label><br>
      <input type="text" class="form-control" placeholder="Full Name"><br>

      <label for="text" class="font-weight-bolder"  >Gender :</label><br>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
        <label class="form-check-label" for="inlineRadio1">Male</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
        <label class="form-check-label" for="inlineRadio2">Female</label>
        </div><br><br>
         
    <label for="text" class="font-weight-bolder"  >Date_of_Join :</label><br>
       <input type="text" class="form-control" placeholder="Date_of_Join"><br> 
        
    </div>

    <div class="col-4" >
    <br>
     
      <label for="text" class="font-weight-bolder" >EPF NO :</label><br>
      <input type="text" class="form-control" placeholder="EPF NO" ><br>

      <label for="text" class="font-weight-bolder" >Address :</label><br>
      <input type="text" class="form-control" placeholder="Address" ><br>
     
      <label for="text" class="font-weight-bolder"  >Date_of_birth</label><br>
      <input type="text" class="form-control" placeholder="DOB"><br>

      <label for="text" class="font-weight-bolder"  >Position :</label><br>
     <div class="form-row align-items-center">
      <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Position</label>
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Choose...</option>
            <option value="Director">Director</option>
            <option value="Deputy Principal (Academics)">Deputy Principal (Academics)</option>
            <option value="Deputy Principal (Industrial)">Deputy Principal (Industrial)</option>
            <option value="Registrar">Registrar</option>
			<option value="Accountant">Accountant</option>
            <option value="Head of Department">Head of Department</option>
            <option value="Lectures">Lectures</option>
            <option value="HoD Industrial Relations">HoD Industrial Relations</option>
            <option value="Management Assistants">Management Assistants</option>
			<option value="Human Resource Officer">Human Resource Officer</option>
			<option value="IT System Analyst">IT System Analyst</option>
			<option value="Premises Officer">Premises Officer</option>
			<option value="Quality Management">Quality Management</option>
			<option value="Student Affairs Officer">Student Affairs Officer</option>
			<option value="Warden">Warden</option>
      </select>
    </div><br>
    </div>

    <div class="col-4" >
    <br>
     
      <label for="text" class="font-weight-bolder" >NIC :</label><br>
      <input type="text" class="form-control" placeholder="NIC" ><br>

     
      <label for="text" class="font-weight-bolder"  >Email :</label><br>
    <input type="text" class="form-control" placeholder="Email " ><br>
   
      <label for="text" class="font-weight-bolder"  >Telephone no :</label><br>
      <input type="text" class="form-control" placeholder="Telephone no"><br>
    <div class="form-row align-items-center">
       <label for="text" class="font-weight-bolder"  >Type :</label><br>
       <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Type</label>
       <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Choose...</option>
            <option value="Permanent Staff">Permanent Staff</option>
            <option value="Temporary  Staff">Temporary  Staff</option>
      </select>
    </div><br> 
    </div>
    </div><br><br>
    <button type="submit" class="btn btn-outline-primary">ADD STAFF </button>
    <button type="button" class="btn btn-outline-primary">UPDATE STAFF</button>
    <button type="button" class="btn btn-outline-primary">DELETE STAFF</button>
    <button type="button" class="btn btn-outline-primary">EDIT STAFF</button>
    <button type="button" class="btn btn-outline-primary">REFRESH STAFF</button>
    
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->