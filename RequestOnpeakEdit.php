<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->  
<?php
$title = "Home | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 


//  $student_id = $_SESSION['user_name'];
//  $user_type = $_SESSION['user_type'];
//  echo $department_id = $_SESSION['department_code'];
//  if($user_type == 'ADM'){
    if($_SESSION['user_type']=='STU' ){
 ?>
<!--END DON'T CHANGE THE ORDER--> 

<!--BLOCK#2 START YOUR CODE HERE -->


<!--Update Code -->

<?php
        if(isset($_GET['edit'])) {
            $id = $_GET['edit'];
            $sql = "SELECT * FROM `onpeak_request` where `id` = $id";
            $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result)==1) {
                $row = mysqli_fetch_assoc($result);
                $student_id = $row['student_id'];
                $department_id = $row['department_id'];
                $contact_no = $row['contact_no'];
                $reason = $row['reason'];
                $exit_date = $row['exit_date'];
                $exit_time = $row['exit_time'];
                $return_date = $row['return_date'];
                $return_time = $row['return_time'];
                $comment = $row['comment'];
            }
        }



    if(isset($_POST['upt'])){
        if( !empty ($_POST['student_id'])&& 
            !empty ($_POST['department_id'])&&
            !empty ($_POST['contact_no'])&&
            !empty ($_POST['reason'])&&
            !empty ($_POST['exit_date'])&&
            !empty ($_POST['exit_time'])&&
            !empty ($_POST['return_date'])&&
            !empty ($_POST['return_time'])&&
            !empty ($_POST['comment'])
            ){
            $id = $_GET['edit'];
            $department_id = $_POST['department_id'];
            $contact_no = $_POST['contact_no'];
            $reason = $_POST['reason'];
            $exit_date = $_POST['exit_date'];
            $exit_time = $_POST['exit_time'];
            $return_date = $_POST['return_date'];
            $return_time = $_POST['return_time'];
            $comment = $_POST['comment'];
            $sql = "UPDATE `onpeak_request` 
                SET `department_id`='$department_id',
                `contact_no`='$contact_no',
                `reason`='$reason',
                `exit_date`='$exit_date',
                `exit_time`='$exit_time',
                `return_date`='$return_date',
                `return_time`='$return_time',
                `comment`='$comment'
                 WHERE `onpeak_request`. `id`= $id";
            if (mysqli_query($con, $sql)) {
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> <h5>  Your Request is Update Successfully </h5> </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>    
                ';
                //echo " New record Updated";
            } else {
                 //echo " Error : ". $sql . 
                //"<br>" . mysqli_error($con);
                echo '  
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> <h5> Fill out the empty Field then update the request </h5> </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ' ;
            }
     }

    }
?>


<br>
<form method="post" >  
<div class="row border border-light shadow p-3 mb-5 bg-white rounded">
          <div class="col">
          <br>
            <blockquote class="blockquote text-center">
                <div class="alert alert-warning" role="alert">
                   <strong> Onpeak Request Update View </strong>
                </div>
            </blockquote>
          </div>
</div>

<!-- card start here-->

<div class="border border-light shadow p-3 mb-5 bg-white rounded" > 
<div class="container">
<div class="row no-gutters">

            <div class="col-12 col-sm-6 col-md-8">
            <div class="intro">
<br>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01"> 
                            <i class="fas fa-fingerprint"> </i>&nbsp;&nbsp;Registration No&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    <input class="form-control" value="<?php echo $student_id;?>" name="student_id" type="text" required>
                 </div> 

<br>       

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">
                            <i class="fas fa-school"></i>&nbsp;&nbsp;Department ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    <select class="browser-default custom-select" value="<?php echo $department_id;?>" name="department_id"    required>
                       <option value="1"> Select the Department ID </option> 
                                <?php
                                    $sql="select * from `department`";
                                    $result = mysqli_query($con,$sql);
                                    if (mysqli_num_rows($result) > 0 ) {
                                    while($row=mysqli_fetch_assoc($result)){
                                    echo '<option  value="'.$row["department_id"].'" required>'.$row["department_id"].'</option>';
                                    }}   
                                ?>
                    </select>
                </div>


 
<br>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01"> 
                            <i class="fas fa-phone-alt"> </i>&nbsp;&nbsp;Contact no&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    <input class="form-control" value="<?php echo $contact_no;?>" name="contact_no" type="text" placeholder="Mobile or Home number" required>
                </div>

