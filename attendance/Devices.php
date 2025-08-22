<!--Block#1 start dont change the order-->
<?php 
$title="attendance | SLGTI";    
include_once ("../config.php");
include_once ("../head.php");
include_once ("../menu.php");
include_once ("Attendancenav.php");
?>
<!-- end dont change the order-->

<?php
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'ADM') {
  echo '<div class="container"><div class="alert alert-danger mt-3">Access denied. Admins only.</div></div>';
  include_once ("../footer.php");
  exit;
}

// Define action and common vars EARLY for all handlers below
$errors = [];
$action = $_GET['action'] ?? 'list';
$flash  = '';

// Fetch device info (model, serial) for all devices
if ($action==='info_all') {
  header('Content-Type: application/json');
  $rows = [];
  $res = mysqli_query($con, "SELECT id, name, ip, port, protocol, username, password, connection_type, cloud_host FROM hik_devices ORDER BY id DESC");
  if ($res) {
    while($r = mysqli_fetch_assoc($res)) { $rows[] = $r; }
  }
  $out = [];
  foreach ($rows as $r) {
    // Skip detailed info for Hik-Connect (cloud relay blocks ISAPI)
    if (($r['connection_type'] ?? 'lan') === 'hik_connect') {
      $out[] = [ 'id'=>(int)$r['id'], 'model'=>'', 'serial'=>'' ];
      continue;
    }
    // Try configured port plus common web ports
    $candidatePorts = array_values(array_unique([$r['port'], 80, 443]));
    $model = ''; $serial = '';
    foreach ($candidatePorts as $p) {
      $proto = $r['protocol'];
      if ($p == 80) $proto = 'http';
      if ($p == 443) $proto = 'https';
      $base = $proto.'://'.$r['ip'].':'.$p;
      $url = rtrim($base,'/').'/ISAPI/System/deviceInfo';
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
      curl_setopt($ch, CURLOPT_TIMEOUT, 4);
      if ($proto === 'https') { curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); }
      if (!empty($r['username']) || !empty($r['password'])) {
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, $r['username'].':'.$r['password']);
      }
      $body = curl_exec($ch);
      $code = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);
      if ($code>=200 && $code<300 && $body) {
        if (preg_match('/<model>([^<]+)<\\/model>/i', $body, $m)) $model = $m[1];
        if (preg_match('/<serialNumber>([^<]+)<\\/serialNumber>/i', $body, $m)) $serial = $m[1];
        if ($model !== '' || $serial !== '') break; // got info
      }
    }
    $out[] = [ 'id'=>(int)$r['id'], 'model'=>$model, 'serial'=>$serial ];
  }
  echo json_encode(['devices'=>$out]);
  exit;
}

function esc($s){ return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }
function dbq($con,$s){ return mysqli_real_escape_string($con, $s); }

// Lightweight AJAX tester for Hikvision devices
if ($action==='test' && $_SERVER['REQUEST_METHOD']==='POST') {
  header('Content-Type: application/json');
  $ip = $_POST['ip'] ?? '';
  $port = (int)($_POST['port'] ?? 80);
  $protocol = ($_POST['protocol'] ?? 'http') === 'https' ? 'https' : 'http';
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';
  $endpoint_path = $_POST['endpoint_path'] ?? '/ISAPI/AccessControl/AcsEvent?format=json';
  $connection_type = $_POST['connection_type'] ?? 'lan';
  $cloud_host = $_POST['cloud_host'] ?? 'litedev.sgp.hik-connect.com';
  // For Hik-Connect, force HTTPS 443 against cloud host and skip auth
  $isCloud = ($connection_type === 'hik_connect');
  $base = $isCloud ? ('https://'.$cloud_host.':443') : ($protocol.'://'.$ip.':'.$port);
  $targets = [ '/','/ISAPI/System/status', $endpoint_path ];
  $result = [ 'ok' => false, 'probes' => [] ];

  foreach ($targets as $p) {
    $url = rtrim($base, '/').$p;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    if (!$isCloud && ($username !== '' || $password !== '')) {
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
      curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
    }
    $body = curl_exec($ch);
    $err  = curl_error($ch);
    $code = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $info = [ 'path'=>$p, 'status'=>$code, 'error'=>$err ];
    if ($code>=200 && $code<300) {
      $result['ok'] = true;
      // Try to extract model/name from XML or JSON minimally
      if ($body) {
        if (stripos($body, 'deviceInfo') !== false || stripos($body, '<DeviceInfo>') !== false) {
          if (preg_match('/<deviceName>([^<]+)<\\/deviceName>/i', $body, $m)) $result['deviceName'] = $m[1];
          if (preg_match('/<model>([^<]+)<\\/model>/i', $body, $m)) $result['model'] = $m[1];
        }
      }
    }
    $result['probes'][] = $info;
  }
  echo json_encode($result);
  exit;
}

