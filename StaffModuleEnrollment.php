<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

      <div class="row">
      <div class="col form-group  container p-3 mb-2 col-4 " >
    <h1 ><i class="fas fa-file-alt"></i>STAFF MODULE ENROLLMENT</h1></div>
    <div class="col form-group  container p-3 mb-2 col-4 " ></div>
    <div class="col form-group  container p-3 mb-2 col-4 " >
  
    
    <div class="col-md-12 col-sm-12 pl-3 pr-3 pt-2">
            <div class="form-group">
            <a href="ModuleEnrollment.php" class="btn btn-outline-primary" role="button" aria-pressed="true">ENROLL</a>
            
            </div>                              
        </div>
        
    </div>
    
    </div>
   </div>
   <br><br>
   <div class="row">
   <div class="col-sm-12" >
   <hr color ="black" style="height:1px;">
   </div>
  </div>
  <form>
<div class="form-row pl-3">
    <div class="col-3" >
    <div class="form-row align-items-center">
      
       <select class="custom-select  mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Staff_Name</option>
      </select>
    </div><br></div>

    <div class="col-3" >
    <div class="form-row align-items-center">
      
       <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Module_Name</option>
      </select>
    </div><br></div>

    <div class="col-3" >
    <div class="form-row align-items-center">
      
       <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Course_Name</option>
      </select>
    </div><br></div>

    <div class="col-2" >
    <div class="form-row align-items-center">
       
       <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Academic_Year</option>
      </select>
    </div></div><br><br><br>

    <div class="col-1" >
    <div class="form-row align-items-center">
    <button type="button" class="btn btn-outline-primary align= right">Search</button>
    </div><br></div></div>
    <table class="table table-bordered">
  <thead >
    <tr>
      <th scope="col">NO.</th>
      <th scope="col">ID</th>
      <th scope="col">Staff_Name</th>
      <th scope="col">Module_Name</th>
      <th scope="col">Course_Name</th>
      <th scope="col">Academic_Year</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <th scope="row">3</th>
      <td >Larry the Bird</td>
      <td>@twitter</td>
      <td>@twitter</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
    <button type="button" class="btn btn-outline-primary">DELETE STAFF</button>
    <button type="button" class="btn btn-outline-primary">EDIT STAFF</button>
    <button type="button" class="btn btn-outline-primary">REFRESH STAFF</button>
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->