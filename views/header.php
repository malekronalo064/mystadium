<?php
require_once __DIR__ . '/../bdd/helpers.php';
start_secure_session();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<header class="main-header" style="position:sticky;top:0;z-index:1000;background:#111;box-shadow:0 2px 12px #0002;min-height:48px;">
  <div class="header-content" style="display:flex;align-items:center;justify-content:space-between;max-width:1400px;margin:0 auto;padding:0 16px;min-height:48px;">
    <a href="/MyStadium/index.php" class="logo-link" style="display:flex;align-items:center;gap:8px;text-decoration:none;">
      <img src="/MyStadium/public/img/logo.png" alt="MyStadium" class="logo-img" style="height:32px;width:auto;filter:drop-shadow(0 2px 8px #3bb54a);"/>
      <span class="site-title" style="font-family:'Montserrat',Roboto,'Segoe UI',Arial,sans-serif;font-size:1.15em;font-weight:900;color:#fff;letter-spacing:1px;">MY<span style='color:#3bb54a;'>STADIUM</span></span>
    </a>
    <nav class="main-nav" id="main-nav" style="display:flex;align-items:center;gap:18px;">
      <a href="/MyStadium/views/moncentre.php" class="nav-link" style="color:#fff;font-family:'Montserrat',Arial,sans-serif;font-weight:900;font-size:0.98em;letter-spacing:1.2px;text-transform:uppercase;padding:0 6px;background:none;border:none;display:flex;flex-direction:column;align-items:center;">
        <i class="fa fa-map-marker" style="margin-bottom:2px;font-size:1.15em;color:#3bb54a;"></i>
        Mon centre
      </a>
      <a href="/MyStadium/views/tournois.php" class="nav-link" style="color:#fff;font-family:'Montserrat',Arial,sans-serif;font-weight:900;font-size:0.98em;letter-spacing:1.2px;text-transform:uppercase;padding:0 6px;background:none;border:none;display:flex;flex-direction:column;align-items:center;">
        <i class="fa fa-trophy" style="margin-bottom:2px;font-size:1.15em;color:#3bb54a;"></i>
        Tournois
      </a>
      <a href="/MyStadium/views/store.php" class="nav-link" style="color:#fff;font-family:'Montserrat',Arial,sans-serif;font-weight:900;font-size:0.98em;letter-spacing:1.2px;text-transform:uppercase;padding:0 6px;background:none;border:none;display:flex;flex-direction:column;align-items:center;">
        <i class="fa fa-shopping-bag" style="margin-bottom:2px;font-size:1.15em;color:#3bb54a;"></i>
        Boutique
      </a>
      <a href="/MyStadium/views/about.php" class="nav-link" style="color:#fff;font-family:'Montserrat',Arial,sans-serif;font-weight:900;font-size:0.98em;letter-spacing:1.2px;text-transform:uppercase;padding:0 6px;background:none;border:none;display:flex;flex-direction:column;align-items:center;">
        <i class="fa fa-info-circle" style="margin-bottom:2px;font-size:1.15em;color:#3bb54a;"></i>
        À propos
      </a>
      <a href="/MyStadium/views/reserver.php" class="nav-link" style="color:#3bb54a;font-family:'Montserrat',Arial,sans-serif;font-weight:900;font-size:0.98em;letter-spacing:1.2px;text-transform:uppercase;padding:0 6px;background:none;border:none;display:flex;flex-direction:column;align-items:center;">
        <i class="fa fa-bookmark" style="margin-bottom:2px;font-size:1.15em;color:#3bb54a;"></i>
        Réserver
      </a>
      <?php if (isset($_SESSION['user'])): ?>
        <a href="/MyStadium/views/logout.php" class="nav-link" style="color:#fff;font-family:'Montserrat',Arial,sans-serif;font-weight:900;font-size:0.98em;letter-spacing:1.2px;text-transform:uppercase;padding:0 6px;background:none;border:none;display:flex;flex-direction:column;align-items:center;">
          <i class="fa fa-sign-out" style="margin-bottom:2px;font-size:1.15em;color:#3bb54a;"></i>
          Déconnexion
        </a>
      <?php else: ?>
        <a href="/MyStadium/views/connexion.php" class="nav-link" style="color:#fff;font-family:'Montserrat',Arial,sans-serif;font-weight:900;font-size:0.98em;letter-spacing:1.2px;text-transform:uppercase;padding:0 6px;background:none;border:none;display:flex;flex-direction:column;align-items:center;">
          <i class="fa fa-sign-in" style="margin-bottom:2px;font-size:1.15em;color:#3bb54a;"></i>
          Connexion
        </a>
      <?php endif; ?>
    </nav>
    <button class="menu-toggle" aria-label="Ouvrir le menu" onclick="toggleMenu()" style="background:none;border:none;color:#fff;font-size:2em;display:none;">
      <i class="fa fa-bars"></i>
    </button>
  </div>
  <style>
    @media (max-width: 900px) {
      .main-nav { display:none !important; position:absolute;top:72px;left:0;width:100vw;background:#1e5d2d;flex-direction:column;gap:0;box-shadow:0 8px 32px #1e5d2d22; }
      .main-nav.nav-open { display:flex !important; }
      .menu-toggle { display:block !important; }
    }
    .nav-link:hover, .btn-main:hover { color:#3bb54a !important; text-decoration:none; filter:none; }
  </style>
</header>

<script>
function toggleMenu() {
  const nav = document.getElementById('main-nav');
  nav.classList.toggle('nav-open');
}
</script>