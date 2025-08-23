<?php
// hostel/AssignHostel.php - Assign a paid request to a room
$title = "Assign Hostel | SLGTI";
include_once("../config.php");
include_once("../head.php");
include_once("../menu.php");

if (!isset($_SESSION['user_type']) || !in_array($_SESSION['user_type'], ['ADM','WAR'])) {
  echo '<div class="container mt-4"><div class="alert alert-danger">Forbidden</div></div>';
  include_once("../footer.php");
  exit;
}

$base = defined('APP_BASE') ? APP_BASE : '';
$student_id = isset($_GET['student_id']) ? trim($_GET['student_id']) : '';

// Load request ensure it's paid
$req = null;
if ($student_id !== '') {
  $st = mysqli_prepare($con, "SELECT student_id, distance_km, status FROM hostel_requests WHERE student_id=?");
  mysqli_stmt_bind_param($st, 's', $student_id);
  mysqli_stmt_execute($st);
  $res = mysqli_stmt_get_result($st);
  $req = $res ? mysqli_fetch_assoc($res) : null;
  mysqli_stmt_close($st);
}

?>
<div class="container mt-4">
  <h3>Assign Hostel</h3>
  <?php if (!$req): ?>
    <div class="alert alert-warning">No request found for this student.</div>
  <?php elseif ($req['status'] !== 'paid'): ?>
    <div class="alert alert-info">Request status is <?php echo htmlspecialchars($req['status']); ?>. Only 'paid' requests can be assigned.</div>
  <?php endif; ?>

  <form method="POST" action="<?php echo $base; ?>/controller/HostelAllocate.php">
    <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($student_id); ?>" />

    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Hostel</label>
        <select name="hostel_id" id="hostel_id" class="form-control" required>
          <option value="">Select...</option>
          <?php
          $q = mysqli_query($con, "SELECT id, name FROM hostels WHERE active=1 ORDER BY name");
          while ($h = $q && mysqli_fetch_assoc($q)) {
            echo '<option value="'.(int)$h['id'].'">'.htmlspecialchars($h['name']).'</option>';
          }
          ?>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label>Block</label>
        <select name="block_id" id="block_id" class="form-control" required>
          <option value="">Select hostel first</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label>Room</label>
        <select name="room_id" id="room_id" class="form-control" required>
          <option value="">Select block first</option>
        </select>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Allocated Date</label>
        <input type="date" class="form-control" name="allocated_at" value="<?php echo date('Y-m-d'); ?>" required />
      </div>
      <div class="form-group col-md-4">
        <label>Leaving Date</label>
        <input type="date" class="form-control" name="leaving_at" />
      </div>
    </div>

    <button type="submit" class="btn btn-primary" <?php echo (!$req || $req['status']!=='paid')?'disabled':''; ?>>Assign</button>
    <a href="<?php echo $base; ?>/hostel/Requests.php" class="btn btn-secondary ml-2">Back</a>
  </form>

  <hr />
  <small class="text-muted">Tip: Capacity check is enforced on submit.</small>
</div>

<script>
// Simple chained selects using basic fetch endpoints
const base = '<?php echo $base; ?>';
const hostelSel = document.getElementById('hostel_id');
const blockSel = document.getElementById('block_id');
const roomSel = document.getElementById('room_id');

hostelSel && hostelSel.addEventListener('change', async (e) => {
  blockSel.innerHTML = '<option value="">Loading...</option>';
  roomSel.innerHTML = '<option value="">Select block first</option>';
  const hid = e.target.value;
  if (!hid) { blockSel.innerHTML = '<option value="">Select...</option>'; return; }
  const r = await fetch(base + '/hostel/blocks_api.php?hostel_id=' + encodeURIComponent(hid));
  const data = await r.json();
  blockSel.innerHTML = '<option value="">Select...</option>' + data.map(b => `<option value="${b.id}">${b.name}</option>`).join('');
});

blockSel && blockSel.addEventListener('change', async (e) => {
  roomSel.innerHTML = '<option value="">Loading...</option>';
  const bid = e.target.value;
  if (!bid) { roomSel.innerHTML = '<option value="">Select...</option>'; return; }
  const r = await fetch(base + '/hostel/rooms_api.php?block_id=' + encodeURIComponent(bid));
  const data = await r.json();
  roomSel.innerHTML = '<option value="">Select...</option>' + data.map(rm => `<option value="${rm.id}">${rm.room_no} (cap ${rm.capacity}, occ ${rm.occupied})</option>`).join('');
});
</script>

<?php include_once("../footer.php"); ?>
