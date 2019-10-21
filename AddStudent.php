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
<?php
echo $_SESSION['user_name'];  
$stid = $title = $fname = $ininame = $gender = $civil = $email = $nic = $dob = $phone = $address = $zip = $district = $division = $province = $blood = $ename = $eaddress = $ephone = $erelation = $status = null;
$coid = $year = $enroll = $exit = null;
if(isset($_GET['edit']))
{
  $stid =$_GET['edit'];
  $sql = "SELECT s.`student_id`,`student_title`,`student_fullname`,`student_ininame`,`student_gender`,`student_civil`,`student_email`,`student_nic`,
  `student_dob`,`student_phone`,`student_address`,`student_zip`,`student_district`,`student_divisions`,`student_provice`,`student_blood`,
  `student_em_name`,`student_em_address`,`student_em_phone`,`student_em_relation`,`student_status`,`course_id`, academic_year, student_enroll_status FROM `student` AS s, student_enroll as e  WHERE s.student_id=e.student_id and s.`student_id`= '$stid'";
  $result = mysqli_query($con,$sql);

  if(mysqli_num_rows($result)==1)
  {
    $row =mysqli_fetch_assoc($result);
    $coid = $row['course_id'];
    $year = $row['academic_year'];
    //$stid = $row['student_id'];
    $enstatus =$row['student_enroll_status'];
    // $enroll = $row['start_date'];
    // $exit = $row['exit_date'];
    $title = $row['student_title'];
    $fname = $row['student_fullname'];
    $ininame = $row['student_ininame'];
    $gender = $row['student_gender'];
    $civil = $row['student_civil'];
    $email = $row['student_email'];
    $nic = $row['student_nic'];
    $dob = $row['student_dob'];
    $phone = $row['student_phone'];
    $address = $row['student_address'];
    $zip = $row['student_zip'];
    $district = $row['student_district'];
    $division = $row['student_divisions'];
    $province = $row['student_provice'];
    $blood = $row['student_blood'];
    $ename = $row['student_em_name'];
    $eaddress = $row['student_em_address'];
    $ephone = $row['student_em_phone'];
    $erelation = $row['student_em_relation'];
    
  }
}
?>
<div class="ROW">
     <div class="col text-center">
         <h1 style="text-align:center"> SLGTI STUDENTS' REGISTRATION FORM </h1>   
     </div>
</div><br><br>


