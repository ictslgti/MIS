
<!--Block#1 start dont change the order-->
<?php 
$title="Home | SLGTI";    
include_once ("config.php");
include_once ("head.php");
include_once ("menu.php");
include_once ("attendancenav.php");
?>
<!-- end dont change the order-->

<!-- Block#2 start your code -->
<!-- Button trigger modal -->


      


<div class="container" style="margin-top:30px">
  <div class="card">
   <div class="card-header">
      <div class="row">
        <div class="col-md-9">Teacher List</div>
        <div class="col-md-3" align="right">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add</button>

<!-- Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Add Session Head</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Teacher Name <span class="text-danger">*</span></label>
              <div class="col-md-8">
                <input type="text" name="teacher_name" id="teacher_name" class="form-control" />
                <span id="error_teacher_name" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Address <span class="text-danger">*</span></label>
              <div class="col-md-8">
                <textarea name="teacher_address" id="teacher_address" class="form-control"></textarea>
                <span id="error_teacher_address" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Email Address <span class="text-danger">*</span></label>
              <div class="col-md-8">
                <input type="text" name="teacher_emailid" id="teacher_emailid" class="form-control" />
                <span id="error_teacher_emailid" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Grade <span class="text-danger">*</span></label>
              <div class="col-md-8">
                <select name="teacher_grade_id" id="teacher_grade_id" class="form-control">
                  <option value="">Select Grade</option>
                  
                </select>
                <span id="error_teacher_grade_id" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Date Of Join <span class="text-danger">*</span></label>
              <div class="col-md-8">
              <input class="form-control" id="date" name="date" placeholder="Select Date" type="text"/>
                <span id="error_attendance_date" class="text-danger"></span>
              </div>
            </div>
          </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Image <span class="text-danger">*</span></label>
              <div class="col-md-8">
                <input type="file" name="teacher_image" id="teacher_image" />
                <span class="text-muted">Only .jpg and .png allowed</span><br />
                <span id="error_teacher_image" class="text-danger"></span>
              </div>
            </div>
          

        </div>
        
      
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Add</button>
      
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      
    </div>
    
    </div>
</div>
</div>
        </div>
      </div>
    </div>
    <div class="row">

<div class="col-sm-9 " ></div>
<div class="col-sm-3 " > 
<form class="form-inline md-form form-sm mt-4">
  <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="text" placeholder="Search ID" aria-label="Search"id="search"> 
  <i class="fas fa-search ml-3" aria-hidden="true"></i>
</form>
</div>
</div>

   <div class="card-body">
    <div class="table-responsive">
        <span id="message_operation"></span>
     <table class="table table-striped table-bordered" id="teacher_table">
      <thead>
       <tr>
        <th>Image</th>
        <th>Teacher Name</th>
        <th>Email Address</th>
              <th>Session</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
       </tr>
       <tr>
            <td> </td>
            <td>puja umashanker</td>
            <td>hanushiya@gmail.com</td>
            <td>software programming</td>
            <td><!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
  View
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="sessionhead_details">
        ...




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
</td>
            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Edit</button>

<!-- Modal -->
<div class="modal fade" id="myModal1">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Edit Session Head</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Teacher Name <span class="text-danger">*</span></label>
              <div class="col-md-8">
                <input type="text" name="teacher_name" id="teacher_name" class="form-control" />
                <span id="error_teacher_name" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Address <span class="text-danger">*</span></label>
              <div class="col-md-8">
                <textarea name="teacher_address" id="teacher_address" class="form-control"></textarea>
                <span id="error_teacher_address" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Email Address <span class="text-danger">*</span></label>
              <div class="col-md-8">
                <input type="text" name="teacher_emailid" id="teacher_emailid" class="form-control" />
                <span id="error_teacher_emailid" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Grade <span class="text-danger">*</span></label>
              <div class="col-md-8">
                <select name="teacher_grade_id" id="teacher_grade_id" class="form-control">
                  <option value="">Select Grade</option>
                  
                </select>
                <span id="error_teacher_grade_id" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Date Of Join <span class="text-danger">*</span></label>
              <div class="col-md-8">
              <input class="form-control" id="date" name="date" placeholder="Select Date" type="text"/>
                <span id="error_attendance_date" class="text-danger"></span>
              </div>
            </div>
          </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Image <span class="text-danger">*</span></label>
              <div class="col-md-8">
                <input type="file" name="teacher_image" id="teacher_image" />
                <span class="text-muted">Only .jpg and .png allowed</span><br />
                <span id="error_teacher_image" class="text-danger"></span>
              </div>
            </div>
          

        </div>
        
      
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Edit</button>
      
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      
    </div>
    
    </div>
</div>
</div>
        </div>
      </div>
    </div></td>
            <td><!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h3 align="center">Are you sure you want to remove this?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
        <button type="button" class="btn btn-danger">Close</button>
      </div>
    </div>
  </div>
</div></td>
            </tr>

            <tr>
            <td> </td>
            <td>puja umashanker</td>
            <td>hanushiya@gmail.com</td>
            <td>software programming</td>
            <td><button type="button" class="btn btn-info">View</button></td>
            <td><button type="button" class="btn btn-primary">Edit</button></td>
            <td><button type="button" class="btn btn-danger">Delete</button></td>
            </tr>


            <tr>
            <td> </td>
            <td>puja umashanker</td>
            <td>hanushiya@gmail.com</td>
            <td>software programming</td>
            <td><button type="button" class="btn btn-info">View</button></td>
            <td><button type="button" class="btn btn-primary">Edit</button></td>
            <td><button type="button" class="btn btn-danger">Delete</button></td>
            </tr>
      </thead>
      <tbody>

      </tbody>
     </table>


     <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item ">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
    </div>
   </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
</body>
</html>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>

<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("menu.php"); ?>  
<!--  end dont change the order-->

