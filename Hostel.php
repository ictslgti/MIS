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
if(isset($_GET['delete'])){
  $student_id = $_GET['delete'];
  $sql = "DELETE FROM `hostel_student_details` WHERE `hosttler_id`=$student_id";
 if(mysqli_query($con ,$sql)){
  echo
  '<div class="alert alert-danger">
  <strong>Success!</strong> Your data was Deleted.</a>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
</div>';
   
 }else{
   echo "error deleting record : ". mysqli_error($con);
 }
 }


?>










<div style="margin-top:30px ">
  <div class="card ">
   <div class="card-header bg-info">
      <div class="row">
        <div class="col-md-9" >
       
                <label style="font-family: 'Luckiest Guy', cursive; font-size: 20px; "> <i class="fas fa-user-graduate"></i> &nbsp; Student Accomadation</label>
                <!-- <footer class="blockquote-footer" style=" padding-left: 650px">Hostel Allocation <cite title="Source Title"></cite></footer> -->
            
        </div>
        
      </div>
    </div>

    <div class="card-body">
    <div class="table-responsive">
        <!-- <span id="message_operation"></span> -->

       

<table class="table table-hover   mt-4 " id="Hostel accomadation">
<thead>
<tr>
      <th scope="col"><i class="far fa-id-card"></i>&nbsp;Hosttler_id</th>
      <th scope="col"><i class="far fa-id-card"></i>&nbsp;Student_id</th>
      <th scope="col"><i class="fas fa-file-signature"></i>&nbsp;Full Name</th>
      <th scope="col"><i class="fas fa-file-signature"></i>&nbsp;Department</th>
      <th scope="col"><i class="fas fa-transgender"></i>&nbsp;Gender</th>
      <th scope="col"><i class="fas fa-map-marked-alt"></i>&nbsp;Address</th>
      <th scope="col"><i class="fas fa-map-marker-alt"></i>&nbsp;District</th>
      <th scope="col"><i class="fas fa-map-marker-alt"></i>&nbsp;Distance</th>
       <th scope="col"><i class="fas fa-list-ol"></i>&nbsp;Block no</th>
      <th scope="col"><i class="fas fa-list-ol"></i>&nbsp;Room no</th>
      <th scope="col"><i class="fas fa-calendar-alt"></i>&nbsp;Date of Admission</th>
      <th scope="col"><i class="fas fa-calendar-alt"></i>&nbsp;Leaving date</th>
      <th scope="col"><i class="far fa-caret-square-right"></i>&nbsp;Action</th>
    </tr>

   


    

</thead>

<tbody>
<?php 
$sql = "SELECT `hostel_student_details`.`hosttler_id`,
`hostel_student_details`.`student_id`,
`student`.`student_fullname`,
`department`.`department_name`,
`student`.`student_gender`,
`student`.`student_address`,
`student`.`student_district`,
`hostel_student_details`.`distance`,`hostel_student_details`.`block_no`,`hostel_student_details`.`room_no`,`hostel_student_details`.`date_of_addmission`,`hostel_student_details`.`date_of_leaving` from `hostel_student_details`
LEFT JOIN `student` ON `hostel_student_details`.`student_id`=`student`.`student_id` 
LEFT JOIN `department` ON `department`.`department_id`=`hostel_student_details`.`department_id`";

$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
echo '<tr>
<td>'.$row["hosttler_id"].'  </td>
    <td>'.$row["student_id"].'  </td>
    <td>'.$row["student_fullname"].'  </td>
    <td>'.$row["department_name"].' </td>
    <td>'.$row["student_gender"].'  </td>
    <td>'.$row["student_address"].'  </td>
    <td>'.$row["student_district"].'  </td>
    <td>'.$row["distance"].'  </td>
    <td>'.$row["block_no"].'  </td>
    <td>'.$row["room_no"].'  </td>
    <td>'.$row["date_of_addmission"].'  </td>
    <td>'.$row["date_of_leaving"].'  </td>
    
    <td>
    <a data-href="?delete='.$row["hosttler_id"].'" data-toggle="modal" data-target="#confirm-delete">
    <button type="button" name="delete" class="btn btn-danger btn-circle">
    <i class="fas fa-trash"></i>
    </button></a>

    <a href="AddHostel.php ?edit='.$row["student_id"].'" >
    <button type="button" class="btn btn-outline-info rounded-pill  waves-effect  ">
    <i class="far fa-edit"></i>
    </button></a></td>
    </form>
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
   </div>
  </div>
</div>
</div>








<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
