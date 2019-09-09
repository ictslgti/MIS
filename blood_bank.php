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
<h1 class="text-center">Donor Request Form</h1>
<br>
<br>

<div class="row">
<div class="col-4">
        
         </div>

         <div class="col-4">
         <form>
    <div class="form-group row">
    <label for="inputDid" class="col-3 col-form-label">D_ID</label>
    <div class="col-9">
      <input type="D_ID" class="form-control" id="inputEmail3">
      
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-3">Designation</div>
    <div class="col-sm-5">
    <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
           Staff
          </label>
        </div>
      <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            Student
          </label>
        </div>
    </div>
  </div>


  <div class="form-group row">
    <label for="inputPassword3" class="col-3 col-form-label">Reference_id</label>
    <div class="col-9">
      <input type="text" class="form-control" id="inputtext" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputDid" class="col-3 col-form-label">Joint_date</label>
    <div class="col-9">
      <input type="D_ID" class="form-control" id="inputEmail3">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Join</button>
    </div>
  </div>
</form>
       
        

        
       </div>
     <div class="col-4">
     

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->