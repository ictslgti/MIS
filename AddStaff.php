<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<!-- ADD STAFF PHP CODNG -->


<!-- Add coding -->
<?PHP
$StaffID=$Department_id=$StaffName=$Address=$DOB=$NIC=$Email=$PNO=$DOJ=$Gender=$EPF=$Position=$Type=$status=null;

if(isset($_POST['Add'])){

  if(!empty($_POST['StaffID'])
    &&!empty($_POST['Department_id'])
    &&!empty($_POST['StaffName'])
    &&!empty($_POST['Address'])
    &&!empty($_POST['DOB'])
    &&!empty($_POST['NIC'])
    &&!empty($_POST['Email'])
    &&!empty($_POST['PNO'])
    &&!empty($_POST['DOJ'])
    &&!empty($_POST['Gender'])
    &&!empty($_POST['EPF'])
    &&!empty($_POST['Position'])
    &&!empty($_POST['Type'])
    &&!empty($_POST['status'])){

     
      $StaffID=$_POST['StaffID'];
      $Department_id=$_POST['Department_id'];
      $StaffName=$_POST['StaffName'];
      $Address=$_POST['Address'];
      $DOB=$_POST['DOB'];
      $NIC=$_POST['NIC'];
      $Email=$_POST['Email'];
      $PNO=$_POST['PNO'];
      $DOJ=$_POST['DOJ'];
      $Gender=$_POST['Gender'];
      $EPF=$_POST['EPF'];
      $Position=$_POST['Position'];
      $Type=$_POST['Type'];
      $status=$_POST['status'];
    
       $sql="INSERT INTO `staff`(`staff_id`, `department_id`, `staff_name`, `staff_address`, `staff_dob`, `staff_nic`, `staff_email`, `staff_pno`, `staff_date_of_join`, `staff_gender`, `staff_epf`, `staff_position`, `staff_type`, `staff_status`) 
      VALUES ('$StaffID','$Department_id','$StaffName','$Address','$DOB','$NIC','$Email','$PNO','$DOJ','$Gender','$EPF','$Position','$Type','$status')";

      if(mysqli_query($con,$sql))
      {
        echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>'.$StaffName.'</strong> Staff details inserted
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>    
        ';
      }
      else{
        
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>'.$StaffName.'</strong> echo "Error".$sql."<br>".mysqli_error($con);
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
        ';
      }

    }

}
?>


<!-- update coding -->
<?PHP
  if(isset($_POST['Update'])){
  
      $Department_id=$_POST['Department_id'];
      $StaffName=$_POST['StaffName'];
      $Address=$_POST['Address'];
      $DOB=$_POST['DOB'];
      $NIC=$_POST['NIC'];
      $Email=$_POST['Email'];
      $PNO=$_POST['PNO'];
      $DOJ=$_POST['DOJ'];
      $Gender=$_POST['Gender'];
      $EPF=$_POST['EPF'];
      $Position=$_POST['Position'];
      $Type=$_POST['Type'];
      $status=$_POST['status'];
      $StaffID=$_POST['StaffID'];


      $sql="UPDATE staff SET department_id='$Department_id', staff_name='$StaffName', staff_address='$Address', staff_dob='$DOB',staff_nic='$NIC',staff_email='$Email',
      staff_pno='$PNO',staff_date_of_join='$DOJ',staff_gender='$Gender',staff_epf='$EPF',staff_position='$Position',staff_type='$Type',
      staff_status='$status' WHERE staff_id='$StaffID'";

      if(mysqli_query($con,$sql))
      {
        echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>'.$StaffID.'</strong> Staff details updated
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>    
        ';
      }
      else{
        
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>'.$StaffID.'</strong> echo "Error".$sql."<br>".mysqli_error($con);
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
        ';
      }


    }
  
?>





<!-- search coding -->
<?php
  if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $sql="SELECT * FROM `staff` WHERE `staff_id`='$id'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)==1){
      
            $row=mysqli_fetch_assoc($result);
            $StaffID=$row['staff_id'];
            $StaffName=$row['staff_name'];
            $Address=$row['staff_address'];
            $DOB=$row['staff_dob'];
            $NIC=$row['staff_nic'];
            $Email=$row['staff_email'];
            $PNO=$row['staff_pno'];
            $DOJ=$row['staff_date_of_join'];
            $EPF=$row['staff_epf'];
            $Department_id = $row['department_id'];
            $Gender= $row['staff_gender'];
            $Position= $row['staff_position'];
            $Type= $row['staff_type'];
            $status=$row['staff_status'];
        }
        else{
          echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>'.$StaffID.'</strong> echo "Error".$sql."<br>".mysqli_error($con);
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
        ';
        }
    }
  
