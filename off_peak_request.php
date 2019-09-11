<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->


<br><br>
    <form>
      <div class=" form-group  container p-3 mb-2 bg-light text-dark border border-primary rounded" >
    <h4 class="h3 p-5 mb-5 bg-primary text-white rounded text-center  "><i class="fas fa-file-alt"></i>   Student Off-Peak Request</h4>
    <hr class="my-1">
   
  
  <div class="form-row">
    <div class="col-4" >
    <br>
     
      <label for="text" class="font-weight-bolder" >Name of applicant :</label><br>
      <input type="text" class="form-control" placeholder="" disabled>
     
    </div>
    
    <div class="col-4" >
    <br>
    
    <label for="text" class="font-weight-bolder" >Registration No :</label><br>
    <input type="text" class="form-control" placeholder="" disabled>
    </div>
    
    <div class="col-4" >
    <br>
    
    <label for="text" class="font-weight-bolder"  >Department :</label><br>
    <input type="text" class="form-control" placeholder="" disabled>
    </div>
    </div>
    <div class="form-row">
    <div class="col-4" >
    <br>
   <label for="text" class="font-weight-bolder"  >Contact No :</label><br>
    <input type="text" class="form-control" placeholder="">
    </div>
    

    <div class="col-4" >
    <br>
   <label for="date" class="font-weight-bolder"  >Date :</label><br>
    <input type="date" class="form-control" placeholder="">
    </div>
    <div class="col-4" >
    <br>
   <label for="date" class="font-weight-bolder"  >Time :</label><br>
    <input type="time" class="form-control" placeholder="">
    </div>
   
    <div class="col-12" >
    <br>
    <label for="exampleFormControlTextarea1" class="font-weight-bolder" >Reason for exit :</label><br>
    <textarea class="form-control form-control-lg " id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>


    <div class="row">
    <div class="col-7">
    <br>
    
    <button type="button" class="btn btn-primary "><i class="fas fa-paper-plane"></i> Request to approval</button>
    </div>
    
   
    
    <div class="col-3">
    <br>
    <button type="button" class="btn btn-info ">Clear</button>
    </div>
    <div class="col-2">
    <br>
    <button type="button" class="btn btn-secondary ">Cancel</button>
    </div>
    
    </div>
 
  </div>
</form>

    

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
