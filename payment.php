<?php
$title="payment |SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!-- dont change -->


<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>examinations</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.min.css">
    <style>
      
    </style>
</head>

<body>
<h1 class="text-center">SLGTI Payment Portal</h1>

<br>
<div class="row">

<div class="col-sm-7"></div>
<div class="col-sm-3">
<div class="form-group mx-sm-3 mb-2 text-right">
    <label for="inputPassword2" class="sr-only">Student ID</label>
    <input type="text" class="form-control" id="inputPassword2" placeholder="Student ID">
    <button type="submit" class="btn btn-primary mb-2">Search</button>
  </div>
  </div>
  
  </div>







        <div class="row">
        <div class="col-sm-4">
        <img src="img/Payment.png" class="img-fluid" alt="Responsive image">
        </div>
        <div class="col-sm-4">
        <form>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Name">
    </div>
    <div class="form-group col-md-12">
    <label for="inputEmail4">Department</label>
      <input type="Department" class="form-control" id="inputEmail4" placeholder="Department">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Address">
  </div>
  <div class="form-group">
  <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
  </div>
  
    <div class="form-group ">
      <label for="inputCity">Phone</label>
      <input type="phonenumber" class="form-control" id="inputCity"placeholder="Phone Number">
    </div>
    <div class="form-group ">
    <label for="inputEmail4">Hostal Info</label>
      <input type="HostalInfo" class="form-control" id="inputEmail4" placeholder="Hostal Info">
        
    </div>
    
  
  
  
</form>
        </div>
        
        <div class="col-sm-4">
        
                                   
        
        </div>
     </div>
     <div class="row">
     <div class="col-sm-3">
     <div class="form-group">
      <label for="inputEmail4">Amount</label>
      <input type="Amount" class="form-control" id="inputEmail4" placeholder="Amount">
    </div>

    <div class="form-group">
      <label for="inputEmail4">Reason</label>
      <input type="Reason" class="form-control" id="inputEmail4" placeholder="Reason">
    </div>


     </div>
     <div class="col-sm-5"></div>
     <div class="col-sm-4">
     <button type="button" class="btn btn-primary">Clear</button>
      <button type="button" class="btn btn-secondary">Daily Report</button>
      <button type="button" class="btn btn-success">Pay&Print</button>
      <button type="button" class="btn btn-danger">Close</button>
     </div>
     </div>

     </div>
 <!-- dont change -->
 <?php
    include_once("footer.php");
    ?>
    </body>
    </html>