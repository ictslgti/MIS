<?php
// hostel/rooms_api.php - returns JSON rooms for a block including occupancy
require_once(__DIR__ . '/../config.php');
header('Content-Type: application/json');
if (!isset($_GET['block_id'])) { echo json_encode([]); exit; }
$bid = (int)$_GET['block_id'];
$sql = "SELECT r.id, r.room_no, r.capacity,
        (SELECT COUNT(*) FROM hostel_allocations a WHERE a.room_id=r.id AND a.status='active') AS occupied
        FROM hostel_rooms r WHERE r.block_id={$bid} ORDER BY r.room_no";
$res = mysqli_query($con, $sql);
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