?>


<!-- Add staff design  -->
<div class="row">
    <div class=" col-sm-8">
        <p style="font-size: 45px; font-weight: 700; ">STAFF Personal Information</p>
    </div>

    <div class="col-sm-3 pt-4"> 
      <form class="form-inline" method="GET">
        <input class="form-control mr-2" type="search" name="edit" placeholder="Staff ID">  
        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
      </form>
    </div>  
</div>

<div class="row">
  <div class="col-sm-12" >
    <hr color ="black" style="height:1px;">
  </div>
</div>  

<form method="POST" action="#">
  <div class="form-row">
    <div class="form-group col-lg-4">
        <label for="text" class="font-weight-bolder pl-1" >Staff_ID :</label>
        <input type="text" id="StaffID" name="StaffID" value="<?php echo $StaffID; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['StaffID'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['StaffID'])){echo ' is-valid';} ?>" placeholder="Staff ID">
    </div>
    <div class="form-group col-lg-4">
      <label for="text" class="font-weight-bolder pl-1">Department</label><br>
        <select class="custom-select mr-sm-2<?php  if(isset($_POST['Add']) && empty($_POST['Department_id'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Department_id'])){echo ' is-valid';} ?>"  id="Department_id" name="Department_id">
        <option value="null" selected disabled>--Select Department--</option>
            <?php          
            $sql = "SELECT * FROM `department`";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                echo '<option  value="'.$row["department_id"].'" required';
                if($row["department_id"]==$Department_id) echo ' selected';
                echo '>'.$row["department_name"].'</option>';
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group col-lg-4">
        <label for="text" class="font-weight-bolder pl-1"  >Staff_Name :</label>
        <input type="text" name="StaffName" value="<?php echo $StaffName; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['StaffName'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['StaffName'])){echo ' is-valid';} ?>"  placeholder="Full Name">
    </div>
  </div>

  <div class="form-row pt-3">
    <div class="form-group col-lg-4">
      <label for="text" class="font-weight-bolder pl-1" >Address :</label><br>
      <input type="text" name="Address" value="<?php echo $Address; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['Address'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['StaffID'])){echo ' is-valid';} ?>"  placeholder="Address" ><br>
    </div>
    <div class="form-group col-lg-4">
      <label for="text" class="font-weight-bolder pl-1">Date_of_birth</label><br>
      <input type="text" name="DOB" value="<?php echo $DOB; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['DOB'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['DOB'])){echo ' is-valid';} ?>"  placeholder="DOB"><br>
    </div>
    <div class="form-group col-lg-4">
      <label for="text" class="font-weight-bolder pl-1">NIC :</label><br>
      <input type="text" name="NIC" value="<?php echo $NIC; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['NIC'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['NIC'])){echo ' is-valid';} ?>"  placeholder="NIC" ><br>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-lg-4">
      <label for="text" class="font-weight-bolder pl-1">Email :</label><br>
      <input type="text" name="Email" value="<?php echo $Email; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['Email'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Email'])){echo ' is-valid';} ?>"  placeholder="Email " ><br>
    </div>
    <div class="form-group col-lg-4">
      <label for="text" class="font-weight-bolder pl-1">Telephone no :</label><br>
      <input type="text" name="PNO" value="<?php echo $PNO; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['PNO'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['PNO'])){echo ' is-valid';} ?>"  placeholder="Telephone no"><br>
    </div>
    <div class="form-group col-lg-4">        
      <label for="text" class="font-weight-bolder pl-1">Date_of_Join :</label><br>
      <input type="text" name="DOJ" value="<?php echo $DOJ; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['DOJ'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['DOJ'])){echo ' is-valid';} ?>"  placeholder="Date of Join"><br> 
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-lg-4">
      <label for="text" class="font-weight-bolder pl-1">Gender</label><br>
        <select class="custom-select mr-sm-2<?php  if(isset($_POST['Add']) && empty($_POST['Gender'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Gender'])){echo ' is-valid';} ?>"  id="Gender" name="Gender">
              <option selected disabled>Choose Gender</option>
              <option value="Male"
               <?php if($Gender=="Male")  echo 'selected';?>
               >Male</option>
               
              <option value="Female"
              <?php if($Gender=='Female') echo ' selected';?> 
              >Female</option>

              <option value="Transgender"
              <?php if($Gender=='Transgender') echo ' selected';?> 
              >Transgender</option>
        </select>
    </div>
    <div class="form-group col-lg-4">
      <label for="text" class="font-weight-bolder pl-1" >EPF NO :</label>
      <input type="text" name="EPF" value="<?php echo $EPF; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['EPF'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['EPF'])){echo ' is-valid';} ?>"  placeholder="EPF NO" >
    </div>
    <div class="form-group col-lg-4">  
    <label class="font-weight-bolder" for="inlineFormCustomSelect">Position</label>
          <select class="custom-select<?php  if(isset($_POST['Add']) && empty($_POST['Position'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Position'])){echo ' is-valid';} ?>"  id="Position" name="Position">
          <option value="null" selected disabled>--Select Position--</option>
            <?php          
              $sql = "SELECT * FROM `staff_position_type` ORDER BY `staff_position`";
              $result = mysqli_query($con, $sql);
              if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                  echo '<option  value="'.$row["staff_position_type_id"].'" required';
                  if($row["staff_position_type_id"]==$Position) echo ' selected';
                  echo '>'.$row["staff_position_type_name"].'</option>';
                  }
              }
              ?>
            </select>
    </div>
    <div class="form-group col-lg-4 pt-2">
      <label for="text" class="font-weight-bolder pl-1">Type :</label><br>
      <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Type</label>
      <select class="custom-select mr-sm-2<?php  if(isset($_POST['Add']) && empty($_POST['Type'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Type'])){echo ' is-valid';} ?>"  id="Type" name="Type">
            <option selected disabled>Choose Type</option>
            <option value="Permanent"
            <?php if($Type=="Permanent")  echo 'selected';?>
            >Permanent Staff</option>

            <option value="On Contract"
            <?php if($Type=="On Contract")  echo 'selected';?>
            >On Contract</option>

            <option value="Visiting Lecturer"
            <?php if($Type=="Visiting Lecturer")  echo 'selected';?>
            >Visiting Lecturer</option>
      </select>
    </div>

    
    <div class="form-group col-lg-4 pt-2">
      <label for="text" class="font-weight-bolder pl-1">Status :</label><br>
      <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Status</label>
      <select class="custom-select mr-sm-2<?php  if(isset($_POST['Add']) && empty($_POST['status'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['status'])){echo ' is-valid';} ?>"  name="status">
            <option selected disabled>Choose Status</option>
            <option value="Working"
            <?php if($status=="Working")  echo 'selected';?>
            >Working Staff</option>

            <option value="Terminated"
            <?php if($status=="Terminated")  echo 'selected';?>
            >Terminated</option>

            <option value="Resigned"
            <?php if($status=="Resigned")  echo 'selected';?>
            >Resigned</option>
      </select>
    </div>
  </div>

  <div class="form-row pt-3">
    <?PHP 
  echo '<div class="btn-group-horizontal">';

    if(isset($_GET['edit'])){
      echo '<button type="submit"  value="Update" name="Update" class="btn btn-primary mr-2"><i class="fas fa-user-edit"></i>UPDATE</button>'; 
      echo'<button  class="btn btn-primary mr-2"><i class="fas fa-redo"></i>REFRESH</button>';

    }if(isset($_GET['delete']))
    {
      echo '<button type="submit"  class="btn btn-danger mr-2"><i class="fas fa-user-slash"></i>DELETE</button>';

    }if(!isset($_GET['delete']) && !isset($_GET['edit'])){
      echo '<button type="submit" value="Add" name="Add" onclick="disable()" class="btn btn-primary mr-2"><i class="fas fa-user-plus"></i>   ADD</button>';

    }
      
      echo '</div>';
      ?>
  </div>
</form>
<!--END OF YOUR COD-->

<!-- script  -->
<script>
  function disable() {
  document.getElementById("name").disabled = false;
  }
</script>




<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
