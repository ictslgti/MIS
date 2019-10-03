<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->
<html>

<head>
   
</head>
<body>
<br><br>
      <div class="row">
      <div class="col form-group  container p-3 mb-2 col-4 " >
    <h1 ><i class="fas fa-file-alt"></i>STAFF MODULE ENROLLMENT</h1></div>
    <div class="col form-group  container p-3 mb-2 col-4 " ></div>
    <div class="col form-group  container p-3 mb-2 col-4 " >
  
    
    <div class="col-md-12 col-sm-12 pl-3 pr-3 pt-2">
            <div class="form-group">
            <a href="StaffDetails.php" class="btn btn-outline-primary" role="button" aria-pressed="true">ENROLL</a>
            
            </div>                              
        </div>
        
    </div>
    
    </div>
   </div>
   <br><br>
   <div class="row">
   <div class="col-sm-12" >
   <hr color ="black" style="height:1px;">
   </div>
  </div>
  <form>
   <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Staff_ID</th>
      <th scope="col">EPF NO</th>
      <th scope="col">NIC</th>
      <th scope="col">Staff_Name</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Date_of_birth</th>
      <th scope="col">Telephone no</th>
      <th scope="col">Date_of_Join</th>
      <th scope="col">Position</th>
      <th scope="col">Type</th>
      <th scope="col">Profile</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td><a href="ModuleEnrollment.php" class="btn btn-outline-primary" role="button" aria-pressed="true">VIEW</a></td>
     
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td><a href="ModuleEnrollment.php" class="btn btn-outline-primary" role="button" aria-pressed="true">VIEW</a></td>
  
    </tr>
    <tr>
      <th scope="row">3</th>
      <td >Larry the Bird</td>
      <td>Jacob</td>
      <td>@twitter</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td><a href="ModuleEnrollment.php" class="btn btn-outline-primary" role="button" aria-pressed="true">VIEW</a></td>
    </tr>
  </tbody>
</table>
<button type="button" class="btn btn-outline-primary">DELETE STAFF</button>
    <button type="button" class="btn btn-outline-primary">EDIT STAFF</button>
    <button type="button" class="btn btn-outline-primary">REFRESH STAFF</button>
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
