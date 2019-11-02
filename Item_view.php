<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->



<!-- delete coding -->
<?php
                    if(isset($_GET['delete_id']))
                    {                
                        $c_id = $_GET['delete_id'];

                        $sql = "DELETE from inventory_item where item_id = '$c_id' ";

                        if(mysqli_query($con,$sql))
                        {
                          echo '
                          <div class="alert alert-sucess alert-dismissible fade show" role="alert">
                          <strong> Succes </strong> Record has been Deleted Succesfully 
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>  ';
                        }
                        else
                        {
                          echo '
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong> Error </strong> Cannot delete or update a parent row (foreign key constraint fails)
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>  ';               
                         
                        }
                    }
                    ?>





<!-- search coding -->
<?php
  if(isset($_GET['edits'])){
        $id=$_GET['edits'];
        $sql="SELECT * FROM `inventory_item` WHERE `item_id`='$id'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)==1){
      $row=mysqli_fetch_assoc($result);
      $itemid=$row['item_id'];
      $supplierid=$row['supplier_id'];
      $inventoryitempurchase=$row['inventory_item_purchase'];
      $inventoryitemwarranty=$row['inventory_item_warranty'];
      $inventoryitemdescription=$row['inventory_item_description'];
      $itemcode=$row['item_code'];
      
        }
        else{
          echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>'.$item_id.'</strong> echo "Error".$sql."<br>".mysqli_error($con);
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
        ';
        }
    }
  
?>





<div class="row">
    <div class=" col-sm-8">
        <p style="font-size: 45px; font-weight: 700; "> Item Information</p>
    </div>

    <div class="col-sm-3 pt-4"> 
      <form class="form-inline" method="GET">
        <input class="form-control mr-2" type="search" name="edits" placeholder="item_id">  
        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
      </form>
    </div>  
</div>

<div class="row">
  <div class="col-sm-12" >
    <hr color ="black" style="height:1px;">
  </div>
</div>  
<table class="table">
  <thead class="thead-r">
    <tr>
      <th scope="col">ITEM ID</th>
      <th scope="col">SUPPLIER ID</th>
      <th scope="col">ITEM PURCHASE</th>
      <th scope="col"> WARRENTY</th>
      <th scope="col"> ITEM DESCRIPTION </th>
      <th scope="col">ITEM CODE</th>
      <th scope="col">ACTION</th>
      
    </tr>
    <?php
     $sql ="SELECT `item_id`, `supplier_id`, `inventory_item_purchase`, `inventory_item_warranty`, `inventory_item_description`, `item_code` FROM `inventory_item`";
     $result = mysqli_query ($con, $sql);
   if (mysqli_num_rows($result)>0)
   {
     while($row = mysqli_fetch_assoc($result))
     {
       echo '
       <tr style="text-align:left";>
          <td>'. $row["item_id"]."<br>".'</td>
          <td>'. $row["supplier_id"]."<br>".'</td>
          <td>'. $row["inventory_item_purchase"]."<br>".'</td>
          <td>'. $row["inventory_item_warranty"]."<br>".'</td>
          <td>'. $row["inventory_item_description"]."<br>".'</td>
          <td>'. $row["item_code"]."<br>".'</td>
          <td>
     
          <a href="AddItem.php?edits='.$row["item_id"].'" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>

                                       
                                    <button class="btn btn-sm btn-danger" data-href="?delete_id='.$row["item_id"].'" 
                                    data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i> </button> 
          </td>
       </tr> ';
     }
   }
   else
   {
     echo "0 results";
   }
    
  ?>


</table>

<div class="row">
<div class="col-6"></div>
<div class="col-3"></div>
<div class="col-2"></div>

<div class="col-md- col-sm- form-group pl- pr-container">
<button type="submit" class="btn btn-primary ml-2 mt-3 float-right"  onclick="location.href='AddItem.php'">back </button>         
 
</div>
</div>


<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
