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



    <div class="form-row">
          <div class ="col-md-0"></div>
          <div class="col">
          <p style="font-size: 20px; font-weight: 700; border-bottom: 2px solid #aaa;"> Educational Qalification </p>
          </div>     
    </div> 

    
    <div class="form-row">
          <div class="col-md-12">
          <p><h4>G.C.E. Ordinary Level</h4>
          </p>
          </div>
    </div>

    <div class="form-row">
          <div class="col-md-1 mb-3">
            <label for="year">year</label>
            <input type="text" class="form-control" id="year" placeholder=""  required>
          </div>
          
          <div class="col-md-2 mb-3">
            <label for="ino">Index No</label>
            <input type="text" class="form-control" id="ino" placeholder=""  required>
          </div>
    </div>

    <div class="form-row">

    </div>

    <div class="form-row">
      <div class="col">
           <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                </tr>
              </tbody>
           </table>
      </div>

      <div class="col">
           <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                </tr>
              </tbody>
           </table>
      </div>
</div>

<div class="form-row">
          <div class="col-md-12">
          <p><h4>G.C.E. Advanced Level</h4>
          </p>
          </div>
    </div>
<div class="form-row">
          <div class="col-md-1 mb-3">
            year
          <input type="text" class="form-control" id="year1" placeholder=""  required>
          </div>
          
          <div class="col-md-2 mb-3">
            Index No
            <input type="text" class="form-control" id="inno" placeholder=""  required>
          </div>

          <div class="col-md-2 mb-3">
            Stream
            <input type="text" class="form-control" id="stm" placeholder=""  required>
          </div>
</div>

    <div class="form-row">
      <div class="col">
           <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                </tr>
              </tbody>
           </table>
      </div>

      <div class="col">
           <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                </tr>
              </tbody>
           </table>
      </div>
</div>

<div class="form-row">
          <div class class="col-md-1">
          </div>
          <div class="col">
          <p style="font-size: 20px; font-weight: 700; border-bottom: 2px solid #aaa;">National Vocational Qualification (NVQ)</p>
          </div>  
