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
                <h2  class="pt-2" style="color:white"><b>Book info</b></h2>
              </div>
              <div class="w-100"></div>
              <div class="col form-group ml-5 mr-5 mt-3 container">
                      <label for="bookName">01. Book Name</label>
                      <input type="text" class="form-control" id="bookName" aria-describedby="bookNameHelp" placeholder="Book Name">
                      <small id="bookNameHelp" class="form-text text-muted">Name of the book appeared on front cover.</small>
              </div>
              <div class="col form-group ml-5 mr-5 mt-3 container">
                      <label for="authorName">02. Author Name</label>
                      <input type="text" class="form-control" id="authorName" aria-describedby="authorNameHelp" placeholder="Author Name">
                      <small id="bookNameHelp" class="form-text text-muted">Name of the the person who written the book.</small>
              </div>
              <div class="w-100"></div>
              <div class="col form-group ml-5 mr-5 container">
                  <label for="pubName">03. Publisher Name</label>
                  <input type="text" class="form-control" id="pubName" aria-describedby="pubNameHelp" placeholder="Publisher Name">
                  <small id="pubNameHelp" class="form-text text-muted">Name of the publishing company or individual.</small>
              </div>
              <div class="col form-group ml-5 mr-5 container">
                  <label for="isbn">04. ISBN</label>
                  <input type="text" class="form-control" id="isbn" aria-describedby="isbnHelp" placeholder="ISBN">
                  <small id="isbnHelp" class="form-text text-muted">ISBN Number of the book. If no ISBN let be empty</small>
              </div>
              <div class="w-100"></div>
              <div class="col form-group ml-5 mr-5 container">
                  <label for="category">05. Book Category</label>
                  
                  <select class="form-control" name="category">
                      <option value="ict">ICT</option>
                      <option value="construction">Construction</option>
                      <option value="mechanical">Mechanical</option>
                      <option value="autoMobile">Auto Mobile</option>
                      <option value="food">Food Tech</option>
                      <option value="electronic">Electronic</option>
                      <option value="common">Common</option>
                    </select>
                  <small id="pubNameHelp" class="form-text text-muted">Chose acategory from dropdown menu.</small>
              </div>
              <div class="col form-group ml-5 mr-5 container">
                  <label for="yearPub">06. Year of publication</label>
                  <input type="text" class="form-control" id="yearPub" aria-describedby="yearPubHelp" placeholder="Year">
                  <small id="yearPubHelp" class="form-text text-muted">Input the year of first publication</small>
              </div>
              <div class="w-100"></div>
              <div class="col form-group ml-5 mr-5 container">
                  <label for="cost">07. Book Cost</label>
                  <input type="text" class="form-control" id="cost" aria-describedby="costHelp" placeholder="Book Cost">
                  <small id="costHelp" class="form-text text-muted">Retail price of the book.</small>
          </div>
          <div class="col form-group ml-5 mr-5 container">
                  <label for="datePic">08. Purchesed Date</label>
                  <input type="date" class="form-control" id="datePic" aria-describedby="datePicHelp">
                  <small id="datePicHelp" class="form-text text-muted">Purchesed Date or donated date.</small>

                  <input class="btn btn-dark ml-2 mt-3 float-right" type="reset" value="Reset">
                  <button type="submit" class="btn btn-primary mt-3 float-right">Add Book</button>

            </div>
            </div>
          </div>
      </form>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->  
