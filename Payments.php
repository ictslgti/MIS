<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->



<div class="shadow p-3 mb-s bg-white rounded">
  <h1 class="text-center display-3">SLGTI Payment Information</h1><br>
  </div>
  </body>
  <br>
	<!-- <?php
  include_once("config.php");
if(isset($_GET['delete'])){
    $module_id=$_GET['delete'];
    $sql="DELETE FROM `module` WHERE `module_id`=$module_id";
    if (mysqli_query($con,$sql)){
        echo" your delete data";
    }
    else{ echo"error delete record:".mysqli_error($con);
    }
}
?>  -->




<table class="table">

    <tr>
        <th>PAYMENT ID</th>
        <th>STUDENT ID</th>
        <th>PAYMENT CATEGORY</th>
        <th>PAYMENT REASON</th>
        <th>PAYMENT NOTE</th>
        <th>PAYMENT AMOUNT</th>
        <th>PAYMENTQTY</th>
        <th>PAYMENT DATE</th>
        <th>PAYMENT DEPARTMENT</th>
      

</tr>



<?php 
// $sql="SELECT`module`.`moudule_id` AS `moudule_id`,
// `course`.`course_name` AS `course_name`,
// `module`.`moudule_code` AS `moudule_code`,
// `module`.`moudule_name` AS `moudule_name`,

// "

$sql="SELECT * FROM `pays`";//SELECT * FROM `department`
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        echo'
        <tr>
        <td>'.$row['pays_id'].'</td>
        <td>'.$row['student_id'].'</td>
        <td>'.$row['payment_type'].'</td>
        <td>'.$row['payment_reason'].'</td>
        <td>'.$row['pays_note'].'</td>
        <td>'.$row['pays_amount'].'</td>
        <td>'.$row['pays_qty'].'</td>
        <td>'.$row['pays_date'].'</td>
        <td>'.$row['pays_department'].'</td>
        
        
        </tr>';

        // "id:".$row['department_id'].
        // "code:".$row['department_code'].
        // "name:".$row['department_name'].
        // "<br>";
    }
}else{
    $result=0;
}

?>


</table>

    			
            
            

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
