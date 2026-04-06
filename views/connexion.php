<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
require_once __DIR__ . '/../bdd/helpers.php';
start_secure_session();
if (isset($_SESSION["user"])) {
  header('Location: /MyStadium/index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
  <link rel="stylesheet" href="/MyStadium/public/css/urban-login.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Connexion — MyStadium</title>
</head>
<body>
<?php include(__DIR__ . "/header.php")?>
<div class="urban-login-wrapper">
  <div class="urban-login-left">
    <div class="urban-login-form-card">
      <div class="urban-login-title">JE ME CONNECTE&nbsp;!</div>
      <?php
      if (isset($_SESSION["user"])) {
        echo '<div class="alert alert-info">Vous êtes déjà connecté. <a href="/MyStadium/views/logout.php">Déconnexion</a></div>';
      }
      if (function_exists('get_flash')) {
        $flash = get_flash();
        if ($flash) {
          $type = $flash['type'] === 'success' ? 'alert-success' : 'alert-error';
          echo '<div class="alert ' . $type . '">' . htmlspecialchars($flash['msg']) . '</div>';
        }
      }
      ?>
      <form id="login-form" class="urban-login-form" onsubmit="event.preventDefault(); login();">
        <div class="urban-form-group">
          <label for="login-username">ADRESSE E-MAIL&nbsp;*</label>
          <input type="text" id="login-username" class="urban-input" autocomplete="username" required />
        </div>
        <div class="urban-form-group" style="position:relative;">
          <label for="login-password">MOT DE PASSE&nbsp;*</label>
          <input type="password" id="login-password" class="urban-input" autocomplete="current-password" required />
          <button type="button" onclick="togglePassword('login-password', this)" class="urban-eye-btn" aria-label="Afficher le mot de passe">
            <i class="fa fa-eye" id="login-password-eye"></i>
          </button>
        </div>
        <button type="submit" class="urban-btn-main">CONNEXION</button>
      </form>
      <div id="login-feedback"></div>
      <div class="urban-login-links">
        <a href="#" class="urban-link-forgot">Mot de passe oublié&nbsp;?</a>
      </div>
    </div>
  </div>
  <div class="urban-login-right">
    <div class="urban-login-cta">
      <div class="urban-login-brand"><span class="urban-orange">MY</span>URBAN</div>
      <div class="urban-login-subtitle">TU N’AS PAS ENCORE DE COMPTE&nbsp;?</div>
      <a href="inscription.php" class="urban-btn-outline">CRÉER MON COMPTE</a>
    </div>
  </div>
</div>
<script>
function togglePassword(inputId, btn) {
  const input = document.getElementById(inputId);
  const eye = btn.querySelector('i');
  if (input.type === 'password') {
    input.type = 'text';
    eye.classList.remove('fa-eye');
    eye.classList.add('fa-eye-slash');
  } else {
    input.type = 'password';
    eye.classList.remove('fa-eye-slash');
    eye.classList.add('fa-eye');
  }
}
</script>
<script src="/MyStadium/public/js/app.js"></script>
<?php include(__DIR__ . "/footer.php")?>
</body>
</html>
</div>


