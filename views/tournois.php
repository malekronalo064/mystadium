<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Tournois — MyStadium</title>
</head>
<body>
<?php include(__DIR__ . "/header.php")?>
<div class="login-bg" style="background: linear-gradient(135deg, #1e5d2d 0%, #3bb54a 100%), url('https://images.unsplash.com/photo-1518098268026-4e89f1a2cd8e?auto=format&fit=crop&w=1200&q=80') center/cover no-repeat; min-height: 100vh; display: flex; flex-direction: column; align-items: center;">
  <section class="card" style="max-width: 700px; width: 100%; margin: 48px 0; text-align: center; background: rgba(255,255,255,0.97); box-shadow:0 8px 32px #1e5d2d22;">
    <h1 class="login-title" style="font-size:2.2em; color:#1e5d2d; font-family:'Ms Madi',cursive; margin-bottom: 18px;">Tournois à venir</h1>
    <ul style="list-style:none; padding:0; margin-bottom:18px;">
      <li style="margin-bottom:8px;"><strong>Tournoi 5v5 Printemps</strong> — <span style="color:#3bb54a;">12 mai 2026</span> <button class="btn-main" style="margin-left:12px;">S'inscrire</button></li>
      <li><strong>Tournoi Nocturne</strong> — <span style="color:#3bb54a;">28 juin 2026</span> <button class="btn-main" style="margin-left:12px;">S'inscrire</button></li>
    </ul>
    <h2 style="color:#1e5d2d;font-size:1.3em;margin-bottom:12px;">Proposer un tournoi</h2>
    <form style="max-width:400px;margin:0 auto;">
      <input type="text" placeholder="Nom du tournoi" required style="margin-bottom:8px;width:100%;padding:10px;border-radius:8px;border:1px solid #ccc;"/>
      <input type="date" required style="margin-bottom:8px;width:100%;padding:10px;border-radius:8px;border:1px solid #ccc;"/>
      <button class="btn-main" type="submit">Proposer</button>
    </form>
    <a href="/MyStadium/views/index.php" class="btn-main" style="margin-top:18px;">Retour à l'accueil</a>
  </section>
</div>
<?php include(__DIR__ . "/footer.php")?>
</body>
</html>
