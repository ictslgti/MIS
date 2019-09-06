	
<!--Block#1 start dont change the order-->
<?php 
$title="Course details | SLGTI";    
include_once ("config.php");
include_once ("head.php");
include_once ("menu.php");
?>
<!-- end dont change the order-->


<!-- Block#2 start your code -->

<hr class="mb-8 mt-4">
  
		<div class="card mt-12 ">
			<div class="card-header">
				<h4 align="center">ADD Course Details</h4>
      </div>
      </div>
      </div>
       
      <hr class="mb-8 mt-4">
      <br>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Course ID</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Course ID is required.
                </div>
              </div>

              
              <div class="col-md-6 mb-3">
                <label for="firstName">Course Name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Course Name is required.
                </div>
                
                <div class="invalid-feedback">
                  Please provide a Course name
                </div>
              </div>

            

            </div>
            <div class="row">
            <div class="col-md-6 mb-3"> 
              <label for="username">Duration-Institute Learning</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Months</span>
                </div>
                <input type="text" class="form-control" id="username" placeholder="Hours in Digits" required>
                
                <div class="invalid-feedback" style="width: 50%;">
                  Duration is required.
                </div>
                
              </div>
           

            </div>

            <div class="col-md-6 mb-3"> 
              <label for="username">Duration-OJT</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Months</span>
                </div>
                <input type="text" class="form-control" id="username" placeholder="Hours in Digits" required>
                
                <div class="invalid-feedback" style="width: 50%;">
                  Duration is required.
                </div>
                
              </div>
           

            </div>




            </div>

           

            <div class="row">

              <div class="col-md-6 mb-3">
              <label for="state">Department</label>
                  <select class="custom-select d-block w-100" id="state" required>
                    <option value="">Choose...</option>
                    <option>ICT</option>
                    <option>Construction</option>
                    <option>Mechanical</option>
                    <option>Electrical</option>
                    <option>Automobile</option>
                    <option>Food Dept</option>
                  </select>
                <div class="invalid-feedback">
                  Please provide a Department.
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="country">NVQ Level</label>
                  <select class="custom-select d-block w-100" id="country" required>
                    <option value="">Choose...</option>
                    <option>5</option>
                    <option>4</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid Level.
                  </div>
              </div>
                <br><br>

            </div>
            
            
            
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to Add Course Details</button>
          </form>
        </div>
      </div>
      <body>


      
		
				
  
</body>
<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("menu.php"); ?>  
<!--  end dont change the order-->
    
    
  