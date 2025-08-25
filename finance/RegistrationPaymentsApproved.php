<?php
$title = "Approved Registration Payments | SLGTI";
include_once(__DIR__ . '/../config.php');
include_once(__DIR__ . '/../head.php');
include_once(__DIR__ . '/../menu.php');

// Allow MA2 to view (read-only), plus ACC/ADM/FIN
$userType = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : '';
if (!in_array($userType, ['MA2','ACC','ADM','FIN'])) {
  echo '<div class="container mt-4"><div class="alert alert-danger">Access denied.</div></div>';
  include_once(__DIR__ . '/../footer.php');
  exit;
}

// Filters
$paymentType = isset($_GET['payment_type']) ? trim($_GET['payment_type']) : '';
$paymentReason = isset($_GET['payment_reason']) ? trim($_GET['payment_reason']) : 'Registration Fee';
$department = isset($_GET['department']) ? trim($_GET['department']) : '';
$studentId = isset($_GET['student_id']) ? trim($_GET['student_id']) : '';
$dateFrom = isset($_GET['date_from']) ? trim($_GET['date_from']) : '';
$dateTo = isset($_GET['date_to']) ? trim($_GET['date_to']) : '';

$where = ["p.approved = 1"]; // only approved
if ($paymentType !== '') { $where[] = "p.payment_type='".mysqli_real_escape_string($con,$paymentType)."'"; }
if ($paymentReason !== '') { $where[] = "p.payment_reason='".mysqli_real_escape_string($con,$paymentReason)."'"; }
if ($studentId !== '') { $where[] = "p.student_id LIKE '%".mysqli_real_escape_string($con,$studentId)."%'"; }
if ($department !== '') { $where[] = "c.department_id='".mysqli_real_escape_string($con,$department)."'"; }
if ($dateFrom !== '') { $where[] = "p.pays_date >= '".mysqli_real_escape_string($con,$dateFrom)."'"; }
if ($dateTo !== '') { $where[] = "p.pays_date <= '".mysqli_real_escape_string($con,$dateTo)."'"; }
$whereSql = 'WHERE '.implode(' AND ', $where);

// Dropdown data
$typesRes = mysqli_query($con, "SELECT DISTINCT payment_type FROM payment ORDER BY payment_type");
$reasonsRes = mysqli_query($con, ($paymentType !== '')
  ? "SELECT DISTINCT payment_reason FROM payment WHERE payment_type='" . mysqli_real_escape_string($con, $paymentType) . "' ORDER BY payment_reason"
  : "SELECT DISTINCT payment_reason FROM payment ORDER BY payment_reason");
$deptRes = mysqli_query($con, "SELECT department_id, department_name FROM department ORDER BY department_name");

$sql = "
SELECT 
  p.pays_id, p.student_id, p.payment_type, p.payment_reason, p.pays_amount, p.pays_qty, p.pays_note, p.pays_date,
  p.pays_department, p.approved_at, p.approved_by,
  s.student_fullname,
  c.department_id,
  d.department_name
FROM pays p
LEFT JOIN student s ON s.student_id = p.student_id
LEFT JOIN student_enroll se ON se.student_id = p.student_id AND se.student_enroll_status='Following'
LEFT JOIN course c ON c.course_id = se.course_id
LEFT JOIN department d ON d.department_id = c.department_id
$whereSql
ORDER BY p.pays_date DESC, p.pays_id DESC
";
$res = mysqli_query($con, $sql);
?>

<div class="container mt-3">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Approved Registration Payments</h2>
  </div>

  <form class="card card-body mb-3" method="get">
    <div class="form-row">
      <div class="form-group col-md-3">
        <label>Payment Type</label>
        <select name="payment_type" class="form-control">
          <option value="">-- Any --</option>
          <?php if ($typesRes && mysqli_num_rows($typesRes)>0) { while($r=mysqli_fetch_assoc($typesRes)){ ?>
            <option value="<?php echo htmlspecialchars($r['payment_type']); ?>" <?php echo ($paymentType===$r['payment_type'])?'selected':''; ?>><?php echo htmlspecialchars($r['payment_type']); ?></option>
          <?php }} ?>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>Payment Reason</label>
        <select name="payment_reason" class="form-control">
          <option value="">-- Any --</option>
          <?php if ($reasonsRes && mysqli_num_rows($reasonsRes)>0) { while($r=mysqli_fetch_assoc($reasonsRes)){ ?>
            <option value="<?php echo htmlspecialchars($r['payment_reason']); ?>" <?php echo ($paymentReason===$r['payment_reason'])?'selected':''; ?>><?php echo htmlspecialchars($r['payment_reason']); ?></option>
          <?php }} ?>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label>Department</label>
        <select name="department" class="form-control">
          <option value="">-- Any --</option>
          <?php if ($deptRes && mysqli_num_rows($deptRes)>0) { while($r=mysqli_fetch_assoc($deptRes)){ ?>
            <option value="<?php echo htmlspecialchars($r['department_id']); ?>" <?php echo ($department===$r['department_id'])?'selected':''; ?>><?php echo htmlspecialchars($r['department_name']); ?></option>
          <?php }} ?>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label>Student ID</label>
        <input type="text" name="student_id" value="<?php echo htmlspecialchars($studentId); ?>" class="form-control" placeholder="e.g. 2025ICT...">
      </div>
      <div class="form-group col-md-1">
        <label>From</label>
        <input type="date" name="date_from" value="<?php echo htmlspecialchars($dateFrom); ?>" class="form-control">
      </div>
      <div class="form-group col-md-1">
        <label>To</label>
        <input type="date" name="date_to" value="<?php echo htmlspecialchars($dateTo); ?>" class="form-control">
      </div>
    </div>
    <div>
      <button type="submit" class="btn btn-primary btn-sm">Filter</button>
      <a href="<?php echo (defined('APP_BASE')?APP_BASE:''); ?>/finance/RegistrationPaymentsApproved.php" class="btn btn-secondary btn-sm">Reset</a>
    </div>
  </form>

  <div class="card">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Student ID</th>
              <th>Name</th>
              <th>Department</th>
              <th>Type</th>
              <th>Reason</th>
              <th>Amount</th>
              <th>Qty</th>
              <th>Date</th>
              <th>Approved By</th>
              <th>Approved At</th>
            </tr>
          </thead>
          <tbody>
          <?php if ($res && mysqli_num_rows($res) > 0) { while($row = mysqli_fetch_assoc($res)) { ?>
            <tr>
              <td><?php echo (int)$row['pays_id']; ?></td>
              <td><?php echo htmlspecialchars($row['student_id']); ?></td>
              <td><?php echo htmlspecialchars($row['student_fullname'] ?: '-'); ?></td>
              <td><?php echo htmlspecialchars($row['department_name'] ?: ($row['pays_department'] ?: '-')); ?></td>
              <td><?php echo htmlspecialchars($row['payment_type']); ?></td>
              <td><?php echo htmlspecialchars($row['payment_reason']); ?></td>
              <td><?php echo number_format((float)$row['pays_amount'], 2); ?></td>
              <td><?php echo (int)$row['pays_qty']; ?></td>
              <td><?php echo htmlspecialchars($row['pays_date']); ?></td>
              <td><?php echo htmlspecialchars($row['approved_by'] ?: '-'); ?></td>
              <td><?php echo htmlspecialchars($row['approved_at'] ?: '-'); ?></td>
            </tr>
          <?php } } else { ?>
            <tr><td colspan="11" class="text-center text-muted">No approved payments found.</td></tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include_once(__DIR__ . '/../footer.php'); ?>
