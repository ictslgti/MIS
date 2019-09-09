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
    <div class="col-8"> <h3>Notice & Updates</h3> </div>
    <div class="col-4"><button type="button" class="btn btn-info"> ADD </button></div>
    </div>

  <thead>
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
      <th scope="row">Course ID:</th>
      <td><input type="text" class="form-control" placeholder="Course ID">
    </td>
    </tr>

    <tr>
    <th>Academic Year:</th>
    <td>
    <select class="form-control" id="academiyear">
      <option selected>Select Your Academic Year...</option>
      <option>Others</option>
      <option>2017/2018</option>
      <option>2018/2019</option>
      <option>2019/2020</option>
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
  

    <div class="row">
    <button type="button" class="btn btn-primary btn-lg btn-block">Submit</button>
    </div>
    
  </tbody>
</table>
 <!-- end your code here-->




<!--bLOCK#3  start don't change the order-->
    <?php include_once("footer.php");?>
<!-- end don't change the order-->
   