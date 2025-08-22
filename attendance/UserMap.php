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
function esc($s){ return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }
function dbq($con,$s){ return mysqli_real_escape_string($con, $s); }

// Schema check
$has1 = mysqli_query($con, "SHOW TABLES LIKE 'hik_devices'");
$has2 = mysqli_query($con, "SHOW TABLES LIKE 'hik_user_map'");
if (!$has1 || mysqli_num_rows($has1)===0 || !$has2 || mysqli_num_rows($has2)===0){
  echo '<div class="container"><div class="alert alert-warning mt-3">Missing tables <code>hik_devices</code> and/or <code>hik_user_map</code>. Open Devices page to see SQL to create.</div></div>';
  include_once ("../footer.php");
  exit;
}

if ($action==='create' && $_SERVER['REQUEST_METHOD']==='POST'){
  $device_id = (int)($_POST['device_id']??0);
  $employee_no = dbq($con, $_POST['employee_no']??'');
  $student_id = dbq($con, $_POST['student_id']??'');
  if($device_id<=0 || $employee_no==='' || $student_id==='') $errors[]='All fields required.';
  if(empty($errors)){
    $sql = "INSERT INTO hik_user_map(device_id,employee_no,student_id) VALUES($device_id,'$employee_no','$student_id')";
    if(!mysqli_query($con,$sql)) $errors[]='DB Error: '.mysqli_error($con); else $action='list';
  }
}
if ($action==='delete' && isset($_GET['id'])){
  $id=(int)$_GET['id'];
  if(isset($_POST['confirm']) && $_POST['confirm']==='yes'){
    mysqli_query($con, "DELETE FROM hik_user_map WHERE id=$id");
    $action='list';
  }
}

?>
<div class="container" style="margin-top:30px">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-9">Hikvision User Mapping</div>
        <div class="col-md-3" align="right">
          <a class="btn btn-sm btn-primary" href="<?php echo APP_BASE; ?>/attendance/UserMap.php?action=create"><i class="fas fa-plus"></i> Add Mapping</a>
        </div>
      </div>
    </div>
    <div class="card-body">

<?php if(!empty($errors)): ?>
  <div class="alert alert-danger"><?php foreach($errors as $e){ echo '<div>'.esc($e).'</div>'; } ?></div>
<?php endif; ?>

<?php if ($action==='create'): ?>
  <form method="post" action="<?php echo APP_BASE; ?>/attendance/UserMap.php?action=create">
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Device</label>
        <select name="device_id" class="form-control" required>
          <option value="">-- Select device --</option>
          <?php $dlist=mysqli_query($con,"SELECT id,name FROM hik_devices WHERE enabled=1 ORDER BY name"); if($dlist && mysqli_num_rows($dlist)>0){ while($d=mysqli_fetch_assoc($dlist)){ ?>
            <option value="<?php echo (int)$d['id']; ?>"><?php echo esc($d['name']); ?></option>
          <?php } } ?>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label>Device Employee No</label>
        <input class="form-control" name="employee_no" required>
      </div>
      <div class="form-group col-md-4">
        <label>Student ID</label>
        <input class="form-control" name="student_id" required>
      </div>
    </div>
    <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Save</button>
    <a class="btn btn-secondary" href="<?php echo APP_BASE; ?>/attendance/UserMap.php">Cancel</a>
  </form>
<?php elseif ($action==='delete' && isset($_GET['id'])): ?>
  <div class="alert alert-danger">Delete this mapping?</div>
  <form method="post" action="<?php echo APP_BASE; ?>/attendance/UserMap.php?action=delete&id=<?php echo (int)$_GET['id']; ?>"><input type="hidden" name="confirm" value="yes"><button class="btn btn-danger">Delete</button> <a class="btn btn-secondary" href="<?php echo APP_BASE; ?>/attendance/UserMap.php">Cancel</a></form>
<?php else: ?>
  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <thead><tr><th>#</th><th>Device</th><th>Employee No</th><th>Student ID</th><th>Actions</th></tr></thead>
      <tbody>
        <?php
          $sql="SELECT m.id,d.name as device_name,m.employee_no,m.student_id FROM hik_user_map m LEFT JOIN hik_devices d ON d.id=m.device_id ORDER BY m.id DESC";
          $res=mysqli_query($con,$sql);
          if($res && mysqli_num_rows($res)>0){ while($r=mysqli_fetch_assoc($res)){
            echo '<tr>';
            echo '<td>'.(int)$r['id'].'</td>';
            echo '<td>'.esc($r['device_name']).'</td>';
            echo '<td>'.esc($r['employee_no']).'</td>';
            echo '<td>'.esc($r['student_id']).'</td>';
            echo '<td><a class="btn btn-sm btn-outline-danger" href="'.APP_BASE.'/attendance/UserMap.php?action=delete&id='.(int)$r['id'].'"><i class="fas fa-trash"></i></a></td>';
            echo '</tr>';
          } } else { echo '<tr><td colspan="5" class="text-center">No mappings</td></tr>'; }
        ?>
      </tbody>
    </table>
  </div>
<?php endif; ?>

    </div>
  </div>
</div>

<!--Block#3 start dont change the order-->
<?php include_once ("../footer.php"); ?>  
<!--  end dont change the order-->
