<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<br><br>


<div class="intro container-fluid shadow p-3 mb-5 bg-white rounded">
<div class="shadow p-3 mb-5 bg-white rounded"> 
<h1 class="display-4 text-center "><i class="fas fa-file-alt"></i>   Off-peak Info</h1>
<br>
</div>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-thumbs-up"></i> Approved Off-peaks</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-thumbs-down"></i> Rejected Off-peaks</a>
  </li>
  
  
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <table class="table table-responsive-sm">
  <thead class="thead-dark">
    <tr>
    <th scope="col">Student_id</th>
      <th scope="col">Name of applicant</th>
      
      <th scope="col">Department</th>
      <th scope="col">Contact No</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Reason for exit</th>
      <th colspan="3">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql = "SELECT * FROM `off_peak` where `status`='Approved'";

  $result = mysqli_query($con, $sql);
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      
     
      
        $y="bg-success text-white text-center";
  
      
        
     
    echo '<tr>
      
      <td>'.$row["student_id"].'</td>
      <td>'.$row["name_of_applicant"].'</td>
      <td>'.$row["department"].'</td>
      <td>'.$row["contact_no"].'</td>
      <td>'.$row["date"].'</td>
      <td>'.$row["time"].'</td>
      <td>'.$row["reson_for_exit"].'</td>
      <td class="'.$y.'">'.$row["status"].'</td>
      
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
    <th scope="col">Student_id</th>
      <th scope="col">Name of applicant</th>
      
      <th scope="col">Department</th>
      <th scope="col">Contact No</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Reason for exit</th>
      <th colspan="3">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql = "SELECT * FROM `off_peak` where `status`='Rejected'";

  $result = mysqli_query($con, $sql);
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      
     
        $y="bg-danger text-white text-center";
      
      
    echo '<tr>
      
      <td>'.$row["student_id"].'</td>
      <td>'.$row["name_of_applicant"].'</td>
      <td>'.$row["department"].'</td>
      <td>'.$row["contact_no"].'</td>
      <td>'.$row["date"].'</td>
      <td>'.$row["time"].'</td>
      <td>'.$row["reson_for_exit"].'</td>
      <td class="'.$y.'">'.$row["status"].'</td>
      
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
 

<script>
  $(function () {
    $('#myTab li:last-child a').tab('show')
  })
</script>
  
  </div>



   

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
