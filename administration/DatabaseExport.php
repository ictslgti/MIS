<!-- BLOCK#1 START DON'T CHANGE THE ORDER -->
<?php
$title = "Database Export | SLGTI";
include_once("../config.php");
include_once("../head.php");
include_once("../menu.php");

// Access control: only admins
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'ADM') {
    http_response_code(403);
    echo '<div class="alert alert-danger m-3">Access denied. Admins only.</div>';
    include_once("../footer.php");
    exit;
}

function current_database(mysqli $con) {
    $res = mysqli_query($con, "SELECT DATABASE() AS db");
    if ($res && ($row = mysqli_fetch_assoc($res))) {
        return $row['db'];
    }
    return null;
}

function export_database_sql(mysqli $con): string {
    // Ensure consistent charset
    mysqli_query($con, "SET NAMES utf8mb4");
    mysqli_query($con, "SET FOREIGN_KEY_CHECKS=0");

    $db = current_database($con) ?: 'database';
    $out = "-- SLGTI SIS Database Export\n";
    $out .= "-- Database: `{$db}`\n";
    $out .= "-- Generated at: ".date('Y-m-d H:i:s')."\n\n";
    $out .= "SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';\n";
    $out .= "SET FOREIGN_KEY_CHECKS=0;\n\n";

    // List tables
    $tables = [];
    $rs = mysqli_query($con, "SHOW TABLES");
    while ($rs && ($row = mysqli_fetch_row($rs))) { $tables[] = $row[0]; }

    foreach ($tables as $table) {
        // Drop and create
        $out .= "--\n-- Structure for table `$table`\n--\n\n";
        $out .= "DROP TABLE IF EXISTS `$table`;\n";
        $crs = mysqli_query($con, "SHOW CREATE TABLE `$table`");
        if ($crs && ($crow = mysqli_fetch_assoc($crs))) {
            $out .= $crow['Create Table'] . ";\n\n";
        }

        // Dump data in batches
        $out .= "--\n-- Data for table `$table`\n--\n\n";
        $countRes = mysqli_query($con, "SELECT COUNT(*) AS cnt FROM `$table`");
        $total = 0; if ($countRes && ($cRow = mysqli_fetch_assoc($countRes))) { $total = (int)$cRow['cnt']; }
        if ($total === 0) { continue; }

        $batchSize = 500;
        for ($offset = 0; $offset < $total; $offset += $batchSize) {
            $q = "SELECT * FROM `$table` LIMIT $batchSize OFFSET $offset";
            $dataRes = mysqli_query($con, $q);
            if (!$dataRes) { continue; }
            $cols = [];
            $fields = mysqli_fetch_fields($dataRes);
            foreach ($fields as $f) { $cols[] = "`".$f->name."`"; }
            $colList = implode(",", $cols);
            $values = [];
            while ($row = mysqli_fetch_assoc($dataRes)) {
                $vals = [];
                foreach ($fields as $f) {
                    $v = $row[$f->name];
                    if (is_null($v)) { $vals[] = 'NULL'; continue; }
                    // Numeric types vs string
                    $isNumeric = in_array($f->type, [
                        MYSQLI_TYPE_TINY, MYSQLI_TYPE_SHORT, MYSQLI_TYPE_LONG, MYSQLI_TYPE_LONGLONG,
                        MYSQLI_TYPE_INT24, MYSQLI_TYPE_DECIMAL, MYSQLI_TYPE_NEWDECIMAL, MYSQLI_TYPE_FLOAT, MYSQLI_TYPE_DOUBLE
                    ], true);
                    if ($isNumeric) {
                        $vals[] = (string)$v;
                    } else {
                        $vals[] = "'" . mysqli_real_escape_string($con, (string)$v) . "'";
                    }
                }
                $values[] = "(" . implode(",", $vals) . ")";
            }
            if (!empty($values)) {
                $out .= "INSERT INTO `$table` ($colList) VALUES\n" . implode(",\n", $values) . ";\n\n";
            }
        }
    }

    $out .= "SET FOREIGN_KEY_CHECKS=1;\n";
    return $out;
}

// If export requested, stream download
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['do_export'])) {
    $db = current_database($con) ?: 'database';
    $filename = $db . "_export_" . date('Ymd_His') . ".sql";
    $sql = export_database_sql($con);
    header('Content-Type: application/sql');
    header('Content-Disposition: attachment; filename=' . $filename);
    header('Content-Length: ' . strlen($sql));
    echo $sql;
    exit;
}
?>
<!--END DON'T CHANGE THE ORDER -->

<!--BLOCK#2 START YOUR CODE HERE -->
<div class="container mt-4">
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
      <span><i class="fas fa-database"></i> Database Export</span>
      <span class="badge badge-primary">Admin</span>
    </div>
    <div class="card-body">
      <p class="text-muted">
        Export the entire MySQL database to a downloadable .sql file.
      </p>
      <form method="post">
        <input type="hidden" name="do_export" value="1">
        <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-download"></i> Export Now</button>
      </form>
      <hr>
      <p class="small mb-0">
        Note: This export is generated directly from the active database connection. Ensure you have sufficient permissions.
      </p>
    </div>
  </div>
</div>
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("../footer.php"); ?>
<!--END DON'T CHANGE THE ORDER -->
