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
<title>examinations</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.min.css">
<style>
</style>
</head>

<body>
   
<div class="row">
    <div class="col-sm-1 "> 
        <div class="input-group mb-12 ">
          
            <input type="text" class="form-control" placeholder="Search ID" aria-label="Recipient's username" aria-describedby="button-addon2">
            
          </div>
    </div>
    
    <div class="col-sm-2">
        <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01 md-2 "><i class="fas
          fa-swatchbook"></i>&nbsp;Payment Type</label>
        
            <select class="custom-select" id="inputGroupSelect01">
            <option selected>Choose...</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
            </select>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01 md-2 "><i class="fas
              fa-swatchbook"></i>&nbsp;Payment Type</label>
            
                <select class="custom-select" id="inputGroupSelect01">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                </select>
            </div>
      
    </div>

    <div class="col-sm-2">
        <div class="input-group-prepend">
          
            <div class="input-group-prepend">
            
            <label class="input-group-text" for="inputGroupSelect01"><i class="fas
            fa-swatchbook"></i>&nbsp;Department</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01">
            <option selected="">Choose...</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
            </select>
            </div>
       </div>

    <div class="col-sm-2"> 
        <div class="input-group-prepend">
            
            <label class="input-group-text" for="inputGroupSelect01"><i class="fas
              fa-swatchbook"></i>&nbsp;Start</label>
            <input type="date" class="form-control" placeholder="End date" >
        </div>

    </div>
    <div class="col-sm-2 ">
        <div class="input-group-prepend">
        
        <label class="input-group-text" for="inputGroupSelect01"><i class="fas
          fa-swatchbook"></i>&nbsp;End&nbsp;&nbsp;</label>
        <input type="date" class="form-control" placeholder="End date" >
    </div>
  </div>
  </div>


  <div class="row">
      <div class="col-sm-12 ">
  <div class="input-group-append col-sm-12">
      <button class="btn btn-outline-primary" type="button" id="button-addon2">Generate Report</button>
    </div>
  </div>
  </div>
</body>
	

    			
            
            

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->