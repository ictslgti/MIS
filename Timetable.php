<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Timetable | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
$today = date('Y-m-d');
?>
<!--END DON'T CHANGE THE ORDER-->


<?php
$department_id=$course_id=$module_id=$academic_year=$staff_id=$weekdays=$timep=$classroom=$start_date=$end_date=$tid=null;
?>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <h3 class="text-center">Timetable</h3>
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
                <select class="custom-select mr-sm-2" id="Module" name="module_id">
                    <option value="null" selected disabled>-- Select a Course --</option>
                </select>
            </div>
        </div>

        <div class="col-md-2 col-sm-12">
            <div class="form-row align-items-center">
                <select class="selectpicker mr-sm-2" id="academic_year" name="academic_year" data-live-search="true"
                    data-width="100%">
                    <option value="null" selected disabled>-- Select a Academic Year --</option>
                    <?php
          $sql = "SELECT * FROM `academic` ORDER BY `academic_year` DESC";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo '<option  value="'.$row["academic_year"].'"'; 
            if($row["academic_year_status"]=='Active') echo ' selected ';
            echo 'required>'.$row["academic_year"].'</option>';
          }
          }else{
            echo '<option value="null"   selected disabled>-- No Teacher --</option>';
          }
          ?>
                </select>
            </div>
        </div>

        <div class="col-md-1 col-sm-12">
            <div class="form-row align-items-center">
                <button type="button" class="btn btn-primary btn-block ml-2" onclick="showTimetable()"><i
                        class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
</form>


<!--entries
<label>Show Entries <select name="dtHorizontalVerticalExample_length"
 aria-controls="dtHorizontalVerticalExample" class="custom-select custom-select-sm form-control form-control-sm">
    <option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label>
-->

<?php

?>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="table-responsive">
        <table id="dtHorizontalVerticalExample" >
                <thead>
                    <tr>
                        <th scope="col" class="p-3 bg-info text-light" style="width: 8%;">Date : <?php echo $today; ?>
                        
                        </th>
                        <?php
                         $weeks = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

                        foreach ($weeks as $value) {
                          ?>
                         <th scope="col" class="p-3 <?php if(date('l')==$value) echo ' bg-warning'; ?>" style="width: 6%;"> 
                         <?php echo $value; ?></th>
                    
                        <?php
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="align-middle" scope="row" style="height: 50px;">08:30 AM - 10.00 AM</th>
                        <?php
       
        foreach ($weeks as $value) {
            echo '<td class="align-middle ">';
            $sql = "SELECT * FROM `timetable` WHERE `weekdays` = '$value' AND `timep` = 'P1' AND `end_date` >= '$today'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) 

              
                echo '<p class="text-center alert-info border border-info p-2 rounded">'. $row['course_id'].'-'.$row['module_id'] . '
                 <span class="badge badge-dark"> '. $row['classroom'].'</span> <span class="badge badge-info"> '.$row['staff_id'] . ' </span> <p>';      
            }
            echo '</td>';   
        }
    ?>

                    </tr>
                    <tr class="table-secondary">
                        <th sclass="align-middle p-3" scope="row">10.00 AM - 10.30 AM</th>
                        <td class="align-middle text-center p-3" colspan="7">Tea Break</td>
                    </tr>
                    <tr>
                        <th class="align-middle" scope="row" style="height: 50px;">10:30 AM - 12.00 AM</th>
                        <?php
        foreach ($weeks as $value) {
            echo '<td class="align-middle ">';
            $sql = "SELECT * FROM `timetable` WHERE `weekdays` = '$value' AND `timep` = 'P2' AND `end_date` >= '$today'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) 
                echo '<p class="text-center alert-info border border-info p-2 rounded">'. $row['course_id'].'-'.$row['module_id'] . '
                 <span class="badge badge-dark"> '. $row['classroom'].'</span> <span class="badge badge-info"> '.$row['staff_id'] . ' </span> <p>';      
            }
            echo '</td>';   
        }
    ?>
                    </tr>
                    <tr class="table-secondary">
                        <th sclass="align-middle p-3" scope="row">12.00 AM - 01.00 PM</th>
                        <td class="align-middle text-center p-3" colspan="7">Lunch Break</td>
                    </tr>
                    <tr>
                        <th class="align-middle" scope="row" style="height: 50px;">01.00 PM - 02.30 PM</th>
                        <?php
        foreach ($weeks as $value) {
            echo '<td class="align-middle ">';
            $sql = "SELECT * FROM `timetable` WHERE `weekdays` = '$value' AND `timep` = 'P3' AND `end_date` >= '$today'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) 
                echo '<p class="text-center alert-info border border-info p-2 rounded">'. $row['course_id'].'-'.$row['module_id'] . '
                 <span class="badge badge-dark"> '. $row['classroom'].'</span> <span class="badge badge-info"> '.$row['staff_id'] . ' </span> <p>';      
            }
            echo '</td>';   
        }
    ?>
                    </tr>
                    <tr class="table-secondary">
                        <th sclass="align-middle p-3" scope="row">02.30 PM - 02.45 PM</th>
                        <td class="align-middle text-center p-3" colspan="7">Tea Break</td>
                    </tr>
                    <tr>
                        <th class="align-middle" scope="row" style="height: 50px;">02.45 PM - 04.15 PM</th>
                        <?php
        foreach ($weeks as $value) {
            echo '<td class="align-middle ">';
            $sql = "SELECT * FROM `timetable` WHERE `weekdays` = '$value' AND `timep` = 'P4' AND `end_date` >= '$today'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) 
                echo '<p class="text-center alert-info border border-info p-2 rounded">'. $row['course_id'].'-'.$row['module_id'] . '
                 <span class="badge badge-dark"> '. $row['classroom'].'</span> <span class="badge badge-info"> '.$row['staff_id'] . ' </span> <p>';      
            }
            echo '</td>';   
        }
    ?>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>
<ul class="pagination"><li class="paginate_button page-item previous disabled" id="dtHorizontalExample_previous">
    <a href="#" aria-controls="dtHorizontalExample" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active">
        <a href="#" aria-controls="dtHorizontalExample" data-dt-idx="1" tabindex="0" class="page-link">1</a>
    </li><li class="paginate_button page-item next disabled" id="dtHorizontalExample_next">
    <a href="#" aria-controls="dtHorizontalExample" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul>

    <td>
         
    <td>
          <a href="AddTimetable.php? edit='.$row["department_id"].'"> Edit </a> |
          <a href="?Student_Id='.$row["department_id"].'"> View More
          </td>     
         </td>
        
<script>
function showModule(val) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("Module").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "controller/getModule", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("course=" + val);
}
</script>
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->