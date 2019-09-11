<!------START DON'T CHANGE ORDER HEAD,MANU,FOOTER----->
<!---BLOCK 01--->
<?php 
   
include_once("config.php");

$title ="STUDENTS REQUEST DETAILS | SLGTI"; //YOUR HEAD TITLE CREATE VARIABLE BEFORE FILE NAME
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
                <option value="a+"> A+ </option>
                <option value="a-"> A- </option>
                <option value="b+"> B+ </option>
                <option value="b-"> B- </option>
                <option value="o+"> O+ </option>
                <option value="o-"> O- </option>
                <option value="ab+"> AB+ </option>
                <option value="ab-"> AB- </option>
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
          <div class="col-md-12 mb-3">
            <label for="address"> Address (Permanent) </label>
            <input type="text" class="form-control" id="address" placeholder="House-No, Street, Hometown."  required>
          </div>
    </div>
 
    <div class="form-row">
          <div class="col-md-1 mb-3">
            <label for="zip">ZIP-Code</label>
            <input type="text" class="form-control" id="zip" placeholder=""  required>
          </div>
          
          <div class="col-md-2 mb-3">
            <label for="district">District</label>
            <input type="text" class="form-control" id="district" placeholder=""  required>
          </div>

          <div class="col-md-2 mb-3">
            <label for="ds">Divisional Secretariat</label>
            <input type="text" class="form-control" id="ds" placeholder=""  required>
          </div>
          
          <div class="col-md-2 mb-3">
            <label for="province">Province</label>
            <input type="text" class="form-control" id="provice" placeholder=""  required>
          </div>
    </div>

    <div class="form-row"> 
          <div class="col-md-12 mb-3">
            <label for="address"> Address (Temporary) </label>
            <input type="address" class="form-control" id="address" placeholder="House-No, Street, Hometown,District."  required>
          </div>
    </div>



    <div class="row">
          <div class ="col-md-0"></div>
          <div class="col">
          <p style="font-size: 20px; font-weight: 700; border-bottom: 2px solid #aaa;"> Educational Qalification </p>
          </div>     
    </div> 

    
    <div class="row">
          <div class="col-md-12">
          <p><h4>G.C.E. Ordinary Level</h4>
          </p>
          </div>
    </div>
    <div class="row">
          <div class="col-md-1">No</div>
          <div class="col-md-3">Subject Passed</div>
          <div class="col-md-2">Grade</div>
          <div class="col-md-1">No</div>
          <div class="col-md-3">Subject Passed</div>
          <div class="col-md-2">Grade</div>
    </div>

    <div class="row">
