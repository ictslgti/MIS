<?php
// BLOCK#1 START DON'T CHANGE THE ORDER
$title = "Student ID Photo | SLGTI";
include_once("../config.php");

// Allow Admins (and optionally staff). Adjust as needed.
if (!isset($_SESSION['user_type']) || !in_array($_SESSION['user_type'], ['ADM','MA2'])) {
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

function resize_to_idcard_jpeg($blob, $targetW = 600, $targetH = 800, $quality = 85) {
  if (!function_exists('imagecreatefromstring')) {
    return $blob; // GD not available, return original
  }
  $src = @imagecreatefromstring($blob);
  if (!$src) return $blob;
  $sw = imagesx($src); $sh = imagesy($src);
  if ($sw < 1 || $sh < 1) { imagedestroy($src); return $blob; }

  // Cover fit with center crop to 3:4 ratio
  $scale = max($targetW / $sw, $targetH / $sh);
  $rw = (int)ceil($sw * $scale);
  $rh = (int)ceil($sh * $scale);

  $tmp = imagecreatetruecolor($rw, $rh);
  imagecopyresampled($tmp, $src, 0, 0, 0, 0, $rw, $rh, $sw, $sh);
  imagedestroy($src);

  $dx = (int)max(0, ($rw - $targetW) / 2);
  $dy = (int)max(0, ($rh - $targetH) / 2);
  $dst = imagecreatetruecolor($targetW, $targetH);
  imagecopy($dst, $tmp, 0, 0, $dx, $dy, $targetW, $targetH);
  imagedestroy($tmp);

  ob_start();
  imagejpeg($dst, null, $quality);
  imagedestroy($dst);
  $out = ob_get_clean();
  return $out !== false ? $out : $blob;
}

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
      // Resize to ID card size and recompress as JPEG
      $blob = resize_to_idcard_jpeg($blob, 600, 800, 85);

      // Save (insert or update) using proper BLOB binding
      $stmt = mysqli_prepare($con, "INSERT INTO student_idphoto (student_id, id_photo) VALUES (?, ?) ON DUPLICATE KEY UPDATE id_photo=VALUES(id_photo)");
      $null = NULL;
      mysqli_stmt_bind_param($stmt, 'sb', $sid, $null);
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

<style>
  /* ID card 3:4 framing and alignment */
  #cameraSection { background: #f8f9fa; }
  .idcard-box { position: relative; width: 100%; max-width: 300px; margin: 0 auto; }
  .idcard-box::before { content: ""; display: block; padding-top: 133.333%; }
  .idcard-box > video { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; border: 2px dashed #17a2b8; border-radius: 6px; }
  .idcard-preview { width: 100%; max-width: 300px; aspect-ratio: 3 / 4; object-fit: cover; display: none; }
  .idcard-controls .btn { min-width: 90px; }
  @media (min-width: 992px) { .idcard-col-left { border-right: 1px solid #eee; } }
  .form-row .form-group label { font-weight: 600; }
  #id_suggestions a { font-size: 0.9rem; }
  .card-header { font-weight: 600; }
</style>

<div class="container mt-3">
  <div class="row">
    <div class="col-lg-5 idcard-col-left">
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
              <div class="form-group col-7 position-relative">
                <label for="id_value">Value</label>
                <input type="text" class="form-control" id="id_value" name="id_value" value="<?php echo sp_safe($idValue); ?>" placeholder="Enter Student ID or NIC" autocomplete="off" required>
                <div id="id_suggestions" class="list-group position-absolute w-100" style="z-index:1050; max-height:220px; overflow:auto; display:none;"></div>
              </div>
            </div>

            <div class="form-group">
              <label>Capture via Camera</label>
              <div id="cameraSection" class="border rounded p-2 text-center">
                <div class="idcard-box">
                  <video id="cam" autoplay playsinline muted></video>
                </div>
                <canvas id="canvas" style="display:none;"></canvas>
                <input type="hidden" name="photo_data" id="photo_data">
                <img id="preview" class="img-thumbnail idcard-preview mt-2" alt="Captured preview" />
                <div class="mt-2 idcard-controls">
                  <button type="button" class="btn btn-sm btn-primary" id="btnStart"><i class="fa fa-video"></i> Start</button>
                  <button type="button" class="btn btn-sm btn-secondary" id="btnCapture"><i class="fa fa-camera"></i> Capture</button>
                  <button type="button" class="btn btn-sm btn-outline-danger" id="btnStop"><i class="fa fa-stop"></i> Stop</button>
                  <button type="button" class="btn btn-sm btn-info" id="btnSwitch"><i class="fa fa-sync"></i> Switch</button>
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
function initCameraControls(){
  const cam = document.getElementById('cam');
  const canvas = document.getElementById('canvas');
  const btnStart = document.getElementById('btnStart');
  const btnCapture = document.getElementById('btnCapture');
  const btnStop = document.getElementById('btnStop');
  const btnSwitch = document.getElementById('btnSwitch');
  const photoData = document.getElementById('photo_data');
  const cameraSection = document.getElementById('cameraSection');
  const preview = document.getElementById('preview');
  let stream = null;
  let videoInputs = [];
  let currentDeviceIndex = -1;

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

  const cameraSupported = !!(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) || !!(navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia);
  const secureOk = window.isSecureContext || location.hostname === 'localhost' || location.hostname === '127.0.0.1';
  if (!cameraSupported || !secureOk) {
    setControlsEnabled(false);
    if (cameraSection) {
      const note = document.createElement('div');
      note.className = 'alert alert-warning py-1 mt-2';
      note.textContent = 'Camera not available. Use the file upload below. Tip: open via HTTPS or http://localhost to enable camera access.';
      cameraSection.appendChild(note);
    }
  }

  async function getPreferredStream(){
    let p = getMedia({ video: { facingMode: { ideal: 'environment' } }, audio: false });
    if (p) {
      try { return await p; } catch(e) {}
    }
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
    const vw = video.videoWidth || 640;
    const vh = video.videoHeight || 480;
    // Target 3:4 portrait crop from the video frame
    const targetRatio = 3/4;
    let sw = vw; let sh = Math.round(vw / targetRatio); // width-driven
    if (sh > vh) { // height too big, fall back to height-driven
      sh = vh;
      sw = Math.round(vh * targetRatio);
    }
    const sx = Math.round((vw - sw) / 2);
    const sy = Math.round((vh - sh) / 2);

    // Draw into fixed 600x800 canvas for consistent ID-card output
    const outW = 600, outH = 800;
    canvas.width = outW;
    canvas.height = outH;
    const ctx = canvas.getContext('2d');
    ctx.imageSmoothingEnabled = true;
    ctx.imageSmoothingQuality = 'high';
    ctx.drawImage(video, sx, sy, sw, sh, 0, 0, outW, outH);

    const dataUrl = canvas.toDataURL('image/jpeg', 0.9);
    photoData.value = dataUrl;
    if (preview) { preview.src = dataUrl; preview.style.display = 'block'; }
  });

  btnStop && btnStop.addEventListener('click', () => {
    stopStream();
    cam.srcObject = null;
  });

  btnSwitch && btnSwitch.addEventListener('click', async () => {
    if (!secureOk) return;
    if (!navigator.mediaDevices || !navigator.mediaDevices.enumerateDevices) return;
    try {
      if (!videoInputs.length) {
        const devices = await navigator.mediaDevices.enumerateDevices();
        videoInputs = devices.filter(d => d.kind === 'videoinput');
      }
      if (videoInputs.length < 2) return;
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
}
</script>

<script>
function initStudentAutocomplete(base){
  const typeEl = document.getElementById('id_type');
  const inputEl = document.getElementById('id_value');
  const listEl = document.getElementById('id_suggestions');
  const formEl = document.querySelector('form');
  let timer = null;

  function hideList(){
    listEl.style.display = 'none';
    listEl.innerHTML = '';
  }

  function escapeHtml(text){
    const div = document.createElement('div');
    div.innerText = text;
    return div.innerHTML;
  }

  function render(items){
    if (!items || !items.length) { hideList(); return; }
    listEl.innerHTML = items.map(it => {
      const value = String(it.value).replace(/"/g,'&quot;');
      const label = escapeHtml(it.label);
      return `<a href="#" class="list-group-item list-group-item-action" data-value="${value}">${label}</a>`;
    }).join('');
    listEl.style.display = 'block';
  }

  async function fetchSuggestions(q){
    const t = typeEl ? typeEl.value : 'student_id';
    const url = `${base}/controller/StudentSearch.php?q=${encodeURIComponent(q)}&type=${encodeURIComponent(t)}`;
    try {
      const resp = await fetch(url, { credentials: 'same-origin' });
      if (!resp.ok) { hideList(); return; }
      const data = await resp.json();
      render(data);
    } catch (e) {
      hideList();
    }
  }

  if (inputEl){
    inputEl.addEventListener('input', function(){
      const q = this.value.trim();
      if (timer) clearTimeout(timer);
      if (q.length < 2) { hideList(); return; }
      timer = setTimeout(() => fetchSuggestions(q), 200);
    });
    inputEl.addEventListener('blur', function(){ setTimeout(hideList, 200); });
  }

  if (listEl){
    listEl.addEventListener('click', function(e){
      const a = e.target.closest('a[data-value]');
      if (!a) return;
      e.preventDefault();
      const val = a.getAttribute('data-value');
      if (inputEl) inputEl.value = val;
      hideList();
      if (formEl){
        const hidden = document.createElement('input');
        hidden.type = 'hidden';
        hidden.name = 'id_type';
        hidden.value = typeEl ? typeEl.value : 'student_id';
        formEl.appendChild(hidden);
        formEl.submit();
      }
    });
  }
}

// Initialize after DOM is ready (vanilla)
document.addEventListener('DOMContentLoaded', function(){
  initCameraControls();
  var base = '<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>';
  initStudentAutocomplete(base);
});
</script>

<!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
<?php include_once("../footer.php"); ?>
<!-- END DON'T CHANGE THE ORDER -->
