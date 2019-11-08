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

<div class="intro container-fluid shadow p-3 mb-5 bg-white rounded" >
<div class="shadow p-3 mb-5 bg-white "> 
    <h4 class="display-4 text-center  "><i class="fas fa-folder-open"></i>  Off-Peak Request Archives</h4>
    </div>
    <div class="table-responsive-sm">
    <table class="table table-responsive-sm w-100">
  <thead class="thead-dark">
    <tr>
    
    
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Warden's comment</th>
     <th colspan="3">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $usern = $_SESSION['user_name'];
 $sql = "SELECT * FROM `off_peak` WHERE `off_peak`.`student_id` = ' $usern'";
 

  $result = mysqli_query($con, $sql);
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      $y="null";
      $st=$row['status'];
      if($st=="Approved"){
        $y="bg-success text-white text-center";
      }
      else if($st=="Rejected"){
        $y="bg-danger text-white text-center";
      }
      else{
        $y="bg-info text-white text-center";
      }
    echo '<tr>
      
      
      <td>'.$row["date"].'</td>
      <td>'.$row["time"].'</td>
      <td>'.$row["warden's_comment"].'</td>
      <td class="'.$y.'">'.$st.'</td>
      
      
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