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
    <div class="col form-group  container p-3 mb-2 " >
        <h1 class=" text-center  "><i class="fas fa-file-alt"></i>  STAFF MODULE</h1>
    </div>
</div>

<div class="row">
    <div class=" col-sm-8">
        <p style="font-size: 45px; font-weight: 700; ">Personal Information</p>
    </div>

    <div class="col-sm-3"> 
      <div class="form-group">
        <a href="ModuleEnrollment.php" class="btn btn-outline-primary" role="button" aria-pressed="true">ENROLL</a>
      </div>   
    </div>  
</div>

<div class="row">
  <div class="col-sm-12" >
    <hr color ="black" style="height:1px;">
  </div>
</div>


<form>
    <div class="form-row pb-4">
        <div class="col-3">
            <div class="form-row align-items-center">
            <select class="custom-select  mr-sm-2" id="inlineFormCustomSelect">
                <option selected>Staff_Name</option>
            </select>
            </div>
        </div>

        <div class="col-3" >
            <div class="form-row align-items-center">
            
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Module_Name</option>
            </select>
            </div>
        </div>

        <div class="col-3" >
            <div class="form-row align-items-center">
            
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Course_Name</option>
            </select>
            </div>
        </div>

        <div class="col-2" >
            <div class="form-row align-items-center"> 
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Academic_Year</option>
            </select>
            </div>
        </div>

        <div class="col-1" >
            <div class="form-row align-items-center">
            <button type="button" class="btn btn-outline-primary align= right">Search</button>
            </div>
        </div>
    </div>
</form>


<table class="table table-bordered">
        <thead >
            <tr>
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
        
          </tr>
        </tbody>
    </table>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->