<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
session_start();
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Connexion — MyStadium</title>
</head>
<body>
<?php include(__DIR__ . "/header.php")?>
<div class="login-bg" style="background: #111 url('/MyStadium/public/img/loginposter.jpg') center/cover no-repeat; min-height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
  <section class="card" style="max-width: 420px; width: 100%; margin: 48px 0; text-align: center; background: #181818; color: #fff; box-shadow:0 8px 32px #0004; border-radius:18px;">
    <h1 class="login-title" style="font-size:2.2em; color:#3bb54a; font-family:'Montserrat',Arial,sans-serif; font-weight:900; text-transform:uppercase; margin-bottom: 18px;">Connexion</h1>
    <?php
    if (isset($_SESSION["user"])) {
      echo '<div class="alert alert-info" style="background: #e3f2fd; color: #1565c0; border: 1.5px solid #90caf9; padding: 12px 18px; border-radius: 8px; margin-bottom: 16px;">Vous êtes déjà connecté. <a href="/MyStadium/views/logout.php" style="color:#1565c0;text-decoration:underline;">Déconnexion</a></div>';
    }
    if (function_exists('get_flash')) {
      $flash = get_flash();
      if ($flash) {
        $type = $flash['type'] === 'success' ? 'alert-success' : 'alert-error';
        $color = $type === 'alert-success' ? '#1e5d2d' : '#c62828';
        $bg = $type === 'alert-success' ? '#e8f5e9' : '#ffebee';
        $border = $type === 'alert-success' ? '#3bb54a' : '#ffcdd2';
        echo '<div class="alert ' . $type . '" style="background:'.$bg.';color:'.$color.';border:1.5px solid '.$border.';padding:12px 18px;border-radius:8px;margin-bottom:16px;">' . htmlspecialchars($flash['msg']) . '</div>';
      }
    }
    ?>
    <form id="login-form" class="login-form" onsubmit="event.preventDefault(); login();">
      <div class="form-group">
        <input type="text" id="login-username" placeholder="Identifiant" class="input-field" autocomplete="username" required />
      </div>
      <div class="form-group" style="position:relative;">
        <input type="password" id="login-password" placeholder="Mot de passe" class="input-field" autocomplete="current-password" required />
        <button type="button" onclick="togglePassword('login-password', this)" style="position:absolute; right:12px; top:50%; transform:translateY(-50%); background:none; border:none; cursor:pointer; color:#1e5d2d; font-size:1.2em;">
          <i class="fa fa-eye" id="login-password-eye"></i>
        </button>
      </div>
      <button type="submit" class="btn-main">Se connecter</button>
    </form>
    <div id="login-feedback"></div>
    <div class="register-link" style="margin-top:18px;">
      <span>Pas encore inscrit ?</span>
      <a href="inscription.php">Inscrivez-vous ici</a>
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
    async function login() {
      const username = document.getElementById('login-username').value;
      const password = document.getElementById('login-password').value;
      const res = await fetch('/MyStadium/api/login.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({login: username, password}),
        credentials: 'same-origin'
      });
      const result = await res.json();
      const feedback = document.getElementById('login-feedback');
      if(result.success) {
        feedback.innerHTML = '<div class="alert alert-success">Connexion réussie ! Redirection...</div>';
        window.location.replace('/MyStadium/views/monespace.php');
      } else {
        feedback.innerHTML = '<div class="alert alert-error">'+result.message+'</div>';
      }
    }
    </script>
  </section>
</div>
<?php include(__DIR__ . "/footer.php")?>
</body>
</html>
</div>


