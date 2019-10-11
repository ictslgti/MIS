<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->



<h1 class="text-center">Donor Details</h1>
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
         <p style="font-size:20px;">AddDonor_Info <hr color ="black" style="height:1px;"></p><br>
         </form>
</div>
</div>
<table class="table">
  <thead class="thead-r">
    <tr>
    <th scope="col"><i class="far fa-id-card"></i>&nbsp;D_id</th>
      <th scope="col"><i class="far fa-id-card"></i>&nbsp;Reference id</th>
      <th scope="col"><i class="fas fa-users"></i>&nbsp;fullname</th>
      <th scope="col"><i class="far fa-address-card"></i>&nbsp;Address</th>
      <th scope="col">Email</th>
      <th scope="col"><i class="fas fa-calendar-alt"></i>&nbsp;dob</th>
      <th scope="col"><i class="fas fa-map-marker"></i>&nbsp;Blood group</th>
      <th scope="col"><i class="fas fa-chalkboard-teacher"></i>&nbsp;designation</th>
      <th scope="col"><i class="fas fa-calendar-alt"></i>&nbsp;join date</th>
      <th scope="col"><i class="fas fa-transgender"></i>&nbsp;Gender</th>
      <th scope="col"><i class="fas fa-weight-hanging"></i>&nbsp;Weight</th>
      <th scope="col"><i class="far fa-caret-square-right"></i>&nbsp;Action</th>
      <th scope="col"><i class="fas fa-outdent"></i>&nbsp;Status</th>
    </tr>
  </thead>
  
  <tr>

      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>
           
            <button type="button" class="btn btn-outline-success" onclick="location.href='donor.php'"><i class="far fa-edit"></i>&nbsp;&nbsp;Edit</button>&nbsp;&nbsp;
            <button type="button" class="btn btn-outline-success"><i class="far fa-trash-alt"></i>&nbsp;&nbsp;delete</button>&nbsp;&nbsp;
            
      </td>
      <td><div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-success"><i class="fas fa-arrow-alt-circle-right"></i></button>
            <button type="button" class="btn btn-danger"><i class="far fa-arrow-alt-circle-right"></i></button></td>
    </tr
    

<tr>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      
      <td>@mdo</td>
      <td>
           
            <button type="button" class="btn btn-outline-success" onclick="location.href='donor.php'"><i class="far fa-edit"></i>&nbsp;&nbsp;Edit</button>&nbsp;&nbsp;
            <button type="button" class="btn btn-outline-success"><i class="far fa-trash-alt"></i>&nbsp;&nbsp;delete</button>&nbsp;&nbsp;
            
      </td>
      <td><div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-success"><i class="fas fa-arrow-alt-circle-right"></i></button>
            <button type="button" class="btn btn-danger"><i class="far fa-arrow-alt-circle-right"></i></button></td>
    </tr>
  
    
    
    
</table>



    <button type="button" class="btn btn-success"><i class="far fa-save"></i>&nbsp;&nbsp;Save </button>





<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>

<!--END DON'T CHANGE THE ORDER-->

<!--END DON'T CHANGE THE ORDER-->

