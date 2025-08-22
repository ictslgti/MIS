<!--Block#1 start dont change the order-->
<?php 
$title="attendance | SLGTI";    
include_once ("../config.php");
include_once ("../head.php");
include_once ("../menu.php");
include_once ("Attendancenav.php");
?>
<!-- end dont change the order-->

<!-- Block#2 start your code -->
<?php
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'ADM') {
  echo '<div class="container"><div class="alert alert-danger mt-3">Access denied. Admins only.</div></div>';
  include_once ("../footer.php");
  exit;
}

$action = isset($_GET['action']) ? $_GET['action'] : 'list';
$errors = [];

function sanitize($con, $v) { return mysqli_real_escape_string($con, trim($v)); }

// Ensure table exists note: we only check, do not modify schema automatically
// Admins should create table using provided SQL if missing
$table_missing = false;
$check = mysqli_query($con, "SHOW TABLES LIKE 'attendance'");
if (!$check || mysqli_num_rows($check) === 0) {
  $table_missing = true;
}

?>
<div class="container" style="margin-top:30px">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-9">Manage Attendance (Admin)</div>
        <div class="col-md-3" align="right">
          <div class="btn-group">
            <a href="<?php echo APP_BASE; ?>/attendance/ManageAttendance.php?action=create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add</a>
            <a href="<?php echo APP_BASE; ?>/attendance/ManageAttendance.php?action=fetch" class="btn btn-info btn-sm"><i class="fas fa-download"></i> Fetch from Device</a>
            <a href="<?php echo APP_BASE; ?>/attendance/Devices.php" class="btn btn-secondary btn-sm"><i class="fas fa-cog"></i> Devices</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">

<?php if ($table_missing): ?>
  <div class="alert alert-warning">
    <strong>Attendance table not found.</strong> Please create it in the 'mis' database:
    <pre class="mb-2" style="white-space: pre-wrap">CREATE TABLE `attendance` (
  `attendance_id` INT AUTO_INCREMENT PRIMARY KEY,
  `student_id` VARCHAR(20) NOT NULL,
  `module_name` VARCHAR(100) NOT NULL,
  `staff_name` VARCHAR(100) NOT NULL,
  `attendance_status` TINYINT(1) NOT NULL DEFAULT 0,
  `date` DATE NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX (`student_id`),
  INDEX (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;</pre>
    After creating the table, refresh this page.
  </div>
<?php else: ?>

<?php
if ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $student_id = sanitize($con, $_POST['student_id'] ?? '');
  $module_name = sanitize($con, $_POST['module_name'] ?? '');
  $staff_name = sanitize($con, $_POST['staff_name'] ?? '');
  $attendance_status = isset($_POST['attendance_status']) && $_POST['attendance_status'] == '1' ? 1 : 0;
  $date = sanitize($con, $_POST['date'] ?? '');

  if ($student_id === '') $errors[] = 'Student ID is required';
  if ($module_name === '') $errors[] = 'Module is required';
  if ($staff_name === '') $errors[] = 'Staff is required';
  if ($date === '') $errors[] = 'Date is required';

  if (empty($errors)) {
    $sql = "INSERT INTO `attendance` (`student_id`,`module_name`,`staff_name`,`attendance_status`,`date`) VALUES ('$student_id','$module_name','$staff_name',$attendance_status,'$date')";
    if (mysqli_query($con, $sql)) {
      echo '<div class="alert alert-success">Record added.</div>';
      $action = 'list';
    } else {
      echo '<div class="alert alert-danger">DB Error: '.htmlspecialchars(mysqli_error($con)).'</div>';
    }
  }
}

if ($action === 'edit' && isset($_GET['id'])) {
  $id = (int)$_GET['id'];
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = sanitize($con, $_POST['student_id'] ?? '');
    $module_name = sanitize($con, $_POST['module_name'] ?? '');
    $staff_name = sanitize($con, $_POST['staff_name'] ?? '');
    $attendance_status = isset($_POST['attendance_status']) && $_POST['attendance_status'] == '1' ? 1 : 0;
    $date = sanitize($con, $_POST['date'] ?? '');

    if ($student_id === '') $errors[] = 'Student ID is required';
    if ($module_name === '') $errors[] = 'Module is required';
    if ($staff_name === '') $errors[] = 'Staff is required';
    if ($date === '') $errors[] = 'Date is required';

    if (empty($errors)) {
      $sql = "UPDATE `attendance` SET `student_id`='$student_id', `module_name`='$module_name', `staff_name`='$staff_name', `attendance_status`=$attendance_status, `date`='$date' WHERE `attendance_id`=$id";
      if (mysqli_query($con, $sql)) {
        echo '<div class="alert alert-success">Record updated.</div>';
        $action = 'list';
      } else {
        echo '<div class="alert alert-danger">DB Error: '.htmlspecialchars(mysqli_error($con)).'</div>';
      }
    }
  }
}

