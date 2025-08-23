<?php
// controller/StudentSearch.php
// Returns JSON suggestions for students by NIC or student_id
// Access: restrict to ADM (same as StudentIDPhoto)

require_once(__DIR__ . '/../config.php');
header('Content-Type: application/json');

function json_response($data, $status = 200){
  http_response_code($status);
  echo json_encode($data);
  exit;
}

function require_admin(){
  if (!isset($_SESSION['user_type']) || !in_array($_SESSION['user_type'], ['ADM'])) {
    json_response(['error' => 'Forbidden'], 403);
  }
}

function search_students($con, $q, $type){
  // Use contains match to find anywhere in the field
  $sql = ($type === 'nic')
    ? "SELECT student_id, student_fullname, student_nic FROM student WHERE student_nic LIKE CONCAT('%', ?, '%') ORDER BY student_nic ASC LIMIT 10"
    : "SELECT student_id, student_fullname, student_nic FROM student WHERE student_id LIKE CONCAT('%', ?, '%') ORDER BY student_id ASC LIMIT 10";

  $stmt = mysqli_prepare($con, $sql);
  if (!$stmt) return null;
  mysqli_stmt_bind_param($stmt, 's', $q);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $rows = [];
  if ($res) {
    while ($row = mysqli_fetch_assoc($res)) { $rows[] = $row; }
  }
  mysqli_stmt_close($stmt);
  return $rows;
}

require_admin();

$q = isset($_GET['q']) ? trim($_GET['q']) : '';
$type = isset($_GET['type']) ? $_GET['type'] : 'student_id';

if ($q === '' || strlen($q) < 2) {
  json_response([]);
}

$rows = search_students($con, $q, $type);
if ($rows === null) {
  json_response(['error' => 'Query prepare failed'], 500);
}

$out = array_map(function($row) use ($type){
  return [
    'student_id' => $row['student_id'],
    'student_fullname' => $row['student_fullname'],
    'student_nic' => $row['student_nic'],
    'value' => ($type === 'nic') ? $row['student_nic'] : $row['student_id'],
    'label' => $row['student_fullname'] . ' - ID: ' . $row['student_id'] . ' | NIC: ' . $row['student_nic']
  ];
}, $rows);

json_response($out);
?>
