<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->  
<?php
$title = "onpeak&offpeak | SLGTI";
include_once("../config.php");
include_once("../head.php");
include_once("../menu.php");

 if($_SESSION['user_type']!='STU'){
 ?>
<!--END DON'T CHANGE THE ORDER--> 

<!--BLOCK#2 START YOUR CODE HERE -->
   <!-- Content here -->

   <?php
   if (isset($_POST['approved'])) {
     $id = mysqli_real_escape_string($con, $_POST['approved']);
     $sql = "UPDATE `onpeak_request` SET `onpeak_request_status`='Approved' WHERE `id`='$id'";
     if (mysqli_query($con, $sql)) {
       echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Request approved.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
     } else {
       echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Error: '.htmlspecialchars(mysqli_error($con)).'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
     }
   }

   ?>


   <?php
   if (isset($_POST['NotApproved'])) {
     $id = mysqli_real_escape_string($con, $_POST['NotApproved']);
     $sql = "UPDATE `onpeak_request` SET `onpeak_request_status`='Not Approved' WHERE `id`='$id'";
     if (mysqli_query($con, $sql)) {
       echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Request not approved.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
     } else {
       echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Error: '.htmlspecialchars(mysqli_error($con)).'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
     }
   }

   ?>


   <br>     
        <div class="row border border-light shadow p-3 mb-5 bg-white rounded">
          <div class="col">
          <br>
            <blockquote class="blockquote text-center">
                <h1 class="display-4">On peak</h1> 
                <p class="mb-0">Department of Information and Communication Technology</p>
                <footer class="blockquote-footer">Head of the Department<cite title="Source Title"></cite></footer>
            </blockquote>
          </div>
        </div>



<br>

    <div class="border border-light shadow p-3 mb-5 bg-white rounded" > 
      <div class="col">
        <div class=row>
            <div class="col">
                <br>
                <br>
                <nav class="navbar navbar-light bg-light">
                        <form class="form-inline">
                        <div class="pr-5 pl-2 ml-auto text-info"> <h6> <strong> Pending Requests </strong> </h6> </div>
                       </form>
                </nav>
                <br>
            </div>
        </div>
        
        

      <div class=row >
        <table class="table table-hover">
            <thead class="thead-dark">
                  <tr>
                    <th scope="col">REGISTRATION NO </th>
                    <th scope="col"> CONTACT NO </th>
                    <th scope="col">EXIT DATE</th>
                    <th scope="col">EXIT TIME</th>
                    <th scope="col">RETURN DATE</th>
                    <th scope="col">RETURN TIME</th>
                    <th scope="col">COMMENT</th>
                    <th scope="col">ACTION</th>
                    <th scope="col"></th>
                    
                  </tr>
            </thead>
           
             <?php
                // Replaced stored procedure call with direct SELECT to avoid DEFINER errors
                $sql = "SELECT id, student_id, contact_no, exit_date, exit_time, return_date, return_time, comment, request_date_time, onpeak_request_status FROM onpeak_request WHERE onpeak_request_status='Pending' ORDER BY id DESC";
                $result = mysqli_query($con, $sql);
                if ($result && mysqli_num_rows($result) > 0) {
                 while($row = mysqli_fetch_assoc($result)) {

                echo '
                <tbody> 
                <tr>
                    <th scope="row">'. $row["student_id"].'</th>
                    <td>'. $row["contact_no"]. '</td>
                    <td>'. $row["exit_date"]. '</td>
                    <td>'. $row["exit_time"]. '</td>
                    <td>'. $row["return_date"].'</td>
                    <td>'. $row["return_time"]. '</td>
                    <td>'. $row["comment"]. '</td>
                    
                    <td> 
                    <form method="POST">
                        
                        <button type="submit" class="btn btn-outline-primary" value="'.$row["id"].'" name="approved">Approved</button>
                        <button type="submit" class="btn btn-outline-danger"  value="'.$row["id"].'" name="NotApproved">Not Approved</button>  
                         
                     </td>
                     </form>
                     <td> <pre> '. $row["request_date_time"]. ' </pre> </td>
                 </tr> 
                 </tbody>
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


 
  <div class="border border-light shadow p-3 mb-5 bg-white rounded" > 
      <div class="col">
        <div class=row>
            <div class="col">
                <br>
                <br>
                 <nav class="navbar navbar-light bg-light">
                        <form class="form-inline">
                        <div class="pr-5 pl-2 ml-auto text-info"> <h6> <strong>  History  </strong> </h6> </div>
                       
                        </form>
                </nav>
                <br>
            </div>
        </div>
        





  </div>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-thumbs-up"></i> Approved Onpeaks</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-thumbs-down"></i> Not Approved onpeaks</a>
  </li>
  
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <table class="table table-hover">
  <thead class="thead-dark">
    <tr>
    <th scope="col">REGISTRATION NO</th>
      <th scope="col">REASON FOR EXIT </th>
      
      <th scope="col">CONTACT NO</th>
      <th scope="col">EXIT DATE No</th>
      <th scope="col">EXIT TIME</th>
      <th scope="col">RETURN DATE</th>
      <th scope="col">RETURN TIME</th>
      <th colspan="3">REFERENCE</th>
    </tr>
  </thead>
  <tbody>
  <?php
  // Use direct SELECT; also reuse existing $con from config.php
  $sql = "SELECT student_id, reason, contact_no, exit_date, exit_time, return_date, return_time, onpeak_request_status FROM onpeak_request WHERE onpeak_request_status='Approved' ORDER BY id DESC";
  $result = mysqli_query($con, $sql);
  if($result && mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
    echo '<tr>
      
      <td>'.$row["student_id"].'</td>
      <td>'.$row["reason"].'</td>
      <td>'.$row["contact_no"].'</td>
      <td>'.$row["exit_date"].'</td>
      <td>'.$row["exit_time"].'</td>
      <td>'.$row["return_date"].'</td>
      <td>'.$row["return_time"].'</td>
      <td>'.$row["onpeak_request_status"].'</td>
      
    </tr>';

  }
}
else{
  echo "0 result";
}

    ?>
  </tbody>
</table>


  </div>
  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab"><table class="table table-responsive-sm">
  <thead class="thead-dark">
    <tr>
    <th scope="col">REGISTRATION NO</th>
      <th scope="col">REASON FOR EXIT </th>
      
      <th scope="col">CONTACT NO</th>
      <th scope="col">EXIT DATE No</th>
      <th scope="col">EXIT TIME</th>
      <th scope="col">RETURN DATE</th>
      <th scope="col">RETURN TIME</th>
      <th colspan="3">REFERENCE</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql = "SELECT student_id, reason, contact_no, exit_date, exit_time, return_date, return_time, onpeak_request_status FROM onpeak_request WHERE onpeak_request_status='Not Approved' ORDER BY id DESC";
  $result = mysqli_query($con, $sql);
  if($result && mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
    echo '<tr>
      
    <td>'.$row["student_id"].'</td>
    <td>'.$row["reason"].'</td>
    <td>'.$row["contact_no"].'</td>
    <td>'.$row["exit_date"].'</td>
    <td>'.$row["exit_time"].'</td>
    <td>'.$row["return_date"].'</td>
    <td>'.$row["return_time"].'</td>
    <td>'.$row["onpeak_request_status"].'</td>
      
    </tr>';

  }
}
else{
  echo "0 result";
}

    ?>
 
    </tbody>
    </table>
    

<script>
  $(function () {
    $('#myTab li:last-child a').tab('show')
  })
</script>
  
  </div>


  
        

      <!-- <div class=row >
        <table class="table table-hover">
            <thead>
                  <tr>
                    <th scope="col">REGISTRATION NO </th>
                    <th scope="col">REASON FOR EXIT</th>
                    <th scope="col">CONTACT NO </th>
                    <th scope="col">EXIT DATE</th>
                    <th scope="col">EXIT TIME</th>
                    <th scope="col">RETURN DATE</th>
                    <th scope="col">RETURN TIME</th>
                    <th scope="col">REFERENCE</th>
                    
                  </tr>
            </thead> -->
            <?php
            // if(isset($_GET['sea'])){
            //    $id= $_GET['sear'];
               
            //   $sql = "SELECT * FROM `onpeak_request` WHERE `student_id`='$id' ";
            //   $result = mysqli_query($con, $sql);
            //   if (mysqli_num_rows($result) > 0) {
            //   while($row = mysqli_fetch_assoc($result)) {

            //   echo '
            //     <tbody> 
            //       <tr>
            //         <th scope="row">'. $row["student_id"].'</th>
            //         <td>'. $row["reason"]. '</td>
            //         <td>'. $row["contact_no"]. '</td>
            //         <td>'. $row["exit_date"]. '</td>
            //         <td>'. $row["exit_time"]. '</td>
            //         <td>'. $row["return_date"].'</td>
            //         <td>'. $row["return_time"]. '</td>
            //         <td>'. $row["onpeak_request_status"]. '</td>
            //        </tr> 
            //   </tbody>
            //   ';
            //   }
            //       } else {
            //           echo "No more Requests";
            //       }

              
              
            // }


            ?> 
            
                <?php
                    // $sql = "SELECT * FROM `onpeak_request` WHERE `onpeak_request_status`= 'Approved' OR `onpeak_request_status`= 'Not Approved'  ";
                    // $result = mysqli_query($con, $sql);
                    // if (mysqli_num_rows($result) > 0) {
                    // while($row = mysqli_fetch_assoc($result)) {

                    // echo '
                    //   <tbody> 
                    //     <tr>
                    //       <th scope="row">'. $row["student_id"].'</th>
                    //       <td>'. $row["reason"]. '</td>
                    //       <td>'. $row["contact_no"]. '</td>
                    //       <td>'. $row["exit_date"]. '</td>
                    //       <td>'. $row["exit_time"]. '</td>
                    //       <td>'. $row["return_date"].'</td>
                    //       <td>'. $row["return_time"]. '</td>
                    //       <td>'. $row["onpeak_request_status"]. '</td>
                    //      </tr> 
                    // </tbody>
                    // ';
                    // }
                    //     } else {
                    //         echo "No more Requests";
                    //     }
            ?>
           
        <!-- </table> 
      </div>
    </div>
  </div>
  -->



<br>
<br>


  <div class="border border-light shadow p-3 mb-5 bg-white rounded" > 
      <div class="col">
        <div class=row>
            <div class="col">
                <br>
                <br>
                 <nav class="navbar navbar-light bg-light">
                        <form class="form-inline">
                        
                        <form method="GET">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="form-control mr-sm-2" type="search" placeholder="Registration No" aria-label="Search" name="sear">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="sea"><i class="fas fa-search"></i> </button>
                       </form>
                        </form>
                </nav>
                <br>
                <br>
            </div>
        </div>
        
        

      <div class=row >
        <table class="table table-hover ">
            <thead class="thead-dark">
                  <tr>
                    <th scope="col">REGISTRATION NO </th>
                    <th scope="col">REASON FOR EXIT</th>
                    <th scope="col">CONTACT NO </th>
                    <th scope="col">EXIT DATE</th>
                    <th scope="col">EXIT TIME</th>
                    <th scope="col">RETURN DATE</th>
                    <th scope="col">RETURN TIME</th>
                    <th scope="col">REFERENCE</th>
                    
                  </tr>
            </thead>
            <?php
            if(isset($_GET['sea'])){
               $id= $_GET['sear'];
               
              $sql = "SELECT * FROM `onpeak_request` WHERE `student_id`='".mysqli_real_escape_string($con, $id)."'";
              $result = mysqli_query($con, $sql);
              if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {

              echo '
                <tbody> 
                  <tr>
                    <th scope="row">'. $row["student_id"].'</th>
                    <td>'. $row["reason"]. '</td>
                    <td>'. $row["contact_no"]. '</td>
                    <td>'. $row["exit_date"]. '</td>
                    <td>'. $row["exit_time"]. '</td>
                    <td>'. $row["return_date"].'</td>
                    <td>'. $row["return_time"]. '</td>
                    <td>'. $row["onpeak_request_status"]. '</td>
                   </tr> 
              </tbody>
              ';
              }
                  } else {
                      echo "No more Requests";
                  }

              
              
            }


            ?> 



        <?php
            if(isset($_GET['search_d'])){
               $exit_date= $_GET['seard'];
               
              $sql = "SELECT * FROM `onpeak_request` WHERE `exit_date`='$id' ";
              $result = mysqli_query($con, $sql);
              if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {

              echo '
                <tbody> 
                  <tr>
                    <th scope="row">'. $row["student_id"].'</th>
                    <td>'. $row["reason"]. '</td>
                    <td>'. $row["contact_no"]. '</td>
                    <td>'. $row["exit_date"]. '</td>
                    <td>'. $row["exit_time"]. '</td>
                    <td>'. $row["return_date"].'</td>
                    <td>'. $row["return_time"]. '</td>
                    <td>'. $row["onpeak_request_status"]. '</td>
                   </tr> 
              </tbody>
              ';
              }
                  } else {
                      echo "No more Requests";
                  }

              
              
            }


            ?> 
            
                
           
        </table> 
      </div>
    </div>
  </div>




