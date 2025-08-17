<!------START DON'T CHANGE ORDER HEAD,MANU,FOOTER----->
<!---BLOCK 01--->
<?php 
include_once("../config.php");

// Initialize database connection
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

$title ="STUDENT PROFILE | SLGTI";
include_once("../head.php");
include_once("../menu.php");
?>
<!----END DON'T CHANGE THE ORDER---->

<br>
<h1 style="text-align:center"> SLGTI STUDENTS' INFORMATION </h1>
<br><br>

<div class="form-row">
    <a href="Student.php" class="btn btn-success">Back</a>
</div><br>

<?php
// Handle delete action
if(isset($_GET['delete'])) {
    $student_id = mysqli_real_escape_string($con, $_GET['delete']);
    $sql = "DELETE FROM `student` WHERE `student_id` = '$student_id'";
    if(mysqli_query($con, $sql)) {
        echo "<div class='alert alert-success'>Record deleted successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error deleting record: " . mysqli_error($con) . "</div>";
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
    </thead>
    <tbody>
    <?php
    if(isset($_GET['student_id'])) {
        $st_id = mysqli_real_escape_string($con, $_GET['student_id']);
        $sql = "SELECT student_status, student_zip, student_district, student_divisions,
                student_blood, student_em_name, student_em_address, student_em_phone, student_em_relation
                FROM student WHERE student_id = '$st_id'";
        
        $result = mysqli_query($con, $sql);
        
        if ($result && mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr style="text-align:center">
                    <td>'. htmlspecialchars($row["student_status"]) . '</td>
                    <td>'. htmlspecialchars($row["student_zip"]) . '</td>
                    <td>'. htmlspecialchars($row["student_district"]) . '</td>
                    <td>'. htmlspecialchars($row["student_divisions"]) . '</td>
                    <td>'. htmlspecialchars($row["student_blood"]) . '</td>
                    <td>'. htmlspecialchars($row["student_em_name"]) . '</td>
                    <td>'. htmlspecialchars($row["student_em_address"]) . '</td>
                    <td>'. htmlspecialchars($row["student_em_phone"]) . '</td>
                    <td>'. htmlspecialchars($row["student_em_relation"]) . '</td>
                    <td>
                        <a href="edit_student.php?id=' . $st_id . '" class="btn btn-warning btn-sm">Edit</a>
                        <a href="?delete=' . $st_id . '" class="btn btn-danger btn-sm" 
                           onclick="return confirm(\'Are you sure you want to delete this student?\')">Delete</a>
                    </td>
                </tr>';
            }
        } else {
            echo '<tr><td colspan="10" class="text-center">No student found with the given ID</td></tr>';
        }
        
        if ($result) {
            mysqli_free_result($result);
        }
    } else {
        echo '<tr><td colspan="10" class="text-center">No student ID provided</td></tr>';
    }
    ?>
    </tbody>
</table>

<?php 
// Close the database connection
mysqli_close($con);
include_once("../footer.php"); 
?>