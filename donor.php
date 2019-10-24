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


$id =  $fullname= $address = $email = $dob= $blood_group = $designation =$joint_date = $gender =$weight =$reference_id =null ;
if(isset($_GET['edit']))
{

    $reference_id = $_GET['edit'];
    $sql = " SELECT * from donor WHERE reference_id= '$reference_id'";
    $result = mysqli_query($con,$sql);
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
          echo "Error".$sql."<br>".mysqli_error($con);
        }
}







// Add coding
if(isset($_POST['Add']))
{
echo"gfrug";
  if( !empty($_POST['id']) && !empty($_POST['fullname']) && !empty($_POST['address']) && !empty($_POST['email'])
  && !empty($_POST['dob'])&& !empty($_POST['blood_group'])&& !empty($_POST['designation'])&& !empty($_POST['joint_date'])
  && !empty($_POST['gender'])&& !empty($_POST['weight'])&& !empty($_POST['reference_id']))
  {
   
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
     $sql = "INSERT INTO `donor`(`d_id`, `address`, `email`, `dob`, `blood_group`, `designation`, `joint_date`, `gender`, `weight`, `reference_id`, `fullname`) 
     VALUES ('$id','$fullname','$address','$email','$dob','$blood_group','$designation','$joint_date','$gender','$weight','$reference_id')";
     if(mysqli_query($con,$sql))
     {
         echo "Record has been Inserted succesfully";
     }
     else{
      echo "Error:" .$sql. "<br>". mysqli_error($con);
      }
   }
}


if(isset($_POST['Edit'])){
  if (!empty($_POST['id']) && !empty($_POST['fullname'])&& !empty($_POST['address'])&& !empty($_POST['email']) && !empty($_POST['dob'])
  && !empty($_POST['blood_group']) && !empty($_POST['designation']) && !empty($_POST['joint_date']) && !empty($_POST['gender']) && !empty($_POST['weight'])
  && !empty($_POST['reference_id']) && !empty($_GET['edit']))
  {
      $id = $_POST['id'];
      $date = $_POST['fullname'];
      $programme = $_POST['address'];
      $email = $_POST['email'];
      $dob = $_POST['dob'];
      $blood_group = $_POST['blood_group'];
      $designation = $_POST['designation'];
      $joint_date = $_POST['joint_date'];
      $gender = $_POST['gender'];
      $weight = $_POST['weight']; 
      $reference_id = $_POST['reference_id'];
      $id = $_GET['edit'];
      $sql = "UPDATE `donor` SET `d_id`='$id',`address`='$address'',`email`='$email',`dob`='$dob',`blood_group`='$blood_group',`designation`='$designation',
      `joint_date`='$joint_date',`gender`='$gender',`weight`='$weight',
      `reference_id`='$reference_id',`fullname`='$fullname' WHERE d_id= '$id'";
      if (mysqli_query($con, $sql)){
          echo 'update successfully'; 
      }else
      {
          echo "Error:" .$sql. "<br>". mysqli_error($con);
      }
  }
}

?>

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


<div class="row">

<div class="col-sm-6 " ></div>
<div class="col-sm-3 " > 
<form class="form-inline md-form form-sm mt-4" method="GET">
  <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="search" placeholder="Search_ID" aria-label="Search"  name="edit" > 
  <button type="submit" class="btn btn-outline-thead-light  form-control form-control-sm rounded-pill"> <i class="fas fa-search ml-3" aria-hidden="true"></i></button>
</form>
 </div>
       </div>




         <div class="row">   
         <div class="col-12">
         <form>
         <p style="font-size:20px;"> Personal Info <hr color ="black" style="height:1px;"></p><br>
         </form>
</div>
</div>



<form>
<div class="row">   
         <div class="col-6">
                       <label for="inputEmail4"><i class="far fa-id-card"></i>&nbsp;D_id</label>
                       <input type="text" value="<?php echo $id; ?>" class="form-control"  name="id" placeholder="D_id" required>
         </div>

         <div class="col-6">
                       <label for="inputEmail4"><i class="far fa-id-card"></i>&nbsp;Reference_id</label>                
                       <input type="text" value="<?php echo $reference_id; ?>" class="form-control"  name="reference_id" placeholder="reference_id" required>
        </div>
         <div class="form-group col-md-12">
      <label for="inputState"><i class="fas fa-chalkboard-teacher"></i>&nbsp;Designation</label>
      <select id="inputState"value="<?php echo $designation; ?>" class="form-control">
        <option selected>---choose---</option>
        <option value="staff"<?php if($designation=="staff")  echo 'selected';?>>Staff</option>
        <option value="student" <?php if($designation=="student")  echo 'selected';?>>Student</option>
      </select>
    </div>


    

    <div class="col-6">
      <label for="inputname"><i class="fas fa-users"></i>&nbsp;Fullname</label>
      <input type="text" value="<?php echo $fullname; ?>" class="form-control"  name="fullname" disabled placeholder="disabled">
    </div>

    <div class="col-6">
    <label for="inputAddress"><i class="far fa-address-card"></i>&nbsp;Address</label>
    <textarea name="message"value="<?php echo $address; ?>" class="rounded  form-control bg-light text-black"  type="text"   name="address" placeholder="Disabled input"  disabled ><?php echo $address; ?></textarea>
    </div>



    <div class="form-group col-md-6">
    <label for="inputPassword4"><i class="fas fa-envelope-square"></i>&nbsp;email</label>
    <div class="input-group-prepend">
          <div class="input-group-text">@</div>
          <input type="text"value="<?php echo $email; ?>" class="form-control"    name="email" disabled placeholder="disabled">
        </div>
      
     
    </div>
    <div class="col-4">
    <label for="inputAddress"><i class="fas fa-calendar-alt"></i>&nbsp;DOB</label>
    <input type="text" value="<?php echo $dob; ?>"class="form-control" name="dob" disabled placeholder="disabled">
  </div>
  <div class="col-2">
    <label for="inputAddress2"><i class="fas fa-map-marker"></i>&nbsp;Blood group</label>
    <input type="text" value="<?php echo $blood_group; ?>"class="form-control" name="blood_group"  selected disabled placeholder="disabled" >
  </div>

 
    </div>


  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity"><i class="fas fa-calendar-alt"></i>&nbsp;join date</label>
      <input type="date" value="<?php echo $joint_date; ?>"class="form-control" name="joint_date" required>
    </div>

    <div class="form-group col-md-4">
      <label for="inputState"><i class="fas fa-transgender"></i>&nbsp;gender</label>
      <input type="text" value="<?php echo $gender; ?>"class="form-control" name="gender"  selected disabled placeholder="disabled" >
    </div>
    

    <div class="form-group col-md-2">
      <label for="inputZip"><i class="fas fa-weight-hanging"></i>&nbsp;weight</label>
      <div class="input-group-prepend">
          <div class="input-group-text">Kg</div>
      <input type="text"value="<?php echo $weight; ?>" class="form-control" name="weight" placeholder="weight in Kg" required>
    </div>
  </div>
  </div>

  <?php
  if(isset($_GET['edit']))
  {
    echo '<input id="button" type = "submit" value="Update" name="Edit" class="btn btn-outline-success btn-icon-split" >'; 
   
}else{
    echo '<input id="button" type="submit"  value = "Add Donor" name="Add"  class="btn btn-outline-primary" >';
   
}
?>

  <button type="submit" class="btn btn-danger" onclick="location.href='BloodDonors.php'" ><i class="fas fa-backspace"></i>&nbsp;&nbsp;cancel</button>
</form>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
