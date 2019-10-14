<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->


          <!-- Content here -->
        

          <div class="row">
          <div class="col">
          <br>
          <br>
          <img src="img/SLGTI.png" class="img-fluid" alt="Responsive image">
          <br>
          <h1 class="text-primary">Student OJT Request</h1>
          <br>
          <br>
          </div>
          </div>
        
        <div class="row">
            <div class="col">
                <form>
                   

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-user-graduate"></i>Student Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text" class="form-control" id="stu_name" placeholder="Enter Full name" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-address-card"></i>Student ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text" class="form-control" id="stu_id" placeholder="Enter your Student ID" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="far fa-building"></i>Department &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <select class="form-control" id="Dept" required>
                    <option Readonly>Select Your Department </option>
                    <option>Information & Communication Technology</option>
                    <option>Food Technology</option>
                    <option>Automotive Technology</option>
                    <option>Electrical & Electronics</option>
                    <option>Mechanical</option>
                    </select>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-map-marker-alt"></i>District 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text" class="form-control" id="dst1" placeholder="Enter your wanted district" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-map-marker-alt"></i>  District 2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text" class="form-control" id="dst2" placeholder="Enter your wanted other district" required>
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder">Do you want Salary&nbsp;</span>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" aria-label="Checkbox for following text input" id="address" placeholder="Enter request place address" required> &nbsp;&nbsp;YES&nbsp;&nbsp;
                    <input type="checkbox" aria-label="Checkbox for following text input" id="address" placeholder="Enter request place address" required> &nbsp;&nbsp;NO&nbsp;&nbsp;
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-7 mb-4"> 
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bolder"><i class="fas fa-user-graduate"></i>Comments&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input type="text" class="form-control" id="cmts">
                    <div class="invalid-feedback" style="width: 80%;">
                    </div>
                    </div>
                    </div>

                    <div>
                    <button type="button" class="btn btn-outline-primary font-weight-bolder">Requesting...</button>
                    </div>
                   
                    
                </form>

            </div>
        </div>
        <br>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->