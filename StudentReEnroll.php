
<!------START DON'T CHANGE ORDER HEAD,MANU,FOOTER----->
<!---BLOCK 01--->
<?php 
   
include_once("config.php");

$title ="STUDENT COURSEREENROLL | SLGTI"; //YOUR HEAD TITLE CREATE VARIABLE BEFORE FILE NAME
include_once("head.php");
include_once("menu.php");

?>
<!----END DON'T CHANGE THE ORDER---->


<!---BLOCK 02--->
<!---START YOUR CODER HERE----->


<!-----END YOUR CODE----->
<!-- form start---->
<?php
    $stid = $coid = $year = $enroll = $exit = $enstatus = $mode = null;

    // edit coding
    
    if((isset($_GET['stid'])) && (isset($_GET['coid'])) && (isset($_GET['ayear'])))
    {
      $stid =$_GET['stid'];
      $coid =$_GET['coid'];
      $year =$_GET['ayear'];
     
      //echo 'coid'.$_POST['coid'];
      $sql = "SELECT `student_id`,`course_id`,`course_mode`,`student_enroll_date`,`student_enroll_exit_date`,`student_enroll_status`,`academic_year`
      FROM `student_enroll` WHERE `student_id`='$stid'  AND `course_id`='$coid' AND `academic_year`='$year'";
      $result = mysqli_query($con,$sql);

      if(mysqli_num_rows($result)==1)
        {
          //echo "welcom";
        $row =mysqli_fetch_assoc($result);
        $stid = $row['student_id'];
        $coid = $row['course_id'];
        $mode = $row['course_mode'];
        $year = $row['academic_year'];
        $enstatus =$row['student_enroll_status'];
        $enroll = $row['student_enroll_date'];
        $exit = $row['student_enroll_exit_date'];
      }
    }

    // update coding

    if(isset($_POST['Edit']))
     {
      // echo "welcome Edit"; 
      // echo 'stid'.$_POST['stid']; echo 'mode'.$_POST['mode']; 
      // echo 'ayear'.$_POST['ayear'];echo 'edate'.$_POST['edate']; echo 'exdate'.$_POST['exdate'];
      //'status'.$_POST['status'];
      
      if(!empty($_POST['stid']) && !empty($_POST['coid']) && !empty($_POST['mode']) && !empty($_POST['ayear']) 
      && !empty($_POST['status']) && !empty($_POST['edate']) && !empty($_POST['exdate']))
       {
        //echo "SUCCESS";
        $stid=$_GET['stid'];
        $coid=$_GET['coid'];
        $mode=$_POST['mode'];
        $year=$_POST['ayear'];
        $enstatus=$_POST['status'];
        $enroll=$_POST['edate'];
        $exit=$_POST['exdate'];

        $sql2 = "UPDATE `student_enroll` SET `course_mode`='$mode',`student_enroll_date`='$enroll',`student_enroll_exit_date`='$exit',`student_enroll_status`='$enstatus' WHERE `student_id`='$stid' AND `course_id`='$coid' AND `academic_year`= '$coid'";

            if(mysqli_query($con,$sql2))
            {
              echo "Record Updated Successfully";
            }
            else
            {
              echo "Error: ".$sql2. "<br>" . mysqli_error($con);
              //echo "Fill the required field";
            }
          }
    }
    // insert coding

    if(isset($_POST['Submit']))
     {
      //  echo 'stid'.$_POST['stid']; echo 'coid'.$_POST['coid'];echo 'mode'.$_POST['mode'];echo 'exdate'.$_POST['exdate'];
      //  echo 'ayear'.$_POST['ayear'];echo 'status'.$_POST['status'];echo 'edate'.$_POST['edate'];
       
      if(!empty($_POST['stid']) && !empty($_POST['coid']) && !empty($_POST['mode']) && !empty($_POST['ayear']) 
      && !empty($_POST['status']) && !empty($_POST['edate']) && !empty($_POST['exdate']))
        {
        //echo "SUCCESS";
        $stid=$_POST['stid'];
        $coid=$_POST['coid'];
        $mode=$_POST['mode'];
        $year=$_POST['ayear'];
        $enstatus=$_POST['status'];
        $enroll=$_POST['edate'];
        $exit=$_POST['exdate'];

          $sqlenroll = "INSERT INTO `student_enroll`(`student_id`,`course_id`,`course_mode`,`academic_year`,`student_enroll_date`,`student_enroll_exit_date`,
          `student_enroll_status`) VALUES ('$stid','$coid','$mode','$year','$enroll','$exit','$enstatus')";

            if(mysqli_query($con,$sqlenroll))
            {
              echo "Record Insert Successfully";
            }
            else
            {
            // echo "Error: ".$sqlstudent . "<br>" . mysqli_error($con);
              echo "Error: ".$sqlenroll . "<br>" . mysqli_error($con);
              //echo "Error: ".$sqlqualification . "<br>" . mysqli_error($con);
              //echo "Fill the required field";
            }
    }
  }

  if(isset($_GET['delete']))
{
    $stid=$_POST['stid'];
    $coid=$_POST['coid'];
    $sql = "DELETE FROM `student_enroll` WHERE `student_id`='$stid' and `course_id`='$coid'"; 
    if(mysqli_query($con,$sql))
    {
        echo "Recorde Delete Successfully";
    }
    else
    {
    echo "Error Deleteing Record: ". mysqli_error($con);
    }
}
?>

