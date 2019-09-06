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

<div style="height:180mm;width:275mm; background-color: rgba(255,0,0,0.1);" class="border border-dark">
  <div>
      <div>
        <div>
        <img src="img/ministry.png" class="rounded float-left;" width="100" height="100" alt="">
        <img src="img/SLGTI.png" class="rounded float-right" width="250" height="85" alt="">

        </div>
        <hr class="my-1">
        <div>
           <h1 class="text-center">Sri Lanka German Training</h1>
           <h1 class="text-center">Institute</h1>
        </div>
        <div class="text-center">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>

    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>

    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>

    </tr>
  </tbody>
</table>

        </div>
    </div>

</div>
  
</div>

</form>


<?php include_once("footer.php"); ?>