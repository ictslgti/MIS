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
<?php
$stid = $title = $fname = $ininame = $gender = $civil = $img = $email = $nic = $dob = $phone = $address = $zip = $district = $division = $province = $blood = $mode = $depth = $level =
$ename = $eaddress = $ephone = $id =$erelation = $enstatus = $coid = $year = $enroll = $exit = $qutype = $index = $yoe = $subject = $results = $pass = $npass = $cpass =null;
if(isset($_GET['Sid']))
{
 $username =$_GET['Sid'];
 $sql = "SELECT user_name,e.course_id,`student_title`,`student_fullname`,`student_profile_img`,`student_ininame`,`student_gender`,`student_civil`,`student_email`,`student_nic`,`student_profile_img`,
`student_dob`,`student_phone`,`student_address`,`student_zip`,`student_district`,`student_divisions`,`student_provice`,`student_blood`,`student_em_name`,`student_em_address`,
`student_em_phone`,`student_em_relation`,`student_status`,`course_name`,`department_name`,`course_mode`,course_nvq_level,`academic_year`,`student_enroll_date`,`student_enroll_exit_date`,
`student_enroll_status`,`user_password_hash` FROM `student` as s, student_enroll as e, user as u, course as c, department as d WHERE user_name=s.student_id and s.student_id=e.student_id 
 and e.course_id=c.course_id and  c.department_id=d.department_id and `student_enroll_status`='Following' and user_name='$username'";
$result = mysqli_query($con,$sql);

  if(mysqli_num_rows($result)==1)
  {
    //echo "success";
    $row =mysqli_fetch_assoc($result);
    //$stid = $row['student_id'];
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
    $coid = $row['course_name'];
    $depth = $row['department_name'];
    $level = $row['course_nvq_level'];
    $mode = $row['course_mode'];
    $year = $row['academic_year'];
    $enstatus =$row['student_enroll_status'];
    $enroll = $row['student_enroll_date'];
    $exit = $row['student_enroll_exit_date'];
    $id=$row['course_id'];
    $pass=$row['user_password_hash'];
    $img=$row['student_profile_img'];
  }
}
else
{
$username = $_SESSION['user_name'];

$sql = "SELECT user_name,e.course_id,`student_title`,`student_fullname`,`student_profile_img`,`student_ininame`,`student_gender`,`student_civil`,`student_email`,`student_nic`,`student_profile_img`,
`student_dob`,`student_phone`,`student_address`,`student_zip`,`student_district`,`student_divisions`,`student_provice`,`student_blood`,`student_em_name`,`student_em_address`,
`student_em_phone`,`student_em_relation`,`student_status`,`course_name`,`department_name`,`course_mode`,course_nvq_level,`academic_year`,`student_enroll_date`,`student_enroll_exit_date`,
`student_enroll_status`,`user_password_hash` FROM `student` as s, student_enroll as e, user as u, course as c, department as d WHERE user_name=s.student_id and s.student_id=e.student_id 
 and e.course_id=c.course_id and  c.department_id=d.department_id and `student_enroll_status`='Following' and user_name='$username'";
$result = mysqli_query($con,$sql);

  if(mysqli_num_rows($result)==1)
  {
    //echo "success";
    $row =mysqli_fetch_assoc($result);
    //$stid = $row['student_id'];
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
    $coid = $row['course_name'];
    $depth = $row['department_name'];
    $level = $row['course_nvq_level'];
    $mode = $row['course_mode'];
    $year = $row['academic_year'];
    $enstatus =$row['student_enroll_status'];
    $enroll = $row['student_enroll_date'];
    $exit = $row['student_enroll_exit_date'];
    $id=$row['course_id'];
    $pass=$row['user_password_hash'];
    echo $img=$row['student_profile_img'];
  }
}

//<!-- password change -->


    
// if(isset($_POST['Save Changes']))
// {
//     //echo "hi";
// if(!empty($_POST['password']) && !empty($_POST['npassword']) && (!empty($_POST['cpassword']))
// {
//     if((isset($_POST['password']) == (isset($pass)))
//     {
//         if((isset($_POST['npassword'])) == (isset($_POST['cpassword'])))
//         {

//         }
//         else
//         {
//             echo "Please check password Field";
//         }
//     }
//     else
//     {
//         echo "wrong password";
//     }
// }
// else
// {
//     echo "please fill Required field";
// }
// }

?>
<?php
// if(isset($_POST["insert"]))
// {
//     $file = addcslashes(file_get_contents($_FILES["image"]["tmp_name"]));
//     $query = "UPDATE `student` SET `student_profile_img`='$file' WHERE `student_id`='$username'";
//     if(mysqli_query($con,$query))
//     {
//         echo '<script> alert("Images Insert into Databases") </script>';
//     }
// }
?>
<!-- form start---->
<div class="col text-center shadow p-5 mb-5 bg-white rounded">
<h1 style="text-align:center"  > SRI LANKA GERMAN TRAINING INSTITUTE  </h1>
<h5 style="text-align:center"> Killinochchi </h5>
</div>

