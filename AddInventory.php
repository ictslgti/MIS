<?php
$title = "Department Details | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!-- end default code -->

<!-- start my code -->
<form>
<div class="row ">
            <div class="col-md-12 col-sm-12  form-group  container bg-info">
                <h2  class="pt-2" style="color:white">ADD INVENTORY</h2>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2 container">
                      <label class="font-weight-bold" for="">01.DEPARTMENT ID</label> <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="" aria-describedby="" placeholder="DEPARTMENT ID" required="required">
                      <small id="" class="form-text text-muted"></small>
              </div>
              
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2 container">
                      <label class="font-weight-bold" for="authorName">02.INVENTORY ID</label> <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="inventory" aria-describedby="inventory" placeholder="inventory" required="required">
                      <small id="bookNameHelp" class="form-text text-muted"></small>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
                  <label class="font-weight-bold" for="ITEM">03. ITEM ID</label> <span style="color:red;">*</span></label>
                  <input type="text" class="form-control" id="ITEM" aria-describedby="ITEM" placeholder="ITEM" required="required">
                  <small id="ITEM" class="form-text text-muted"></small>
              </div>
        
             
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
                  <label class="font-weight-bold" for="category">04.STATAUS</label> <span style="color:red;">*</span></label>
                  
                  <select class="form-control" name="category">
                      <option value="working">working</option> 
                      <option value="dmage">damage</option>
            
                    </select>
                  <small id="pubNameHelp" class="form-text text-muted"></small>
              </div>
              
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
                  <label class="font-weight-bold" for="cost">05.QUANTITY</label> <span style="color:red;">*</span></label>
                  <input type="text" class="form-control" id="quantity" aria-describedby="quantity" placeholder="quantity" required="required">
                  <small id="quantity" class="form-text text-muted"></small>
          </div>
          <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 container">
              
          <input class="btn btn-dark ml-2 mt-3 float-right" type="reset" value="Reset">
                        <button type="submit" class="btn btn-primary ml-2 mt-3 float-right">Add </button>
                        <button type="submit" class="btn btn-primary ml-2 mt-3 float-right"  onclick="location.href='inventory_view.php'">view </button>
                 
                 

            </div>
            </div>
      </form>












<!-- end my code\ -->


<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>