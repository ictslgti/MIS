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


<form id="student_request_form" name="student_request_form" class=" form-horizontal" action="" method="POST">
            <input type="hidden" name="step" value="1">
			<fieldset>            
    
                <div class="row">
                    <div class="form-group col-md-12">
                        <p class="note" style="font-size: 16px; font-weight: 700; border-bottom: 2px solid #aaa;">Personal Information</p>
                    </div>                    
                    <div class="form-group col-md-2">
                        <label class="control-label col-xs-12" for="pippin_student_salutation">Title <span class="req">*</span></label>
                        <div class="col-xs-12">
                            <select name="pippin_student_salutation" id="pippin_student_salutation" class="form-control" >
                                <option value="">Select</option>
                                                                                <option value="4"  >Mr</option>
                                                                                <option value="5"  >Mrs</option>
                                                                                <option value="6"  >Miss</option>
                                                                                <option value="7"  >Ms</option>
                                                                                <option value="8"  >Master</option>
                                                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-5">
                        <label class="control-label col-xs-12" for="pippin_student_forename">Forename(s) <span class="req">*</span></label>
                        <div class="col-xs-12">
                            <input name="pippin_student_forename" id="pippin_student_forename" class="form-control required" type="text" value="" />
                        </div>
                    </div>
                    <div class="form-group col-md-5">
                            <label class="control-label col-xs-12" for="pippin_student_surname">Surname <span class="req">*</span></label>
                        <div class="col-xs-12">
                            <input name="pippin_student_surname" id="pippin_student_surname" class="form-control required" type="text" value="" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                            <label class="control-label col-xs-12" for="pippin_student_name_on_certificate">How it should appear on the Certificate <span class="req">*</span></label>
                        <div class="col-xs-12">
                            <input name="pippin_student_name_on_certificate" id="pippin_student_name_on_certificate" class="form-control required" type="text" value="" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <label class="control-label col-xs-12" for="pippin_user_address">Home Address <span class="req">*</span></label>
                        <div class="col-xs-12">
                            <textarea rows="4" cols="4" name="pippin_student_address" id="pippin_student_address" class="form-control address-group"></textarea>
                        </div>
                    </div>
                    <!-- <div class="form-group col-xs-4">
                        <label class="control-label col-xs-12" for="pippin_student_email">Email Address <span class="req">*</span></label>
                        <div class="col-xs-12">
                        <input name="pippin_student_email" id="pippin_student_email" class="form-control required" value="" type="email"/>
                        </div>
                    </div>  -->                   
                    <div class="form-group col-xs-4">
                        <label class="control-label col-xs-12" for="pippin_student_telephone">Telephone</label>
                        <div class="col-xs-12">
                            <input name="pippin_student_telephone" id="pippin_student_telephone" class="form-control" value="" type="text" />
                        </div>
                    </div>                  
                    <div class="form-group col-xs-4">
                        <label class="control-label col-xs-12" for="pippin_student_mobile">Mobile <span class="req">*</span></label>
                        <div class="col-xs-12">
                            <input name="pippin_student_mobile" id="pippin_student_mobile" class="form-control" type="text"  value="" />
                        </div>
                    </div>
                    
                </div> 



<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php include_once("FOOTER.PHP"); ?>