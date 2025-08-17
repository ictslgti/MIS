<!------START DON'T CHANGE ORDER HEAD,MANU,FOOTER----->
<!---BLOCK 01--->
<?php 
   
include_once("config.php");

$title ="STUDENT INFORMATION | SLGTI"; //YOUR HEAD TITLE CREATE VARIABLE BEFORE FILE NAME
include_once("head.php");
include_once("menu.php");

?>
<!----END DON'T CHANGE THE ORDER---->


<!---BLOCK 02--->
<!---START YOUR CODER HERE----->


<!-----END YOUR CODE----->
<!-- form start---->


<?php
//$stid = $_SESSION['user_name'];
$stid = $title = $fname = $ininame = $gender = $civil = $email = $nic = $dob = $phone = $address = $zip = $district = $division = $province = $blood = $mode =
$ename = $eaddress = $ephone = $erelation = $enstatus = $coid = $year = $enroll = $exit = $qutype = $index = $yoe = $subject = $results = $status = $id =null;
?>

<div class="ROW">
  <div class="col text-center shadow p-5 mb-5 bg-white rounded ">
  <h1 style="text-align:center"> SLGTI STUDENTS' INFORMATION </h1>
  </div>
</div>


<form method="GET">
  <div class="form-row form-inline">
      <div class="col-md-3 mb-3">
        <!-- <input type="text" class="form-control ml-3 w-75" placeholder="Student Id"  name="stid"> -->
        <select name="student_id" id="student_id" class="selectpicker show-tick ml-3 w-75" data-live-search="true" data-width="100%" value="">
          <option selected disabled>--Student Id--</option>
          <?php
            $sql = "SELECT * FROM `student` ORDER BY `student_id` DESC ";
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
        <button  type="submit" class="btn btn-outline-thead-light  form-control form-control-sm rounded-pill" name="search" ><i class="fas fa-search"></i></button>
      </div>
      <div class="col-md-5 mb-3"></div>

      <div class="col-md-4 mb-3" style="margin-right:0px;">
        <a href="AddStudent.php"><button type="button" class="btn btn-primary mr-2"><i class="fas fa-user-plus"></i></button><a>
        <select name="status" id="status" class="custom-select" value="" >
            <option selected disabled>Choose Student Status</option>
            <?php
            $sql = "SELECT DISTINCT `student_enroll_status` FROM `student_enroll`;";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) 
            {
              while($row = mysqli_fetch_assoc($result)){
                echo '<option  value="'.$row["student_enroll_status"].'" required>'.$row["student_enroll_status"].'</option>';
              }
              }else{
                echo '<option value="null"  selected disabled>-- 0 Position --</option>';
              }
            ?> 
        </select> 
        <button  type="submit" class="btn btn-outline-thead-light  form-control form-control-sm rounded-pill" name="search2" ><i class="fas fa-search"></i></button>
      </div>
  </div>
</form>

