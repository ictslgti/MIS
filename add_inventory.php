<?php
$title = "Department Details | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!-- end default code -->

<!-- start my code -->
<form>
        <div class="container" style=" margin-top: 10%; border: 2px solid 	#ADD8E6; border-radius: 8px;"> 
            <div class="row">
                <div class="col form-group  container" style="background-color:	#ADD8E6">
                     <h2  class="pt-2" style="color:white"><b>Add Inventory</b></h2>
                </div>

                    <div class="w-100"></div>
                        <div class="col form-group ml-5 mr-5 mt-3 container">
                            <label for="Department ID">01. Department ID</label>
                            <input type="text" class="form-control" id="department id" aria-describedby="Department ID" placeholder="Department ID">
                            <small id="bookNameHelp" class="form-text text-muted"></small> 
                            <label for="Inventory ID">02. Inventory ID</label>
                            <input type="text" class="form-control" id="authorName" aria-describedby="Inventory ID" placeholder="Inventory ID">
                            <small id="bookNameHelp" class="form-text text-muted"></small>
    
                        <label for="Item ID">03. Item ID</label>
                        <input type="text" class="form-control" id="Item ID" aria-describedby="Item ID" placeholder=" Item ID">
                        <small id="Item ID" class="form-text text-muted"></small>
                    
                        <label for="Quantity">04. Quantity</label>
                        <input type="text" class="form-control" id="Quantity" aria-describedby="Quantity" placeholder="Quantity">
                        <small id="Quantity" class="form-text text-muted"></small>
                    
                        <label for="category">05. Notice</label>
                        
                        <select class="form-control" name="category">
                            <option value="Working">Working</option>
                            <option value="Dmage">Dmage</option>
                            
                            </select>
                        <small id="pubNameHelp" class="form-text text-muted"></small>
                        <input class="btn btn-dark ml-2 mt-3 float-right" type="reset" value="Reset">
                        <button type="submit" class="btn btn-danger  ml-2 mt-3 float-right">delete</button>
                        <button type="submit" class="btn btn-success ml-2 mt-3 float-right">update </button>
                        <button type="submit" class="btn btn-primary ml-2 mt-3 float-right">Add </button>
                      
                    </div>
                    </div>
                
                
        
                        
                       

            </div>
            </div>
          </div>
      </form>












<!-- end my code\ -->


<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>