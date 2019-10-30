 
<!--block 1 start dont change the order-->

<?php 
$title="SEARCH CUSTOMER|SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
  
    <!-- end dont change the order-->
<!--block 2 start my code here-->  
<?php
if(isset($_GET['search'])){
$id=$_GET['sear'];
$sql="SELECT distinct`food_order_details_food_order_id`as id,`food_order_user_name` as uname,food_name,food_name,`food_order_details_food_id` as fid,`food_order_details_food_qty`as qty,
(food_order_details_food_qty*food_order_details_unit_price) as price 
FROM `food_order`,food_order_details ,food
 where`food_order_details_food_order_id`=food_order_id and `food_order_details_food_id`=food_id and `food_order_details_food_order_id`=$id";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)==1)
{

  $row = mysqli_fetch_assoc($result);
  $fn= $row['food_name'];
   $iq= $row['qty'];
  $amt= $row['price'];
 
  $oid= $row['id'];
  
  $un= $row['uname'];
  

}
 
}




?>

<div class="shadow p-3 mb-5 bg-white rounded">

        <div class="highlight-blue">
            <div class="container">
                <div class="intro">
                    <h1 class="display-3 text-center">Daily orders</h1>
                    
                 

                </div>
            </div>
        </div>
    </div>
    <form class="form-inline" method="GET">
       

  
              <div class="form-group mx-sm-3 mb-2">
              <input class="form-control" type="text" name="sear" placeholder="Search by order Id" id="search">  
              <input class="btn btn-primary" type="submit" name="search" value="Search"> 
              </div>
              </form>

              

    <div class="mx-auto" >

<div class ="row">
<div class="col-9">
    <form  >
<div class="form-group p-3 mb-2 bg-light text-dark au_size  rounded">
<div class ="row">
  <div class ="col-3" >
    <p><h4>Order ID</h4></p>
  </div>
  <div class ="col-3" >
      <p><h4><?php echo $oid?></h4></p>
  </div>
</div>
<div class ="row">
  <div class ="col-3" >
    <p><h4>User name</h4></p>
  </div>
  <div class ="col-3" >
      <p><h4><?php echo $un?></h4></p></h4></p>
  </div>
</div>



<div class="row">

<div class="col-9">
 <table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">Item Name</th>
      <th scope="col">Item Qty</th>
      <th scope="col">Amount</th>
    
    </tr>
    <tr>
    <td><?php echo $fn ?></td>
    <td><?php echo $iq ?></td>
    <td><?php echo $amt ?></td>

    </tr>
  </thead>
  <tbody>

  </tbody>
</table>





</div>
</div>

 </div>

</form>
</div>
<div class="col-3">

<table class="table table-borderless">
  <thead>
    <tr>
<th scope="col">Item name</th>
<th scope="col">Item QTY</th>

    </tr>
  </thead>
  <tbody>
    <tr class="table-light" >
   
    </tr>
  </tbody>
</table>

<input class="btn btn-primary" type="submit" name="search" value="Check"> 
</div>
</div>
</div>
  
<!--block 3 start dont change the order-->

    <?php include_once("footer.php"); ?>

    
    <!-- end dont change the order-->