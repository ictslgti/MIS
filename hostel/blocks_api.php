<?php
// hostel/blocks_api.php - returns JSON blocks for a hostel
require_once(__DIR__ . '/../config.php');
header('Content-Type: application/json');
if (!isset($_GET['hostel_id'])) { echo json_encode([]); exit; }
$hid = (int)$_GET['hostel_id'];

// Determine warden gender if WAR
$wardenGender = null;
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'WAR' && !empty($_SESSION['user_name'])) {
  if ($st = mysqli_prepare($con, "SELECT staff_gender FROM staff WHERE staff_id=? LIMIT 1")) {
    mysqli_stmt_bind_param($st, 's', $_SESSION['user_name']);
    mysqli_stmt_execute($st);
    $rs = mysqli_stmt_get_result($st);
    if ($rs) { $r = mysqli_fetch_assoc($rs); if ($r && isset($r['staff_gender'])) { $wardenGender = $r['staff_gender']; } }
    mysqli_stmt_close($st);
  }
}

// Build query with hostel gender constraint for WAR
if ($wardenGender) {
  $sql = "SELECT b.id, b.name FROM hostel_blocks b INNER JOIN hostels h ON h.id=b.hostel_id WHERE b.hostel_id=? AND (h.gender='Mixed' OR h.gender=?) ORDER BY b.name";
  $stmt = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stmt, 'is', $hid, $wardenGender);
} else {
  $sql = "SELECT b.id, b.name FROM hostel_blocks b WHERE b.hostel_id=? ORDER BY b.name";
  $stmt = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stmt, 'i', $hid);
}

$out = [];
if ($stmt) {
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  while ($res && $row = mysqli_fetch_assoc($res)) { $out[] = ['id'=>(int)$row['id'], 'name'=>$row['name']]; }
  mysqli_stmt_close($stmt);
}
echo json_encode($out);
