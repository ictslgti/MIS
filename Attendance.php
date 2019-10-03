
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
        <div class="col-md-9">Overall Student Attendance Status</div>
        <div class="col-md-3" align="right">
          
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
        <table class="table table-striped table-bordered" id="student_table">
          <thead>
            <tr>
              <th>Student Name</th>
              <th>Roll Number</th>
              <th>Session</th>
              <th>Session head</th>
              <th>Attendance Percentage</th>
              <th>Report</th>
            </tr>
            <tr>
            <td>fjhfj</td>
            <td>fjhfj</td>
            <td>fjhfj</td>
            <td>fjhfj</td>
            <td>70%</td>
            <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Report</button>

<!-- Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Make Report</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <div class="input-daterange">
      <input class="form-control" id="date" name="date" placeholder="From Date" type="text"/>
            <span id="error_from_date" class="text-danger"></span>
            <br />
            <input class="form-control" id="date" name="date" placeholder="From Date" type="text"/>
            <span id="error_to_date" class="text-danger"></span>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Create Report</button>
      
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      
    </div>
    
  </div>
</div></td>
            </tr>

            <tr>
            <td>fjhfj</td>
            <td>fjhfj</td>
            <td>fjhfj</td>
            <td>fjhfj</td>
            <td>70%</td>
            <td> <button type="button" class="btn btn-primary">Report</button></td>
            </tr>


            <tr>
            <td>fjhfj</td>
            <td>fjhfj</td>
            <td>fjhfj</td>
            <td>fjhfj</td>
            <td>70%</td>
            <td> <button type="button" class="btn btn-primary">Report</button></td>
            </tr>


            
            <tr>
            <td>fjhfj</td>
            <td>fjhfj</td>
            <td>fjhfj</td>
            <td>fjhfj</td>
            <td>35%</td>
            <td> <button type="button" class="btn btn-primary">Report</button></td>
            </tr>
            <tr>
            <td>fjhfj</td>
            <td>fjhfj</td>
            <td>fjhfj</td>
            <td>fjhfj</td>
            <td>90%</td>
            <td> <button type="button" class="btn btn-primary">Report</button></td>
            </tr>
            <tr>
            <td>fjhfj</td>
            <td>fjhfj</td>
            <td>fjhfj</td>
            <td>fjhfj</td>
            <td>50%</td>
            <td> <button type="button" class="btn btn-primary">Report</button></td>
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

</body>
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