<!------START DON'T CHANGE ORDER HEAD,MANU,FOOTER----->
<!---BLOCK 01--->
<?php 
   
include_once("config.php");

$title ="STUDENT PROFILE | SLGTI"; //YOUR HEAD TITLE CREATE VARIABLE BEFORE FILE NAME
include_once("head.php");
include_once("menu.php");

?>
<!----END DON'T CHANGE THE ORDER---->


<!---BLOCK 02--->
<!---START YOUR CODER HERE----->


<!-----END YOUR CODE----->
<!-- form start---->
<br>
<h1 style="text-align:center"> SLGTI STUDENTS' INFORMATION </h1>
<br><br>

<div class="form-row">
    <div class="col-md-5 mb-3" style="padding-right:200px">
    <i class="fas fa-search ml-3" aria-hidden="true"></i>
    <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="text" placeholder="Search......." id="search">
    </div>
</div><br>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" width="2%"> No </th>
      <th scope="col" width="10%"> Student Id </th>
      <th scope="col" width="3%"> Title </th>
      <th scope="col" width="30%"> Student Full Name </th>
      <th scope="col" width="20"> Name with Inisials </th>
      <th scope="col" width="15%"> Email </th>
      <th scope="col" width="5%"> NIC </th>
      <th scope="col" width="5%"> Phone No </th>
      <th scope="col" width="3%"> Gender </th>
      <th scope="col" width="5%"> Date of Birth </th>
      <th scope="col" width="20%"> Address </th>
      <th scope="col" width="3%"> Action </th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><a href="Studentinfo.php?Student_Id='..'"> View More</td>
    </tr>
  </tbody>
</table>


<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php 
include_once("FOOTER.PHP"); 
?>