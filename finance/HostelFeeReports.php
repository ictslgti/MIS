<?php
// finance/HostelFeeReports.php — Finance Officer: Hostel fee summary reports
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../auth.php';
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_login();
require_roles('FIN');
if (!headers_sent()) { ob_start(); }

// Inputs
$period = isset($_GET['period']) ? trim($_GET['period']) : 'month'; // day|week|month|year
$start  = isset($_GET['start']) ? trim($_GET['start']) : '';
$end    = isset($_GET['end']) ? trim($_GET['end']) : '';
$export = isset($_GET['export']) ? trim($_GET['export']) : '';

// Defaults: last 30 days
if ($start === '' || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $start)) {
  $start = date('Y-m-d', strtotime('-30 days'));
}
if ($end === '' || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $end)) {
  $end = date('Y-m-d');
}

// Build SQL based on period
$select = '';
$group  = '';
$fields = 'SUM(p.amount) AS total_amount, COUNT(*) AS payments_count, MIN(p.paid_on) AS min_date, MAX(p.paid_on) AS max_date';
switch ($period) {
  case 'day':
    $select = "DATE(p.paid_on) AS grp_key, $fields";
    $group  = 'DATE(p.paid_on)';
    break;
  case 'week':
    $select = "YEAR(p.paid_on) AS yr, WEEK(p.paid_on, 1) AS wk, $fields";
    $group  = 'YEAR(p.paid_on), WEEK(p.paid_on, 1)';
    break;
  case 'year':
    $select = "YEAR(p.paid_on) AS grp_key, $fields";
    $group  = 'YEAR(p.paid_on)';
    break;
  case 'month':
  default:
    $select = "YEAR(p.paid_on) AS yr, MONTH(p.paid_on) AS mon, $fields";
    $group  = 'YEAR(p.paid_on), MONTH(p.paid_on)';
    $period = 'month';
}

$sql = "SELECT $select FROM hostel_fee_payments p WHERE p.paid_on BETWEEN ? AND ? GROUP BY $group ORDER BY min_date ASC";

// Execute
$data = [];
if ($st = mysqli_prepare($con, $sql)) {
  mysqli_stmt_bind_param($st, 'ss', $start, $end);
  if (mysqli_stmt_execute($st)) {
    $res = mysqli_stmt_get_result($st);
    if ($res) {
      while ($r = mysqli_fetch_assoc($res)) { $data[] = $r; }
      mysqli_free_result($res);
    }
  }
  mysqli_stmt_close($st);
}

// CSV export early return
if ($export === 'csv') {
  $filename = 'hostel_fee_summary_' . $period . '_' . $start . '_to_' . $end . '.csv';
  header('Content-Type: text/csv');
  header('Content-Disposition: attachment; filename=' . $filename);
  $out = fopen('php://output', 'w');
  // header row
  fputcsv($out, ['Period', 'Payments Count', 'Total Amount', 'From', 'To']);
  foreach ($data as $row) {
    $label = '';
    if ($period === 'day') {
      $label = $row['grp_key'];
    } elseif ($period === 'week') {
      $label = sprintf('W%02d-%04d', (int)$row['wk'], (int)$row['yr']);
    } elseif ($period === 'year') {
      $label = (string)$row['grp_key'];
    } else { // month
      $label = sprintf('%04d-%02d', (int)$row['yr'], (int)$row['mon']);
    }
    fputcsv($out, [
      $label,
      (int)$row['payments_count'],
      number_format((float)$row['total_amount'], 2, '.', ''),
      $row['min_date'],
      $row['max_date'],
    ]);
  }
  fclose($out);
  if (function_exists('ob_get_level') && ob_get_level() > 0) { @ob_end_flush(); }
  exit;
}

require_once __DIR__ . '/../head.php';
require_once __DIR__ . '/../menu.php';
?>
<style>
  @media print {
    #filters, #actions, .sidebar, .navbar, .footer { display: none !important; }
    .card { border: none; }
  }
</style>
<div class="container mt-3">
  <h2 class="text-center">Finance: Hostel Fee Summary Reports</h2>
  <p class="text-center">Print totals by day, week, month, or year.</p>

  <div id="filters" class="card mb-3">
    <div class="card-body">
      <form method="get" class="form-row mb-0">
        <div class="form-group col-md-3">
          <label>Period</label>
          <select name="period" class="form-control">
            <option value="day"   <?php echo $period==='day'?'selected':''; ?>>Day</option>
            <option value="week"  <?php echo $period==='week'?'selected':''; ?>>Week</option>
            <option value="month" <?php echo $period==='month'?'selected':''; ?>>Month</option>
            <option value="year"  <?php echo $period==='year'?'selected':''; ?>>Year</option>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label>Start</label>
          <input type="date" name="start" class="form-control" value="<?php echo htmlspecialchars($start); ?>">
        </div>
        <div class="form-group col-md-3">
          <label>End</label>
          <input type="date" name="end" class="form-control" value="<?php echo htmlspecialchars($end); ?>">
        </div>
        <div id="actions" class="form-group col-md-3 align-self-end">
          <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Apply</button>
          <a class="btn btn-outline-secondary" href="?period=<?php echo urlencode($period); ?>&start=<?php echo urlencode($start); ?>&end=<?php echo urlencode($end); ?>&export=csv"><i class="fa fa-file-csv"></i> CSV</a>
          <button type="button" class="btn btn-secondary" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
        </div>
      </form>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-sm table-bordered table-striped mb-0">
          <thead>
            <tr>
              <th>Period</th>
              <th class="text-right">Payments Count</th>
              <th class="text-right">Total Amount</th>
              <th>From</th>
              <th>To</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $grand_total = 0.0;
              $grand_count = 0;
              if (count($data) > 0) {
                foreach ($data as $row) {
                  $label = '';
                  if ($period === 'day') {
                    $label = $row['grp_key'];
                  } elseif ($period === 'week') {
                    $label = sprintf('W%02d-%04d (%s to %s)', (int)$row['wk'], (int)$row['yr'], $row['min_date'], $row['max_date']);
                  } elseif ($period === 'year') {
                    $label = (string)$row['grp_key'];
                  } else { // month
                    $label = sprintf('%04d-%02d', (int)$row['yr'], (int)$row['mon']);
                  }
                  $grand_total += (float)$row['total_amount'];
                  $grand_count += (int)$row['payments_count'];
                  echo '<tr>';
                  echo '<td>'.htmlspecialchars($label).'</td>';
                  echo '<td class="text-right">'.number_format((int)$row['payments_count']).'</td>';
                  echo '<td class="text-right">'.number_format((float)$row['total_amount'], 2).'</td>';
                  echo '<td>'.htmlspecialchars($row['min_date']).'</td>';
                  echo '<td>'.htmlspecialchars($row['max_date']).'</td>';
                  echo '</tr>';
                }
                echo '<tr class="font-weight-bold">';
                echo '<td>Total</td>';
                echo '<td class="text-right">'.number_format($grand_count).'</td>';
                echo '<td class="text-right">'.number_format($grand_total, 2).'</td>';
                echo '<td colspan="2"></td>';
                echo '</tr>';
              } else {
                echo '<tr><td colspan="5" class="text-center">No records for the selected range.</td></tr>';
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php require_once __DIR__ . '/../footer.php'; if (function_exists('ob_get_level') && ob_get_level() > 0) { @ob_end_flush(); } ?>
