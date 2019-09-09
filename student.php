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
         <h2>STUDENT'S REGISTRATION REQUEST FORM</h2>   
     </div>
</div>


<form class="needs-validation" novalidate action="">
    <div class="form-row">
          <div class class="col-md-1">
          </div>
          <div class="col">
          <p style="font-size: 20px; font-weight: 700; border-bottom: 2px solid #aaa;">Personal Information</p>
          </div>  
    </div> 
                      
    <div class="form-row">
          <div class="col-md-1 mb-3">
          <label for="title">Title</label>
          <select name="title" id="title" class="form-control" >
               <option value="">Select</option>
                    <option value="mr"> Mr </option>
                    <option value="mrs"> Mrs </option>
                    <option value="miss"> Miss </option>
         </select>
         </div>

        <div class="col-md-11 mb-3">
          <label for="fullname">Full Name</label>
          <input type="text" class="form-control" id="fullname" placeholder="" aria-describedby="fullnamePrepend" required>
        </div>

    </div>

    <div class="form-row">
        <div class="col-md-7 mb-3">
          <label for="ini_name">Name with Initials</label>
          <input type="text" class="form-control" id="ini_name" placeholder="" value="" required>
        </div>

        <div class="col-md-2 mb-3">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" >
                <option value="">Select</option>
                <option value="male"> Male </option>
                <option value="female"> Female </option>
            </select>
        </div>

        <div class="col-md-2 mb-3">
            <label for="civilstatus">Civil Status</label>
            <select name="civilstatus" id="civilstatus" class="form-control" >
                <option value="">Select</option>
                <option value="male"> Single </option>
                <option value="female"> Maried </option>
            </select>
        </div>

        <div class="col-md-1 mb-3">
            <label for="bloodgroup">Blood Group</label>
            <select name="bloodgroup" id="bloodgroup" class="form-control" >
                <option value="">Select</option>
                <option value="male"> A+ </option>
                <option value="female"> A- </option>
                <option value="male"> B+ </option>
                <option value="female"> B- </option>
                <option value="male"> O+ </option>
                <option value="female"> O- </option>
                <option value="male"> AB+ </option>
                <option value="female"> AB- </option>
            </select>
        </div>
    </div>
  
    <div class="form-row">
          
          <div class="col-md-4 mb-3">
            <label for="email">Email</label>
            <div class="input-group-prepend">
            <div class="input-group-text">@</div>
            <input type="email" class="form-control" id="email" placeholder=""  required>
            </div>
            
          </div>

          <div class="col-md-3 mb-3">
            <label for="nic">NIC</label>
            <input type="text" class="form-control" id="nic" placeholder=""  required>
          </div>
          
          <div class="col-md-2 mb-3">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" placeholder=""  required>
          </div>

          <div class="col-md-3 mb-3">
            <label for="phone">Phone No</label>
            <input type="text" class="form-control" id="phone" placeholder=""  required>
          </div>
    </div>    

    <div class="form-row"> 

          
    </div>

    <div class="form-row">

          
          
          
    </div>


  
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>



<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php include_once("FOOTER.PHP"); ?>