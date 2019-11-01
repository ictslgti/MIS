<!-- BLOCK#1 START DON'T CHANGE THE ORDER -->
<?php 
$title = "Add New Batch | SLGTI" ;
include_once("config.php"); 
include_once("head.php"); 
include_once("menu.php");
 ?>
<!-- END DON'T CHANGE THE ORDER -->

<!-- BLOCK#2 START YOUR CODER HERE -->
<div class="shadow p-3 mb-5  alert bg-dark rounded  text-white text-center" role="alert">

        <div class="highlight-blue">
            <div class="container">
                <div class="intro">
                    <h1 class="display-3 text-center">Add New Batch</h1>
                    

                </div>
            </div>
        </div>
    </div>



<table class="table table-hover">
  <thead class="thead-dark">
 
    <tr >
    <!-- <th scope="col">Batch_ID</th> -->
      <!-- <th scope="col">Course Name</th> -->
      <!-- <th scope="col">Academic Year</th> -->
   
      <!-- <label for="inputPassword5">Batch ID</label>
      <input class="form-control" type="text" placeholder=>
      <label for="inputPassword5">Course Name</label>
      <input class="form-control" type="text" placeholder=>
      <label for="inputPassword5">Academic Year</label>
      <input class="form-control" type="text" placeholder=>
       -->
    </tr>
  </thead>
  <tbody>
 
  


  </tbody>
  </form>
</table>
<?php

$batch_id = $c_id = $academic_year = null;
if(isset($_GET['edit'])){ 
    $batch_id = $_GET['edit'];
    $sql = "SELECT * FROM `batch` WHERE `batch_id`='$batch_id'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)==1){
    $row = mysqli_fetch_assoc($result);
    $batch_id = $row['batch_id'];
    $c_id = $row['course_id']; 
    $academic_year = $row['academic_year'];
}
}
if(isset($_POST['Add'])){
    
   if (!empty($_POST['batch_id']) && !empty ($_POST['course_id']) && !empty ($_POST['academic_year'])){
       $batch_id = $_POST['batch_id'];
       $c_id = $_POST['course_id'];
       $academic_year = $_POST['academic_year'];
      $sql = "INSERT INTO `batch`(`batch_id`, `course_id`, `academic_year`) VALUES ('$batch_id ','$c_id','$academic_year')";
       if (mysqli_query($con, $sql)){
           echo '<a class = "text-success"><div class="fa-1.5x"><i class="fas fa-spinner fa-pulse "></i>Insert Success</div></a>';
       }else{
           echo "Error:" .$sql. "<br>". mysqli_error($con);
       }
   }
    // echo "Add";
}

if(isset($_POST['Edit']))
{
   
    if(!empty($_POST['batch_id']) 
    && !empty($_POST['course_id']) 
    && !empty($_POST['academic_year']) 
    && !empty($_GET['edit']))
  //{/
    
        //$c_id = $_POST['course_id'];
        $academic_year = $_POST['academic_year'];
        $batch_id = $_GET['edit'];

        $sql = "UPDATE `batch` SET `academic_year`='$academic_year' WHERE `batch_id`='$batch_id' and `course_id`='$c_id'";

        if (mysqli_query($con, $sql))
        {
            echo '<a class = "text-success"><div class="fa-1.5x"><i class="fas fa-spinner fa-pulse "></i>Edit Success</div></a>';
        }else
        {
            echo "Error:" .$sql. "<br>". mysqli_error($con);
        }
    //}
    // echo "EDIT";
}

?>
<br><br>
<div class = "mx-auto">
<form method = "POST">
<div class ="row">
<div class ="col-6">
<label for="Duration-Institute Training">Batch ID</label>
<input class="form-control" type = "text" name= "batch_id" value ="<?php echo $batch_id;?>" placeholder="Batch ID" required><br></div>

<div class ="col-6">
<label for="Duration-Institute Training">Course ID</label>
<select class="custom-select mr-sm-2"  name="course_id" required >
        <option  value="null" selected disabled>Select Course ID</option>
            <?php          
            $sql = "SELECT * FROM `course`";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                echo '<option  value="'.$row["course_id"].'"required';
                if($row["course_id"]==$c_id) echo ' selected';
                echo '>'.$row["course_id"].'</option>';
                }
            }
            ?>
            </select>
            </div>
<div class ="col-6">
<label for="Duration-Institute Training">Select Academic Year</label>
<select class="custom-select mr-sm-2"  name="academic_year" >
        <option value="null" selected disabled>Select Academic Year</option>
            <?php          
            $sql = "SELECT distinct academic_year FROM `academic`";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                echo '<option  value="'.$row["academic_year"].'" required';
                if($row["academic_year"]==$academic_year) echo ' selected';
                echo '>'.$row["academic_year"].'</option>';
                }
            }
            ?>
           </select>
</div>
</div>
<br>
</div>
<?php
if(isset($_GET['edit'])){
    echo '<input type = "submit" value="Edit" name="Edit"<a href="" class="btn btn-sm btn-success" role="button" aria-pressed="true"></a> '; 
    echo '<a href="BatchDetails" class="btn btn-sm btn-primary" role="button" aria-pressed="true">Back</a>';
}else{
    echo '<input type="submit" value = "Add" name="Add" <a href="" class="btn btn-sm btn-success" role="button" aria-pressed="true"></a> ';
    echo '<a href="BatchDetails" class="btn btn-sm btn-primary" role="button" aria-pressed="true">Back</a>';
}




?>
<!-- <a href="" class="btn btn-success" role="button" aria-pressed="true">Add</a>
<a href="" class="btn btn-success" role="button" aria-pressed="true">Delete</a>
<a href="" class="btn btn-success" role="button" aria-pressed="true">Edit</a>
<a href="BatchDetails" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
<br> -->
<!-- END YOUR CODER HERE -->

    <!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
    <?php 
    include_once("footer.php");
    ?>
    <!-- END DON'T CHANGE THE ORDER -->