// Batch ping all devices and return online status
if ($action==='ping_all') {
  header('Content-Type: application/json');
  $rows = [];
  $res = mysqli_query($con, "SELECT id, name, ip, port, protocol, username, password, connection_type, cloud_host FROM hik_devices ORDER BY id DESC");
  if ($res) {
    while($r = mysqli_fetch_assoc($res)) { $rows[] = $r; }
  }
  $out = [];
  foreach ($rows as $r) {
    // Probe common endpoints; include root to catch general HTTP reachability
    $targets = ['/', '/ISAPI/System/status','/ISAPI/System/deviceInfo'];
    $isCloud = (($r['connection_type'] ?? 'lan') === 'hik_connect');
    // Ports: LAN -> configured + 80/443, Cloud -> 443 only
    $candidatePorts = $isCloud ? [443] : array_values(array_unique([$r['port'], 80, 443]));
    $ok = false; $code = 0; $err = ''; $lastUrl = '';
    foreach ($candidatePorts as $cp) {
      $proto = $isCloud ? 'https' : $r['protocol'];
      if ($cp == 80) $proto = 'http';
      if ($cp == 443) $proto = 'https';
      $host = $isCloud ? ($r['cloud_host'] ?: 'litedev.sgp.hik-connect.com') : $r['ip'];
      $base = $proto.'://'.$host.':'.$cp;
      // Quick TCP probe first
      $tcpOk = false;
      $tcpTarget = 'tcp://'.$host.':'.$cp;
      $fp = @fsockopen($host, (int)$cp, $errno, $errstr, 1.5);
      if ($fp) { $tcpOk = true; fclose($fp); }
      if ($tcpOk) { $ok = true; $code = -1; $lastUrl = $tcpTarget; break; }
      foreach ($targets as $p) {
        $url = rtrim($base,'/').$p;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);
        curl_setopt($ch, CURLOPT_TIMEOUT, 6);
        if ($proto === 'https') { curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); }
        if (!$isCloud && (!empty($r['username']) || !empty($r['password']))) {
          curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
          curl_setopt($ch, CURLOPT_USERPWD, $r['username'].':'.$r['password']);
        }
        curl_exec($ch);
        $err = curl_error($ch);
        $code = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $lastUrl = $url;
        curl_close($ch);
        // Consider online if any reachable HTTP: 2xx, 3xx, 401/403, 404
        if ( ($code>=200 && $code<400) || $code===401 || $code===403 || $code===404 ) { $ok = true; break 2; }
      }
    }
    $out[] = [
      'id' => (int)$r['id'],
      'online' => $ok,
      'status' => $code,
      'error' => $err,
      'url' => $lastUrl
    ];
  }
  echo json_encode(['devices'=>$out]);
  exit;
}

// Table checks
$need_schema = [];
$has_hik_devices = mysqli_query($con, "SHOW TABLES LIKE 'hik_devices'");
if (!$has_hik_devices || mysqli_num_rows($has_hik_devices)===0) { $need_schema[] = 'hik_devices'; }
$has_hik_user_map = mysqli_query($con, "SHOW TABLES LIKE 'hik_user_map'");
if (!$has_hik_user_map || mysqli_num_rows($has_hik_user_map)===0) { $need_schema[] = 'hik_user_map'; }
// Lightweight auto-migration for new cloud columns if table exists
if (empty($need_schema)) {
  // connection_type
  $chk = mysqli_query($con, "SHOW COLUMNS FROM `hik_devices` LIKE 'connection_type'");
  if ($chk && mysqli_num_rows($chk)===0) {
    @mysqli_query($con, "ALTER TABLE `hik_devices` ADD COLUMN `connection_type` ENUM('lan','hik_connect') NOT NULL DEFAULT 'lan' AFTER `endpoint_path`");
  }
  // cloud_host
  $chk = mysqli_query($con, "SHOW COLUMNS FROM `hik_devices` LIKE 'cloud_host'");
  if ($chk && mysqli_num_rows($chk)===0) {
    @mysqli_query($con, "ALTER TABLE `hik_devices` ADD COLUMN `cloud_host` VARCHAR(150) NOT NULL DEFAULT 'litedev.sgp.hik-connect.com' AFTER `connection_type`");
  }
  // device_serial
  $chk = mysqli_query($con, "SHOW COLUMNS FROM `hik_devices` LIKE 'device_serial'");
  if ($chk && mysqli_num_rows($chk)===0) {
    @mysqli_query($con, "ALTER TABLE `hik_devices` ADD COLUMN `device_serial` VARCHAR(64) NULL AFTER `cloud_host`");
  }
}
?>

