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
  <div class="login-bg" style="background: linear-gradient(135deg, #1e5d2d 0%, #3bb54a 100%), url('/MyStadium/public/img/backgroundaccueil.jpg') center/cover no-repeat; min-height: 100vh;">
    <!-- HERO SECTION -->
    <section class="card" style="max-width: 900px; width: 100%; margin: 48px auto 32px auto; text-align: center; background: rgba(255,255,255,0.97); box-shadow:0 8px 32px #1e5d2d22;">
      <h1 class="login-title" style="font-size:2.7em; color:#1e5d2d; font-family:'Ms Madi',cursive; margin-bottom: 12px;">Bienvenue sur MyStadium</h1>
      <p style="font-size:1.3em; color:#222; margin-bottom: 24px;">Réservez votre terrain de foot en quelques clics, découvrez les créneaux disponibles en temps réel et vivez une expérience premium inspirée des meilleurs centres !</p>
      <a href="/MyStadium/views/reserver.php" class="btn-main" style="margin: 18px 0 0 0; font-size:1.25em;">⚽ Réserver un terrain</a>
      <div class="carousel" style="margin: 32px auto 0 auto; max-width: 600px;">
        <img src="/MyStadium/public/img/backgroundaccueil.jpg" alt="Terrains MyStadium" style="width:100%;max-width:600px;border-radius:18px;box-shadow:0 4px 24px #1e5d2d22;object-fit:cover;"/>
        <div style="display:flex;justify-content:center;gap:8px;margin-top:8px;">
          <span style="width:12px;height:12px;background:#3bb54a;border-radius:50%;display:inline-block;"></span>
          <span style="width:12px;height:12px;background:#c8e6c9;border-radius:50%;display:inline-block;"></span>
          <span style="width:12px;height:12px;background:#c8e6c9;border-radius:50%;display:inline-block;"></span>
        </div>
      </div>
    </section>

    <!-- AVANTAGES SECTION -->
    <section class="card" style="max-width: 900px; width: 100%; margin: 0 auto 32px auto; text-align: center; background: rgba(255,255,255,0.97); box-shadow:0 8px 32px #1e5d2d22;">
      <h2 style="color:#1e5d2d; font-size:1.7em; margin-bottom: 16px;">Pourquoi choisir MyStadium ?</h2>
      <div style="display:flex;flex-wrap:wrap;gap:32px;justify-content:center;align-items:stretch;">
        <div style="flex:1 1 220px;min-width:200px;max-width:260px;background:#f5f5f5;border-radius:12px;padding:24px 12px;margin-bottom:12px;box-shadow:0 2px 8px #3bb54a22;">
          <i class="fa fa-calendar-check-o" style="font-size:2em;color:#3bb54a;margin-bottom:8px;"></i>
          <div style="font-weight:700;font-size:1.1em;margin-bottom:6px;">Réservation instantanée</div>
          <div style="color:#444;">Choisissez votre créneau et réservez en temps réel, sans attente.</div>
        </div>
        <div style="flex:1 1 220px;min-width:200px;max-width:260px;background:#f5f5f5;border-radius:12px;padding:24px 12px;margin-bottom:12px;box-shadow:0 2px 8px #3bb54a22;">
          <i class="fa fa-trophy" style="font-size:2em;color:#3bb54a;margin-bottom:8px;"></i>
          <div style="font-weight:700;font-size:1.1em;margin-bottom:6px;">Tournois exclusifs</div>
          <div style="color:#444;">Participez à des événements et tournois premium toute l'année.</div>
        </div>
        <div style="flex:1 1 220px;min-width:200px;max-width:260px;background:#f5f5f5;border-radius:12px;padding:24px 12px;margin-bottom:12px;box-shadow:0 2px 8px #3bb54a22;">
          <i class="fa fa-users" style="font-size:2em;color:#3bb54a;margin-bottom:8px;"></i>
          <div style="font-weight:700;font-size:1.1em;margin-bottom:6px;">Communauté passionnée</div>
          <div style="color:#444;">Rejoignez une communauté conviviale et partagez votre passion du foot.</div>
        </div>
      </div>
    </section>

    <!-- PROCHAINS TOURNOIS SECTION -->
    <section class="card" style="max-width: 900px; width: 100%; margin: 0 auto 32px auto; text-align: center; background: rgba(255,255,255,0.97); box-shadow:0 8px 32px #1e5d2d22;">
      <h2 style="color:#1e5d2d; font-size:1.6em; margin-bottom: 16px;">Prochains tournois</h2>
      <ul style="list-style:none; padding:0; margin-bottom:18px;">
        <li style="margin-bottom:8px;"><strong>Tournoi 5v5 Printemps</strong> — <span style="color:#3bb54a;">12 mai 2026</span> <a href="/MyStadium/views/tournois.php" class="btn-main" style="margin-left:12px;font-size:0.95em;">S'inscrire</a></li>
        <li><strong>Tournoi Nocturne</strong> — <span style="color:#3bb54a;">28 juin 2026</span> <a href="/MyStadium/views/tournois.php" class="btn-main" style="margin-left:12px;font-size:0.95em;">S'inscrire</a></li>
      </ul>
      <a href="/MyStadium/views/tournois.php" class="btn-main" style="font-size:1.1em;">Voir tous les tournois</a>
    </section>

    <!-- TÉMOIGNAGES SECTION -->
    <section class="card" style="max-width: 900px; width: 100%; margin: 0 auto 32px auto; text-align: center; background: rgba(255,255,255,0.97); box-shadow:0 8px 32px #1e5d2d22;">
      <h2 style="color:#1e5d2d; font-size:1.5em; margin-bottom: 16px;">Ils ont testé MyStadium</h2>
      <div style="display:flex;flex-wrap:wrap;gap:32px;justify-content:center;align-items:stretch;">
        <div style="flex:1 1 220px;min-width:200px;max-width:320px;background:#f5f5f5;border-radius:12px;padding:24px 18px;margin-bottom:12px;box-shadow:0 2px 8px #3bb54a22;">
          <i class="fa fa-star" style="color:#ffd600;font-size:1.5em;margin-bottom:8px;"></i>
          <blockquote style="font-style:italic;color:#222;">“Super facile de réserver, équipe sympa, je recommande !”</blockquote>
          <div style="margin-top:8px;font-weight:600;">Karim</div>
        </div>
        <div style="flex:1 1 220px;min-width:200px;max-width:320px;background:#f5f5f5;border-radius:12px;padding:24px 18px;margin-bottom:12px;box-shadow:0 2px 8px #3bb54a22;">
          <i class="fa fa-star" style="color:#ffd600;font-size:1.5em;margin-bottom:8px;"></i>
          <blockquote style="font-style:italic;color:#222;">“Le calendrier interactif est top, plus de galère pour trouver un créneau.”</blockquote>
          <div style="margin-top:8px;font-weight:600;">Julie</div>
        </div>
        <div style="flex:1 1 220px;min-width:200px;max-width:320px;background:#f5f5f5;border-radius:12px;padding:24px 18px;margin-bottom:12px;box-shadow:0 2px 8px #3bb54a22;">
          <i class="fa fa-star" style="color:#ffd600;font-size:1.5em;margin-bottom:8px;"></i>
          <blockquote style="font-style:italic;color:#222;">“Réservation rapide, terrains de qualité, ambiance au top !”</blockquote>
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
</body>
</html>
