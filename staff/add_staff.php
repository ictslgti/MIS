<?php
/**
 * Staff CRUD functions (mysqli, prepared statements)
 * Path: staff/add_staff.php
 *
 * Usage:
 *   require_once __DIR__ . '/../config.php';
 *   require_once __DIR__ . '/add_staff.php';
 *   $ok = create_staff($con, $data, $err);
 */

if (!function_exists('normalize_date')) {
    function normalize_date(?string $date): ?string {
        if (!$date) return null;
        $ts = strtotime($date);
        return $ts ? date('Y-m-d', $ts) : null;
    }
}

if (!function_exists('sanitize_phone_int')) {
    function sanitize_phone_int(?string $phone): ?int {
        if ($phone === null) return null;
        $digits = preg_replace('/[^0-9]/', '', $phone);
        if ($digits === '') return null;
        // cast carefully to int (fits typical phone lengths)
        return (int)$digits;
    }
}

/**
 * Validate staff payload and return [bool ok, array cleaned, string error]
 */
function validate_staff_payload(array $d): array {
    $required = ['staff_id','department_id','staff_name','staff_address','staff_dob','staff_nic','staff_email','staff_pno','staff_date_of_join','staff_gender','staff_epf','staff_position','staff_type','staff_status'];
    foreach ($required as $key) {
        if (!isset($d[$key]) || $d[$key] === '' || $d[$key] === null) {
            return [false, [], "Missing required field: $key"]; 
        }
    }

    // clean
    $clean = [];
    foreach ($d as $k => $v) { $clean[$k] = trim((string)$v); }

    // dropdown placeholders
    if ($clean['department_id'] === 'null') return [false, [], 'Please select a Department.'];
    if ($clean['staff_position'] === 'null') return [false, [], 'Please select a Position.'];
    if ($clean['staff_gender'] === 'Choose Gender') return [false, [], 'Please select Gender.'];
    if ($clean['staff_type'] === 'Choose Type') return [false, [], 'Please select Type.'];
    if ($clean['staff_status'] === 'Choose Status') return [false, [], 'Please select Status.'];

    // dates
    $dob = normalize_date($clean['staff_dob']);
    $doj = normalize_date($clean['staff_date_of_join']);
    if (!$dob) return [false, [], 'Invalid Date of Birth.'];
    if (!$doj) return [false, [], 'Invalid Date of Join.'];

    // phone as INT
    $pno = sanitize_phone_int($clean['staff_pno']);
    if ($pno === null) return [false, [], 'Invalid phone number.'];

    $clean['staff_dob'] = $dob;
    $clean['staff_date_of_join'] = $doj;
    $clean['staff_pno'] = $pno;

    return [true, $clean, ''];
}

/** Create */
function create_staff(mysqli $con, array $data, ?string &$error = null): bool {
    [$ok, $d, $err] = validate_staff_payload($data);
    if (!$ok) { $error = $err; return false; }

    $sql = "INSERT INTO `staff`(`staff_id`, `department_id`, `staff_name`, `staff_address`, `staff_dob`, `staff_nic`, `staff_email`, `staff_pno`, `staff_date_of_join`, `staff_gender`, `staff_epf`, `staff_position`, `staff_type`, `staff_status`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $con->prepare($sql);
    if (!$stmt) { $error = $con->error; return false; }

    $stmt->bind_param(
        'ssssssssssssss',
        $d['staff_id'],
        $d['department_id'],
        $d['staff_name'],
        $d['staff_address'],
        $d['staff_dob'],
        $d['staff_nic'],
        $d['staff_email'],
        $d['staff_pno'], // though INT in DB, bind as string is safe; alternatively use i and cast
        $d['staff_date_of_join'],
        $d['staff_gender'],
        $d['staff_epf'],
        $d['staff_position'],
        $d['staff_type'],
        $d['staff_status']
    );
    $ok = $stmt->execute();
    if (!$ok) { $error = $stmt->error; }
    $stmt->close();
    return $ok;
}

