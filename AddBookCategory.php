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
    <div class="col-md-4 col-sm-12 form-group pl-3 pr-3 pt-2">
    </div>
    <div class="col-md-4 col-sm-12  form-group ">
        <div class="card">
            <h5 class="card-header bg-info" style="color:white">Category Info</h5>
            <div class="card-body">
                <p class="card-text font-weight-bold">Category Name</p>
                <input type="text" class="form-control" id="fine" placeholder="Category" required="required">

                <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">Active</label>
                </div>
                <br>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">Inactive</label>
                </div>
                <br>
                <a href="#" class="btn btn-info mt-3">Add Category</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 form-group pl-3 pr-3 pt-2">
    </div>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->  
