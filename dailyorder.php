 
<!--block 1 start dont change the order-->

<?php 
$title="SEARCH CUSTOMER| SLGTI";
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
                    <h1 class="display-3 text-center">Daily orders</h1>
                    
                 

                </div>
            </div>
        </div>
    </div>
    <form class="form-inline">
   
   
   

  
  <div class="form-group mx-sm-3 mb-2">
  <input class="form-control" type="text" placeholder="Search by order Id">   
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
      <p><h4>
      <?php 
      $sql ="SELECT DISTINCT`food_order_details_food_order_id`,`user_name`, `food_name`,`food_order_details_food_qty`,`food_order_details_food_qty`*`food_order_details_unit_price`
 AS amount FROM `food`,`user`,`food_order_details` ,`food_order`WHERE `food_order_details_food_id`=`food_id` AND`food_order_id`=1
";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
 while($row=mysqli_fetch_assoc($result)){
echo '<tr>

    <td>' . $row["food_order_details_food_order_id"].'</td>
  
    
    
    </tr>';
 }}
 else{


 }
 ?></h4></p>
  </div>
</div>
<div class ="row">
  <div class ="col-3" >
    <p><h4>User name</h4></p>
  </div>
  <div class ="col-3" >
      <p><h4><?php 
      $sql ="SELECT DISTINCT`food_order_details_food_order_id`,`user_name`, `food_name`,`food_order_details_food_qty`,`food_order_details_food_qty`*`food_order_details_unit_price`
 AS amount FROM `food`,`user`,`food_order_details`,`food_order` WHERE `food_order_details_food_id`=`food_id` AND`food_order_id`=2
";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
 while($row=mysqli_fetch_assoc($result)){
echo '<tr>

    <td>' . $row["user_name"].'</td>
  
    
    
    </tr>';
 }}
 else{


 }
 ?></h4></p></h4></p>
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
  </thead>
  <tbody>
  <?php
$sql ="SELECT DISTINCT`food_order_details_food_order_id`,`user_name`, `food_name`,`food_order_details_food_qty`,`food_order_details_food_qty`*`food_order_details_unit_price`
 AS amount FROM `food`,`user`,`food_order_details`,`food_order` WHERE `food_order_details_food_id`=`food_id` AND`food_order_id`=1
";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
 while($row=mysqli_fetch_assoc($result)){
echo '<tr>

    <td>' . $row["food_name"].'</td>
    <td>' . $row["food_order_details_food_qty"].'</td>
    <td>' . $row["amount"].'</td>
    
    </tr>';
 }}
 else{


 }
 ?>
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
<?php
$sql ="SELECT food_name ,(food_order_details_food_qty) as QTY FROM food,food_order_details WHERE food_order_details_food_id = food_id";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
 while($row=mysqli_fetch_assoc($result)){
echo '<tr>
    <td>' . $row["food_name"].'</td>
    <td>' . $row["QTY"].'</td>
    
    </tr>';
 }}
 else{


 }
 ?>
    </tr>
  </thead>
  <tbody>
    <tr class="table-light" >
   
    </tr>
  </tbody>
</table>

</div>
</div>
</div>
  
<!--block 3 start dont change the order-->

    <?php include_once("footer.php"); ?>

    
    <!-- end dont change the order-->