 <!--START Don't CHANGE THE ORDER-->
 <?php 
$title ="Home | SLGTI";
 include_once("config.php");
 include_once("head.php");
 include_once("menu.php");
 if($_SESSION['user_type']=='ADM'){
 ?>
 <!--END Don't CHANGE THE ORDER-->

 <!--START YOUR CODER HERE-->
<?php

 $StudentID=$Department_id=$StudentName=$DepartmentName=$PNO=$Email=$Finalplace=$Address=$starting=$ending=null;

if(isset($_POST['Add'])){

  if(!empty($_POST['StudentID'])
    &&!empty($_POST['StudentName'])
    &&!empty($_POST['PNO'])
    &&!empty($_POST['Email'])
    &&!empty($_POST['DepartmentName'])
    &&!empty($_POST['Finalplace'])
    &&!empty($_POST['Address'])
    &&!empty($_POST['starting'])
    &&!empty($_POST['ending'])){
      
      $StudentID=$_POST['StudentID'];
      $StudentName=$_POST['StudentName'];
      $PNO=$_POST['PNO'];
      $Email=$_POST['Email'];
      $DepartmentName=$_POST['DepartmentName'];
      $Finalplace=$_POST['Finalplace'];
      $Address=$_POST['Address'];
      $starting=$_POST['starting'];
      $ending=$_POST['ending'];
      

      $sql="INSERT INTO `ojt`(`student_id`, `student_name`,  `phone_no`, `e_mail`, `department_name`, `final_place`, `final_address`,`starting`,`ending`) 
      VALUES ('$StudentID', '$StudentName', '$PNO', '$Email', '$DepartmentName','$Finalplace','$Address','$starting','$ending')";

      if(mysqli_query($con,$sql))
      {
        echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>'.$StudentName.'</strong> Student details inserted
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


<!-- search coding -->
<?php
 if(isset($_GET['edit'])) {
  $StudentID = $_GET['edit'];
  $sql = "SELECT `student_id`, `student_name`, `phone_no`, `e_mail`, `department_name`, `final_place`, `final_address`, `starting`, `ending` FROM `ojt` where `student_id` = $StudentID";
  $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result)==1) {
      $row = mysqli_fetch_assoc($result);
      $StudentID = $row['student_id'];
      $StudentName=$row['student_name']; 
      $PNO=$row['phone_no'];
      $Email=$row['e_mail'];
      $DepartmentName=$row['department_name'];
      $Finalplace=$row['final_place'];
      $Address=$row['final_address'];
      $starting=$row['starting'];
      $ending=$row['ending'];
  }
}



  
  if(isset($_POST['upt'])){
    
    
    // if(!empty($_POST['StudentID'])
    //   &&!empty($_POST['StudentName'])
    //   &&!empty($_POST['PNO'])
    //   &&!empty($_POST['Email'])
    //   &&!empty($_POST['DepartmentName'])
    //   &&!empty($_POST['Finalplace'])
    //   &&!empty($_POST['Address'])
    //   &&!empty($_POST['starting'])
    //   &&!empty($_POST['ending'])){
        
    $StudentID = $_GET['edit'];
    $StudentName=$_POST['StudentName']; 
    $PNO=$_POST['PNO'];
    $Email=$_POST['Email'];
    $DepartmentName=$_POST['DepartmentName'];
    $Finalplace=$_POST['Finalplace'];
    $Address=$_POST['Address'];
    $starting=$_POST['starting'];
    $ending=$_POST['ending'];
    

        $sql = "UPDATE `ojt` SET
          `student_name`='$StudentName',
         `phone_no`='$PNO' ,
         `e_mail`='$Email',
         `department_name`='$DepartmentName',
         `final_place`='$Finalplace',
         `final_address`='$Address',
         `starting`='$starting',
         `ending`='$ending'
          WHERE `student_id`='$StudentID'";
          
        if (mysqli_query($con, $sql)) {
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>  New record Updated </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>    
            ';
            //echo " New record Updated";
        } else {
             echo " Error : ". $sql . 
            "<br>" . mysqli_error($con);
        }
      
} 
?>





<!--add form-->
<div class="row">
    <div class=" col-sm-8">
    <img src="img/SLGTI.png" class="img-fluid" alt="Responsive image">
        <p style="font-size: 45px; font-weight: 700; ">Add Training Place</p>
    </div>

    <div class="col-sm-3 pt-4"> 
      <form class="form-inline" method="GET">
        <input class="form-control mr-2" type="search" name="edit" placeholder="Student ID">  
        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
      </form>
    </div>  
</div>

<div class="row">
  <div class="col-sm-12" >
    <hr color ="black" style="height:1px;">
  </div>
  <br>
  <br>
</div> 

        
        <div class="row">
            <div class="col">
                <form method="POST" action="#">
                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-address-card"></i></i>Student ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text" name= "StudentID" value="<?php echo $StudentID; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['StudentID'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['StudentID'])){echo ' is-valid';} ?>" placeholder="Enter your Student ID" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-user-graduate"></i>Student Name&nbsp;</span>
                    </div>
                    <input type="text" name="StudentName" value="<?php echo $StudentName; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['StudentName'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['StudentName'])){echo ' is-valid';} ?>" placeholder="Enter Full name" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-phone-volume"></i>Phone Number</span>
                    </div>
                    <input type="text" name="PNO" value="<?php echo $PNO; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['PNO'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['PNO'])){echo ' is-valid';} ?>" placeholder="Enter Phone-No" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="far fa-envelope"></i>E-mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text" name="Email" value="<?php echo $Email; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['Email'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Email'])){echo ' is-valid';} ?>" placeholder="Enter Your Email" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="far fa-building"></i>Department&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <select id="DepartmentName" name="DepartmentName" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['DepartmentName'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['DepartmentName'])){echo ' is-valid';} ?>" required>
                    <option value="<?php echo $DepartmentName; ?>" selected disabled>--Select Department--</option>
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
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-industry"></i>Final Place&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text" name="Finalplace" value="<?php echo $Finalplace; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['Finalplace'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Finalplace'])){echo ' is-valid';} ?>" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-map-marker-alt"></i>Place Address&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text" name="Address" value="<?php echo $Address; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['Address'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Address'])){echo ' is-valid';} ?>" placeholder="Enter request place address" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder">Starting Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text" name="starting" value="<?php echo $starting; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['starting'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['starting'])){echo ' is-valid';} ?>" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder">Ending Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text" name="ending" value="<?php echo $ending; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['ending'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['ending'])){echo ' is-valid';} ?>"required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="form-row pt-3">
    <?PHP 
  echo '<div class="btn-group-horizontal">';

    if(isset($_GET['edit'])){
      echo '<button type="submit" value="upt" name="upt" class="btn btn-primary mr-2"><i class="fas fa-user-edit"></i> UPDATE</button>'; 
      

    }if(isset($_GET['delete']))
    {
      echo '<button type="submit"  class="btn btn-danger mr-2"><i class="fas fa-user-slash"></i>DELETE</button>';

    }if(!isset($_GET['delete']) && !isset($_GET['edit'])){
      echo '<button type="submit" value="Add" name="Add" onclick="disable()" class="btn btn-primary mr-2"><i class="fas fa-user-plus"></i>ADD</button>';

    }
      
      echo '</div>';
      ?>
  </div>
                         
    </form>
        </div>
        </div>
        <br>


    

<!--END OF YOUR CODER-->
<?php } ?>
  <!--START Don't CHANGE THE ORDER-->   
<?php 
 include_once("footer.php");
?>
 <!--Don't CHANGE THE ORDER-->