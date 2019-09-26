 
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
                    <h1 class="display-3 text-center">Order Information</h1>
                    
                 

                </div>
            </div>
        </div>
    </div>


    <div class="mx-auto" >
 
  
<form  >
<div class="form-group p-3 mb-2 bg-light text-dark au_size  rounded">
<div class ="row">
  <div class ="col-3" >
    <p><h4>Order ID</h4></p>
  </div>
  <div class ="col-3" >
      <p><h4>15</h4></p>
  </div>
</div>
<div class ="row">
  <div class ="col-3" >
    <p><h4>User name</h4></p>
  </div>
  <div class ="col-3" >
      <p><h4>Abdullah</h4></p>
  </div>
</div>



<div class="row">

<div class="col-9">
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
    
    <div class="col"><a href="FoodOrders" button type="button" class="btn btn-outline-primary">Back</button></a></div>
    
    
    
    </div>
 </div>
</form>

</div>
  
<!--block 3 start dont change the order-->

    <?php include_once("footer.php"); ?>

    
    <!-- end dont change the order-->