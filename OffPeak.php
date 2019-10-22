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
  $sql ="SELECT * FROM `off_peak` WHERE `registration_no` = '$reg'";
  $result = mysqli_query($con ,$sql);
 if(mysqli_num_rows($result)== 1){
      $row = mysqli_fetch_assoc($result);
     
      $reg=$row["registration_no"];
      $noa=$row["name_of_applicant"];
      $dept=$row["department"];
      $cn=$row["contact_no"];
      $da=$row["date"];
      $ti=$row["time"];
      $rfe=$row["reson_for_exit"];
      $cmt=$_GET['cmt'];
      // echo "approved";
      // echo $dept;

      $sql = "UPDATE `off_peak` 
          SET `name_of_applicant` = ' $noa', 
          `department` = '$dept',
          `contact_no` = ' $cn',`date` = ' $da',`time` = ' $ti',`reson_for_exit` = '$rfe',`warden's_comment`= '$cmt',`status`='approved'
          WHERE `off_peak`.`registration_no` = '$reg'";
        
          if(mysqli_query($con,$sql)){
              echo "new record update sucessfully ";
          }else{
              echo "error :" .$sql."<br>".mysqli_error($con);
          }
      }
 }


?>

<?php
if(isset($_GET['reject'])){
  $reg = $_GET['reject'];
  $sql ="SELECT * FROM `off_peak` WHERE `registration_no` = '$reg'";
  $result = mysqli_query($con ,$sql);
 if(mysqli_num_rows($result)== 1){
      $row = mysqli_fetch_assoc($result);
     
      $reg=$row["registration_no"];
      $noa=$row["name_of_applicant"];
      $dept=$row["department"];
      $cn=$row["contact_no"];
      $da=$row["date"];
      $ti=$row["time"];
      $rfe=$row["reson_for_exit"];
      $cmt=$_GET['cmt'];
      // echo "approved";
      // echo $dept;

      $sql = "UPDATE `off_peak` 
          SET `name_of_applicant` = ' $noa', 
          `department` = '$dept',
          `contact_no` = ' $cn',`date` = ' $da',`time` = ' $ti',`reson_for_exit` = '$rfe',`warden's_comment`='$cmt',`status`='Reject'
          WHERE `off_peak`.`registration_no` = '$reg'";
        
          if(mysqli_query($con,$sql)){
              echo "new record update sucessfully ";
          }else{
              echo "error :" .$sql."<br>".mysqli_error($con);
          }
      }
 }


?>

<br><br>


<div class="intro p-5 mb-5 border border-dark rounded">
<div class="shadow p-3 mb-5 bg-white rounded"> 
  <h1 class="display-4 text-center  "><i class="fas fa-inbox"></i> Off-peak Requests</h1>
  </div>
  <div class="col-md-1 col-sm-12   float-right ">
<input type="button" class="btn btn-info " onclick="window.location.href='off_peak_info.php'" id="btn" name="off-peak info" value="off-peak info">
</div>
<br><br>
    <div class="table-responsive-sm">
    <table class="table table-responsive-sm w-100">
  <thead class="thead-dark">
    <tr>
      
    <th scope="col">Registration No</th>
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
  $sql = "SELECT * FROM `off_peak`";

  $result = mysqli_query($con, $sql);
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      echo $reg = $row["registration_no"];
      
    echo '<tr>
      
      <td>'.$row["registration_no"].'</td>
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
<a href="index.php"><<< Back to home </a>
  

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
