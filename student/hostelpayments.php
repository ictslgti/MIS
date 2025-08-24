<?php
// student/hostelpayments.php - show student's hostel payment history
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../head.php';
require_once __DIR__ . '/top_nav.php';
require_once __DIR__ . '/../menu.php';
if (session_status() === PHP_SESSION_NONE) { session_start(); }

$user = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;
if (!$user) {
  echo '<div class="alert alert-danger m-3">You must be logged in to access this page.</div>';
  require_once __DIR__ . '/../footer.php';
  exit;
}

// Ensure payments table exists (in case admin page hasn't run yet)
mysqli_query($con, "CREATE TABLE IF NOT EXISTS hostel_fee_payments (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  allocation_id INT UNSIGNED NOT NULL,
  month_year CHAR(7) NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  paid_on DATE NOT NULL,
  method VARCHAR(30) DEFAULT NULL,
  notes VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY(id),
  UNIQUE KEY uniq_alloc_month (allocation_id, month_year),
  CONSTRAINT fk_pay_alloc_student FOREIGN KEY (allocation_id) REFERENCES hostel_allocations(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

?>
<div class="container mt-3">
  <h3>My Hostel Payments</h3>
  <p class="text-muted">Monthly fee payments recorded against your hostel allocation(s).</p>

  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Allocation</th>
          <th>Month</th>
          <th>Amount</th>
          <th>Paid On</th>
          <th>Method</th>
          <th>Notes</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = "SELECT p.* FROM hostel_fee_payments p
                  JOIN hostel_allocations a ON a.id = p.allocation_id
                  WHERE a.student_id = ?
                  ORDER BY p.paid_on DESC, p.id DESC";
          if ($st = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($st, 's', $user);
            if (mysqli_stmt_execute($st)) {
              $res = mysqli_stmt_get_result($st);
              if ($res && mysqli_num_rows($res) > 0) {
                while ($r = mysqli_fetch_assoc($res)) {
                  echo '<tr>';
                  echo '<td>'.(int)$r['id'].'</td>';
                  echo '<td>#'.(int)$r['allocation_id'].'</td>';
                  echo '<td>'.htmlspecialchars($r['month_year']).'</td>';
                  echo '<td>'.number_format((float)$r['amount'], 2).'</td>';
                  echo '<td>'.htmlspecialchars($r['paid_on']).'</td>';
                  echo '<td>'.htmlspecialchars($r['method']).'</td>';
                  echo '<td>'.htmlspecialchars($r['notes']).'</td>';
                  echo '</tr>';
                }
              } else {
                echo '<tr><td colspan="7" class="text-center">No payments found.</td></tr>';
              }
            }
            mysqli_stmt_close($st);
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>
