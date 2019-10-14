<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<!-- STAFF info design  -->
<div class="row">
    <div class="col container pt-3 col-4 " >
      <h1 ><i class="fas fa-user"></i>   STAFF INFO</h1>
    </div>
    <div class="col container col-4"></div>
</div>

<div class="row pb-2">
   <div class="col-sm-12" >
      <hr color ="black" style="height:1px;">
   </div>
</div>

<div class="row">
  <table class="table">
    <thead class="bg-info">
      <tr class="text-white">
        <th>StaffID</th>
        <th>Name</th>
        <th>Position</th>
        <th>Department Name</th>
        <th>Phone Number</th>
      </tr>
    </thead>

    <?php
    $sql="SELECT * from staff";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
        echo '   
        <tr>
            <td>'.$row["staff_id"].'</td>
            <td>'.$row["staff_name"].'</td>
            <td>'.$row["staff_position"].'</td>
            <td>'.$row["department_id"].'</td>
            <td>'.$row["staff_pno"].'</td>
        </tr>';
        }
    }
    else {
        echo "0 results";
    }
    ?>
  </table>
</div>



<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
