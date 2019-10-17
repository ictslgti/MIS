<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->  
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




 <?php 
                  
                    $connect=mysqli_connect("mis.achchuthan.org","misuser","mIs@SlgT1","mis");
                    if(isset($_POST["Add"]))
                    {
                        if(isset($_SESSION["cart"]))
                        {
                        $item_array_id =array_column($_SESSION["cart"],"food_id");
                        if(!in_array($_GET["id"],$item_array_id))
                        {
                            $count=count($_SESSION["cart"]);
                            $item_array=array(
                                'food_id' => $_GET["id"],
                                'food_name' => $_GET["h_name"],
                                'food_unit_qty' => $_GET["h_qty"],
                                'food_unit_price' => $_GET["P_amount"],

                            );
                            $_SESSION["cart"][$count]=$item_array;
                        }
                else
                {
                    echo' "Already Added"';
                }


                        }
                        else{
                            $item_array=array(
                                'food_id' => $_GET["id"],
                                'food_name' => $_GET["h_name"],
                                'food_unit_qty' => $_GET["h_qty"],
                                'food_unit_price' => $_GET["P_amount"],
                            );
                            $_SESSION["cart"][0] =$item_array;
                        }
                    }
                    
                    if(isset($_GET["action"]))
                    {
                        if($_GET["action"]=="delete")
                        {
                            
                            foreach($_SESSION["cart"] as $keys => $values)
                            {
                             if($values["food_id"]==$_GET["id"])  
                             {
                                unset($_SESSION["cart"][$keys]);
                                echo '<script>alert("item Removed")</script>';
                             }
                            }
                        }
                    }
                    
                   
                    
                    
                    ?>










         < <div class="row pl-3 pt-4 ">
            <em><h1 class="display-5">Morning Fare</h1></em>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3 container">           
                <div class="card" >
                    <div class="row">
                        <div class="col pl-5">
                            <img class="card-img-top responsive" src="img/Itli.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-3">   
                                <?php

                         $sql = "SELECT * FROM `food` WHERE `food_id`='fd001'";
                         $result = mysqli_query($con, $sql);
                         if (mysqli_num_rows($result)>0){
                             while ($row = mysqli_fetch_assoc($result)){

                                 $idly=$row ["food_name"];
                                 $uqty=$row ["food_unit_qty"];
                                 $mea=$row ["food_measurements"];
                                 $pri=$row ["food_unit_price"];

                                 echo'
                                <tr>
                                 <td>' . $idly.'</td>
                                 <td>' . $uqty.'</td>
                                 <td>' . $mea.'</td>
                                 <td>' . $pri.'</td>
                                 </tr>';
                             }
                     }else{
                         echo "0 results";
                         }
                        ?>
                         </h4>   
                                 <div class="pb-1" style="max-width: 4rem;">
                                 <input type="text" class="form-control"  id="validationDefault05" placeholder="QTY"  required>
                                 </div>   
                                 <a href="#" class="btn btn-info">Add</a>                                    
                                 </div>
                                </div>
                            </div>
                        </div>
                    </div> 



            <div class="col-sm-12 col-md-6 col-lg-3 container">           
                <div class="card">
                    <div class="row">
                        <div class="col pl-5">
                            <img class="card-img-top" src="img/rotti.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                            <h4 class="display-5 mt-3"> 
                            
                        <?php
                        $sql = "SELECT * FROM `food` WHERE `food_id`='fd002'";
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
                                <a href="#" class="btn btn-info">Add</a>                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-sm-12 col-md-6 col-lg-3 container">           
                <div class="card">
                    <div class="row">
                        <div class="col pl-5">
                            <img class="card-img-top" src="img/idiappam.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-3"> 

                        <?php
                        $sql = "SELECT * FROM `food` WHERE `food_id`='fd003'";
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
                                <a href="#" class="btn btn-info">Add</a>                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-sm-12 col-md-6 col-lg-3 container">           
                <div class="card">
                    <div class="row">
                        <div class="col pl-5">
                            <img class="card-img-top" src="img/bread.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-3">

                        <?php
                        $sql = "SELECT * FROM `food` WHERE `food_id`='fd004'";
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



        <div class="row pl-3 pt-4 ">
            <em><h1 class="display-5">Afternoon Fare</h1></em>
            
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3 container">           
                <div class="card" >
                    <div class="row">
                        <div class="col pl-5">
                            <img class="card-img-top responsive" src="img/fish.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-3"><p>

                        <?php
                        $sql = "SELECT * FROM `food` WHERE `food_id`='fd005'";
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
                                <a href="#" class="btn btn-info">Add</a>                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-sm-12 col-md-6 col-lg-3 container">           
                <div class="card">
                    <div class="row">
                        <div class="col pl-5">
                            <img class="card-img-top" src="img/veg.rice.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-3">

                        <?php
                        $sql = "SELECT * FROM `food` WHERE `food_id`='fd006'";
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
                                <a href="#" class="btn btn-info">Add</a>                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-12 col-md-6 col-lg-3 container">           
                <div class="card">
                    <div class="row">
                        <div class="col pl-5">
                            <img class="card-img-top" src="img/chi.rice.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-3">

                        <?php
                        $sql = "SELECT * FROM `food` WHERE `food_id`='fd007'";
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
                                <a href="#" class="btn btn-info">Add</a>                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-sm-12 col-md-6 col-lg-3  container">           
                <div class="card">
                    <div class="row">
                        <div class="col pl-5">
                            <img class="card-img-top" src="img/Spl.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-3">

                            <?php
                            $sql = "SELECT * FROM `food` WHERE `food_id`='fd008'";
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



        <div class="row pl-3 pt-4 ">
            <em><h1 class="display-5">Night Fare</h1></em>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3 container">           
                <div class="card" >
                    <div class="row">
                        <div class="col pl-5">
                            <img class="card-img-top responsive" src="img/koththu.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-3">

                        <?php
                        $sql = "SELECT * FROM `food` WHERE `food_id`='fd009'";
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
                                <a href="#" class="btn btn-info">Add</a>                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-sm-12 col-md-6 col-lg-3 container">           
                <div class="card">
                    <div class="row">
                        <div class="col pl-5">
                            <img class="card-img-top" src="img/Pittu.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-3">

                        <?php
                        $sql = "SELECT * FROM `food` WHERE `food_id`='fd010'";
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
                                <a href="#" class="btn btn-info">Add</a>                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-sm-12 col-md-6 col-lg-3 container">           
                <div class="card">
                    <div class="row">
                        <div class="col pl-5">
                            <img class="card-img-top" src="img/fri.rice.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-3">

                        <?php
                        $sql = "SELECT * FROM `food` WHERE `food_id`='fd011'";
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
                                <a href="#" class="btn btn-info">Add</a>                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col container invisible">       
                <div class="card">
                    <div class="row">
                        <div class="col pl-5">
                            <img class="card-img-top" src="img/fish.png" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h4 class="display-5 mt-3">

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
       
        
        
