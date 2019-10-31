 
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
              <input class="form-control mr-2" type="search" name="search" placeholder="Order ID">  
              </div>
              <div class="pb-2">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
      </form>

              

      <?php
      $username=null;
        if(isset($_GET['search'])){
          
            $oid=$_GET['search'];
            $sql="SELECT DISTINCT food_order_user_name FROM food_order,food_order_details 
            WHERE food_order_details_food_order_id=food_order_id AND food_order_details_food_order_id='$oid'";

            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)==1){
              $row=mysqli_fetch_assoc($result);

              $username=$row['food_order_user_name'];?> 
              
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
            
              
              <?php
              }
              
              $sql1="SELECT  food_order_user_name ,food_name,food_order_details_food_qty,food_order_details_unit_price 
              FROM food,food_order,food_order_details 
              WHERE  food_order_details_food_order_id=food_order_id 
              AND food_order_details_food_id=food_id 
                AND food_order_details_food_order_id='$oid'";
   
                $result=mysqli_query($con,$sql1);
                if(mysqli_num_rows($result)>0){

                      while($row=mysqli_fetch_assoc($result)){

                    
                      $foodname=$row['food_name'];
                      $orderesfoodqty=$row['food_order_details_food_qty'];
                      $unitprice=$row['food_order_details_unit_price'];?>

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
                                        <td><?php echo $unitprice;?></td>
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
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>'.$oid.'</strong> echo "Error".$sql."<br>".mysqli_error($con);
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                
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