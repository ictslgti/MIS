<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
if($_SESSION['user_type']=='STU'){
  //go to home                                      

?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->


       <!-- Content here -->
       <?php
 $StudentID=$Department_id=$StudentName=$DepartmentName=$PNO=$email=$reqplace=$reqAddress=null;

if(isset($_POST['Add'])){

  if(!empty($_POST['StudentID'])
    &&!empty($_POST['StudentName'])
    &&!empty($_POST['DepartmentName'])
    &&!empty($_POST['PNO'])
    &&!empty($_POST['email'])
    &&!empty($_POST['reqplace'])
    &&!empty($_POST['reqAddress'])){

      $StudentID=$_POST['StudentID'];
      $StudentName=$_POST['StudentName'];
      $DepartmentName=$_POST['DepartmentName'];
      $PNO=$_POST['PNO'];
      $email=$_POST['email'];
      $reqplace=$_POST['reqplace'];
      $reqAddress=$_POST['reqAddress'];
      

      $sql="INSERT INTO `ojt`(`student_id`, `student_name`,  `department_name`, `phone_no`, `e_mail`, `requested_place`,`requested_address`) 
      VALUES ( '$StudentID','$StudentName', '$DepartmentName', '$PNO', '$email' ,'$reqplace','$reqAddress')";

      if(mysqli_query($con,$sql))
      {
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>'.$StudentName.'</strong> Student details updated
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>    
      ';
      }
      else{
        
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>'.$StudentName.'</strong> echo "Error".$sql."<br>".mysqli_error($con);
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
        ';

      }

    }

}
?>


<?php
  if(isset($_GET['edit'])){
        $StudentID=$_GET['edit'];
        $sql="SELECT `student_id`, `student_name`, `department_name`, `phone_no`,  `e_mail`, `requested_place`, `requested_address` FROM `ojt` WHERE `student_id`='$StudentID'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)==1){
            $row=mysqli_fetch_assoc($result);
            $StudentID=$row['student_id'];
            $StudentName=$row['student_name'];
            $DepartmentName=$row['department_name']; 
            $PNO=$row['phone_no'];
            $email=$row['e_mail'];
            $reqplace=$row['requested_place'];
            $reqAddress=$row['requested_address'];
            
        }
        else{
          echo "Error".$sql."<br>".mysqli_error($con);
        }
    
  }
  
?>




          <div class="row">
          <div class="col">
          <br>
          <br>
          <img src="img/SLGTI.png" class="img-fluid" alt="Responsive image">
          <br>
          <h1 class="text-primary">Student Placement Request</h1>
          <br>
          <br>
          </div>
          </div>
        
        <div class="row">
            <div class="col">
                <form method="POST" action="#">
                   
                <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-address-card"></i>Student ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text"  name= "StudentID" value="<?php echo $StudentID; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['StudentID'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['StudentID'])){echo ' is-valid';} ?>" placeholder="Enter your Student ID" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-user-graduate"></i>Student Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text"  name= "StudentName" value="<?php echo $StudentName; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['StudentName'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['StudentName'])){echo ' is-valid';} ?>" placeholder="Enter Full name" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                   

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="far fa-building"></i>Department &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <select  name="DepartmentName" value="<?php echo $DepartmentName; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['DepartmentName'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['DepartmentName'])){echo ' is-valid';} ?>" required>
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
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-phone-volume"></i>Phone Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text"  name= "PNO" value="<?php echo $PNO; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['PNO'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['PNO'])){echo ' is-valid';} ?>" placeholder="Enter Phone-No" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="far fa-envelope"></i>E-mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text"  name= "email" value="<?php echo $email; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['email'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['email'])){echo ' is-valid';} ?>" placeholder="Enter Your Email" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-industry"></i>Request Place&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text"  name= "reqplace" value="<?php echo $reqplace; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['reqplace'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['reqplace'])){echo ' is-valid';} ?>" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-map-marker-alt"></i>Place Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text"  name= "reqAddress" value="<?php echo $reqAddress; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['reqAddress'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['reqAddress'])){echo ' is-valid';} ?>"placeholder="Enter request place address" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                
                   
                    <?php
                    if(isset($_GET['edit']))
                    {
                    echo '<input  type = "submit" value="Update" name="Edit" class="btn btn-outline-success btn-icon-split"></button>'; 
   
                    }else{
                    echo '<input  type="submit"  value = "Requesting..." name="Add"  class="btn btn-outline-primary" ></button>';
   
                    }
                    ?>

                    <button type="submit" class="btn btn-outline-danger" onclick="location.href='index.php'" >&nbsp;&nbsp;cancel</button>
                   
                   
                    
                </form>

            </div>
        </div>
        <br>

<!--END OF YOUR COD-->
                  <?php } ?>

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->