<br>
<br>



       <div class="row ">
          <div class="col-3 ">
          <div class="card shadow-sm p-3 mb-5 bg-white rounded" style="width: 18rem;">
              <div class="card-body">
              <h5 class="card-title">Leave of Absence </h5>
              <p class="card-text">A LOA is an extended period of time off from their studies. 
                    there may be a formal process you need to follow to get approved for a leave.</p>
              </div>
              </div>
          </div>

          <div class="col-3 ">
              <div class="card shadow-sm p-3 mb-5 bg-white rounded" style="width: 18rem;">
              <div class="card-body">
              <h5 class="card-title">Time Schedule</h5>
              <p class="card-text">This form must be submitted to the guards, when students wants to exit SLGTI during scgool hours/ on peak (8.15 am- 4.15 pm)</p>
              </div>
              </div>
          </div>

          <div class="col-3">
              <div class="card shadow-sm p-3 mb-5 bg-white rounded" style="width: 18rem;">
              <div class="card-body">
              <h5 class="card-title">Jurisdiction of the Code</h5>
              <p class="card-text">Please note that students fail within the jurisdiction of the code of conduct and honor for off-campus conduct.</p>
              </div>
              </div>
          </div>

          <div class="col-3">
              <div class="card shadow-sm p-3 mb-5 bg-white rounded" style="width: 18rem;">
              <div class="card-body">
              <h5 class="card-title">Approvel</h5>
              <p class="card-text">Please supervise the reason for students temporary exit in the box below, state the date , inform the warden. </p>
              </div>
              </div>
          </div>
      </div>

 
 

<!--END OF YOUR COD-->
<?php } ?> 
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("../footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->  
