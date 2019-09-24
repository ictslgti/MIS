 
<!--block 1 start dont change the order-->

<?php 
$title="View order | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
  
    <!-- end dont change the order-->
<!--block 2 start my code here-->  


<div class="shadow p-3 mb-5 bg-white rounded">

        <div class="highlight-blue">
            <div class="container">
                <div class="intro">
                    <h1 class="display-8 text-center">Order Information</h1>
                    
                 

                </div>
            </div>
        </div>
    </div>
<form>
<div class="form-group container p-3 mb-2 bg-light text-dark border border-primary rounded">
<div class ="row">
<div class ="col"   >
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
 </div >
</div>



<div class="row">

<div class="col">
 <table class="table table-bordered">
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
      <td colspan="1"><h5>Total Amount<h5></td>
      <td ><h5>1020<h5></td>
    </tr>
  </tbody>
</table>





</div>
</div>
    <div class="row">
    
    <div class="col"><button type="button" class="btn btn-outline-primary">Back</button></div>
    
    
    
    </div>
 </div>
</form>


  
<!--block 3 start dont change the order-->

    <?php include_once("footer.php"); ?>

    
    <!-- end dont change the order-->