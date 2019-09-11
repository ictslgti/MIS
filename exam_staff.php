		
<!--Block#1 start dont change the order-->
<?php 
$title="Add Course details | SLGTI";    
include_once ("config.php");
include_once ("head.php");
include_once ("menu.php");
?>
<!-- end dont change the order-->


<!-- Block#2 start your code -->

<!-- Heading  -->
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

    
    </div>

   <div class="row">
    <div class="col">
    <hr color ="black" style="height:1px;">
    </div>
    </div> 

<!-- Heading end -->

<!-- Dropdown start -->

    <div class="row">
    <div class="col-3 text-center">
    <label class="input-group-text" for="inputGroupSelect036">Select Semister</label>
            <select class="custom-select" id="inputGroupSelect01">
                <option selected>Choose Semister </option>
                <option value="1">Semister 1</option>
                <option value="2">Semister 2</option>
            </select>
    </div>

    <div class="col-3 text-center">
    <label class="input-group-text" for="inputGroupSelect036">Choose Module</label>
            <select class="custom-select" id="inputGroupSelect01">
                <option selected>Choose Module</option>
                <option value="1">M07</option>
                <option value="2">M01</option>
            </select>
    </div>


    <div class="col-1 text-center">
    <button type="button" class="btn btn-outline-success">submit</button>
    </div>
    </div>
<br>
<br>

<!-- Dropdown End -->

<!-- Assessments start -->
  <div class="row"><!-- Table start -->
  <div class="col-3">
  <h3 class="display-6 text-center">Assessments</h3>
  <hr color ="black" style="height:1px;">
  <div class="col">
  
  </div>
  <table class="table">
    <tr>
      <td scope="col-8">Assessment</td>
      <td scope="col-4"><i class="fas fa-eye"></i>
    <button type="button" class="btn btn-secondary">VIEW</button></td>
        
    </tr>
    <tr>
      <td scope="col-8">Assessment 2</td>
    </tr>
    <tr>
      <td scope="col-8">Assessment 3</td>  
    </tr>

    <tr>
      <td scope="col-8">Assessment 4</td>  
    </tr> 
    <tr>
      <td scope="col-8">Assessment 4</td>  
    </tr>
</table>
  <hr color ="black" style="height:1px;">
</div>

<!-- Assessments End -->

<!-- Table start -->
<div class="col-9">
<table class="table">
  <thead class="thead-dark">
    <tr>

    <th scope="col">Students_id</th>
      <th scope="col">Assessment</th>
      <th scope="col">Assessment-Date</th>
      <th scope="col">Assessment-Marks</th>
      <th scope="col">Assessment-Marks</th>
      

      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    
  </tbody>
</table>
</div>

<!-- Table End -->

  </div><!-- Table row end -->


<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("footer.php"); ?>  
<!--  end dont change the order-->
    
    
  