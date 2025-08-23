
<!--Block#1 start dont change the order-->
<?php 
$title="hostel | SLGTI";    
include_once ("../config.php");
include_once ("../head.php");
include_once ("../menu.php");
?>
<!-- end dont change the order-->


<!-- Block#2 start your code -->
    

<h1 class="text-center">SLGTI Hostel Management</h1>
<p  class="text-center display-4"  style="font-size:25px;">Welcome to SLGTI Hostel Management <br>
<small class="display-4"   style="font-size:25px;">Registration for the hostel </small>

<!-- <p> 
<div class="row"></div>
</p> -->



</p>

<div class="row">

<div class=" col-sm-6 mt-4">
<p style="font-size:20px;"> Personal Info</p>
</div>
<div class="col-sm-3 " > 
<form class="form-inline md-form form-sm mt-4 ">
<div class="spinner-grow text-danger" role="status">
  <span class="sr-only">Loading...</span>
</div>
  <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="text" placeholder="Search_Student_ID" aria-label="Search"id="search"> 
  <i class="fas fa-search ml-3" aria-hidden="true"></i> 
</form>
</div>
</div>
<div class="row">

<div class="col-sm-12" >

<hr color ="black" style="height:1px;">
</div>


</div>

        <?php
        $ok = isset($_GET['ok']);
        $err = isset($_GET['err']) ? $_GET['err'] : '';
        if ($ok) {
          echo '<div class="alert alert-success">Request submitted. Pay the hostel fee to proceed to allocation.</div>';
        } elseif ($err) {
          echo '<div class="alert alert-danger">Unable to submit request. Please enter a valid distance and try again.</div>';
        }
        ?>

        <form method="post" action="<?php echo (defined('APP_BASE') ? APP_BASE : ''); ?>/controller/HostelRequest.php">
         
        <div class="form-row">
       
        <div class="form-group col-md-6  ">
        <label for="fullname">Full Name</label> <br>
        <input type="text" class="form-control " id="fullname"disabled placeholder="Name disabled">
        </div>

        <div class="form-group col-md-3 ">
        <label for="dob">Date of birth</label>
        <input type="date" class="form-control" id="dob" disabled placeholder=""  required>

        </div>
        <div class="form-group col-md-3 ">
        <label for="phone">Phone</label>
        <input type="text" class="form-control " id="phone" placeholder="07" disabled>

        </div>

              
        </div>

        <div class="form-row">
        <div class="form-group col-md-6 ">
        <label for="disabledTextInput">Address</label>
        <textarea name="message" class="rounded  form-control bg-light text-black"  type="text" id="disabledTextInput" placeholder="Disabled input" cols="5" rows="3" disabled ></textarea>
        </div>

        <div class="form-group col-md-3 ">
        <label for="postalcode">Postal Code</label>
        <input type="text" class="form-control " id="postalcode" placeholder="code disabled" disabled>

       
        </div>

        <div class="form-group col-md-3 ">
        <label for="ds">District</label>
        <input type="text" class="form-control " id="ds" placeholder="content disabled" disabled>

       
        </div>
        </div>






        <div class="form-row">
        <div class="form-group col-md-3">
        <label for="distance_km">Distance</label><label class="note" style="font-size: 13px; margin-bottom: 0; color:#aaa;padding-left: 14px;">Home to SLGTI (km)</label>
        <input type="number" step="0.01" min="0" class="form-control" id="distance_km" name="distance_km" placeholder="distance in km" required>
        </div>       


        <div class="form-group col-md-3 ">
        <label for="gender">Gender</label>
        <input type="text" class="form-control " id="gender" placeholder="content disabled" disabled>
        </div>
        
        <div class="form-group col-md-3 ">
        <label for="nic">NIC</label>
        <input type="text" class="form-control " id="nic" placeholder="content disabled" disabled>
        </div>


<!-- 
        <div class="form-group col-md-3">
        <label for="address">distance</label>
        <input type="text" class="form-control " id="address" placeholder="distances in Km">
        </div>        -->



        
        
        <div class="form-group col-md-3 ">
        <label for="date">Date of requesting</label>
        <input type="date" class="form-control" id="date" value="<?php echo date('Y-m-d'); ?>" disabled>

        </div>       
        </div>



        <div class="form-row">
        <div class="form-group col-md-12">
        </div>   
        </div>   

        <div class="form-row">
        <input type="hidden" name="student_id" value="<?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : ''; ?>">
        <div class="form-group col-md-4">
        <button type="submit" class="btn btn-primary btn-rounded waves-effect btn-block"><i class="fa fa-paper-plane "></i> Request</button><br>
        </div>    
        
        <div class="form-group col-md-3">
        <button type="reset" class="btn btn-danger btn-rounded waves-effect   "><i class=" fas fa-bolt  "></i>  Cancel</button>
        

        </div>          



        </div>














        </form>
















































<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("footer.php"); ?>  
<!--  end dont change the order-->
