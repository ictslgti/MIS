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

function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
function esc($con,$s){ return mysqli_real_escape_string($con, trim((string)$s)); }

$tab = $_GET['tab'] ?? 'devices';
$action = $_GET['action'] ?? 'list';
$errors = [];
$messages = [];

// Handle device form submissions
if ($tab === 'devices') {
  if ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = esc($con, $_POST['name'] ?? '');
    $ip = esc($con, $_POST['ip'] ?? '');
    $port = (int)($_POST['port'] ?? 80);
    $protocol = in_array($_POST['protocol'] ?? 'http', ['http','https']) ? $_POST['protocol'] : 'http';
    $username = esc($con, $_POST['username'] ?? '');
    $password = esc($con, $_POST['password'] ?? '');
    $endpoint_path = esc($con, $_POST['endpoint_path'] ?? '/ISAPI/AccessControl/AcsEvent?format=json');
    $connection_type = in_array($_POST['connection_type'] ?? 'lan', ['lan','hik_connect']) ? $_POST['connection_type'] : 'lan';
    $cloud_host = esc($con, $_POST['cloud_host'] ?? 'litedev.sgp.hik-connect.com');
    $device_serial = esc($con, $_POST['device_serial'] ?? '');
    $enabled = isset($_POST['enabled']) ? 1 : 0;

    if ($name==='') $errors[]='Name is required';
    if ($ip==='') $errors[]='IP/Host is required';
    if ($username==='') $errors[]='Username is required';

    if (empty($errors)) {
      $sql = "INSERT INTO hik_devices(name, ip, port, protocol, username, password, endpoint_path, connection_type, cloud_host, device_serial, enabled) VALUES ('$name','$ip',$port,'$protocol','$username','$password','$endpoint_path','$connection_type','$cloud_host',".($device_serial?"'$device_serial'":"NULL").",$enabled)";
      if (mysqli_query($con, $sql)) { $messages[] = 'Device created.'; $action='list'; }
      else { $errors[] = 'DB Error: '.mysqli_error($con); }
    }
  }

  if ($action === 'edit' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = esc($con, $_POST['name'] ?? '');
      $ip = esc($con, $_POST['ip'] ?? '');
      $port = (int)($_POST['port'] ?? 80);
      $protocol = in_array($_POST['protocol'] ?? 'http', ['http','https']) ? $_POST['protocol'] : 'http';
      $username = esc($con, $_POST['username'] ?? '');
      $password = esc($con, $_POST['password'] ?? '');
      $endpoint_path = esc($con, $_POST['endpoint_path'] ?? '/ISAPI/AccessControl/AcsEvent?format=json');
      $connection_type = in_array($_POST['connection_type'] ?? 'lan', ['lan','hik_connect']) ? $_POST['connection_type'] : 'lan';
      $cloud_host = esc($con, $_POST['cloud_host'] ?? 'litedev.sgp.hik-connect.com');
      $device_serial = esc($con, $_POST['device_serial'] ?? '');
      $enabled = isset($_POST['enabled']) ? 1 : 0;

      if ($name==='') $errors[]='Name is required';
      if ($ip==='') $errors[]='IP/Host is required';
      if ($username==='') $errors[]='Username is required';

      if (empty($errors)) {
        $sql = "UPDATE hik_devices SET name='$name', ip='$ip', port=$port, protocol='$protocol', username='$username', password='$password', endpoint_path='$endpoint_path', connection_type='$connection_type', cloud_host='$cloud_host', device_serial=".($device_serial?"'$device_serial'":"NULL").", enabled=$enabled WHERE id=$id";
        if (mysqli_query($con, $sql)) { $messages[] = 'Device updated.'; $action='list'; }
        else { $errors[] = 'DB Error: '.mysqli_error($con); }
      }
    }
  }

  if ($action === 'delete' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    if (isset($_POST['confirm']) && $_POST['confirm']==='yes') {
      if (!mysqli_query($con, "DELETE FROM hik_devices WHERE id=$id")) { $errors[] = 'DB Error: '.mysqli_error($con); }
      else { $messages[] = 'Device deleted.'; $action='list'; }
    }
  }

  // Test connection
  if ($action === 'test' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $res = mysqli_query($con, "SELECT * FROM hik_devices WHERE id=$id");
    $dev = $res ? mysqli_fetch_assoc($res) : null;
    if (!$dev) { $errors[] = 'Device not found'; }
    else {
      $path = '/'.ltrim($dev['endpoint_path'],'/');
      $base = rtrim($dev['protocol'].'://'.$dev['ip'].':'.$dev['port'],'/');
      $url = $base.$path.(strpos($path,'?')===false?'?format=json':'');
      // Add short time range to make response small
      $today = date('Y-m-d');
      $url .= (strpos($url,'?')===false?'?':'&').'startTime='.urlencode($today.'T00:00:00').'&endTime='.urlencode($today.'T00:10:00');
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_USERPWD, $dev['username'].':'.$dev['password']);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
      curl_setopt($ch, CURLOPT_TIMEOUT, 10);
      if ($dev['protocol']==='https') { curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false); curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false); }
      $resp = curl_exec($ch);
      $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      $err = curl_error($ch);
      curl_close($ch);
      if ($resp !== false && $code < 400) {
        $messages[] = 'Connection OK (HTTP '.(int)$code.').';
      } else {
        $errors[] = 'Connection failed (HTTP '.(int)$code.'). '.($err?:'No/empty response');
      }
      $action='list';
    }
  }
}

