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
<h1> Student_Profile </h1>
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
 
 <div class="table-row">
    <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
            </tr>
        </tbody>
    </table>
</div>


<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php 
include_once("FOOTER.PHP"); 
?>