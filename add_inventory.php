<?php
$title = "Department Details | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!-- end default code -->

<!-- start my code -->
<form>
        <div class="container" style=" margin-top: 10%; border: 2px solid #0275d8; border-radius: 8px;"> 
            <div class="row">
            <div class="col form-group  container" style="background-color:#0275d8">
                <h2  class="pt-2" style="color:white"><b>Add Inventory</b></h2>
              </div>
              <div class="w-100"></div>
              <div class="col form-group ml-5 mr-5 mt-3 container">
                      <label for="bookName">01. Department ID</label>
                      <input type="text" class="form-control" id="department id" aria-describedby="bookNameHelp" placeholder="Department ID">
                      <small id="bookNameHelp" class="form-text text-muted"></small>
              </div>
              <div class="col form-group ml-5 mr-5 mt-3 container">
                      <label for="authorName">02. Inventory ID</label>
                      <input type="text" class="form-control" id="authorName" aria-describedby="authorNameHelp" placeholder="Inventory ID">
                      <small id="bookNameHelp" class="form-text text-muted"></small>
              </div>
              <div class="w-100"></div>
              <div class="col form-group ml-5 mr-5 container">
                  <label for="pubName">03. Item ID</label>
                  <input type="text" class="form-control" id="pubName" aria-describedby="pubNameHelp" placeholder=" Item ID">
                  <small id="pubNameHelp" class="form-text text-muted"></small>
              </div>
              <div class="col form-group ml-5 mr-5 container">
                  <label for="isbn">04. Quantity</label>
                  <input type="text" class="form-control" id="isbn" aria-describedby="isbnHelp" placeholder="Quantity">
                  <small id="isbnHelp" class="form-text text-muted"></small>
              </div>
              <div class="w-100"></div>
              <div class="col form-group ml-5 mr-5 container">
                  <label for="category">05. Notice</label>
                  
                  <select class="form-control" name="category">
                      <option value="Working">Working</option>
                      <option value="Dmage">Dmage</option>
                     
                    </select>
                  <small id="pubNameHelp" class="form-text text-muted">Chose acategory from dropdown menu.</small>
              </div>
           
          
          <div class="col form-group ml-5 mr-5 container">
                  
                  <input class="btn btn-dark ml-2 mt-3 float-right" type="reset" value="Reset">
                  <button type="submit" class="btn btn-primary mt-3 float-right">delete</button>
                  <button type="submit" class="btn btn-primary mt-3 float-right">Add </button>
                  <button type="submit" class="btn btn-primary mt-3 float-right">update </button>

            </div>
            </div>
          </div>
      </form>












<!-- end my code\ -->


<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>