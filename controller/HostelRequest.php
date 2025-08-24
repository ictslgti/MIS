<?php
// controller/HostelRequest.php
// Accepts POST: student_id, distance_km (or distance). Upserts into hostel_requests as pending_payment.

require_once(__DIR__ . '/../config.php');

function redirect_with($path, $params = []){
  $base = defined('APP_BASE') ? APP_BASE : '';
  $qs = http_build_query($params);
  header('Location: ' . $base . $path . ($qs ? ('?' . $qs) : ''));
  exit;
}

// Always send user back to the student request page
$returnPath = '/student/RequestHostel.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo 'Method Not Allowed';
  exit;
}

$student_id = isset($_POST['student_id']) ? trim($_POST['student_id']) : '';
$distance_in = '';
if (isset($_POST['distance_km'])) { $distance_in = trim($_POST['distance_km']); }
elseif (isset($_POST['distance'])) { $distance_in = trim($_POST['distance']); }

if ($student_id === '' && isset($_SESSION['user_name'])) {
  $student_id = $_SESSION['user_name'];
}

// Extract numeric from distance and format to decimal(6,2)
$distance_num = preg_replace('/[^0-9.]/', '', $distance_in);
if ($student_id === '' || $distance_num === '' || !is_numeric($distance_num)) {
  redirect_with($returnPath, ['err' => 'invalid']);
}
$distance_km = number_format((float)$distance_num, 2, '.', '');

// Ensure table exists with the expected schema
$createSql = "CREATE TABLE IF NOT EXISTS `hostel_requests` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `student_id` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `distance_km` decimal(6,2) NOT NULL,
  `status` enum('pending_payment','paid','allocated','rejected') NOT NULL DEFAULT 'pending_payment',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_student` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci";
mysqli_query($con, $createSql);

$stmt = mysqli_prepare($con, "INSERT INTO hostel_requests (student_id, distance_km, status)
  VALUES (?, ?, 'pending_payment')
  ON DUPLICATE KEY UPDATE distance_km=VALUES(distance_km), status='pending_payment', updated_at=CURRENT_TIMESTAMP");
if (!$stmt) {
  redirect_with($returnPath, ['err' => 'prep']);
}
mysqli_stmt_bind_param($stmt, 'sd', $student_id, $distance_km);
$ok = mysqli_stmt_execute($stmt);
$stmtErr = mysqli_stmt_error($stmt);
mysqli_stmt_close($stmt);

if ($ok) {
  redirect_with($returnPath, ['ok' => 1]);
} else {
  // Surface DB error for quicker diagnosis
  redirect_with($returnPath, ['err' => 'save', 'msg' => substr($stmtErr, 0, 180)]);
}

