<!------START DON'T CHANGE ORDER HEAD,MANU,FOOTER----->
<!---BLOCK 01--->
<?php 
   
include_once("config.php");

$title ="STUDENT PROFILE | SLGTI"; //YOUR HEAD TITLE CREATE VARIABLE BEFORE FILE NAME
include_once("head.php");
include_once("menu.php");

?>
<!----END DON'T CHANGE THE ORDER---->


<!---BLOCK 02--->
<!---START YOUR CODER HERE----->


<!-----END YOUR CODE----->
<!-- form start---->
<br>
<h1 style="text-align:center"> SLGTI STUDENTS' INFORMATION </h1>
<br><br>

<div class="form-row">
<a href="Student.php"> 
<button class="btn btn-success" type="submit" > Back </button>
</a>
</div><br>

<?php
if(isset($_GET['delete']))
{
  $student_id = $_GET ['delete'];
  $sql = "DELETE FROM `student` WHERE `student_id`= $student_id";
  if(mysqli_query($con,$sql))
  {
    echo "Recorde Delete Successfully";
  }
  else
  {
    echo "Error Deleteing Record: ". mysqli_error($con);
  }
}
?>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" width="5%">Civil Status</th>
      <th scope="col" width="5%">Zip-Code</th>
      <th scope="col" width="5%">District</th>
      <th scope="col" width="10%">Divisional Secretariat</th>
      <th scope="col" width="2%">Blood Group</th>
      <th scope="col" width="15%">Emergency Contact Name</th>
      <th scope="col" width="25%">Emergency Contact Address</th>
      <th scope="col" width="5%">Emergency Contact Phone No</th>
      <th scope="col" width="5%">Emergency Contact Relationship</th>
      <th scope="col" width="10%">Action</th>
    </tr>
    <?php
   $st_id=$_GET['$student_id'];
   $sql = "SELECT student_status,student_zip,student_district,student_divisions,
    student_blood,student_em_name,student_em_address,student_em_phone,student_em_relation
    FROM student where student_id=$st_id";
  if(isset($_GET["student_id"]))
  {
   $result = mysqli_query ($con, $sql);
   if (mysqli_num_rows($result)>0)
   {
     while($row = mysqli_fetch_assoc($result))
     {
       echo '
          <tr style="text-align:center";>
          <th>'. $row["student_status"] . "<br>" .'</th>
          <th>'. $row["student_zip"] . "<br>" .'</th>
          <th>'. $row["student_district"] . "<br>" .'</th>
          <th>'. $row["student_divisions"] . "<br>" .'</th>
          <th>'. $row["student_blood"] . "<br>" .'</th>
          <th>'. $row["student_em_name"] . "<br>" .'</th>
          <th>'. $row["student_em_address"] . "<br>" .'</th>
          <th>'. $row["student_em_phone"] . "<br>" .'</th>
          <th>'. $row["student_em_relation"] . "<br>" .'</th>
          <th> 
          
          </tr>';
      }
   }
   else
   {
    echo "0 results";
   }
  }
?>
</table>


<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php 
include_once("FOOTER.PHP"); 
?>