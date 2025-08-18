<!-- BLOCK#1 START DON'T CHANGE THE ORDER -->
<?php 
$title = "Batch Details | SLGTI" ;
include_once("../config.php"); 
include_once("../head.php"); 
include_once("../menu.php");
 ?>
<!-- END DON'T CHANGE THE ORDER -->

<!-- BLOCK#2 START YOUR CODER HERE -->
<div class="shadow p-3 mb-5  alert bg-dark rounded  text-white text-center" role="alert">

        <div class="highlight-blue">
            <div class="container">
                <div class="intro">
                    <h1 class="display-3 text-center">Batch Details</h1>
                    <h3 class="display-10 text-center"></h3>
                    <!-- <p class="text-center"></p> -->

                </div>
            </div>
        </div>
    </div>
<!-- <h1>Batch Details of ICT Department</h1> -->

<?php if(($_SESSION['user_type'] =='ADM')) { ?> <a href="AddNewBatch" button type="button" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Add New Batch </a><?php }?> 
<!-- <button type="button" class="btn btn-success">+ Add New Batch</button> -->
<br><br>
<table class="table table-hover">
  <thead class="thead-dark">
 
    <tr >
    <th scope="col">Batch_ID</th>
      <th scope="col">Course_ID</th>
      <th scope="col">Academic Year</th>
      <?php if(($_SESSION['user_type'] =='ADM')) { ?> <th scope="col">Options</th><?php } elseif(($_SESSION['user_type'] =='HOD')) { ?> <th scope="col">Students</th><?php }?> 

     
      
    </tr>
  </thead>
  <tbody>
 
  <tr class="table-light">
      
<!--    
      <td>5IT01</td>
<td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"><div class="btn-group mr-2" role="group" aria-label="First group">
<a href="module" class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;NVQ Level - 05</i></a> 
      <td>2018/2019 <span class="badge badge-success">Active </span> </td> 
      <td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group"> -->
  
    </tr>
    <?php
    // Role flags
    $isADM = isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'ADM';
    $isHOD = isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'HOD';
    $deptCode = isset($_SESSION['department_code']) ? $_SESSION['department_code'] : null;

    // Determine department id to filter by
    $id = null;
    if ($isHOD && !empty($deptCode)) {
        $id = mysqli_real_escape_string($con, $deptCode);
    } elseif (isset($_GET['batch'])) {
        $id = mysqli_real_escape_string($con, $_GET['batch']);
    }

    if ($id !== null) {
        $sql = "SELECT b.batch_id, b.course_id, b.academic_year
                FROM batch AS b
                JOIN course AS c ON c.course_id = b.course_id
                JOIN department AS d ON d.department_id = c.department_id
                WHERE d.department_id = '$id'";
        $result = mysqli_query($con, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '  <td>'. htmlspecialchars($row['batch_id']) .'</td>';
                echo '  <td>'. htmlspecialchars($row['course_id']) .'</td>';
                echo '  <td>'. htmlspecialchars($row['academic_year']) .'</td>';
                if ($isADM) {
                    echo '  <td>';
                    echo '    <a href="BatchDetails.php?batch='.urlencode($id).'&BSt='.urlencode($row['course_id']).'&AcY='.urlencode($row['academic_year']).'#students" class="btn btn-sm btn-primary" role="button" aria-pressed="true"><i class="fas fa-user-graduate">&nbsp;&nbsp;Students</i></a> ';
                    echo '    <a href="AddNewBatch.php?edit='.urlencode($row['batch_id']).'" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a> ';
                    echo '    <button class="btn btn-sm btn-danger" data-href="?delete='.htmlspecialchars($row['batch_id']).'" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i></button>';
                    echo '  </td>';
                } elseif ($isHOD) {
                    echo '  <td>';
                    echo '    <a href="BatchDetails.php?batch='.urlencode($id).'&BSt='.urlencode($row['course_id']).'&AcY='.urlencode($row['academic_year']).'#students" class="btn btn-sm btn-primary" role="button" aria-pressed="true"><i class="fas fa-user-graduate">&nbsp;&nbsp;Students</i></a> ';
                    echo '  </td>';
                }
                echo '</tr>';
            }
        } else {
            echo '0 results';
        }
    } else {
        echo '0 results';
    }
    ?>
   
    <!-- <tr class="table-light">
      <td>5IT01</td>
