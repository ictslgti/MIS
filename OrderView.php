 
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
                    <h1 class="display-3 text-center">Order Summary</h1>
                    
                 

                </div>
            </div>
        </div>
    </div>


    <div class="mx-auto" >
 
  
<form  >
<div class="form-group p-3 mb-2 bg-light text-dark au_size  rounded">
<div class ="row">
  <div class ="col-3" >
    <p><h4>OrderID</h4></p>
  </div>
  <div class ="col-3" >
      <p><h4>

      <?php
    $sql="SELECT `food_order_details_food_order_id` FROM `food_order_details`";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
        echo '   
        <tr>
            <td>'.$row["food_order_details_food_order_id"].'</td>
       ';
        }
    }
    else {
        echo "0 results";
    }
    ?>

</h4></p>
  </div>
</div>
<div class ="row">
  <div class ="col-3" >
    <p><h4>User name</h4></p>
  </div>
  <div class ="col-3" >
      <p><h4>
      <?php
    $sql="SELECT `user_name` FROM `user` WHERE user_id=1";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
        echo '   
        <tr>
            <td>'.$row["user_name"].'</td>
          ';
        }
    }
    else {
        echo "0 results";
    }
    ?></h4></p>
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
      <th scope="row"></th>
      <td></td>
      <td></td>
   
    </tr>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
     
    </tr>
    <tr>
      <th scope="row"></th>
      <td colspan="1"><h5><h5></td>
      <td ><h5><h5></td>
    </tr>
  </tbody>
</table>



</div>
</div>
    <div class="row">
    
    <div class="col"><a href="FoodOrders" button type="button" class="btn btn-info">Back to Order</button></a></div>
    


    
    </div>
 </div>
</form>

</div>

<!-- Button trigger modal -->

  
<!--block 3 start dont change the order-->

    <?php include_once("footer.php"); ?>

    
    <!-- end dont change the order-->