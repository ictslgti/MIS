<?php
// controller/HostelRequest.php
// Accepts POST: student_id, distance_km. Creates or updates a hostel request as pending_payment.

require_once(__DIR__ . '/../config.php');

function redirect_with($path, $params = []){
  $base = defined('APP_BASE') ? APP_BASE : '';
  $qs = http_build_query($params);
  header('Location: ' . $base . $path . ($qs ? ('?' . $qs) : ''));
  exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo 'Method Not Allowed';
  exit;
}

$student_id = isset($_POST['student_id']) ? trim($_POST['student_id']) : '';
$distance_km = isset($_POST['distance_km']) ? trim($_POST['distance_km']) : '';

if ($student_id === '' && isset($_SESSION['user_name'])) {
  $student_id = $_SESSION['user_name'];
}

if ($student_id === '' || $distance_km === '' || !is_numeric($distance_km)) {
  redirect_with('/hostel/RequestHostel.php', ['err' => 'invalid']);
}

$distance_km = number_format((float)$distance_km, 2, '.', '');

// Ensure table exists (optional safety)
mysqli_query($con, "CREATE TABLE IF NOT EXISTS `hostel_requests` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `student_id` varchar(64) NOT NULL,
  `distance_km` decimal(6,2) NOT NULL,
  `status` enum('pending_payment','paid','allocated','rejected') NOT NULL DEFAULT 'pending_payment',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_student` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

$stmt = mysqli_prepare($con, "INSERT INTO hostel_requests (student_id, distance_km, status) VALUES (?, ?, 'pending_payment')
  ON DUPLICATE KEY UPDATE distance_km=VALUES(distance_km), status='pending_payment'");
if (!$stmt) {
  redirect_with('/hostel/RequestHostel.php', ['err' => 'db']);
}
mysqli_stmt_bind_param($stmt, 'sd', $student_id, $distance_km);
$ok = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

if ($ok) {
  redirect_with('/hostel/RequestHostel.php', ['ok' => 1]);
} else {
  redirect_with('/hostel/RequestHostel.php', ['err' => 'save']);
}
