<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<!-- <h1 class="text-center">SLGTI Hostel Management</h1>
<p  class="text-center display-4"  style="font-size:25px;">Welcome to SLGTI Hostel Management <br> -->




          <!-- Content here -->
        
            <blockquote class="blockquote ">
                <p class=" ml-4" style="font-family: 'Luckiest Guy', cursive; font-size: 50px; padding-left: 450px;   ">Hostel Management System</p>
                <footer class="blockquote-footer" style=" padding-left: 650px">Hostel Allocation <cite title="Source Title"></cite></footer>
            </blockquote>
        

        
     
<div class="row">

<div class=" col-sm-6 mt-4">
<small class="display-4"   style="font-size:25px;">Hostel Accomadation </small>

</div>
<div class="col-sm-3 " > 

<form class="form-inline md-form form-sm mt-4 ">
 
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

<form action="" method="get">

<div class="form-row">
       
       <div class="form-group col-md-3 ">
       <label for="id">Student ID&nbsp;<i class="far fa-smile-beam fa-spin"></i></label> <br>
       <input type="text" class="form-control " id="id" disabled placeholder="ID disabled">
       </div>

       
    
       
       <div class="form-group col-md-9  ">
       <label for="name"><i class="far fa-id-card"></i>&nbsp;Full Name</label> <br>
       <input type="text" class="form-control " id="name"disabled placeholder="Name disabled">
       </div>
       </div>

       
<div class="form-row">

<div class="form-group col-md-6  ">
       <label for="ad"><i class="fas fa-map-marked-alt"></i>&nbsp;Address</label> <br>
       <textarea name="message" class="rounded  form-control bg-light text-black"  type="text" id="add" placeholder="House-No, Street, Hometown." cols="15" rows="3" disabled ></textarea>
        </div>


        <div class="col-md-4 mb-3">
            <label for="district"><i class="fas fa-map-marker-alt"></i>&nbsp;District</label>
            <input type="text" class="form-control" id="district" placeholder="" disabled required>
          </div>

          <div class="col-md-2 mb-3">
            <label for="dis"><i class="fas fa-map-signs"></i>&nbsp;Distance
             <label class="note" style="font-size: 13px; margin-bottom: 0; color:#aaa;padding-left: 14px;">Home to SLGTI </label>
            </label>
            <input type="text" class="form-control" id="dis" placeholder="in km" disabled required>
          </div>

       </div>


<div class="form-row">


<div class="form-group col-md-3  ">
<label for="hostel"><i class="fas fa-transgender"></i>&nbsp;select Hostel :</label>
<select name="title" id="gender" class="form-control" >
               <option value="">---Select---</option>
               
               <option value="male">  Male </option>
                    <option value="female"> Female </option>
                    
         </select>
         </div>


         
         <div class="form-group col-md-3  ">
         <label for="hostel"><i class="fas fa-list-ol"></i>&nbsp; Block No:</label>
        
         <select name="hostel" id="block" class="form-control" >
               <option value="">---Select---</option>
                    <option value="block1">B12 </option>
                    <option value="block2"> B14 </option>
                    
         </select>
</div>

<div class="form-group col-md-3  ">
         <label for="hostel"><i class="fas fa-list-ol"></i>&nbsp; Room No:</label>
        
         <select name="hostel" id="block" class="form-control" >
               <option value="">---Select---</option>
                    <option value="block1">Room-1 </option>
                    <option value="block2"> Room-2</option>
                    
         </select>
</div>
</div>






<div class="form-row">
<div class="col-md-3 mb-3">
            <label for="add"><i class="fas fa-calendar-alt"></i>&nbsp;Date of Addmission</label>
            <input type="date" class="form-control" id="add" placeholder=""  required>
          </div>

          <div class="col-md-3 mb-3">
            <label for="leave"><i class="fas fa-calendar-alt"></i>&nbsp;Date of Leaving</label>
            <input type="date" class="form-control" id="leave" placeholder=""  required>
          </div>

         <div class="form-group col-md-2 mt-5 ml-5">
        <button type="submit" class="btn btn-primary rounded-pill btn-block waves-effect onclick='window.location.reload();'  ">
        <i class="fa fa-paper-plane "></i> Allocated</button><br>
        </div>    
        <div class="form-group col-md-2 mt-5 ml-1">
        <button type="reset" class="btn btn-outline-danger rounded-pill btn-block waves-effect  ">
        <i class=" fas fa-bolt  "></i> clear</button>
        </div>
          </div>


          
        

</form>













<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
