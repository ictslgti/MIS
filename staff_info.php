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
<h1 class="text-center">STAFF ENROLLMENT</h1><br>
<form >
<div  class="row">  
         <div class="col-4">
         <div class="form-row align-items-center">
       <label for="inputFirstName">Staff_ID</label>
       <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Staff_ID</label>
       <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Choose...</option>
            <option ></option>
      </select>
     </div><br>
     <div class="form-row align-items-center">
       <label for="inputFirstName">Module_ID</label>
       <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Module_ID</label>
       <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Choose...</option>
      </select>
    </div><br>
    <div class="form-row align-items-center">
       <label for="inputFirstName">Course_ID</label>
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
    <button type="submit" class="btn btn-primary"  style="width:100%">ADD STAFF INFORMATION</button>
   
  
</form>

  </div>
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->