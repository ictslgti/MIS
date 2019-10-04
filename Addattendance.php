
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
        <div class="col-md-9">Attendance List</div>
        <div class="col-md-3" align="right">
        

          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">Add</button>
         </div>

         
        


         <!-- strt model codee -->
         <div class="modal fade" id="myModal">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Add Attendance</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="form-group">
            <div class="row">
              <label class="col-md-3 text-right">Grade <span class="text-danger">*</span></label>
              <div class="col-md-8">
                
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-3 text-right">Attend Date <span class="text-danger">*</span></label>
              <div class="col-md-8">
              <input class="form-control" id="date" name="date" placeholder="From Date" type="text"/>
                <span id="error_attendance_date" class="text-danger"></span>
              </div>
            </div>
          </div>

          <div class="card-body">
    <div class="table-responsive">
        <span id="message_operation"></span>
     <table class="table table-striped table-bordered" id="attendance_table">
      <thead>
       <tr>
        <th>Roll No</th>
        <th>Student Name</th>
        <th>Present</th>
              <th>Absent</th>
              
       </tr>
       <tr>
            <td>1</td>
            <td>janani haripriya</td>
            <td align="center">
                    <input type="radio" name="attendance_status" value="Present" />
                  </td>
                  <td align="center">
                    <input type="radio" name="attendance_status" checked value="Absent" />
                  </td>
            </tr>

            <tr>
            <td>2</td>
            <td>Hanushiya Mohanraj</td>
            <td align="center">
                    <input type="radio" name="attendance_status" value="Present" />
                  </td>
                  <td align="center">
                    <input type="radio" name="attendance_status" checked value="Absent" />
                  </td>
            </tr>
            <tr>
            <td>3</td>
            <td>Rosha haripriya</td>
            <td align="center">
                    <input type="radio" name="attendance_status" value="Present" />
                  </td>
                  <td align="center">
                    <input type="radio" name="attendance_status" checked value="Absent" />
                  </td>
            </tr>
      </thead>
      <tbody>

      </tbody>
     </table>
    </div>
   </div>
  

      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Add</button>
      
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      
    </div>
    
 </div>
 
        


         <!--end  model codee -->
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
        <table class="table table-striped table-bordered" id="attendance_table">
          <thead>
            <tr>
              <th>Student Name</th>
              <th>Roll Number</th>
              <th>Session</th>
              <th>Attendance Status</th>
              <th>Attendance Date</th>
            </tr>
            <tr>
            <td>puja</td>
            <td>2017/ict/bit/13</td>
            <td>Graphic Design</td>
            <td><button type="button" class="btn btn-success btn-sm">Present</button></td>
            <td>2019.05.12</td>
            </tr>
            <tr>
            <td>puja</td>
            <td>2017/ict/bit/13</td>
            <td>Graphic Design</td>
            <td><button type="button" class="btn btn-danger btn-sm">Absent</button></td>
            <td>2019.05.12</td>
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