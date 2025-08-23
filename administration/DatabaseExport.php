<?php
// Start buffering to avoid premature output breaking download headers
if (!headers_sent()) { if (!ob_get_level()) { ob_start(); } }

$title = "Database Export | SLGTI";
include_once("../config.php");

// Early export handling BEFORE any HTML output
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

    // Routines (Procedures & Functions)
    $out .= "\n--\n-- Routines (Procedures & Functions)\n--\n\n";
    // Procedures
    $procRes = mysqli_query($con, "SELECT ROUTINE_NAME FROM INFORMATION_SCHEMA.ROUTINES WHERE ROUTINE_TYPE='PROCEDURE' AND ROUTINE_SCHEMA = DATABASE()");
    while ($procRes && ($row = mysqli_fetch_assoc($procRes))) {
        $name = $row['ROUTINE_NAME'];
        $cr = mysqli_query($con, "SHOW CREATE PROCEDURE `{$name}`");
        if ($cr && ($r = mysqli_fetch_assoc($cr))) {
            $create = $r['Create Procedure'];
            $out .= "DROP PROCEDURE IF EXISTS `{$name}`;\nDELIMITER ;;\n{$create} ;;\nDELIMITER ;\n\n";
        }
    }
    // Functions
    $fnRes = mysqli_query($con, "SELECT ROUTINE_NAME FROM INFORMATION_SCHEMA.ROUTINES WHERE ROUTINE_TYPE='FUNCTION' AND ROUTINE_SCHEMA = DATABASE()");
    while ($fnRes && ($row = mysqli_fetch_assoc($fnRes))) {
        $name = $row['ROUTINE_NAME'];
        $cr = mysqli_query($con, "SHOW CREATE FUNCTION `{$name}`");
        if ($cr && ($r = mysqli_fetch_assoc($cr))) {
            $create = $r['Create Function'];
            $out .= "DROP FUNCTION IF EXISTS `{$name}`;\nDELIMITER ;;\n{$create} ;;\nDELIMITER ;\n\n";
        }
    }

    // Triggers
    $out .= "--\n-- Triggers\n--\n\n";
    $trgRes = mysqli_query($con, "SHOW TRIGGERS");
    while ($trgRes && ($row = mysqli_fetch_assoc($trgRes))) {
        $trgName = $row['Trigger'];
        $cr = mysqli_query($con, "SHOW CREATE TRIGGER `{$trgName}`");
        if ($cr && ($r = mysqli_fetch_assoc($cr))) {
            // Some MySQL versions use 'SQL Original Statement' key
            $create = isset($r['SQL Original Statement']) ? $r['SQL Original Statement'] : (isset($r['Create Trigger']) ? $r['Create Trigger'] : '');
            if ($create !== '') {
                $out .= "DROP TRIGGER IF EXISTS `{$trgName}`;\nDELIMITER ;;\n{$create} ;;\nDELIMITER ;\n\n";
            }
        }
    }

    // Events (if EVENT privilege is enabled)
    $out .= "--\n-- Events\n--\n\n";
    $evtRes = mysqli_query($con, "SHOW EVENTS");
    if ($evtRes) {
        while ($row = mysqli_fetch_assoc($evtRes)) {
            if (!isset($row['Name'])) { continue; }
            $evtName = $row['Name'];
            $cr = mysqli_query($con, "SHOW CREATE EVENT `{$evtName}`");
            if ($cr && ($r = mysqli_fetch_assoc($cr))) {
                $create = isset($r['Create Event']) ? $r['Create Event'] : '';
                if ($create !== '') {
                    $out .= "DROP EVENT IF EXISTS `{$evtName}`;\nDELIMITER ;;\n{$create} ;;\nDELIMITER ;\n\n";
                }
            }
        }
    }

    $out .= "SET FOREIGN_KEY_CHECKS=1;\n";
    return $out;
}

// Direct download path
if (($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['do_export'])) ||
    (isset($_GET['download']) && $_GET['download'] == '1')) {
    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'ADM') {
        http_response_code(403);
        header('Content-Type: text/plain; charset=utf-8');
        echo 'Access denied. Admins only.';
        if (ob_get_level()) { @ob_end_flush(); }
        exit;
    }

    $db = current_database($con) ?: 'database';
    $simple = isset($_GET['simple']) && $_GET['simple'] == '1';
    $filename = $simple ? ($db . ".sql") : ($db . "_export_" . date('Ymd_His') . ".sql");
    $sql = export_database_sql($con);

    // Optionally save a copy on the server
    $saveCopy = isset($_POST['save_to_server']) && $_POST['save_to_server'] === '1';
    if ($saveCopy) {
        $backupDir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'backups';
        if (!is_dir($backupDir)) { @mkdir($backupDir, 0775, true); }
        $serverFile = $backupDir . DIRECTORY_SEPARATOR . $filename;
        // suppress errors but try to write
        @file_put_contents($serverFile, $sql);
    }

    // Clean any buffered output and send download
    if (ob_get_length()) { @ob_clean(); }
    header('Content-Type: application/sql');
    header('Content-Disposition: attachment; filename=' . $filename);
    header('Content-Length: ' . strlen($sql));
    header('X-Content-Type-Options: nosniff');
    echo $sql;
    if (ob_get_level()) { @ob_end_flush(); }
    exit;
}

// From here on, render the page (safe to include head/menu)
include_once("../head.php");
include_once("../menu.php");

// Access control: only admins for page view
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'ADM') {
    http_response_code(403);
    echo '<div class="alert alert-danger m-3">Access denied. Admins only.</div>';
    include_once("../footer.php");
    exit;
}

?>

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
        <div class="form-check d-inline-block mr-3">
          <input class="form-check-input" type="checkbox" id="save_to_server" name="save_to_server" value="1">
          <label class="form-check-label" for="save_to_server">Save a copy on server (backups/)</label>
        </div>
        <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-download"></i> Export Now</button>
      </form>
      <hr>
      <p class="small mb-0">
        Note: This export includes tables, data, procedures, functions, triggers, and events. Ensure you have sufficient permissions. If "Save a copy" is checked, file will be stored in <code>backups/</code>.
      </p>
    </div>
  </div>
</div>
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("../footer.php"); ?>
<!--END DON'T CHANGE THE ORDER -->
