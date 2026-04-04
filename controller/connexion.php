<?php
session_start();
require_once __DIR__ . "/../bdd/config.php";

if (isset($_SESSION["user"])) {
    header('Location: ../views/monespace.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $csrf = isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '';

    if (!verify_csrf_token($csrf)) {
        set_flash('Jeton CSRF invalide.', 'error');
        header('Location: /MyStadium/views/connexion.php');
        exit;
    }

    if ($username === '' || $password === '') {
        set_flash('Tous les champs sont obligatoires!', 'error');
        header('Location: /MyStadium/views/connexion.php');
        exit;
    }

    $stmt = $pdo->prepare('SELECT TOP 1 * FROM stadium_user WHERE login = :login');
    $stmt->execute([':login' => $username]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        set_flash('Identifiants incorrects.', 'error');
        header('Location: /MyStadium/views/connexion.php');
        exit;
    }

    $stored = $result['password'];
    $ok = false;
    // Toujours exiger un hash sécurisé
    if (password_get_info($stored)['algo'] !== 0) {
        $ok = password_verify($password, $stored);
    } else {
        // Migration automatique si mot de passe en clair
        $ok = hash_equals($stored, $password);
    }

    if ($ok) {
        // Migration hash si besoin
        if (password_get_info($stored)['algo'] === 0) {
            $newHash = password_hash($password, PASSWORD_DEFAULT);
            $u = $pdo->prepare('UPDATE stadium_user SET password = :pw WHERE id = :id');
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
}
?>