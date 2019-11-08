<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->
<!--BLOCK#2 START YOUR CODE HERE -->




<?php
// retrive data for edit 
$id =  $fullname= $address = $email = $dob= $blood_group = $designation =$joint_date = $gender =$weight =$reference_id =null ;
if(isset($_GET['edit']))
{
    $id = $_GET['edit'];
    $sql_o = " SELECT * from donor WHERE d_id= '$id'";
    $result = mysqli_query($con,$sql_o);
    if(mysqli_num_rows($result)==1)                                               
        {
         
          $row = mysqli_fetch_assoc($result);
          $id = $row['d_id'];
          $fullname = $row['fullname'];
          $address =  $row['address'];
          $email = $row['email'];
          $dob = $row['dob'];
          $blood_group = $row['blood_group'];
          $designation = $row['designation'];
          $joint_date = $row['joint_date'];
          $gender = $row['gender'];
          $weight = $row['weight'];
          $reference_id= $row['reference_id'];
        }
        else{
          echo "Error".$sql_o."<br>".mysqli_error($con);
        }
}
                                    
// retrive data
if(isset($_GET['submit']))
{
  
   $designation=$_GET['designation'];
   $reference_id = $_GET['submit'];
   if($designation=='staff'){
  
      $sql_t="SELECT * FROM staff WHERE staff_id='$reference_id'";
      $result=mysqli_query($con,$sql_t);
        if(mysqli_num_rows($result)==1){
          $row=mysqli_fetch_assoc($result);
          $fullname = $row['staff_name'];
          $address =  $row['staff_address'];
          $email = $row['staff_email'];
          $dob = $row['staff_dob'];
          $gender = $row['staff_gender'];
        }
   }
   else{
     $sql_f="SELECT * FROM  student WHERE student_id='$reference_id'";
    $result=mysqli_query($con,$sql_f);
        if(mysqli_num_rows($result)==1){
          $row=mysqli_fetch_assoc($result);
          
          $fullname = $row['student_fullname'];
          $address =  $row['student_gender'];
          $email = $row['student_email'];
          $dob = $row['student_dob'];
          $gender = $row['student_address'];
          $blood_group = $row['student_blood'];
        }
     
   }
  }
 
    
  
?>


