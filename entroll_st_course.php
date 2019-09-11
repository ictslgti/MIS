<!------START DON'T CHANGE ORDER HEAD,MANU,FOOTER----->
<!---BLOCK 01--->
<?php 
   
include_once("config.php");

$title ="STUDENT PROFILE | SLGTI"; //YOUR HEAD TITLE CREATE VARIABLE BEFORE FILE NAME
include_once("head.php");
include_once("menu.php");

?>
<!----END DON'T CHANGE THE ORDER---->


<!---BLOCK 02--->
<!---START YOUR CODER HERE----->


<!-----END YOUR CODE----->
<!-- form start---->

    <div class="ROW">
        <div class="col text-center">
            <h2>STUDENT AND COURSE DETAILS</h2>   
        </div>
    </div>

    <form class="needs-validation" novalidate action="">
    <div class="form-row">
          <div class class="col-md-1">
          </div>
          <div class="col">
          <p style="font-size: 20px; font-weight: 700; border-bottom: 2px solid #aaa;">ENTROLLMENT</p>
          </div>  
    </div> 
                      
    <div class="form-row">
        <div class="col-md-12 mb-3">

          <div class="form-row">
          <label for="stid"> Student_Id : </label>
          <input type="text" class="form-control" id="stid" placeholder="" aria-describedby="stidPrepend" required>
          </div>
    

          <div class="form-row">
          <label for="coid"> Course_Id : </label>
          <input type="text"  class="form-control" id="coid" placeholder="" aria-describedby="coidPrepend" required>
          </div>

          <div class="form-row">
          <label for="eryear"> Entroll Year : </label>
          <input type="text" class="form-control" id="eryear" placeholder="" aria-describedby="eryearPrepend" required>
          </div>
        </div>

        <div class="col-md-03 mb-3">
        <div class="col-md-03 mb-3">
          <div class="form-row">
          <button type="button" class="btn btn-primary">ADD</button>
          </div>
          <div class="form-row">
          <button type="button" class="btn btn-success">UPDATE</button>
          </div>
          <div class="form-row">
          <button type="button" class="btn btn-danger">DELETE</button>
          </div>
        </div>
    </div>
    <div>
</form><br><br><br><br><br>

 <div class="table-row">
    <div class="col-md-09 mb-3">
    <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">student Id</th>
            <th scope="col">Course Id</th>
            <th scope="col">Accademic Year</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td colspan="2"></td>
            <td></td>
            </tr>
        </tbody>
    </table>
</div>
</div>



<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php 
include_once("FOOTER.PHP"); 
?>