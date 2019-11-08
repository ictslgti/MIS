<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->
<?php
date_default_timezone_set("Asia/colombo");

  $s_id =  $_SESSION['user_name'];
  $u_type =  $_SESSION['user_type'];

  $student_id=$name= $dept=$tel=$date=$time=$ref=null;
  if($_SESSION['user_type']=='STU'){
    $sql ="SELECT 
    `hostel_student_details`.`student_id`,
    `student`.`student_fullname`,
    `department`.`department_name`
   FROM `hostel_student_details`
    LEFT JOIN `student` ON `hostel_student_details`.`student_id`=`student`.`student_id` 
    LEFT JOIN `department` ON `department`.`department_id`=`hostel_student_details`.`department_id` WHERE `hostel_student_details`.`student_id` = '$s_id'";
    $result = mysqli_query($con ,$sql);
   if(mysqli_num_rows($result)== 1){
    $row = mysqli_fetch_assoc($result);
    $student_id = $row['student_id'];
    $name = $row['student_fullname'];
    $dept = $row['department_name'];
    
     

   }

  }

?>
<?php
          
          if(isset($_GET['rta'])){
         
           
            $tel =$_GET['tel'];
             $date =$_GET['dat'];
             $time =$_GET['tim'];
            $ref =$_GET['rfe'];
                                                                              
            
            
            $sql= "INSERT INTO `off_peak` (`student_id`, `name_of_applicant`, `department`, `contact_no`, `date`, `time`, `reson_for_exit`, `warden's_comment`, `status`) 
            VALUES (' $student_id', '$name', '$dept', '$tel', '$date', '$time', ' $ref', '', 'Pending')";
            if(mysqli_query($con,$sql)){
              echo
              '<div class="alert alert-success">
              <strong>Success!</strong> Your data was inserted.</a>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>';
            }else{
              echo '<div class="alert alert-warning">
              <strong>Warning!</strong> Invalid data. Please Check Your Data !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
              </button>
            </div>';
            }
           }
    
          
        
          ?>
  
<br><br>
    <form>
      <div class="intro container-fluid shadow p-3 mb-5 bg-white rounded" >
      <div class="shadow p-3 mb-5 bg-white rounded"> 
    <h4 class="display-4 text-center "><i class="fas fa-file-alt"></i>   Student Off-Peak Request</h4>
    </div>
    <hr class="my-1">
   
  <form method="GET">
  <div class="form-row">
    <div class="col-md-4 col-sm-12" >
    <br>
     
      <label for="text" class="font-weight-bolder" >Name of applicant :</label><br>
      <input type="text" class="form-control" id="noa" name="name" value="<?php if($_SESSION['user_type']=='STU') echo $name;?>" placeholder="You can't access this!" disabled>
     
    </div>
    
    <div class="col-md-4 col-sm-12" >
    <br>
    
    <label for="text" class="font-weight-bolder" >Registration No :</label><br>
    <input type="text" class="form-control" value="<?php if($_SESSION['user_type']=='STU') echo $student_id;?>" id="rno" name="rno" placeholder="You can't access this!" disabled>
    </div>
    
    <div class="col-md-4 col-sm-12" >
    <br>
    
    <label for="text" class="font-weight-bolder"  >Department :</label><br>
    <input type="text" class="form-control" id="dept" name="dept" value="<?php if($_SESSION['user_type']=='STU') echo $dept;?>" placeholder="You can't access this!" disabled>
    </div>
    </div>
    <div class="form-row">
    <div class="col-md-4 col-sm-12" >
    <br>
   <label for="text" class="font-weight-bolder"  >Contact No :</label><br>
    <input type="tel" id="tel"  pattern="[0-9]{10}" class="form-control" name="tel" placeholder=""  required >
    </div>
    
    
    <div class="col-md-4 col-sm-12" >
    <br>
   <label for="date" class="font-weight-bolder"  >Date :</label><br>
   <input type="date" id="dath"  name="dath"  value ="<?php echo date("Y-m-d"); ?>" class="form-control" placeholder="" disabled>
    <input type="hidden" id="dat"  name="dat"  value ="<?php echo date("Y-m-d"); ?>" class="form-control" placeholder="" >
    </div>
    <div class="col-md-4 col-sm-12" >
    <br>
   <label for="date" class="font-weight-bolder"  >Time :</label><br>
    <input type="time" id="timh" name="timh"  value ="<?php echo date("H:i"); ?>" class="form-control" placeholder=""   required disabled>
    <input type="hidden" id="tim" name="tim"  value ="<?php echo date("H:i"); ?>" class="form-control" placeholder=""   required >
    </div>
   
    <div class="col-12" >
    <br>
    <label for="exampleFormControlTextarea1" class="font-weight-bolder" >Reason for exit :</label><br>
    <textarea name="rfe" class="form-control form-control-lg " id="rfe" rows="3"   required></textarea>
    </div>


    <div class="row">
    <div class="col-md-7 col-sm-12 ">
    <br> <br>
   
    <button type="submit" id="rta" name="rta" class="btn btn-primary btn-md" <i class="fas fa-paper-plane"></i> Request to approval</button>
    </div>
    
   
    
    <div class="col-md-3 col-sm-12">
    <br><br>
    <button type="button" class="btn btn-secondary btn-md " onclick="document.getElementById('rfe').value = '';document.getElementById('tel').value = '';">Clear </button>

</div>
    <div class="col-md-1 col-sm-12">
    <br><br>
    <button type="button" class="btn btn-info btn-md " onclick="window.location.href='off-peak-archives.php'">Archives</button>
    </div>

   

   


   
    </div>
    </div>
    <br>
    
    </div>
    
   </form>
</form>








<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->