<div class="ROW">
        <div class="col text-center shadow p-5 mb-5 bg-white rounded ">
            <h1>Students ReEnrollment Information </h1>
            <h2>SLGTI</h2>
        </div>
    </div>

    <form class="needs-validation" action="" method="POST">

    <div class="form-row">
          <div class class="col-md-1"></div>
          <div class="col">
          <p style="font-size: 20px; font-weight: 700; border-bottom: 2px solid #aaa;">ENTROLLMENT</p>
          </div>  
    </div><BR>

    <div class="container">                 
      <div class="form-row">
        
        <div class="col-md-5 mb-3">
          <label for="coid"> Course Name : </label>
          <select name="coid" id="coid" class="custom-select" value="<?php echo $coid; ?>" onchange="showUser(this.value)" required>
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
        
        <div class="col-md-1 mb-3"></div>

        <div class="col-md-5 mb-3">
          <label for="type"> Academic Year : </label>
          <select name="ayear" id="ayear" class="selectpicker show-tick" data-live-search="true" data-width="100%" value="<?php echo $year; ?>" onchange="showUser(this.value)" required>
          <option selected disabled>--Academic Year--</option>
          <?php
            $sql = "SELECT * FROM `academic` ORDER BY `academic_year`  DESC ";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
            echo '<option  value="'.$row ['academic_year'].'" data-subtext="'.$row ['academic_year_status'].'"';
            if($row ["academic_year"] == $year)
            {
              echo 'selected';
            }
            echo '>'.$row ['academic_year'].'</option>';
            }
            }
            ?>
          </select>
        </div>

      </div>

      <div class="form-row">

        <div class="col-md-5 mb-3">
          <label for="mode"> Course Mode : </label>
          <select name="mode" id="mode" class="custom-select" value="<?php echo $mode; ?>" required>
            <option selected disabled> Course Mode </option>
              <option value="Full"<?php if($mode=="Full") echo 'selected';?>>Full Time</option> 
              <option value="Part"<?php if($mode == "Part") echo 'selected';?>>Part Time</option>
         </select>
        </div>
        

        <div class="col-md-1 mb-3"></div>

        <div class="col-md-5 mb-3">
          <label for="stid"> Student Id : </label>
          <select name="student_id" id="student_id" class="selectpicker show-tick" data-live-search="true" data-width="100%" value="<?php echo $stid; ?>">
          <option selected disabled>--Student Id--</option>
          <?php
            $sql = "SELECT * FROM `student_enroll` ORDER BY `student_id` DESC ";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) 
            {
              while($row = mysqli_fetch_assoc($result)){
                echo '<option  value="'.$row["student_id"].'" required>'.$row["student_id"].'</option>';
              }
              }else{
                echo '<option value="null"  selected disabled>-- 0 Position --</option>';
              }
            ?> 
        </select>
        </div>
      
      </div>

      <div class="form-row">

        <div class="col-md-5 mb-3">   
          <label for="edate"> ReEntroll Date : </label>
          <input type="date" class="form-control" id="edate" name="edate" value="<?php echo $enroll; ?>" placeholder="" aria-describedby="edatePrepend" required>
        </div>

        <div class="col-md-1 mb-3"></div>
   
        <div class="col-md-5 mb-3">
          <label for="exdate"> ReExit Date : </label>
          <input type="date" class="form-control" id="exdate" name="exdate" value="<?php echo $exit; ?>" placeholder="" aria-describedby="ExdatePrepend" required>
        </div>
  
      </div>  
      
      <div class="form-row">
      <div class="col-md-5 mb-3">
          <label for="status">Status:</label>
          <select name="status" id="status" class="custom-select" value="<?php echo $enstatus; ?>" >
            <option selected disabled>Choose Status</option>
              <option value="Following" <?php if($enstatus=="Following")  echo 'selected';?>>Following</option> 
              <option value="Completed" <?php if($enstatus == "Completed") echo ' selected';?>>Completed</option>
              <option value="Dropout"<?php if($enstatus=="Dropout") echo 'selected';?>>Dropout</option>
              <option value="Long Absent"<?php if($enstatus=="Long Absent") echo 'selected';?>>Long Absent</option>
          </select>
        </div>
      </div>

      <div class="col-md-3 mb-3"></div>

          <?php
              echo '<div class="btn-group-horizontal">';
              
              if((isset($_GET['stid'])) && (isset($_GET['coid'])))
              {
                
                echo '<button type="submit" value="Edit" name="Edit" class="btn btn-primary mr-2"><i class="fas fa-user-edit"></i>UPDATE</button>'; 
                echo '<button class="btn btn-sm btn-danger" value="delete" name="delete" data-toggle="modal" data-target="#confirm-delete"> <i class="fas fa-trash"></i> </button>';
              }
              else
              {
                echo '<button type="submit" value="Submit" name="Submit" onclick="addtable();" class="btn btn-primary mr-2"><i class="fas fa-user-plus"></i>ADD</button>';
                echo'<button type="reset" value="Reset" class="btn btn-primary mr-2"><i class="fas fa-redo"></i>REFRESH</button>';
              }
              echo '</div>';
      ?>  
    </div><BR><BR><BR>

    <div class="form-row">
          <div class class="col-md-1"></div>
          <div class="col">
          <p style="font-size: 20px; font-weight: 700; border-bottom: 2px solid #aaa;">ENTROLLMENT INFORMATION</p>
          </div>  
    </div><BR>

 <div class="table-row">
    <div class="col-md-09 mb-3">
    <table class="table table-sm table-hover" id="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">student Id</th>
            <th scope="col">Course Id</th>
            <th scope="col">Course Mode</th>
            <th scope="col">Accademic Year</th>
            <th scope="col">ReEnroll Date </th>
            <th scope="col">ReExit Date </th>
            <th scope="col">Enroll Status </th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
           $sql = "SELECT `student_id`, `course_id`,`course_mode`, `academic_year`, `student_enroll_date`, `student_enroll_exit_date`,`student_enroll_status` FROM `student_enroll`";
           $result = mysqli_query($con, $sql);
           if (mysqli_num_rows($result)>0)
           {
            $num=1;
               while($row = mysqli_fetch_assoc($result))
                 
                {
                   echo '
                   <tr style="text-align:left";>
                        <td scope="row">'.$num."<br>".'</td>
                        <td>'.$row["student_id"]."<br>".'</td>
                        <td>'.$row["course_id"]."<br>".'</td>
                        <td>'.$row["course_mode"]."<br>".'</td>
                        <td>'.$row["academic_year"]."<br>".'</td>
                        <td>'.$row["student_enroll_date"]."<br>".'</td>
                        <td>'.$row["student_enroll_exit_date"]."<br>".'</td>
                        <td>'.$row["student_enroll_status"]."<br>".'</td>
                        <td>
                        <a href="StudentReEnroll.php?stid='.$row["student_id"].'&&coid='.$row["course_id"].'&&ayear='.$row["academic_year"].'" class="btn btn-sm btn-success""><i class="far fa-edit"></i></a> |
                        <a href="Student_profile.php?Sid='.$row["student_id"].'" class="btn btn-info "> <i class="fas fa-angle-double-right"></i></td>
                   </tr>';
                  $num=$num+1;
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

<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","StudentReEnroll.php?q="+str,true);
  xmlhttp.send();
}
</script>




<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php 
include_once("footer.php"); 
?>