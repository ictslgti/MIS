<?php
// BLOCK#1 START DON'T CHANGE THE ORDER
$title = "Payroll | SLGTI";
include_once("../config.php");
include_once("../head.php");
include_once("../menu.php");
// END DON'T CHANGE THE ORDER

// Access control: allow only WAR, HOD, ADM (block STU and others)
$allowed = ['WAR','HOD','ADM'];
if (!isset($_SESSION['user_type']) || !in_array($_SESSION['user_type'], $allowed)) {
    http_response_code(403);
    echo '<div class="alert alert-danger m-3">Access denied.</div>';
    include_once("../footer.php");
    exit;
}

// Align to database charset/collation
$__db_vars = mysqli_query($con, "SELECT @@character_set_database AS cs, @@collation_database AS cl");
$__db_cs = null; $__db_cl = null;
if ($__db_vars && ($__row = mysqli_fetch_assoc($__db_vars))) {
    $__db_cs = $__row['cs'];
    $__db_cl = $__row['cl'];
}
if ($__db_cs) { @mysqli_set_charset($con, $__db_cs); }

// Ensure table exists (read-only page won't write, but keep consistent)
mysqli_query($con, "CREATE TABLE IF NOT EXISTS `payroll` (
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
) ENGINE=InnoDB");
if ($__db_cs && $__db_cl) {
    @mysqli_query($con, "ALTER TABLE `payroll` CONVERT TO CHARACTER SET " . $__db_cs . " COLLATE " . $__db_cl);
}

function __int($v) { return intval($v); }

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
  <h2 class="text-primary mb-0"><i class="fas fa-money-check-alt"></i> Payroll</h2>
  <small class="text-muted">Read-only view</small>
</div>

<div class="card mb-4">
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
            <th>Notes</th>
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
              <td><?php echo htmlspecialchars($row['notes'] ?? ''); ?></td>
            </tr>
          <?php } } else { ?>
            <tr><td colspan="8" class="text-center text-muted">No records</td></tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
<?php include_once("../footer.php"); ?>
<!-- END DON'T CHANGE THE ORDER -->
