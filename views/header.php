<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<header class="main-header" style="position:sticky;top:0;z-index:1000;background:linear-gradient(90deg,#1e5d2d 60%,#3bb54a 100%);box-shadow:0 2px 12px #1e5d2d22;">
  <div class="header-content" style="display:flex;align-items:center;justify-content:space-between;max-width:1400px;margin:0 auto;padding:0 24px;min-height:72px;">
    <a href="/MyStadium/index.php" class="logo-link" style="display:flex;align-items:center;gap:12px;text-decoration:none;">
      <img src="/MyStadium/public/img/logo.png" alt="MyStadium" class="logo-img" style="height:54px;width:auto;filter:drop-shadow(0 2px 8px #fff8);"/>
      <span class="site-title" style="font-family:'Montserrat',Roboto,'Segoe UI',Arial,sans-serif;font-size:2em;font-weight:900;color:#fff;letter-spacing:1px;">MyStadium</span>
    </a>
    <nav class="main-nav" id="main-nav" style="display:flex;align-items:center;gap:24px;">
      <a href="/MyStadium/views/tournois.php" class="nav-link" style="color:#fff;font-weight:600;font-size:1.1em;transition:.2s;">Tournois</a>
      <a href="/MyStadium/views/store.php" class="nav-link" style="color:#fff;font-weight:600;font-size:1.1em;transition:.2s;">Boutique</a>
      <a href="/MyStadium/views/about.php" class="nav-link" style="color:#fff;font-weight:600;font-size:1.1em;transition:.2s;">À propos</a>
      <a href="/MyStadium/views/moncentre.php" class="nav-link" style="color:#fff;font-weight:600;font-size:1.1em;transition:.2s;">Mon centre</a>
      <a href="/MyStadium/views/reserver.php" class="btn-main" style="background:#fff;color:#1e5d2d;font-weight:700;font-size:1.1em;padding:8px 22px;border-radius:24px;box-shadow:0 2px 8px #3bb54a22;">Réserver</a>
      <?php if (isset($_SESSION['user'])): ?>
        <span class="nav-link" style="color:#ffd600;font-weight:bold;font-size:1.1em;">
          <i class="fa fa-user-circle" style="margin-right:4px;"></i> <?= htmlspecialchars($_SESSION['user']['firstname'] ?? $_SESSION['user']['login']) ?>
        </span>
        <a href="/MyStadium/views/logout.php" class="nav-link" style="color:#fff;font-weight:600;font-size:1.1em;">Déconnexion</a>
      <?php else: ?>
        <a href="/MyStadium/views/connexion.php" class="nav-link" style="color:#fff;font-weight:600;font-size:1.1em;">Connexion</a>
      <?php endif; ?>
      <?php if (isset($_SESSION['user']) && ($_SESSION['user']['role'] ?? '') === 'admin'): ?>
        <a href="/MyStadium/views/admin.php" class="nav-link" style="color:#ffd600;font-weight:700;font-size:1.1em;">Admin</a>
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
    .nav-link:hover, .btn-main:hover { filter:brightness(1.15); text-decoration:underline; }
  </style>
</header>

<?php if (function_exists('get_flash')) {
  $f = get_flash();
  if ($f) {
    $cls = $f['type'] === 'success' ? 'flash-success' : 'flash-error';
    echo '<div class="flash ".htmlspecialchars($cls)."">'.htmlspecialchars($f['message']).'</div>';
  }
}
?>

<script>
function toggleMenu() {
  const nav = document.getElementById('main-nav');
  nav.classList.toggle('nav-open');
}
</script>