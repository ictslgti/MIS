
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
          <button type="button" id="add_button" class="btn btn-info btn-sm">Add</button>
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




<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("menu.php"); ?>  
<!--  end dont change the order-->

