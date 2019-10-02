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

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Student Id</th>
      <th scope="col">Title</th>
      <th scope="col">Name with Inisials</th>
      <th scope="col">Gender</th>
      <th scope="col">Civil Status</th>
      <th scope="col">Date of Birth</th>
      <th scope="col">Zip-Code</th>
      <th scope="col">District</th>
      <th scope="col">Divisional Secretariat</th>
      <th scope="col">Blood Group</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    </tr>
  </tbody>
</table>


<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php 
include_once("FOOTER.PHP"); 
?>