 <!--START Don't CHANGE THE ORDER-->
 <?php 
$title ="Home | SLGTI";
 include_once("config.php");
 include_once("head.php");
 include_once("menu.php");
 ?>
 <!--END Don't CHANGE THE ORDER-->

 <!--START YOUR CODER HERE-->
 <div class=row>
        <div class="col">
          <br>
          <br>
          <h1>On-The-Job-Training Informations</h1>
          <br>
          <br>
          </div>
  </div>
        <div class=row>
        <div class="col">
 <table class="table table-hover table-light">
  <thead>
    <tr>
      <th scope="col" class="bg-primary"><i class="fas fa-address-card">..</i>Student ID</th>
      <th scope="col" class="bg-primary"><i class="fas fa-address-card">..</i>Student Name</th>
      <th scope="col" class="bg-primary"><i class="fas fa-phone-volume"></i>Phone number</th>
      <th scope="col" class="bg-primary"><i class="far fa-envelope">..</i>E-mail</th>
      <th scope="col" class="bg-primary"><i class="far fa-building">..</i>Department</th>
      <th scope="col" class="bg-primary"><i class="fas fa-industry">..</i>Requested Place / company</th>
      <th scope="col" class="bg-primary"><i class="fas fa-map-marker-alt">..</i>Requested Place Address</th>
      <th scope="col" class="bg-primary"><i class="fas fa-industry">..</i>Final Place / company</th>
      <th scope="col" class="bg-primary"><i class="fas fa-map-marker-alt">..</i>Final Place Address</th>
      <th scope="col" class="bg-primary">Action</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
   $sql ="SELECT `student_id`, `student_name`, `phone_no`, `e_mail`, `department_name`, `requested_place`, `requested_address`, `final_place`, `final_address`, FROM `ojt` where student_id ='Active'";
   $result = mysqli_query($con, $sql);
   if (mysqli_num_rows($result)>0)
   {
     while($row = mysqli_fetch_assoc($result))
     {
       echo '
       <tr style="text-align:left";>
          <td>'. $row["student_id"]."<br>".'</td>
          <td>'. $row["student_name"]."<br>".'</td>
          <td>'. $row["phone_no"]."<br>".'</td>
          <td>'. $row["e_mail"]."<br>".'</td>
          <td>'. $row["department_name"]."<br>".'</td>
          <td>'. $row["requested_place"]."<br>".'</td>
          <td>'. $row["requested_address"]."<br>".'</td>
          <td>'. $row["final_place"]."<br>".'</td>
          <td>'. $row["final_address"]."<br>".'</td>
          <td>
          <a href="AddTrainingPlace.php? edit='.$row["student_id"]. '" class="btn btn-sm btn-success""><i class="far fa-edit"></i></a> 
          </td>
       </tr> ';
     }
   }
   else
   {
     echo "0 results";
   }
    
  ?>
  </tbody>
</table>
</div>
</div>