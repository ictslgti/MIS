<?php
// logout.php - Securely end the session and redirect to login/home
ini_set('session.use_strict_mode', 1);
if (session_status() === PHP_SESSION_NONE) { session_start(); }

// Unset all session variables
$_SESSION = [];

// Delete session cookie (if any)
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

// Destroy the session
session_destroy();

// Optionally prevent back button from showing cached auth pages
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

// Redirect to login/home
$base = rtrim((defined('APP_BASE') ? APP_BASE : ''), '/');
$target = $base . '/index.php';
header('Location: ' . $target);
exit;