<div class="container">
<form method="POST" enctype="multipart/form-data">

<div class="form-row shadow p-2 mb-4 bg-white rounded">
    <div class="col-md-3 mb-3 " > 
    <img src="<?php echo $img;?>" alt="user image" class="img-thumbnail" style="width:200px;height:200px;">
    <?php
    // $query= "select `student_profile_img` from student where student_id='$username'";
    // $result=mysqli_query($con,$query);
    // if(mysqli_num_rows($result)==1)
    // {
    // echo '';
    // }
    ?>
    <!-- <input type="file" name="image" id="image"/><br><br>
    <input type="submit" value="Insert" name="insert" id="insert"> -->
    
    <!-- <button type="button" class="btn btn-outline-success">Success</button> -->
    </div>
    <div class="col-md-7 col-sm-4">
        <h5 class="text-muted"><b><?php echo $title.".".$fname; ?></b></h5>
        <h6 class="text-muted"><?php echo $username; ?></h6>
        <h6 class="text-muted"><?php echo $nic; ?></h6>
        <h6 class="text-muted">
        <?php 
        $sql="select d.department_name from department as d, course as c, student_enroll as e, user as u where user_name=e.student_id and 
        e.course_id=c.course_id and student_enroll_status='Following' and c.department_id=d.department_id and user_name='$username'";
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result)==1)
        {
        echo "Department of ".$depth; 
        }
        else
        {
          echo "Course has been Completed";
        }

        ?>
        </h6>
        <h6 class="text-muted">
        <?php 
        $sql="select c.course_name from  course as c, student_enroll as e, user as u where user_name=e.student_id and 
        e.course_id=c.course_id and student_enroll_status='Following' and user_name='$username'";
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result)==1)
        {
        echo "Department of ".$coid; 
        }
        else
        {
            echo "Course has been Completed";
        }
        ?>
        </h6>
        <p class="text-muted" style="font-size:15px;">
        <?php 
        $sql="select c.course_nvq_level from course as c, student_enroll as e, user as u where user_name=e.student_id and 
        e.course_id=c.course_id and student_enroll_status='Following' and user_name='$username'";
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result)==1)
        {
        echo "( Level- ".$level.")"; 
        }
        // else
        // {
        //     echo "Course has been Completed";
        // }

        ?>
        </P>
        <h6 class="text-muted">
        <?php 
        $sql="select DISTINCT max(academic_year),`student_enroll_exit_date` from student_enroll WHERE student_id='$username' ORDER BY academic_year DESC";
        
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result)==1)
        {
        echo "Batch: ".$year."( ".$exit." )"; 
        }
        // else
        // {
        //     echo "Course has been Completed";
        // }

        ?>
        </h6>
        <!-- <div class="form-row">
        <div class="col-md-5 col-sm-4"></div>
        <div class="col-md-5 col-sm-4"><h5 class="text-muted" style="flot:left">2018 November 01</h5></div> 
        </div> -->
    </div>
    <!-- <div class="col-md-4 col-sm-4 shadow p-3 mb-5 bg-white rounded">
    <h5 style="border-bottom: 2px solid #aaa;"> Personal Information </h5>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    </div> -->
</div>

<!-- <div class="form-row shadow p-2 mb-4 bg-white rounded"> -->
<nav>
  <div class="nav nav-tabs shadow p-2 mb-4 bg-white rounded" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Personal Info</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Qualification Info</a>
    <a class="nav-item nav-link" id="nav-modules-tab" data-toggle="tab" href="#nav-modules" role="tab" aria-controls="nav-modules" aria-selected="false">Modules Info</a>
  </div>
