
<!--Block#1 start dont change the order-->
<?php 
$title="Home | SLGTI";    
include_once ("config.php");
include_once ("head.php");
include_once ("menu.php");
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
<p >
<div class="col-sm-6 " ></div>
<div class="col-sm-3 " > 
<form class="form-inline md-form form-sm mt-4">
 
  <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="text" placeholder="Search_Student_ID" aria-label="Search"id="search"> 
  <i class="fas fa-search ml-3" aria-hidden="true"></i>
</form>
</div>
</p>
</div>
<div class="row">
<div class=" col-sm-1"></div>
<div class=" col-sm-10">
<p > Personaal Info <hr color ="black" style="height:1px;"></p>
</div>
</div>


        <form action="">
         
        <div class="form-row">
        <div class="col-md-1"></div>
          <!-- <div class="col-md-3"></div> -->
        <div class="form-group col-md-5 mt-4">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control border border-primary" id="firstname" placeholder="first Name">

        </div>
       
        <div class="col-sm-5 mt-4">
        <label for="firstname">Last Name</label>
        <input type="text" class="form-control border-primary" id="lastname" placeholder="last Name">
</div>
        </div>




        <div  class="form-row">
        <div class="col-md-1"></div>

       <div class="form-group col-md-10 ">
        <label for="address">Address</label>
        <input type="text" class="form-control border border-primary" id="address" placeholder="Your address here">

        </div>
        </div>






        <div  class="form-row">
        <div class="col-md-1"></div>

       <div class="form-group col-md-2 ">
        <label for="address">Distance</label>
        <input type="text" class="form-control border border-primary" id="address" placeholder="distances in Km">

        </div>


        <div class="form-group col-md-4 ">
        <label for="address">Postal Code</label>
        <input type="text" class="form-control border border-primary" id="address" placeholder="Your address here">

        </div>


        <div class="form-group col-md-4">
        <label for="address">Date of Birth</label>
        <input type="text" class="form-control border border-primary" id="address" placeholder="Your address here">
        </div>
        </div>












        </form>
















































<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("footer.php"); ?>  
<!--  end dont change the order-->