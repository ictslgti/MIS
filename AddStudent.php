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
         <h1 style="text-align:center"> SLGTI STUDENTS' REGISTRATION FORM </h1>   
     </div>
</div><br><br>


<div class="container">
<form class="needs-validation" novalidate action="">

    <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="cid"> Course Name: </label>
          <select name="cid" id="cid" class="form-control" >
            <option value="" >Select</option>
            <option value="">  </option>
          </select>
        </div>

        <div class="col-md-3 mb-3">
          <label for="ayear"> Accademic Year: </label>
          <select name="ayear" id="ayear" class="form-control" >
            <option value="" >Select</option>
            <option value="">  </option>
          </select>
        </div>
    </div>

    <div class="form-row">

        <div class="col-md-4 mb-3">
          <label for="sid">Student ID:</label>
          <input type="text" class="form-control" id="sid" placeholder="" aria-describedby="idPrepend" required>
        </div>

        <div class="col-md-2 mb-3">
          <label for="status">Status:</label>
          <select name="status" id="status" class="form-control" >
            <option value="" >Select</option>
            <option value="studying"> Studying </option>
            <option value="completed"> Completed </option>
            <option value="exit"> Exit </option>
          </select>
        </div>

        <div class="col-md-3 mb-3">
          <label for="enrolldate">Enroll Date:</label>
          <input type="text" class="form-control" id="enrolldate" placeholder="" aria-describedby="enrolldatePrepend" required>
        </div>

        <div class="col-md-3 mb-3">
          <label for="exitdate">Exit Date:</label>
          <input type="text" class="form-control" id="exitdate" placeholder="" aria-describedby="exitdatePrepend" required>
        </div>
    </div>

    <div class="form-row">
          <div class class="col-md-1">
          </div>
          <div class="col">
          <h2 style="font-size: 20px; font-weight: 700; border-bottom: 2px solid #aaa;">Personal Information</h2>
          </div>  
    </div><br>
                      
    <div class="form-row">
          <div class="col-md-2 mb-3">
          <label for="title"> Title: </label>
          <select name="title" id="title" class="form-control" >
               <option value="">Select</option>
                    <option value="mr"> Mr </option>
                    <option value="mrs"> Mrs </option>
                    <option value="miss"> Miss </option>
         </select>
         </div>

        <div class="col-md-10 mb-3">
          <label for="fullname"> Full Name: </label>
          <input type="text" class="form-control" id="fullname" placeholder="" aria-describedby="fullnamePrepend" required>
        </div>

    </div>

    <div class="form-row">
        <div class="col-md-7 mb-3">
          <label for="ini_name"> Name with Initials: </label>
          <input type="text" class="form-control" id="ini_name" placeholder="" value="" required>
        </div>

        <div class="col-md-2 mb-3">
            <label for="gender"> Gender: </label>
            <select name="gender" id="gender" class="form-control" >
                <option value="">Select</option>
                <option value="male"> Male </option>
                <option value="female"> Female </option>
            </select>
        </div>

        <div class="col-md-3 mb-3">
            <label for="civilstatus"> Civil Status: </label>
            <select name="civilstatus" id="civilstatus" class="form-control" >
                <option value="">Select</option>
                <option value="male"> Single </option>
                <option value="female"> Maried </option>
            </select>
        </div>
    </div>
  
    <div class="form-row">
          
          <div class="col-md-4 mb-3">
            <label for="email"> Email: </label>
            <div class="input-group-prepend">
            <div class="input-group-text">@</div>
            <input type="email" class="form-control" id="email" placeholder="nimal89@gmail.com"  required>
            </div> 
          </div>

          <div class="col-md-3 mb-3">
            <label for="nic"> NIC: </label>
            <input type="text" class="form-control" id="nic" placeholder=""  required>
          </div>
          
          <div class="col-md-2 mb-3">
            <label for="dob"> Date of Birth: </label>
            <input type="date" class="form-control" id="dob" placeholder=""  required>
          </div>

          <div class="col-md-3 mb-3">
            <label for="phone"> Phone No: </label>
            <input type="text" class="form-control" id="phone" placeholder=""  required>
          </div>
    </div>    

    <div class="form-row"> 
          <div class="col-md-12 mb-3">
            <label for="address"> Address: </label>
            <input type="textarea" class="form-control" id="address" placeholder="No, Street, Hometown."  required>
          </div>
    </div>
 
    <div class="form-row">
          <div class="col-md-1 mb-3">
            <label for="zip"> ZIP-Code:</label>
            <input type="text" class="form-control" id="zip" placeholder=""  required>
          </div>
          
          <div class="col-md-2 mb-3">
            <label for="district"> District: </label>
            <select name="district" id="district" class="form-control" >
                <option value="">Select</option>
                <option value="2"> Ampara </option>
                <option value="2"> Batticalo </option>
                <option value="2"> Trincomalee </option>
                <option value="1"> Jaffna </option>
                <option value="1"> Vavuniya </option>
                <option value="1"> Killinochchi  </option>
                <option value="1"> Mullaitivu </option>
                <option value="1"> Mannar </option>
                <option value="6"> Puttalam </option>
                <option value="6"> Kurunegala </option>
                <option value="3"> Gampaha </option>
                <option value="3"> Colombo </option>
                <option value="3"> Kalutara </option>
                <option value="8"> Anuradhapura </option>
                <option value="8"> Polonnaruwa </option>
                <option value="5"> Matale	 </option>
                <option value="5"> Kandy </option>
                <option value="5"> Nuwara Eliya </option>
                <option value="9"> Kegalle </option>
                <option value="9"> Ratnapura </option>
                <option value="7"> Badulla </option>
                <option value="7"> Monaragala </option>
                <option value="4"> Hambantota </option>
                <option value="4"> Matara </option>
                <option value="4"> Galle </option>
            </select>
          </div>

          <div class="col-md-2 mb-3">
            <label for="ds"> Divisional Secretariat: </label>
            <input type="text" class="form-control" id="ds" placeholder=""  required>
          </div>
          
          <div class="col-md-2 mb-3">
            <label for="province"> Province: </label>
            <select name="province" id="province" class="form-control" >
                <option value="">Select</option>
                <option value="1"> Northen </option>
                <option value="2"> Eastern </option>
                <option value="3"> Western </option>
                <option value="4"> Southern </option>
                <option value="5"> Central </option>
                <option value="6"> North Western  </option>
                <option value="7"> Uva </option>
                <option value="8"> North Central </option>
                <option value="9"> Sabaragamuwa </option>
            </select>
          </div>

          <div class="col-md-2 mb-3">
            <label for="bloodgroup"> Blood Group: </label>
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
          <div class class="col-md-1">
          </div>
          <div class="col">
          <h2 style="font-size: 20px; font-weight: 700; border-bottom: 2px solid #aaa;"> Educational Qualification </h2>
          </div>  
    </div><br>

  <div class="form-row">
    <div id="results-student_education" class="form-group table-responsive">               
            <table class="table" width="100%">
              <thead>
              <tr>
              <th width="20%"> Qualification Type </th>
              <th width="20%"> Index No </th>
              <th width="25%"> Year of Exam </th>
              <th width="30%"> Subject </th>
              <th width="20%"> Result </th>
              <th width="20%"> Action </th>
              </tr>
              </thead>
              <tbody>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th><button class="btn btn-danger" type="submit">Edit</button></th>
              </tbody>
            </table>  
      </div>
  </div>

