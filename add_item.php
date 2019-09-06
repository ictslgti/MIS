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
                     <h2  class="pt-2" style="color:white"><b>Add Item</b></h2>
                </div>

                    <div class="w-100"></div>
                        <div class="col form-group ml-5 mr-5 mt-3 container">
                            <label for="Department ID">01.Item ID</label>
                            <input type="text" class="form-control" id="department id" aria-describedby="Item ID" placeholder="Item ID">
                            <small id="bookNameHelp" class="form-text text-muted"></small> 
                            <label for="Inventory ID">02. Name</label>
                            <input type="text" class="form-control" id="authorName" aria-describedby="Inventory ID" placeholder="Inventory ID">
                            <small id="bookNameHelp" class="form-text text-muted"></small>
    
                        <label for="Supplier">03.Supplier</label>
                        <input type="text" class="form-control" id="Supplier" aria-describedby="Item ID" placeholder=" Supplier">
                        <small id="Item ID" class="form-text text-muted"></small>
                    
                        <label for="Supplier Phone Number">04. Supplier Phone Number</label>
                        <input type="text" class="form-control" id="Supplier Phone Number" aria-describedby="Supplier Phone Number" placeholder="Supplier Phone Number">
                        <small id="Supplier Phone Number" class="form-text text-muted"></small>
              
                            </select>
                        <small id="pubNameHelp" class="form-text text-muted"></small>
                        <input class="btn btn-dark ml-2 mt-3 float-right" type="reset" value="Reset">
                        <button type="submit" class="btn btn-primary ml-2 mt-3 float-right">delete</button>
                        <button type="submit" class="btn btn-primary ml-2 mt-3 float-right">update </button>
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