<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->


<?php
  if(isset($_GET['edit'])){
        $item_id=$_GET['edit'];
        $sql="SELECT * FROM `inventory_item` WHERE `item_id`='$item_id'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)==1){
            $row=mysqli_fetch_assoc($result);
            $item_id=$row['item_id'];
            $supplier_id=$row['supplier_id'];
            $inventory_item_purchase=$row['inventory_item_purchase'];
            $inventory_item_warranty=$row['inventory_item_warranty'];
            $inventory_item_description=$row['inventory_item_description'];
            $item_code=$row['	item_code'];
          
        }
        else{
          echo "Error".$sql."<br>".mysqli_error($con);
        }
    }
  
?>



<div class="row">
    <div class=" col-sm-8">
        <p style="font-size: 45px; font-weight: 700; "> Item Information</p>
    </div>

    <div class="col-sm-3 pt-4"> 
      <form class="form-inline" method="GET">
        <input class="form-control mr-2" type="search" name="edit" placeholder="Inventory_Id">  
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
      <th scope="col">ITEM DESCRIPTION</th>
      <th scope="col">ITEM CODE</th>
      <th scope="col">WARRENTY</th>
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
          <a href="AddItem.php? edit='.$row["item_id"].'"> Edit </a> 
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
 <button type="submit" class="btn btn-primary ml-2 mt-3 float-right">save </button>
</div>
</div>


<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
