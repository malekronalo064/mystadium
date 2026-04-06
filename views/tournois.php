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
<div class="login-bg" style="background: #111 url('/MyStadium/public/img/backgroundaccueil.jpg') center/cover no-repeat; min-height: 100vh;">
  <section class="card" style="max-width: 900px; width: 100%; margin: 48px auto 32px auto; text-align: center; background: #181818; color: #fff; box-shadow:0 8px 32px #0004; border-radius:18px;">
    <h1 class="login-title" style="font-size:2.2em; color:#fff; font-family:'Montserrat',Arial,sans-serif; font-weight:900; text-transform:uppercase; margin-bottom: 18px;">Tournois à venir</h1>
    <ul style="list-style:none; padding:0; margin-bottom:18px;">
      <li style="margin-bottom:8px;"><strong>Tournoi 5v5 Printemps</strong> — <span style="color:#3bb54a;">12 mai 2026</span> <a href="#" class="btn-main" style="margin-left:12px;font-size:0.95em; background:#111; color:#3bb54a; border:2px solid #3bb54a; font-weight:900;">S'inscrire</a></li>
      <li><strong>Tournoi Nocturne</strong> — <span style="color:#3bb54a;">28 juin 2026</span> <a href="#" class="btn-main" style="margin-left:12px;font-size:0.95em; background:#111; color:#3bb54a; border:2px solid #3bb54a; font-weight:900;">S'inscrire</a></li>
    </ul>
    <h2 style="color:#3bb54a;font-size:1.3em;margin-bottom:12px;text-transform:uppercase;font-weight:900;">Proposer un tournoi</h2>
    <form style="max-width:400px;margin:0 auto;">
      <input type="text" placeholder="Nom du tournoi" required style="margin-bottom:8px;width:100%;padding:10px;border-radius:8px;border:1px solid #222;background:#181818;color:#fff;"/>
      <input type="date" required style="margin-bottom:8px;width:100%;padding:10px;border-radius:8px;border:1px solid #222;background:#181818;color:#fff;"/>
      <button class="btn-main" type="submit" style="background:#111;color:#3bb54a;border:2px solid #3bb54a;font-weight:900;">Proposer</button>
    </form>
    <a href="/MyStadium/views/index.php" class="btn-main" style="margin-top:18px;font-size:1.1em; background:#111; color:#3bb54a; border:2px solid #3bb54a; font-weight:900;">Retour à l'accueil</a>
  </section>
</div>
<?php include(__DIR__ . "/footer.php")?>
</body>
</html>
