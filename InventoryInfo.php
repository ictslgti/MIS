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
<div class="row">
    <div class=" col-sm-8">
        <p style="font-size: 45px; font-weight: 700; ">SLGTI INVENTORY INFORMATION</p>
    </div>

    <div class="col-sm-3 pt-4"> 
      <form class="form-inline" method="GET">
        <input class="form-control mr-2" type="search" name="edit" placeholder="Supplier_id">  
        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
      </form>
    </div>  
</div>

<div class="row">
  <div class="col-sm-12" >
    <hr color ="black" style="height:1px;">
  </div>
</div>  


<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Inventory Id</th>
      <th scope="col">Department Id</th>
      <th scope="col">Item Id</th>
      <th scope="col">Status</th>
      <th scope="col">Quantity</th>
      <th scope="col">Supplier Id</th>
      <th scope="col">Pur</th>
      <th scope="col">Warrenty</th>
      <th scope="col">Des</th>
      <th scope="col">Item Code</th>
      <th scope="col">Item Code</th>
      <th scope="col">Supplier Name</th>
      <th scope="col">Supplier Phone</th>
      <th scope="col">Supplier Email</th>
      
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