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
<h1 class="text-center">SLGTI Payment Portal</h1>

<br>
<div class="row">

<div class="col-sm-9"></div>
<div class="col-sm-3">
<div class="form-group mx-sm-3 mb-2 text-right">
    <label for="inputPassword2" class="sr-only">Student ID</label>
    <input type="text" class="form-control" id="inputPassword2" placeholder="Student ID">
    <button type="submit" class="btn btn-primary mb-3">Search</button>
  </div>
  </div>
  
  </div>







        <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        <form>
       <div class="form-row">
       <div class="form-group col-md-12">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Name">
    </div>
    <div class="form-group col-md-12">
    <label for="inputEmail4">Department</label>
      <input type="Department" class="form-control" id="inputEmail4" placeholder="Department">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Address">
  </div>
  <div class="form-group">
  <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
  </div>
  
    <div class="form-group ">
      <label for="inputCity">Phone</label>
      <input type="phonenumber" class="form-control" id="inputCity"placeholder="Phone Number">
    </div>
    <div class="form-group ">
    <label for="inputEmail4">Amount</label>
      <input type="Amount" class="form-control" id="inputEmail4" placeholder="Amount">
      </div>
      
<div class="btn-group">
  <button type="button" class="btn btn-danger">Payment Method</button>
  <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>

  
  <div class="btn-group">
  <button type="button" class="btn btn-primary">Payment Reason</button>
  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>
  </div>
 
</div>
<br>

    
    
</form>
</div>



<!-- colom3........start -->

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
<a href="#" class="btn btn-primary btn-lg btn-block " role="button" aria-pressed="true"> <i class="fas fa-user-graduate"></i> Pay </a>
<a href="#" class="btn btn-secondary btn-lg active btn-sm" role="button" aria-pressed="true">Reset</a>
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