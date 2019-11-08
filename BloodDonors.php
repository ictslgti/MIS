<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->
<div class="intro p-5 mb-5 border border-dark rounded">
<div class="shadow  p-3 mb-5 bg-white rounded">
        <div class="highlight-blue">          
                <div class="intro">

<h1 class="text-center"><i class="fas fa-user-plus"></i>Donor Request Details</h1>
<br>
</div>
  </div>
  </div>

<div class="row">

<div class="col-sm-6 " ></div>
<div class="col-sm-3 search-box "  > 
<form class="form-inline md-form form-sm mt-4" method="GET" >
  <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="search" placeholder="Search D_ID" aria-label="Search" name="search" Search id="search"> 
  <button type="submit" class="btn btn-outline-thead-light  form-control form-control-sm rounded-pill"> <i class="fas fa-search ml-3" aria-hidden="true"></i></button>
  
</form>
</div>
</div>





<button type="button" class="btn btn-light" type="reset" value="Reset"><div class="spinner-grow" role="status">
  <span class="sr-only">Loading...</span>
</div> </button> 
  



         <div class="row">   
         <div class="col-12">
         <form>
         <p style="font-size:20px;"> Donor Request_Info <hr color ="black" style="height:1px;"></p><br>
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
      
    </tr>
  </thead>
  <?php
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
            
        </tr>';
        }
    }
    else {
        echo "0 results";
    }
    ?>
</table>

<?php


$d_id =  $fullname= $address = $email = $dob= $blood_group = $designation =$joint_date = $gender =$weight =$reference_id =null ;
if(isset($_GET['edit']))
{
  echo"eer";
    $id = $_GET['edit'];
    $sql = " SELECT * from donor WHERE d_id= '$id'";
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


?>

<div class="row">
<div class="col-6"></div>
<div class="col-3"></div>
<div class="col-2"></div>

 <div class="col-1"> 
    <button type="button" class="btn btn-primary" onclick="location.href='donor.php'"><i class="fas fa-sign-in-alt"></i> &nbsp;Join</button> 
    
     </div> 
</div>
</div>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->