<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->


<!-- search coding -->
<?php
  if(isset($_GET['edit'])){
        $inventory_id=$_GET['edit'];
        $sql="SELECT * FROM `inventory` WHERE `inventory_id`='$inventory_id'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)==1){
            $row=mysqli_fetch_assoc($result);
            $inventoryid=$row['inventory_id'];
            $Departmentid=$row['inventory_department_id'];
            $itemid=$row['item_id'];
            $inventorystatus=$row['inventory_status'];
            $inventoryquantity=$row['inventory_quantity'];
          
        }
        else{
          echo "Error".$sql."<br>".mysqli_error($con);
        }
    }
  
?>



<div class="row">
    <div class=" col-sm-8">
        <p style="font-size: 45px; font-weight: 700; "> Inventory Information</p>
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
      <th scope="col">DEPARTMENT ID</th>
      <th scope="col">INVENTORY ID</th>
      <th scope="col">ITEM ID</th>
      <th scope="col">STATAUS</th>
      <th scope="col">QUANTITY</th>
      <th scope="col">ACTION</th>
      
    </tr>
  </thead>
  <tr>

      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      
      <td>
           
            <button type="button" class="btn btn-outline-success"><i class="far fa-edit"></i>&nbsp;&nbsp;Edit</button>&nbsp;&nbsp;
      </td>
    </tr>

    <tr>

<td></td>
<td></td>
<td></td>
<td></td>
<td></td>

<td>
     
      <button type="button" class="btn btn-outline-success"><i class="far fa-edit"></i>&nbsp;&nbsp;Edit</button>&nbsp;&nbsp;
</td>
</tr>
 
</table>





<div class="row">
<div class="col-6"></div>
<div class="col-3"></div>
<div class="col-2"></div>

<div class="col-md- col-sm- form-group pl- pr-container">
<button type="submit" class="btn btn-primary ml-2 mt-3 float-right "  onclick="location.href='AddInventory.php'">back </button>
                          
                          <button type="submit" class="btn btn-primary ml-2 mt-3 float-right">save </button>
              </div>
    
     </div> 
</div>


<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
