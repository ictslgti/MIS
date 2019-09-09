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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>staff</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.min.css">
    <style>
      
    </style>
</head>
<body>
<h1 class="text-center">STAFF DETAILS</h1>

<div class="row">
<p >
<div class="col-sm-6" > </div>
<div class="col-sm-6" > 
<form class="form-inline md-form form-sm mt-4">
 
  <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="text" placeholder="Search_Staff_ID" aria-label="Search"id="search"> 
  <i class="fas fa-search ml-3" aria-hidden="true"></i>
  
</div>
</p>
</div>
<br><br>
<div class="row">
            
         <div class="col-sm-12 and col-md-12 ">
         <div class="form-group">
         <label for="inputStaff_ID">Staff_ID</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Staff_ID">
        </div>
        </div>
      
         <div class="col-sm-6 ">
         <div class="form-group">
         <label for="inputNIC">NIC</label>
        <input type="text" class="form-control" id="inputNIC" placeholder="NIC">
        </div>
         <div class="form-group">
         <label for="inputFirstName">First Name</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="First Name">
        </div>

        <label for="inputFirstName">Gender</label><br>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
        <label class="form-check-label" for="inlineRadio1">Male</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
        <label class="form-check-label" for="inlineRadio2">Female</label>
        </div><br><br>
        <div class="form-group">
         <label for="inputFirstName">E-mail</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="E-mail">
        </div><br>
        
        <div class="form-row align-items-center">
     <label for="inputFirstName">Position</label><br>
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
    
        <div class="form-group">
         <label for="inputDate_of_Join">Date_of_Join</label>
        <input type="text" class="form-control" id="inputDate_of_Join" placeholder="DD/MM/YYYY">
        </div>
        <button type="submit" class="btn btn-primary"  style="width:100%">ADD STAFF DETAILS</button>
     </div>
       <div class="col-sm-6 S">
       <div class="form-group">
         <label for="inputEPFNO">EPF NO</label>
        <input type="text" class="form-control" id="inputEPFNO" placeholder="EPF NO">
        </div>
        <div class="form-group">
         <label for="inputLastName">Last Name</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Last Name">
        </div>
       
        <div class="form-group">
         <label for="inputNIC">Telephone number</label>
        <input type="text" class="form-control" id="inputNIC" placeholder="Telephone_number">
        </div>
        <div class="form-group">
         <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Address">
        </div>
        <div class="form-row align-items-center">
       <label for="inputFirstName">Type</label>
       <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Type</label>
       <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Choose...</option>
            <option value="Permanent Staff">Permanent Staff</option>
            <option value="Temporary  Staff">Temporary  Staff</option>
      </select>
    </div><br>
    <div class="form-group">
         <label for="inputDate_of_birth">Date_of_birth</label>
        <input type="text" class="form-control" id="inputDate_of_birth" placeholder="DD/MM/YYYY">
        </div>
</div>
</form>

  </div>
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->