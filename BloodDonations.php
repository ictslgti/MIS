<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->



<h1 class="text-center">Donor Details</h1>
<br>

<div class="row">

<div class="col-sm-6 " ></div>
<div class="col-sm-3 " > 
<form class="form-inline md-form form-sm mt-4">
  <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="text" placeholder="Search_date" aria-label="Search"id="search"> 
  <i class="fas fa-search ml-3" aria-hidden="true"></i>
</form>
</div>
</div>




         <div class="row">   
         <div class="col-12">
         <form>
         <p style="font-size:20px;"> Donation_Info <hr color ="black" style="height:1px;"></p><br>
         </form>
</div>
</div>

<table class="table">
  <thead class="thead-r">
    <tr>
      <th scope="col"><i class="fas fa-calendar-alt"></i>&nbsp;Date</th>
      <th scope="col"><i class="fas fa-tasks"></i>&nbsp;Programme</th>
      
    </tr>
  </thead>
  </table>


  <button type="submit" class="btn btn-danger"  ><i class="fas fa-backspace"></i>&nbsp;&nbsp;cancel</button>




<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->