<?php
// Add coding
if(isset($_GET['Add'])){
  $sql_y = "INSERT INTO `donor`(`address`,`email`, `dob`, `blood_group`, `designation`, `joint_date`, `gender`, `weight`, `reference_id`, `fullname`) 
  VALUES ('$address','$email','$dob','$blood_group','$designation',
  '$joint_date','$gender','$weight','$reference_id','$fullname');";
  
  $result = mysqli_query ($con, $sql_y);
  if (mysqli_num_rows($result)>0)
   {
    while($row_y = mysqli_fetch_assoc($result))
    { 
  
     
     
      
  $fullname = $_POST['fullname'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $dob = $_POST['dob'];
  $blood_group = $_POST['blood_group'];
  $designation = $_POST['designation'];
  $joint_date = $_POST['joint_date'];
  $gender = $_POST['gender'];
  $weight = $_POST['weight'];
  $reference_id = $_POST['reference_id'];
    }}
     
     if(mysqli_query($con,$sql_y))
     {
      echo '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>'.$id.'</strong> inserted sucessfully
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>    
    ';
     }
     else{
      
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>'.$id.'</strong> echo "Error".$sql."<br>".mysqli_error($con);
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    
    ';                                                                                                                                                                
      }
   }
  
  
   ?>

<?php 
// for edit
if(isset($_GET['Edit'])){
  echo 'gdf';
  if (!empty($_POST['id']) 
  && !empty($_POST['fullname'])
  && !empty($_POST['address'])
  && !empty($_POST['email'])
  && !empty($_POST['dob'])
  && !empty($_POST['blood_group'])
  && !empty($_POST['designation']) 
  && !empty($_POST['joint_date']) 
  && !empty($_POST['gender']) 
  && !empty($_POST['weight'])
  && !empty($_POST['reference_id']) 
  && !empty($_GET['edit'])){
  
    
    
     $id = $_POST['id'];
     $fullname = $_POST['fullname'];
      $address = $_POST['address'];
      $email = $_POST['email'];
      $dob = $_POST['dob'];
      $blood_group = $_POST['blood_group'];
      $designation = $_POST['designation'];
      $joint_date = $_POST['joint_date'];
      $gender = $_POST['gender'];
      $weight = $_POST['weight']; 
      $reference_id = $_POST['reference_id'];
       $reference_id = $_GET['edit'];
      $sql = "UPDATE `donor` SET `d_id`='$id',`address`='$address',`email`='$email',`dob`='$dob',`blood_group`='$blood_group',`designation`='$designation',
      `joint_date`='$joint_date',`gender`='$gender',`weight`='$weight',
      `fullname`='$fullname' WHERE reference_id= '$reference_id'";
      if(mysqli_query($con,$sql))
      {
        echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>'.$id.'</strong> update Succesfully
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>    
        ';
      }
      else{
        
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>'.$id.'</strong> cannot be done
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
        ';
      }
    }
}
?>












<form method="GET" action="#">
<div class="intro p-5 mb-5 border border-light rounded">
<div class="shadow  p-3 mb-5 bg-white rounded">
<div class="highlight-blue">        
<div class="intro">
<h1 class="text-center"><i class="fas fa-user-plus"></i>Donor Request Form</h1>
<br>
</div>
</div>
</div>
<button type="button" class="btn btn-light" type="reset" VALUE="Refresh"><div class="spinner-grow" role="status">
<span class="sr-only">Loading...</span>
</div> </button> 
<!-- <INPUT TYPE="button" onClick="history.go(0)" VALUE="Refresh"> -->


<!-- <div class="row">
<div class="col-sm-6 " ></div>
<div class="col-sm-3 " > 
<form class="form-inline md-form form-sm mt-4" method="GET">
 <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="search" placeholder="Search_ID" aria-label="Search" name="edit"  > 
 <button type="submit" class="btn btn-outline-thead-light  form-control form-control-sm rounded-pill"> <i class="fas fa-search ml-3" aria-hidden="true"></i></button>
</form>
</div>
</div> -->




<div class="row">   
<div class="col-12">

<p style="font-size:20px;"> Personal Info <hr color ="black" style="height:1px;"></p><br>       
</div>
</div>


<div class="row">   
<div class="form-group col-md-6">
<label for="inputState"><i class="fas fa-chalkboard-teacher"></i>&nbsp;Designation</label>
<select id="inputState" value="<?php echo $designation; ?>" name="designation" class="form-control">
<option selected disabled>---choose---</option>
<option value="staff"<?php if($designation=="staff")  echo 'selected';?>>Staff</option>
<option value="student" <?php if($designation=="student")  echo 'selected';?>>Student</option>
</select>
</div>
<div class="col-3">
<label for="inputEmail4"><i class="far fa-id-card"></i>&nbsp;Reference_id</label>                
<input type="text" value="<?php echo $reference_id; ?>" class="form-control"  name="submit" placeholder="reference_id" required >

</div>
<div class="col-3" >
  
<button type="submit"  class="btn btn-outline-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Submit</button>
</div>
</div>






<div class="row">   
<div class="col-12">
<label for="inputEmail4"><i class="far fa-id-card"></i>&nbsp;D_id</label>
<input type="text" value="<?php echo $id; ?>" class="form-control"  name="id" placeholder="D_id" disabled placeholder="disabled" >
</div>
</div>




    
<div class="row"> 
<div class="col-6">
<label for="inputname"><i class="fas fa-users"></i>&nbsp;Fullname</label>
<input type="text" value="<?php echo $fullname; ?>" class="form-control"  name="fullname" disabled placeholder="disabled">
</div>

<div class="col-6">
<label for="inputAddress"><i class="far fa-address-card"></i>&nbsp;Address</label>
<textarea name="message"value="<?php echo $address; ?>" class="rounded  form-control bg-light text-black"  type="text"   name="address" placeholder="Disabled input"  disabled ><?php echo $address; ?></textarea>
</div>
</div>

<div class="row"> 
<div class="form-group col-md-6">
<label for="inputPassword4"><i class="fas fa-envelope-square"></i>&nbsp;email</label>
<div class="input-group-prepend">
<div class="input-group-text">@</div>
<input type="text"value="<?php echo $email; ?>" class="form-control"    name="email" disabled placeholder="disabled">
</div>
     </div> 
     

<div class="col-4">
<label for="inputAddress"><i class="fas fa-calendar-alt"></i>&nbsp;DOB</label>
<input type="date" value="<?php echo $dob; ?>"class="form-control" name="dob" disabled placeholder="disabled">
</div>
<div class="col-2">
<label for="inputAddress2"><i class="fas fa-map-marker"></i>&nbsp;Blood group</label>
<input type="text" value="<?php echo $blood_group; ?>"class="form-control" name="blood_group"  selected disabled placeholder="disabled" >
</div>
</div>


  
<div class="form-row">
<div class="form-group col-md-6">
<label for="inputCity"><i class="fas fa-calendar-alt"></i>&nbsp;join date</label>
<input type="date" value="<?php echo $joint_date; ?>" class="form-control"  name="joint_date"   >
</div>

<div class="form-group col-md-4">
<label for="inputState"><i class="fas fa-transgender"></i>&nbsp;gender</label>
<input type="text" value="<?php echo $gender; ?>"class="form-control" name="gender"  selected disabled placeholder="disabled" >
</div>
    

<div class="form-group col-md-2">
<label for="inputZip"><i class="fas fa-weight-hanging"></i>&nbsp;weight</label>
<div class="input-group-prepend">
<div class="input-group-text">Kg</div>
<input type="text"value="<?php echo $weight; ?>" class="form-control" name="weight" placeholder="weight in Kg" >
</div>
</div>

<?php
  if(isset($_GET['edit']))
  {
    echo '<input id="button" type = "submit" value="Update" name="Edit" class="btn btn-outline-success btn-icon-split" >'; 
   
}else{
    echo '<button type="submit" value="Add" name="Add" class="btn btn-primary">ADD</button>';
   
}
?>



</form>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->