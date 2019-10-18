
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>




<?php


$id = $date =$programme =null ;
if(isset($_GET['edit']))
{

    $id = $_GET['edit'];
    $sql = " SELECT * from donation WHERE donation_id= '$id'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)==1)                                               
        {
         
          $row = mysqli_fetch_assoc($result);
          $id = $row['donation_id'];
          $date = $row['date'];
          $programme =  $row['programme'];
        }
        else{
          echo "Error".$sql."<br>".mysqli_error($con);
        }
}
?>




<div class="intro p-5 mb-5 border border-dark rounded">
<div class="shadow p-3 mb-5 bg-white rounded"> 
  <h1 class="display-4 text-center  "><i class="fas fa-hand-holding-usd"></i> Donation Info</h1>
  </div>


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
  <div class="form-group row">
    <label for="inputid" class="col-sm-2 col-form-label">Donation_id</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $id; ?>"class="form-control" id="inputEmail3" placeholder="donation_id">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Date</label>
    <div class="col-sm-10">
      <input type="date" value="<?php echo $date; ?>"class="form-control"  placeholder="date">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputtext" class="col-sm-2 col-form-label">program</label>
    <div class="col-sm-10">
      <input type="text"value="<?php echo $programme; ?>" class="form-control"  placeholder="event">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">upload</button>
      <button type="submit" class="btn btn-danger"  onclick="location.href='donationInfo.php'" ><i class="fas fa-backspace"></i>&nbsp;&nbsp;cancel</button>
    </div>
  </div>
</form>
</div>
<?php include_once("footer.php"); ?> 