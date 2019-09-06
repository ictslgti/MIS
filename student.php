<!------START DON'T CHANGE ORDER HEAD,MANU,FOOTER----->
<!---BLOCK 01--->
<?php 
   
include_once("CONFIG.PHP");

$title ="STUDENTS REQUEST DETAILS | SLGTI"; //YOUR HEAD TITLE CREATE VARIABLE BEFORE FILE NAME
include_once("HEAD.PHP");
include_once("MENU.PHP");

?>
<!----END DON'T CHANGE THE ORDER---->


<!---BLOCK 02--->
<!---START YOUR CODER HERE----->


<!-----END YOUR CODE----->
<!-- form start---->

<div class="ROW">
     <div class="col text-center">
         <h2>STUDENT REQUEST FORM</h2>   
     </div>
</div>


<form class="needs-validation" novalidate action="">
     <div class="row">
          <div class class="col-md-1">
          </div>
          <div class="col">
          <p style="font-size: 20px; font-weight: 700; border-bottom: 2px solid #aaa;">Personal Information</p>
          </div>  
     </div> 
                      
     <div class="row">
          <div class="col-md-2 mb-3">
          <label for="title">Title</label>
          <select name="title" id="title" class="form-control" >
               <option value="">Select</option>
                    <option value="4"> Mr </option>
                    <option value="5"> Mrs </option>
                    <option value="6"> Miss </option>
         </select>
          </div>

          <div class="col-md-10 mb-3">
          <label for="ini_name">Name with Initials</label>
          <input type="text" class="form-control" id="ini_name" placeholder="" value="" required>
          </div>
   
     </div>

    <div class="col-md-4 mb-3">
      <label for="validationTooltipUsername">Username</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
        </div>
        <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required>
        <div class="invalid-tooltip">
          Please choose a unique and valid username.
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationTooltip03">City</label>
      <input type="text" class="form-control" id="validationTooltip03" placeholder="City" required>
      <div class="invalid-tooltip">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationTooltip04">State</label>
      <input type="text" class="form-control" id="validationTooltip04" placeholder="State" required>
      <div class="invalid-tooltip">
        Please provide a valid state.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationTooltip05">Zip</label>
      <input type="text" class="form-control" id="validationTooltip05" placeholder="Zip" required>
      <div class="invalid-tooltip">
        Please provide a valid zip.
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>



<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php include_once("FOOTER.PHP"); ?>