<div class="form-row ">
    <div class="col-md-2 mb-3 ">
        <label for="qualification"> Qualification Type: </label>
        <select name="qualification" id="qualification" class="form-control" >
               <option value="">Select</option>
                    <option value=""> O/L </option>
                    <option value=""> A/L</option>
                    <option value=""> NVQ - 03 </option>
                    <option value=""> NVQ - 04 </option>
                    <option value=""> NVQ - 05 </option>
        </select>
    </div>
    <div class="col-md-3 mb-3 ">
        <label for="course"> Index No: </label>
        <input name="course" id="course" class="form-control" type="text" value="" >
    </div>
                        
    <div class="col-md-2 mb-3">
        <label  for="yoe"> Year of Exam: </label>
        <input name="yoe" id="yoe" class="form-control" type="text" value="" >
    </div>

    <div class="col-md-5 mb-3">
        <label  for="cofrom"> Subject/Name of the Course: </label>
        <input name="yoe" id="yoe" class="form-control" type="text" value="" >
    </div>

    <div class="col-md-2 mb-3">
        <label  for="cofrom"> Result/Status: </label>
        <input type="text" class="form-control" id="from" placeholder=""  required>
    </div>
    <div class="col-md-1 mb-3">
    </div>

    <div class="col-md-1">
    
    <button class="btn btn-info" type="Submit" onclick="AddStudent(0)"> Update </button><br><br>
    <button class="btn btn-primary" type="Submit" onclick="AddStudent(0)"> Add </button>
    </div>

    <div class="col-md-1">
    
    </div>
</div>

    <div class="form-row">
          <div class class="col-md-1">
          </div>
          <div class="col">
          <h2 style="font-size: 20px; font-weight: 700; border-bottom: 2px solid #aaa;">Emergency Contact Information</h2>
          </div>  
    </div><br>

    <div class="form-row">
        <div class="col-md-12 mb-3">
          <label for="Ename">Name :</label>
          <input type="text" class="form-control" id="Ename" placeholder="" value="" required>
        </div>
    </div>
    
    <div class="form-row">
        <div class="col-md-12 mb-3">
          <label for="addressE">Address :</label>
          <input type="text" class="form-control" id="addressE" placeholder="" value="" required>
        </div>
    </div>
    
    <div class="form-row">
        <div class="col-md-3 mb-3">
          <label for="Ephone">Phone No :</label>
          <input type="text" class="form-control" id="Ephon" placeholder="" value="" required>
        </div>
    
        <div class="col-md-3 mb-3">
          <label for="relation">Relationship :</label>
          <select name="relation" id="relation" class="form-control" >
              <option value="">Select</option>
              <option value="mother"> Mother </option>
              <option value="father"> Father </option>
              <option value="guardian"> Guardian </option>
        </select>
        </div>
    </div>

<div>
<p> 
</div>

<?php
if(isset($_GET['edit']))
{
  echo '<input type="submit" name ="Edit" value ="Edit">';
}
else
{
  echo '<input type="submit" name ="Submit" value ="Submit">';
}
?>        
</form>
</div>




<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php 
include_once("FOOTER.PHP"); 
?>