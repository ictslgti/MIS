<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "InventoryReport | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
$today = date('Y-m-d');
?>
<!--END DON'T CHANGE THE ORDER-->

<div class="row">
    <div class="col-md-12 col-sm-12">
        <h3 class="text-center">InventoryReport</h3>
    </div>
</div>

<form method="GET">
    <div class="form-row pb-4">
        <div class="col-3">
            <div class="form-row align-items-center">
                <select class="selectpicker mr-sm-2" id="TeacherName" name="staff_id" data-live-search="true"
                    data-width="100%">
                    <option value="null" selected disabled>-- Select a Teacher --</option>
                    <?php
          $sql = "SELECT * FROM `staff`";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo '<option  value="'.$row["staff_id"].'"'; 
            if($_SESSION['user_name']==$row["staff_id"]) echo 'selected ';
            echo 'required>('.$row["staff_epf"].') '.$row["staff_name"].'</option>';
          }
          }else{
            echo '<option value="null"   selected disabled>-- No Teacher --</option>';
          }
          ?>
                </select>
            </div>
        </div>

        <div class="col-md-3 col-sm-12">
            <div class="form-row align-items-center">
                <select class="selectpicker mr-sm-2" id="Course" onchange="showModule(this.value)" name="course_id"
                    data-live-search="true" data-width="100%">
                    <option value="null" selected disabled>-- Select a Course --</option>
                    <?php
          $sql = "SELECT * FROM `course`";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo '<option  value="'.$row["course_id"].'" required>('.$row["course_id"].') '.$row["course_name"].'</option>';
          }
          }else{
            echo '<option value="null"   selected disabled>-- No Teacher --</option>';
          }
          ?>
                </select>
            </div>
        </div>

        <div class="col-md-3 col-sm-12">
            <div class="form-row align-items-center">
                
            <button type="submit" value="Add" name="Add" class="btn btn-primary">ADD</button>
            </div>
        </div>
        

     
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->