if ($action === 'delete' && isset($_GET['id'])) {
  $id = (int)$_GET['id'];
  if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
    $sql = "DELETE FROM `attendance` WHERE `attendance_id`=$id";
    if (mysqli_query($con, $sql)) {
      echo '<div class="alert alert-success">Record deleted.</div>';
      $action = 'list';
    } else {
      echo '<div class="alert alert-danger">DB Error: '.htmlspecialchars(mysqli_error($con)).'</div>';
    }
  }
}

// Fetch from Hikvision device and insert attendance
if ($action === 'fetch' && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $device_id = (int)($_POST['device_id'] ?? 0);
  $from = sanitize($con, $_POST['from'] ?? '');
  $to   = sanitize($con, $_POST['to'] ?? '');

  if ($device_id <= 0) $errors[] = 'Please select a device';
  if ($from === '' || $to === '') $errors[] = 'Please select a date range';

  if (empty($errors)) {
    // Load device
    $dres = mysqli_query($con, "SELECT * FROM hik_devices WHERE id=$device_id AND enabled=1");
    $dev = $dres ? mysqli_fetch_assoc($dres) : null;
    if (!$dev) {
      $errors[] = 'Device not found or disabled';
      } else {
      // Build request(s). Hikvision has two common patterns:
      // 1) GET /ISAPI/AccessControl/AcsEvent?format=json&startTime=...&endTime=...
      // 2) POST /ISAPI/AccessControl/LogSearch?format=json with a JSON body
      $path = '/'.ltrim($dev['endpoint_path'], '/');

      // Candidate ports: use configured port first; if it is 8000 (SDK port), also try HTTP port 80.
      $candidatePorts = [$dev['port']];
      if ((string)$dev['port'] === '8000') { $candidatePorts[] = '80'; }

      $resp = false; $httpCode = 0; $curlErr = '';
      $lastTriedUrl = '';
      foreach ($candidatePorts as $p) {
        $base = rtrim($dev['protocol'].'://'.$dev['ip'].':'.$p, '/');
        $isLogSearch = stripos($path, 'LogSearch') !== false; // POST style
        $url = $base.$path.(strpos($path, '?')===false ? '?format=json' : '');
        $lastTriedUrl = $url;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $dev['username'].':'.$dev['password']);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        if ($dev['protocol'] === 'https') {
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }

        if ($isLogSearch) {
          // POST with JSON body
          $payload = json_encode([
            'AcsLogSearchCond' => [
              'searchID' => uniqid('sid_', true),
              'searchResultPosition' => 0,
              'maxResults' => 2000,
              'startTime' => $from.'T00:00:00',
              'endTime' => $to.'T23:59:59',
            ]
          ]);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        } else {
          // Append time range to query params for AcsEvent-style endpoints
          $queryGlue = (strpos($url, '?') === false) ? '?' : '&';
          $urlWithTime = $url.$queryGlue.'startTime='.urlencode($from.'T00:00:00')."&endTime=".urlencode($to.'T23:59:59');
          curl_setopt($ch, CURLOPT_URL, $urlWithTime);
        }

        $resp = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlErr = curl_error($ch);
        curl_close($ch);

        if ($resp !== false && $httpCode < 400 && $resp !== '') { break; }
      }

      if ($resp === false || $httpCode >= 400 || $resp === '') {
        $hint = '';
        if ((string)$dev['port'] === '8000') { $hint = ' Hint: port 8000 is the SDK port; try setting Web port 80/443.'; }
        $errors[] = 'Device request failed (HTTP '.$httpCode.'): '.($curlErr ?: 'No/empty response').$hint.' URL: '.htmlspecialchars($lastTriedUrl);
      } else {
        // Accept JSON or XML; normalize to PHP array
        $data = json_decode($resp, true);
        if (!is_array($data)) {
          // Try XML
          libxml_use_internal_errors(true);
          $xml = simplexml_load_string($resp, 'SimpleXMLElement', LIBXML_NOCDATA);
          if ($xml !== false) { $data = json_decode(json_encode($xml), true); }
        }
        if (!is_array($data)) {
          $errors[] = 'Unexpected response from device (not JSON/XML).';
        } else {
          // Try to locate events array; common key: "AcsEvent" or "AcsEventList" -> array of items
          $events = [];
          if (isset($data['AcsEvent'])) { $events = is_array($data['AcsEvent']) ? $data['AcsEvent'] : [$data['AcsEvent']]; }
          if (isset($data['AcsEventList'])) { $events = $data['AcsEventList']; }
          if (isset($data['Event']) && is_array($data['Event'])) { $events = $data['Event']; }
          // LogSearch XML/JSON responses
          if (empty($events) && isset($data['AcsLog'])) { $events = is_array($data['AcsLog']) ? $data['AcsLog'] : [$data['AcsLog']]; }
          if (empty($events) && isset($data['AcsLogSearchResult']['MatchList']['AcsLog'])) {
            $events = $data['AcsLogSearchResult']['MatchList']['AcsLog'];
          }

          $inserted = 0; $skipped_unknown = 0; $errors_count = 0;

          foreach ($events as $ev) {
            // Attempt to read employeeNoString and time
            $emp = $ev['employeeNoString'] ?? ($ev['employeeNo'] ?? null);
            $time = $ev['time'] ?? ($ev['eventTime'] ?? null);
            if (!$emp || !$time) { $errors_count++; continue; }

            // Map to student
            $emp_q = sanitize($con, $emp);
            $mapRes = mysqli_query($con, "SELECT student_id FROM hik_user_map WHERE device_id=$device_id AND employee_no='$emp_q'");
            $map = $mapRes ? mysqli_fetch_assoc($mapRes) : null;
            if (!$map) { $skipped_unknown++; continue; }
            $student_id = sanitize($con, $map['student_id']);

            // Decide present/absent: treat any event as Present for that date
            $date = substr($time, 0, 10); // YYYY-MM-DD
            $module_name = 'DEVICE';
            $staff_name = 'HIKVISION';
            $status = 1;

            // Upsert: avoid duplicate for same student/date
            $check = mysqli_query($con, "SELECT attendance_id FROM attendance WHERE student_id='$student_id' AND date='$date' LIMIT 1");
            if ($check && mysqli_num_rows($check) > 0) {
              // update to present if currently absent
              $row = mysqli_fetch_assoc($check);
              $aid = (int)$row['attendance_id'];
              mysqli_query($con, "UPDATE attendance SET attendance_status=1, module_name='$module_name', staff_name='$staff_name' WHERE attendance_id=$aid");
            } else {
              $ins = "INSERT INTO attendance(student_id,module_name,staff_name,attendance_status,date) VALUES('$student_id','$module_name','$staff_name',$status,'$date')";
              if (!mysqli_query($con, $ins)) { $errors_count++; continue; }
            }
            $inserted++;
          }

          echo '<div class="alert alert-info">Fetched events. Inserted/updated: '.(int)$inserted.'; Unknown users: '.(int)$skipped_unknown.'; Errors: '.(int)$errors_count.'.</div>';
          $action = 'list';
        }
      }
    }
  }
}
?>

