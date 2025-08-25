<?php
$title = "Normalize Registration Reason | SLGTI";
include_once(__DIR__ . '/../config.php');

// Access control: allow admins/finance only
$userType = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : '';
if (!in_array($userType, ['ADM','ACC','FIN'])) {
  include_once(__DIR__ . '/../head.php');
  include_once(__DIR__ . '/../menu.php');
  echo '<div class="container mt-4"><div class="alert alert-danger">Access denied.</div></div>';
  include_once(__DIR__ . '/../footer.php');
  exit;
}

$messages = [];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['normalize'])) {
  // Optional: constrain by type if provided
  $typeFilter = isset($_POST['type_filter']) ? trim($_POST['type_filter']) : '';
  $like = "registr%"; // case-insensitive via LOWER()

  // Build conditions
  $condPayment = "LOWER(payment_reason) LIKE '" . mysqli_real_escape_string($con, strtolower($like)) . "'";
  if ($typeFilter !== '') {
    $condPayment .= " AND LOWER(payment_type) = '" . mysqli_real_escape_string($con, strtolower($typeFilter)) . "'";
  }
  $condPays = "LOWER(payment_reason) LIKE '" . mysqli_real_escape_string($con, strtolower($like)) . "'";

  mysqli_begin_transaction($con);
  try {
    $sql1 = "UPDATE payment SET payment_reason = 'Registration Fee' WHERE $condPayment";
    $ok1 = mysqli_query($con, $sql1);
    if ($ok1 === false) { throw new Exception('Failed updating payment: ' . mysqli_error($con)); }
    $aff1 = mysqli_affected_rows($con);

    $sql2 = "UPDATE pays SET payment_reason = 'Registration Fee' WHERE $condPays";
    $ok2 = mysqli_query($con, $sql2);
    if ($ok2 === false) { throw new Exception('Failed updating pays: ' . mysqli_error($con)); }
    $aff2 = mysqli_affected_rows($con);

    mysqli_commit($con);
    $messages[] = "Normalized successfully. Updated payment rows: $aff1, pays rows: $aff2.";
  } catch (Exception $e) {
    mysqli_rollback($con);
    $errors[] = $e->getMessage();
  }
}

// Fetch preview data
$variantsPayment = mysqli_query($con, "SELECT payment_type, payment_reason, COUNT(*) cnt FROM payment WHERE LOWER(payment_reason) LIKE 'registr%' GROUP BY payment_type, payment_reason ORDER BY cnt DESC");
$variantsPays = mysqli_query($con, "SELECT payment_reason, COUNT(*) cnt FROM pays WHERE LOWER(payment_reason) LIKE 'registr%' GROUP BY payment_reason ORDER BY cnt DESC");

include_once(__DIR__ . '/../head.php');
include_once(__DIR__ . '/../menu.php');
?>
<div class="container mt-3">
  <h2>Normalize Registration Reason</h2>
  <p class="text-muted">This tool updates any reason matching “registr%” (case-insensitive) to the exact text <strong>Registration Fee</strong>.</p>

  <?php foreach ($messages as $m) { echo '<div class="alert alert-success">'.htmlspecialchars($m).'</div>'; } ?>
  <?php foreach ($errors as $m) { echo '<div class="alert alert-danger">'.htmlspecialchars($m).'</div>'; } ?>

  <div class="card mb-3">
    <div class="card-header">Preview: variants that will be affected</div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <h5>payment table</h5>
          <div class="table-responsive">
            <table class="table table-sm table-striped">
              <thead><tr><th>Payment Type</th><th>Payment Reason</th><th class="text-right">Count</th></tr></thead>
              <tbody>
                <?php if ($variantsPayment && mysqli_num_rows($variantsPayment)>0) { while($r=mysqli_fetch_assoc($variantsPayment)) { ?>
                  <tr>
                    <td><?php echo htmlspecialchars($r['payment_type']); ?></td>
                    <td><?php echo htmlspecialchars($r['payment_reason']); ?></td>
                    <td class="text-right"><?php echo (int)$r['cnt']; ?></td>
                  </tr>
                <?php } } else { ?>
                  <tr><td colspan="3" class="text-muted text-center">No variants found.</td></tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-6">
          <h5>pays table</h5>
          <div class="table-responsive">
            <table class="table table-sm table-striped">
              <thead><tr><th>Payment Reason</th><th class="text-right">Count</th></tr></thead>
              <tbody>
                <?php if ($variantsPays && mysqli_num_rows($variantsPays)>0) { while($r=mysqli_fetch_assoc($variantsPays)) { ?>
                  <tr>
                    <td><?php echo htmlspecialchars($r['payment_reason']); ?></td>
                    <td class="text-right"><?php echo (int)$r['cnt']; ?></td>
                  </tr>
                <?php } } else { ?>
                  <tr><td colspan="2" class="text-muted text-center">No variants found.</td></tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <form method="post" class="card card-body">
    <div class="form-row align-items-end">
      <div class="form-group col-md-4">
        <label>Optional: limit by Payment Type (exact, e.g., Registration)</label>
        <input type="text" name="type_filter" class="form-control" placeholder="Registration">
      </div>
      <div class="form-group col-md-8">
        <button type="submit" name="normalize" value="1" class="btn btn-danger" onclick="return confirm('This will update text values to \n\nRegistration Fee\n\nProceed?');">Normalize to "Registration Fee"</button>
      </div>
    </div>
    <div class="text-muted small">Tip: Keep a backup or verify via the preview tables above before running.</div>
  </form>
</div>
<?php include_once(__DIR__ . '/../footer.php'); ?>
