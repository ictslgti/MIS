<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
if($_SESSION['user_type']=='STU'){
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->


          <!-- Content here -->
          <?php
 $StudentID=$Department_id=$StudentName=$DepartmentName=$reqdis1=$reqdis2=$salary=$comment=null;

if(isset($_POST['Add'])){

  if(!empty($_POST['StudentID'])
    &&!empty($_POST['StudentName'])
    &&!empty($_POST['DepartmentName'])
    &&!empty($_POST['reqdis1'])
    &&!empty($_POST['reqdis2'])
    &&!empty($_POST['salary'])
    &&!empty($_POST['comment'])){

      $StudentID=$_POST['StudentID'];
      $StudentName=$_POST['StudentName'];
      $DepartmentName=$_POST['DepartmentName'];
      $reqdis1=$_POST['reqdis1'];
      $reqdis2=$_POST['reqdis2'];
      $salary=$_POST['salary'];
      $comment=$_POST['comment'];
      

      $sql="INSERT INTO `ojt`(`student_id`, `student_name`,  `department_name`, `requested_district1`, `requested_district2`, `want_salary`,`comment_1`) 
      VALUES ( '$StudentID','$StudentName', '$DepartmentName', '$reqdis1', '$reqdis2' ,'$salary','$comment')";

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
        $sql="SELECT `student_id`, `student_name`, `department_name`, `requested_district1`,  `requested_district2`, `want_salary`, `comment_1` FROM `ojt` WHERE `student_id`='$StudentID'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)==1){
            $row=mysqli_fetch_assoc($result);
            $StudentID=$row['student_id'];
            $StudentName=$row['student_name'];
            $DepartmentName=$row['department_name']; 
            $reqdis1=$row['requested_district1'];
            $reqdis2=$row['requested_district2'];
            $salary=$row['want_salary'];
            $comment=$row['comment_1'];
            
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
          <h1 class="text-primary">Student OJT Request</h1>
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
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-user-graduate"></i>Student ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text" name="StudentID" value="<?php echo $StudentID; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['StudentID'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['StudentID'])){echo ' is-valid';} ?>"  placeholder="Enter your Student ID" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-address-card"></i>Student Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text" name="StudentName" value="<?php echo $StudentName; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['StudentName'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['StudentName'])){echo ' is-valid';} ?>" placeholder="Enter Full name" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="far fa-building"></i>Department &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <select name="DepartmentName" value="<?php echo $DepartmentName; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['DepartmentName'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['DepartmentName'])){echo ' is-valid';} ?>" id="Dept" required>
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
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-map-marker-alt"></i>District 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text" name="reqdis1" value="<?php echo $reqdis1; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['reqdis1'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['reqdis1'])){echo ' is-valid';} ?>" id="dst1" placeholder="Enter your wanted district" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-map-marker-alt"></i>  District 2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text" name="reqdis2" value="<?php echo $reqdis2; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['reqdis2'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['reqdis2'])){echo ' is-valid';} ?>" id="dst2" placeholder="Enter your wanted other district" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder">Do you want Salary&nbsp;</span>
                    </div>
                    <input type="text" name="salary" value="<?php echo $salary; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['salary'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['salary'])){echo ' is-valid';} ?>" id="dst2" placeholder="Enter Yes / No" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-user-graduate"></i>Comments&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text" name="comment" value="<?php echo $comment; ?>" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['comment'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['comment'])){echo ' is-valid';} ?>">
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