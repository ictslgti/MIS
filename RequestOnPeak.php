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
 ?>
<!--END DON'T CHANGE THE ORDER--> 

<!--BLOCK#2 START YOUR CODE HERE -->

<!--insert Code-->
<?PHP
if(isset($_POST['req'])){
    
  if(!empty($_POST['student_id'])
    &&!empty($_POST['department_id'])
    &&!empty($_POST['contact_no'])
    &&!empty($_POST['reason'])
    &&!empty($_POST['exit_date'])
    &&!empty($_POST['exit_time'])
    &&!empty($_POST['return_date'])
    &&!empty($_POST['return_time'])
    &&!empty($_POST['comment'])){

     
      $student_id=$_POST['student_id'];
      $department_id=$_POST['department_id'];
      $contact_no=$_POST['contact_no'];
      $reason=$_POST['reason'];
      $exit_date=$_POST['exit_date'];
      $exit_time=$_POST['exit_time'];
      $return_date=$_POST['return_date'];
      $return_time=$_POST['return_time'];
      $comment=$_POST['comment'];
      
     
    
       $sql= "INSERT INTO `onpeak_request`(`student_id`,`department_id`, `contact_no`, `reason`, `exit_date`, `exit_time`, `return_date`, `return_time`, `comment`) 
       VALUES ('$student_id','$department_id','$contact_no','$reason','$exit_date','$exit_time','$return_date','$return_time','$comment')";

      if(mysqli_query($con,$sql))
      {
        echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>'.$student_id.'</strong> Request Submitted 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>    
            ';
       // echo "insert successfully";
    } else {
        echo "Error deleting record: " . 	mysqli_error($con);
    }

    }
    }
?> 

<!--Delete Code-->

<?php
        
         if(isset($_GET['delete'])) {
        $id = $_GET ['delete'];
        $sql = "DELETE FROM onpeak_request where `id` = $id "; 
        if(mysqli_query($con,$sql)) {
         echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong> Record deleted successfully </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>    
            ';
        
        } else {
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            . echo "Error deleting record :".$sql."<br>".mysqli_error($con);
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            ';
            //echo "Error deleting record : ". mysqli_error($con);
        }
    }
?>




<!--Form Deign Start-->
<br>
<form method="post" >  
<div class="row border border-light shadow p-3 mb-5 bg-white rounded">
          <div class="col">
          <br>
          <br>
            <blockquote class="blockquote text-center">
                <h1 class="display-4">On peak Request</h1> 
                <p class="mb-0">Department of Information and Communication Technology</p>
                <footer class="blockquote-footer">Temporary Exit Application<cite title="Source Title"></cite></footer>
            </blockquote>
          </div>
</div>

<!-- card start here-->

<div class="border border-light shadow p-3 mb-5 bg-white rounded" > 
<br>    
<div class="table container">    
    <div class="container">
   
        <div class="intro">

        

<br>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01"> 
                            <i class="fas fa-fingerprint"> </i>&nbsp;&nbsp;Registration No&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    <input class="form-control" name="student_id" type="text" >
                 </div> 

<br>       

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">
                            <i class="fas fa-school"></i>&nbsp;&nbsp;Department ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    <select class="browser-default custom-select" name="department_id"    required>
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
                    <input class="form-control" name="contact_no" type="text" placeholder="Mobile or Home number">
                </div>

<br>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">
                            <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Reason for Exit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="reason">
                        <option selected>Choose...</option>
                        <option >Hospital </option>
                        <option >Family issues </option>
                        <option >Other Reasons</option>
                    
                    </select>
                </div>

<br>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01"> 
                        <i class="far fa-calendar-alt"></i>&nbsp;&nbsp;Exit Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    
                    <input class="form-control" type="date" name="exit_date">
                    
                </div>

<br>

                <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"> 
                                    <i class="far fa-clock"> </i>&nbsp;&nbsp;Exit Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            </div>
                            
                            <input class="form-control" type="time" name="exit_time">
                </div>

<br>

                <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"> 
                                <i class="fas fa-calendar-check"></i>&nbsp;&nbsp;Return Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            </div>
                            
                            <input class="form-control" type="date" name="return_date">
                </div>

