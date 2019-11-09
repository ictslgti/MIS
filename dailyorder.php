 
<!--block 1 start dont change the order-->

<?php 
$title="SEARCH CUSTOMER|SLGTI";
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
    <form class="form-inline" method="GET">
              <div class="form-group mx-sm-3 mb-2">
              <input type="number"  min=1 class="form-control mr-2" type="search"  name="search" placeholder="Order ID">  
              </div>
              <div class="pb-2">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
      </form>

              

      <?php
      $username=$oid=null;
        if(isset($_GET['search'])){
          
            $oid=$_GET['search'];
            
            $sql="SELECT DISTINCT food_order_user_name, sum(food_order_details_food_qty*food_order_details_unit_price) as total FROM food_order,food_order_details 
            WHERE food_order_details_food_order_id=food_order_id AND food_order_details_food_order_id =' $oid'";

            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)==1){
              $row=mysqli_fetch_assoc($result);

              $username=$row['food_order_user_name'];
              $total=$row['total'];?> 
              
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
                    <p><h4><?php echo $oid;?></h4></p>
                </div>
              </div>

              <div class ="row">
                <div class ="col-3" >
                  <p><h4>User name</h4></p>
                </div>
                <div class ="col-3" >
                    <p><h4><?php echo $username;?></h4></p>
                </div>
              </div>
              <div class ="row">
                <div class ="col-3" >
                  <p><h4>Total</h4></p>
                </div>
                <div class ="col-3" >
                    <p><h4>Rs&nbsp;<?php echo $total;?></h4></p>
                </div>
              </div>
            
              
              <?php
              }
              
              $sql1="SELECT distinct`food_order_details_food_order_id`as id,`food_order_user_name` as uname,food_name,`food_order_details_food_id` as fid,`food_order_details_food_qty`as qty,
              (food_order_details_food_qty*food_order_details_unit_price) as price 
              FROM `food_order`,food_order_details ,food 
               where`food_order_details_food_order_id`=food_order_id and `food_order_details_food_id`=food_id and `food_order_details_food_order_id`=$oid";
   
                $result=mysqli_query($con,$sql1);
                if(mysqli_num_rows($result)>0){

                      while($row=mysqli_fetch_assoc($result)){

                    
                      $foodname=$row['food_name'];
                      $orderesfoodqty=$row['qty'];
                      $unitprice=$row['price'];?>

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
                                      <tr>
                                        <td><?php echo $foodname;?></td>
                                        <td><?php echo $orderesfoodqty;?></td>
                                        <td>Rs &nbsp;<?php echo $unitprice;?></td>
                                        </tr>

                                          
                                      </tbody>

                                  </table>
                                  </div>
                            </div>

                          
                   <?php
                    }
                  }
          else{
            echo '
                no result
                
                ';
          }
        }
        ?>

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
 <?php
  //  $sql_1 = null;
  // $sql='call food()';
  // $result=(mysqli_query($con,$sql));
  //   while($row_y=mysqli_fetch_assoc($result)){
  //     $ID=$row_y['food_id'];
      
  //     $sql_1 .="SELECT food_name,sum(`food_order_details_food_qty`) as total FROM `food_order_details`,food where `food_order_details_food_id`=food_id and food_id=$ID;";
  //     $result_1 = mysqli_query($con, $sql_1);
  //     var_dump($sql_1);
  //     if (mysqli_num_rows($result)>0){

  //     while ($row= mysqli_fetch_assoc($result_1)){
        
        
        
  //       $Fname=$row_y['food_name'];
  //       $total=$row_y['total'];

     

     

  //     echo '
  //     <tr style="text-align:left";>
       
         
  //         <td>'. $row["food_id"]."<br>".'</td>
   
  //         </tr>     
  //     ';
  //   }
  // }
     
  // }
 ?>
</table>

<input class="btn btn-primary" type="submit" name="search" value="Check"> 
</div>
</div>
</div>
  
<!--block 3 start dont change the order-->

    <?php include_once("footer.php"); ?>

    
    <!-- end dont change the order-->