<div class="container" style="margin-top:30px">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-9">Hikvision Devices</div>
        <div class="col-md-3" align="right">
          <a class="btn btn-sm btn-primary" href="<?php echo APP_BASE; ?>/attendance/Devices.php?action=create"><i class="fas fa-plus"></i> Add Device</a>
        </div>
      </div>
    </div>
    <div class="card-body">

<?php if (!empty($need_schema)): ?>
  <div class="alert alert-warning">
    <b>Missing tables:</b> <?php echo esc(implode(', ', $need_schema)); ?>. Create them in database 'mis':
    <pre style="white-space:pre-wrap">
CREATE TABLE `hik_devices` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `ip` VARCHAR(100) NOT NULL,
  `port` INT NOT NULL DEFAULT 80,
  `protocol` ENUM('http','https') NOT NULL DEFAULT 'http',
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `endpoint_path` VARCHAR(255) NOT NULL DEFAULT '/ISAPI/AccessControl/AcsEvent?format=json',
  `connection_type` ENUM('lan','hik_connect') NOT NULL DEFAULT 'lan',
  `cloud_host` VARCHAR(150) NOT NULL DEFAULT 'litedev.sgp.hik-connect.com',
  `device_serial` VARCHAR(64) NULL,
  `enabled` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `hik_user_map` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `device_id` INT NOT NULL,
  `employee_no` VARCHAR(100) NOT NULL,
  `student_id` VARCHAR(20) NOT NULL,
  UNIQUE KEY (`device_id`,`employee_no`),
  INDEX (`student_id`),
  FOREIGN KEY (`device_id`) REFERENCES `hik_devices`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    </pre>
    Or click the button below to create them automatically.
  </div>
  <?php
    if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['create_schema']) && $_POST['create_schema']==='yes') {
      $ok = true; $schemaErr = [];
      $sql1 = "CREATE TABLE IF NOT EXISTS `hik_devices` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(100) NOT NULL,
        `ip` VARCHAR(100) NOT NULL,
        `port` INT NOT NULL DEFAULT 80,
        `protocol` ENUM('http','https') NOT NULL DEFAULT 'http',
        `username` VARCHAR(100) NOT NULL,
        `password` VARCHAR(255) NOT NULL,
        `endpoint_path` VARCHAR(255) NOT NULL DEFAULT '/ISAPI/AccessControl/AcsEvent?format=json',
        `connection_type` ENUM('lan','hik_connect') NOT NULL DEFAULT 'lan',
        `cloud_host` VARCHAR(150) NOT NULL DEFAULT 'litedev.sgp.hik-connect.com',
        `device_serial` VARCHAR(64) NULL,
        `enabled` TINYINT(1) NOT NULL DEFAULT 1,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
      if (!mysqli_query($con,$sql1)) { $ok=false; $schemaErr[] = mysqli_error($con); }

      $sql2 = "CREATE TABLE IF NOT EXISTS `hik_user_map` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `device_id` INT NOT NULL,
        `employee_no` VARCHAR(100) NOT NULL,
        `student_id` VARCHAR(20) NOT NULL,
        UNIQUE KEY (`device_id`,`employee_no`),
        INDEX (`student_id`),
        FOREIGN KEY (`device_id`) REFERENCES `hik_devices`(`id`) ON DELETE CASCADE
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
      if (!mysqli_query($con,$sql2)) { $ok=false; $schemaErr[] = mysqli_error($con); }

      // Re-check
      $need_schema = [];
      $has_hik_devices = mysqli_query($con, "SHOW TABLES LIKE 'hik_devices'");
      if (!$has_hik_devices || mysqli_num_rows($has_hik_devices)===0) { $need_schema[] = 'hik_devices'; }
      $has_hik_user_map = mysqli_query($con, "SHOW TABLES LIKE 'hik_user_map'");
      if (!$has_hik_user_map || mysqli_num_rows($has_hik_user_map)===0) { $need_schema[] = 'hik_user_map'; }

      if ($ok && empty($need_schema)) {
        echo '<div class="alert alert-success">Tables created successfully. You can now add devices.</div>';
      } else {
        echo '<div class="alert alert-danger">Failed to create tables: '.esc(implode(' | ', $schemaErr)).'</div>';
      }
    }
  ?>
  <form method="post" class="mb-3" action="<?php echo APP_BASE; ?>/attendance/Devices.php?action=list">
    <input type="hidden" name="create_schema" value="yes">
    <button type="submit" class="btn btn-success"><i class="fas fa-database"></i> Create Tables Now</button>
  </form>
  <script>
    (function(){
      var protocol = document.getElementById('protocol');
      var port = document.getElementById('port');
      var tls = document.getElementById('tlsToggle');
      var endpoint = document.getElementById('endpoint_path');

      // Initialize TLS checkbox based on protocol
      if (protocol && tls) { tls.checked = (protocol.value === 'https'); }

      function setHttps(on){
        if(!protocol || !port) return;
        protocol.value = on ? 'https':'http';
        if (on && (port.value==='' || port.value==='80')) port.value = 443;
        if (!on && (port.value==='' || port.value==='443')) port.value = 80;
      }

      if (tls){
        tls.addEventListener('change', function(){ setHttps(tls.checked); });
      }
      if (protocol){
        protocol.addEventListener('change', function(){ tls.checked = (protocol.value==='https'); });
      }

      var presetA = document.getElementById('presetAcsEvent');
      var presetL = document.getElementById('presetLogSearch');
      var presetF = document.getElementById('presetFingerprint');
      if (presetA) presetA.addEventListener('click', function(){ endpoint.value = '/ISAPI/AccessControl/AcsEvent?format=json'; });
      if (presetL) presetL.addEventListener('click', function(){ endpoint.value = '/ISAPI/AccessControl/LogSearch?format=json'; });
      if (presetF) presetF.addEventListener('click', function(){
        // iVMS-4200 style: IP/Domain, port 8000 (SDK), web fetch uses AcsEvent/LogSearch
        if (port && (port.value==='' || port.value==='80')) port.value = 8000;
        endpoint.value = '/ISAPI/AccessControl/LogSearch?format=json';
        // Keep protocol http by default; code will auto-try web port 80 when 8000 is set
        tls.checked = false; protocol.value='http';
      });

      // Device template selector
      var template = document.getElementById('device_template');
      if (template) {
        template.addEventListener('change', function(){
          var v = template.value;
          if (!port || !protocol || !endpoint) return;
          if (v === 'face_terminal') {
            protocol.value = 'http'; tls && (tls.checked=false); port.value = 80; endpoint.value = '/ISAPI/AccessControl/AcsEvent?format=json';
          } else if (v === 'fingerprint_terminal') {
            protocol.value = 'http'; tls && (tls.checked=false); port.value = 8000; endpoint.value = '/ISAPI/AccessControl/LogSearch?format=json';
          } else if (v === 'access_controller') {
            protocol.value = 'http'; tls && (tls.checked=false); port.value = 80; endpoint.value = '/ISAPI/AccessControl/AcsEvent?format=json';
          } else if (v === 'https_door_unit') {
            protocol.value = 'https'; tls && (tls.checked=true); port.value = 443; endpoint.value = '/ISAPI/AccessControl/AcsEvent?format=json';
          }
        });
      }

      // Test connection
      var testBtn = document.getElementById('testConn');
      if (testBtn) {
        testBtn.addEventListener('click', async function(){
          var form = document.getElementById('deviceForm');
          if (!form) return;
          var fd = new FormData(form);
          try{
            var res = await fetch('<?php echo APP_BASE; ?>/attendance/Devices.php?action=test', { method: 'POST', body: fd });
            var data = await res.json();
            var out = document.getElementById('testOutput');
            if (out) {
              out.className = '';
              if (data.ok) {
                out.classList.add('alert','alert-success');
                out.textContent = 'Reachable. '+ (data.model?('Model: '+data.model+' '):'') + (data.deviceName?('Name: '+data.deviceName):'');
              } else {
                out.classList.add('alert','alert-warning');
                out.textContent = 'No success response. Check IP/port/credentials. Last status: ' + (data.probes && data.probes.length? data.probes[data.probes.length-1].status : 'n/a');
              }
            }
          }catch(e){
            var out = document.getElementById('testOutput');
            if (out){ out.className='alert alert-danger'; out.textContent='Test failed: '+e; }
          }
        });
      }
    })();
  </script>
