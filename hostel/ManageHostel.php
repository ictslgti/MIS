<?php
// hostel/ManageHostel.php - Manage hostels and blocks
$title = "Manage Hostels | SLGTI";
include_once("../config.php");
include_once("../head.php");
include_once("../menu.php");

if (!isset($_SESSION['user_type']) || !in_array($_SESSION['user_type'], ['ADM','WAR'])) {
  echo '<div class="container mt-4"><div class="alert alert-danger">Forbidden</div></div>';
  include_once("../footer.php");
  exit;
}

$base = defined('APP_BASE') ? APP_BASE : '';
$notice = '';

// Determine warden gender if WAR
$wardenGender = null;
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'WAR' && !empty($_SESSION['user_name'])) {
  if ($st = mysqli_prepare($con, "SELECT staff_gender FROM staff WHERE staff_id=? LIMIT 1")) {
    mysqli_stmt_bind_param($st, 's', $_SESSION['user_name']);
    mysqli_stmt_execute($st);
    $rs = mysqli_stmt_get_result($st);
    if ($rs) { $r = mysqli_fetch_assoc($rs); if ($r && isset($r['staff_gender'])) { $wardenGender = $r['staff_gender']; } }
    mysqli_stmt_close($st);
  }
}

// Handle create hostel
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action']==='create_hostel') {
  $name = trim($_POST['name'] ?? '');
  $gender = $_POST['gender'] ?? 'Mixed';
  $address = trim($_POST['address'] ?? '');
  if ($name !== '') {
    if ($wardenGender && !($gender === 'Mixed' || $gender === $wardenGender)) {
      $notice = 'You are not allowed to create a hostel of this gender.';
    } else {
      $st = mysqli_prepare($con, "INSERT INTO hostels(name, gender, address, active) VALUES (?,?,?,1)");
      if ($st) { mysqli_stmt_bind_param($st, 'sss', $name, $gender, $address); $ok = mysqli_stmt_execute($st); mysqli_stmt_close($st); $notice = $ok?'Hostel created':'Failed to create'; }
    }
  }
}
// Handle toggle active
if (isset($_GET['toggle'])) {
  $hid = (int)$_GET['toggle'];
  if ($wardenGender) {
    $allowed = false;
    if ($st = mysqli_prepare($con, "SELECT gender FROM hostels WHERE id=?")) {
      mysqli_stmt_bind_param($st, 'i', $hid);
      mysqli_stmt_execute($st);
      $res = mysqli_stmt_get_result($st);
      $row = $res ? mysqli_fetch_assoc($res) : null;
      mysqli_stmt_close($st);
      if ($row && ($row['gender'] === 'Mixed' || $row['gender'] === $wardenGender)) { $allowed = true; }
    }
    if ($allowed) { mysqli_query($con, "UPDATE hostels SET active = 1 - active WHERE id=".$hid); } else { $notice = 'Not allowed for this hostel.'; }
  } else {
    mysqli_query($con, "UPDATE hostels SET active = 1 - active WHERE id=".$hid);
  }
}
// Handle add block
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action']==='create_block') {
  $hostel_id = (int)($_POST['hostel_id'] ?? 0);
  $bname = trim($_POST['bname'] ?? '');
  if ($hostel_id>0 && $bname !== '') {
    if ($wardenGender) {
      $allowed = false;
      if ($st2 = mysqli_prepare($con, "SELECT gender FROM hostels WHERE id=?")) {
        mysqli_stmt_bind_param($st2, 'i', $hostel_id);
        mysqli_stmt_execute($st2);
        $rs2 = mysqli_stmt_get_result($st2);
        $h = $rs2 ? mysqli_fetch_assoc($rs2) : null;
        mysqli_stmt_close($st2);
        if ($h && ($h['gender'] === 'Mixed' || $h['gender'] === $wardenGender)) { $allowed = true; }
      }
      if (!$allowed) { $notice = 'Not allowed to add block for this hostel.'; }
      else {
        $st = mysqli_prepare($con, "INSERT INTO hostel_blocks(hostel_id, name) VALUES (?,?)");
        if ($st) { mysqli_stmt_bind_param($st, 'is', $hostel_id, $bname); mysqli_stmt_execute($st); mysqli_stmt_close($st); $notice = 'Block created'; }
      }
    } else {
      $st = mysqli_prepare($con, "INSERT INTO hostel_blocks(hostel_id, name) VALUES (?,?)");
      if ($st) { mysqli_stmt_bind_param($st, 'is', $hostel_id, $bname); mysqli_stmt_execute($st); mysqli_stmt_close($st); $notice = 'Block created'; }
    }
  }
}
// Handle delete block
if (isset($_GET['del_block'])) {
  $bid = (int)$_GET['del_block'];
  if ($wardenGender) {
    $allowed = false;
    $sql = "SELECT h.gender FROM hostel_blocks b INNER JOIN hostels h ON h.id=b.hostel_id WHERE b.id=?";
    if ($st = mysqli_prepare($con, $sql)) {
      mysqli_stmt_bind_param($st, 'i', $bid);
      mysqli_stmt_execute($st);
      $rs = mysqli_stmt_get_result($st);
      $row = $rs ? mysqli_fetch_assoc($rs) : null;
      mysqli_stmt_close($st);
      if ($row && ($row['gender'] === 'Mixed' || $row['gender'] === $wardenGender)) { $allowed = true; }
    }
    if ($allowed) { mysqli_query($con, "DELETE FROM hostel_blocks WHERE id=".$bid); } else { $notice = 'Not allowed to delete this block.'; }
  } else {
    mysqli_query($con, "DELETE FROM hostel_blocks WHERE id=".$bid);
  }
}

