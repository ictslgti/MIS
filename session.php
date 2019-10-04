
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
<div class="container" style="margin-top:30px">
  <div class="card">
   <div class="card-header">
      <div class="row">
        <div class="col-md-9">Session List</div>
        <div class="col-md-3" align="right">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add</button>

<!-- Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Add Session</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Session Name <span class="text-danger">*</span></label>
              <div class="col-md-8">
                <input type="text" name="grade_name" id="grade_name" class="form-control" />
                <span id="error_grade_name" class="text-danger"></span>
              </div>
            </div>
          </div>

          <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Time<span class="text-danger">*</span></label>
              <div class="col-md-8">
                <input type="text" name="grade_name" id="grade_name" class="form-control" />
                <span id="error_grade_name" class="text-danger"></span>
              </div>
            </div>
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
     <table class="table table-striped table-bordered" id="grade_table">
      <thead>
       <tr>
        <th>Session Name</th>
        <th>Edit</th>
        <th>Delete</th>
       </tr>
       <tr>
            <td>fjhfj</td>
            <td><button type="button" class="btn btn-primary">Edit</button></td>
            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
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
       <h3  align="center"> Are you sure you want to remove this?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
        <button type="button" class="btn btn-danger">Close</button>
      </div>
    </div>
  </div>
</div></td>
            </tr>

            <tr>
            <td>fjhfj</td>
            <td><button type="button" class="btn btn-primary">Edit</button></td>
            <td><button type="button" class="btn btn-danger">Delete</button></td>
            </tr>

            <tr>
            <td>fjhfj</td>
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
</body>
</html>




<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("menu.php"); ?>  
<!--  end dont change the order-->