<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/MyStadium/public/css/login.css"/>
    <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
    <title>Mon espace — MyStadium</title>
</head>
<body>
    <?php include(__DIR__ . "/header.php")?>
    <div class="login-bg">
        <div class="login-card" style="max-width: 500px;">
            <?php
            session_start();
            if(!isset($_SESSION["user"])){
                header('Location: /');
                exit;
            } else if(isset($_GET["deconnexion"])){
                unset($_SESSION['user']);
                header('Location: /');
                exit;
            }
            $user = $_SESSION["user"];
            ?>
            <h1 class="login-title">Bienvenue, <?php echo htmlspecialchars($user['firstname'] ?? $user['login']); ?> !</h1>
            <div style="margin-bottom:18px;color:#1e5d2d;font-weight:bold;">Votre espace personnel</div>
            <div class="user-info" style="margin-bottom:18px;">
                <div><strong>Nom :</strong> <?php echo htmlspecialchars($user['lastname'] ?? ''); ?></div>
                <div><strong>Prénom :</strong> <?php echo htmlspecialchars($user['firstname'] ?? ''); ?></div>
                <div><strong>Email :</strong> <?php echo htmlspecialchars($user['email'] ?? ''); ?></div>
                <div><strong>Téléphone :</strong> <?php echo htmlspecialchars($user['telephone'] ?? ''); ?></div>
            </div>
            <a href="?deconnexion=1" class="btn-main" style="width:100%;margin-bottom:8px;">Se déconnecter</a>
            <!-- Ici, on pourra ajouter l’historique des réservations, gestion du profil, etc. -->
        </div>
    </div>
    <?php include(__DIR__ . "/footer.php")?>
</body>
</html>