?>
<div class="container mt-4">
  <?php if ($notice): ?><div class="alert alert-info"><?php echo htmlspecialchars($notice); ?></div><?php endif; ?>
  <h3>Manage Hostels</h3>

  <div class="card mt-3">
    <div class="card-header">Add Hostel</div>
    <div class="card-body">
      <form method="POST">
        <input type="hidden" name="action" value="create_hostel" />
        <div class="form-row">
          <div class="form-group col-md-4">
            <label>Name</label>
            <input type="text" class="form-control" name="name" required />
          </div>
          <div class="form-group col-md-3">
            <label>Gender</label>
            <select class="form-control" name="gender">
              <option>Mixed</option>
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>
          <div class="form-group col-md-5">
            <label>Address</label>
            <input type="text" class="form-control" name="address" />
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
    </div>
  </div>

  <div class="card mt-4">
    <div class="card-header">Hostels & Blocks</div>
    <div class="card-body table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Active</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($wardenGender) {
            $stL = mysqli_prepare($con, "SELECT * FROM hostels WHERE gender='Mixed' OR gender=? ORDER BY name");
            mysqli_stmt_bind_param($stL, 's', $wardenGender);
            mysqli_stmt_execute($stL);
            $h = mysqli_stmt_get_result($stL);
          } else {
            $h = mysqli_query($con, "SELECT * FROM hostels ORDER BY name");
          }
          while ($h && $row = mysqli_fetch_assoc($h)) {
            echo '<tr>';
            echo '<td>'.(int)$row['id'].'</td>';
            echo '<td>'.htmlspecialchars($row['name']).'</td>';
            echo '<td>'.htmlspecialchars($row['gender']).'</td>';
            echo '<td>'.htmlspecialchars($row['address']).'</td>';
            echo '<td>'.($row['active']?'<span class="badge badge-success">Yes</span>':'<span class="badge badge-secondary">No</span>').'</td>';
            echo '<td><a class="btn btn-sm btn-outline-secondary" href="?toggle='.(int)$row['id'].'">Toggle Active</a></td>';
            echo '</tr>';
            // Blocks under this hostel
            $b = mysqli_query($con, "SELECT * FROM hostel_blocks WHERE hostel_id=".(int)$row['id']." ORDER BY name");
            echo '<tr><td></td><td colspan="5">';
            echo '<strong>Blocks</strong>';
            echo '<ul class="mb-2">';
            while ($b && $bl = mysqli_fetch_assoc($b)) {
              echo '<li>'.htmlspecialchars($bl['name']).' <a class="text-danger" href="hostel/ManageHostel.php?del_block='.(int)$bl['id'].'" onclick="return confirm(\'Delete block?\')">[delete]</a></li>';
            }
            echo '</ul>';
            echo '<form method="POST" class="form-inline">';
            echo '<input type="hidden" name="action" value="create_block" />';
            echo '<input type="hidden" name="hostel_id" value="'.(int)$row['id'].'" />';
            echo '<div class="form-group mr-2"><input type="text" name="bname" class="form-control" placeholder="New block name" required /></div>';
            echo '<button class="btn btn-sm btn-primary" type="submit">Add Block</button>';
            echo '</form>';
            echo '</td></tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include_once("../footer.php"); ?>
