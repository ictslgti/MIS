<?php
$title = "Department Details | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<form class="form-inline">
  <div class="form-group mb-2">
    <label for="staticEmail2" class="sr-only">Student ID</label>
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Student ID">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Password</label>
    <input type="password" class="form-control" id="inputPassword2" placeholder="Student ID">
  </div>
  <button type="submit" class="btn btn-primary mb-2">View</button>
</form>
<form>

<div style="height:297mm;width:210mm; background-color: rgba(255,0,0,0.1);" class="border border-dark">
  <div>
      <div>
        <div>
        <img src="img/ministry.png" class="rounded float-left;" width="100" height="100" alt="">
        <img src="img/SLGTI.png" class="rounded float-right" width="250" height="85" alt="">

        </div>
        <hr class="my-1">
        <div>
           <h1 class="align-center">Sri Lanka German Training Institute</h1>
        </div>
    </div>

</div>
  
</div>

</form>


<?php include_once("footer.php"); ?>