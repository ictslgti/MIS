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





<div class="row shadow  p-3 mt-1 bg-info text-white">
    <div class="col-sm-12 col-md-4 col-lg-9">
        <h1 class="text-center">EAT GOOD FEEL GOOD</h1>
    </div>
</div>

 <!-- FOOD MENU DESIGN    -->

 <div class="row">
  <div class="col-sm-8">
    <div class="card">
      <div class="card-body">
        
        <p class="card-text"><div class ="row">
  <div class="row pl-3 pt-4 ">
            <em><h1 class="display-5">Morning Fare</h1></em>
        </div>
        <div class="row">
            <div class="col-md-3">           
                <div class="card" >
                    <div class="row">
                        <div class="col pl-3">
                            <img class="card-img" src="img/Itli.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-1">   
                                <?php
                                $sql = "SELECT * FROM `food` WHERE `food_id`='fd001'";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result)>0){
                                    while ($row = mysqli_fetch_assoc($result)){

                                        $idly=$row ["food_name"];
                                        $uqty=$row ["food_unit_qty"];
                                        $mea=$row ["food_measurements"];
                                        $pri=$row ["food_unit_price"];
                                        $id=$row ["food_id"];
                                        }
                                    }
                                    else{
                                        echo "0 results";
                                        }
                                ?>
                                    </h4>
                                <form method="POST" action="#">   
                                 <div class="pb-1" style="max-width: 4rem;">
                                    <input type="text" name="qty" value="<?php echo $uqty, $mea  ?>" class="form-control"readonly />
						            <input type="text" class="form-control"  name="hidden_name" value="<?php echo $idly ?>"readonly /> 
						            <input type="text" class="form-control"  name="hidden_price" value="<?php echo $pri ?>"readonly/>
						            <input type="hidden" class="form-control"  name="hidden_id" value="<?php echo $id  ?>" />
                                    <input type="text" name="quantity" class="form-control"  id="validationDefault05" placeholder="QTY"  required>
                                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-info" value="ADD" />
                                 </div>   
                                 
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div> 


            <div class="col-sm-12 col-md-6 col-lg-3 container">           
                <div class="card">
                    <div class="row">
                        <div class="col pl-3">
                            <img class="card-img-top" src="img/rotti.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-1"> 
                                    
                                             <?php
                                            $sql = "SELECT * FROM `food` WHERE `food_id`='fd002'";
                                            $result = mysqli_query($con, $sql);
                                            if (mysqli_num_rows($result)>0){
                                                while ($row = mysqli_fetch_assoc($result)){

                                                    $rotti=$row ["food_name"];
                                                    $uqty=$row ["food_unit_qty"];
                                                    $mea=$row ["food_measurements"];
                                                    $pri=$row ["food_unit_price"];
                                                    $id=$row ["food_id"];
                                                    }
                                                }
                                            else{
                                            echo "0 results";
                                            }
                                            ?> 
                                </h4> 
                                <form method="POST" action="#">   
                                 <div class="pb-1" style="max-width: 4rem;">
                                    <input type="text" name="quantity" value="<?php echo $uqty ,$mea  ?>" class="form-control"readonly />
						            <input type="text" class="form-control"  name="hidden_name" value="<?php echo $rotti ?>" readonly/>
						            <input type="text" class="form-control"  name="hidden_price" value="<?php echo $pri ?>"readonly />
						            <input type="hidden" class="form-control"  name="hidden_id" value="<?php echo $id  ?>" />
                                    <input type="text" name="quantity" class="form-control"  id="validationDefault05" placeholder="QTY"  required>
                                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-info" value="ADD" />
                                 </div>   
                                 </div>
                                </div>
                            </div>  
                             </form>  
                        </div>
                    </div>
        



            <div class="col-sm-12 col-md-6 col-lg-3 container">           
                <div class="card">
                    <div class="row">
                        <div class="col pl-3">
                            <img class="card-img-top" src="img/idiappam.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-1"> 

                         <?php
                        $sql = "SELECT * FROM `food` WHERE `food_id`='fd003'";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result)>0){
                            while ($row = mysqli_fetch_assoc($result)){
                                $stringhoppers=$row ["food_name"];
                                $uqty=$row ["food_unit_qty"];
                                $mea=$row ["food_measurements"];
                                $pri=$row ["food_unit_price"];
                                $id=$row ["food_id"];
                                }
                            }
                        else{
                        echo "0 results";
                        }
                        ?> 
                        </h4>
                        <form method="POST" action="#">   
                                 <div class="pb-1" style="max-width: 4rem;">
                                    <input type="text" name="quantity" value="<?php echo $uqty,$mea  ?>" class="form-control" readonly/>
						            <input type="text" class="form-control"  name="hidden_name" value="<?php echo $stringhoppers ?>"readonly />
						            <input type="text" class="form-control"  name="hidden_price" value="<?php echo $pri ?>" readonly/>
						            <input type="hidden" class="form-control"  name="hidden_id" value="<?php echo $id  ?>" />
                                    <input type="text" name="quantity" class="form-control"  id="validationDefault05" placeholder="QTY"  required>
                                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-info" value="ADD" />
                                 </div>   
                                 </div>
                                </div>
                            </div>  
                             </form>  
                        </div>
                    </div>
        


            <div class="col-sm-12 col-md-6 col-lg-3 container">           
                <div class="card">
                    <div class="row">
                        <div class="col pl-3">
                            <img class="card-img-top" src="img/bread.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-1">

                                <?php
                        $sql = "SELECT * FROM `food` WHERE `food_id`='fd004'";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result)>0){
                            while ($row = mysqli_fetch_assoc($result)){
                                $Bread=$row ["food_name"];
                                $uqty=$row ["food_unit_qty"];
                                $mea=$row ["food_measurements"];
                                $pri=$row ["food_unit_price"];
                                $id=$row ["food_id"];
                                }
                            }
                        else{
                        echo "0 results";
                        }
                        ?>
                        </h4>
                        <form method="POST" action="#">   
                                 <div class="pb-1" style="max-width: 4rem;">
                                    <input type="text" name="quantity" value="<?php echo $uqty ,$mea  ?>" class="form-control" readonly/>
                                    <input type="text" class="form-control"  name="hidden_name" value="<?php echo $Bread?>" readonly/>
                                    <input type="text" class="form-control"  name="hidden_price" value="<?php echo $pri ?>"readonly />
                                    <input type="hidden" class="form-control"  name="hidden_id" value="<?php echo $id  ?>" />
                                    <input type="text" name="quantity" class="form-control"  id="validationDefault05" placeholder="QTY"  required>
                                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-info" value="ADD" />
                                 </div>   
                                 </div>
                                </div>
                            </div>  
                             </form>  
                        </div>
                    </div>

                    </div>
       
       
       
       
       
       
       
       
       
       
       
       
        <div class="row pl-3 pt-4 ">
            <em><h1 class="display-5">Afternoon Fare</h1></em>
            
        </div>
        <div class="row">
            <div class="col-md-3">           
                <div class="card" >
                    <div class="row">
                        <div class="col pl-3">
                            <img class="card-img" src="img/fish.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-1"><p>

                        <?php
                       $sql = "SELECT * FROM `food` WHERE `food_id`='fd005'";
                       $result = mysqli_query($con, $sql);
                       if (mysqli_num_rows($result)>0){
                           while ($row = mysqli_fetch_assoc($result)){
                               $FRice=$row ["food_name"];
                               $uqty=$row ["food_unit_qty"];
                               $mea=$row ["food_measurements"];
                               $pri=$row ["food_unit_price"];
                               $id=$row ["food_id"];
                               }
                           }
                       else{
                       echo "0 results";
                       }
                       ?>
                       </h4>
                       <form method="POST" action="#">   
                                <div class="pb-1" style="max-width: 4rem;">
                                    <input type="text" name="quantity" value="<?php echo $uqty ,$mea  ?>" class="form-control" readonly/>
                                   <input type="text" class="form-control"  name="hidden_name" value="<?php echo $FRice ?>"readonly />
                                   <input type="text" class="form-control"  name="hidden_price" value="<?php echo $pri ?>" readonly/>
                                   <input type="hidden" class="form-control"  name="hidden_id" value="<?php echo $id  ?>" />
                                   <input type="text" name="quantity" class="form-control"  id="validationDefault05" placeholder="QTY"  required>
                                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-info" value="ADD" />
                                </div>   
                                </div>
                               </div>
                           </div>  
                            </form>  
                       </div>
                   </div>



            <div class="col-sm-12 col-md-6 col-lg-3 container">           
                <div class="card">
                    <div class="row">
                        <div class="col pl-3">
                            <img class="card-img-top" src="img/veg.rice.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-1">

                        <?php
                        $sql = "SELECT * FROM `food` WHERE `food_id`='fd006'";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result)>0){
                            while ($row = mysqli_fetch_assoc($result)){
                                $VRice=$row ["food_name"];
                                $uqty=$row ["food_unit_qty"];
                                $mea=$row ["food_measurements"];
                                $pri=$row ["food_unit_price"];
                                $id=$row ["food_id"];
                                }
                            }
                        else{
                        echo "0 results";
                        }
                        ?>
                        </h4>
                        <form method="POST" action="#">   
                                 <div class="pb-1" style="max-width: 4rem;">
                                    <input type="text" name="quantity" value="<?php echo $uqty ,$mea  ?>" class="form-control" readonly/>
                                    <input type="text" class="form-control"  name="hidden_name" value="<?php echo $VRice ?>" readonly/>
                                    <input type="text" class="form-control"  name="hidden_price" value="<?php echo $pri ?>" readonly/>
                                    <input type="hidden" class="form-control"  name="hidden_id" value="<?php echo $id  ?>" />
                                    <input type="text" name="quantity" class="form-control"  id="validationDefault05" placeholder="QTY"  required>
                                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-info" value="ADD" />
                                 </div>   
                                 </div>
                                </div>
                            </div>  
                             </form>  
                        </div>
                    </div>
 


            <div class="col-sm-12 col-md-6 col-lg-3 container">           
                <div class="card">
                    <div class="row">
                        <div class="col pl-3">
                            <img class="card-img-top" src="img/chi.rice.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-1">

                        <?php
                        $sql = "SELECT * FROM `food` WHERE `food_id`='fd007'";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result)>0){
                            while ($row = mysqli_fetch_assoc($result)){
                                $CRice=$row ["food_name"];
                                $uqty=$row ["food_unit_qty"];
                                $mea=$row ["food_measurements"];
                                $pri=$row ["food_unit_price"];
                                $id=$row ["food_id"];
                                }
                            }
                        else{
                        echo "0 results";
                        }
                        ?>
                        </h4>
                        <form method="POST" action="#">   
                                 <div class="pb-1" style="max-width: 4rem;">
                                    <input type="text" name="quantity" value="<?php echo $uqty ,$mea  ?>" class="form-control" readonly/>
                                    <input type="text" class="form-control"  name="hidden_name" value="<?php echo $CRice ?>"readonly />
                                    <input type="text" class="form-control"  name="hidden_price" value="<?php echo $pri ?>"readonly />
                                    <input type="hidden" class="form-control"  name="hidden_id" value="<?php echo $id  ?>" />
                                    <input type="text" name="quantity" class="form-control"  id="validationDefault05" placeholder="QTY"  required>
                                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-info" value="ADD" />
                                 </div>   
                                 </div>
                                </div>
                            </div>  
                             </form>  
                        </div>
                    </div>
 



            <div class="col-sm-12 col-md-6 col-lg-3 container">           
                <div class="card">
                    <div class="row">
                        <div class="col pl-3">
                            <img class="card-img-top" src="img/Spl.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-1">

                                <?php
                        $sql = "SELECT * FROM `food` WHERE `food_id`='fd008'";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result)>0){
                            while ($row = mysqli_fetch_assoc($result)){
                                $SplFd=$row ["food_name"];
                                $uqty=$row ["food_unit_qty"];
                                $mea=$row ["food_measurements"];
                                $pri=$row ["food_unit_price"];
                                $id=$row ["food_id"];
                                }
                            }
                        else{
                        echo "0 results";
                        }
                        ?>
                        </h4>
                        <form method="POST" action="#">   
                                 <div class="pb-1" style="max-width: 4rem;">
                                    <input type="text" name="quantity" value="<?php echo $uqty ,$mea  ?>" class="form-control"readonly />
                                    <input type="text" class="form-control"  name="hidden_name" value="<?php echo $SplFd?>" readonly/>
                                    <input type="text" class="form-control"  name="hidden_price" value="<?php echo $pri ?>" readonly/>
                                    <input type="hidden" class="form-control"  name="hidden_id" value="<?php echo $id  ?>" />
                                    <input type="text" name="quantity" class="form-control"  id="validationDefault05" placeholder="QTY"  required>
                                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-info" value="ADD" />
                                 </div>   
                                 </div>
                                </div>
                            </div>  
                             </form>  
                        </div>
                    </div>
                   
                   
                   
                   
                    </div>             

       
       
       
       
       
       
       
       
       
       
       
       
       
        <div class="row pl-3 pt-4 ">
            <em><h1 class="display-5">Night Fare</h1></em>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3 container">           
                <div class="card" >
                    <div class="row">
                        <div class="col pl-3">
                            <img class="card-img-top responsive" src="img/koththu.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-1">

                        <?php
                       $sql = "SELECT * FROM `food` WHERE `food_id`='fd009'";
                       $result = mysqli_query($con, $sql);
                       if (mysqli_num_rows($result)>0){
                           while ($row = mysqli_fetch_assoc($result)){
                               $Koththu=$row ["food_name"];
                               $uqty=$row ["food_unit_qty"];
                               $mea=$row ["food_measurements"];
                               $pri=$row ["food_unit_price"];
                               $id=$row ["food_id"];
                               }
                           }
                       else{
                       echo "0 results";
                       }
                       ?>
                       </h4>
                       <form method="POST" action="#">   
                                <div class="pb-1" style="max-width: 4rem;">
                                    <input type="text" name="quantity" value="<?php echo $uqty ,$mea  ?>" class="form-control"readonly />
                                   <input type="text" class="form-control"  name="hidden_name" value="<?php echo $Koththu ?>"readonly />
                                   <input type="text" class="form-control"  name="hidden_price" value="<?php echo $pri ?>"readonly />
                                   <input type="hidden" class="form-control"  name="hidden_id" value="<?php echo $id  ?>" />
                                   <input type="text" name="quantity" class="form-control"  id="validationDefault05" placeholder="QTY"  required>
                                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-info" value="ADD" />
                                </div>   
                                </div>
                               </div>
                           </div>  
                            </form>  
                       </div>
                   </div>

            <div class="col-sm-12 col-md-6 col-lg-3 container">           
                <div class="card">
                    <div class="row">
                        <div class="col pl-3">
                            <img class="card-img-top" src="img/Pittu.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-1">

                        <?php
                       $sql = "SELECT * FROM `food` WHERE `food_id`='fd010'";
                       $result = mysqli_query($con, $sql);
                       if (mysqli_num_rows($result)>0){
                           while ($row = mysqli_fetch_assoc($result)){
                               $Pittu=$row ["food_name"];
                               $uqty=$row ["food_unit_qty"];
                               $mea=$row ["food_measurements"];
                               $pri=$row ["food_unit_price"];
                               $id=$row ["food_id"];
                               }
                           }
                       else{
                       echo "0 results";
                       }
                       ?>
                       </h4>
                       <form method="POST" action="#">   
                                <div class="pb-1" style="max-width: 4rem;">
                                    <input type="text" name="quantity" value="<?php echo $uqty ,$mea  ?>" class="form-control" readonly/>
                                   <input type="text" class="form-control"  name="hidden_name" value="<?php echo $Pittu ?>" readonly/>
                                   <input type="text" class="form-control"  name="hidden_price" value="<?php echo $pri ?>" readonly/>
                                   <input type="hidden" class="form-control"  name="hidden_id" value="<?php echo $id  ?>" />
                                   <input type="text" name="quantity" class="form-control"  id="validationDefault05" placeholder="QTY"  required>
                                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-info" value="ADD" />
                                </div>   
                                </div>
                               </div>
                           </div>  
                            </form>  
                       </div>
                   </div>


            <div class="col-sm-12 col-md-6 col-lg-3 container">           
                <div class="card">
                    <div class="row">
                        <div class="col pl-3">
                            <img class="card-img-top" src="img/fri.rice.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-1">

                        <?php
                        $sql = "SELECT * FROM `food` WHERE `food_id`='fd011'";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result)>0){
                            while ($row = mysqli_fetch_assoc($result)){
                                $FriRic=$row ["food_name"];
                                $uqty=$row ["food_unit_qty"];
                                $mea=$row ["food_measurements"];
                                $pri=$row ["food_unit_price"];
                                $id=$row ["food_id"];
                                }
                            }
                        else{
                        echo "0 results";
                        }
                        ?>
                        </h4>
                        <form method="POST" action="#">   
                                 <div class="pb-1" style="max-width: 4rem;">
                                    <input type="text" name="quantity" value="<?php echo $uqty ,$mea  ?>" class="form-control" readonly/>
                                    <input type="text" class="form-control"  name="hidden_name" value="<?php echo $FriRic?>" readonly/>
                                    <input type="text" class="form-control"  name="hidden_price" value="<?php echo $pri ?>"readonly />
                                    <input type="hidden" class="form-control"  name="hidden_id" value="<?php echo $id  ?>" />
                                    <input type="text" name="quantity" class="form-control"  id="validationDefault05" placeholder="QTY"  required>
                                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-info" value="ADD" />
                                 </div>   
                                 </div>
                                </div>
                            </div>  
                             </form>  
                        </div>
                    </div>

            <div class="col container invisible">       
                <div class="card">
                    <div class="row">
                        <div class="col pl-3">
                            <img class="card-img-top" src="img/fish.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-1">

                        <?php
                        $sql = "SELECT * FROM `food` WHERE `food_id`='fd012'";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result)>0){
                            while ($row = mysqli_fetch_assoc($result)){
                                echo'
                                <tr>
                            
                                <td>' . $row ["food_name"].'</td>
                                <td>' . $row ["food_unit_qty"].'</td>
                                <td>' . $row ["food_measurements"].'</td>
                                <td>' . $row ["food_unit_price"].'</td>
                                </tr>';
                            }
                        }else{
                        echo "0 results";
                        }
                        ?> </h4> 
                                <div class="pb-1" style="max-width: 4rem;">
                                    <input type="text" class="form-control"  id="validationDefault05" placeholder="QTY"   required>
                                </div>   
                                <a href="#" class="btn btn-info" value="Add" name="Add">Add</a>                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
       
        </div></p>
     
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
					<td> <?php echo $values["item_price"]; ?></td>
					<td> <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
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
                            <p>Total</p>
                        </div>
                        <div class="col">
                            <p><?php echo number_format($total, 2); ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <a href="OrderView.php" button type="button" class="btn btn-success w-100" role="button" aria-pressed="true" name="button">Order</button></a>
                    </div>
                    
                </div>
            </div>      
        </div>
    </div>


   
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER--