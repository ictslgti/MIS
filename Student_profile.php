<?php
// Redirect shim to maintain backward compatibility for /Student_profile.php
// Correct location is /student/Student_profile.php
include_once(__DIR__ . '/config.php');

// Build destination preserving query string
$base = (defined('APP_BASE') ? APP_BASE : '');
$dest = $base . '/student/Student_profile.php';
if (!empty($_SERVER['QUERY_STRING'])) {
  $dest .= (strpos($dest, '?') === false ? '?' : '&') . $_SERVER['QUERY_STRING'];
}
header('Location: ' . $dest, true, 302);
exit;
