<!-- BLOCK#1 START DON'T CHANGE THE ORDER -->
<?php 
$title = "Department Details | SLGTI" ;
include_once("config.php"); 
include_once("head.php"); 
include_once("menu.php");

 ?>
<!-- END DON'T CHANGE THE ORDER -->

<!-- BLOCK#2 START YOUR CODER HERE -->
<div class="shadow  p-3 mb-5 bg-white rounded">

        <div class="highlight-blue">
            <div class="container">
                <div class="intro">
                    <h1 class="display-4 text-center">SLGTI Academic Year</h1>
                    
                   
                </div>
            </div>
        </div>
    </div>
    

<table class="table table-hover">
  <thead class="thead-dark">
  </tbody>
    </form>
    </table>
  <!-- <tr >
    <label for="inputPassword5">Add Academic Year</label>

    </tr>
   -->

<!-- <div class="  p-3 mb-5"> -->
<!-- <a href="" class="btn btn-success" role="button" aria-pressed="true">Add</a> -->
<!-- <a href="" class="btn btn-success" role="button" aria-pressed="true">Delete</a> -->
<!-- <a href="" class="btn btn-success" role="button" aria-pressed="true">Edit</a> -->
<!-- <a href="AcademicYear" class="btn btn-primary" role="button" aria-pressed="true">Back</a> -->
<!-- </div> -->

<?php
$academic_year = $first_semi_start_date = $first_semi_end_date = $second_semi_start_date = $second_semi_end_date = $academic_year_status = null;
if(isset($_GET['edit'])){
    $academic_year = $_GET['edit'];
    $sql = "SELECT * FROM `academic` WHERE `academic_year`='$academic_year '";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)==1){
    $row = mysqli_fetch_assoc($result);
    $academic_year = $row['academic_year'];
    $first_semi_start_date = $row['first_semi_start_date']; 
    $first_semi_end_date = $row['first_semi_end_date']; 
    $second_semi_start_date = $row['second_semi_start_date']; 
    $second_semi_end_date = $row['second_semi_end_date']; 
    $academic_year_status = $row['academic_year_status']; 
    
}
}


if(isset($_POST['Add'])){
   if (!empty($_POST['academic_year']) && !empty ($_POST['first_semi_start_date']) && !empty ($_POST['first_semi_end_date']) && !empty ($_POST['second_semi_start_date']) && !empty ($_POST['second_semi_end_date']) && !empty ($_POST['academic_year_status'])){
    $academic_year = $_POST['academic_year'];
    $first_semi_start_date = $_POST['first_semi_start_date']; 
    $first_semi_end_date = $_POST['first_semi_end_date']; 
    $second_semi_start_date = $_POST['second_semi_start_date']; 
    $second_semi_end_date = $_POST['second_semi_end_date']; 
    $academic_year_status = $_POST['academic_year_status']; 
       $sql = "INSERT INTO `academic` (`academic_year`,`first_semi_start_date`,`first_semi_end_date`,`second_semi_start_date`,`second_semi_end_date`,`academic_year_status`) VALUE ('$academic_year','$first_semi_start_date','$first_semi_end_date','$second_semi_start_date','$second_semi_end_date','$academic_year_status')";
       if (mysqli_query($con, $sql)){
           echo "New record created successfully";
       }else{
           echo "Error:" .$sql. "<br>". mysqli_error($con);
       }
   }
    // echo "Add";
}
if(isset($_POST['Edit'])){
    if (!empty($_POST['academic_year']) && !empty ($_POST['first_semi_start_date']) && !empty ($_POST['first_semi_end_date']) && !empty ($_POST['second_semi_start_date']) && !empty ($_POST['second_semi_end_date']) && !empty ($_POST['academic_year_status']) && !empty($_GET['edit'])){
        $academic_year = $_POST['academic_year'];
    $first_semi_start_date = $_POST['first_semi_start_date']; 
    $first_semi_end_date = $_POST['first_semi_end_date']; 
    $second_semi_start_date = $_POST['second_semi_start_date']; 
    $second_semi_end_date = $_POST['second_semi_end_date']; 
    $academic_year_status = $_POST['academic_year_status'];
    $academic_year = $_GET['edit'];
        $sql = " UPDATE `academic` SET `academic_year`='$academic_year',`first_semi_start_date`='$first_semi_start_date',`first_semi_end_date`='$first_semi_end_date',
        `second_semi_start_date`='$second_semi_start_date' ,`second_semi_end_date`='$second_semi_end_date' ,`academic_year_status`='$academic_year_status'   WHERE `academic`.`academic_year`= '$academic_year'";
        if (mysqli_query($con, $sql)){
            echo '<span class="badge badge-success">Edit Success</span>'; 
        }else{
            echo "Error:" .$sql. "<br>". mysqli_error($con);
        }
    }
    // echo "EDIT";
}

?>
<br><br>
<form method = "POST">
<input class="form-control" type = "text" name= "academic_year" value ="<?php echo $academic_year;?>" placeholder="Academic Year" required><br>
<input class="form-control" type = "text" name= "first_semi_start_date" value ="<?php echo $first_semi_start_date;?>" placeholder="First Semi Start Date" required><br>
<input class="form-control" type = "text" name= "first_semi_end_date" value ="<?php echo $first_semi_end_date;?>" placeholder="First Semi End Date" required><br>
<input class="form-control" type = "text" name= "second_semi_start_date" value ="<?php echo $second_semi_start_date;?>" placeholder="Second Semi Start Date" required><br>
<input class="form-control" type = "text" name= "second_semi_end_date" value ="<?php echo $second_semi_end_date;?>" placeholder="Second Semi End Date" required><br>
<input class="form-control" type = "text" name= "academic_year_status" value ="<?php echo $academic_year_status;?>" placeholder="Academic Year Status" required><br>
<?php
if(isset($_GET['edit'])){
    echo '<input type = "submit" value="Edit" name="Edit"<a href="" class="btn btn-success" role="button" aria-pressed="true"></a> '; 
    echo '<a href="AcademicYear" class="btn btn-primary" role="button" aria-pressed="true">Back</a>';
}else{
    echo '<input type="submit" value = "Add" name="Add" <a href="" class="btn btn-success" role="button" aria-pressed="true"></a> ';
    echo '<a href="AcademicYear" class="btn btn-primary" role="button" aria-pressed="true">Back</a>';
}




?>
 

</div>
<!-- END YOUR CODER HERE -->

    <!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
    <?php 
    include_once("footer.php");
    ?>
    <!-- END DON'T CHANGE THE ORDER -->
