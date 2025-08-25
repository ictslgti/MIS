<?php
// hostel/ManageRooms.php - Manage blocks' rooms
$title = "Manage Rooms | SLGTI";
include_once("../config.php");
include_once("../head.php");
include_once("../menu.php");

if (!isset($_SESSION['user_type']) || !in_array($_SESSION['user_type'], ['ADM','WAR'])) {
  echo '<div class="container mt-4"><div class="alert alert-danger">Forbidden</div></div>';
  include_once("../footer.php");
  exit;
}

$notice = '';

// Create room
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'create_room') {
  $block_id = (int)($_POST['block_id'] ?? 0);
  $room_no  = trim($_POST['room_no'] ?? '');
  $capacity = max(1, (int)($_POST['capacity'] ?? 1));
  if ($block_id > 0 && $room_no !== '') {
    $st = mysqli_prepare($con, "INSERT INTO hostel_rooms(block_id, room_no, capacity) VALUES (?,?,?)");
    if ($st) { mysqli_stmt_bind_param($st, 'isi', $block_id, $room_no, $capacity); $ok = mysqli_stmt_execute($st); mysqli_stmt_close($st); $notice = $ok? 'Room created' : 'Failed to create room'; }
  }
}
// Delete room (only if no active allocations)
if (isset($_GET['del_room'])) {
  $rid = (int)$_GET['del_room'];
  $chk = mysqli_query($con, "SELECT COUNT(*) AS c FROM hostel_allocations WHERE room_id={$rid} AND status='active'");
  $row = $chk ? mysqli_fetch_assoc($chk) : ['c'=>0];
  if ((int)$row['c'] === 0) {
    mysqli_query($con, "DELETE FROM hostel_rooms WHERE id={$rid}");
  } else { $notice = 'Cannot delete: room has active allocations'; }
}

?>
<div class="container mt-4">
  <?php if ($notice): ?><div class="alert alert-info"><?php echo htmlspecialchars($notice); ?></div><?php endif; ?>
  <h3>Manage Rooms</h3>

  <div class="card mt-3">
    <div class="card-header">Add Room</div>
    <div class="card-body">
      <form method="POST">
        <input type="hidden" name="action" value="create_room" />
        <div class="form-row">
          <div class="form-group col-md-4">
            <label>Hostel</label>
            <select class="form-control" id="hostel_id" required>
              <option value="">Select...</option>
              <?php
              $h = mysqli_query($con, "SELECT id, name FROM hostels WHERE active=1 ORDER BY name");
              while ($h && $row = mysqli_fetch_assoc($h)) { echo '<option value="'.(int)$row['id'].'">'.htmlspecialchars($row['name']).'</option>'; }
              ?>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label>Block</label>
            <select class="form-control" name="block_id" id="block_id" required>
              <option value="">Select hostel first</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label>Room No</label>
            <input type="text" class="form-control" name="room_no" required />
          </div>
          <div class="form-group col-md-2">
            <label>Capacity</label>
            <input type="number" class="form-control" name="capacity" min="1" value="1" />
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Room</button>
      </form>
    </div>
  </div>

  <div class="card mt-4">
    <div class="card-header">Rooms</div>
    <div class="card-body table-responsive">
      <?php
        // Selected hostel filter (0 = all)
        $filterHostelId = isset($_GET['filter_hostel']) ? (int)$_GET['filter_hostel'] : 0;
      ?>
      <form method="GET" class="form-inline mb-3">
        <label class="mr-2 mb-2">Filter by Hostel:</label>
        <select name="filter_hostel" class="form-control mr-2 mb-2" onchange="this.form.submit()">
          <option value="0">All Hostels</option>
          <?php
            $hs = mysqli_query($con, "SELECT id, name FROM hostels WHERE active=1 ORDER BY name");
            while ($hs && $hrow = mysqli_fetch_assoc($hs)) {
              $sel = ($filterHostelId === (int)$hrow['id']) ? 'selected' : '';
              echo '<option value="'.(int)$hrow['id'].'" '.$sel.'>'.htmlspecialchars($hrow['name']).'</option>';
            }
          ?>
        </select>
        <noscript>
          <button type="submit" class="btn btn-secondary mb-2">Apply</button>
        </noscript>
      </form>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Hostel</th>
            <th>Block</th>
            <th>Room No</th>
            <th>Capacity</th>
            <th>Occupied</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT r.id, r.room_no, r.capacity, b.name AS block_name, h.name AS hostel_name,
                         (SELECT COUNT(*) FROM hostel_allocations a WHERE a.room_id=r.id AND a.status='active') AS occupied
                  FROM hostel_rooms r
                  JOIN hostel_blocks b ON b.id=r.block_id
                  JOIN hostels h ON h.id=b.hostel_id";
          $params = [];
          $types = '';
          if ($filterHostelId > 0) {
            $sql .= " WHERE h.id = ?";
            $params[] = $filterHostelId;
            $types .= 'i';
          }
          $sql .= " ORDER BY h.name, b.name, r.room_no";

          if ($types !== '') {
            $stmt = mysqli_prepare($con, $sql);
            if ($stmt) {
              mysqli_stmt_bind_param($stmt, $types, ...$params);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
            } else { $result = false; }
          } else {
            $result = mysqli_query($con, $sql);
          }

          while ($result && $row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>'.(int)$row['id'].'</td>';
            echo '<td>'.htmlspecialchars($row['hostel_name']).'</td>';
            echo '<td>'.htmlspecialchars($row['block_name']).'</td>';
            echo '<td>'.htmlspecialchars($row['room_no']).'</td>';
            echo '<td>'.(int)$row['capacity'].'</td>';
            echo '<td>'.(int)$row['occupied'].'</td>';
            $disabled = ((int)$row['occupied']>0)?'disabled title="Room has active allocations"':'';
            echo '<td><a class="btn btn-sm btn-outline-danger '.$disabled.'" href="hostel/ManageRooms.php?del_room='.(int)$row['id'].'" onclick="return '.(((int)$row['occupied']>0)?'false':'confirm(\'Delete room?\')').';">Delete</a></td>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
const base = '<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>';
const hostelSel = document.getElementById('hostel_id');
const blockSel  = document.getElementById('block_id');

hostelSel && hostelSel.addEventListener('change', async (e) => {
  blockSel.innerHTML = '<option value="">Loading...</option>';
  const hid = e.target.value;
  if (!hid) { blockSel.innerHTML = '<option value="">Select hostel first</option>'; return; }
  const r = await fetch(base + '/hostel/blocks_api.php?hostel_id=' + encodeURIComponent(hid));
  const data = await r.json();
  blockSel.innerHTML = '<option value="">Select...</option>' + data.map(b => `<option value="${b.id}">${b.name}</option>`).join('');
});
</script>
<?php include_once("../footer.php"); ?>
