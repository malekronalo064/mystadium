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
  <div class="login-bg" style="background: #111 url('/MyStadium/public/img/backgroundaccueil.jpg') center/cover no-repeat; min-height: 100vh;">
    <!-- HERO SECTION -->
    <section class="card" style="max-width: 900px; width: 100%; margin: 48px auto 32px auto; text-align: center; background: #111; color: #fff; box-shadow:0 8px 32px #0004; border-radius:18px;">
      <h1 style="font-size:3.2em; color:#fff; font-family:'Montserrat',Arial,sans-serif; font-weight:900; text-transform:uppercase; letter-spacing:2px; margin-bottom: 12px;">Merci au capi<br><span style='color:#3bb54a;'>pour l'orga</span></h1>
      <p style="font-size:1.25em; color:#fff; margin-bottom: 24px; font-weight:500;">Même en cas d'imprévus, ta part est offerte du 03 avril au 03 mai</p>
      <a href="#" class="btn-main" style="margin: 18px 0 0 0; font-size:1.25em; border:2px solid #3bb54a; background:#111; color:#3bb54a; font-weight:900; text-transform:uppercase; letter-spacing:2px;">En savoir plus</a>
      <div class="carousel" style="margin: 32px auto 0 auto; max-width: 600px;">
        <img src="/MyStadium/public/img/backgroundaccueil.jpg" alt="Terrains MyStadium" style="width:100%;max-width:600px;border-radius:18px;box-shadow:0 4px 24px #0004;object-fit:cover;"/>
        <div style="display:flex;justify-content:center;gap:8px;margin-top:8px;">
          <span style="width:12px;height:12px;background:#3bb54a;border-radius:50%;display:inline-block;"></span>
          <span style="width:12px;height:12px;background:#222;border-radius:50%;display:inline-block;"></span>
          <span style="width:12px;height:12px;background:#222;border-radius:50%;display:inline-block;"></span>
        </div>
      </div>
    </section>

    <!-- AVANTAGES SECTION -->
    <section class="card" style="max-width: 900px; width: 100%; margin: 0 auto 32px auto; text-align: center; background: #181818; color: #fff; box-shadow:0 8px 32px #0004; border-radius:18px;">
      <h2 style="color:#3bb54a; font-size:1.7em; margin-bottom: 16px; text-transform:uppercase; font-weight:900;">Pourquoi choisir MyStadium ?</h2>
      <div style="display:flex;flex-wrap:wrap;gap:32px;justify-content:center;align-items:stretch;">
        <div style="flex:1 1 220px;min-width:200px;max-width:260px;background:#222;border-radius:12px;padding:24px 12px;margin-bottom:12px;box-shadow:0 2px 8px #3bb54a22;">
          <i class="fa fa-calendar-check-o" style="font-size:2em;color:#3bb54a;margin-bottom:8px;"></i>
          <div style="font-weight:900;font-size:1.1em;margin-bottom:6px;text-transform:uppercase;">Réservation instantanée</div>
          <div style="color:#fff;">Choisissez votre créneau et réservez en temps réel, sans attente.</div>
        </div>
        <div style="flex:1 1 220px;min-width:200px;max-width:260px;background:#222;border-radius:12px;padding:24px 12px;margin-bottom:12px;box-shadow:0 2px 8px #3bb54a22;">
          <i class="fa fa-trophy" style="font-size:2em;color:#3bb54a;margin-bottom:8px;"></i>
          <div style="font-weight:900;font-size:1.1em;margin-bottom:6px;text-transform:uppercase;">Tournois exclusifs</div>
          <div style="color:#fff;">Participez à des événements et tournois premium toute l'année.</div>
        </div>
        <div style="flex:1 1 220px;min-width:200px;max-width:260px;background:#222;border-radius:12px;padding:24px 12px;margin-bottom:12px;box-shadow:0 2px 8px #3bb54a22;">
          <i class="fa fa-users" style="font-size:2em;color:#3bb54a;margin-bottom:8px;"></i>
          <div style="font-weight:900;font-size:1.1em;margin-bottom:6px;text-transform:uppercase;">Communauté passionnée</div>
          <div style="color:#fff;">Rejoignez une communauté conviviale et partagez votre passion du foot.</div>
        </div>
      </div>
    </section>

    <!-- PROCHAINS TOURNOIS SECTION -->
    <section class="card" style="max-width: 900px; width: 100%; margin: 0 auto 32px auto; text-align: center; background: #181818; color: #fff; box-shadow:0 8px 32px #0004; border-radius:18px;">
      <h2 style="color:#3bb54a; font-size:1.6em; margin-bottom: 16px; text-transform:uppercase; font-weight:900;">Prochains tournois</h2>
      <ul style="list-style:none; padding:0; margin-bottom:18px;">
        <li style="margin-bottom:8px;"><strong>Tournoi 5v5 Printemps</strong> — <span style="color:#3bb54a;">12 mai 2026</span> <a href="/MyStadium/views/tournois.php" class="btn-main" style="margin-left:12px;font-size:0.95em; background:#111; color:#3bb54a; border:2px solid #3bb54a; font-weight:900;">S'inscrire</a></li>
        <li><strong>Tournoi Nocturne</strong> — <span style="color:#3bb54a;">28 juin 2026</span> <a href="/MyStadium/views/tournois.php" class="btn-main" style="margin-left:12px;font-size:0.95em; background:#111; color:#3bb54a; border:2px solid #3bb54a; font-weight:900;">S'inscrire</a></li>
      </ul>
      <a href="/MyStadium/views/tournois.php" class="btn-main" style="font-size:1.1em; background:#111; color:#3bb54a; border:2px solid #3bb54a; font-weight:900;">Voir tous les tournois</a>
    </section>

    <!-- TÉMOIGNAGES SECTION -->
    <section class="card" style="max-width: 900px; width: 100%; margin: 0 auto 32px auto; text-align: center; background: #181818; color: #fff; box-shadow:0 8px 32px #0004; border-radius:18px;">
      <h2 style="color:#3bb54a; font-size:1.5em; margin-bottom: 16px; text-transform:uppercase; font-weight:900;">Ils ont testé MyStadium</h2>
      <div style="display:flex;flex-wrap:wrap;gap:32px;justify-content:center;align-items:stretch;">
        <div style="flex:1 1 220px;min-width:200px;max-width:320px;background:#222;border-radius:12px;padding:24px 18px;margin-bottom:12px;box-shadow:0 2px 8px #3bb54a22;">
          <i class="fa fa-star" style="color:#3bb54a;font-size:1.5em;margin-bottom:8px;"></i>
          <blockquote style="font-style:italic;color:#fff;">“Super facile de réserver, équipe sympa, je recommande !”</blockquote>
          <div style="margin-top:8px;font-weight:600;">Karim</div>
        </div>
        <div style="flex:1 1 220px;min-width:200px;max-width:320px;background:#222;border-radius:12px;padding:24px 18px;margin-bottom:12px;box-shadow:0 2px 8px #3bb54a22;">
          <i class="fa fa-star" style="color:#3bb54a;font-size:1.5em;margin-bottom:8px;"></i>
          <blockquote style="font-style:italic;color:#fff;">“Le calendrier interactif est top, plus de galère pour trouver un créneau.”</blockquote>
          <div style="margin-top:8px;font-weight:600;">Julie</div>
        </div>
        <div style="flex:1 1 220px;min-width:200px;max-width:320px;background:#222;border-radius:12px;padding:24px 18px;margin-bottom:12px;box-shadow:0 2px 8px #3bb54a22;">
          <i class="fa fa-star" style="color:#3bb54a;font-size:1.5em;margin-bottom:8px;"></i>
          <blockquote style="font-style:italic;color:#fff;">“Réservation rapide, terrains de qualité, ambiance au top !”</blockquote>
          <div style="margin-top:8px;font-weight:600;">Sophie</div>
        </div>
      </div>
    </section>

    <!-- CALL TO ACTION SECTION -->
    <section class="card" style="max-width: 900px; width: 100%; margin: 0 auto 48px auto; text-align: center; background: linear-gradient(90deg,#1e5d2d 60%,#3bb54a 100%); color:#fff; box-shadow:0 8px 32px #1e5d2d22;">
      <h2 style="font-size:1.5em; margin-bottom: 12px;">Prêt à jouer ?</h2>
      <p style="font-size:1.15em; margin-bottom: 18px;">Inscrivez-vous gratuitement et rejoignez la communauté MyStadium !</p>
      <a href="/MyStadium/views/inscription.php" class="btn-main" style="background:#fff;color:#1e5d2d;font-weight:700;font-size:1.1em;">Créer mon compte</a>
    </section>
  </div>
  <script src="/MyStadium/public/js/app.js"></script>
  <?php include(__DIR__ . "/footer.php")?>
</body>
</html>
