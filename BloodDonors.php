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

<h1 class="text-center"><i class="fas fa-user-plus"></i>Donor Details</h1>
<br>
</div>
  </div>
  </div>

<div class="row">

<div class="col-sm-6 " ></div>
<div class="col-sm-3 " > 
<form class="form-inline md-form form-sm mt-4">
  <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="text" placeholder="Search D_ID" aria-label="Search"id="search"> 
  <i class="fas fa-search ml-3" aria-hidden="true"></i>
</form>
</div>
</div>

<button type="button" class="btn btn-light" ><div class="spinner-grow" role="status">
  <span class="sr-only">Loading...</span>
</div> </button>
  



         <div class="row">   
         <div class="col-12">
         <form>
         <p style="font-size:20px;"> Donor_Info <hr color ="black" style="height:1px;"></p><br>
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
      <td>18kg </td>
    </tr>

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
<td>18kg </td>
</tr>
 
</table>





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