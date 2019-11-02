<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
if($_SESSION['user_type']!='STU'){
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->
<div class="row">
    <div class=" col-sm-8">
        <p style="font-size: 45px; font-weight: 700; "> SLGTI INVENTORY INFORMATION</p>
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
  <thead>
    <tr>
      
      <th scope="col">Supplier Id</th>
      <th scope="col">Supplier Name</th>
      <th scope="col">Supplier Phone Number</th>
      <th scope="col">Supplier Email</th>
      <th scope="col">Supplier Address</th>
      <th scope="col">Item Id</th>
      <th scope="col">Item Purchase</th>
      <th scope="col">Item Warranty</th>
      <th scope="col">Item Description</th>
      <th scope="col">Item Code</th>
      <th scope="col">Inventory Id</th>
      <th scope="col">Department Id</th>
      <th scope="col">Inventory Status</th>
      <th scope="col">Inventory Quantity</th>
      
    </tr>
  </thead>
  <?php
     $sql = "SELECT inventory_item_supplier.`supplier_id`, inventory_item_supplier.`supplier_name`, inventory_item_supplier.`supplier_phone_number`, 
     inventory_item_supplier.`supplier_email`, inventory_item_supplier.`supplier_address` ,inventory_item.`item_id`, inventory_item.`inventory_item_purchase`, inventory_item.`inventory_item_warranty`,
      inventory_item.`inventory_item_description`, inventory_item.`item_code`,inventory.`inventory_id`, inventory.`inventory_department_id`, 
      inventory.`inventory_status`, inventory.`inventory_quantity` FROM inventory_item_supplier LEFT JOIN inventory_item on inventory_item_supplier.supplier_id=inventory_item.supplier_id 
      join inventory on inventory.item_id=inventory_item.item_id";
    $result = mysqli_query ($con, $sql);
    if (mysqli_num_rows($result)>0)
    {
      while($row = mysqli_fetch_assoc($result))
      {
        echo '
        <tr style="text-align:left";>
    
           <td>'. $row["supplier_id"]."<br>".'</td>
           <td>'. $row["supplier_name"]."<br>".'</td>
           <td>'. $row["supplier_phone_number"]."<br>".'</td>
           <td>'. $row["supplier_email"]."<br>".'</td>
           <td>'. $row["supplier_address"]."<br>".'</td>
           <td>'. $row["item_id"]."<br>".'</td>
           <td>'. $row["inventory_item_purchase"]."<br>".'</td>
           <td>'. $row["inventory_item_warranty"]."<br>".'</td>
           <td>'. $row["inventory_item_description"]."<br>".'</td>
           <td>'. $row["item_code"]."<br>".'</td>
           <td>'. $row["inventory_id"]."<br>".'</td>
           <td>'. $row["inventory_department_id"]."<br>".'</td>
           <td>'. $row["inventory_status"]."<br>".'</td>
           <td>'. $row["inventory_quantity"]."<br>".'</td>
           <td> 
           
           </td>
        </tr> ';
      }
    }
    else
    {
      echo "0 results";
    }
     
   ?>
 
 <!-- search coding -->

</table>


<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php 
include_once("FOOTER.PHP"); 
?>
<?php }?>