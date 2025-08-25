<?php
$title = "Payment Reasons (Reference) | SLGTI";
include_once(__DIR__ . '/../config.php');
include_once(__DIR__ . '/../head.php');
include_once(__DIR__ . '/../menu.php');

// Allow common finance/admin/MA viewers
$userType = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : '';
if (!in_array($userType, ['ACC','ADM','FIN','MA2'])) {
  echo '<div class="container mt-4"><div class="alert alert-danger">Access denied.</div></div>';
  include_once(__DIR__ . '/../footer.php');
  exit;
}

// Master list (from payment table)
$master = mysqli_query($con, "SELECT payment_type, payment_reason FROM payment ORDER BY payment_type, payment_reason");

// Actual usage (from pays table)
$used = mysqli_query($con, "SELECT payment_reason, COUNT(*) as cnt FROM pays GROUP BY payment_reason ORDER BY cnt DESC, payment_reason ASC");
?>

<div class="container mt-3">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Payment Reasons Reference</h2>
    <div class="text-muted small">View the exact reason text values stored in the database</div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card mb-3">
        <div class="card-header">Master List (payment table)</div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-sm table-striped mb-0">
              <thead class="thead-light">
                <tr>
                  <th>Payment Type</th>
                  <th>Payment Reason</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($master && mysqli_num_rows($master)>0) { while($r=mysqli_fetch_assoc($master)) { ?>
                  <tr>
                    <td><?php echo htmlspecialchars($r['payment_type']); ?></td>
                    <td><?php echo htmlspecialchars($r['payment_reason']); ?></td>
                  </tr>
                <?php } } else { ?>
                  <tr><td colspan="2" class="text-center text-muted">No data.</td></tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card mb-3">
        <div class="card-header">Actual Usage (pays table)</div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-sm table-striped mb-0">
              <thead class="thead-light">
                <tr>
                  <th>Payment Reason (exact text)</th>
                  <th class="text-right">Count</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($used && mysqli_num_rows($used)>0) { while($r=mysqli_fetch_assoc($used)) { ?>
                  <tr>
                    <td><?php echo htmlspecialchars($r['payment_reason'] === '' ? '(empty)' : $r['payment_reason']); ?></td>
                    <td class="text-right">&times; <?php echo (int)$r['cnt']; ?></td>
                  </tr>
                <?php } } else { ?>
                  <tr><td colspan="2" class="text-center text-muted">No data.</td></tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once(__DIR__ . '/../footer.php'); ?>