<?php if (!empty($errors)): ?>
  <div class="alert alert-danger">
    <?php foreach ($errors as $e) { echo '<div>'.htmlspecialchars($e).'</div>'; } ?>
  </div>
<?php endif; ?>

<?php if ($action === 'create'): ?>
  <form method="post" action="<?php echo APP_BASE; ?>/attendance/ManageAttendance.php?action=create">
    <div class="form-row">
      <div class="form-group col-md-3">
        <label>Student ID</label>
        <input type="text" name="student_id" class="form-control" required>
      </div>
      <div class="form-group col-md-3">
        <label>Module</label>
        <input type="text" name="module_name" class="form-control" required>
      </div>
      <div class="form-group col-md-3">
        <label>Staff</label>
        <input type="text" name="staff_name" class="form-control" required>
      </div>
      <div class="form-group col-md-3">
        <label>Date</label>
        <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label>Status</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="attendance_status" id="status1" value="1" checked>
        <label class="form-check-label" for="status1">Present</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="attendance_status" id="status0" value="0">
        <label class="form-check-label" for="status0">Absent</label>
      </div>
    </div>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
    <a href="<?php echo APP_BASE; ?>/attendance/ManageAttendance.php?action=list" class="btn btn-secondary">Cancel</a>
  </form>
<?php elseif ($action === 'edit' && isset($_GET['id'])): ?>
  <?php
    $id = (int)$_GET['id'];
    $res = mysqli_query($con, "SELECT * FROM `attendance` WHERE `attendance_id`=$id");
    $row = $res ? mysqli_fetch_assoc($res) : null;
    if (!$row) { echo '<div class="alert alert-warning">Record not found.</div>'; }
  ?>
  <?php if ($row): ?>
  <form method="post" action="<?php echo APP_BASE; ?>/attendance/ManageAttendance.php?action=edit&id=<?php echo (int)$id; ?>">
    <div class="form-row">
      <div class="form-group col-md-3">
        <label>Student ID</label>
        <input type="text" name="student_id" class="form-control" value="<?php echo htmlspecialchars($row['student_id']); ?>" required>
      </div>
      <div class="form-group col-md-3">
        <label>Module</label>
        <input type="text" name="module_name" class="form-control" value="<?php echo htmlspecialchars($row['module_name']); ?>" required>
      </div>
      <div class="form-group col-md-3">
        <label>Staff</label>
        <input type="text" name="staff_name" class="form-control" value="<?php echo htmlspecialchars($row['staff_name']); ?>" required>
      </div>
      <div class="form-group col-md-3">
        <label>Date</label>
        <input type="date" name="date" class="form-control" value="<?php echo htmlspecialchars($row['date']); ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label>Status</label><br>
      <?php $st = (int)$row['attendance_status']; ?>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="attendance_status" id="status1" value="1" <?php echo $st===1?'checked':''; ?>>
        <label class="form-check-label" for="status1">Present</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="attendance_status" id="status0" value="0" <?php echo $st===0?'checked':''; ?>>
        <label class="form-check-label" for="status0">Absent</label>
      </div>
    </div>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
    <a href="<?php echo APP_BASE; ?>/attendance/ManageAttendance.php?action=list" class="btn btn-secondary">Cancel</a>
  </form>
  <?php endif; ?>
