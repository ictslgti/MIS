<!--BLOCK#1 START DON'T CHANGE THE ORDER-->

<?php 
$title="DEPARTMENT DETAIL | SLGTI";
include_once("config.php");// in this field we can use for database connectivity, email configure
include_once("head.php"); 
include_once("menu.php"); 
//include_once("head.php"); 
?>
 <!-- END DON'T CHANGE THE ORDER -->


<!--BLOCK#2  START YOUR CODE HERE -->

<html>
    </head>
        
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0,">
                <title>examinations</title>
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <link rel="bootstrap.min.js" href="css/styles.min.css">
    </head>
<body>
<!--Heading-->
  <div class="row">
  <div class="input-group mb-3">
  <div class="col">
    <h1 class="display-4 text-center">Students Assessments Results</h4>
    </div>
  </div>   
  </div>

  <div class="row">
  <div class="input-group mb-3">
  <div class="col">
    <h1 class="text-center">Department of Information & Communication Technology</h1>
    </div>
  </div>  
  </div>

<!--Heading End-->

  <div class="row">
  <div class="input-group mb-3">
</div>
</div>


<!--Dropdown-->
  <div class="row">
    <div class="col">
    <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect036">Select Semister</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01">
                <option selected>Choose...</option>
                <option value="1">Semister 1</option>
                <option value="2">Semister 2</option>
            </select>
    </div>

    <div class="col">
    <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect036">Select Modules</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01">
                <option selected>Choose...</option>
                <option value="1">M07</option>
                <option value="2">M05</option>
            </select>
    </div>
   

    <div class="col">
    <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect036">Assessment Type</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01">
                <option selected>Choose...</option>
                <option value="1">Written</option>
                <option value="2">Practical</option>
            </select>
    </div>

    <div class="col">
    <div class="input-group-prepend">
    <button class="btn btn-primary btn-block" type="submit">Submit form</button>
    </div>
    </div>
<!--Dropdown End-->

    <div class="row">
  <div class="input-group mb-3">
</div>
</div>



</body>
    
</html>

    <!--BLOCK#1  START DON'T CHANGE THE ORDER -->
    <?php include_once("footer.php") ;?>
    <!-- END DON'T CHANGE THE ORDER -->