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

<br>
<div class="row">
        
         <div class="col-5">
         <div class="form-group">
         <label for="inputFirstName">First Name</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="First Name">
        </div>

        <div class="form-group">
         <label for="inputStaff_ID">Staff_ID</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Staff_ID">
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

        <label for="inputPosition">Position</label>
        <div>
        <select style="width:100%">
		    <option value="Position">Position</option>
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
         <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Address">
        </div>
        <div class="form-group">
         <label for="inputDate_of_birth">Date_of_birth</label>
        <input type="text" class="form-control" id="inputDate_of_birth" placeholder="DD/MM/YYYY">
        </div>
        <div class="form-group">
         <label for="inputNIC">NIC</label>
        <input type="text" class="form-control" id="inputNIC" placeholder="NIC">
        </div>
        <div class="form-group">
         <label for="inputDate_of_Join">Date_of_Join</label>
        <input type="text" class="form-control" id="inputDate_of_Join" placeholder="DD/MM/YYYY">
        </div>
        <div class="form-group">
         <label for="inputLeave_Date">Leave_Date</label>
        <input type="text" class="form-control" id="inputLeave_Date" placeholder="DD/MM/YYYY">
        </div>
        <div class="form-group">
         <label for="inputEPFNO">EPF NO</label>
        <input type="text" class="form-control" id="inputEPFNO" placeholder="EPF NO">
        </div>
        <label for="inputtype">Type</label>
        <div>
        <select style="width:100%">
        <option value="Type">Type</option>
        <option value="Permanent">Permanent </option>
        <option value=" Temporary"> Temporary</option>
        </select>
        </div>
     </div>
       <div class="col-5">
         <div class="form-group">
         <label for="inputLastName">Last Name</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Last Name">
        </div>
</div>
<div class="col-sm-2">
<div class="form-group mx-sm-3 mb-2 text-right">
    <label for="inputPassword2" class="sr-only">Student ID</label><br>
    <input type="text" class="form-control" id="inputPassword2" placeholder="Student ID"><br>
    <button type="submit" class="btn btn-primary mb-3">Search</button>
  </div>
  </div>
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->