<?php elseif ($action === 'delete' && isset($_GET['id'])): ?>
  <div class="alert alert-danger"><strong>Confirm delete?</strong></div>
  <form method="post" action="<?php echo APP_BASE; ?>/attendance/ManageAttendance.php?action=delete&id=<?php echo (int)$_GET['id']; ?>">
    <input type="hidden" name="confirm" value="yes">
    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
    <a href="<?php echo APP_BASE; ?>/attendance/ManageAttendance.php?action=list" class="btn btn-secondary">Cancel</a>
  </form>
<?php elseif ($action === 'fetch'): ?>
  <?php $dlist = mysqli_query($con, "SELECT id,name,ip,protocol,port FROM hik_devices WHERE enabled=1 ORDER BY name"); ?>
  <form method="post">
    <div class="form-row">
      <div class="form-group col-md-5">
        <label>Device</label>
        <select name="device_id" class="form-control" required>
          <option value="">-- Select device --</option>
          <?php if ($dlist && mysqli_num_rows($dlist)>0){ while($d=mysqli_fetch_assoc($dlist)){ ?>
            <option value="<?php echo (int)$d['id']; ?>"><?php echo htmlspecialchars($d['name'].' ('.$d['protocol'].'://'.$d['ip'].':'.$d['port'].')'); ?></option>
          <?php } } ?>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>From</label>
        <input type="date" name="from" class="form-control" value="<?php echo htmlspecialchars($_GET['from'] ?? date('Y-m-d')); ?>" required>
      </div>
      <div class="form-group col-md-3">
        <label>To</label>
        <input type="date" name="to" class="form-control" value="<?php echo htmlspecialchars($_GET['to'] ?? date('Y-m-d')); ?>" required>
      </div>
    </div>
    <button type="submit" class="btn btn-info"><i class="fas fa-download"></i> Fetch Now</button>
    <a href="<?php echo APP_BASE; ?>/attendance/ManageAttendance.php?action=list" class="btn btn-secondary">Cancel</a>
    <p class="text-muted mt-2">Note: Only users mapped in <code>hik_user_map</code> will be recorded. Unknown employee numbers are skipped.</p>
  </form>
