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
        echo "<p style='color:red'>Jeton CSRF invalide.</p>";
        exit;
    }

    if ($username === '' || $password === '') {
        echo "<p style='color:red'>Tous les champs sont obligatoires!</p>";
    } else {
        $stmt = $pdo->prepare('SELECT * FROM stadium_user WHERE login = :login LIMIT 1');
        $stmt->execute([':login' => $username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            echo "<p style='color:red'>Identifiants incorrects.</p>";
        } else {
            $stored = $result['password'];
            $ok = false;
            if (password_get_info($stored)['algo'] !== 0) {
                $ok = password_verify($password, $stored);
            } else {
                // plain password in DB -- allow login but migrate to hash
                $ok = hash_equals($stored, $password);
            }

                    if ($ok) {
                // migrate to hashed password if needed
                if (password_get_info($stored)['algo'] === 0) {
                    $newHash = password_hash($password, PASSWORD_DEFAULT);
                    $u = $pdo->prepare('UPDATE stadium_user SET password = :pw WHERE id = :id');
                    $u->execute([':pw' => $newHash, ':id' => $result['id']]);
                }
                unset($result['password']);
                $_SESSION["user"] = $result;
                // regenerate session id after login
                session_regenerate_id(true);
                set_flash('Connexion réussie', 'success');
                header('Location: /views/monespace.php');
                exit;
                    } else {
                echo "<p style='color:red'>Identifiants incorrects.</p>";
            }
        }
    }
}
?>