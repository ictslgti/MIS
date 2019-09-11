<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->  
<?php
$title = "Home | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER--> 

<!--BLOCK#2 START YOUR CODE HERE -->
<div class="row mt-5">
<div class="w-100"></div>
    <div class="col-md-3 col-sm-12 form-group pl-3 pr-3 pt-2">
    </div>
    <div class="col-md-6 col-sm-12  form-group  container">
        <div class="card">
            <h5 class="card-header bg-info" style="color:white">Issued Book Details</h5>
            <div class="card-body">
                <p class="card-text">Member Name : <span style="color:red;">Anamica Robet</span> </p>
                <p class="card-text">Member ID : <span style="color:red;">Anamica Robet</span> </p>
                <p class="card-text">Possion: <span style="color:red;">Leacture</span> </p>
                <p class="card-text">Book Name : <span style="color:red;">Think Java</span> </p>
                <p class="card-text">Serial : <span style="color:red;"></span> 24859 </p>
                <p class="card-text">Book Issued Date : <span style="color:red;">2017-07-15 23:32:55</span> </p>
                <p class="card-text">Book Returned Date : <span style="color:red;">Not Return Yet</span> </p>
                <p class="card-text">Fine Reson: </p>
                <input type="text" class="form-control" id="fine" placeholder="Fine Reson" required="required">
                <p class="card-text  pt-3">Fine (in LKR) : </p>
                <input type="text" class="form-control" id="fine" placeholder="Fine Amount" required="required">
                <a href="#" class="btn btn-info mt-4">Return Book</a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12 form-group pl-3 pr-3 pt-2">
    </div>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->  
