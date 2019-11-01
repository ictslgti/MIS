<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<!-- delete coding -->



<!-- search coding -->


<div class="row">
    <div class=" col-sm-8">
        <p style="font-size: 45px; font-weight: 700; "> Inventory Reprt</p>
    </div>

    <div class="col-sm-3 pt-4"> 
      <form class="form-inline" method="GET">
        <input class="form-control mr-2" type="search" name="edit" placeholder="Inventory_Id">  
        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
      </form>
    </div>  
</div>

<div class="row">
  <div class="col-sm-12" >
    <hr color ="black" style="height:1px;">
  </div>
</div>  

<table class="table">
  <thead class="thead-r">
    <tr>
      <th scope="col">INVENTORY ID</th>
      <th scope="col">DEPARTMENT ID</th>
      <th scope="col">ITEM ID</th>
      <th scope="col">STATAUS</th>
      <th scope="col">QUANTITY</th>
      <th scope="col">ACTION</th>
      
    </tr>
    
</table>

<div class="row">
<div class="col-6"></div>
<div class="col-3"></div>
<div class="col-2"></div>

<div class="col-md- col-sm- form-group pl- pr-container">
<button type="submit" class="btn btn-primary ml-2 mt-3 float-right "  onclick="location.href='AddInventory.php'">back </button>
              </div>
    
     </div> 
</div>


<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
