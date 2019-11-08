<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");

?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->


<div class="intro p-5 mb-5 border border-light rounded">
<div class="shadow p-3 mb-5 bg-white rounded"> 
  <h1 class="display-4 text-center  "><i class="fas fa-hand-holding-usd"></i> Donation Info</h1>
  </div>




<!-- <div class="row">

<div class="col-sm-6 " ></div>
<div class="col-sm-3 " > 
<form class="form-inline md-form form-sm mt-4">
  <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="search" placeholder="Search_id" aria-label="Search" id="search" name="edit"> 
 <button type="submit" class="btn btn-outline-thead-light  form-control form-control-sm rounded-pill"> <i class="fas fa-search ml-3" aria-hidden="true"></i></button>
</form>
</div>
</div> -->




         <div class="row">   
         <div class="col-12">
         <form>
         <p style="font-size:20px;"> Donation_Info <hr color ="black" style="height:1px;"></p><br>
         </form>
</div>
</div>

<table class="table table-responsive-sm w-100">
  <thead class="thead-light">
    <tr>
    <th scope="col"><i class="far fa-id-card"></i>&nbsp;Donation_id</th>
      <th scope="col"><i class="fas fa-calendar-alt"></i>&nbsp;Date</th>
      <th scope="col"><i class="fas fa-tasks"></i>&nbsp;Programme</th>
      
    </tr>
  </thead>

  

  <?php
  
    $sql="SELECT * from donation";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
        echo '   
        <tr>
            <td>'.$row["donation_id"].'</td>
            <td>'.$row["date"].'</td>
            <td>'.$row["programme"].'</td>
            
        </tr>';
        }
    }
    else {
        echo "0 results";
    }
//   }
// }
    ?>
  </table>
<!-- search  -->
<?php
  if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $sql="SELECT * FROM `donation` WHERE `donation_id`='$id'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)==1){
            $row=mysqli_fetch_assoc($result);
            $donation=$row['donation_id'];
            $date=$row['date'];
            $programme=$row['programme'];
           
            
        }
        else{
          echo "Error".$sql."<br>".mysqli_error($con);
        }
    }
            // 
?>

 </div> 
 

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->