<br>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">
                            <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Reason for Exit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" value="<?php echo $reason;?>" name="reason" required>
                        <option selected>Choose...</option>
                        <option <?php if($reason == "Hospital") echo "Selected"; ?> >Hospital </option>
                        <option <?php if($reason == "Family issues") echo "Selected"; ?> >Family issues </option>
                        <option <?php if($reason == "Other Reasons") echo "Selected"; ?> >Other Reasons</option>
                    
                    </select>
                </div>

<br>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01"> 
                        <i class="far fa-calendar-alt"></i>&nbsp;&nbsp;Exit Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    
                    <input class="form-control" type="date" value="<?php echo $exit_date;?>" name="exit_date" required>
                    
                </div>

<br>

                <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"> 
                                    <i class="far fa-clock"> </i>&nbsp;&nbsp;Exit Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            </div>
                            
                            <input class="form-control" type="time" value="<?php echo $exit_time;?>" name="exit_time" required>
                </div>

<br>

                <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"> 
                                <i class="fas fa-calendar-check"></i>&nbsp;&nbsp;Return Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            </div>
                            
                            <input class="form-control" type="date" value="<?php echo $return_date;?>" name="return_date" required>
                </div>

<br>

                <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"> 
                                    <i class="fas fa-history"> </i>&nbsp;&nbsp;Return Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            </div>
                            
                            <input class="form-control" type="time" value="<?php echo $return_time;?>" name="return_time" required>
                </div>

<br>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Comment : </label>
                        <textarea  class="form-control" value="" name="comment" id="exampleFormControlTextarea1" rows="3" required><?php echo $comment;?></textarea>
                    </div>



        
                    <div class=row>
                        <div class="col">
                            <blockquote class="blockquote text-center">
                                <p> I have read and understand the terms and conditions. I have agreed by the abide by the rules and regulations of SLGTI.</p>
                            </blockquote>
                        </div>
                    </div>

<br>
      
                    <div class="row">
                        <div class="col">
                            <div class="mx-auto" style="width: 200px;">

                                <?php
                                    if (isset($_GET['edit'])) {
                                        echo '<button type="submit" class="btn btn-primary " name="upt"> <i class="fab fa-telegram"></i>&nbsp;&nbsp;&nbsp;Update the Request</button>';
                                    } else {
                                        echo '<input type="submit" name="Add" value="Add" >';
                                            }
                                ?>
                             <!-- <button type="submit" class="btn btn-primary " name="req"> <i class="fab fa-telegram"></i>&nbsp;&nbsp;&nbsp;Update the Request</button> --> 
                            <!-- <input type="submit" name="req" class="btn btn-primary " > -->


                            </div>
                        </div>
                    </div>

<br>
                    <div class="row">
                        <div class="col">
                            <div class="mx-auto" style="width: 200px;">
                               <strong> <a href= "RequestOnPeak.php"> 
                               <!-- <button type="submit" class="btn btn-secondary" name="back">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fas fa-arrow-circle-left"></i> 
                                &nbsp;&nbsp;&nbsp;back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </button> --> <h6> <<<<<< back <<<<<<< </h6> </a>
                                </strong>
                            </div>
                        </div>
                    </div>

            </div>
            </div>



                    <div class="col-6 col-md-4 ">
                    <div class="table container  "> 
                    <div class="container ">
                    <div class="row mx-auto " >
          
                        <div class="card shadow-sm p-3 mb-5 bg-white rounded" style="width: 18rem;" >
                            <div class="card-body">
                                <h5 class="card-title">Leave of Absence </h5>
                                <p class="card-text">A LOA is an extended period of time off from their studies. 
                                 there may be a formal process you need to follow to get approved for a leave.</p>
                            </div>
                        </div>
          

          
                        <div class="card shadow-sm p-3 mb-5 bg-white rounded" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Time Schedule</h5>
                                <p class="card-text">This form must be submitted to the guards, when students wants to exit SLGTI during scgool hours/ on peak (8.15 am- 4.15 pm)</p>
                            </div>
                        </div>
          

          
                        <div class="card shadow-sm p-3 mb-5 bg-white rounded" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Jurisdiction of the Code</h5>
                                <p class="card-text">Please note that students fail within the jurisdiction of the code of conduct and honor for off-campus conduct.</p>
                            </div>
                        </div>
          
                    </div>
                    </div>
                    </div>
                    </div>


</div>   
</div>
<br>
<br>
</div>
</form>






<!--END OF YOUR COD-->
<?php } ?> 
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->  
