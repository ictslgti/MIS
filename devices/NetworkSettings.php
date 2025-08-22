<!-- BLOCK#1 START DON'T CHANGE THE ORDER -->
<?php
session_start();
$title = "Devices | Network Settings";
include_once("../config.php");
include_once("../head.php");
include_once("../menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->
<?php
// Simple in-session storage (replace with DB if needed)
if (!isset($_SESSION['device_settings'])) {
  $_SESSION['device_settings'] = [
    'name' => '',
    'protocol' => 'http',
    'ip' => '',
    'port' => '80',
    'username' => '',
    'password' => '',
    'hik_connect_url' => 'https://www.hik-connect.com/'
  ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $ds = &$_SESSION['device_settings'];
  $ds['name'] = trim($_POST['name'] ?? '');
  $ds['protocol'] = in_array($_POST['protocol'] ?? 'http', ['http','https']) ? $_POST['protocol'] : 'http';
  $ds['ip'] = trim($_POST['ip'] ?? '');
  $ds['port'] = trim($_POST['port'] ?? '');
  $ds['username'] = trim($_POST['username'] ?? '');
  $ds['password'] = trim($_POST['password'] ?? '');
  $ds['device_sn'] = trim($_POST['device_sn'] ?? '');
  $ds['verify_code'] = trim($_POST['verify_code'] ?? '');
  $ds['hik_connect_url'] = trim($_POST['hik_connect_url'] ?? 'https://www.hik-connect.com/');
  echo '<div class="alert alert-success mx-3 mt-3">Settings saved in session. You can now open the device or Hik-Connect.</div>';
}

$settings = $_SESSION['device_settings'];
$deviceUrl = '';
if (!empty($settings['ip'])) {
  $p = $settings['protocol'] ?: 'http';
  $port = $settings['port'] ? (":" . preg_replace('/[^0-9]/','',$settings['port'])) : '';
  $deviceUrl = $p . "://" . $settings['ip'] . $port;
}
?>

<div class="container-fluid mt-4">
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
      <div>
        <h5 class="mb-0"><i class="fas fa-network-wired"></i> Network Settings</h5>
        <small class="text-muted">Configure your Access Control device and open its web UI or Hik-Connect</small>
      </div>
    </div>
    <div class="card-body">
      <form method="post" class="mb-3">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="name">Device Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Front Gate Controller" value="<?php echo htmlspecialchars($settings['name']); ?>">
          </div>
          <div class="form-group col-md-2">
            <label for="protocol">Protocol</label>
            <select class="form-control" id="protocol" name="protocol">
              <option value="http" <?php echo $settings['protocol']==='http'?'selected':''; ?>>http</option>
              <option value="https" <?php echo $settings['protocol']==='https'?'selected':''; ?>>https</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="ip">Device IP / Host</label>
            <input type="text" class="form-control" id="ip" name="ip" placeholder="192.168.1.100" value="<?php echo htmlspecialchars($settings['ip']); ?>">
          </div>
          <div class="form-group col-md-1">
            <label for="port">Port</label>
            <input type="text" class="form-control" id="port" name="port" placeholder="80" value="<?php echo htmlspecialchars($settings['port']); ?>">
          </div>
          <div class="form-group col-md-2">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="admin" value="<?php echo htmlspecialchars($settings['username']); ?>">
          </div>
          <div class="form-group col-md-2">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="••••••" value="<?php echo htmlspecialchars($settings['password']); ?>">
          </div>
          <div class="form-group col-md-3">
            <label for="device_sn">Device Serial No (optional)</label>
            <input type="text" class="form-control" id="device_sn" name="device_sn" placeholder="DS-K... / SN" value="<?php echo htmlspecialchars($settings['device_sn'] ?? ''); ?>">
            <small class="form-text text-muted">For cloud-bound devices, used with Hik‑Connect account.</small>
          </div>
          <div class="form-group col-md-3">
            <label for="verify_code">Verification Code (optional)</label>
            <input type="text" class="form-control" id="verify_code" name="verify_code" placeholder="Verification code" value="<?php echo htmlspecialchars($settings['verify_code'] ?? ''); ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="hik_connect_url">Hik‑Connect URL</label>
            <input type="url" class="form-control" id="hik_connect_url" name="hik_connect_url" placeholder="https://www.hik-connect.com/" value="<?php echo htmlspecialchars($settings['hik_connect_url']); ?>">
            <small class="form-text text-muted">Opens in a new tab. Many vendor sites block embedding for security.</small>
          </div>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Settings</button>
      </form>

      <div class="d-flex flex-wrap gap-2">
        <a class="btn btn-outline-secondary mr-2 mb-2 <?php echo $deviceUrl? '':'disabled'; ?>" href="<?php echo $deviceUrl ?: '#'; ?>" target="_blank" rel="noopener">
          <i class="fas fa-external-link-alt"></i> Open Device Web UI
        </a>
        <a class="btn btn-outline-info mb-2" href="<?php echo htmlspecialchars($settings['hik_connect_url']); ?>" target="_blank" rel="noopener">
          <i class="fas fa-qrcode"></i> Open Hik‑Connect Portal
        </a>
        <button class="btn btn-outline-primary mb-2" type="button" data-toggle="collapse" data-target="#embedHikConnect" aria-expanded="false" aria-controls="embedHikConnect">
          <i class="fas fa-window-maximize"></i> Try Embed Hik‑Connect (Beta)
        </button>
      </div>

      <div class="collapse mt-3" id="embedHikConnect">
        <div class="alert alert-warning">
          <strong>Heads up:</strong> Many cloud portals block embedding (X‑Frame‑Options/CSP). If the frame stays blank, use the button above to open in a new tab.
        </div>
        <div class="border rounded" style="height:70vh; overflow:hidden;">
          <iframe id="hikFrame" src="<?php echo htmlspecialchars($settings['hik_connect_url']); ?>" style="width:100%; height:100%; border:0; background:#fff;" referrerpolicy="no-referrer" sandbox="allow-forms allow-scripts allow-same-origin allow-popups"></iframe>
        </div>
      </div>

      <hr>
      <p class="text-muted mb-1"><strong>Notes</strong></p>
      <ul class="text-muted mb-0">
        <li>Ensure the Access Control device is reachable from this server/network.</li>
        <li>If using HTTPS on the device, make sure its certificate is trusted by your browser.</li>
        <li>Hik‑Connect requires a vendor account login and the device to be bound to that account.</li>
        <li>Direct cloud access without login typically requires vendor APIs and keys; we can integrate if you provide those.</li>
      </ul>
    </div>
  </div>
</div>

<!--END OF YOUR CODE-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("../footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
