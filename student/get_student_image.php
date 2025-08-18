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
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        // If image data exists in the database
        if (!empty($row['student_profile_img'])) {
            // Output the image with appropriate headers
            header('Content-Type: image/jpeg');
            echo $row['student_profile_img'];
            exit;
        }
    }
    
    mysqli_stmt_close($stmt);
}

// If no image found in database or any error occurred, return default image
header('Content-Type: image/png');
readfile(__DIR__ . '/../img/profile/user.png');
?>
