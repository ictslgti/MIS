<?php
// Include database configuration
require_once __DIR__ . '/../config.php';

// Get student ID from query string
$student_id = isset($_GET['Sid']) ? $_GET['Sid'] : null;

if (!$student_id) {
    // Default image if no student ID is provided
    header('Content-Type: image/png');
    readfile(__DIR__ . '/../img/profile/user.png');
    exit;
}

// Query to get the student's profile image
$sql = "SELECT student_profile_img FROM student WHERE student_id = ?";
$stmt = mysqli_prepare($con, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, 's', $student_id);
    mysqli_stmt_execute($stmt);
    // Buffer result to ensure full BLOB retrieval on some setups
    mysqli_stmt_store_result($stmt);
    // Use bind_result/fetch for compatibility when mysqlnd is not available
    mysqli_stmt_bind_result($stmt, $imgData);
    if (mysqli_stmt_fetch($stmt)) {
        if (!empty($imgData)) {
            // Some databases store base64-encoded strings. Try to detect and decode.
            $raw = $imgData;
            $maybeDecoded = base64_decode($imgData, true);
            if ($maybeDecoded !== false && strlen($maybeDecoded) > 0) {
                $raw = $maybeDecoded;
            }
            // Detect MIME type when possible
            $mime = 'image/jpeg';
            if (class_exists('finfo')) {
                $fi = new finfo(FILEINFO_MIME_TYPE);
                if ($fi) {
                    $detected = $fi->buffer($raw);
                    if ($detected) { $mime = $detected; }
                }
            }
            header('Content-Type: ' . $mime);
            header('Content-Length: ' . strlen($raw));
            echo $raw;
            mysqli_stmt_close($stmt);
            exit;
        }
    }
    mysqli_stmt_close($stmt);
}

// If no image found in database or any error occurred, return default image
header('Content-Type: image/png');
readfile(__DIR__ . '/../img/profile/user.png');
?>
