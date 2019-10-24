<?php
$title = "Department Details | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>

 <!-- end default code -->

<!-- start my code -->


<?PHP

// Add coding
$supplierid=$suppliername=$supplierphonenumber=$supplieremail=$supplieraddress=null;

if(isset($_POST['Add'])){
  if(!empty($_POST['supplierid'])
    &&!empty($_POST['suppliername'])
    &&!empty($_POST['supplierphonenumber'])
    &&!empty($_POST['supplieremail'])
    &&!empty($_POST['supplieraddress'])){
      
      $supplierid=$_POST['supplierid'];
      $suppliername=$_POST['suppliername'];
      $supplierphonenumber=$_POST['supplierphonenumber'];
      $supplieremail=$_POST['supplieremail'];
      $supplieraddress=$_POST['supplieraddress'];
    
      

     $sql="INSERT INTO `inventory_item_supplier`(`supplier_id`, `supplier_name`, `supplier_phone_number`, `supplier_email`, `supplier_address`)
      VALUES ('$supplierid','$suppliername','$supplierphonenumber', '$supplieremail', '$supplieraddress')";

      if(mysqli_query($con,$sql))
      {
        echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>'.$supplierid.'</strong> Staff details inserted
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>    
        ';
      }
      else{
        
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>'.$supplierid.'</strong> echo "Error".$sql."<br>".mysqli_error($con);
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
                <h2  class="pt-2" style="color:white">ADD SUPPLIER</h2>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2 container">
                      <label class="font-weight-bold" for="">01.SUPPLIER ID</label> <span style="color:red;">*</span></label>
                      <input type="text" name="supplierid" value="<?php echo $supplierid;?> "class="form-control <?php if(isset($_POST['Add']) && empty($_POST['supplierid'])){echo 'is-invalid';}if(isset($_POST['Add']) &&!empty($_POST['supplierid'])&& !empty($_POST['supplierid'])){echo '  is-valid';} ?>"  id="supplierid" aria-describedby="supplierid" placeholder="SUPPLIERID" required="required">
                      <small id="" class="form-text text-muted"></small>
              </div>
              
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
                  <label class="font-weight-bold" for="">02.SUPPLIER NAME</label> <span style="color:red;">*</span></label>
                  <input type="text" name="suppliername" value="<?php echo $suppliername;?>" class="form-control<?php if(isset($_POST['Add']) && empty($_POST['suppliername'])){echo 'is-invalid';}if(isset($_POST['Add']) &&!empty($_POST['suppliername'])&& !empty($_POST['suppliername'])){echo '  is-valid';} ?>" id="" aria-describedby="suppliername" placeholder=" Name" required="required">
                  <small id="" class="form-text text-muted"></small>
              </div>
              
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
                  <label class="font-weight-bold" for="">02.SUPPLIER EMAIL</label> <span style="color:red;">*</span></label>
                  <input type="text" name="supplieremail" value="<?php echo $supplieremail;?>" class="form-control<?php if(isset($_POST['Add']) && empty($_POST['supplieremail'])){echo 'is-invalid';}if(isset($_POST['Add']) &&!empty($_POST['supplieremail'])&& !empty($_POST['suppliername'])){echo '  is-valid';} ?>" id="" aria-describedby="supplieremail" placeholder=" supplieremail" required="required">
                  <small id="" class="form-text text-muted"></small>
              </div>
            
              
              
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
                  <label class="font-weight-bold" for="cost">04. SUPPLIER PHONE NUMBER</label> <span style="color:red;">*</span></label>
                  <input type="text" name="supplierphonenumber" value="<?php echo $supplierphonenumber;?>" class="form-control <?php if(isset($_POST['Add']) && empty($_POST['supplierphonenumber'])){echo 'is-invalid';}if(isset($_POST['Add']) &&!empty($_POST['supplierphonenumber'])&& !empty($_POST['supplierphonenumber'])){echo '  is-valid';} ?>" id="" aria-describedby="supplierphonenumber" placeholder="supplier phone number" required="required">
                  <small id="" class="form-text text-muted"></small>
          </div>

          <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
                  <label class="font-weight-bold" for="cost">05. SUPPLIER ADDRESS</label> <span style="color:red;">*</span></label>
                  <input type="text" name="supplieraddress" value="<?php echo $supplieraddress;?>" class="form-control <?php if(isset($_POST['Add']) && empty($_POST['supplieraddress'])){echo 'is-invalid';}if(isset($_POST['Add']) &&!empty($_POST['supplieraddress'])&& !empty($_POST['supplieraddress'])){echo '  is-valid';} ?>" id="" aria-describedby="supplieraddress" placeholder="supplier address" required="required">
                  <small id="" class="form-text text-muted"></small>
          </div>


          
          <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
              
          <input class="btn btn-dark ml-2 mt-3 float-right" type="reset" value="Reset">
           <button type="submit" value="Add" name="Add"  class="btn btn-primary ml-2 mt-3 float-right">Add </button>
                        <button type="submit" class="btn btn-primary ml-2 mt-3 float-right"  onclick="location.href='Supplier_view.php'">view </button>
                        <button type="submit" class="btn btn-primary ml-2 mt-3 float-right">update </button>
            </div>
            </div>
      </form>




















<!-- end my code\ -->


<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>