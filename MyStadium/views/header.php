
<header class="main-header">
  <div class="header-left">
    <a href="/MyStadium/index.php" class="logo-link">
      <img src="/MyStadium/public/img/logo.png" alt="MyStadium" class="logo-img" />
    </a>
    <h1 class="site-title">My Stadium</h1>
  </div>
  <nav class="main-nav">
    <a href="/MyStadium/views/connexion.php" class="nav-link">Login</a>
    <a href="/MyStadium/views/tournois.php" class="nav-link">Tournois</a>
    <a href="/MyStadium/views/store.php" class="nav-link">Store</a>
    <a href="/MyStadium/views/about.php" class="nav-link">About</a>
    <?php if (isset($_SESSION['user']) && ($_SESSION['user']['role'] ?? '') === 'admin'): ?>
      <a href="/MyStadium/views/admin.php" class="nav-link">Admin</a>
    <?php endif; ?>
  </nav>
  <button class="menu-toggle" aria-label="Ouvrir le menu" onclick="toggleMenu()">
    <i class="fa fa-bars"></i>
  </button>
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
  const nav = document.querySelector('.main-nav');
  nav.classList.toggle('nav-open');
}
</script>