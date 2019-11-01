<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->  
<?php
if(isset($_POST["add_to_cart"]))
{
  
	if(isset($_COOKIE["shopping_cart"]))
	{
		$cookie_data = stripslashes($_COOKIE['shopping_cart']);

		$cart_data = json_decode($cookie_data, true);
	}
	else
	{
		$cart_data = array();
	}

	$item_id_list = array_column($cart_data, 'item_id');

	if(in_array($_POST["hidden_id"], $item_id_list))
	{
		foreach($cart_data as $keys => $values)
		{
			if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
			{
				$cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
			}
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_POST["hidden_id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$cart_data[] = $item_array;
	}

	
	$item_data = json_encode($cart_data);
	setcookie('shopping_cart', $item_data, time() + (86400 * 30));
        header("location:FoodOrders.php?success=1");
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		$cookie_data = stripslashes($_COOKIE['shopping_cart']);
		$cart_data = json_decode($cookie_data, true);
		foreach($cart_data as $keys => $values)
		{
			if($cart_data[$keys]['item_id'] == $_GET["id"])
			{
				unset($cart_data[$keys]);
				$item_data = json_encode($cart_data);
				setcookie("shopping_cart", $item_data, time() + (86400 * 30));
				header("location:FoodOrders.php?remove=1");
			}
		}
	}
	if($_GET["action"] == "clear")
	{
		setcookie("shopping_cart", "", time() - 3600);
		header("location:FoodOrders.php?clearall=1");
	}
}

if(isset($_GET["success"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible">
	  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	Item Added into Cart
	</div>
	';
}

if(isset($_GET["remove"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Item removed from Cart
	</div>
	';
}
if(isset($_GET["clearall"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Your Shopping Cart has been clear...
	</div>
	';
}

?>


<?php

$title = "Home | SLGTI";

 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER--> 




<!--BLOCK#2 START YOUR CODE HERE -->

<!-- FOOD ORDER  -->

<?php
$username=$foodid=$foodqty=$foodunitprice=null;
if(isset($_POST['Order'])){
  
$username=$_SESSION['user_name'];


$sql="INSERT INTO `food_order`( `food_order_user_name`, `food_order_status`)
 VALUES ('$username','Pending')";
//  $sql.="INSERT INTO `food_order_details`( `food_order_details_food_id`, `food_order_details_food_qty`, `food_order_details_unit_price`) 
//  VALUES ('fd001','10','15')";

 if(mysqli_query($con,$sql)){
            
        $sql1="SELECT  food_order_id from food_order WHERE food_order_user_name='$username'";
        $result=mysqli_query($con,$sql1);
      if(mysqli_num_rows($result)==1){
          $row=mysqli_fetch_assoc($result);
          
             $orderid=$row['food_order_id'];

            $sql2="INSERT INTO `food_order_details`(`food_order_details_food_order_id`, `food_order_details_food_id`, `food_order_details_food_qty`, `food_order_details_unit_price`)
             VALUES ('$orderid','','','')";
             if(mysqli_query($con,$sql2)){
                 echo "success";

             }
        //      echo ' <div class="s alert-dismissible fade show" role="alert">
        //      <strong>'.$orderid.'</strong> Order ID
        //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //     <span aria-hidden="true">&times;</span>
        //   </button>
        //  </div>   ';
        }
        
    }
    else{
        echo "Error".$sql."<br>".mysqli_error($con);
     }
}
?>



 <!-- FOOD MENU DESIGN    -->
    <div class="row shadow  p-3 mt-1 bg-info text-white">
    <div class="col-sm-12 col-md-4 col-lg-9">
    <h1 class="text-center">EAT GOOD FEEL GOOD</h1>
    </div>
    </div>



 <div class="row">

  <div class="col-sm-8">

    <div class="card">
      <div class="card-body"> 
        <p class="card-text">
        
        
        
        <div class ="row">
          <div class="row pl-3 pt-4 ">
            <em><h1 class="display-5">FOOD MENU</h1></em>
            
        </div>

        <div class="row">


        <?php
        $sql = 'call food()';
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result)>0){
            while ($row = mysqli_fetch_assoc($result)){

                $fdname=$row ["food_name"];
                $uqty=$row ["food_unit_qty"];
                $mea=$row ["food_measurements"];
                $pri=$row ["food_unit_price"];
                $id=$row ["food_id"];
                $img=$row ["food_img"];
                $type=$row ["available_time"];
                ?>
               
                <div class="col-md-3"> 
                <div class="card">
                <p class="card-text"><h3><?php echo $type; ?></h3></p>
                <img src="docs/canteen/<?php echo $img;?>" class="card-img-top" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title"><?php echo $fdname;?> <a href="#" class="badge badge-info"><?php echo $uqty.'-'.$mea; ?> </a>
                <p class="card-text"> Rs <?php echo $pri; ?></p>
                
                <form method="POST" action="#"> 
                <div class="row">

                <?php if($id=="fd004"){?>
                    <div class="col-md-8"><input type="number"  min=0.5  step="any" name="quantity" class="form-control"  id="validationDefault05" placeholder="QTY"  required></div>
                <?php }

                else{?>
                <div class="col-md-8"><input type="number"  min=1   name="quantity" class="form-control"  id="validationDefault05" placeholder="QTY"  required></div>
               <?php }?>


                <div class="col-md-4"><button type="submit" name="add_to_cart"  class="btn btn-primary" value="ADD"><i class="fas fa-cart-plus"></i></i> </button></div>
                </div>  
                
                
                </div>
                </div>
                </div>          
                
                                
                <input type="hidden" name="qty" value="<?php echo $uqty,$mea  ?>" class="form-control"readonly />
                <input type="hidden" class="form-control"  name="hidden_name" value="<?php echo $fdname ?>"readonly /> 
                <input type="hidden" class="form-control"  name="hidden_price" value="<?php echo $pri ?>"readonly/>
                <input type="hidden" class="form-control"  name="hidden_id" value="<?php echo $id  ?>" />

                                    
                                 
                </form>
                <?php
                }
            }
            else{
                echo "0 results";
                }
        ?>
                </div>  
                  </div>   
                 </div>     
                 </div>    
             </div>         

 <div class="col-sm-4">
    <div class="card">
      <div class="card-body"><table class="table">
                <thead class="thead-dark">
                    <tr>
                        
                        <th><p class="h8">ITEM NAME</p></th>
                        <th><p class="h8">QTY</p></th>
                        <th><p class="h8">PER AMOUNT</p></th>
                        <th><p class="h8">TOTAL AMOUNT</p></th>
                        <th><p class="h8">ACTION</p></th>
                    </tr>
                 </thead>
                 <?php
			if(isset($_COOKIE["shopping_cart"])) 
			{
				$total = 0;
				$cookie_data = stripslashes($_COOKIE['shopping_cart']);
				$cart_data = json_decode($cookie_data, true);
				foreach($cart_data as $keys => $values)
				{
			?>
				<tr>
					<td><?php echo $values["item_name"]; ?></td>
					<td><?php echo $values["item_quantity"]; ?></td>
					<td>Rs <?php echo $values["item_price"]; ?></td>
					<td>Rs <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
					<td><a href="FoodOrders.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
				</tr>
			<?php	
					$total = $total + ($values["item_quantity"] * $values["item_price"]);
                }
			?>
				
			<?php
			}
			else
			{
				echo '
				<tr>
					<td colspan="5" align="center">No Item in Cart</td>
				</tr>
				';
			}
			?>
               
                   
                   </table>
        <h6 class="card-title"> 
        <div class="row pt-5">
        <div class="col-sm-12 col-md-4 col-lg-9 container">  
             </div>
</h6>
        <p class="card-text">



  </div>
</div>
 
 
 
 <!-- ORDE CART DESIGN  -->
  
   
                
                
                
                
                <div class="card-body">

                    <!-- <div class="row">
                        <div class="col">
                            <p>Order ID</p>
                        </div>
                        <div class="col">
                            <p></p>
                        </div>
                    </div> -->
                    
                    <div class="row">
                        <div class="col">
                            <p><h2>Total</h2></p>
                        </div>
                        <div class="col">
                            <p><h2>Rs <?php echo number_format($total, 2); ?></h2></p>
                        </div>
                    </div>
                    
                    <form method="POST" action="#"> 
                    <div class="row">
                        <button type="submit" class="btn btn-success w-100" role="button" aria-pressed="true" value ="Order" name="Order" ><h2><i class="fas fa-cart-plus"></i></i> Order Now</h2></button></a>
                    
                    </div>
                    </form>

                </div>
            </div>      
        </div>
    </div>


   
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER--