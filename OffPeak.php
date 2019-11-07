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
if(isset($_GET['approve'])){
  $reg = $_GET['approve'];
  $da = $_GET['date'];
   $cmt = $_GET['cmt'];
  
  $result = mysqli_query($con ,$sql);
 
     
      

     $sql = "UPDATE `off_peak` SET `status` = 'Approved',`warden's_comment`= '$cmt' WHERE `off_peak`.`student_id` = '$reg' AND `off_peak`.`date` = '$da'";
      
          if(mysqli_query($con,$sql)){
            echo
            '<div class="alert alert-success">
            <strong>Success!</strong> Student has approved to exit! </a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>

          </div>';
          }else{
              echo "error :" .$sql."<br>".mysqli_error($con);
          }
      
 }


?>

<?php
if(isset($_GET['reject'])){
  $reg = $_GET['reject'];
  $da = $_GET['date'];
  $cmt = $_GET['cmt'];
  
  $result = mysqli_query($con ,$sql);
 
      $sql = "UPDATE `off_peak` SET `status` = 'Rejected',`warden's_comment`= '$cmt' WHERE `off_peak`.`student_id` = '$reg' AND `off_peak`.`date` = '$da'";
     
     
        
          if(mysqli_query($con,$sql)){
            echo '<div class="alert alert-success">
            <strong>Success!</strong> Student has rejected to exit! </a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>';
          }else{
              echo "error :" .$sql."<br>".mysqli_error($con);
          }
      
 }


?>

<br><br>


<div class="intro container-fluid shadow p-3 mb-5 bg-white rounded">
<div class="shadow p-3 mb-5 bg-white rounded"> 
  <h1 class="display-4 text-center  "><i class="fas fa-inbox"></i> Off-peak Requests</h1>
  </div>
  <div class="col-md-1 col-sm-12   float-right ">
<input type="button" class="btn btn-info " onclick="window.location.href='off_peak_info.php'" id="btn" name="off-peak info" value="off-peak info">
<br>
</div>
<br><br><br>
    <div class="table-responsive-sm">
    <table class="table table-responsive-sm w-100">
  <thead class="thead-dark">
    <tr>
      
    <th scope="col">Student_id</th>
      <th scope="col">Name of applicant</th>
      <th scope="col">Department</th>
      <th scope="col">Contact No</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Reason for exit</th>
      <th scope="col">warden's comment</th>
      <th colspan="3">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql = "SELECT * FROM  `off_peak`  where `status`='Pending'";

  $result = mysqli_query($con, $sql);
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
     $reg = $row["student_id"];
      
    echo '<tr>
      
      <td>'.$row["student_id"].'</td>
      <td>'.$row["name_of_applicant"].'</td>
      <td>'.$row["department"].'</td>
      <td>'.$row["contact_no"].'</td>
      <td>'.$row["date"].'</td>
      <td>'.$row["time"].'</td>
      <td>'.$row["reson_for_exit"].'</td>
      
      <form method="GET">
      <td><input type="text" id="cmt" name="cmt"> </td>

      <td>
      <button type="submit" class="btn btn-success btn-sm" name="approve" value="'.$reg.'"><i class="fas fa-thumbs-up"></i> Approve</button>

      <button type="submit" class="btn btn-danger btn-sm" name="reject" value="'.$reg.'"><i class="fas fa-thumbs-down"></i>  Reject</button></td>
      <input type="hidden" name="date" value="'.$row["date"].'">
      
      </form>
    </tr>
    
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

 
  </tbody>
</table>

</div>

  

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
