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

// Add coding
$itemid=$supplierid=$inventoryitempurchase=$inventoryitemwarranty=$inventoryitemdescription=$itemcode=null;

if(isset($_POST['Add']))
{
  if(!empty($_POST['itemid'])
    &&!empty($_POST['supplierid'])
    &&!empty($_POST['inventoryitempurchase'])
    &&!empty($_POST['inventoryitemwarranty'])
    &&!empty($_POST['inventoryitemdescription'])
    &&!empty($_POST['itemcode'])){
      
      $itemid=$_POST['itemid'];
      $supplierid=$_POST['supplierid'];
      $inventoryitempurchase=$_POST['inventoryitempurchase'];
      $inventoryitemwarranty=$_POST['inventoryitemwarranty'];
      $inventoryitemdescription=$_POST['inventoryitemdescription'];
      $itemcode=$_POST['itemcode'];
      

     $sql="INSERT INTO `inventory_item`(`item_id`, `supplier_id`, `inventory_item_purchase`, `inventory_item_warranty`, `inventory_item_description`, `item_code`)
        VALUES('$itemid','$supplierid','$inventoryitempurchase','$inventoryitemwarranty','$inventoryitemdescription','$itemcode')";

if(mysqli_query($con,$sql))
      {
        echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>'.$itemid.'</strong> Item details inserted
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>    
        ';
      }
      else{
        
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>'.$itemid.'</strong> echo "Error".$sql."<br>".mysqli_error($con);
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
$itemid=$supplierid=$inventoryitempurchase=$inventoryitemwarranty=$inventoryitemdescription=$itemcode=null;
if(isset($_GET['edits'])){
        $item_id=$_GET['edits'];
        $sql="SELECT * FROM `inventory_item` WHERE `item_id`='$item_id'";
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
          echo "Error".$sql."<br>".mysqli_error($con);
        }
    }


    if(isset($_POST['edit']))
     {
    
      
       'itemid'.$_POST['itemid'];
       'supplierid'.$_POST['supplierid'];
       'inventoryitempurchase'.$_POST['inventoryitempurchase'];
       'inventoryitemwarranty'.$_POST['inventoryitemwarranty'];
       'inventoryitemdescription'.$_POST['inventoryitemdescription'];
       'itemcode'.$_POST['itemcode'];
      
       if(!empty($_POST['itemid']) && !empty($_POST['supplierid']) && !empty($_POST['inventoryitempurchase']) && !empty($_POST['inventoryitemwarranty'])
         && !empty($_POST['inventoryitemdescription']) && !empty($_POST['itemcode']) 
         && !empty($_GET['edits']))
       {
        
        $itemid=$_GET['edits'];
        $supplierid=$_POST['supplierid'];
        $inventoryitempurchase=$_POST['inventoryitempurchase'];
        $inventoryitemwarranty=$_POST['inventoryitemwarranty'];
        $inventoryitemdescription=$_POST['inventoryitemdescription'];
        $itemcode=$_POST['itemcode'];
        

        $sql2 = "UPDATE `inventory_item` SET `supplier_id`='$supplierid',`inventory_item_purchase`='$inventoryitempurchase',`inventory_item_warranty`='$inventoryitemwarranty',`inventory_item_description`='$inventoryitemdescription',`item_code`='$itemcode' WHERE `item_id`='$itemid'";

            if(mysqli_query($con,$sql2))
            {
              echo "Record Updated Successfully";
            }
            else
            {
              echo "Error: ".$sq2 . "<br>" . mysqli_error($con);
              echo "Fill the required field";
            }
          }
    }

?>



<form method="POST" action="#">
<form>
            <div class="row ">
            <div class="col-md-12 col-sm-12  form-group  container bg-info">
                <h2  class="pt-2" style="color:white">ADD ITEM</h2>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2 container">
                      <label class="font-weight-bold" for="">01.ITEM ID</label> <span style="color:red;">*</span></label>
                      <input type="text" name="itemid" value="<?php echo $itemid;?>"class="form-control 
                      <?php if(isset($_POST['Add']) && empty($_POST['itemid'])){echo 'is-invalid';}if(isset($_POST['Add']) &&!empty($_POST['itemid'])&& !empty($_POST['itemid'])){echo '  is-valid';} ?>"  
                      id="ITEM" aria-describedby="ITEM" placeholder="ITEM" required="required">
                      <small id="" class="form-text text-muted"></small>
              </div>
              
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
                  <label class="font-weight-bold" for="">02.SUPPLIER ID</label> <span style="color:red;">*</span></label>
                  <select class="custom-select mr-sm-2<?php echo $supplierid;?>"class="form-control <?php if(isset($_POST['Add']) && empty($_POST['supplierid'])){echo 'is-invalid';}if(isset($_POST['Add']) &&!empty($_POST['supplierid'])&& !empty($_POST['supplierid'])){echo '  is-valid';} ?>"  id="supplierid" aria-describedby="supplierid" placeholder="SUPPLIERID" required="required" name="supplierid">
                  
                  <option value="null" selected disabled>--Select supplier_id--</option>
                    <?php          
                    $sql = "SELECT * FROM `inventory_item_supplier`";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                        echo '<option  value="'.$row["supplier_id"].'" required';
                        if($row["supplier_id"]==$supplierid) echo ' selected';
                        echo '>'.$row["supplier_id"].'</option>';
                        }
                    }
                    ?>
                </select>
                     
                      <small id="" class="form-text text-muted"></small>
              </div>
              
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
                  <label class="font-weight-bold" for="">03.ITEM PURCHASE</label> <span style="color:red;">*</span></label>
                  <input type="date" name="inventoryitempurchase" value="<?php echo $inventoryitempurchase;?>" class="form-control <?php if(isset($_POST['Add']) && empty($_POST['inventoryitempurchase'])){echo 'is-invalid';}if(isset($_POST['Add']) &&!empty($_POST['inventoryitempurchase'])&& !empty($_POST['inventoryitempurchase'])){echo '  is-valid';} ?>"  id="datePic" aria-describedby="datePicHelp" required="required">
                  <small id="" class="form-text text-muted"></small>
              </div>
              
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
                  <label class="font-weight-bold" for="cost">04.ITEM DESCRIPTION</label> <span style="color:red;">*</span></label>
                  <input type="text" name="inventoryitemdescription" value="<?php echo $inventoryitemdescription;?>"class="form-control <?php if(isset($_POST['Add']) && empty($_POST['inventoryitemdescription'])){echo 'is-invalid';}if(isset($_POST['Add']) &&!empty($_POST['inventoryitemdescription'])&& !empty($_POST['inventoryitemdescription'])){echo '  is-valid';} ?>" id="inventoryitemdescription" aria-describedby="costHelp" placeholder="ITEM DESCRIPTION" required="required">
                  <small id="" class="form-text text-muted"></small>
          </div>


          <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
                  <label class="font-weight-bold" for="cost">05.ITEM CODE</label> <span style="color:red;">*</span></label>
                  <input type="text" name="itemcode" value="<?php echo $itemcode;?>" class="form-control  <?php if(isset($_POST['Add']) && empty($_POST['itemcode'])){echo 'is-invalid';}if(isset($_POST['Add']) &&!empty($_POST['itemcode'])&& !empty($_POST['itemcode'])){echo '  is-valid';} ?>" id="itemcode" aria-describedby="costHelp" placeholder="ITEM CODE" required="required">
                  <small id="" class="form-text text-muted"></small>
          </div>


      
          <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
                  <label class="font-weight-bold" for="datePic">06.WARRENTY</label> <span style="color:red;">*</span></label>
                  <input type="date"   name="inventoryitemwarranty" value="<?php echo $inventoryitemwarranty;?>" class="form-control <?php if(isset($_POST['Add']) && empty($_POST['inventoryitemwarranty'])){echo 'is-invalid';}if(isset($_POST['Add']) &&!empty($_POST['inventoryitemwarranty'])&& !empty($_POST['inventoryitemwarranty'])){echo '  is-valid';} ?>" id="datePic" aria-describedby="datePicHelp" required="required">
                  <small id="datePicHelp" class="form-text text-muted"></small>
                  
                  </div>
          <div class="col-md-12 col-sm-12 form-group pl-3 pr-3 container">

           
           <a href="Item_view.php" class="btn btn-primary ml-2 mt-3 float-right" >View</a>    
           
         
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
                      <?php } ?>

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>