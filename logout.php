<?php
// logout.php - Securely end the session and redirect to login/home
ini_set('session.use_strict_mode', 1);

// Load app config to get APP_BASE and COOKIE_DOMAIN (important for nginx/vhost paths)
require_once __DIR__ . '/config.php';

if (session_status() === PHP_SESSION_NONE) { session_start(); }

// Unset all session variables
$_SESSION = [];

// Delete session cookie (if any)
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    // Do not specify domain so it matches current host
    setcookie(session_name(), '', time() - 42000, $params['path'], '', $params['secure'], $params['httponly']);
}

// Also delete remember-me cookie without explicit domain
setcookie('rememberme', '', time() - 3600, '/', '', false, true);

// Destroy the session
session_destroy();
session_write_close();

// Prevent cached auth pages
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

// Redirect to login/home using APP_BASE for correct subdir under nginx
$base = rtrim((defined('APP_BASE') ? APP_BASE : ''), '/');
$target = $base . '/index.php';
header('Location: ' . $target);
exit;
