	
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
			<div class="card"><br>
				<h4 align="center">Course Details</h4><br>
      </div>
    </div>
 <br>
 
 

 <div class="card-body">
              <div class="col-md-6">
                <select class="custom-select d-block w-100" id="Department" required>
                    <option value="">Choose Your Department </option>
                    <option>Food</option>
                    <option>Machanical</option>
                    <option>ICT</option>
                </select>
              <div class="invalid-feedback">
                Please provide a Department.
              </div>
              </div>
          </div>



  <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Course ID</th>
                      <th>Course Name</th>
                      <th>NVQ Level</th>
                      <th>Actions</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>K201</td>
                      <td>5IT</td>
                      <td>5</td>
                      <td>
                      <a href="Module" class="btn btn-primary btn-icon-split"> <span class="text">View Module</span></a>
                      <a href="course_view_more" class="btn btn-primary btn-icon-split"><span class="text">View More</span></a>
                      <a href="#" class="btn btn-primary btn-icon-split"><span class="text">Batch</span></a>
                    </td>
                    </tr>
                    <tr>
                      <td>K202</td>
                      <td>4TE</td>
                      <td>4</td>
                      <td>
                      <a href="#" class="btn btn-primary btn-icon-split"> <span class="text">View Module</span></a>
                      <a href="#" class="btn btn-primary btn-icon-split"><span class="text">View More</span></a>
                      <a href="#" class="btn btn-primary btn-icon-split"><span class="text">Batch</span></a>
                    </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </div>
<body>

</body>


<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("footer.php"); ?>  
<!--  end dont change the order-->
    
    
  