<?php else: ?>

<?php
if ($action==='create' && $_SERVER['REQUEST_METHOD']==='POST'){
  $name = dbq($con, $_POST['name']??'');
  $ip = dbq($con, $_POST['ip']??'');
  $port = (int)($_POST['port']??80);
  $protocol = ($_POST['protocol']??'http')==='https'?'https':'http';
  $username = dbq($con, $_POST['username']??'');
  $password = dbq($con, $_POST['password']??'');
  $endpoint_path = dbq($con, $_POST['endpoint_path']??'/ISAPI/AccessControl/AcsEvent?format=json');
  $connection_type = dbq($con, $_POST['connection_type']??'lan');
  $cloud_host = dbq($con, $_POST['cloud_host']??'litedev.sgp.hik-connect.com');
  $device_serial = dbq($con, $_POST['device_serial']??'');
  $enabled = isset($_POST['enabled'])?1:0;
  if($name===''||$ip===''||$username===''||$password==='') $errors[]='All required fields must be filled.';
  if(empty($errors)){
    $sql = "INSERT INTO hik_devices(name,ip,port,protocol,username,password,endpoint_path,connection_type,cloud_host,device_serial,enabled) VALUES('$name','$ip',$port,'$protocol','$username','$password','$endpoint_path','$connection_type','$cloud_host','$device_serial',$enabled)";
    if (!mysqli_query($con,$sql)) $errors[] = 'DB Error: '.mysqli_error($con);
    else { $action='list'; $flash='Device added successfully.'; }
  }
}
if ($action==='edit' && isset($_GET['id'])){
  $id=(int)$_GET['id'];
  if($_SERVER['REQUEST_METHOD']==='POST'){
    $name = dbq($con, $_POST['name']??'');
    $ip = dbq($con, $_POST['ip']??'');
    $port = (int)($_POST['port']??80);
    $protocol = ($_POST['protocol']??'http')==='https'?'https':'http';
    $username = dbq($con, $_POST['username']??'');
    $password = dbq($con, $_POST['password']??'');
    $endpoint_path = dbq($con, $_POST['endpoint_path']??'/ISAPI/AccessControl/AcsEvent?format=json');
    $connection_type = dbq($con, $_POST['connection_type']??'lan');
    $cloud_host = dbq($con, $_POST['cloud_host']??'litedev.sgp.hik-connect.com');
    $device_serial = dbq($con, $_POST['device_serial']??'');
    $enabled = isset($_POST['enabled'])?1:0;
    if($name===''||$ip===''||$username===''||$password==='') $errors[]='All required fields must be filled.';
    if(empty($errors)){
      $sql = "UPDATE hik_devices SET name='$name',ip='$ip',port=$port,protocol='$protocol',username='$username',password='$password',endpoint_path='$endpoint_path',connection_type='$connection_type',cloud_host='$cloud_host',device_serial='$device_serial',enabled=$enabled WHERE id=$id";
      if (!mysqli_query($con,$sql)) $errors[] = 'DB Error: '.mysqli_error($con); else { $action='list'; $flash='Device updated successfully.'; }
    }
  }
}
if ($action==='delete' && isset($_GET['id'])){
  $id=(int)$_GET['id'];
  if(isset($_POST['confirm']) && $_POST['confirm']==='yes'){
    if (!mysqli_query($con, "DELETE FROM hik_devices WHERE id=$id")) {
      $errors[] = 'DB Error: '.mysqli_error($con);
    } else {
      $action='list';
      $flash='Device deleted successfully.';
    }
  }
}
?>

