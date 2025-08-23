<?php
// controller/HostelPaymentConfirm.php
// Marks a hostel request as paid. Intended for ADM/Warden users.

require_once(__DIR__ . '/../config.php');

function redirect_back($params = []){
  $base = defined('APP_BASE') ? APP_BASE : '';
  $dest = isset($_GET['back']) ? $_GET['back'] : '/hostel/Hostel.php';
  $qs = http_build_query($params);
  header('Location: ' . $base . $dest . ($qs ? ('?' . $qs) : ''));
  exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); echo 'Method Not Allowed'; exit; }

if (!isset($_SESSION['user_type']) || !in_array($_SESSION['user_type'], ['ADM'])) {
  http_response_code(403);
  echo 'Forbidden';
  exit;
}

$student_id = isset($_POST['student_id']) ? trim($_POST['student_id']) : '';
if ($student_id === '') { redirect_back(['err' => 'invalid']); }

// Ensure hostel_requests exists (safety)
mysqli_query($con, "CREATE TABLE IF NOT EXISTS `hostel_requests` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `student_id` varchar(64) NOT NULL,
  `distance_km` decimal(6,2) NOT NULL DEFAULT 0,
  `status` enum('pending_payment','paid','allocated','rejected') NOT NULL DEFAULT 'pending_payment',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_student` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

$stmt = mysqli_prepare($con, "UPDATE hostel_requests SET status='paid' WHERE student_id=?");
if (!$stmt) { redirect_back(['err' => 'db']); }
mysqli_stmt_bind_param($stmt, 's', $student_id);
$ok = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

if ($ok && mysqli_affected_rows($con) > 0) {
  redirect_back(['ok' => 1]);
} else {
  redirect_back(['err' => 'notfound']);
}