<div class="col-md-6">
<div class="col-md-8"><span class="wpcf7-form-control-wrap olsub1"><input type="text" name="olsub1" value="Mathematics" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div>
<div class="col-md-4"><span class="wpcf7-form-control-wrap olgrd1"><input type="text" name="olgrd1" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div></div>
<div class="col-md-6">
<div class="col-md-8"><span class="wpcf7-form-control-wrap olsub2"><input type="text" name="olsub2" value="Language and Literature" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div>
<div class="col-md-4"><span class="wpcf7-form-control-wrap olgrd2"><input type="text" name="olgrd2" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div></div>
<div class="col-md-6">
<div class="col-md-8"><span class="wpcf7-form-control-wrap olsub3"><input type="text" name="olsub3" value="English" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div>
<div class="col-md-4"><span class="wpcf7-form-control-wrap olgrd3"><input type="text" name="olgrd3" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div></div>
<div class="col-md-6">
<div class="col-md-8"><span class="wpcf7-form-control-wrap olsub4"><input type="text" name="olsub4" value="Religion" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div>
<div class="col-md-4"><span class="wpcf7-form-control-wrap olgrd4"><input type="text" name="olgrd4" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div></div>
<div class="col-md-6">
<div class="col-md-8"><span class="wpcf7-form-control-wrap olsub5"><input type="text" name="olsub5" value="History" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div>
<div class="col-md-4"><span class="wpcf7-form-control-wrap olgrd5"><input type="text" name="olgrd5" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div></div>
<div class="col-md-6">
<div class="col-md-8"><span class="wpcf7-form-control-wrap olsub6"><input type="text" name="olsub6" value="Science" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div>
<div class="col-md-4"><span class="wpcf7-form-control-wrap olgrd6"><input type="text" name="olgrd6" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div></div>
<div class="col-md-6">
<div class="col-md-8"><span class="wpcf7-form-control-wrap olsub7"><input type="text" name="olsub7" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="7" /></span></div>
<div class="col-md-4"><span class="wpcf7-form-control-wrap olgrd7"><input type="text" name="olgrd7" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div></div>
<div class="col-md-6">
<div class="col-md-8"><span class="wpcf7-form-control-wrap olsub8"><input type="text" name="olsub8" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="8" /></span></div>
<div class="col-md-4"><span class="wpcf7-form-control-wrap olgrd8"><input type="text" name="olgrd8" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div></div>
<div class="col-md-6">
<div class="col-md-8"><span class="wpcf7-form-control-wrap olsub9"><input type="text" name="olsub9" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="9" /></span></div>
<div class="col-md-4"><span class="wpcf7-form-control-wrap olgrd9"><input type="text" name="olgrd9" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div></div>
<div class="col-md-6">
<div class="col-md-8"><span class="wpcf7-form-control-wrap olsub10"><input type="text" name="olsub10" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="10" /></span></div>
<div class="col-md-4"><span class="wpcf7-form-control-wrap olgrd10"><input type="text" name="olgrd10" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div></div></div>
<div class="row">
<div class="col-md-12">
<h4>G.C.E. Advanced Level</h4>
</p></div></div>
<div class="row">
<div class="col-md-12">
<div class="col-md-4"><span class="wpcf7-form-control-wrap alyear"><input type="text" name="alyear" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Year" /></span></div>
<div class="col-md-8"><span class="wpcf7-form-control-wrap alstream"><select name="alstream" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false"><option value="Stream of Study">Stream of Study</option><option value="Combined Maths">Combined Maths</option><option value="Bio Science">Bio Science</option><option value="Technology">Technology</option><option value="Art">Art</option><option value="Commerce">Commerce</option></select></span></div></div></div>
<div class="row">
<div class="col-md-6">
<div class="col-md-8">Subject Passed</div>
<div class="col-md-4">Grade</div></div>
<div class="col-md-6">
<div class="col-md-8">Subject Passed</div>
<div class="col-md-4">Grade</div></div></div>
<div class="row">
<div class="col-md-6">
<div class="col-md-8"><span class="wpcf7-form-control-wrap alsub1"><input type="text" name="alsub1" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="1" /></span></div>
<div class="col-md-4"><span class="wpcf7-form-control-wrap algrd1"><input type="text" name="algrd1" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div></div>
<div class="col-md-6">
<div class="col-md-8"><span class="wpcf7-form-control-wrap alsub2"><input type="text" name="alsub2" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="2" /></span></div>
<div class="col-md-4"><span class="wpcf7-form-control-wrap algrd2"><input type="text" name="algrd2" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div></div>
<div class="col-md-6">
<div class="col-md-8"><span class="wpcf7-form-control-wrap alsub3"><input type="text" name="alsub3" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="3" /></span></div>
<div class="col-md-4"><span class="wpcf7-form-control-wrap algrd3"><input type="text" name="algrd3" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div></div>
<div class="col-md-6">
<div class="col-md-8"><span class="wpcf7-form-control-wrap alsub4"><input type="text" name="alsub4" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="4" /></span></div>
<div class="col-md-4"><span class="wpcf7-form-control-wrap algrd4"><input type="text" name="algrd4" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div></div>
<div class="col-md-6">
<div class="col-md-8"><span class="wpcf7-form-control-wrap alsub5"><input type="text" name="alsub5" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="General Knowledge" /></span></div>
<div class="col-md-4"><span class="wpcf7-form-control-wrap algrd5"><input type="text" name="algrd5" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div></div>
<div class="col-md-6">
<div class="col-md-8"><span class="wpcf7-form-control-wrap alsub6"><input type="text" name="alsub6" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="English" /></span></div>
<div class="col-md-4"><span class="wpcf7-form-control-wrap algrd6"><input type="text" name="algrd6" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span></div></div></div>

    
          
          
  
    <div class="form-row">
    <button class="btn btn-primary" type="submit">Submit form</button>
    </div>       

  
  
</form>



<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php 
include_once("FOOTER.PHP"); 
?>