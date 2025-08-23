<?php
// hostel/blocks_api.php - returns JSON blocks for a hostel
require_once(__DIR__ . '/../config.php');
header('Content-Type: application/json');
if (!isset($_GET['hostel_id'])) { echo json_encode([]); exit; }
$hid = (int)$_GET['hostel_id'];
$res = mysqli_query($con, "SELECT id, name FROM hostel_blocks WHERE hostel_id=".$hid." ORDER BY name");
$out = [];
while ($res && $row = mysqli_fetch_assoc($res)) { $out[] = ['id'=>(int)$row['id'], 'name'=>$row['name']]; }
echo json_encode($out);
