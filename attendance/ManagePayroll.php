<?php
// BLOCK#1 START DON'T CHANGE THE ORDER
$title = "Payroll Management | SLGTI";
include_once("../config.php");
include_once("../head.php");
include_once("../menu.php");
// END DON'T CHANGE THE ORDER

// Access control: only Admins can access ManagePayroll
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'ADM') {
    http_response_code(403);
    echo '<div class="alert alert-danger m-3">Access denied. This page is restricted to administrators.</div>';
    include_once("../footer.php");
    exit;
}

// Align connection and `payroll` table with the current database charset/collation
$__db_vars = mysqli_query($con, "SELECT @@character_set_database AS cs, @@collation_database AS cl");
$__db_cs = null; $__db_cl = null;
if ($__db_vars && ($__row = mysqli_fetch_assoc($__db_vars))) {
    $__db_cs = $__row['cs'];
    $__db_cl = $__row['cl'];
}
if ($__db_cs) { @mysqli_set_charset($con, $__db_cs); }

// Ensure table exists (safe no-op if already exists)
$__create_sql = "CREATE TABLE IF NOT EXISTS `payroll` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `staff_id` VARCHAR(50) NOT NULL,
  `year` INT NOT NULL,
  `month` TINYINT NOT NULL,
  `basic_salary` DECIMAL(12,2) NOT NULL DEFAULT 0,
  `allowances` DECIMAL(12,2) NOT NULL DEFAULT 0,
  `deductions` DECIMAL(12,2) NOT NULL DEFAULT 0,
  `net_salary` DECIMAL(12,2) NOT NULL DEFAULT 0,
  `notes` VARCHAR(255) NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB";
mysqli_query($con, $__create_sql);
// Ensure `payroll` table matches the database charset/collation (avoids join issues)
if ($__db_cs && $__db_cl) {
    @mysqli_query($con, "ALTER TABLE `payroll` CONVERT TO CHARACTER SET " . $__db_cs . " COLLATE " . $__db_cl);
    @mysqli_query($con, "ALTER TABLE `payroll` MODIFY `staff_id` VARCHAR(50) CHARACTER SET " . $__db_cs . " COLLATE " . $__db_cl . " NOT NULL");
    @mysqli_query($con, "ALTER TABLE `payroll` MODIFY `notes` VARCHAR(255) CHARACTER SET " . $__db_cs . " COLLATE " . $__db_cl . " NULL");
}

function __num($v) { return is_numeric($v) ? (float)$v : 0.0; }
function __int($v) { return intval($v); }
function __str($con, $v) { return mysqli_real_escape_string($con, trim((string)$v)); }

$errors = [];
$success = null;

// Handle create/update/delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if ($action === 'create' || $action === 'update') {
        $id          = isset($_POST['id']) ? __int($_POST['id']) : 0;
        $staff_id    = __str($con, $_POST['staff_id'] ?? '');
        $year        = __int($_POST['year'] ?? '');
        $month       = __int($_POST['month'] ?? '');
        $basic       = __num($_POST['basic_salary'] ?? 0);
        $allowances  = __num($_POST['allowances'] ?? 0);
        $deductions  = __num($_POST['deductions'] ?? 0);
        $notes       = __str($con, $_POST['notes'] ?? '');
        $net         = $basic + $allowances - $deductions;

        if ($staff_id === '') $errors[] = 'Staff is required';
        if ($year < 2000 || $year > 2100) $errors[] = 'Year must be between 2000 and 2100';
        if ($month < 1 || $month > 12) $errors[] = 'Month must be 1-12';

        if (!$errors) {
            if ($action === 'create') {
                $sql = "INSERT INTO payroll (staff_id, year, month, basic_salary, allowances, deductions, net_salary, notes)
                        VALUES ('$staff_id', $year, $month, $basic, $allowances, $deductions, $net, '$notes')";
                if (mysqli_query($con, $sql)) {
                    $success = 'Payroll entry created.';
                } else {
                    $errors[] = 'DB Error: '.mysqli_error($con);
                }
            } else {
                $sql = "UPDATE payroll
                           SET staff_id='$staff_id', year=$year, month=$month,
                               basic_salary=$basic, allowances=$allowances, deductions=$deductions,
                               net_salary=$net, notes='$notes'
                         WHERE id=$id";
                if (mysqli_query($con, $sql)) {
                    $success = 'Payroll entry updated.';
                } else {
                    $errors[] = 'DB Error: '.mysqli_error($con);
                }
            }
        }
    }

    if ($action === 'delete') {
        $id = __int($_POST['id'] ?? 0);
        if ($id > 0) {
            if (mysqli_query($con, "DELETE FROM payroll WHERE id=$id")) {
                $success = 'Payroll entry deleted.';
            } else {
                $errors[] = 'DB Error: '.mysqli_error($con);
            }
        }
    }
}

