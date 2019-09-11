<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->  
<?php
$title = "Home | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER--> 

<!--BLOCK#2 START YOUR CODE HERE -->
<form>
        <div class="row border rounded-lg border-info mr-5 ml-5 mt-5 mb-5">
            <div class="col-md-12 col-sm-12  form-group  container bg-info">
            <h2  class="pt-2" style="color:white">Issue Book</h2>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2">
                      <label class="font-weight-bold"  for="bookName">01. Book Serial</label>
                      <input type="text" class="form-control" id="bookSerial" aria-describedby="bookSerialHelp" placeholder="Book Serial">
                      <small id="bookSerialHelp" class="form-text text-muted">Type the serial number of the book located on back side.</small>
              </div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2">
                      <label class="font-weight-bold" for="authorName">02. Member ID</label>
                      <input type="text" class="form-control" id="memberID" aria-describedby="memberIDHelp" placeholder="Member ID">
                      <small id="memberIDHelp" class="form-text text-muted">ID of borrower.</small>
              </div>
              <div class="w-100"></div>
              <div class="col-md-12 col-sm-12 form-group pl-3 pr-3">
                      <input type="text" class="form-control" id="bookName" aria-describedby="bookNameHelp" placeholder="Name of the book will apper here" disabled>
                      <small id="bookNameHelp" class="form-text text-muted">Book name of the serial number you're entered.</small>
              </div>
              <div class="w-100"></div>
              <div class="col-md-12 col-sm-12 form-group pl-3 pr-3">
                <input class="btn btn-dark ml-2 mt-2 float-right" type="reset" value="Reset">
                <button type="submit" class="btn btn-info mt-2 float-right">Issue Book</button>
            </div>

            </div>
      </form>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->  
