<?php
session_start();
if (isset($_SESSION["user"])) {
    header('Location: ../views/monespace.php');
    exit;
}
// Toute la logique métier passe désormais par l'API (login via AJAX)
include __DIR__ . '/../views/connexion.php';
    if (password_get_info($stored)['algo'] !== 0) {
        $ok = password_verify($password, $stored);
    } else {
        $ok = hash_equals($stored, $password);
    }

    if ($ok) {
        // Migration hash si besoin (mot de passe en clair)
        if (password_get_info($stored)['algo'] === 0 && isset($result['id'])) {
            $newHash = password_hash($password, PASSWORD_DEFAULT);
            $u = $pdo->prepare('UPDATE users SET password = :pw WHERE id = :id');
            $u->execute([':pw' => $newHash, ':id' => $result['id']]);
        }
        unset($result['password']);
        $_SESSION['user'] = $result;
        session_regenerate_id(true);
        set_flash('Connexion réussie', 'success');
        header('Location: /MyStadium/views/monespace.php');
        exit;
    } else {
        set_flash('Identifiants incorrects.', 'error');
        header('Location: /MyStadium/views/connexion.php');
        exit;
    }
?>