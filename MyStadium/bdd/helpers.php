<?php
// Helper utilities: secure session start, CSRF verify, flash messages
function start_secure_session() {
    if (session_status() === PHP_SESSION_NONE) {
        // cookie params: lifetime 0 (until browser close), path '/', httponly, samesite Lax
        $secure = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
        $params = [
            'lifetime' => 0,
            'path' => '/',
            'domain' => '',
            'secure' => $secure,
            'httponly' => true,
            'samesite' => 'Lax'
        ];
        if (PHP_VERSION_ID < 70300) {
            session_set_cookie_params($params['lifetime'], $params['path'] . '; samesite=' . $params['samesite'], $params['domain'], $params['secure'], $params['httponly']);
        } else {
            session_set_cookie_params($params);
        }
        session_start();
    }
    // ensure CSRF token
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(16));
    }
}

function verify_csrf_token($token) {
    if (!isset($_SESSION)) { start_secure_session(); }
    if (empty($token) || empty($_SESSION['csrf_token'])) { return false; }
    return hash_equals($_SESSION['csrf_token'], $token);
}

function set_flash($message, $type = 'info') {
    if (!isset($_SESSION)) { start_secure_session(); }
    $_SESSION['flash'] = ['message' => $message, 'type' => $type];
}

function get_flash() {
    if (!isset($_SESSION)) { start_secure_session(); }
    if (isset($_SESSION['flash'])) {
        $f = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $f;
    }
    return null;
}
