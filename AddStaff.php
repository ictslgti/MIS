<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<!-- Add staff design  -->

<div class="row">
    <div class="col form-group  container p-3 mb-2 " >
        <h1 class=" text-center  "><i class="fas fa-file-alt"></i>   STAFF DETAILS</h1>
    </div>
</div>

<div class="row">
    <div class=" col-sm-8">
        <p style="font-size: 45px; font-weight: 700; ">Personal Information</p>
    </div>

    <div class="col-sm-3"> 
      <form class="form-inline">
        <input class="form-control mr-2" type="search" placeholder="Staff ID" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
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
      <div class="row">
        <div class="col">
          <label for="text" class="font-weight-bolder" >Staff_ID :</label>
          <input type="text" class="form-control" placeholder="Staff_ID" >
        </div>
      </div>
  </div>
</form>
    
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
