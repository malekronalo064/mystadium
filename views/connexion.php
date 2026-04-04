<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <!DOCTYPE html>
  <html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/MyStadium/public/css/login.css"/>
    <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Connexion — MyStadium</title>
    <!-- Style global géré par index.css -->
  </head>
  <body>
    <?php include(__DIR__ . "/header.php")?>
    <div class="login-bg" style="background: linear-gradient(135deg, #1e5d2d 0%, #3bb54a 100%), url('/MyStadium/public/img/loginposter.jpg') center/cover no-repeat; min-height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
      <div class="card" style="max-width: 400px; width: 100%; margin: 48px 0; text-align: center; background: rgba(255,255,255,0.97);">
        <h1 class="login-title" style="font-size:2em; color:#1e5d2d; font-family:'Ms Madi',cursive; margin-bottom: 18px;">Connexion</h1>
        <?php
        session_start();
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
          <button type="submit" class="btn-main">Se connecter</button>
        </form>
        <div id="login-feedback"></div>
        <div class="register-link" style="margin-top:18px;">
          <span>Pas encore inscrit ?</span>
          <a href="inscription.php">Inscrivez-vous ici</a>
        </div>
        <script>
        async function login() {
          const username = document.getElementById('login-username').value;
          const password = document.getElementById('login-password').value;
          const res = await fetch('/MyStadium/api/login.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({login: username, password})
          });
          const result = await res.json();
          const feedback = document.getElementById('login-feedback');
          if(result.success) {
            feedback.innerHTML = '<div class="alert alert-success">Connexion réussie ! Redirection...</div>';
            setTimeout(()=>window.location.href='/MyStadium/views/monespace.php', 1000);
          } else {
            feedback.innerHTML = '<div class="alert alert-error">'+result.message+'</div>';
          }
        }
        </script>
      </div>
    </div>
    <?php include(__DIR__ . "/footer.php")?>
  </body>
  </html>
</div>


