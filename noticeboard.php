<!--  bLOCK#1 start don't change the order-->
<?php 
$title =" Department Deatils| SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!-- end don't change the order-->



<!-- bLOCK#2 start your code here & u can change -->
<table class="table table-bordered">
<div class="row">
<nav class="nav">
  <a class="nav-link active" href="notice_home.php">Home</a>
  <a class="nav-link" href="#">Exam</a>
  <a class="nav-link" href="#">Event</a>
  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Others</a>
  <a class="nav-link" href="noticeboard.php">Notice & Updates</a>
</nav>
    <div class="col-8"> <h3>Notice & Updates</h3> </div>
    <div class="col-4"><button type="button" class="btn btn-info"> ADD </button></div>
    </div>

  <thead>
  <tr>
    <th>User Name</th>
    <td><input type="text" class="form-control" placeholder="User Name..."></td>
    </tr>


    <tr>
      <th scope="col">Department Name:</th>
      <th>

    <select class="form-control" id="department">
      <option selected>Choose Your Department...</option>
      <option>Electrical & Electronic Technology Department Department</option>
      <option>Construction Technology Department</option>
      <option>Information & Communications Technology Department</option>
      <option>Mechanical Technology Department</option>
      <option>Food Technology Department</option>
      <option>Automotive & Agricultural Technology Department</option>
    </select>
  </th>
      
    </tr>
  </thead>

  <tbody>
    <tr>
      <th scope="row">Course No:</th>
  
      <td>
    <select class="form-control" id="academiyear">
      <option selected>Select Your Course No...</option>
      <option>Batch 01</option>
      <option>Batch 02</option>
      <option>Batch 03</option>
      <option>Batch 04</option>
    </select>
    </td>
    </tr>

  

    <tr>
    <th>Academic Year:</th>
    <td>
    <select class="form-control" id="academiyear">
      <option selected>Select Your Academic Year...</option>
      <option>Others</option>
      <option>2016/2017</option>
      <option>2017/2018</option>
      <option>2018/2019</option>
    </select></td>
    </tr>

    <tr>
    <th>Type of Notice</th>
    <td><select class="form-control" id="typeofnotice">
      <option selected>Choose Your Notice Type...</option>
      <option>Exam</option>
      <option>Result</option>
      <option>Event</option>
      <option>Others</option>
    </select></td>
    </tr>

    <tr>
    <th>Posting Date:</th>
    <td><input type="text" class="form-control" placeholder="Posting Date"></td>
    </tr>

    <tr>
    <th>Editing Date:</th>
    <td><input type="text" class="form-control" placeholder="Editing Date"></td>
    </tr>
    
  </tbody>
</table>
<div>
  <button type="button" class="btn btn-primary btn-lg btn-block">Submit</button>
    </div>
    <br>
    <div>
    <button type="button" class="btn btn-secondary btn-lg btn-block">Edit</button>
    </div>
    
 <!-- end your code here-->




<!--bLOCK#3  start don't change the order-->
    <?php include_once("footer.php");?>
<!-- end don't change the order-->
   