<?php if(!empty($errors)): ?>
  <div class="alert alert-danger"><?php foreach($errors as $e){ echo '<div>'.esc($e).'</div>'; } ?></div>
<?php endif; ?>
<?php if($flash): ?>
  <div class="alert alert-success"><?php echo esc($flash); ?></div>
<?php endif; ?>

<?php if ($action==='create' || ($action==='edit' && isset($_GET['id']))): ?>
  <?php
    $row = ['name'=>'','ip'=>'','port'=>80,'protocol'=>'http','username'=>'','password'=>'','endpoint_path'=>'/ISAPI/AccessControl/AcsEvent?format=json','connection_type'=>'lan','cloud_host'=>'litedev.sgp.hik-connect.com','device_serial'=>'','enabled'=>1];
    if ($action==='edit'){
      $id=(int)$_GET['id'];
      $res=mysqli_query($con,"SELECT * FROM hik_devices WHERE id=$id");
      if($res && mysqli_num_rows($res)) $row=mysqli_fetch_assoc($res);
    }
  ?>
  <form id="deviceForm" method="post" action="<?php echo APP_BASE; ?>/attendance/Devices.php?action=<?php echo $action==='edit' ? 'edit&id='.(int)($_GET['id']??0) : 'create'; ?>">
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Name</label>
        <input class="form-control" name="name" value="<?php echo esc($row['name']); ?>" required>
      </div>
      <div class="form-group col-md-3">
        <label>Connection</label>
        <select class="form-control" id="connection_type" name="connection_type">
          <option value="lan" <?php echo ($row['connection_type']??'lan')==='lan'?'selected':''; ?>>LAN (Direct ISAPI)</option>
          <option value="hik_connect" <?php echo ($row['connection_type']??'lan')==='hik_connect'?'selected':''; ?>>Hik-Connect (Cloud)</option>
        </select>
        <small class="form-text text-muted">Hik-Connect uses cloud relay. Device info may be unavailable.</small>
      </div>
      <div class="form-group col-md-3">
        <label>Device Template</label>
        <select class="form-control" id="device_template">
          <option value="">Select…</option>
          <option value="face_terminal">Hikvision Face Terminal</option>
          <option value="fingerprint_terminal">Hikvision Fingerprint Terminal</option>
          <option value="access_controller">Hikvision Access Controller</option>
          <option value="https_door_unit">Hikvision Door Unit (HTTPS)</option>
        </select>
        <small class="form-text text-muted">Picking a template auto-fills protocol, port and endpoint.</small>
      </div>
      <div class="form-group col-md-3">
        <label>IP/Host</label>
        <input class="form-control" name="ip" id="ip" value="<?php echo esc($row['ip']); ?>" required>
      </div>
      <div class="form-group col-md-2">
        <label>Port</label>
        <input class="form-control" id="port" type="number" name="port" value="<?php echo (int)$row['port']; ?>" required>
        <small class="form-text text-muted">Common: 80/443 (Web), 8000 (SDK)</small>
      </div>
      <div class="form-group col-md-2">
        <label>Protocol</label>
        <select class="form-control" id="protocol" name="protocol">
          <option value="http" <?php echo $row['protocol']==='http'?'selected':''; ?>>http</option>
          <option value="https" <?php echo $row['protocol']==='https'?'selected':''; ?>>https</option>
        </select>
      </div>
      <div class="form-group col-md-1" style="padding-top:32px">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="tlsToggle">
          <label class="form-check-label" for="tlsToggle">TLS</label>
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label>Username</label>
        <input class="form-control" name="username" value="<?php echo esc($row['username']); ?>" required>
      </div>
      <div class="form-group col-md-3">
        <label>Password</label>
        <input class="form-control" name="password" type="password" value="<?php echo esc($row['password']); ?>" required>
      </div>
      <div class="form-group col-md-6">
        <label>Endpoint Path (ISAPI)</label>
        <input class="form-control" id="endpoint_path" name="endpoint_path" value="<?php echo esc($row['endpoint_path']); ?>">
        <small class="form-text text-muted">Default: /ISAPI/AccessControl/AcsEvent?format=json
        </small>
        <div class="mt-2">
          <span class="badge badge-light" id="presetAcsEvent" style="cursor:pointer">Use AcsEvent (GET)</span>
          <span class="badge badge-light" id="presetLogSearch" style="cursor:pointer">Use LogSearch (POST)</span>
          <span class="badge badge-info" id="presetFingerprint" style="cursor:pointer">Preset: Fingerprint Terminal</span>
        </div>
      </div>
      <div class="form-group col-md-6">
        <label>Cloud Host (Hik-Connect)</label>
        <input class="form-control" id="cloud_host" name="cloud_host" value="<?php echo esc($row['cloud_host'] ?? 'litedev.sgp.hik-connect.com'); ?>">
        <small class="form-text text-muted">Default Hik-Connect relay host.</small>
      </div>
      <div class="form-group col-md-6">
        <label>Device Serial (for Cloud)</label>
        <input class="form-control" id="device_serial" name="device_serial" value="<?php echo esc($row['device_serial'] ?? ''); ?>">
        <small class="form-text text-muted">Used for future Hik-Connect OpenAPI integration.</small>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label>Pick Machine Options</label>
        <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
          <label class="btn btn-outline-secondary flex-fill" onclick="document.getElementById('endpoint_path').value='/ISAPI/AccessControl/AcsEvent?format=json'">
            <input type="radio" autocomplete="off"> Attendance Events
          </label>
          <label class="btn btn-outline-secondary flex-fill" onclick="document.getElementById('endpoint_path').value='/ISAPI/AccessControl/LogSearch?format=json'">
            <input type="radio" autocomplete="off"> Log Search
          </label>
          <label class="btn btn-outline-secondary flex-fill" onclick="document.getElementById('port').value=8000; document.getElementById('protocol').value='http'; document.getElementById('tlsToggle').checked=false; document.getElementById('endpoint_path').value='/ISAPI/AccessControl/LogSearch?format=json'">
            <input type="radio" autocomplete="off"> Fingerprint Mode
          </label>
        </div>
      </div>
    </div>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="enabled" name="enabled" <?php echo ((int)$row['enabled'])? 'checked':''; ?>>
      <label class="form-check-label" for="enabled">Enabled</label>
    </div>
    <div class="mb-2">
      <button class="btn btn-info" type="button" id="testConn"><i class="fas fa-plug"></i> Test Connection</button>
      <span id="testOutput" class="ml-2"></span>
    </div>
    <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Save</button>
    <a class="btn btn-secondary" href="<?php echo APP_BASE; ?>/attendance/Devices.php">Cancel</a>
  </form>
