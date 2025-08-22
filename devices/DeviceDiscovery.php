<?php
require_once '../config.php';
require_once '../Session.php';

// Check if user is logged in
if (!isset($_SESSION['user_name'])) {
    header("Location: " . (defined('APP_BASE') ? APP_BASE : '') . "/index.php");
    exit();
}

// Only allow admin and staff access
if ($_SESSION['user_type'] == 'STU') {
    header("Location: " . (defined('APP_BASE') ? APP_BASE : '') . "/home/home.php");
    exit();
}

$page_title = "Device Discovery";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../head.php'; ?>
    <style>
        .device-table {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .device-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
        }
        .status-active {
            color: #28a745;
            font-weight: bold;
        }
        .status-inactive {
            color: #dc3545;
            font-weight: bold;
        }
        .device-controls {
            margin-bottom: 20px;
        }
        .device-count {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .btn-scan {
            background: #28a745;
            border-color: #28a745;
        }
        .btn-scan:hover {
            background: #218838;
            border-color: #1e7e34;
        }
        .device-type-badge {
            background: #007bff;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.8em;
        }
        .table-responsive {
            max-height: 600px;
            overflow-y: auto;
        }
        .network-params {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <?php include '../menu.php'; ?>
        
        <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="device-header">
                            <h2><i class="fas fa-network-wired"></i> Device Discovery</h2>
                            <p class="mb-0">Network device discovery and management system</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-8">
                        <div class="device-controls">
                            <button id="scanDevices" class="btn btn-scan text-white">
                                <i class="fas fa-search"></i> Scan Network
                            </button>
                            <button id="refreshDevices" class="btn btn-primary">
                                <i class="fas fa-sync"></i> Refresh
                            </button>
                            <button id="exportDevices" class="btn btn-secondary">
                                <i class="fas fa-download"></i> Export
                            </button>
                        </div>

                        <div class="device-count">
                            <strong>Total number of online devices: <span id="deviceCount">0</span></strong>
                        </div>

                        <div class="device-table">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover mb-0" id="deviceTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th><input type="checkbox" id="selectAll"></th>
                                            <th>ID</th>
                                            <th>Device Type</th>
                                            <th>Status</th>
                                            <th>IP Address</th>
                                            <th>Port</th>
                                            <th>Enhanced SDK Service Port</th>
                                            <th>Software Version</th>
                                            <th>IPv6 Address</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="deviceTableBody">
                                        <!-- Devices will be loaded here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="network-params">
                            <h5><i class="fas fa-cog"></i> Network Parameters</h5>
                            <div class="form-group">
                                <label>Enable DHCP</label>
                                <input type="checkbox" class="form-check-input ml-2" checked>
                            </div>
                            <div class="form-group">
                                <label>Enable IPv6-Connect</label>
                                <input type="checkbox" class="form-check-input ml-2">
                            </div>
                            <div class="form-group">
                                <label>Device Serial No.</label>
                                <input type="text" class="form-control" value="DS-K1T320MFWMK-620341227001" readonly>
                            </div>
                            <div class="form-group">
                                <label>Device Short Serial</label>
                                <input type="text" class="form-control" value="HH2D3179" readonly>
                            </div>
                            <div class="form-group">
                                <label>Start Time</label>
                                <input type="text" class="form-control" value="2025-08-03 10:23:11" readonly>
                            </div>
                            <div class="form-group">
                                <label>IP Address</label>
                                <input type="text" class="form-control" value="172.16.0.230">
                            </div>
                            <div class="form-group">
                                <label>Port</label>
                                <input type="text" class="form-control" value="8000">
                            </div>
                            <div class="form-group">
                                <label>Subnet Mask</label>
                                <input type="text" class="form-control" value="255.255.255.0">
                            </div>
                            <div class="form-group">
                                <label>Gateway</label>
                                <input type="text" class="form-control" value="172.16.0.1">
                            </div>
                            <div class="form-group">
                                <label>IPv6 Address</label>
                                <input type="text" class="form-control" placeholder="::">
                            </div>
                            <div class="form-group">
                                <label>IPv6 Gateway</label>
                                <input type="text" class="form-control" placeholder="::">
                            </div>
                            <div class="form-group">
                                <label>IPv6 Prefix Length</label>
                                <input type="text" class="form-control" value="0">
                            </div>
                            <div class="form-group">
                                <label>HTTP Port</label>
                                <input type="text" class="form-control" value="80">
                            </div>
                            
                            <div class="form-group">
                                <label>Administrator Password</label>
                                <input type="password" class="form-control" placeholder="Enter password">
                            </div>
                            
                            <button class="btn btn-danger btn-block">
                                <i class="fas fa-save"></i> Modify
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            loadDevices();
            
            $('#scanDevices').click(function() {
                scanNetwork();
            });
            
            $('#refreshDevices').click(function() {
                loadDevices();
            });
            
            $('#selectAll').change(function() {
                $('.device-checkbox').prop('checked', this.checked);
            });
        });

        function loadDevices() {
            $.ajax({
                url: 'device_api.php',
                method: 'GET',
                data: { action: 'get_devices' },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        displayDevices(response.devices);
                        $('#deviceCount').text(response.devices.length);
                    }
                },
                error: function() {
                    alert('Error loading devices');
                }
            });
        }

        function displayDevices(devices) {
            let tbody = $('#deviceTableBody');
            tbody.empty();
            
            devices.forEach(function(device, index) {
                let statusClass = device.status === 'Active' ? 'status-active' : 'status-inactive';
                let row = `
                    <tr>
                        <td><input type="checkbox" class="device-checkbox" value="${device.device_id}"></td>
                        <td>${String(index + 1).padStart(3, '0')}</td>
                        <td><span class="device-type-badge">${device.device_type}</span></td>
                        <td><span class="${statusClass}">${device.status}</span></td>
                        <td>${device.ip_address}</td>
                        <td>${device.port}</td>
                        <td>N/A</td>
                        <td>${device.software_version || 'N/A'}</td>
                        <td>${device.ipv6_address || '::'}</td>
                        <td>
                            <button class="btn btn-sm btn-info" onclick="editDevice(${device.device_id})">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="deleteDevice(${device.device_id})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
                tbody.append(row);
            });
        }

        function scanNetwork() {
            $('#scanDevices').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Scanning...');
            
            $.ajax({
                url: 'device_api.php',
                method: 'POST',
                data: { action: 'scan_network' },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        loadDevices();
                        alert('Network scan completed. Found ' + response.new_devices + ' new devices.');
                    } else {
                        alert('Scan failed: ' + response.message);
                    }
                },
                error: function() {
                    alert('Error during network scan');
                },
                complete: function() {
                    $('#scanDevices').prop('disabled', false).html('<i class="fas fa-search"></i> Scan Network');
                }
            });
        }

        function editDevice(deviceId) {
            // Implement device editing functionality
            alert('Edit device functionality - Device ID: ' + deviceId);
        }

        function deleteDevice(deviceId) {
            if (confirm('Are you sure you want to delete this device?')) {
                $.ajax({
                    url: 'device_api.php',
                    method: 'POST',
                    data: { action: 'delete_device', device_id: deviceId },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            loadDevices();
                            alert('Device deleted successfully');
                        } else {
                            alert('Error deleting device: ' + response.message);
                        }
                    }
                });
            }
        }
    </script>
</body>
</html>