/** Read by ID */
function get_staff_by_id(mysqli $con, string $staff_id): ?array {
    $sql = "SELECT `staff_id`, `department_id`, `staff_name`, `staff_address`, `staff_dob`, `staff_nic`, `staff_email`, `staff_pno`, `staff_date_of_join`, `staff_gender`, `staff_epf`, `staff_position`, `staff_type`, `staff_status` FROM `staff` WHERE staff_id = ?";
    $stmt = $con->prepare($sql);
    if (!$stmt) return null;
    $stmt->bind_param('s', $staff_id);
    if (!$stmt->execute()) { $stmt->close(); return null; }
    $res = $stmt->get_result();
    $row = $res ? $res->fetch_assoc() : null;
    $stmt->close();
    return $row ?: null;
}

/** List (with optional filters) */
function list_staff(mysqli $con, array $filters = []): array {
    $where = [];
    $params = [];
    $types = '';

    if (!empty($filters['department_id'])) { $where[] = 'department_id = ?'; $types .= 's'; $params[] = $filters['department_id']; }
    if (!empty($filters['staff_status'])) { $where[] = 'staff_status = ?'; $types .= 's'; $params[] = $filters['staff_status']; }

    $sql = 'SELECT `staff_id`, `department_id`, `staff_name`, `staff_address`, `staff_dob`, `staff_nic`, `staff_email`, `staff_pno`, `staff_date_of_join`, `staff_gender`, `staff_epf`, `staff_position`, `staff_type`, `staff_status` FROM `staff`';
    if ($where) { $sql .= ' WHERE ' . implode(' AND ', $where); }
    $sql .= ' ORDER BY staff_name';

    $stmt = $con->prepare($sql);
    if (!$stmt) return [];

    if ($params) {
        $stmt->bind_param($types, ...$params);
    }
    if (!$stmt->execute()) { $stmt->close(); return []; }
    $res = $stmt->get_result();
    $rows = $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
    $stmt->close();
    return $rows;
}

/** Update */
function update_staff(mysqli $con, string $staff_id, array $data, ?string &$error = null): bool {
    // Merge id in data for validation where helpful
    if (!isset($data['staff_id'])) $data['staff_id'] = $staff_id;
    [$ok, $d, $err] = validate_staff_payload($data);
    if (!$ok) { $error = $err; return false; }

    $sql = "UPDATE `staff` SET `department_id`=?, `staff_name`=?, `staff_address`=?, `staff_dob`=?, `staff_nic`=?, `staff_email`=?, `staff_pno`=?, `staff_date_of_join`=?, `staff_gender`=?, `staff_epf`=?, `staff_position`=?, `staff_type`=?, `staff_status`=? WHERE `staff_id`=?";
    $stmt = $con->prepare($sql);
    if (!$stmt) { $error = $con->error; return false; }

    $stmt->bind_param(
        'ssssssssssssss',
        $d['department_id'],
        $d['staff_name'],
        $d['staff_address'],
        $d['staff_dob'],
        $d['staff_nic'],
        $d['staff_email'],
        $d['staff_pno'],
        $d['staff_date_of_join'],
        $d['staff_gender'],
        $d['staff_epf'],
        $d['staff_position'],
        $d['staff_type'],
        $d['staff_status'],
        $staff_id
    );
    $ok = $stmt->execute();
    if (!$ok) { $error = $stmt->error; }
    $stmt->close();
    return $ok;
}

/** Delete */
function delete_staff(mysqli $con, string $staff_id, ?string &$error = null): bool {
    $sql = 'DELETE FROM `staff` WHERE `staff_id`=?';
    $stmt = $con->prepare($sql);
    if (!$stmt) { $error = $con->error; return false; }
    $stmt->bind_param('s', $staff_id);
    $ok = $stmt->execute();
    if (!$ok) { $error = $stmt->error; }
    $stmt->close();
    return $ok;
}

