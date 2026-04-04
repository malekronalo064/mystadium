<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/MyStadium/public/css/login.css"/>
    <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Mon espace — MyStadium</title>
    <!-- Style global géré par index.css -->
</head>
<body>
    <?php include(__DIR__ . "/header.php")?>
    <div class="login-bg" style="background: linear-gradient(135deg, #1e5d2d 0%, #3bb54a 100%), url('/MyStadium/public/img/signupbackground1.jpg') center/cover no-repeat; min-height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <div class="card" style="max-width: 520px; width: 100%; margin: 48px 0; text-align: center; background: rgba(255,255,255,0.97);">
            <?php
            session_start();
            if(!isset($_SESSION["user"])){
                header('Location: /');
                exit;
            } else if(isset($_GET["deconnexion"])){
                unset($_SESSION['user']);
                session_destroy();
                header('Location: /MyStadium/views/connexion.php');
                exit;
            }
            $user = $_SESSION["user"];
            ?>
            <h1 class="login-title" style="font-size:2em; color:#1e5d2d; font-family:'Ms Madi',cursive; margin-bottom: 18px;">Bienvenue, <?php echo htmlspecialchars($user['firstname'] ?? $user['login']); ?> !</h1>
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