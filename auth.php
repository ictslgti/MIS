<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }

// Role/permission helpers
function auth_user_type(): string {
    $t = isset($_SESSION['user_type']) ? strtoupper(trim((string)$_SESSION['user_type'])) : '';
    return $t;
}

function is_role(string $role): bool {
    return auth_user_type() === strtoupper($role);
}

/**
 * Check if current user has ANY of the provided roles
 * @param array $roles e.g., ['ADM','HOD']
 */
function is_any(array $roles): bool {
    $u = auth_user_type();
    foreach ($roles as $r) {
        if ($u === strtoupper((string)$r)) return true;
    }
    return false;
}

function is_logged_in(): bool {
    // Consider logged in if user_type is set; adjust to your app's logic as needed
    return auth_user_type() !== '';
}

/**
 * Enforce login, otherwise redirect to index/login
 */
function require_login(): void {
    if (!is_logged_in()) {
        header('Location: '.(defined('APP_BASE')?APP_BASE:'').'/index.php');
        exit;
    }
}

/**
 * Enforce role(s). If not authorized, render 403 with site chrome and exit.
 * @param array|string $roles A role string or list of roles allowed
 */
function require_roles($roles): void {
    $allowed = is_array($roles) ? $roles : [$roles];
    if (!is_any($allowed)) {
        http_response_code(403);
        // Try to print a nice error page with layout if possible
        $baseDir = __DIR__;
        $head = $baseDir . '/head.php';
        $menu = $baseDir . '/menu.php';
        $foot = $baseDir . '/footer.php';
        if (file_exists($head)) include_once $head;
        if (file_exists($menu)) include_once $menu;
        echo '<div class="container mt-3"><div class="alert alert-danger">Access denied. You do not have permission to access this page.</div></div>';
        if (file_exists($foot)) include_once $foot;
        exit;
    }
}

/**
 * Helper to hide/show UI blocks
 * Usage: if (can_view(['ADM','HOD'])) { ... }
 */
function can_view(array $roles): bool { return is_any($roles); }