<div class="container">
<form class="needs-validation" novalidate action="">

    <div class="form-row">
        <div class="col-md-7 mb-3">
          <label for="cid"> Course Name: </label>
          <select name="cid" id="cid" class="form-control" >
          <option selected disabled> ........select the Course .......</option>
              <?php 
                $sql="SELECT * from course";
                $result = mysqli_query($con,$sql);
                if(mysqli_num_rows($result)>0)
                while($row = mysqli_fetch_assoc($result)) 
                {
                echo '<option value="'.$row['course_id'].'"';
                if ($row["course_id"]==$coid)
                {
                  echo 'selected'; 
                }
                echo '>'.$row['course_name'].'</option>';
                }
              ?> 
          </select>
        </div>

        <div class="col-md-3 mb-3">
          <label for="ayear"> Academic Year: </label>
          <select name="ayear" id="ayear" class="form-control" >
          <option selected disabled> ........select Academic Year .......</option>
              <?php 
              $sql="SELECT academic_year from academic";
              $result = mysqli_query($con,$sql);
              if(mysqli_num_rows($result)>0)
              while($row = mysqli_fetch_assoc($result)) 
              {
              echo '<option value="'.$row['academic_year'].'"';
              if ($row["academic_year"]==$year)
              {
                echo 'selected'; 
              }
              echo '>'.$row['academic_year'].'</option>';
              }
              ?> 
          </select>
        </div>
    </div>

    <div class="form-row">

        <div class="col-md-3 mb-3">
          <label for="sid">Student ID:</label>
          <input type="text" class="form-control" id="sid" value="<?php echo $stid ?>" placeholder="" aria-describedby="idPrepend" required>
        </div>

        <div class="col-md-3 mb-3">
          <label for="status">Status:</label>
          <select name="status" id="status" class="form-control" value="<?php echo $enstatus ?>" >
            <option selected disabled>Choose Status</option>
              <option value="Following" <?php if($enstatus=="Following")  echo 'selected';?>>Following</option> 
              <option value="Completed" <?php if($enstatus == "Completed") echo ' selected';?>>Completed</option>
              <option value="Exit"<?php if($enstatus=="Exit") echo 'selected';?>>Exit</option>
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
          <div class class="col-md-1"></div>
          <div class="col">
          <h2 style="font-size: 20px; font-weight: 700; border-bottom: 2px solid #aaa;"> Personal Information </h2>
          </div>  
    </div><br>
                      
    <div class="form-row">
          <div class="col-md-2 mb-3">
          <label for="title"> Title: </label>
          <select name="title" id="title" class="form-control" value="<?php echo $title ?>">
            <option selected disabled>Choose Title</option>
              <option value="Mr" <?php if($title=="Mr")  echo 'selected';?>>Mr</option> 
              <option value="Miss" <?php if($title == "Miss") echo 'selected';?>>Miss</option>
              <option value="Mrs"<?php if($title=="Mrs") echo ' selected';?>>Mrs</option>
         </select>
         </div>
              
        <div class="col-md-10 mb-3">
          <label for="fullname"> Full Name: </label>
          <input type="text" class="form-control" id="fullname" value="<?php echo $fname ?>" placeholder="" aria-describedby="fullnamePrepend" required>
        </div>

    </div>

    <div class="form-row">
        <div class="col-md-7 mb-3">
          <label for="ini_name"> Name with Initials: </label>
          <input type="text" class="form-control" id="ini_name" value="<?php echo $ininame ?>" placeholder="" value="" required>
        </div>

        <div class="col-md-2 mb-3">
            <label for="gender"> Gender: </label>
            <select name="gender" id="gender" class="form-control" value="">
              <option selected disabled>Choose Gender</option>
              <option value="Male"<?php if($gender=="M")  echo 'selected';?>>Male</option>
              <option value="Female"<?php if($gender=='F') echo ' selected';?>>Female</option>
            </select>
        </div>

        <div class="col-md-3 mb-3">
            <label for="civilstatus"> Civil Status: </label>
            <select name="civilstatus" id="civilstatus" class="form-control">
            <option selected disabled>Choose Status</option>
              <option value="Single"<?php if($civil=="Single")  echo 'selected';?>>Single</option> 
              <option value="Married"<?php if($civil=="Married") echo ' selected';?> >Married</option>
            </select>
        </div>
    </div>
  
    <div class="form-row">
          
          <div class="col-md-4 mb-3">
            <label for="email"> Email: </label>
            <div class="input-group-prepend">
            <div class="input-group-text">@</div>
            <input type="email" class="form-control" id="email" value="<?php echo $email ?>" placeholder="nimal89@gmail.com"  required>
            </div> 
          </div>

          <div class="col-md-3 mb-3">
            <label for="nic"> NIC: </label>
            <input type="text" class="form-control" id="nic" value="<?php echo $nic ?>" placeholder=""  required>
          </div>
          
          <div class="col-md-2 mb-3">
            <label for="dob"> Date of Birth: </label>
            <input type="date" class="form-control" id="dob" value="<?php echo $dob ?>" placeholder=""  required>
          </div>

          <div class="col-md-3 mb-3">
            <label for="phone"> Phone No: </label>
            <input type="text" class="form-control" id="phone" value="<?php echo $phone ?>" placeholder=""  required>
          </div>
    </div>    

    <div class="form-row"> 
          <div class="col-md-12 mb-3">
            <label for="address"> Address: </label>
            <input type="textarea" class="form-control" id="address" value="<?php echo $address ?>" placeholder="No, Street, Hometown."  required>
          </div>
    </div>
 
    <div class="form-row">
          <div class="col-md-2 mb-3">
            <label for="zip"> ZIP-Code:</label>
            <input type="text" class="form-control" id="zip" value="<?php echo $zip ?>" placeholder=""  required>
          </div>
          
          <div class="col-md-2 mb-3">
            <label for="district"> District: </label>
            <select name="district" id="district" class="form-control" value="<?php echo $district ?>">
                <option value="">Select</option>
                <option value="Ampara"<?php if($district=="Ampara")  echo 'selected';?>> Ampara </option>
                <option value="Batticalo"<?php if($district=="Batticalo")  echo 'selected';?>> Batticalo </option>
                <option value="Trincomalee"<?php if($district=="Trincomalee")  echo 'selected';?>> Trincomalee </option>
                <option value="Jaffna"<?php if($district=="Jaffna")  echo 'selected';?>> Jaffna </option>
                <option value="Vavuniya"<?php if($district=="Vavuniya")  echo 'selected';?>> Vavuniya </option>
                <option value="Killinochchi"<?php if($district=="Killinochchi")  echo 'selected';?>> Killinochchi  </option>
                <option value="Mullaitivu"<?php if($district=="Mullaitivu")  echo 'selected';?>> Mullaitivu </option>
                <option value="Mannar"<?php if($district=="Mannar")  echo 'selected';?>> Mannar </option>
                <option value="Puttalam"<?php if($district=="Puttalam")  echo 'selected';?>> Puttalam </option>
                <option value="Kurunegala"<?php if($district=="Kurunegala")  echo 'selected';?>> Kurunegala </option>
                <option value="Gampaha"<?php if($district=="Gampaha")  echo 'selected';?>> Gampaha </option>
                <option value="Colombo"<?php if($district=="Colombo")  echo 'selected';?>> Colombo </option>
                <option value="Kalutara"<?php if($district=="Kalutara")  echo 'selected';?>> Kalutara </option>
                <option value="Anuradhapura"<?php if($district=="Anuradhapura")  echo 'selected';?>> Anuradhapura </option>
                <option value="Polonnaruwa"<?php if($district=="Polonnaruwa")  echo 'selected';?>> Polonnaruwa </option>
                <option value="Matale"<?php if($district=="Matale")  echo 'selected';?>> Matale	 </option>
                <option value="Kandy"<?php if($district=="Kandy")  echo 'selected';?>> Kandy </option>
                <option value="Nuwara Eliya"<?php if($district=="Nuwara Eliya")  echo 'selected';?>> Nuwara Eliya </option>
                <option value="Kegalle"<?php if($district=="Kegalle")  echo 'selected';?>> Kegalle </option>
                <option value="Ratnapura"<?php if($district=="Ratnapura")  echo 'selected';?>> Ratnapura </option>
                <option value="Badulla"<?php if($district=="Badulla")  echo 'selected';?>> Badulla </option>
                <option value="Monaragala"<?php if($district=="Monaragala")  echo 'selected';?>> Monaragala </option>
                <option value="Hambantota"<?php if($district=="Hambantota")  echo 'selected';?>> Hambantota </option>
                <option value="Matara"<?php if($district=="Matara")  echo 'selected';?>> Matara </option>
                <option value="Galle"<?php if($district=="Galle")  echo 'selected';?>> Galle </option>
            </select>
          </div>

          <div class="col-md-2 mb-3">
            <label for="ds"> Divisional Secretariat: </label>
            <input type="text" class="form-control" id="ds" value="<?php echo $division ?>" placeholder=""  required>
          </div>
          
          <div class="col-md-2 mb-3">
            <label for="province"> Province: </label>
            <select name="province" id="province" class="form-control" value="<?php echo $province?>">
                <option value="">Select</option>
                <option value="1"<?php if($province=="1")  echo 'selected';?>> Northen </option>
                <option value="2"<?php if($province=="2")  echo 'selected';?>> Eastern </option>
                <option value="3"<?php if($province=="3")  echo 'selected';?>> Western </option>
                <option value="4"<?php if($province=="4")  echo 'selected';?>> Southern </option>
                <option value="5"<?php if($province=="5")  echo 'selected';?>> Central </option>
                <option value="6"<?php if($province=="6")  echo 'selected';?>> North Western </option>
                <option value="7"<?php if($province=="7")  echo 'selected';?>> Uva </option>
                <option value="8"<?php if($province=="8")  echo 'selected';?>> North Central </option>
                <option value="9"<?php if($province=="9")  echo 'selected';?>> Sabaragamuwa </option>
            </select>
          </div>

          <div class="col-md-2 mb-3">
            <label for="bloodgroup"> Blood Group: </label>
            <select name="bloodgroup" id="bloodgroup" class="form-control" value="<?php echo $blood?>">
              <option selected disabled> Blood Group </option>
              <option value="A+"<?php if($blood=="A+")  echo 'selected';?>> A+ </option>
              <option value="A-"<?php if($blood=="A-")  echo 'selected';?>> A- </option>
              <option value="B+"<?php if($blood=="B+")  echo 'selected';?>> B+ </option>
              <option value="B-"<?php if($blood=="B-")  echo 'selected';?>> B- </option>
              <option value="C+"<?php if($blood=="C+")  echo 'selected';?>> C+ </option>
              <option value="C-"<?php if($blood=="C-")  echo 'selected';?>> C- </option>
              <option value="AB+"<?php if($blood=="AB+")  echo 'selected';?>> AB+ </option>
              <option value="AB-"<?php if($blood=="AB-")  echo 'selected';?>> AB- </option> 
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
              <th width="15%"> Year of Exam </th>
              <th width="30%"> Subject </th>
              <th width="20%"> Result </th>
              <th width="20%"> Action </th>
              </tr>
              <?php
               //if(isset($_GET['edit']))
               // {
                  //$stid =$_GET['edit'];WHERE `qualification_student_id`= '$stid'"
                  $sql ="SELECT `qualification_type`,`qualification_index_no`,`qualification_year`,`qualification_description`,`qualification_results` 
                  FROM `student_qualification`";
                  $result = mysqli_query ($con, $sql);
                  if (mysqli_num_rows($result)>0)
                  {
                    while($row = mysqli_fetch_assoc($result))
                    {
                      echo '
                      <tr style="text-align:left";>
                          <td>'. $row["qualification_type"]."<br>".'</td>
                          <td>'. $row["qualification_index_no"]."<br>".'</td>
                          <td>'. $row["qualification_year"]."<br>".'</td>
                          <td>'. $row["qualification_description"]."<br>".'</td>
                          <td>'. $row["qualification_results"]."<br>".'</td>
                          <td edit='.$row["qualification_type"].'"> Edit </a> 
                          </td>
                      </tr> ';
                    }
                  }
                  else
                  {
                    echo "0 results";
                  }
                
    
              ?>
              <th><button class="btn btn-danger" type="submit">Edit</button></th>
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
          <input type="text" class="form-control" id="Ename" value="<?php echo $ename ?>" placeholder="" value="" required>
        </div>
    </div>
    
    <div class="form-row">
        <div class="col-md-12 mb-3">
          <label for="addressE">Address :</label>
          <input type="text" class="form-control" id="addressE" value="<?php echo $eaddress ?>" placeholder="" value="" required>
        </div>
    </div>
    
    <div class="form-row">
        <div class="col-md-3 mb-3">
          <label for="Ephone">Phone No :</label>
          <input type="text" class="form-control" id="Ephon"  value="<?php echo $ephone ?>" placeholder="" value="" required>
        </div>
    
        <div class="col-md-3 mb-3">
          <label for="relation">Relationship :</label>
          <select name="relation" id="relation" value="<?php echo $erelation ?>" class="form-control" >
              <option value="">Select</option>
              <option value="mother" <?php if($erelation=="mother") echo 'selected' ?>> Mother </option>
              <option value="father" <?php if($erelation=="father") echo 'selected' ?>> Father </option>
              <option value="guardian" <?php if($erelation=="guardian") echo 'selected' ?>> Guardian </option>
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