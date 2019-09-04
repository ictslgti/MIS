<?php
$title = "Department Details | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START MY CODER HERE -->
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
<!-- header text -->
<body style="background-color: rgb(255,255,255);">
    <div class="highlight-blue">
        <div class="container">
            <div class="intro">
                <h1 class="display-4 text-center">Examinations Portal</h1>
                <H3 class="display-5 text-center">Department of Information & Technology</H3>
                <p class="text-center">Welcome to examinations portal for lectures or admin. This section to add examinations and assignments/asessments results&nbsp;</p>
            </div>
            <!-- header text end -->
            
            
          
        </div>
    </div>
    <!-- import css/js -->
    <div></div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.min.js"></script>
<!-- end import  -->

<!-- mainform start  -->
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Select Semister</label>
  </div>
  <select class="custom-select" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <option value="1">Semister 1</option>
    <option value="2">Semister 2</option>
  </select>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Select Module</label>
  </div>
  <select class="custom-select" id="inputGroupSelect01">
    <option selected>Graphic Design</option>
    <option value="1">Programming</option>
    <option value="2">Database 1</option>
    <option value="3">System Analysis and Design</option>
    <option value="3">Manage Workplace</option>
    <option value="3">Manage Workplace & Communication</option>
  </select>
</div>

<input class="btn btn-primary" type="reset" value="Reset">



<!-- <div class="input-group">
  <select class="custom-select" id="inputGroupSelect04">
    <option selected>Select Department</option>
    <option value="1">ICT</option>
    <option value="2">Automobile</option>
    <option value="3">Construction</option>
    <option value="1">Food & Technology</option>
    <option value="2">Mechanical</option>
    <option value="3">Electrical & Electronics</option>
  </select>
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button">Button</button>
  </div> -->

</div><br>
    <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <!-- <label class="control-label"  for="inputEmail4">amh</label> -->
     <?php
     $module1 = 'Database';
     $module2 = 'Graphic Design';
     $module3 = 'Programming';
     $module4 = 'Testing';
     $module5 = 'ICT';

     ?>
     <h4><?php echo $module1 ?></h4>
      <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $module1 ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Module2</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Password</label>
        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
      </div>
    </div>
    
 
 

 
</form><br>

</body>

</html>


<!-- END OF MY CODE -->





<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>