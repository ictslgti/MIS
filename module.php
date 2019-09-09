	
<!--Block#1 start dont change the order-->
<?php 
$title="Module details | SLGTI";    
include_once ("config.php");
include_once ("head.php");
include_once ("menu.php");
?>
<!-- end dont change the order-->


<!-- Block#2 start your code -->

<hr class="mb-8 mt-4">
  
		<div class="card mt-12 ">
			<div class="card"><br>
				<h4 align="center">ADD Module Details</h4><br>
      </div>
      </div>
      <br>
      <br>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="ID">Module ID</label>
                <input type="text" class="form-control" id="ID" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Module ID is required.
                </div>
              </div>

              
              <div class="col-md-6 mb-3">
                <label for="Name">Module Name</label>
                <input type="text" class="form-control" id="Name" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Module Name is required.
                </div>
                
                <div class="invalid-feedback">
                  Please provide a Module name
                </div>
              </div>

            </div>
            <div class="row">
            <div class="col-md-6 mb-3"> 
              <label for="National">National Hours</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Hrs</span>
                </div>
                <input type="text" class="form-control" id="National" placeholder="Hours in Digits" required>
                
                <div class="invalid-feedback" style="width: 50%;">
                  Duration is required.
                </div>
                
              </div>
           

            </div>

            <div class="col-md-6 mb-3"> 
              <label for="Learning">Learning Hours</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Hrs</span>
                </div>
                <input type="text" class="form-control" id="Learning" placeholder="Hours in Digits" required>
                
                <div class="invalid-feedback" style="width: 50%;">
                  Duration is required.
                </div>
                
              </div>
           

            </div>




            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="semister">Semister</label>
                <input type="text" class="form-control" id="semister" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid semister is required.
                </div>
              </div>

              
              <div class="col-md-6 mb-3">
                <label for="unit">Relative Unit</label>
                <input type="text" class="form-control" id="unit" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Relative Unit is required.
                </div>
                
                <div class="invalid-feedback">
                  Please provide a Relative Unit name
                </div>
              </div>

              </div>
               
                
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="aim">Module aim</label>
                <textarea class="form-control" id="Module aim" rows="3"></textarea>
                <div class="invalid-feedback">
                  Module is required.
                </div>
              </div>

              
              <div class="col-md-3 mb-3">
                <label for="unit">Learning Outcomes</label>
                <textarea class="form-control" id="Outcomes" rows="3"></textarea>
                    <div class="invalid-feedback">
                    Learning Outcomes is required.
                    </div>
                
                    <div class="invalid-feedback">
                    Please provide a Relative Unit name
                    </div>
              </div>

              <div class="col-md-3 mb-3">
                <label for="resources">Resources</label>
                <textarea class="form-control" id="resources" rows="3"></textarea>
                <div class="invalid-feedback">
                Resources is required.
                </div>
              </div>

              
              <div class="col-md-3 mb-3">
                <label for="references">References</label>
                <textarea class="form-control" id="References" rows="3"></textarea>
                    <div class="invalid-feedback">
                    References is required.
                    </div>
                
                    <div class="invalid-feedback">
                    Please provide References name
                    </div>
              </div>

              </div>

            <br>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to Add Module Details</button>
          </form>
        </div>
      </div>
</div>
     
       
      
      <body>


      
		
				
  
</body>
<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("menu.php"); ?>  
<!--  end dont change the order-->
    
    
  