<?php elseif ($action==='delete' && isset($_GET['id'])): ?>
  <div class="alert alert-danger">Delete this device and its user mappings?</div>
  <form method="post" action="<?php echo APP_BASE; ?>/attendance/Devices.php?action=delete&id=<?php echo (int)$_GET['id']; ?>"><input type="hidden" name="confirm" value="yes"><button class="btn btn-danger">Delete</button> <a class="btn btn-secondary" href="<?php echo APP_BASE; ?>/attendance/Devices.php">Cancel</a></form>
<?php else: ?>
  <div class="mb-3"><a class="btn btn-outline-secondary btn-sm" href="<?php echo APP_BASE; ?>/attendance/UserMap.php">Manage User Mapping</a></div>
  <div class="d-flex justify-content-between align-items-center mb-2">
    <div>
      <a class="btn btn-primary btn-sm" href="<?php echo APP_BASE; ?>/attendance/Devices.php?action=create"><i class="fas fa-plus"></i> Add</a>
      <a class="btn btn-outline-secondary btn-sm" href="<?php echo APP_BASE; ?>/attendance/Devices.php?action=create"><i class="fas fa-search"></i> Online Device</a>
      <button class="btn btn-outline-info btn-sm" id="btnRefresh"><i class="fas fa-sync-alt"></i> Refresh</button>
    </div>
    <div class="text-muted small">Total (<?php 
      $cnt = mysqli_query($con, "SELECT COUNT(*) c FROM hik_devices");
      $c = ($cnt && ($r=mysqli_fetch_assoc($cnt)))? (int)$r['c'] : 0; echo $c; ?>)
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-bordered" id="devicesTable">
      <thead>
        <tr>
          <th style="width:28px"><input type="checkbox" disabled></th>
          <th>Name</th>
          <th>Connection Type</th>
          <th>Network Parameters</th>
          <th>Device Type</th>
          <th>Serial No.</th>
          <th>Security Level</th>
          <th>Online</th>
          <th>Operation</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $res = mysqli_query($con, "SELECT * FROM hik_devices ORDER BY id DESC");
          if ($res && mysqli_num_rows($res)){
            while($r=mysqli_fetch_assoc($res)){
              echo '<tr data-device-id="'.(int)$r['id'].'">';
              echo '<td><input type="checkbox"></td>';
              echo '<td>'.esc($r['name']).'</td>';
              $ctype = ($r['connection_type'] ?? 'lan');
              echo '<td>'.($ctype==='hik_connect' ? 'Hik-Connect' : 'IP/Domain').'</td>';
              $net = $ctype==='hik_connect' ? (esc($r['cloud_host'] ?? 'litedev.sgp.hik-connect.com').':443') : (esc($r['ip']).':'.(int)$r['port']);
              echo '<td>'.$net.'</td>';
              echo '<td><span id="model-'.(int)$r['id'].'">—</span></td>';
              echo '<td><span id="serial-'.(int)$r['id'].'">—</span></td>';
              $sec = ($r['protocol']==='https' || strlen($r['password'])>=8) ? '<span class="text-success">Strong</span>' : '<span class="text-warning">Weak</span>';
              echo '<td>'.$sec.'</td>';
              echo '<td><span class="badge badge-light" id="ol-'.(int)$r['id'].'">—</span></td>';
              echo '<td>';
              echo '<a class="btn btn-sm btn-outline-secondary" title="Edit" href="'.APP_BASE.'/attendance/Devices.php?action=edit&id='.(int)$r['id'].'"><i class="fas fa-edit"></i></a> ';
              echo '<a class="btn btn-sm btn-outline-danger" title="Delete" href="'.APP_BASE.'/attendance/Devices.php?action=delete&id='.(int)$r['id'].'"><i class="fas fa-trash"></i></a>';
              echo '</td>';
              echo '</tr>';
            }
          } else {
            echo '<tr><td colspan="9" class="text-center">No devices</td></tr>';
          }
        ?>
      </tbody>
    </table>
  </div>
  <script>
    (function(){
      async function refreshOnline(){
        // Default all to Offline so UI doesn't stay as em-dash
        var rows = document.querySelectorAll('tr[data-device-id]');
        rows.forEach(function(tr){
          var id = tr.getAttribute('data-device-id');
          var el = document.getElementById('ol-'+id);
          if (el) { el.className = 'badge badge-secondary'; el.textContent = 'Offline'; }
        });

        try{
          var res = await fetch('<?php echo APP_BASE; ?>/attendance/Devices.php?action=ping_all');
          var data = await res.json();
          if (!data || !data.devices) return; // keep Offline default
          data.devices.forEach(function(d){
            var el = document.getElementById('ol-'+d.id);
            if (!el) return;
            el.className = 'badge ' + (d.online ? 'badge-success' : 'badge-secondary');
            el.textContent = d.online ? 'Online' : 'Offline';
            // Attach debug info as tooltip
            el.setAttribute('title', (d.url? d.url+' ' : '') + '(HTTP '+ (d.status||'0') +')');
          });
        }catch(e){ /* keep Offline default on error */ }
      }

      async function refreshInfo(){
        try{
          var res = await fetch('<?php echo APP_BASE; ?>/attendance/Devices.php?action=info_all');
          var data = await res.json();
          if (!data || !data.devices) return;
          data.devices.forEach(function(d){
            var m = document.getElementById('model-'+d.id);
            var s = document.getElementById('serial-'+d.id);
            if (m) m.textContent = d.model && d.model.trim()? d.model : '—';
            if (s) s.textContent = d.serial && d.serial.trim()? d.serial : '—';
          });
        }catch(e){ /* ignore */ }
      }
      refreshOnline();
      refreshInfo();
      setInterval(refreshOnline, 10000);
      setInterval(refreshInfo, 30000);

      var btn = document.getElementById('btnRefresh');
      if (btn) btn.addEventListener('click', function(){ refreshOnline(); refreshInfo(); });
    })();
  </script>
<?php endif; ?>

<?php endif; // end of need_schema else ?>

    </div>
  </div>
</div>

<!--Block#3 start dont change the order-->
<?php include_once ("../footer.php"); ?>  
<!--  end dont change the order-->
