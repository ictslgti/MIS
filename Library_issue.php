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
        <div class="container" style=" margin-top: 10%; border: 2px solid #0275d8; border-radius: 8px;"> 
            <div class="row">
            <div class="col form-group  container" style="background-color:#0275d8">
                <h2  class="pt-2" style="color:white"><b>Issue a New Book</b></h2>
              </div>
              <div class="w-100"></div>
              <div class="col form-group ml-5 mr-5 mt-3 container">
                      <label for="bookName">01. Book Serial</label>
                      <input type="text" class="form-control" id="bookSerial" aria-describedby="bookSerialHelp" placeholder="Book Serial">
                      <small id="bookSerialHelp" class="form-text text-muted">Type the serial number of the book located on back side.</small>
              </div>
              <div class="col form-group ml-5 mr-5 mt-3 container">
                      <label for="authorName">02. Member ID</label>
                      <input type="text" class="form-control" id="memberID" aria-describedby="memberIDHelp" placeholder="Member ID">
                      <small id="memberIDHelp" class="form-text text-muted">ID of borrower.</small>
              </div>
              <div class="w-100"></div>
            <div class="col form-group ml-5 mr-5 container">
                      
                      <input type="text" class="form-control" id="bookName" aria-describedby="bookNameHelp" placeholder="Name of the book will apper here" disabled>
                      <small id="bookNameHelp" class="form-text text-muted">Book name of the serial number you're entered.</small>
              </div>
              <div class="w-100"></div>
              <div class="col form-group ml-1 mr-5 container">
                  <input class="btn btn-dark ml-2 mt-1 float-right" type="reset" value="Reset">
                  <button type="submit" class="btn btn-primary mt-1 float-right">Issue Book</button>
            </div>

            </div>
          </div>
      </form>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->  
