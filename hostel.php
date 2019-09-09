
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

<div class="col-sm-6 " ></div>
<div class="col-sm-3 " > 
<form class="form-inline md-form form-sm mt-4">
 
  <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="text" placeholder="Search_Student_ID" aria-label="Search"id="search"> 
  <i class="fas fa-search ml-3" aria-hidden="true"></i>
</form>
</div>

</div>
<div class="row">

<div class=" col-sm-12">
<p style="font-size:20px;"> Personal Info <hr color ="black" style="height:1px;"></p>
</div>
</div>


        <form action="">
         
        <div class="form-row">
       
        <div class="form-group col-md-6  ">
        <label for="fullname">Full Name</label> <br>
        <input type="text" class="form-control " id="fullname"disabled placeholder="Name disabled">
        </div>

        <div class="form-group col-md-3 ">
        <label for="dob">Date of birth</label>
        <input type="text" class="form-control " id="dob" placeholder="dd/mm/yyyy" disabled>

        </div>
        <div class="form-group col-md-3 ">
        <label for="phone">phone</label>
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
        <label for="ds">district</label>
        <input type="text" class="form-control " id="ds" placeholder="content disabled" disabled>

       
        </div>
        </div>






        <div class="form-row">
        <div class="form-group col-md-3 ">
        <label for="gender">gender</label>
        <input type="text" class="form-control " id="gender" placeholder="content disabled" disabled>
        </div>
        
        <div class="form-group col-md-3 ">
        <label for="nic">NIC</label>
        <input type="text" class="form-control " id="nic" placeholder="content disabled" disabled>
        </div>



        <div class="form-group col-md-3">
        <label for="address">distance</label>
        <input type="text" class="form-control " id="address" placeholder="distances in Km">
        </div>       



        
        
        <div class="form-group col-md-3 ">
        <label for="firstname">Date of requesting</label>
        <input type="text" class="form-control " id="date" placeholder="dd/mm/yyyy">

        </div>       
        </div>

        <div class="form-row">
        <div class="form-group col-md-3">
        <button type="button" class="btn btn-outline-primary btn-rounded waves-effect btn-block"><i class="fa fa-paper-plane "></i> Request</button><br>
        </div>    
        
        <div class="form-group col-md-3">
        <button type="button" class="btn btn-outline-danger btn-rounded waves-effect  "><i class=" fas fa-bolt  "></i>  Cancel</button>
        

        </div>          



        </div>














        </form>
















































<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("footer.php"); ?>  
<!--  end dont change the order-->