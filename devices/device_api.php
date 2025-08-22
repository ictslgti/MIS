<?php
require_once '../config.php';
require_once '../Session.php';

// Check if user is logged in
if (!isset($_SESSION['user_name'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit();
}

// Only allow admin and staff access
if ($_SESSION['user_type'] == 'STU') {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Access denied']);
    exit();
}

header('Content-Type: application/json');

$action = $_REQUEST['action'] ?? '';

switch ($action) {
    case 'get_devices':
        getDevices();
        break;
    case 'scan_network':
        scanNetwork();
        break;
    case 'delete_device':
        deleteDevice();
        break;
    case 'update_device':
        updateDevice();
        break;
    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
}

function getDevices() {
    global $con;
    
    $sql = "SELECT * FROM network_devices ORDER BY ip_address ASC";
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        $devices = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $devices[] = $row;
        }
        echo json_encode(['success' => true, 'devices' => $devices]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . mysqli_error($con)]);
    }
}

function scanNetwork() {
    global $con;
    
    // Simulate network scanning - in real implementation, you would use network discovery tools
    $newDevices = 0;
    $networkRange = '172.16.0.';
    
    // Simulate discovering devices on network
    $simulatedDevices = [
        ['type' => 'DS-7604NI-Q1', 'ip' => '172.16.0.40', 'version' => 'V4.31.100-build 210129'],
        ['type' => 'DS-2CD1107G2H-LIUF-SL', 'ip' => '172.16.0.41', 'version' => 'V5.8.10-build 241029'],
        ['type' => 'DS-K1T320MFW-M', 'ip' => '172.16.0.42', 'version' => 'V3.5.20-build 240701']
    ];
    
    foreach ($simulatedDevices as $device) {
        // Check if device already exists
        $checkSql = "SELECT device_id FROM network_devices WHERE ip_address = ?";
        $stmt = mysqli_prepare($con, $checkSql);
        mysqli_stmt_bind_param($stmt, 's', $device['ip']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if (mysqli_num_rows($result) == 0) {
            // Add new device
            $insertSql = "INSERT INTO network_devices (device_type, ip_address, port, status, software_version, subnet_mask, ipv4_gateway) 
                         VALUES (?, ?, 8000, 'Active', ?, '255.255.255.0', '172.16.0.1')";
            $insertStmt = mysqli_prepare($con, $insertSql);
            mysqli_stmt_bind_param($insertStmt, 'sss', $device['type'], $device['ip'], $device['version']);
            
            if (mysqli_stmt_execute($insertStmt)) {
                $newDevices++;
            }
        }
    }
    
    // Update last_discovered timestamp for existing devices
    $updateSql = "UPDATE network_devices SET last_discovered = CURRENT_TIMESTAMP WHERE status = 'Active'";
    mysqli_query($con, $updateSql);
    
    echo json_encode(['success' => true, 'new_devices' => $newDevices, 'message' => 'Network scan completed']);
}

function deleteDevice() {
    global $con;
    
    $deviceId = $_POST['device_id'] ?? 0;
    
    if (!$deviceId) {
        echo json_encode(['success' => false, 'message' => 'Device ID required']);
        return;
    }
    
    $sql = "DELETE FROM network_devices WHERE device_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $deviceId);
    
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['success' => true, 'message' => 'Device deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error deleting device: ' . mysqli_error($con)]);
    }
}

function updateDevice() {
    global $con;
    
    $deviceId = $_POST['device_id'] ?? 0;
    $ipAddress = $_POST['ip_address'] ?? '';
    $port = $_POST['port'] ?? 8000;
    $status = $_POST['status'] ?? 'Unknown';
    
    if (!$deviceId || !$ipAddress) {
        echo json_encode(['success' => false, 'message' => 'Device ID and IP address required']);
        return;
    }
    
    $sql = "UPDATE network_devices SET ip_address = ?, port = ?, status = ?, last_discovered = CURRENT_TIMESTAMP WHERE device_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'sisi', $ipAddress, $port, $status, $deviceId);
    
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['success' => true, 'message' => 'Device updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error updating device: ' . mysqli_error($con)]);
    }
}

// Real network scanning function (commented out - requires additional PHP extensions)
/*
function performRealNetworkScan($networkRange = '192.168.1.') {
    $devices = [];
    
    for ($i = 1; $i <= 254; $i++) {
        $ip = $networkRange . $i;
        
        // Ping test
        $ping = exec("ping -n 1 -w 1000 $ip", $output, $result);
        
        if ($result == 0) {
            // Device is reachable, try to get more info
            $deviceInfo = [
                'ip' => $ip,
                'status' => 'Active',
                'type' => 'Unknown',
                'port' => 8000
            ];
            
            // Try to detect device type via port scanning or SNMP
            // This would require additional implementation
            
            $devices[] = $deviceInfo;
        }
    }
    
    return $devices;
}
*/
?>
