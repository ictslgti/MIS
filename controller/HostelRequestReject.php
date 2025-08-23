<?php
// controller/HostelRequestReject.php
// Rejects a hostel request unless already allocated.
require_once(__DIR__ . '/../config.php');

function redirect_back_rr($params = []){
  $base = defined('APP_BASE') ? APP_BASE : '';
  $dest = isset($_GET['back']) ? $_GET['back'] : '/hostel/Requests.php';
  $qs = http_build_query($params);
  header('Location: ' . $base . $dest . ($qs ? ('?' . $qs) : ''));
  exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); echo 'Method Not Allowed'; exit; }
if (!isset($_SESSION['user_type']) || !in_array($_SESSION['user_type'], ['ADM','WAR'])) { http_response_code(403); echo 'Forbidden'; exit; }

$student_id = isset($_POST['student_id']) ? trim($_POST['student_id']) : '';
if ($student_id === '') { redirect_back_rr(['err' => 'invalid']); }

// Ensure not allocated
$st = mysqli_prepare($con, "SELECT status FROM hostel_requests WHERE student_id=?");
mysqli_stmt_bind_param($st, 's', $student_id);
mysqli_stmt_execute($st);
mysqli_stmt_bind_result($st, $status);
$found = mysqli_stmt_fetch($st);
mysqli_stmt_close($st);
if (!$found) { redirect_back_rr(['err' => 'notfound']); }
if ($status === 'allocated') { redirect_back_rr(['err' => 'allocated']); }

$up = mysqli_prepare($con, "UPDATE hostel_requests SET status='rejected' WHERE student_id=?");
if (!$up) { redirect_back_rr(['err' => 'db']); }
mysqli_stmt_bind_param($up, 's', $student_id);
$ok = mysqli_stmt_execute($up);
mysqli_stmt_close($up);

redirect_back_rr($ok ? ['ok'=>1] : ['err'=>'save']);