</nav>
<div class="tab-content shadow p-2 mb-4 bg-white rounded" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><br>
        <h5 style="border-bottom: 2px solid #aaa;"> Personal Information </h5><br>
        <div class="row" id="personal info">
            <div class="col-md-2 col-sm-4">
            <h6> Name with Initials: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo $title.".".$ininame; ?> </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Gender: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo $gender; ?> </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Date of Birth: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo $dob; ?> </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Civil Status: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo $civil; ?> </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Enroll Date:  </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo $enroll; ?> </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6>Exit Date:</h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo $exit; ?> </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Blood Group: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo $blood; ?>  </h6>
            </div>
        </div><br>

        <h5 style="border-bottom: 2px solid #aaa;"> Contact Information </h5><br>
        <div class="row" id="personal info">
            <div class="col-md-2 col-sm-4">
            <h6> Email: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo $email; ?>  </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Phone No: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo $phone; ?>  </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Address: </h6>
            </div>
            <div class="col-md-10 col-sm-4">
                <h6 class="text-muted"> <?php echo $address; ?>  </h6>
            </div>

            <div class="col-md-2 col-sm-4">
            <h6> District:  </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo $district; ?>  </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Province: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo $province; ?>  </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Zip Code: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo $zip; ?>  </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Divisional Secretariat: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo $division; ?>  </h6>
            </div>
        </div><br>

        <h5 style="border-bottom: 2px solid #aaa;"> Emergency Contact Information </h5><br>
        <div class="row container" id="personal info">
            <div class="col-md-2 col-sm-4">
            <h6> Name: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo $ename; ?> </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Phone No: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo $ephone; ?></h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Address: </h6>
            </div>
            <div class="col-md-10 col-sm-4">
                <h6 class="text-muted"> <?php echo $eaddress; ?> </h6>
            </div>

            <div class="col-md-2 col-sm-4">
            <h6> Relationship  </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> <?php echo $erelation; ?> </h6>
            </div>
        </div>
  </div>

  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
          <div id="results-student_education" class="form-group table-responsive">               
            <table class="table table-hover" width="100%" id="table">
              <thead>
              <tr>
              <th width="15%"> Qualification Type </th>
              <th width="20%"> Index No </th>
              <th width="15%"> Year of Exam </th>
              <th width="30%"> Subject </th>
              <th width="10%"> Result </th>
              </tr>
              </head>
              <tbody>
              <?php
            
                  $sql ="SELECT`qualification_type`,`qualification_index_no`,`qualification_year`,`qualification_description`,`qualification_results`
                  FROM `user`,student_qualification WHERE `user_name`= qualification_student_id and `user_name`='$username'";
                  $result = mysqli_query ($con, $sql);
                  if (mysqli_num_rows($result)>0)
                  {
                    while($row = mysqli_fetch_assoc($result))
                    {
                      echo '
                      <tr style="text-align:left";>
                          <td>'. $row["qualification_type"].'</td>
                          <td>'. $row["qualification_index_no"].'</td>
                          <td>'. $row["qualification_year"].'</td>
                          <td>'. $row["qualification_description"].'</td>
                          <td>'. $row["qualification_results"].'</td>
                      </tr> ';
                    }
                  }
                  else
                  {
                    echo "0 results";
                  }

               ?>
              </tbody>
            </table>  
      </div>
  </div>


<div class="tab-pane fade" id="nav-modules" role="tabpanel" aria-labelledby="nav-modules-tab">
         <div id="results-student_education" class="form-group table-responsive">               
            <table class="table table-hover" width="100%" id="table">
              <thead>
              <tr>
              <th width="15%"> Module ID </th>
              <th width="20%"> Module Name </th>
              <th width="15%"> Semester ID </th>
              <th width="30%"> Learning Hours</th>
              <th width="30%"> Assessment </th>
              </tr>
              </head>
              <tbody>
              <?php
            //    if(isset($_GET['edit']))
            //    {
                  //$stid =$_GET['edit'];WHERE `qualification_student_id`= '$stid'"
                  //include_once("mysqli_connect.php");
                  //$username = $_SESSION['user_name'];
                  $sql ="SELECT `module_id`, `module_name`, `module_aim`, `module_learning_hours`, `module_resources`, `module_learning_outcomes`, `semester_id`, `module_reference`, `module_relative_unit`, `module_lecture_hours`, `module_practical_hours`, `module_self_study_hours` 
                  FROM `module` as m, course as c WHERE c.course_id=m.course_id and c.course_id='$id'";
                  $result = mysqli_query ($con, $sql);
                  if (mysqli_num_rows($result)>0)
                  {
                    while($row = mysqli_fetch_assoc($result))
                    {
                      echo '
                      <tr style="text-align:left";>
                          <td>'. $row["module_id"].'</td>
                          <td>'. $row["module_name"].'</td>
                          <td>'. $row["semester_id"].'</td>
                          <td>'. $row["module_learning_hours"].'</td>
                          <td>
                          <a href="Assessment.php?Mid='.$row["module_id"].'" class="btn btn-info"> <i class="fas fa-angle-double-right"></i>
                          </td>
                      </tr> ';
                    }
                  }
                  else
                  {
                    echo "0 results";
                  }

               ?>
              </tbody>
            </table>  
      </div>
      </div>
  </div>
</form>
</div>
<script>

$(document).ready(function(){
   $('#insert').click(function(){
      var image_name = $('#image').val();
      if(image_name == '')
      {
          alert("Please Select Image");
          return false;
      }
      else
      {
          var extension = $('#image').val().split('.').pop().toLowerCase();
          if(jQuery.inArry(extension,['gif','png','jpg','jpeg']) == -1)
          {
              alert('Invalid Image File');
              $('#image').val('');
              return false;
          }
      }
   });
});
</script>

<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php 
include_once("footer.php");
?>