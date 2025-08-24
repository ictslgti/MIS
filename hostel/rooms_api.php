<?php
// hostel/rooms_api.php - returns JSON rooms for a block including occupancy
require_once(__DIR__ . '/../config.php');
header('Content-Type: application/json');
if (!isset($_GET['block_id'])) { echo json_encode([]); exit; }
$bid = (int)$_GET['block_id'];

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

if ($wardenGender) {
  $sql = "SELECT r.id, r.room_no, r.capacity,
                 (SELECT COUNT(*) FROM hostel_allocations a WHERE a.room_id=r.id AND a.status='active') AS occupied
          FROM hostel_rooms r
          INNER JOIN hostel_blocks b ON b.id = r.block_id
          INNER JOIN hostels h ON h.id = b.hostel_id
          WHERE r.block_id = ? AND (h.gender='Mixed' OR h.gender=?)
          ORDER BY r.room_no";
  $stmt = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stmt, 'is', $bid, $wardenGender);
} else {
  $sql = "SELECT r.id, r.room_no, r.capacity,
                 (SELECT COUNT(*) FROM hostel_allocations a WHERE a.room_id=r.id AND a.status='active') AS occupied
          FROM hostel_rooms r
          WHERE r.block_id = ?
          ORDER BY r.room_no";
  $stmt = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stmt, 'i', $bid);
}

if ($stmt) { mysqli_stmt_execute($stmt); $res = mysqli_stmt_get_result($stmt); }
$out = [];
while ($res && $row = mysqli_fetch_assoc($res)) {
  $out[] = [
    'id' => (int)$row['id'],
    'room_no' => $row['room_no'],
    'capacity' => (int)$row['capacity'],
    'occupied' => (int)$row['occupied']
  ];
}
echo json_encode($out);
