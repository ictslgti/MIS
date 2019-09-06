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
        <div class="col-3">
        <img src="img/our-staff.png" class="img-fluid" alt="Responsive image">
         </div>
         <div class="col-3">
         <div class="form-group">
         <label for="inputAddress">First Name</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="First Name">
        </div>
        <div class="form-group">
         <label for="inputAddress">Staff_ID</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Staff_ID">
        </div>
        <label for="inputAddress">Position</label>
        <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Position
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <button class="dropdown-item" type="button">Action</button>
          <button class="dropdown-item" type="button">Another action</button>
          <button class="dropdown-item" type="button">Something else here</button>
          <button class="dropdown-item" type="button">Action</button>
          <button class="dropdown-item" type="button">Another action</button>
          <button class="dropdown-item" type="button">Something else here</button>
          <button class="dropdown-item" type="button">Action</button>
          <button class="dropdown-item" type="button">Another action</button>
          <button class="dropdown-item" type="button">Something else here</button>
        </div>
      </div>
       </div>
       <div class="col-3">
         <div class="form-group">
         <label for="inputAddress">Last Name</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Last Name">
        </div>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->