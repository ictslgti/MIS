<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->
<!--BLOCK#2 START YOUR CODE HERE -->




<?PHP


$d_id =  $fullname= $address = $email = $dob= $blood_group = $designation =$joint_date = $gender =$weight =$reference_id =null ;
if(isset($_GET['edit']))
{
    $id = $_GET['edit'];
    $sql = "SELECT `d_id`, `address`, `email`, `dob`, `blood_group`, `designation`, `joint_date`, `gender`, `weight`, `reference_id`, `fullname` FROM `donor` WHERE `d_id`= '$id'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)==1) 
        {
          $row = mysqli_fetch_assoc($result);
          //$id = $row['d_id'];
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
}





// Add coding
if(isset($_POST['Add'])){
  if( !empty($_POST['d_id']) && !empty($_POST['fullname']) && !empty($_POST['address']) && !empty($_POST['email'])
  && !empty($_POST['dob'])&& !empty($_POST['blood_group'])&& !empty($_POST['designation'])&& !empty($_POST['joint_date'])
  && !empty($_POST['gender'])&& !empty($_POST['weight'])&& !empty($_POST['reference_id']))
  {
     $id = $_POST['d_id'];
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
    echo "Error in insert" . mysqli_error($con);
      }
   }
}
?>


<!-- search coding -->
<?php
  if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $sql="SELECT * FROM `donor` WHERE `d_id`='$id'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)==1){
            $row=mysqli_fetch_assoc($result);
            $d_id=$row['d_id'];
            $fullname=$row['fullname'];
            $address=$row['address'];
            $DOB=$row['email'];
            $NIC=$row['dob'];
            $Email=$row['blood_group'];
            $PNO=$row['designation'];
            $DOJ=$row['joint_date'];
            $EPF=$row['gender'];
            $Department_id = $row['weight'];
            $Gender= $row['reference_id'];
        }
        else{
          echo "Error".$sql."<br>".mysqli_error($con);
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



<div class="row">

<div class="col-sm-6 " ></div>
<div class="col-sm-3 " > 
<form class="form-inline md-form form-sm mt-4">
  <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="text" placeholder="Search_ID" aria-label="Search"id="search"> 
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
         <div class="col-12">
      <label for="inputEmail4"><i class="far fa-id-card"></i>&nbsp;D_id</label>
      <input type="text" class="form-control" id="Email" placeholder="D_id" required>
         </div>
        
         <div class="form-group col-md-12">
      <label for="inputState"><i class="fas fa-chalkboard-teacher"></i>&nbsp;Designation</label>
      <select id="inputState" class="form-control">
        <option selected>---choose---</option>
        <option>Staff</option>
        <option>Student</option>
      </select>
    </div>




    <div class="col-6">
      <label for="inputEmail4"><i class="fas fa-users"></i>&nbsp;Fullname</label>
      <input type="text" class="form-control" id="name" disabled placeholder="disabled">
    </div>

    <div class="col-6">
    <label for="inputAddress"><i class="far fa-address-card"></i>&nbsp;Address</label>
    <textarea name="message" class="rounded  form-control bg-light text-black"  type="text" id="disabledTextInput" placeholder="Disabled input"  disabled ></textarea>
    </div>



    <div class="form-group col-md-6">
    <label for="inputPassword4"><i class="fas fa-envelope-square"></i>&nbsp;email</label>
    <div class="input-group-prepend">
          <div class="input-group-text">@</div>
          <input type="text" class="form-control" id="address" disabled placeholder="disabled">
        </div>
      
     
    </div>
    <div class="col-4">
    <label for="inputAddress"><i class="fas fa-calendar-alt"></i>&nbsp;DOB</label>
    <input type="text" class="form-control" id="dob" disabled placeholder="disabled">
  </div>
  <div class="col-2">
    <label for="inputAddress2"><i class="fas fa-map-marker"></i>&nbsp;Blood group</label>
    <input type="text" class="form-control" id="inputAddress2" disabled placeholder="disabled" >
  </div>

 
    </div>


  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity"><i class="fas fa-calendar-alt"></i>&nbsp;join date</label>
      <input type="date" class="form-control" id="date" required>
    </div>

    <div class="form-group col-md-4">
      <label for="inputState"><i class="fas fa-transgender"></i>&nbsp;gender</label>
      <input type="text" class="form-control" id="date" disabled placeholder="disabled" >
    </div>

    <div class="form-group col-md-2">
      <label for="inputZip"><i class="fas fa-weight-hanging"></i>&nbsp;weight</label>
      <div class="input-group-prepend">
          <div class="input-group-text">Kg</div>
      <input type="text" class="form-control" id="inputZip" placeholder="weight in Kg" required>
    </div>
  </div>
  </div>
  

  <button type="submit" class="btn btn-primary" ><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Donor..</button>
  <button type="submit" class="btn btn-danger" onclick="location.href='BloodDonors.php'" ><i class="fas fa-backspace"></i>&nbsp;&nbsp;cancel</button>
</form>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
