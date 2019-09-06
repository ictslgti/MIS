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
      <div class="col form-group  container p-3 mb-2 bg-light text-dark border border-primary rounded" >
    <h1 class="p-5 mb-5 bg-primary display-4 text-white rounded text-center  "><i class="fas fa-file-alt"></i>   Student Off-Peak Request</h1>
    <hr class="my-1">
   
  <div class="form-row container">
  
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
    <div class="col-2" >
    <br>
    
    <button type="button" class="btn btn-primary">Request to approval</button>
    
    
    <br> <br> <br>
    </div>
    <div class="col-1" style="width:65px;" >
    <br>
    <button type="button" class="btn btn-info">Clear</button>
    </div>
    <div class="col-1" >
    <br>
    <button type="button" class="btn btn-secondary">Cancel</button>
    </div>
    

  </div>
  </div>
</form>

    

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
