		
<!--Block#1 start dont change the order-->
<?php 
$title="Add Course details | SLGTI";    
include_once ("config.php");
include_once ("head.php");
include_once ("menu.php");
?>
<!-- end dont change the order-->


<!-- Block#2 start your code -->

<div class="row">
    <div class="col">
    <hr>
    </div>
    </div>

  <div class="row">
    <div class="col text-center">
    <h1>Students Assessments Results</h1>
    </div>
    </div>

    <div class="row ">
    <div class="col text-center">
    <h3 class="display-6">Department of Information & Communication Technology</h3>
    </div>
    </div>


    <div class="row">
    <div class="col">
    <hr>
    </div>
    </div>
<br>

    <div class="row ">
    <div class="col-4"></div>
    <div class="col-4"></div>
    <div class="col-sm-3 " > 
<form class="form-inline md-form form-sm mt-4">
  <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="text" placeholder="Search-Module_Id" aria-label="Search"id="search"> 
  <i class="fas fa-search ml-3" aria-hidden="true"></i>
</form>
</div>
    
    </div>

   <div class="row">
    <div class="col">
    <hr color ="black" style="height:1px;">
    </div>
    </div> 


    <div class="row">
    <div class="col-3 text-center">
    <label class="input-group-text" for="inputGroupSelect036">Select Semister</label>
            <select class="custom-select" id="inputGroupSelect01">
                <option selected>Choose Semister </option>
                <option value="1">Semister 1</option>
                <option value="2">Semister 2</option>
            </select>
    </div>

    <div class="col-5 text-center">
    <label class="input-group-text" for="inputGroupSelect036">Choose Module</label>
            <select class="custom-select" id="inputGroupSelect01">
                <option selected>Choose Module</option>
                <option value="1">M07</option>
                <option value="2">M01</option>
            </select>
    </div>

    <div class="col-3 text-center">
    <label class="input-group-text" for="inputGroupSelect036">Assessment Type</label>
            <select class="custom-select" id="inputGroupSelect01">
                <option selected>Choose..</option>
                <option value="1">Written</option>
                <option value="2">Practical</option>
            </select>
    </div>

    <div class="col-1 text-center">
    <button type="button" class="btn btn-outline-success">submit</button>
    </div>
    </div>
<br>
<br>

  <div class="row">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Assessment-Id</th>
      <th scope="col">Assessment-Date</th>
      <th scope="col">Assessment-Marks</th>
      <th scope="col">Percentage</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
  </div>

<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("footer.php"); ?>  
<!--  end dont change the order-->
    
    
  