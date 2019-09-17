 
<!--block 1 start dont change the order-->

<?php 
$title="View order | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
  
    <!-- end dont change the order-->
<!--block 2 start my code here-->  




<div class ="row">
<div class="col-4"><h1>Order Information</h1></div>
<div class="col-4"><input type="search" class="form-control ds-input" id="search-input" placeholder="Search..."
 aria-label="Search for..." autocomplete="off" data-docs-version="4.3" 
spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0"
 dir="auto" style="position: relative; vertical-align: top;"></div>
 <div class="col-4"><button type="button" class="btn btn-success">Go</button></div>
 <table class="table table-borderless">
  <thead>
    <tr>
    
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Order Number</th>
      <td>15</td>
      
    </tr>
    <tr>
      <th scope="row">User Name</th>
      <td>ABDULLAh</td>
      
    </tr>
    
  </tbody>
</table>
<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">Item Name</th>
      <th scope="col">Item Qty</th>
      <th scope="col">Amount</th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Pittu</th>
      <td>10</td>
      <td>600</td>
   
    </tr>
    <tr>
      <th scope="row">Idiyappam</th>
      <td>7</td>
      <td>420</td>
     
    </tr>
    <tr>
      <th scope="row"></th>
      <td colspan="1" class="text-white bg-dark"><h5>Total Amount<h5></td>
      <td  class="text-white bg-dark"><h5>1020<h5></td>
    </tr>
  </tbody>
</table>




















</div>

    
  
<!--block 3 start dont change the order-->

    <?php include_once("footer.php"); ?>

    
    <!-- end dont change the order-->