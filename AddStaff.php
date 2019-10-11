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
<?PHP
$StaffID=$Department_id=$StaffName=$Address=$DOB=$NIC=$Email=$PNO=$DOJ=$Gender=$EPF=$Position=$Type=null;

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
    &&!empty($_POST['Type'])){
      
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

      $sql="INSERT INTO `staff`(`staff_id`, `department_id`, `staff_name`, `staff_address`, `staff_dob`, `staff_nic`, `staff_email`, `staff_pno`, `staff_date_of_join`, `staff_gender`, `staff_epf_no`, `staff_position`, `staff_type`) 
      VALUES ('$StaffID','$Department_id','$StaffName','$Address','$DOB','$NIC','$Email','$PNO','$DOJ','$Gender','$EPF','$Position','$Type')";

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
<!-- Add staff design  -->
<div class="row">
    <div class=" col-sm-8">
        <p style="font-size: 45px; font-weight: 700; ">STAFF Personal Information</p>
    </div>

    <div class="col-sm-3"> 
      <form class="form-inline" method="GET">
        <input class="form-control mr-2" type="search" name="search" placeholder="Staff ID" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
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
    <div class="form-group col-lg-4 pt-3">
        <label for="text" class="font-weight-bolder pl-1" >Staff_ID :</label>
        <input type="text" name="StaffID" value="<?php echo $StaffID; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['StaffID'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['StaffID'])){echo ' is-valid';} ?>" placeholder="Staff ID">
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
                echo '<option  value="'.$row["department_id"].'" required>'.$row["department_name"].'</option>';
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
              <option value="Permanent Staff">Male</option>
              <option value="Temporary  Staff">Female</option>
              <option value="Temporary  Staff">Transgender</option>
        </select>
    </div>
    <div class="form-group col-lg-4">
      <label for="text" class="font-weight-bolder pl-1" >EPF NO :</label>
      <input type="text" name="EPF" value="<?php echo $EPF; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['EPF'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['EPF'])){echo ' is-valid';} ?>"  placeholder="EPF NO" >
    </div>
    <div class="form-group col-lg-4">  
    <label class="font-weight-bolder" for="inlineFormCustomSelect">Position</label>
          <select class="custom-select<?php  if(isset($_POST['Add']) && empty($_POST['Position'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Position'])){echo ' is-valid';} ?>"  id="Position" name="Position">
              <option selected disabled>Choose Postition</option>
              <option value="Director">Director</option>
              <option value="Deputy Principal (Academics)">Deputy Principal (Academics)</option>
              <option value="Deputy Principal (Industrial)">Deputy Principal (Industrial)</option>
              <option value="Registrar">Registrar</option>
              <option value="Accountant">Accountant</option>
              <option value="Head of Department">Head of Department</option>
              <option value="Lectures">Lectures</option>
              <option value="HoD Industrial Relations">HoD Industrial Relations</option>
              <option value="Management Assistants">Management Assistants</option>
              <option value="Human Resource Officer">Human Resource Officer</option>
              <option value="IT System Analyst">IT System Analyst</option>
              <option value="Premises Officer">Premises Officer</option>
              <option value="Quality Management">Quality Management</option>
              <option value="Student Affairs Officer">Student Affairs Officer</option>
              <option value="Warden">Warden</option>
            </select>
    </div>
    <div class="form-group col-lg-4 pt-2">
      <label for="text" class="font-weight-bolder pl-1">Type :</label><br>
      <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Type</label>
      <select class="custom-select mr-sm-2<?php  if(isset($_POST['Add']) && empty($_POST['Type'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Type'])){echo ' is-valid';} ?>"  id="Type" name="Type">
            <option selected disabled>Choose Type</option>
            <option value="Permanent Staff">Permanent Staff</option>
            <option value="Temporary  Staff">Temporary  Staff</option>
      </select>
    </div>
  </div>

  <div class="form-row pt-3">
    <?PHP 
  echo '<div class="btn-group-horizontal">';

    if(isset($_GET['edit'])){
      echo '<button type="submit" class="btn btn-primary mr-2"><i class="fas fa-user-edit"></i>UPDATE</button>'; 
      echo'<button type="submit" class="btn btn-primary mr-2"><i class="fas fa-redo"></i>REFRESH</button>';

    }if(isset($_GET['delete']))
    {
      echo '<button type="submit" class="btn btn-danger mr-2"><i class="fas fa-user-slash"></i>DELETE</button>';

    }if(!isset($_GET['delete']) && !isset($_GET['edit'])){
      echo '<button type="submit" value="Add" name="Add" class="btn btn-primary mr-2"><i class="fas fa-user-plus"></i>   ADD</button>';

    }
      
      echo '</div>';
      ?>
  </div>
</form>
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
