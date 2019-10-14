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
      <div class="intro container p-5 mb-5 border border-dark rounded" >
      <div class="shadow p-3 mb-5 bg-white rounded"> 
    <h4 class="display-4 text-center "><i class="fas fa-file-alt"></i>   Student Off-Peak Request</h4>
    </div>
    <hr class="my-1">
   
  <form method="POST">
  <div class="form-row">
    <div class="col-md-4 col-sm-12" >
    <br>
     
      <label for="text" class="font-weight-bolder" >Name of applicant :</label><br>
      <input type="text" class="form-control" id="noa" placeholder="" disabled>
     
    </div>
    
    <div class="col-md-4 col-sm-12" >
    <br>
    
    <label for="text" class="font-weight-bolder" >Registration No :</label><br>
    <input type="text" class="form-control" id="rno" placeholder="" disabled>
    </div>
    
    <div class="col-md-4 col-sm-12" >
    <br>
    
    <label for="text" class="font-weight-bolder"  >Department :</label><br>
    <input type="text" class="form-control" id="dept" placeholder="" disabled>
    </div>
    </div>
    <div class="form-row">
    <div class="col-md-4 col-sm-12" >
    <br>
   <label for="text" class="font-weight-bolder"  >Contact No :</label><br>
    <input type="tel" id="tel"  pattern="[0-9]{10}" class="form-control" placeholder=""  required >
    </div>
    

    <div class="col-md-4 col-sm-12" >
    <br>
   <label for="date" class="font-weight-bolder"  >Date :</label><br>
    <input type="date" class="form-control" placeholder="" id="date" required>
    </div>
    <div class="col-md-4 col-sm-12" >
    <br>
   <label for="date" class="font-weight-bolder"  >Time :</label><br>
    <input type="time" class="form-control" placeholder="" id="time" required>
    </div>
   
    <div class="col-12" >
    <br>
    <label for="exampleFormControlTextarea1" class="font-weight-bolder" >Reason for exit :</label><br>
    <textarea class="form-control form-control-lg " id="rfe" rows="3"  required></textarea>
    </div>


    <div class="row">
    <div class="col-md-7 col-sm-12 ">
    <br> <br>
   
    <button type="submit" id="rta" class="btn btn-primary btn-md" <i class="fas fa-paper-plane"></i> Request to approval</button>
    </div>
    
   
    
    <div class="col-md-3 col-sm-12">
    <br><br>
    <button type="button" class="btn btn-secondary btn-md " onclick="document.getElementById('rfe').value = '';document.getElementById('tel').value = '';document.getElementById('date').value = '';document.getElementById('time').value = ''">Clear</button>

</div>
    <div class="col-md-1 col-sm-12">
    <br><br>
    <button type="button" class="btn btn-info btn-md " onclick="window.location.href='off-peak-archives.php'">Archives</button>
    </div>

   

   


   
    </div>
    </div>
    <br>
    <a href="index.php"><<< Back to home </a>
    </div>
    
   </form>
</form>








<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->