<!------START DON'T CHANGE ORDER HEAD,MANU,FOOTER----->
<!---BLOCK 01--->
<?php 
// Include config file first
require_once("../config.php");

// Database connection
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$title = "STUDENT ENROLLMENT REPORT | SLGTI";
include_once("../head.php");
include_once("../menu.php");
?>
<!----END DON'T CHANGE THE ORDER---->

<!---BLOCK 02--->
<div class="container-fluid px-4">
    <h4 class="mt-4">Enrollment Report</h4>
    
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Student ID</th>
                            <th>Course ID</th>
                            <th>Course Mode</th>
                            <th>Academic Year</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT `student_id`, `course_id`, `course_mode`, `academic_year` 
                                FROM `student_enroll` 
                                ORDER BY `academic_year` DESC, `student_id`";
                        $result = mysqli_query($con, $sql);
                        
                        if ($result && mysqli_num_rows($result) > 0) {
                            $count = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $count++ . "</td>";
                                echo "<td>" . htmlspecialchars($row['student_id']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['course_id']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['course_mode']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['academic_year']) . "</td>";
                                echo "<td>
                                        <a href='StudentReEnroll.php?student_id=" . urlencode($row['student_id']) . "&year=" . urlencode($row['academic_year']) . "' 
                                           class='btn btn-primary btn-sm'>
                                            <i class='fas fa-edit'></i> Edit
                                        </a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
// Close connection
mysqli_close($con);
include_once("../footer.php");
?>