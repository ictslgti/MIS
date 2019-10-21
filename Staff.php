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
<div class="pt-2 bg-white ">
    <h1 class="display-4 text-center">Staff   Details</h1>
    <p class="text-center">List of teacher's details</p>
</div>


<form method="GET">
    <div class="form-row">
        <div class="col-6">
            <div class="form-row align-items-center">
                <select class="selectpicker mr-sm-2" id="department_id" name="department_id" data-live-search="true" data-width="100%">
                    <option value="null" selected disabled>-- Select a department --</option>
                    <?php
          $sql = "SELECT * FROM `department`";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo '<option  value="'.$row["department_id"].'" required>'.$row["department_name"].'</option>';
          }
          }else{
            echo '<option value="null"  selected disabled>-- No department --</option>';
          }
          ?>
                </select>
            </div>
        </div>

        <div class="col-5">
            <div class="form-row align-items-center">
                <select class="selectpicker mr-sm-2" id="staff_position_type_id"  name="staff_position_type_id" data-live-search="true" data-width="100%">
                    <option value="null" selected disabled>-- Select a Position --</option>
                    <?php
          $sql = "SELECT * FROM `staff_position_type` ORDER BY `staff_position` ASC";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo '<option  value="'.$row["staff_position_type_id"].'" required>'.$row["staff_position_type_name"].'</option>';
          }
          }else{
            echo '<option value="null"  selected disabled>-- 0 Position --</option>';
          }
          ?>
                </select>
            </div>
        </div>
        <div class="col-1">
            <div class="form-row align-items-center">
                <button type="button" class="btn btn-primary btn-block" onclick="showTeacher()"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
</form>


<div class="row">
    <table class="table m-2">
        <thead class="bg-dark">
            <tr class="text-white">
                <th>Full Name</th>
                <th>Department</th>
                <th>Position</th>
                <th>Contact Number</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
        <tbody id="Teacher">
    </table>
</div>
<script>
function showTeacher() {
    var tid = document.getElementById("department_id").value;
    var cid = document.getElementById("staff_position_type_id").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("Teacher").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "controller/getTeacher", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("Staff=1&department_id=" + tid + "&staff_position_type_id=" + cid);
}
</script>
<!--END OF YOUR COD-->
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->