<td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"><div class="btn-group mr-2" role="group" aria-label="First group">
<a href="module" class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;NVQ Level - 04</i></a> 
      <td>2018/2019 <span class="badge badge-success">Active </span></td> 
      <td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
  <a href="BatchStudent" class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;&nbsp;Students</i></a>
    </tr>
   

    <tr class="table-light">
      <td>5IT02</td>
      <td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"><div class="btn-group mr-2" role="group" aria-label="First group">
  <a href="module" class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;NVQ Level - 05</i></a>
      <td>2019/2020 <span class="badge badge-success">New </span></td> 
      <td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
  <a href="BatchStudent" class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;&nbsp;Students</i></a>
    </tr>

    <tr class="table-light">
      <td>5IT02</td>
      <td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"><div class="btn-group mr-2" role="group" aria-label="First group">
  <a href="module" class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;NVQ Level - 04</i></a>  
      <td>2019/2020 <span class="badge badge-success">New </span></td> 
      <td><div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
  <a href="BatchStudent" class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;&nbsp;Students</i></a>
    </tr> -->


  </tbody>
  </form>
</table>
<?php
// Inline student details viewer (HOD/Admin)
if (isset($_GET['BSt']) && isset($_GET['AcY'])) {
    $isADM = isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'ADM';
    $isHOD = isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'HOD';
    $deptCode = isset($_SESSION['department_code']) ? $_SESSION['department_code'] : null;

    $C_id = mysqli_real_escape_string($con, $_GET['BSt']);
    $academic_year = mysqli_real_escape_string($con, $_GET['AcY']);

    // Build base student query
    $stuSql = "SELECT se.student_enroll_date,
                      s.student_fullname,
                      s.student_id,
                      se.student_enroll_status
               FROM student_enroll se
               LEFT JOIN student s ON s.student_id = se.student_id
               WHERE se.course_id = '$C_id'
                 AND se.academic_year = '$academic_year'";

    // If HOD, ensure the requested course belongs to their department
    if ($isHOD && !empty($deptCode)) {
        $deptEsc = mysqli_real_escape_string($con, $deptCode);
        $stuSql .= " AND EXISTS (SELECT 1 FROM course c WHERE c.course_id = se.course_id AND c.department_id = '$deptEsc')";
    }

    $stuRes = mysqli_query($con, $stuSql);

    echo '<div id="students" class="mt-4">';
    echo '  <div class="highlight-blue"><h3 class="text-center">Students - '.htmlspecialchars($C_id).' ('.htmlspecialchars($academic_year).')</h3></div>';
    echo '  <div class="table-responsive">';
    echo '    <table class="table table-hover">';
    echo '      <thead class="thead-dark">';
    echo '        <tr><th>Student_ID</th><th>Student Name</th><th>Enroll Date</th><th>Status</th></tr>';
    echo '      </thead><tbody>';
    if ($stuRes && mysqli_num_rows($stuRes) > 0) {
        while ($sr = mysqli_fetch_assoc($stuRes)) {
            echo '<tr>';
            echo '  <td>'.htmlspecialchars($sr['student_id']).'</td>';
            echo '  <td>'.htmlspecialchars($sr['student_fullname']).'</td>';
            echo '  <td>'.htmlspecialchars($sr['student_enroll_date']).'</td>';
            echo '  <td>'.htmlspecialchars($sr['student_enroll_status']).'</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="4">0 results</td></tr>';
    }
    echo '      </tbody>';
    echo '    </table>';
    echo '  </div>';
    echo '</div>';
}
// Admin-only delete
if (isset($_GET['delete'])) {
    $isADM = isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'ADM';
    if ($isADM) {
        $batch_id = mysqli_real_escape_string($con, $_GET['delete']);
        $sql = "DELETE FROM `batch` WHERE `batch_id` = '$batch_id'";
        if (mysqli_query($con, $sql)){
            echo '<a class="text-danger"><div class="fa-1.5x"><i class="fas fa-trash fa-pulse"></i>&nbsp;&nbsp;Delete Success</div></a>';
        } else {
            echo 'Error deleting record: '. htmlspecialchars(mysqli_error($con));
        }
    } else {
        echo '<div class="alert alert-warning">Unauthorized action.</div>';
    }
}
?>
<a href="Department" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
<br>
<!-- END YOUR CODER HERE -->

    <!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
    <?php 
    include_once("../footer.php");
    ?>
    <!-- END DON'T CHANGE THE ORDER -->