// Handle user mapping submissions
if ($tab === 'mappings') {
  if ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $device_id = (int)($_POST['device_id'] ?? 0);
    $employee_no = esc($con, $_POST['employee_no'] ?? '');
    $student_id = esc($con, $_POST['student_id'] ?? '');
    if ($device_id<=0) $errors[]='Device is required';
    if ($employee_no==='') $errors[]='Employee/Card number is required';
    if ($student_id==='') $errors[]='Student ID is required';
    if (empty($errors)) {
      $sql = "INSERT INTO hik_user_map(device_id, employee_no, student_id) VALUES ($device_id, '$employee_no', '$student_id')";
      if (mysqli_query($con, $sql)) { $messages[]='Mapping created.'; $action='list'; }
      else { $errors[]='DB Error: '.mysqli_error($con); }
    }
  }
  if ($action === 'delete' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    if (isset($_POST['confirm']) && $_POST['confirm']==='yes') {
      if (!mysqli_query($con, "DELETE FROM hik_user_map WHERE id=$id")) { $errors[]='DB Error: '.mysqli_error($con); }
      else { $messages[]='Mapping deleted.'; $action='list'; }
    }
  }
}
?>

<div class="container" style="margin-top:30px">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-8">Hikvision Devices & User Mapping</div>
        <div class="col-md-4" align="right">
          <div class="btn-group">
            <a href="<?php echo APP_BASE; ?>/attendance/Devices.php?tab=devices&action=create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Device</a>
            <a href="<?php echo APP_BASE; ?>/attendance/Devices.php?tab=mappings&action=create" class="btn btn-success btn-sm"><i class="fas fa-user-plus"></i> Add Mapping</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">

      <?php if (!empty($errors)): ?>
        <div class="alert alert-danger"><?php foreach($errors as $e){ echo '<div>'.h($e).'</div>'; } ?></div>
      <?php endif; ?>
      <?php if (!empty($messages)): ?>
        <div class="alert alert-success"><?php foreach($messages as $m){ echo '<div>'.h($m).'</div>'; } ?></div>
      <?php endif; ?>

      <ul class="nav nav-tabs mb-3">
        <li class="nav-item"><a class="nav-link <?php echo $tab==='devices'?'active':''; ?>" href="<?php echo APP_BASE; ?>/attendance/Devices.php?tab=devices">Devices</a></li>
        <li class="nav-item"><a class="nav-link <?php echo $tab==='mappings'?'active':''; ?>" href="<?php echo APP_BASE; ?>/attendance/Devices.php?tab=mappings">User Mappings</a></li>
      </ul>

      <?php if ($tab==='devices'): ?>
        <?php if ($action==='create' || ($action==='edit' && isset($_GET['id']))): ?>
          <?php
            $edit = null;
            if ($action==='edit') {
              $id = (int)$_GET['id'];
              $r = mysqli_query($con, "SELECT * FROM hik_devices WHERE id=$id");
              $edit = $r ? mysqli_fetch_assoc($r) : null;
              if (!$edit) { echo '<div class="alert alert-warning">Device not found.</div>'; $action='list'; }
            }
          ?>
          <?php if ($action!=='list'): ?>
          <form method="post" action="<?php echo APP_BASE; ?>/attendance/Devices.php?tab=devices&action=<?php echo h($action); ?><?php echo isset($id)?'&id='.(int)$id:''; ?>">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo h($edit['name'] ?? ''); ?>" required>
              </div>
              <div class="form-group col-md-4">
                <label>IP / Host</label>
                <input type="text" name="ip" class="form-control" value="<?php echo h($edit['ip'] ?? ''); ?>" required>
              </div>
              <div class="form-group col-md-2">
                <label>Protocol</label>
                <select name="protocol" class="form-control">
                  <?php $proto = $edit['protocol'] ?? 'http'; ?>
                  <option value="http" <?php echo $proto==='http'?'selected':''; ?>>http</option>
                  <option value="https" <?php echo $proto==='https'?'selected':''; ?>>https</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label>Port</label>
                <input type="number" name="port" class="form-control" value="<?php echo h($edit['port'] ?? 80); ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo h($edit['username'] ?? ''); ?>" required>
              </div>
              <div class="form-group col-md-3">
                <label>Password</label>
                <input type="text" name="password" class="form-control" value="<?php echo h($edit['password'] ?? ''); ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label>Endpoint Path</label>
                <input type="text" name="endpoint_path" class="form-control" value="<?php echo h($edit['endpoint_path'] ?? '/ISAPI/AccessControl/AcsEvent?format=json'); ?>">
                <small class="form-text text-muted">E.g. /ISAPI/AccessControl/AcsEvent?format=json or /ISAPI/AccessControl/LogSearch?format=json</small>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label>Connection</label>
                <?php $ctype = $edit['connection_type'] ?? 'lan'; ?>
                <select name="connection_type" class="form-control">
                  <option value="lan" <?php echo $ctype==='lan'?'selected':''; ?>>LAN (ISAPI)</option>
                  <option value="hik_connect" <?php echo $ctype==='hik_connect'?'selected':''; ?>>Hik-Connect (OpenAPI)</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label>Cloud Host</label>
                <input type="text" name="cloud_host" class="form-control" value="<?php echo h($edit['cloud_host'] ?? 'litedev.sgp.hik-connect.com'); ?>">
              </div>
              <div class="form-group col-md-3">
                <label>Device Serial</label>
                <input type="text" name="device_serial" class="form-control" value="<?php echo h($edit['device_serial'] ?? ''); ?>">
              </div>
              <div class="form-group col-md-2 form-check" style="padding-top:32px">
                <?php $en = (int)($edit['enabled'] ?? 1); ?>
                <input type="checkbox" class="form-check-input" id="enabled" name="enabled" <?php echo $en? 'checked':''; ?>>
                <label class="form-check-label" for="enabled">Enabled</label>
              </div>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
            <a href="<?php echo APP_BASE; ?>/attendance/Devices.php?tab=devices" class="btn btn-secondary">Cancel</a>
          </form>
          <?php endif; ?>
        <?php elseif ($action==='delete' && isset($_GET['id'])): ?>
          <div class="alert alert-danger"><strong>Confirm delete device?</strong></div>
          <form method="post" action="<?php echo APP_BASE; ?>/attendance/Devices.php?tab=devices&action=delete&id=<?php echo (int)$_GET['id']; ?>">
            <input type="hidden" name="confirm" value="yes">
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
            <a href="<?php echo APP_BASE; ?>/attendance/Devices.php?tab=devices" class="btn btn-secondary">Cancel</a>
          </form>
        <?php else: // list devices ?>
          <?php $res = mysqli_query($con, "SELECT * FROM hik_devices ORDER BY id DESC"); ?>
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Endpoint</th>
                  <th>Conn</th>
                  <th>Enabled</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($res && mysqli_num_rows($res)>0): while($d=mysqli_fetch_assoc($res)): ?>
                  <tr>
                    <td><?php echo (int)$d['id']; ?></td>
                    <td><?php echo h($d['name']); ?></td>
                    <td><?php echo h($d['protocol'].'://'.$d['ip'].':'.$d['port']); ?></td>
                    <td><code><?php echo h($d['endpoint_path']); ?></code></td>
                    <td><?php echo h($d['connection_type']); ?></td>
                    <td><?php echo ((int)$d['enabled'])?'<span class="badge badge-success">Yes</span>':'<span class="badge badge-secondary">No</span>'; ?></td>
                    <td>
                      <a class="btn btn-sm btn-outline-info" href="<?php echo APP_BASE; ?>/attendance/ManageAttendance.php?action=fetch">Fetch</a>
                      <a class="btn btn-sm btn-outline-primary" href="<?php echo APP_BASE; ?>/attendance/Devices.php?tab=devices&action=edit&id=<?php echo (int)$d['id']; ?>"><i class="fas fa-edit"></i></a>
                      <a class="btn btn-sm btn-outline-danger" href="<?php echo APP_BASE; ?>/attendance/Devices.php?tab=devices&action=delete&id=<?php echo (int)$d['id']; ?>"><i class="fas fa-trash"></i></a>
                      <a class="btn btn-sm btn-outline-secondary" href="<?php echo APP_BASE; ?>/attendance/Devices.php?tab=devices&action=test&id=<?php echo (int)$d['id']; } ?>">Test</a>
                    </td>
                  </tr>
                <?php else: ?>
                  <tr><td colspan="7" class="text-center">No devices</td></tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>

      <?php elseif ($tab==='mappings'): ?>
        <?php if ($action==='create'): ?>
          <form method="post" action="<?php echo APP_BASE; ?>/attendance/Devices.php?tab=mappings&action=create">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Device</label>
                <select name="device_id" class="form-control" required>
                  <option value="">-- Select device --</option>
                  <?php $dl = mysqli_query($con, "SELECT id,name FROM hik_devices WHERE enabled=1 ORDER BY name");
                    if ($dl && mysqli_num_rows($dl)>0){ while($d=mysqli_fetch_assoc($dl)){ ?>
                      <option value="<?php echo (int)$d['id']; ?>"><?php echo h($d['name']); ?></option>
                  <?php } } ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label>Employee/Card No</label>
                <input type="text" name="employee_no" class="form-control" required>
              </div>
              <div class="form-group col-md-4">
                <label>Student ID</label>
                <input type="text" name="student_id" class="form-control" required>
              </div>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
            <a href="<?php echo APP_BASE; ?>/attendance/Devices.php?tab=mappings" class="btn btn-secondary">Cancel</a>
          </form>
        <?php elseif ($action==='delete' && isset($_GET['id'])): ?>
          <div class="alert alert-danger"><strong>Confirm delete mapping?</strong></div>
          <form method="post" action="<?php echo APP_BASE; ?>/attendance/Devices.php?tab=mappings&action=delete&id=<?php echo (int)$_GET['id']; ?>">
            <input type="hidden" name="confirm" value="yes">
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
            <a href="<?php echo APP_BASE; ?>/attendance/Devices.php?tab=mappings" class="btn btn-secondary">Cancel</a>
          </form>
        <?php else: ?>
          <?php $res = mysqli_query($con, "SELECT m.id, m.employee_no, m.student_id, d.name as device_name FROM hik_user_map m JOIN hik_devices d ON d.id=m.device_id ORDER BY m.id DESC"); ?>
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Device</th>
                  <th>Employee/Card No</th>
                  <th>Student ID</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($res && mysqli_num_rows($res)>0): while($r=mysqli_fetch_assoc($res)): ?>
                  <tr>
                    <td><?php echo (int)$r['id']; ?></td>
                    <td><?php echo h($r['device_name']); ?></td>
                    <td><?php echo h($r['employee_no']); ?></td>
                    <td><?php echo h($r['student_id']); ?></td>
                    <td>
                      <a class="btn btn-sm btn-outline-danger" href="<?php echo APP_BASE; ?>/attendance/Devices.php?tab=mappings&action=delete&id=<?php echo (int)$r['id']; ?>"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                <?php endwhile; else: ?>
                  <tr><td colspan="5" class="text-center">No mappings</td></tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
          <p class="text-muted">Tip: Employee/Card No must match the device's employeeNoString from events. Only mapped users will be stored during Fetch.</p>
        <?php endif; ?>
      <?php endif; ?>

    </div>
  </div>
</div>

<!--Block#3 start dont change the order-->
<?php include_once ("../footer.php"); ?>  
<!--  end dont change the order-->
