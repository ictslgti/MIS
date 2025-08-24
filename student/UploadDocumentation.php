<?php
// UploadDocumentation.php - upload a single consolidated PDF for a student
// BLOCK#1 START DON'T CHANGE THE ORDER
$title = "Upload Student Documentation | SLGTI";
include_once("../config.php");

// Allow Admins and MA2
if (!isset($_SESSION['user_type']) || !in_array($_SESSION['user_type'], ['ADM','MA2'])) {
  include_once("../head.php");
  include_once("../menu.php");
  http_response_code(403);
  echo '<div class="alert alert-danger m-3">Access denied.</div>';
  include_once("../footer.php");
  exit;
}

include_once("../head.php");
include_once("../menu.php");
// END DON'T CHANGE THE ORDER

function sp_safe($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

$errors = [];
$success = null;
$studentId = isset($_POST['student_id']) ? trim($_POST['student_id']) : (isset($_GET['Sid']) ? trim($_GET['Sid']) : '');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload_pdf'])) {
  if ($studentId === '') {
    $errors[] = 'Student ID is required.';
  } else {
    // Validate student exists
    $stmt = mysqli_prepare($con, "SELECT 1 FROM student WHERE student_id=? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 's', $studentId);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    if (!$res || mysqli_num_rows($res) !== 1) {
      $errors[] = 'Student not found.';
    }
    mysqli_stmt_close($stmt);
  }

  // Validate file
  if (empty($errors)) {
    if (!isset($_FILES['doc_pdf']) || $_FILES['doc_pdf']['error'] !== UPLOAD_ERR_OK) {
      $errors[] = 'Please select a PDF file to upload.';
    } else {
      $tmp = $_FILES['doc_pdf']['tmp_name'];
      $name = $_FILES['doc_pdf']['name'];
      $size = (int)$_FILES['doc_pdf']['size'];
      $type = mime_content_type($tmp);
      if ($size <= 0) {
        $errors[] = 'Empty file.';
      } elseif ($size > 15*1024*1024) {
        $errors[] = 'File too large (max 15MB).';
      } elseif (stripos($type, 'pdf') === false) {
        $errors[] = 'Only PDF files are accepted.';
      }
    }
  }

  if (empty($errors)) {
    // Ensure destination dir exists
    $destDir = __DIR__ . '/documentation';
    if (!is_dir($destDir)) {
      @mkdir($destDir, 0775, true);
    }

    $destPath = $destDir . '/' . preg_replace('/[^A-Za-z0-9_-]/', '_', $studentId) . '.pdf';
    if (!@move_uploaded_file($tmp, $destPath)) {
      // Some servers require copy
      $data = file_get_contents($tmp);
      if ($data === false || file_put_contents($destPath, $data) === false) {
        $errors[] = 'Failed to save file on server.';
      }
    }

    if (empty($errors)) {
      $relPath = 'student/documentation/' . preg_replace('/[^A-Za-z0-9_-]/', '_', $studentId) . '.pdf';

      // Ensure column student_profile_doc exists; if not, add it
      $hasCol = false;
      $dbNameRes = mysqli_query($con, 'SELECT DATABASE() as db');
      $dbRow = $dbNameRes ? mysqli_fetch_assoc($dbNameRes) : null;
      $dbName = $dbRow && isset($dbRow['db']) ? $dbRow['db'] : null;
      if ($dbName) {
        $check = mysqli_prepare($con, "SELECT 1 FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA=? AND TABLE_NAME='student' AND COLUMN_NAME='student_profile_doc' LIMIT 1");
        mysqli_stmt_bind_param($check, 's', $dbName);
        mysqli_stmt_execute($check);
        $cres = mysqli_stmt_get_result($check);
        $hasCol = ($cres && mysqli_num_rows($cres) === 1);
        mysqli_stmt_close($check);
      }

      if (!$hasCol) {
        // Try to add the column
        @mysqli_query($con, "ALTER TABLE student ADD COLUMN student_profile_doc VARCHAR(255) NULL");
      }

      // Update the path in student table if column now exists
      $hasCol2 = false;
      if ($dbName) {
        $check2 = mysqli_prepare($con, "SELECT 1 FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA=? AND TABLE_NAME='student' AND COLUMN_NAME='student_profile_doc' LIMIT 1");
        mysqli_stmt_bind_param($check2, 's', $dbName);
        mysqli_stmt_execute($check2);
        $cres2 = mysqli_stmt_get_result($check2);
        $hasCol2 = ($cres2 && mysqli_num_rows($cres2) === 1);
        mysqli_stmt_close($check2);
      }
      if ($hasCol2) {
        $up = mysqli_prepare($con, "UPDATE student SET student_profile_doc=? WHERE student_id=? LIMIT 1");
        mysqli_stmt_bind_param($up, 'ss', $relPath, $studentId);
        mysqli_stmt_execute($up);
        mysqli_stmt_close($up);
      }

      $success = 'Documentation uploaded successfully.';
    }
  }
}
?>

<div class="container mt-3">
  <div class="row">
    <div class="col-lg-6">
      <div class="card mb-3">
        <div class="card-header"><i class="fa fa-file-pdf"></i> Upload Student Documentation (PDF)</div>
        <div class="card-body">
          <?php if (!empty($errors)) { echo '<div class="alert alert-danger py-2">'.sp_safe(implode(' | ', $errors)).'</div>'; }
                if ($success) { echo '<div class="alert alert-success py-2">'.sp_safe($success).'</div>'; } ?>
          <form method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="student_id">Student ID</label>
              <input type="text" class="form-control" id="student_id" name="student_id" value="<?php echo sp_safe($studentId); ?>" placeholder="Enter Student ID" required>
              <small class="form-text text-muted">Use a valid Student Registration Number (e.g., 23CSE001).</small>
            </div>
            <div class="form-group">
              <label for="doc_pdf">PDF File</label>
              <input type="file" class="form-control-file" id="doc_pdf" name="doc_pdf" accept="application/pdf" required>
              <small class="form-text text-muted">Upload one consolidated PDF (max 15 MB) containing all scanned documents.</small>
            </div>
            <button type="submit" name="upload_pdf" value="1" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card mb-3">
        <div class="card-header"><i class="fa fa-info-circle"></i> Notes</div>
        <div class="card-body">
          <ul class="mb-0">
            <li><b>File name on server:</b> student/documentation/&lt;StudentID&gt;.pdf</li>
            <li><b>Saved path in DB:</b> student.student_profile_doc (auto-added if missing)</li>
            <li><b>Allowed type:</b> PDF only. Max size 15 MB.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once("../footer.php"); ?>
