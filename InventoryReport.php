<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "InventoryReport | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
$today = date('Y-m-d');
?>
<!--END DON'T CHANGE THE ORDER-->

<div class="row">
    <div class="col-md-12 col-sm-12">
        <h3 class="text-center">InventoryReport</h3>
    </div>
</div>

<form method="GET">
    <div class="form-row pb-4">
        <div class="col-3">
            <div class="form-row align-items-center">
                <select class="selectpicker mr-sm-2" id="TeacherName" name="staff_id" data-live-search="true"
                    data-width="100%">
                    <option value="null" selected disabled>-- Select a department --</option>
                    <?php
          $sql = "SELECT * FROM `department`";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
              echo '<option  value="'.$row["department_id"].'" required';
              if($row["department_id"]==$Departmentid) echo ' selected';
              echo '>'.$row["department_name"].'</option>';
              }
          }
          
          else{
            echo '<option value="null"   selected disabled>-- No Teacher --</option>';
          }
          ?>
                </select>
            </div>
        </div>

        <div class="col-md-3 col-sm-12">
            <div class="form-row align-items-center">
                <select class="selectpicker mr-sm-2" id="Course" onchange="showModule(this.value)" name="course_id"
                    data-live-search="true" data-width="100%">
                    <option value="null" selected disabled>-- Select a itemid --</option>
                    <?php
          $sql = "SELECT * FROM `inventory_item`";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
              echo '<option  value="'.$row["item_id"].'" required';
              if($row["item_id"]==$itemid) echo ' selected';
              echo '>'.$row["item_id"].'</option>';
              }
          }
          else{
            echo '<option value="null"   selected disabled>-- No Teacher --</option>';
          }
          ?>
                </select>
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
 </table>
        <div class="col-md-3 col-sm-12">
            <div class="form-row align-items-center">
                
            <button type="submit" value="Add" name="Add" class="btn btn-primary"> ADD</button>
         
            </div>
        </div>
        
      
     
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->