</div> 

                <div class="row pippin_form">
                    <div class="form-group">
                        <p class="note" style="font-size: 16px; font-weight: 700; border-bottom: 2px solid #aaa;">ICT Education  -  Diplomas/Degrees or Equivalents/Training obtained including the current programme.</p>
                    </div>
                    <div id="results-student_education" class="form-group table-responsive">               
                        <table class="table table-striped table-condensed" width="100%">
                            <thead>
                                <tr>
                                <th width="25%">School/University/Institution</th>
                                <th width="25%">Name of the Course/Programme</th>
                                <th width="10%">From</th>
                                <th width="10%">To</th>
                                <th width="20%">Results/Dates of qualification/Status</th>
                                <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>  
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-6 padding-both-zero">
                            <label class="control-label col-xs-12" for="pippin_student_education_institute">School/University/Institution <span class="req">*</span></label>
                            <div class="col-xs-12">
                                <input name="pippin_student_education_institute" id="pippin_student_education_institute" class="form-control" type="text" value="" />
                                <label id="pippin_student_education_institute-error" class="error hide" for="pippin_student_education_institute">School/University/Institution is required.</label>
                            </div>
                        </div>
                        <div class="col-xs-6 padding-both-zero">
                            <label class="control-label col-xs-12" for="pippin_student_education_programme">Name of the Course/Programme <span class="req">*</span></label>
                            <div class="col-xs-12">
                                <input name="pippin_student_education_programme" id="pippin_student_education_programme" class="form-control" type="text" value="" />
                                <label id="pippin_student_education_programme-error" class="error hide" for="pippin_student_education_programme">Name of the Course/Programme is required.</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6 padding-both-zero">
                            <label class="control-label col-xs-12" for="pippin_student_education_from_date_month">From <span class="req">*</span></label>
                            <div class="col-xs-6">
                                <select name="pippin_student_education_from_date_month" id="pippin_student_education_from_date_month" class="form-control" >
                                    <option value="">Month</option>
                                     <option value="1" >January</option>     <option value="2" >February</option>     <option value="3" >March</option>     <option value="4" >April</option>     <option value="5" >May</option>     <option value="6" >June</option>     <option value="7" >July</option>     <option value="8" >August</option>     <option value="9" >September</option>     <option value="10" >October</option>     <option value="11" >November</option>     <option value="12" >December</option>                                    </select> 
                                <label id="pippin_student_education_from_date_month-error" class="error hide" for="pippin_student_education_from_date_month">Month is required.</label>
                            </div>
                            <div class="col-xs-6">
                                <select name="pippin_student_education_from_date_year" id="pippin_student_education_from_date_year" class="form-control" >
                                    <option value="">Year</option>
                                     <option value="2019" >2019</option>     <option value="2018" >2018</option>     <option value="2017" >2017</option>     <option value="2016" >2016</option>     <option value="2015" >2015</option>     <option value="2014" >2014</option>     <option value="2013" >2013</option>     <option value="2012" >2012</option>     <option value="2011" >2011</option>     <option value="2010" >2010</option>     <option value="2009" >2009</option>     <option value="2008" >2008</option>     <option value="2007" >2007</option>     <option value="2006" >2006</option>     <option value="2005" >2005</option>     <option value="2004" >2004</option>     <option value="2003" >2003</option>     <option value="2002" >2002</option>     <option value="2001" >2001</option>     <option value="2000" >2000</option>     <option value="1999" >1999</option>     <option value="1998" >1998</option>     <option value="1997" >1997</option>     <option value="1996" >1996</option>     <option value="1995" >1995</option>     <option value="1994" >1994</option>     <option value="1993" >1993</option>     <option value="1992" >1992</option>     <option value="1991" >1991</option>     <option value="1990" >1990</option>     <option value="1989" >1989</option>     <option value="1988" >1988</option>     <option value="1987" >1987</option>     <option value="1986" >1986</option>     <option value="1985" >1985</option>     <option value="1984" >1984</option>     <option value="1983" >1983</option>     <option value="1982" >1982</option>     <option value="1981" >1981</option>     <option value="1980" >1980</option>     <option value="1979" >1979</option>     <option value="1978" >1978</option>     <option value="1977" >1977</option>     <option value="1976" >1976</option>     <option value="1975" >1975</option>     <option value="1974" >1974</option>     <option value="1973" >1973</option>     <option value="1972" >1972</option>     <option value="1971" >1971</option>     <option value="1970" >1970</option>                                    </select>                                
                                <label id="pippin_student_education_from_date_year-error" class="error hide" for="pippin_student_education_from_date_year">Year is required.</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6 padding-both-zero">
                            <label class="control-label col-xs-12" for="pippin_student_education_to_date_month">To <span class="req">*</span></label>
                            <div class="col-xs-6">
                                <select name="pippin_student_education_to_date_month" id="pippin_student_education_to_date_month" class="form-control" >
                                    <option value="">Month</option>
                                     <option value="1" >January</option>     <option value="2" >February</option>     <option value="3" >March</option>     <option value="4" >April</option>     <option value="5" >May</option>     <option value="6" >June</option>     <option value="7" >July</option>     <option value="8" >August</option>     <option value="9" >September</option>     <option value="10" >October</option>     <option value="11" >November</option>     <option value="12" >December</option>                                    </select>                                 
                                <label id="pippin_student_education_to_date_month-error" class="error hide" for="pippin_student_education_to_date_month">Month is required.</label>
                            </div>
                            <div class="col-xs-6">
                                <select name="pippin_student_education_to_date_year" id="pippin_student_education_to_date_year" class="form-control" >
                                    <option value="">Year</option>
                                     <option value="2019" >2019</option>     <option value="2018" >2018</option>     <option value="2017" >2017</option>     <option value="2016" >2016</option>     <option value="2015" >2015</option>     <option value="2014" >2014</option>     <option value="2013" >2013</option>     <option value="2012" >2012</option>     <option value="2011" >2011</option>     <option value="2010" >2010</option>     <option value="2009" >2009</option>     <option value="2008" >2008</option>     <option value="2007" >2007</option>     <option value="2006" >2006</option>     <option value="2005" >2005</option>     <option value="2004" >2004</option>     <option value="2003" >2003</option>     <option value="2002" >2002</option>     <option value="2001" >2001</option>     <option value="2000" >2000</option>     <option value="1999" >1999</option>     <option value="1998" >1998</option>     <option value="1997" >1997</option>     <option value="1996" >1996</option>     <option value="1995" >1995</option>     <option value="1994" >1994</option>     <option value="1993" >1993</option>     <option value="1992" >1992</option>     <option value="1991" >1991</option>     <option value="1990" >1990</option>     <option value="1989" >1989</option>     <option value="1988" >1988</option>     <option value="1987" >1987</option>     <option value="1986" >1986</option>     <option value="1985" >1985</option>     <option value="1984" >1984</option>     <option value="1983" >1983</option>     <option value="1982" >1982</option>     <option value="1981" >1981</option>     <option value="1980" >1980</option>     <option value="1979" >1979</option>     <option value="1978" >1978</option>     <option value="1977" >1977</option>     <option value="1976" >1976</option>     <option value="1975" >1975</option>     <option value="1974" >1974</option>     <option value="1973" >1973</option>     <option value="1972" >1972</option>     <option value="1971" >1971</option>     <option value="1970" >1970</option>                                    </select>
                                <label id="pippin_student_education_to_date_year-error" class="error hide" for="pippin_student_education_to_date_year">Year is required.</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12 padding-both-zero">
                            <label class="control-label col-xs-12" for="pippin_student_education_status">Results/Dates of qualification/Status <span class="req">*</span></label>
                            <div class="col-xs-10">
                                <input name="pippin_student_education_status" id="pippin_student_education_status" class="form-control" type="text" value="" />
                                <label id="pippin_student_education_status-error" class="error hide" for="pippin_student_education_status">Results/Dates of qualification/Status is required.</label>

                            </div>
                            <div class="col-xs-2 padding-both-zero">
                                <div class="col-xs-12">
                                    <input type="button" value="Add" onclick="addStudentEducation(0);" class="btn btn-md button" />
                                </div>
                            </div>
                        </div>
                    </div>                  
                </div>
    <div class="form-row">
    <button class="btn btn-primary" type="submit">Submit form</button>
    </div>       

  
  
</form>



<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php 
include_once("FOOTER.PHP"); 
?>