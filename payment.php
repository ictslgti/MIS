<?php
$title="payment |SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!-- dont change -->


<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>examinations</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.min.css">
    <style>
      
    </style>
</head>

<body>
<h1 class="text-center display-3">SLGTI Payment Portal</h1>

<br>
<div class="row">

<div class="col-sm-9"></div>
<div class="col-sm-3">
<div class="form-group mx-sm-3 mb-2 text-right">
    <label for="inputPassword2" class="sr-only">Student ID</label>
    <input type="text" class="form-control" id="inputPassword2" placeholder="Student ID">
    <button type="submit" class="btn btn-primary mb-3"> <i class="fas fa-search"></i>Search</button>
  </div>
  </div>
  
  </div>







        <div class="row">

      <div class="col-sm-4">
        <div class="row">
        <img src="img/payment.png" alt="photo irutha podalam" class="img-thumbnail">
         </div>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-folder"></i>Report
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Daliy</a>
    <a class="dropdown-item" href="#">Weely</a>
    <a class="dropdown-item" href="#">Monthly</a>
    <a class="dropdown-item" href="#">On Search ID</a>
  </div>
</div><br>


<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-folder-open"></i>Report Type
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Exam</a>
    <a class="dropdown-item" href="#">Re Exam</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>






      </div>
        <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
       
       
       
        <div class="col-sm-4">
        <form>
       <div class="form-row">
       <div class="form-group col-md-12"><i class="fas fa-user"></i>
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Name">
    </div>
    <div class="form-group col-md-12"><i class="fas fa-building"></i>
    <label for="inputEmail4">Department</label>
      <input type="Department" class="form-control" id="inputEmail4" placeholder="Department">
    </div>
  </div>
  <div class="form-group"><i class="fas fa-map-marked-alt"></i>
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Address">
  </div>
  <div class="form-group"><i class="fas fa-at"></i>
  <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
  </div>
  
    <div class="form-group "><i class="fas fa-phone-volume"></i>
      <label for="inputCity">Phone</label>
      <input type="phonenumber" class="form-control" id="inputCity"placeholder="Phone Number">
    </div>
    <div class="form-group "><i class="fas fa-coins"></i>
    <label for="inputEmail4">Amount</label>
      <input type="Amount" class="form-control" id="inputEmail4" placeholder="Amount">
      </div>
      <div>
      <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-swatchbook"></i>Payment Type&nbsp;&nbsp;&nbsp;&nbsp;</label>
  </div>
  <select class="custom-select" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
</div>

</div>
<br>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-swatchbook"></i>Payment Reason</label>
  </div>
  <br>
  <select class="custom-select" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
</div>
</div>
 
<div class="col-sm-4">
<br>
<br>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Reason</th>
      <th scope="col">Amount</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      
    </tr>
    <tr>
      <th scope="row">3</th>
      <th>Total:</th>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
<br>
<button type="button" class="btn btn-primary btn-block"><i class="fab fa-amazon-pay"></i> Pay</button><br>
<button type="button" class="btn btn-secondary  btn-sm"><i class="fas fa-redo-alt"></i>Reset</button>&nbsp;
<button type="button" class="btn btn-danger  btn-sm"><i class="fas fa-times"></i>Close</button>



</div>

<br>

    
    
</form>
</div>


<!-- colom3........start -->

<div class="col-sm-4">


</div>
<!-- colom3........ end    -->







        </div>
        
        
        
        
       
       
     
     
     
<br>
    
    

     </div>
 <!-- dont change -->
 <?php
    include_once("footer.php");
    ?>
    </body>
    </html>