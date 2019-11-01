<?php
$title = "Department Details | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 if($_SESSION['user_type']!='STU'){ 
 ?>
<!-- end default code -->

<!-- start my code -->

<?PHP
$inventoryid=$Departmentid=$itemid=$inventorystatus=$inventoryquantity=null;

if(isset($_GET['edit']))

{
  $inventoryid = $_GET['edit'];
  $sql = "SELECT * FROM `inventory` WHERE `inventory_id` = $inventoryid'";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result)==1)
   {
      $row = mysqli_fetch_assoc($result);
    echo  $inventoryid = $row['inventory_id'];
     echo $Departmentid = $row['inventorydepartmentid'];
      echo$itemid = $row['item_id'];
     echo $inventorystatus= $row['inventory_status'];
     echo $inventoryquantity = $row['inventory_quantity'];
         
    }
    else{
      echo "Error".$sql."<br>".mysqli_error($con);

  }

}

?>







<?PHP


// Add coding
$inventoryid=$Departmentid=$itemid=$inventorystatus=$inventoryquantity=null;

if(isset($_POST['Add'])){
  if(!empty($_POST['inventoryid'])
    &&!empty($_POST['Departmentid'])
    &&!empty($_POST['itemid'])
    &&!empty($_POST['inventorystatus'])
    &&!empty($_POST['inventoryquantity'])){
      
      $inventoryid=$_POST['inventoryid'];
      $Departmentid=$_POST['Departmentid'];
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
<!-- edit coding -->
<?php
$inventoryid=$Departmentid=$itemid=$inventorystatus=$inventoryquantity=null;
if(isset($_GET['edits'])){
        $inventory_id=$_GET['edits'];
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

    
    if(isset($_POST['edit']))
     {
      
       'inventoryid'.$_POST['inventoryid'];
       'Departmentid'.$_POST['Departmentid'];
       'itemid'.$_POST['itemid'];
       'inventorystatus'.$_POST['inventorystatus'];
       'inventoryquantity'.$_POST['inventoryquantity'];
       
      
       if(!empty($_POST['inventoryid']) && !empty($_POST['Departmentid']) && !empty($_POST['itemid']) && !empty($_POST['inventorystatus'])
         && !empty($_POST['inventoryquantity']) 
         && !empty($_GET['edits']))
       {
        
        $inventoryid=$_GET['edits'];
        $Departmentid=$_POST['Departmentid'];
        $itemid=$_POST['itemid'];
        $inventorystatus=$_POST['inventorystatus'];
        $inventoryquantity=$_POST['inventoryquantity'];
        
        

        $sql2 = "UPDATE `inventory` SET `inventory_department_id`='$Departmentid',`item_id`='$itemid',`inventory_status`='$inventorystatus',`inventory_quantity`='$inventoryquantity' WHERE `inventory_id`='$inventoryid'";
        

            if(mysqli_query($con,$sql2))
            {
              echo "Record Updated Successfully";
            }
            else
            {
              echo "Error: ".$sql2 . "<br>" . mysqli_error($con);
              echo "Fill the required field";
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
                      <select id="Departmentid" name="Departmentid" value="<?php echo $Departmentid ?>" class="custom-select mr-sm-2<?php  if(isset($_POST['Add']) && empty($_POST['Departmentid'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Departmentid'])){echo ' is-valid';} ?>">
      
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
                        if($row["item_id"]==$itemid) echo ' selected';
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
                  <input type="text"  name="inventoryquantity" value="<?php echo $inventoryquantity;?>" class="form-control  <?php if(isset($_POST['Add']) && empty($_POST['inventoryquantity'])){echo 'is-invalid';}if(isset($_POST['Add']) &&!empty($_POST['inventoryquantity'])&& !empty($_POST['inventoryquantity'])){echo '  is-valid';} ?>"id="quantity" aria-describedby="quantity" placeholder="quantity" required="required">
                  <small id="quantity" class="form-text text-muted"></small>
          </div>
          <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
        
          <a href="Inventory_view.php" class="btn btn-primary ml-2 mt-3 float-right" >View</a>    
           
         
           <?php
                         if(isset($_GET['edits'])){
                         echo '<button type="submit"  value="edit" name="edit"  class="btn btn-primary ml-2 mt-3 float-right">update </button>';
                         }
                         else{
                        
                         echo '<button type="submit" value="Add" name="Add"  class="btn btn-primary ml-2 mt-3 float-right">Add </button>
                         <input class="btn btn-dark ml-2 mt-3 float-right" type="reset" value="Reset">';
                         }
 
                         ?>

            </div>
            </div>
      </form>



<!-- end my code\ -->
 <?php }?>

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>