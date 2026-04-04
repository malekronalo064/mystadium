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
        <div class="login-bg" style="background: linear-gradient(135deg, #1e5d2d 0%, #3bb54a 100%), url('/MyStadium/public/img/signupbackground1.jpg') center/cover no-repeat; min-height: 100vh;">
            <section class="card" style="max-width: 600px; width: 100%; margin: 48px auto 32px auto; text-align: center; background: rgba(255,255,255,0.97); box-shadow:0 8px 32px #1e5d2d22;">
                <h1 class="login-title" id="user-welcome" style="font-size:2.2em; color:#1e5d2d; font-family:'Ms Madi',cursive; margin-bottom: 18px;">Bienvenue !</h1>
                <div style="margin-bottom:18px;color:#1e5d2d;font-weight:bold;">Votre espace personnel</div>
                <div class="user-info" style="margin-bottom:18px;display:flex;flex-direction:column;gap:8px;align-items:center;">
                    <div style="background:#f5f5f5;border-radius:12px;padding:18px 24px;min-width:220px;max-width:320px;box-shadow:0 2px 8px #3bb54a22;">
                        <div><strong>Nom :</strong> <span id="user-lastname"></span></div>
                        <div><strong>Prénom :</strong> <span id="user-firstname"></span></div>
                        <div><strong>Email :</strong> <span id="user-email"></span></div>
                        <div><strong>Téléphone :</strong> <span id="user-telephone"></span></div>
                    </div>
                </div>
                <a href="/MyStadium/views/logout.php" class="btn-main" style="width:100%;margin-bottom:8px;">Se déconnecter</a>
                <script src="/MyStadium/public/js/app.js"></script>
                <script>
                chargerInfosUtilisateur = async function() {
                    const res = await fetch('/MyStadium/api/user.php', {credentials:'same-origin'});
                    const data = await res.json();
                    if(data.success) {
                        document.getElementById('user-welcome').textContent = 'Bienvenue, ' + (data.user.firstname || data.user.login) + ' !';
                        document.getElementById('user-lastname').textContent = data.user.lastname || '';
                        document.getElementById('user-firstname').textContent = data.user.firstname || '';
                        document.getElementById('user-email').textContent = data.user.email || '';
                        document.getElementById('user-telephone').textContent = data.user.telephone || '';
                    } else {
                        window.location.href = '/MyStadium/views/connexion.php';
                    }
                }
                chargerInfosUtilisateur();
                </script>
            </section>
        </div>
        <?php include(__DIR__ . "/footer.php")?>
</body>
</html>