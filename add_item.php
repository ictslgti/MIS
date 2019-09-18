<?php
$title = "Department Details | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>

 <!-- end default code -->

<!-- start my code -->
<form>
            <div class="row border rounded-lg border-info mr-5 ml-5 mt-5 mb-5">
            <div class="col-md-12 col-sm-12  form-group  container bg-info">
                <h2  class="pt-2" style="color:white">ADD ITEM</h2>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2 container">
                      <label class="font-weight-bold" for="authorName">01.item</label> <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="authorName" aria-describedby="authorNameHelp" placeholder="Author Name" required="required">
                      <small id="bookNameHelp" class="form-text text-muted"></small>
              </div>
              
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
                  <label class="font-weight-bold" for="pubName">02.Name</label> <span style="color:red;">*</span></label>
                  <input type="text" class="form-control" id="pubName" aria-describedby="pubNameHelp" placeholder="Publisher Name" required="required">
                  <small id="pubNameHelp" class="form-text text-muted"></small>
              </div>
              
            
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
                  <label class="font-weight-bold" for="yearPub">03.supplier</label> <span style="color:red;">*</span></label>
                  <input type="text" class="form-control" id="yearPub" aria-describedby="yearPubHelp" placeholder="Year" required="required">
                  <small id="yearPubHelp" class="form-text text-muted"></small>
              </div>
              
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
                  <label class="font-weight-bold" for="cost">04. supplier phone number</label> <span style="color:red;">*</span></label>
                  <input type="text" class="form-control" id="" aria-describedby="costHelp" placeholder="" required="required">
                  <small id="" class="form-text text-muted"></small>
          </div>
          
          <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
                  <label class="font-weight-bold" for="datePic">05. Date</label> <span style="color:red;">*</span></label>
                  <input type="date" class="form-control" id="datePic" aria-describedby="datePicHelp" required="required">
                  <small id="datePicHelp" class="form-text text-muted"></small>
                  
                  <input class="btn btn-dark ml-2 mt-2 float-right" type="reset" value="Reset">
                  <button type="submit" class="btn btn-info mt-2 float-right">Add </button>

            </div>
            </div>
      </form>




















<!-- end my code\ -->


<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>