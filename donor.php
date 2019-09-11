<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->



<h1 class="text-center">Donor Request Form</h1>
<br>

<div class="row">

<div class="col-sm-6 " ></div>
<div class="col-sm-3 " > 
<form class="form-inline md-form form-sm mt-4">
  <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="text" placeholder="Search_ID" aria-label="Search"id="search"> 
  <i class="fas fa-search ml-3" aria-hidden="true"></i>
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
      <label for="inputEmail4">D_id</label>
      <input type="text" class="form-control" id="Email" placeholder="D_id">
         </div>

    <div class="col-6">
      <label for="inputEmail4">Fullname</label>
      <input type="text" class="form-control" id="name" disabled placeholder="disabled">
    </div>

    <div class="col-6">
    <label for="inputAddress">Address</label>
    <textarea name="message" class="rounded  form-control bg-light text-black"  type="text" id="disabledTextInput" placeholder="Disabled input"  disabled ></textarea>
    </div>


    <div class="form-group col-md-6">
      <label for="inputPassword4">email</label>
      <input type="text" class="form-control" id="address" disabled placeholder="disabled">
    </div>
    <div class="col-4">
    <label for="inputAddress">DOB</label>
    <input type="text" class="form-control" id="dob" disabled placeholder="disabled">
  </div>
  <div class="col-2">
    <label for="inputAddress2">Blood group</label>
    <input type="text" class="form-control" id="inputAddress2" disabled placeholder="disabled">
  </div>

  <div class="form-group col-md-12">
      <label for="inputState">Designation</label>
      <select id="inputState" class="form-control">
        <option selected>choose</option>
        <option>Staff</option>
        <option>Student</option>
      </select>
    </div>
    </div>


  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">join date</label>
      <input type="date" class="form-control" id="date" >
    </div>

    <div class="form-group col-md-4">
      <label for="inputState">gender</label>
      <input type="text" class="form-control" id="date" disabled placeholder="disabled">
    </div>

    <div class="form-group col-md-2">
      <label for="inputZip">weight</label>
      <input type="text" class="form-control" id="inputZip" >
    </div>
  </div>

  <button type="button" class="btn btn-secondary">Add Donor..</button>

</form>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