// Fetch data for listing and for form dropdowns
$staff_opts = [];
$res_staff = mysqli_query($con, "SELECT staff_id, staff_name FROM staff ORDER BY staff_name");
if ($res_staff && mysqli_num_rows($res_staff) > 0) {
    while ($r = mysqli_fetch_assoc($res_staff)) { $staff_opts[] = $r; }
}

$editing = null;
if (isset($_GET['edit'])) {
    $eid = __int($_GET['edit']);
    $res = mysqli_query($con, "SELECT * FROM payroll WHERE id=$eid");
    if ($res && mysqli_num_rows($res) === 1) { $editing = mysqli_fetch_assoc($res); }
}

// Filters
$filter_year  = isset($_GET['year']) ? __int($_GET['year']) : (int)date('Y');
$filter_month = isset($_GET['month']) ? __int($_GET['month']) : 0; // 0 = all

$where = "WHERE year=".$filter_year;
if ($filter_month >= 1 && $filter_month <= 12) { $where .= " AND month=".$filter_month; }

$sql_list = "SELECT p.*, s.staff_name
             FROM payroll p
             LEFT JOIN staff s ON p.staff_id = s.staff_id
             $where
             ORDER BY year DESC, month DESC, s.staff_name ASC, p.id DESC";
$res_list = mysqli_query($con, $sql_list);
?>

<div class="shadow p-3 mb-4 bg-white rounded">
  <h2 class="text-primary mb-0"><i class="fas fa-money-check-alt"></i> Manage Payroll</h2>
  <small class="text-muted">Create, update and delete payroll records</small>
</div>

