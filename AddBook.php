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
                <h2  class="pt-2" style="color:white">Book info</h2>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2">
                      <label class="font-weight-bold" for="bookName">01. Book Name</label> <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="bookName" aria-describedby="bookNameHelp" placeholder="Book Name" required="required">
                      <small id="bookNameHelp" class="form-text text-muted">Name of the book appeared on front cover.</small>
              </div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2">
                      <label class="font-weight-bold" for="authorName">02. Author Name</label> <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="authorName" aria-describedby="authorNameHelp" placeholder="Author Name" required="required">
                      <small id="bookNameHelp" class="form-text text-muted">Name of the the person who written the book.</small>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="pubName">03. Publisher Name</label> <span style="color:red;">*</span></label>
                  <input type="text" class="form-control" id="pubName" aria-describedby="pubNameHelp" placeholder="Publisher Name" required="required">
                  <small id="pubNameHelp" class="form-text text-muted">Name of the publishing company or individual.</small>
              </div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="isbn">04. ISBN</label>
                  <input type="text" class="form-control" id="isbn" aria-describedby="isbnHelp" placeholder="ISBN" required="required">
                  <small id="isbnHelp" class="form-text text-muted">ISBN Number of the book. If no ISBN let be empty</small>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="category">05. Book Category</label> <span style="color:red;">*</span></label>
                  
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
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="yearPub">06. Year of publication</label> <span style="color:red;">*</span></label>
                  <input type="text" class="form-control" id="yearPub" aria-describedby="yearPubHelp" placeholder="Year" required="required">
                  <small id="yearPubHelp" class="form-text text-muted">Input the year of first publication</small>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="cost">07. Book Cost</label> <span style="color:red;">*</span></label>
                  <input type="text" class="form-control" id="cost" aria-describedby="costHelp" placeholder="Book Cost" required="required">
                  <small id="costHelp" class="form-text text-muted">Retail price of the book.</small>
          </div>
          <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="datePic">08. Purchesed Date</label> <span style="color:red;">*</span></label>
                  <input type="date" class="form-control" id="datePic" aria-describedby="datePicHelp" required="required">
                  <small id="datePicHelp" class="form-text text-muted">Purchesed Date or donated date.</small>

                  <input class="btn btn-dark ml-2 mt-2 float-right" type="reset" value="Reset">
                  <button type="submit" class="btn btn-info mt-2 float-right">Add Book</button>

            </div>
            </div>
      </form>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->  
