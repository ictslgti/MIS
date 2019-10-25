<?php
$title = "Department Details | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!-- end default code -->

<!-- start my code -->

<?PHP
$inventoryid=$Departmentid=$itemid=$inventorystatus=$inventoryquantity=null;

if(isset($_GET['edits']))

{
  $id = $_GET['edits'];
  $sql = "SELECT * FROM `inventory` WHERE `inventory_id` = $id'";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result)==1)
   {
      $row = mysqli_fetch_assoc($result);
    echo  $inventoryid = $row['inventoryid'];
     echo $Departmentid = $row['departmentid'];
      echo$itemid = $row['itemid'];
     echo $inventorystatus= $row['inventorystatus'];
     echo $inventoryquantity = $row['inventoryquantity'];
      

  }

}

?>






<?PHP


// Add coding
$inventoryid=$Departmentid=$itemid=$inventorystatus=$inventoryquantity=null;

if(isset($_POST['Add'])){
  if(!empty($_POST['inventoryid'])
    &&!empty($_POST['Department_id'])
    &&!empty($_POST['itemid'])
    &&!empty($_POST['inventorystatus'])
    &&!empty($_POST['inventoryquantity'])){
      
      $inventoryid=$_POST['inventoryid'];
      $Departmentid=$_POST['Department_id'];
      $itemid=$_POST['itemid'];
      $inventorystatus=$_POST['inventorystatus'];
      $inventoryquantity=$_POST['inventoryquantity'];
      

      $sql="INSERT INTO `inventory`(`inventory_id`, `inventory_department_id`, `item_id`, `inventory_status`, `inventory_quantity`) 
      VALUES ('$inventoryid','$Departmentid','$itemid','$inventorystatus','$inventoryquantity')";

      if(mysqli_query($con,$sql))
      {
        echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>'.$inventoryid.'</strong> Inventory details inserted
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>    
        ';
      }
      else{
        
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>'.$inventoryid.'</strong> echo "Error".$sql."<br>".mysqli_error($con);
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
        ';


      }

    }

}
?>




<form method="POST" action="#">
<div class="row ">
            <div class="col-md-12 col-sm-12  form-group  container bg-info">
                <h2  class="pt-2" style="color:white">ADD INVENTORY</h2>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2 container">
                      <label class="font-weight-bold" for="">01.DEPARTMENT ID</label> <span style="color:red;">*</span></label>
                      <select id="Department_id" name="Department_id" value="<?php echo $Departmentid ?>" class="custom-select mr-sm-2<?php  if(isset($_POST['Add']) && empty($_POST['Department_id'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Department_id'])){echo ' is-valid';} ?>"  >
      
                    <option value="null" selected disabled>--Select Department--</option>
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
                    ?>
                </select>
                     
                      <small id="" class="form-text text-muted"></small>
              </div>
              
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2 container">
                      <label class="font-weight-bold" for="authorName">02.INVENTORY ID</label> <span style="color:red;">*</span></label>
                      <input type="text" name="inventoryid" value="<?php echo $inventoryid ?>" class="form-control<?php if(isset($_POST['Add']) && empty($_POST['inventoryid'])){echo 'is-invalid';}if(isset($_POST['Add']) &&!empty($_POST['inventoryid'])&& !empty($_POST['inventoryid'])){echo '  is-valid';} ?>" id="inventory" aria-describedby="inventory" placeholder="inventory" required="required">
                      <small id="inventoryid" class="form-text text-muted"></small>
              </div>



              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2 container">
                      <label class="font-weight-bold" for="">03. ITEM ID </label> <span style="color:red;">*</span></label>
                      <select class="custom-select mr-sm-2<?php  if(isset($_POST['Add']) && empty($_POST['itemid'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['itemid'])){echo ' is-valid';} ?>"  id="itemid" name="itemid" value="<?php echo $itemid ?>">
      
                    <option value="null" selected disabled>--Select inventory item code--</option>
                    <?php          
                    $sql = "SELECT * FROM `inventory_item`";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                        echo '<option  value="'.$row["item_id"].'" required';
                        if($row["item_id"]==$Departmentid) echo ' selected';
                        echo '>'.$row["item_id"].'</option>';
                        }
                    }
                    ?>
                </select>
                     
                      <small id="" class="form-text text-muted"></small>
              </div>
            
             
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
                  <label class="font-weight-bold" for="category">04.STATAUS</label> <span style="color:red;">*</span></label>
                  
                  <select class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['inventorystatus'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['inventorystatus'])){echo ' is-valid';} ?>" name="inventorystatus">
                      <option value="working">working</option> 
                      <option value="dmage">damage</option>
            
                    </select>
                  <small id="" class="form-text text-muted"></small>
              </div>
              
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
                  <label class="font-weight-bold" for="cost">05.QUANTITY</label> <span style="color:red;">*</span></label>
                  <input type="text"  name="inventoryquantity" value="<?php echo $inventoryquantity;?>" class="form-control  <?php if(isset($_POST['Add']) && empty($_POST['itemid'])){echo 'is-invalid';}if(isset($_POST['Add']) &&!empty($_POST['itemid'])&& !empty($_POST['itemid'])){echo '  is-valid';} ?>"id="quantity" aria-describedby="quantity" placeholder="quantity" required="required">
                  <small id="quantity" class="form-text text-muted"></small>
          </div>
          <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
              
          <input class="btn btn-dark ml-2 mt-3 float-right" type="reset" value="Reset"> 
                  <button type="submit"  value="edits" name="edits"class="btn btn-primary ml-2 mt-3 float-right">update </button>
                  <button type="submit" class="btn btn-primary ml-2 mt-3 float-right"  onclick="location.href='inventory_view.php'">view </button>
                  <button type="submit" value="Add" name="Add"  class="btn btn-primary ml-2 mt-3 float-right">Add </button>
                 
                 

            </div>
            </div>
      </form>












<!-- end my code\ -->


<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>