<div class="row">
  <div class="col-md-4">
    <div class="card mb-4">
      <div class="card-header bg-info text-white"><?php echo $editing ? 'Edit Payroll' : 'Add Payroll'; ?></div>
      <div class="card-body">
        <?php if ($errors) { echo '<div class="alert alert-danger py-2">'.implode('<br>', $errors).'</div>'; } ?>
        <?php if ($success) { echo '<div class="alert alert-success py-2">'.htmlspecialchars($success).'</div>'; } ?>
        <form method="post">
          <input type="hidden" name="action" value="<?php echo $editing ? 'update' : 'create'; ?>">
          <?php if ($editing) { echo '<input type="hidden" name="id" value="'.(int)$editing['id'].'">'; } ?>

          <div class="form-group">
            <label>Staff</label>
            <select class="browser-default custom-select" name="staff_id" required>
              <option value="">-- Select Staff --</option>
              <?php foreach ($staff_opts as $opt) { $sel = ($editing && $editing['staff_id']===$opt['staff_id']) ? ' selected' : ''; ?>
                <option value="<?php echo htmlspecialchars($opt['staff_id']); ?>"<?php echo $sel; ?>><?php echo htmlspecialchars($opt['staff_name'].' ('.$opt['staff_id'].')'); ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-row">
            <div class="form-group col-6">
              <label>Year</label>
              <input type="number" class="form-control" name="year" min="2000" max="2100" value="<?php echo htmlspecialchars($editing['year'] ?? date('Y')); ?>" required>
            </div>
            <div class="form-group col-6">
              <label>Month</label>
              <select class="browser-default custom-select" name="month" required>
                <?php
                  $months = [1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',5=>'May',6=>'Jun',7=>'Jul',8=>'Aug',9=>'Sep',10=>'Oct',11=>'Nov',12=>'Dec'];
                  $curM = (int)($editing['month'] ?? date('n'));
                  foreach ($months as $m=>$_n) { $sel = ($curM===$m)?' selected':''; echo "<option value=\"$m\"$sel>$m - $_n</option>"; }
                ?>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-6">
              <label>Basic Salary</label>
              <input type="number" step="0.01" class="form-control" name="basic_salary" value="<?php echo htmlspecialchars($editing['basic_salary'] ?? '0.00'); ?>" required>
            </div>
            <div class="form-group col-6">
              <label>Allowances</label>
              <input type="number" step="0.01" class="form-control" name="allowances" value="<?php echo htmlspecialchars($editing['allowances'] ?? '0.00'); ?>" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-6">
              <label>Deductions</label>
              <input type="number" step="0.01" class="form-control" name="deductions" value="<?php echo htmlspecialchars($editing['deductions'] ?? '0.00'); ?>" required>
            </div>
            <div class="form-group col-6">
              <label>Notes</label>
              <input type="text" class="form-control" name="notes" maxlength="255" value="<?php echo htmlspecialchars($editing['notes'] ?? ''); ?>">
            </div>
          </div>

          <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?php echo $editing ? 'Update' : 'Add'; ?></button>
          <?php if ($editing) { ?>
            <a class="btn btn-secondary" href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/attendance/ManagePayroll"><i class="fas fa-times"></i> Cancel</a>
          <?php } ?>
        </form>
      </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="card mb-4">
      <div class="card-header bg-secondary text-white">Payroll List</div>
      <div class="card-body">
        <form class="form-inline mb-3" method="get">
          <label class="mr-2">Year</label>
          <input type="number" class="form-control mr-3" style="width:110px" name="year" min="2000" max="2100" value="<?php echo htmlspecialchars($filter_year); ?>">
          <label class="mr-2">Month</label>
          <select class="form-control mr-3" name="month">
            <option value="0">All</option>
            <?php $months=[1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',5=>'May',6=>'Jun',7=>'Jul',8=>'Aug',9=>'Sep',10=>'Oct',11=>'Nov',12=>'Dec'];
              foreach ($months as $m=>$n) { $sel = ($filter_month===$m)?' selected':''; echo "<option value=\"$m\"$sel>$n</option>"; }?>
          </select>
          <button class="btn btn-outline-primary" type="submit"><i class="fas fa-filter"></i> Filter</button>
        </form>

        <div class="table-responsive">
          <table class="table table-sm table-striped table-bordered">
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th>Staff</th>
                <th>Year-Month</th>
                <th class="text-right">Basic</th>
                <th class="text-right">Allow.</th>
                <th class="text-right">Deduct.</th>
                <th class="text-right">Net</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($res_list && mysqli_num_rows($res_list) > 0) { $i=1; while($row=mysqli_fetch_assoc($res_list)) { ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo htmlspecialchars(($row['staff_name'] ?: $row['staff_id'])); ?></td>
                  <td><?php echo htmlspecialchars($row['year'].'-'.str_pad($row['month'],2,'0',STR_PAD_LEFT)); ?></td>
                  <td class="text-right"><?php echo number_format($row['basic_salary'],2); ?></td>
                  <td class="text-right"><?php echo number_format($row['allowances'],2); ?></td>
                  <td class="text-right"><?php echo number_format($row['deductions'],2); ?></td>
                  <td class="text-right font-weight-bold"><?php echo number_format($row['net_salary'],2); ?></td>
                  <td>
                    <a class="btn btn-sm btn-warning" href="<?php echo defined('APP_BASE') ? APP_BASE : ''; ?>/attendance/ManagePayroll?edit=<?php echo (int)$row['id']; ?>"><i class="far fa-edit"></i></a>
                    <form method="post" style="display:inline-block" onsubmit="return confirm('Delete this payroll entry?');">
                      <input type="hidden" name="action" value="delete">
                      <input type="hidden" name="id" value="<?php echo (int)$row['id']; ?>">
                      <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
              <?php } } else { ?>
                <tr><td colspan="8" class="text-center text-muted">No records</td></tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
<?php include_once("../footer.php"); ?>
<!-- END DON'T CHANGE THE ORDER -->