<br>

                <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"> 
                                    <i class="fas fa-history"> </i>&nbsp;&nbsp;Return Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            </div>
                            
                            <input class="form-control" type="time" name="return_time">
                </div>

<br>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Comment : </label>
                        <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>


<br>
        
                    <div class=row>
                        <div class="col">
                            <blockquote class="blockquote text-center">
                                <p class="mb-0">I have read and understand the terms and conditions. I have agreed by the abide by the rules and regulations of SLGTI.</p>
                            </blockquote>
                        </div>
                    </div>

<br>
      
                    <div class="row">
                        <div class="col">
                            <div class="mx-auto" style="width: 200px;">
                              <button type="submit" class="btn btn-primary " name="req"> <i class="fab fa-telegram"></i>&nbsp;&nbsp;&nbsp;Request to approval</button>  
                            <!-- <input type="submit" name="req" class="btn btn-primary " > -->
                            </div>
                        </div>
                    </div>

<br>

                    <div class="row">
                        <div class="col">
                            <div class="mx-auto" style="width: 200px;">
                            <button type="button" name="reset" class="btn btn-secondary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-redo-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Reset
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                                        
                            </div>
                        </div>
                    </div>
       
       
               

</div>
</div>
</div>
</div>

<div class="border border-light shadow p-3 mb-5 bg-white rounded" >
    <div class="col">
        <blockquote class="blockquote text-center">
            <p class="mb-0">Terms and Conditions of SLGTI </p>
            <footer class="blockquote-footer">This request must be approved by the HOD and Warden, when students want to exit SLGTI during school hours/ on peak (8.15 am - 4.15 pm)  <cite title="Source Title"></cite></footer>
            <footer class="blockquote-footer">Please note that you fail with in the jurisdiction of the code of conduct and honor for off-campus conduct. <cite title="Source Title"></cite></footer>
            <footer class="blockquote-footer">Please indicate the reason for your temporary exit in the box above, state the date and seek for approval by your HEAD of the Department (HoD). <cite title="Source Title"></cite></footer>
        </blockquote> 
    </div>
</div>



    <div class="border border-light shadow p-3 mb-5 bg-white rounded" > 
      <div class="col">
        <div class=row>
            <div class="col">
                <br>
                <br>
                <div class="pr-5 pl-2 ml-auto text-info">History</div>
                <br>
                <br>
            </div>
        </div>
        
        

      <div class=row >
        <table class="table table-hover">
            <thead>
                  <tr>
                    <th scope="col">EXIT DATE</th>
                    <th scope="col">EXIT TIME</th>
                    <th scope="col">RETURN DATE </th>
                    <th scope="col">RETURN TIME</th>
                    <th scope="col">REASON FOR EXIT</th>
                    <th scope="col">REFERENCE</th>
                    <th scope="col">status</th>
                    </tr>
            </thead>

            <?php
                 $sql = "SELECT * FROM `onpeak_request`";
                 $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                 while($row = mysqli_fetch_assoc($result)) {

                echo '
                 <tr>
                    <td>'. $row["exit_date"].'</td>
                    <td>'. $row["exit_time"]. '</td>
                     <td>'. $row["return_date"].'</td>
                    <td>'. $row["return_time"]. '</td>
                     <td>'. $row["reason"]. '</td>
                     <td>'. $row["onpeak_request_status"]. '</td>
                    <td> <pre> '. $row["request_date_time"]. ' </pre> </td>
                    <td> 
                        <a href="RequestOnpeakEdit.php?edit='.$row["id"].'"> <button type="button" class="btn btn-warning"> Edit </button> </a>  
                        <a href="?delete='. $row["id"].'"> <button type="button" class="btn btn-danger"> Delete </button> </a>
                     </td>
                 </tr>
                 ';
                  }
                 } else {
                     echo "No more Requests";
                }
            ?>
           
        </table> 
    </div>



   
    </div>
</div>
</form>






<!--END OF YOUR COD-->
 <!-- <?php //} ?> -->
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->  
