
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
<table class="table table-striped table-bordered" id="student_table"> <thead>
<tr>
<th>Student Name</th>
<th>Roll Number</th>
<th>Module</th>
<th>Module head</th>
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
</td>
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
</html>
<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("Footer.php"); ?>  
<!--  end dont change the order-->