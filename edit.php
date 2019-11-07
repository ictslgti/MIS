
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>


<div class="row">
<div class="col-6"></div>
<div class="col-3"></div>
<div class="col-2"></div>

 <div class="col-1"> 
 <button type="submit" class="btn btn-danger" onclick="location.href='donationInfo.php'" style="width:40px; height:30px;"><i class="fas fa-backspace" style="font-size: 20px;" ></i>&nbsp;&nbsp;</button>
    
     </div> 
</div>
</div>




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




if(isset($_POST['Add']))
{
    
   if (!empty($_POST['id']) 
   && !empty($_POST['date'])
   && !empty($_POST['programme']))
   {
    
    //    $id = $_POST['id'];
       $date = $_POST['date'];
       $programme = $_POST['programme'];
       $sql = "INSERT INTO `donation` (`date`,`programme`)VALUES('$date','$programme')";
       
       if (mysqli_query($con, $sql)){
           echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
           <strong>'.$id.'</strong>  insert succesfully
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
           </div> ';
       }else{
           echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
           <strong>'.$id.'</strong>  cannot be done
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
           </div> ';
       }
   }
   
}

if(isset($_POST['Edit'])){
    if (!empty($_POST['id']) 
    && !empty($_POST['date'])
    && !empty($_POST['programme'])
    && !empty($_GET['edit']))
    {
        $id = $_POST['id'];
        $date = $_POST['date'];
        $programme = $_POST['programme'];
        $id = $_GET['edit'];
        $sql = "UPDATE `donation` SET `date`='$date',`programme`='$programme' WHERE donation_id= '$id'";
        if (mysqli_query($con, $sql)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>'.$id.'</strong>  update succesfully
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div> '; 
        }else
        {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>'.$id.'</strong> cannot be done
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div> ';
        }
    }
}
?>







<form method="POST">
<div class="intro p-5 mb-5 border border-dark rounded">
<div class="shadow p-3 mb-5 bg-white rounded"> 
<h1 class="display-4 text-center  "><i class="fas fa-hand-holding-usd"></i> Donation Info</h1>
</div>


<div class="row">
<div class="col-sm-6 " ></div>
<div class="col-sm-3 " > 
<form class="form-inline md-form form-sm mt-4" method="GET">
<input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="search" placeholder="Search_ID" aria-label="Search" value="search" name="edit" >
 
  </form>
</div> 
<div class="col-sm-0 " > 
<button type="submit" class="btn btn-outline-thead-light  form-control form-control-sm rounded-pill"> <i class="fas fa-search ml-3" aria-hidden="true"></i></button>
</div>
</div>

<div class="row">   
<div class="col-12">


<p style="font-size:20px;"> Personal Info <hr color ="black" style="height:1px;"></p><br>

</div>
</div>



<div class="form-group row">
<label for="inputid" class="col-sm-2 col-form-label" >Donation_id</label>
<div class="col-sm-10">
<input type="text" value="<?php echo $id ?>" class="form-control"  placeholder="donation_id" name="id"  >
</div>
</div>

<div class="form-group row">
<label for="inputPassword3" class="col-sm-2 col-form-label">Date</label>
<div class="col-sm-10">
<input type="date" value="<?php echo $date ?>"class="form-control"  placeholder="date"  name="date" required >
</div>
</div>

<div class="form-group row">
<label for="inputtext" class="col-sm-2 col-form-label" >program</label>
<div class="col-sm-10">
<input type="text"value="<?php echo $programme ?>" class="form-control"  placeholder="event" name="programme" required>


</div>
</div>





<div class="form-group row">
<div class="col-sm-10">
<?php

  if(isset($_GET['edit']))
  {
    echo '<input id="button" type = "submit" value="Update" name="Edit" class="btn btn-outline-success btn-icon-split" >'; 
   
}else{
    echo '<input id="button" type="submit"  value = "Add Info" name="Add"  class="btn btn-outline-primary" >';
   
}
?>

</div>
</div>

</form>

</div>

<?php include_once("footer.php"); ?> 