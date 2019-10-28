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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>paymentreoprt</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.min.css">
<style>
</style>
</head>

<body>
  <h1 class="text-center display-3">SLGTI Payment Report Portal</h1><br>
  
  <div class="container-fluid">
      <div class="row">
          <div class="col-sm-4">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card-alt"></i>&nbsp;Payment ID&nbsp;&nbsp;</span>
                  </div>
                  <input type="text" class="form-control" placeholder="Consumer ID" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i>&nbsp;Consumer ID</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Consumer Name" aria-label="Username" aria-describedby="basic-addon1">
                  </div>

          </div>
          
          <div class="col-sm-4">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01"> <i class="fas fa-building"></i>&nbsp;Department&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                  </div>
                  <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01"> <i class="fas
                        fa-swatchbook"></i>&nbsp;Payment Reason</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01">
                      <option selected>Choose...</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
          </div>
          <div class="col-sm-4">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-times"></i></i>&nbsp; Start Date</span>
                  </div>
                  <input type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-times"></i>&nbsp; End Date&nbsp;&nbsp;</span>
                    </div>
                    <input type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>

                  

          </div>

          
        </div>
        <!-- ------------------------------------------------------------------------------------- -->
        <button type="button" class="btn btn-primary btn-lg">Get Report</button>
                  <button type="button" class="btn btn-secondary btn-lg">Reset</button>


    </div>
<br>
    <div class="container-fluid">
    <div class="row">

        <table class="table">
            
    <tr>
    <th>PAYMENT ID</th>
        <th>STUDENT ID</th>
        <th>PAYMENT CATEGORY</th>
        <th>PAYMENT REASON</th>
        <th>PAYMENT NOTE</th>
        <th>PAYMENT AMOUNT</th>
        <th>PAYMENTQTY</th>
        <th>PAYMENT DATE</th>
        <th>PAYMENT DEPARTMENT</th>
        

</tr>





</table>

    </div>
    </div>
</body>
	

    			
            
            

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->