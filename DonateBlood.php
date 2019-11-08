<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->


<div class="shadow  p-3 mb-5 bg-white rounded">
        <div class="highlight-blue">        
                <div class="intro">
<h1 class="text-center">Donor Request Details</h1>
</div>
</div>
</div>

<br>

<div class="row">

<div class="col-sm-6 " ></div>
<div class="col-sm-3 " > 
<form class="form-inline md-form form-sm mt-4">
  <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="text" placeholder="Search_ID" aria-label="Search"   id="search"> 
  <button type="submit" class="btn btn-outline-thead-light  form-control form-control-sm rounded-pill"> <i class="fas fa-search ml-3" aria-hidden="true"></i></button>
</form>
</div>
</div>




         <div class="row">   
         <div class="col-12">
         <form>
         <p style="font-size:20px;">Donor Request_Info <hr color ="black" style="height:1px;"></p><br>
         </form>
</div>
</div>
<table class="table">
  <thead class="thead-r">
    <tr>
    <th scope="col"><i class="far fa-id-card"></i>&nbsp;D_id</th>

      <th scope="col"><i class="fas fa-users"></i>&nbsp;fullname</th>
      <th scope="col"><i class="far fa-address-card"></i>&nbsp;Address</th>
      <th scope="col"><i class="fas fa-envelope-square"></i>&nbsp;Email</th>
      <th scope="col"><i class="fas fa-calendar-alt"></i>&nbsp;dob</th>
      <th scope="col"><i class="fas fa-map-marker"></i>&nbsp;Blood group</th>
      <th scope="col"><i class="fas fa-chalkboard-teacher"></i>&nbsp;designation</th>
      <th scope="col"><i class="fas fa-calendar-alt"></i>&nbsp;join date</th>
      <th scope="col"><i class="fas fa-transgender"></i>&nbsp;Gender</th>
      <th scope="col"><i class="fas fa-weight-hanging"></i>&nbsp;Weight</th>
      <th scope="col"><i class="far fa-id-card"></i>&nbsp;Reference id</th>
      <th scope="col"><i class="far fa-caret-square-right"></i>&nbsp;Action</th>
      <!-- <th scope="col"><i class="fas fa-outdent"></i>&nbsp;Status</th> -->
    </tr>
  </thead>
  
  <?php
  
  // $d_id = $fullname = $phone = $address = $email = $dob = $division = $blood_group = $designation = $joint_date = $gender = $weight = $reference_id =  null;
  
  // if(isset($_GET['edit']))
  // {
  //   $stid =$_GET['edit'];
  //   $sql = "SELECT * FROM donor where`d_id`= '$stid'";
  //   $result = mysqli_query($con,$sql);
  
    //if(mysqli_num_rows($result)==1)
    $sql="SELECT * from donor";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
        echo '   
        <tr>
            <td>'.$row["d_id"].'</td>
            <td>'.$row["fullname"].'</td>
            <td>'.$row["address"].'</td>
            <td>'.$row["email"].'</td>
            <td>'.$row["dob"].'</td>
            <td>'.$row["blood_group"].'</td>
            <td>'.$row["designation"].'</td>
            <td>'.$row["joint_date"].'</td>
            <td>'.$row["gender"].'</td>
            <td>'.$row["weight"].'</td>
            <td>'.$row["reference_id"].'</td>
            <td> 
            
            <a href=" donor.php ?edit='.$row["d_id"].' "class="btn btn-outline-success btn-icon-split""><i class="far fa-edit"></i>&nbsp;&nbsp;  </a>  
            <button class="btn btn-outline-danger btn-icon-split" data-href="?delete='.$row["d_id"].'" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i> </button> 
           
            </td>
        </tr>';
        }
    }
    else {
        echo "0 results";
    }
  
    ?>
    
    <?php

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE FROM `donor` WHERE`d_id`='$id'";
    if (mysqli_query($con, $sql)){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>'.$id.'</strong>  Has Been Succesfully deleted
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div> ';
    }else{
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>'.$id.'</strong>  Has Been Succesfully deleted
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div> ';
    }
}

?>
      
      <!-- <td><div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-success"><i class="fas fa-arrow-alt-circle-right"></i></button>
            <button type="button" class="btn btn-danger"><i class="far fa-arrow-alt-circle-right"></i></button></td> -->
    
  
    
    
    
</table>



    <button type="button" class="btn btn-success"><i class="far fa-save"></i>&nbsp;&nbsp;Save </button>
    <button type="button" class="btn btn-outline-info" onclick="location.href='donationInfo.php'"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add donationInfo</button>&nbsp;&nbsp;




<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>

<!--END DON'T CHANGE THE ORDER-->

<!--END DON'T CHANGE THE ORDER-->