<div class="form-row">
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col"> Student Id </th>
          <th scope="col"> Student Full Name </th>
          <th scope="col"> Email </th>
          <th scope="col"> NIC </th>
          <th scope="col"> Phone No </th>
          <th scope="col"> Address </th>
          <th scope="col"> Action </th>
        </tr>
      </thead>
      <tbody>
      <?php
          if(isset($_GET['search'])) 
          {
          if(isset($_GET['student_id']))
          {
            $id=$_GET['student_id'];
          $sql="SELECT `student_id`,`student_fullname`,`student_email`, `student_nic`,`student_phone`, `student_address` FROM `student` WHERE student_id='$id'";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result)==1)
          {
            $num=1;
            while($row = mysqli_fetch_assoc($result))
            {
              echo '
              <tr style="text-align:left";>
                <td scope="row">'.$num."<br>".'</td>
                <td>'. $row["student_id"]."<br>".'</td>
                <td>'. $row["student_fullname"]."<br>".'</td>
                <td>'. $row["student_email"]."<br>".'</td>
                <td>'. $row["student_nic"]."<br>".'</td>
                <td>'. $row["student_phone"]."<br>".'</td>
                <td>'. $row["student_address"]."<br>".'</td>
                <td>
                <a href="AddStudent.php?edit='.$row["student_id"].'" class="btn btn-sm btn-success""><i class="far fa-edit"></i></a> |
                <a href="Student_profile.php?Sid='.$row["student_id"].'" class="btn btn-info"> <i class="fas fa-angle-double-right"></i>
                </td>
              </tr> ';
              $num=$num+1;
              
            }
          }
            echo '<button type="submit" value="inactive" name="back" class="btn btn-info mr-2"><i class="fas fa-angle-double-left"></i>Back</button>';
          }
          else
          {
            echo '<button type="submit" value="inactive" name="back" class="btn btn-info mr-2"><i class="fas fa-angle-double-left"></i>Back</button>';
            echo  '<div class="alert alert-info" role="alert"> Incorrect Student Id! Please enter Correct Id </div>';
          }
          }
        
          else if(isset($_GET['search2']))
          {
            if(isset($_GET['status']))
            {
            $status = $_GET['status'];
            $sql="SELECT * FROM `student` WHERE `student_id` in (select student_id from student_enroll where student_enroll_status='$status')";  
            $result = mysqli_query($con,$sql);
            if (mysqli_num_rows($result)>0)
            {
              $num=1;
              while($row = mysqli_fetch_assoc($result))
              {
                echo '
                <tr style="text-align:left";>
                  <td scope="row">'.$num."<br>".'</td>
                  <td>'. $row["student_id"]."<br>".'</td>
                  <td>'. $row["student_fullname"]."<br>".'</td>
                  <td>'. $row["student_email"]."<br>".'</td>
                  <td>'. $row["student_nic"]."<br>".'</td>
                  <td>'. $row["student_phone"]."<br>".'</td>
                  <td>'. $row["student_address"]."<br>".'</td>
                  <td>
                  <a href="AddStudent.php?edit='.$row["student_id"].'" class="btn btn-sm btn-success""><i class="far fa-edit"></i></a> |
                  <a href="Student_profile.php?Sid='.$row["student_id"].'" class="btn btn-info"> <i class="fas fa-angle-double-right"></i>
                  </td>
                </tr> ';
                $num=$num+1;
              }
            }
            else
            {
              //echo "0 results";
              echo  '<div class="alert alert-info" role="alert"> No Students </div>';
            }
          }
          } 
          else
          {
          $sql ="SELECT s.student_id,student_title,student_fullname,student_ininame,student_gender,student_email,student_nic,student_dob,student_phone,student_address 
          FROM student s inner join student_enroll e on s.student_id=e.student_id and student_status='Active' and student_enroll_status='Following'";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result)>0)
          {
            $num=1;
            while($row = mysqli_fetch_assoc($result))
            {
              echo '
              <tr style="text-align:left";>
                  <td scope="row">'.$num."<br>".'</td>
                  <td>'. $row["student_id"]."<br>".'</td>
                  <td>'. $row["student_fullname"]."<br>".'</td>
                  <td>'. $row["student_email"]."<br>".'</td>
                  <td>'. $row["student_nic"]."<br>".'</td>
                  <td>'. $row["student_phone"]."<br>".'</td>
                  <td>'. $row["student_address"]."<br>".'</td>
                  <td>
                  <a href="AddStudent.php?edit='.$row["student_id"].'" class="btn btn-sm btn-success""><i class="far fa-edit"></i></a> |
                  <a href="Student_profile.php?Sid='.$row["student_id"].'" class="btn btn-info"> <i class="fas fa-angle-double-right"></i>
                  </td>
              </tr> ';
              $num=$num+1;
            }
          }
          else
          {
            //echo "0 results";
            echo  '<div class="alert alert-info" role="alert"> No Students Following & Active </div>';
          }
          }
          
          ?>
      </tbody>
    </table>
</div>
</div>
<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php 
include_once("footer.php"); 
?>