<?php else: // list ?>
  <form class="form-inline mb-3" method="get" action="<?php echo APP_BASE; ?>/attendance/ManageAttendance.php">
    <input type="hidden" name="action" value="list">
    <input type="text" name="q" class="form-control mr-2" placeholder="Search student/module/staff" value="<?php echo htmlspecialchars($_GET['q'] ?? ''); ?>">
    <input type="date" name="from" class="form-control mr-2" value="<?php echo htmlspecialchars($_GET['from'] ?? ''); ?>">
    <input type="date" name="to" class="form-control mr-2" value="<?php echo htmlspecialchars($_GET['to'] ?? ''); ?>">
    <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i> Filter</button>
  </form>
  <?php
    $where = [];
    if (!empty($_GET['q'])) {
      $q = sanitize($con, $_GET['q']);
      $where[] = "(`student_id` LIKE '%$q%' OR `module_name` LIKE '%$q%' OR `staff_name` LIKE '%$q%')";
    }
    if (!empty($_GET['from'])) {
      $from = sanitize($con, $_GET['from']);
      $where[] = "`date` >= '$from'";
    }
    if (!empty($_GET['to'])) {
      $to = sanitize($con, $_GET['to']);
      $where[] = "`date` <= '$to'";
    }
    $cond = empty($where) ? '' : ('WHERE '.implode(' AND ', $where));
    $sql = "SELECT * FROM `attendance` $cond ORDER BY `date` DESC, `attendance_id` DESC LIMIT 200";
    $res = mysqli_query($con, $sql);
  ?>
  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Date</th>
          <th>Student</th>
          <th>Module</th>
          <th>Staff</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($res && mysqli_num_rows($res) > 0): ?>
          <?php while($r = mysqli_fetch_assoc($res)): ?>
            <tr>
              <td><?php echo (int)$r['attendance_id']; ?></td>
              <td><?php echo htmlspecialchars($r['date']); ?></td>
              <td><?php echo htmlspecialchars($r['student_id']); ?></td>
              <td><?php echo htmlspecialchars($r['module_name']); ?></td>
              <td><?php echo htmlspecialchars($r['staff_name']); ?></td>
              <td>
                <?php if ((int)$r['attendance_status'] === 1): ?>
                  <span class="badge badge-success">Present</span>
                <?php else: ?>
                  <span class="badge badge-danger">Absent</span>
                <?php endif; ?>
              </td>
              <td>
                <a class="btn btn-sm btn-outline-secondary" href="<?php echo APP_BASE; ?>/attendance/ManageAttendance.php?action=edit&id=<?php echo (int)$r['attendance_id']; ?>"><i class="fas fa-edit"></i></a>
                <a class="btn btn-sm btn-outline-danger" href="<?php echo APP_BASE; ?>/attendance/ManageAttendance.php?action=delete&id=<?php echo (int)$r['attendance_id']; ?>"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="7" class="text-center">No records found</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
<?php endif; ?>

<?php endif; // table exists ?>

    </div>
  </div>
</div>
<!-- end your code -->

<!--Block#3 start dont change the order-->
<?php include_once ("../footer.php"); ?>  
<!--  end dont change the order-->
