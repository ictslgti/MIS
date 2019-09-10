	
<!--Block#1 start dont change the order-->
<?php 
$title="Add Course details | SLGTI";    
include_once ("config.php");
include_once ("head.php");
include_once ("menu.php");
?>
<!-- end dont change the order-->


<!-- Block#2 start your code -->
<div class="ROW">
        <div class="col text-center">
            <h2>STUDENT AND COURSE DETAILS</h2>   
        </div>
    </div>

    <form class="needs-validation">
    <div class="form-row">
          <div class class="col-md-1">
          </div>
          <div class="col">
          <p style="font-size: 20px; font-weight: 700; border-bottom: 2px solid #aaa;">ENTROLLMENT</p>
          </div>  
    </div> 
                      
    <div class="form-row">
          <div class="col-md-12 mb-3">
          Student_Id :
          <input type="text"  id="id" placeholder="" aria-describedby="idPrepend" required>
         </div>
    </div>

    <div class="form-row">
          <div class="col-md-12 mb-3">
          Course_Id :
          <input type="text"  id="no" placeholder="" aria-describedby="noPrepend" required>
         </div>
    </div>

    <div class="form-row">
          <div class="col-md-12 mb-3">
          Entroll Year :
          <input type="text"  id="year" placeholder="" aria-describedby="fullnamePrepend" required>
         </div>
    </div>

    
    <div class="form-row">
        <button type="button" class="btn btn-primary">ADD</button><br>
        <button type="button" class="btn btn-success">UPDATE</button><br>
        <button type="button" class="btn btn-danger">DELETE</button><br>
    </div>
</form>
</div>


<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("footer.php"); ?>  
<!--  end dont change the order-->
    
    
  