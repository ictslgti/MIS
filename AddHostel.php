<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<!-- <h1 class="text-center">SLGTI Hostel Management</h1>
<p  class="text-center display-4"  style="font-size:25px;">Welcome to SLGTI Hostel Management <br> -->




          <!-- Content here -->
          
          <?php
          
        if(isset($_POST['allo'])){
         
        
        
          
          $id=$_POST['id'];
          
          $dept =$_POST['dept'];
         
          $dis =$_POST['dis'];
        
          $block =$_POST['block'];
          $room =$_POST['room'];
          $date =$_POST['date'];
          $leave =$_POST['leave'];
          $sql= "INSERT INTO `hostel_student_details` (`student_id`,  `department_id`,  `distance`,  `block_no`, 
          `room_no`, `date_of_addmission`, `date_of_leaving`) VALUES ('$id', '$dept',   '$dis',  '$block', '$room', '$date', '$leave')";
          if(mysqli_query($con,$sql)){
            echo
            '<div class="alert alert-success">
            <strong>Success!</strong> Your data was inserted.</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>';
          }else{
              echo '<div class="alert alert-warning">
              <strong>Warning!</strong> Invalid data. Please Check Your Data !
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>';
          }
        }
  
        
      
        ?>

        <?php
        $student_id=$name=$dept=$addr =$dist =$dis =$title = $block =$room =$date =$leave =null;
        if(isset($_GET['edit'])){
          $student_id = $_GET['edit'];
          $sql ="SELECT * FROM `hostel_student_details` WHERE `student_id` = '$student_id'";
          $result = mysqli_query($con ,$sql);
         if(mysqli_num_rows($result)== 1){
              $row = mysqli_fetch_assoc($result);
              $student_id = $row['student_id'];
              
              $dept = $row['department_id'];
              
              
              $dis = $row['distance'];
             
              $block = $row['block_no'];
              $room = $row['room_no'];
              $date = $row['date_of_addmission'];
              $leave = $row['date_of_leaving'];
              
              
          }
      }
      ?>
      <?php
       
        if(isset($_POST['upt'])){
           
           $student_id = $_GET['edit'];
          
           $dept =$_POST['dept'];
          
           $dis =$_POST['dis'];
          
           $block =$_POST['block'];
           $room =$_POST['room'];
           $date =$_POST['date'];
           $leave =$_POST['leave'];
         
          $sql = "UPDATE `hostel_student_details` 
          SET 
          `department_id` = '$dept',
          `distance` = ' $dis',`block_no` = ' $block',`room_no` = ' $room',
          `date_of_addmission` = ' $date',`date_of_leaving` = ' $leave'
          WHERE `hostel_student_details`.`student_id` = '$student_id'";
        
          if(mysqli_query($con,$sql)){
            echo
            '<div class="alert alert-success">
            <strong>Success!</strong> Your data was Updated.</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>';
          }else{
            echo '<div class="alert alert-warning">
            <strong>Warning!</strong> Invalid data. Please Check Your Data !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>';
          }
      }
   


        ?>
        

          <br>
          <div class="shadow p-3 mb-5 bg-white rounded">
        
            <blockquote class="blockquote ">
                <p class="display-4 text-center" >Hostel Management System</p>
                <footer class="blockquote-footer text-center"">Hostel Allocation <cite title="Source Title"></cite></footer>
            </blockquote>
        
</div>
        
     
<div class="row">

<div class=" col-sm-6 mt-4">
<small class="h5" >Hostel Accomadation </small>

</div>
<div class="col-sm-3 " > 

<form class="form-inline md-form form-sm mt-4 ">
 
 
</form>
</div>
</div>
<div class="row">

<div class="col-sm-12" >

<hr  >
</div>

</div>



<div class="form-row">
       
       <div class="form-group col-md-4 ">
      
<form method="POST">
<label for="id"><i class="fas fa-user-graduate"></i> Student ID&nbsp;</label> <br>
  <input type="text" class="form-control " id="id" value="<?php echo $student_id; ?>" name="id" required <?php if(isset($_GET['edit'])) echo 'disabled'; ?>  >


      
       </div>
       <div class="form-group col-md-2  ">
       <label for="dis"><i class="fas fa-map-signs"></i>&nbsp;Department id :
             <label class="note" style="font-size: 13px; margin-bottom: 0; color:#aaa;padding-left: 14px;"></label>
            </label>
            <input type="text" class="form-control" id="dept" value="<?php echo $dept; ?>" name="dept" placeholder=""  required>
       </div>
       
    
       
       <div class="form-group col-md-2  ">
       <label for="dis"><i class="fas fa-map-signs"></i>&nbsp;Distance
             <label class="note" style="font-size: 13px; margin-bottom: 0; color:#aaa;padding-left: 14px;">Home to SLGTI </label>
            </label>
            <input type="text" class="form-control" id="dis" value="<?php echo $dis; ?>" name="dis" placeholder="in km"  required>
       </div>
       
       <div class="form-group col-md-2  ">
       <label for="hostel"><i class="fas fa-list-ol"></i>&nbsp; Block No:</label>
        
        <input type="text" class="form-control" id="block"value="<?php echo $block; ?>" name="block"  required>
       </div>
       </div>

       
<div class="form-row">

<div class="form-group col-md-2  ">
<label for="hostel"><i class="fas fa-list-ol"></i>&nbsp; Room No:</label>
        
        <input type="text" class="form-control" id="room" value="<?php echo $room; ?>" name="room"  required>
        </div>
        

        
        <div class="col-md-3">
        <label for="add"><i class="fas fa-calendar-alt"></i>&nbsp;Date of Addmission</label>
            <input type="date" class="form-control" id="add" value="<?php echo $date;  ?>" name="date" placeholder="" min="<?php echo  $min = date("Y-m-d"); ?>" required>
          </div>

          <div class="col-md-3">
          <label for="leave"><i class="fas fa-calendar-alt"></i>&nbsp;Date of Leaving</label>
            <input type="date" class="form-control" id="leave" value="<?php echo $leave; ?>" name="leave" placeholder="" min="<?php echo  $min = date("Y-m-d"); ?>" required>
          </div>

       </div>



         
        <div class="row">
    <div class="col-md-3 col-sm-12 ">
    <br> <br>
   
    <?php
 if(isset($_GET['edit'])){
  
      echo'<input type="submit" value="update" name="upt" class="btn btn-primary rounded-pill btn-block waves-effect">';

 }else{
  echo'<input type="submit" value="Allocation" name="allo" class="btn btn-primary rounded-pill btn-block waves-effect">';
 }
 
?>
    </div>
    
   
    
    <div class="col-md-3 col-sm-12">
    <br><br>
    <input type="reset" class="btn btn-outline-danger rounded-pill btn-block waves-effect  ">
        

</div>
</div>
   
</form>

</form>

          
        















<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
