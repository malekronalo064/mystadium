<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
  <title>Accueil — MyStadium</title>
  <style>body{font-family:'Segoe UI','Roboto',Arial,sans-serif;}</style>
</head>
<body>
  <?php include(__DIR__ . "/header.php")?>
  <div class="login-bg" style="background: linear-gradient(135deg, #1e5d2d 0%, #3bb54a 100%), url('/MyStadium/public/img/backgroundaccueil.jpg') center/cover no-repeat; min-height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <div class="card" style="max-width: 680px; width: 100%; margin-top: 48px; margin-bottom: 32px; text-align: center; background: rgba(255,255,255,0.97);">
      <h1 class="login-title" style="font-size:2.5em; color:#1e5d2d; font-family:'Ms Madi',cursive; margin-bottom: 12px;">Bienvenue sur MyStadium</h1>
      <p style="font-size:1.25em; color:#222; margin-bottom: 24px;">Réservez votre terrain de foot en quelques clics, découvrez les créneaux disponibles en temps réel et vivez une expérience premium inspirée des meilleurs centres !</p>
      <a href="/MyStadium/views/reserver.php" class="btn-main" style="margin: 18px 0 0 0; font-size:1.25em;">⚽ Réserver un terrain</a>
      <div style="margin-top: 32px;">
        <img src="/MyStadium/public/img/backgroundaccueil.jpg" alt="Terrains MyStadium" style="width:100%;max-width:420px;border-radius:18px;box-shadow:0 4px 24px #1e5d2d22;object-fit:cover;"/>
      </div>
    </div>
    <div class="card" style="max-width: 680px; width: 100%; margin-bottom: 48px; text-align: center; background: rgba(255,255,255,0.97);">
      <h2 style="color:#1e5d2d; font-size:1.6em; margin-bottom: 16px;">Prochains tournois</h2>
      <ul style="list-style:none; padding:0; margin-bottom:18px;">
        <li style="margin-bottom:8px;"><strong>Tournoi 5v5 Printemps</strong> — <span style="color:#3bb54a;">12 mai 2026</span></li>
        <li><strong>Tournoi Nocturne</strong> — <span style="color:#3bb54a;">28 juin 2026</span></li>
      </ul>
      <a href="/MyStadium/views/tournois.php" class="btn-main" style="font-size:1.1em;">Voir tous les tournois</a>
    </div>
  </div>
  <script src="/MyStadium/public/js/app.js"></script>
</body>
</html>
