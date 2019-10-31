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

<div class="intro p-5 mb-5 border border-dark rounded" >
<div class="shadow p-3 mb-5 bg-white "> 
    <h4 class="display-4 text-center  "><i class="fas fa-shield-alt"></i>  Security Portal</h4>
    </div>
    <div class="table-responsive-sm">
    <table  id="tblMain" class="table table-responsive-sm w-100">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Student_id</th>
      <th scope="col">Name of applicant</th>
      <th scope="col">Registration No</th>
      <th scope="col">Department</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Warden's comment</th>
     <th colspan="3">Status</th>
     
    </tr>
  </thead>
  <tbody>
  <?php
  $sql = "SELECT * FROM `off_peak` where `status`='Approved'";

  $result = mysqli_query($con, $sql);
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
    echo '<tr>
      
      <td>'.$row["student_id"].'</td>
      <td>'.$row["name_of_applicant"].'</td>
      <td>'.$row["department"].'</td>
      <td>'.$row["contact_no"].'</td>
      <td>'.$row["date"].'</td>
      <td>'.$row["time"].'</td>
      <td>'.$row["reson_for_exit"].'</td>
      <td>'.$row["status"].'</td>
      <td>
      
      <button type="submit" class="btn info-btn" data-toggle="modal"  value="'.$row["student_id"].'" data-target="#reason">
      <i class="fa fa-eye"></i> View
      </button>
      
      
      <!-- Modal -->
      

      <div class="modal fade bd-example-modal-xl" id="reason" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="reason">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        '.$row["student_id"].'
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          
        </div>
      </div>
                    </td>
      
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
    <!-- <a href="index.php"><<< Back to off-peak request </a> -->


<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->