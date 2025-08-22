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

$errors = [];
$action = $_GET['action'] ?? 'list';
$flash  = '';

function esc($s){ return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }
function dbq($con,$s){ return mysqli_real_escape_string($con, $s); }

// Table checks
$need_schema = [];
$has_hik_devices = mysqli_query($con, "SHOW TABLES LIKE 'hik_devices'");
if (!$has_hik_devices || mysqli_num_rows($has_hik_devices)===0) { $need_schema[] = 'hik_devices'; }
$has_hik_user_map = mysqli_query($con, "SHOW TABLES LIKE 'hik_user_map'");
if (!$has_hik_user_map || mysqli_num_rows($has_hik_user_map)===0) { $need_schema[] = 'hik_user_map'; }
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
  $enabled = isset($_POST['enabled'])?1:0;
  if($name===''||$ip===''||$username===''||$password==='') $errors[]='All required fields must be filled.';
  if(empty($errors)){
    $sql = "INSERT INTO hik_devices(name,ip,port,protocol,username,password,endpoint_path,enabled) VALUES('$name','$ip',$port,'$protocol','$username','$password','$endpoint_path',$enabled)";
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
    $enabled = isset($_POST['enabled'])?1:0;
    if($name===''||$ip===''||$username===''||$password==='') $errors[]='All required fields must be filled.';
    if(empty($errors)){
      $sql = "UPDATE hik_devices SET name='$name',ip='$ip',port=$port,protocol='$protocol',username='$username',password='$password',endpoint_path='$endpoint_path',enabled=$enabled WHERE id=$id";
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
    $row = ['name'=>'','ip'=>'','port'=>80,'protocol'=>'http','username'=>'','password'=>'','endpoint_path'=>'/ISAPI/AccessControl/AcsEvent?format=json','enabled'=>1];
    if ($action==='edit'){
      $id=(int)$_GET['id'];
      $res=mysqli_query($con,"SELECT * FROM hik_devices WHERE id=$id");
      if($res && mysqli_num_rows($res)) $row=mysqli_fetch_assoc($res);
    }
  ?>
  <form method="post" action="<?php echo APP_BASE; ?>/attendance/Devices.php?action=<?php echo $action==='edit' ? 'edit&id='.(int)($_GET['id']??0) : 'create'; ?>">
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Name</label>
        <input class="form-control" name="name" value="<?php echo esc($row['name']); ?>" required>
      </div>
      <div class="form-group col-md-3">
        <label>IP/Host</label>
        <input class="form-control" name="ip" value="<?php echo esc($row['ip']); ?>" required>
      </div>
      <div class="form-group col-md-2">
        <label>Port</label>
        <input class="form-control" type="number" name="port" value="<?php echo (int)$row['port']; ?>" required>
      </div>
      <div class="form-group col-md-3">
        <label>Protocol</label>
        <select class="form-control" name="protocol">
          <option value="http" <?php echo $row['protocol']==='http'?'selected':''; ?>>http</option>
          <option value="https" <?php echo $row['protocol']==='https'?'selected':''; ?>>https</option>
        </select>
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
        <input class="form-control" name="endpoint_path" value="<?php echo esc($row['endpoint_path']); ?>">
        <small class="form-text text-muted">Default: /ISAPI/AccessControl/AcsEvent?format=json</small>
      </div>
    </div>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="enabled" name="enabled" <?php echo ((int)$row['enabled'])? 'checked':''; ?>>
      <label class="form-check-label" for="enabled">Enabled</label>
    </div>
    <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Save</button>
    <a class="btn btn-secondary" href="<?php echo APP_BASE; ?>/attendance/Devices.php">Cancel</a>
  </form>
<?php elseif ($action==='delete' && isset($_GET['id'])): ?>
  <div class="alert alert-danger">Delete this device and its user mappings?</div>
  <form method="post" action="<?php echo APP_BASE; ?>/attendance/Devices.php?action=delete&id=<?php echo (int)$_GET['id']; ?>"><input type="hidden" name="confirm" value="yes"><button class="btn btn-danger">Delete</button> <a class="btn btn-secondary" href="<?php echo APP_BASE; ?>/attendance/Devices.php">Cancel</a></form>
<?php else: ?>
  <div class="mb-3"><a class="btn btn-outline-secondary btn-sm" href="<?php echo APP_BASE; ?>/attendance/UserMap.php">Manage User Mapping</a></div>
  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <thead><tr><th>#</th><th>Name</th><th>Host</th><th>Endpoint</th><th>Enabled</th><th>Actions</th></tr></thead>
      <tbody>
        <?php
          $res = mysqli_query($con, "SELECT * FROM hik_devices ORDER BY id DESC");
          if ($res && mysqli_num_rows($res)){
            while($r=mysqli_fetch_assoc($res)){
              echo '<tr>';
              echo '<td>'.(int)$r['id'].'</td>';
              echo '<td>'.esc($r['name']).'</td>';
              echo '<td>'.esc($r['protocol']).'://'.esc($r['ip']).':'.(int)$r['port'].'</td>';
              echo '<td>'.esc($r['endpoint_path']).'</td>';
              echo '<td>'.(((int)$r['enabled'])?'<span class="badge badge-success">Yes</span>':'<span class="badge badge-secondary">No</span>').'</td>';
              echo '<td><a class="btn btn-sm btn-outline-secondary" href="'.APP_BASE.'/attendance/Devices.php?action=edit&id='.(int)$r['id'].'"><i class="fas fa-edit"></i></a> ';
              echo '<a class="btn btn-sm btn-outline-danger" href="'.APP_BASE.'/attendance/Devices.php?action=delete&id='.(int)$r['id'].'"><i class="fas fa-trash"></i></a></td>';
              echo '</tr>';
            }
          } else {
            echo '<tr><td colspan="6" class="text-center">No devices</td></tr>';
          }
        ?>
      </tbody>
    </table>
  </div>
<?php endif; ?>

<?php endif; // end of need_schema else ?>

    </div>
  </div>
</div>

<!--Block#3 start dont change the order-->
<?php include_once ("../footer.php"); ?>  
<!--  end dont change the order-->
