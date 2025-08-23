<?php
// BLOCK#1 START DON'T CHANGE THE ORDER
$title = "Student ID Photo | SLGTI";
include_once("../config.php");

// Allow Admins (and optionally staff). Adjust as needed.
if (!isset($_SESSION['user_type']) || !in_array($_SESSION['user_type'], ['ADM'])) {
  include_once("../head.php");
  include_once("../menu.php");
  http_response_code(403);
  echo '<div class="alert alert-danger m-3">Access denied. Admins only.</div>';
  include_once("../footer.php");
  exit;
}

include_once("../head.php");
include_once("../menu.php");
// END DON'T CHANGE THE ORDER

function sp_safe($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

$errors = [];
$success = null;
$selectedType = isset($_POST['id_type']) ? $_POST['id_type'] : (isset($_GET['id_type']) ? $_GET['id_type'] : 'student_id');
$idValue = isset($_POST['id_value']) ? trim($_POST['id_value']) : (isset($_GET['id_value']) ? trim($_GET['id_value']) : '');
$student = null;
$currentPhotoDataUri = null;

// Lookup student if filter + value provided
if ($idValue !== '') {
  if ($selectedType === 'nic') {
    $stmt = mysqli_prepare($con, "SELECT * FROM student WHERE student_nic=? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 's', $idValue);
  } else {
    $stmt = mysqli_prepare($con, "SELECT * FROM student WHERE student_id=? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 's', $idValue);
  }
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  if ($res && mysqli_num_rows($res) === 1) {
    $student = mysqli_fetch_assoc($res);
    $sid = $student['student_id'];
    // Try load existing photo
    $ps = mysqli_prepare($con, "SELECT id_photo FROM student_idphoto WHERE student_id=? LIMIT 1");
    mysqli_stmt_bind_param($ps, 's', $sid);
    mysqli_stmt_execute($ps);
    $pres = mysqli_stmt_get_result($ps);
    if ($pres && mysqli_num_rows($pres) === 1) {
      $row = mysqli_fetch_assoc($pres);
      if (!is_null($row['id_photo'])) {
        $currentPhotoDataUri = 'data:image/jpeg;base64,' . base64_encode($row['id_photo']);
      }
    }
    mysqli_stmt_close($ps);
  } else {
    $errors[] = 'Student not found.';
  }
  mysqli_stmt_close($stmt);
}

// Handle upload/save
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_photo'])) {
  if (!$student) {
    $errors[] = 'Select a valid student before uploading.';
  } else {
    $sid = $student['student_id'];

    $blob = null;

    // Option 1: file input
    if (isset($_FILES['id_photo_file']) && $_FILES['id_photo_file']['error'] === UPLOAD_ERR_OK) {
      $tmpPath = $_FILES['id_photo_file']['tmp_name'];
      $blob = file_get_contents($tmpPath);
    }

    // Option 2: data URL from camera capture
    if (!$blob && !empty($_POST['photo_data'])) {
      $dataUrl = $_POST['photo_data'];
      if (strpos($dataUrl, 'data:image') === 0) {
        $parts = explode(',', $dataUrl, 2);
        if (count($parts) === 2) {
          $blob = base64_decode($parts[1]);
        }
      }
    }

    if (!$blob) {
      $errors[] = 'No image received. Use camera or choose a file.';
    } else if (strlen($blob) > 8*1024*1024) { // 8MB limit
      $errors[] = 'Image too large (max 8MB).';
    } else {
      // Save (insert or update)
      $stmt = mysqli_prepare($con, "INSERT INTO student_idphoto (student_id, id_photo) VALUES (?, ?) ON DUPLICATE KEY UPDATE id_photo=VALUES(id_photo)");
      mysqli_stmt_bind_param($stmt, 'sb', $sid, $blob);
      // Workaround for 'b' param: send in chunks
      $null = NULL;
      mysqli_stmt_send_long_data($stmt, 1, $blob);
      if (mysqli_stmt_execute($stmt)) {
        $success = 'Photo saved successfully.';
        $currentPhotoDataUri = 'data:image/jpeg;base64,' . base64_encode($blob);
      } else {
        $errors[] = 'Save failed: ' . mysqli_error($con);
      }
      mysqli_stmt_close($stmt);
    }
  }
}
?>

<div class="container mt-3">
  <div class="row">
    <div class="col-lg-5">
      <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span><i class="fas fa-id-card"></i> Student ID Photo</span>
        </div>
        <div class="card-body">
          <?php if (!empty($errors)) { echo '<div class="alert alert-danger py-2">'.sp_safe(implode(' | ', $errors)).'</div>'; }
                if ($success) { echo '<div class="alert alert-success py-2">'.sp_safe($success).'</div>'; } ?>

          <form method="post" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-5">
                <label for="id_type">Type</label>
                <select class="form-control" id="id_type" name="id_type">
                  <option value="student_id" <?php echo $selectedType==='student_id'?'selected':''; ?>>Student ID</option>
                  <option value="nic" <?php echo $selectedType==='nic'?'selected':''; ?>>NIC</option>
                </select>
              </div>
              <div class="form-group col-7">
                <label for="id_value">Value</label>
                <input type="text" class="form-control" id="id_value" name="id_value" value="<?php echo sp_safe($idValue); ?>" placeholder="Enter Student ID or NIC" required>
              </div>
            </div>

            <div class="form-group">
              <label>Capture via Camera</label>
              <div id="cameraSection" class="border rounded p-2 text-center">
                <video id="cam" autoplay playsinline muted style="max-width:100%; width:100%; height:auto;"></video>
                <canvas id="canvas" style="display:none;"></canvas>
                <input type="hidden" name="photo_data" id="photo_data">
                <div class="mt-2">
                  <button type="button" class="btn btn-sm btn-primary" id="btnStart">Start Camera</button>
                  <button type="button" class="btn btn-sm btn-secondary" id="btnCapture">Capture</button>
                  <button type="button" class="btn btn-sm btn-outline-danger" id="btnStop">Stop</button>
                  <button type="button" class="btn btn-sm btn-info" id="btnSwitch">Switch Camera</button>
                </div>
              </div>
              <small class="form-text text-muted">Or upload a file below.</small>
            </div>

            <div class="form-group">
              <label for="id_photo_file">Upload Photo (JPG/PNG)</label>
              <input type="file" class="form-control-file" id="id_photo_file" name="id_photo_file" accept="image/*" capture="environment">
            </div>

            <button type="submit" name="save_photo" value="1" class="btn btn-success">
              <i class="fas fa-save"></i> Save Photo
            </button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-lg-7">
      <div class="card mb-3">
        <div class="card-header"><i class="fas fa-user"></i> Selected Student</div>
        <div class="card-body">
          <?php if ($student) { ?>
            <div class="media">
              <div class="media-body">
                <h5 class="mt-0"><?php echo sp_safe($student['student_fullname'] ?? $student['student_id']); ?></h5>
                <div class="text-muted">ID: <?php echo sp_safe($student['student_id']); ?> | NIC: <?php echo sp_safe($student['student_nic']); ?></div>
              </div>
            </div>
            <hr>
            <div>
              <label class="d-block">Current Photo</label>
              <?php if ($currentPhotoDataUri) { ?>
                <img src="<?php echo $currentPhotoDataUri; ?>" alt="ID Photo" class="img-thumbnail" style="max-width:240px;">
              <?php } else { ?>
                <div class="text-muted">No photo uploaded.</div>
              <?php } ?>
            </div>
          <?php } else { ?>
            <div class="text-muted">Search a student by selecting the type and entering the value, then capture or upload the ID photo.</div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- WebRTC adapter to normalize getUserMedia across browsers -->
<script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
<script>
(function(){
  const cam = document.getElementById('cam');
  const canvas = document.getElementById('canvas');
  const btnStart = document.getElementById('btnStart');
  const btnCapture = document.getElementById('btnCapture');
  const btnStop = document.getElementById('btnStop');
  const btnSwitch = document.getElementById('btnSwitch');
  const photoData = document.getElementById('photo_data');
  const cameraSection = document.getElementById('cameraSection');
  let stream = null;
  let videoInputs = [];
  let currentDeviceIndex = -1;

  // Cross-browser getUserMedia helper
  function getMedia(constraints){
    if (navigator.mediaDevices && typeof navigator.mediaDevices.getUserMedia === 'function') {
      return navigator.mediaDevices.getUserMedia(constraints);
    }
    const legacy = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
    if (legacy) {
      return new Promise((resolve, reject) => legacy.call(navigator, constraints, resolve, reject));
    }
    return null;
  }

  function stopStream(){
    if (stream) {
      stream.getTracks().forEach(t => t.stop());
      stream = null;
    }
  }

  function setControlsEnabled(enabled){
    [btnStart, btnCapture, btnStop, btnSwitch].forEach(btn => { if (btn) btn.disabled = !enabled; });
  }

  // If camera APIs are not available or context is insecure, hide camera UI and rely on file upload.
  const cameraSupported = !!(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) || !!(navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia);
  const secureOk = window.isSecureContext || location.hostname === 'localhost' || location.hostname === '127.0.0.1';
  if (!cameraSupported || !secureOk) {
    setControlsEnabled(false);
    if (cameraSection) cameraSection.style.display = 'none';
  }

  async function getPreferredStream(){
    // Try facingMode first (most modern browsers)
    let p = getMedia({ video: { facingMode: { ideal: 'environment' } }, audio: false });
    if (p) {
      try { return await p; } catch(e) { /* continue to deviceId fallback */ }
    }
    // Fallback: enumerate devices, choose a likely back camera
    if (!(navigator.mediaDevices && navigator.mediaDevices.enumerateDevices)) {
      return await getMedia({ video: true, audio: false });
    }
    const devices = await navigator.mediaDevices.enumerateDevices();
    videoInputs = devices.filter(d => d.kind === 'videoinput');
    let back = videoInputs.find(d => /back|rear|environment/i.test(d.label)) || videoInputs[videoInputs.length-1];
    if (!back) back = videoInputs[0];
    currentDeviceIndex = Math.max(0, videoInputs.findIndex(d => d.deviceId === back.deviceId));
    if (back && back.deviceId) {
      return await getMedia({ video: { deviceId: { exact: back.deviceId } }, audio: false });
    }
    // Last resort
    return await getMedia({ video: true, audio: false });
  }

  btnStart && btnStart.addEventListener('click', async () => {
    if (!secureOk) { return; }
    const promise = getPreferredStream();
    if (!promise) {
      alert('Camera API not available. Please use the file upload.');
      return;
    }
    try {
      stream = await promise;
      cam.srcObject = stream;
    } catch (e) {
      alert('Unable to access camera: ' + (e && e.message ? e.message : e));
    }
  });

  btnCapture && btnCapture.addEventListener('click', () => {
    if (!stream) { alert('Start the camera first.'); return; }
    const video = cam;
    const w = video.videoWidth || 640;
    const h = video.videoHeight || 480;
    canvas.width = w;
    canvas.height = h;
    const ctx = canvas.getContext('2d');
    ctx.drawImage(video, 0, 0, w, h);
    const dataUrl = canvas.toDataURL('image/jpeg', 0.9);
    photoData.value = dataUrl;
  });

  btnStop && btnStop.addEventListener('click', () => {
    stopStream();
    cam.srcObject = null;
  });

  // Switch between available cameras (front/back)
  btnSwitch && btnSwitch.addEventListener('click', async () => {
    if (!secureOk) return;
    if (!navigator.mediaDevices || !navigator.mediaDevices.enumerateDevices) return;
    try {
      if (!videoInputs.length) {
        const devices = await navigator.mediaDevices.enumerateDevices();
        videoInputs = devices.filter(d => d.kind === 'videoinput');
      }
      if (videoInputs.length < 2) return; // nothing to switch
      currentDeviceIndex = (currentDeviceIndex + 1) % videoInputs.length;
      const next = videoInputs[currentDeviceIndex];
      stopStream();
      stream = await getMedia({ video: { deviceId: { exact: next.deviceId } }, audio: false });
      cam.srcObject = stream;
    } catch (e) {
      console.warn('Switch camera failed:', e);
    }
  });

  window.addEventListener('beforeunload', stopStream);
})();
</script>

<!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
<?php include_once("../footer.php"); ?>
<!-- END DON'T CHANGE THE ORDER -->