<!-- ORDE CART DESIGN  -->
  
    <div class="row pt-5">
        <div class="col-sm-12 col-md-4 col-lg-9 container">  
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th><p class="h5">ITEM ID</p></th>
                        <th><p class="h5">ITEM NAME</p></th>
                        <th><p class="h5">QTY</p></th>
                        <th><p class="h5">PER AMOUNT</p></th>
                        <th><p class="h5">ACTION</p></th>
                    </tr>
                 </thead>
                <tbody class="table-borderless">
                 
                </tbody>
               
                   
                   
                   
            </table>
            <?php  
              echo "loos";
                   if(!empty($_SESSION["cart"]))
                  
                 
                   {   
                       $total =0;
                      
                       foreach($_SESSION["cart"]as $keys =>$values)
                       {
                      ?>
                      <tr>
                      <td><?php echo $values ["food_id"];?></td>
                      <td><?php echo $values ["food_name"];?></td>
                      <td><?php echo $values ["food_unit_qty"];?></td>
                      <td>$<?php echo $values ["food_unit_price"];?></td>
                      <td><?php echo number_format($values["food_unit_qty"]*$values["price"],2);?></td>
                      <td><a href="index.php?action+=delete&id=<?php echo $values["food_id"];?>"><span  class ="tex-danger">remove</span> </td>
                      </tr>
                        <?php
                        $total=$total+($values["food_unit_qty"]*$values["price"]);
                       }
                       ?>
                       <tr> 
                            <td colspan="3" align="right">Total</td>
                            <td align ="right">$<?php echo number_format($total,2);?></td>
                       
                       </tr>
                       <?php
                   
                   
                }
                   ?>
                   
        </div>

        
        <div class="col-sm-12 col-md-4 col-lg-3 container">
        <div class="card bg-light mb-3" style="max-width: 18rem;">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6 col-md-10 col-lg-10 container">
                        <p class="h2">FOOD CART</p>
                    </div>
                    <div class="col-sm-4 col-md-2 col-lg-2 container">
                        <img src="img/FOOD.png" height="35" class="float-right" alt="Error">
                    </div>
                </div>
            </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <p>Order ID</p>
                        </div>
                        <div class="col">
                            <p></p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <p>Total</p>
                        </div>
                        <div class="col">
                            <p></p>
                        </div>
                    </div>

                    <div class="row">
                        <a href="OrderView" button type="button" class="btn btn-success w-100" role="button" aria-pressed="true" >Order</button></a>
                    </div>
                    
                </div>
            </div>      
        </div>
    </div>


   
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER--