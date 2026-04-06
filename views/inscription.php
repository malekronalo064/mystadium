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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Inscription — MyStadium</title>
</head>
<body>
<?php include(__DIR__ . "/header.php")?>
<div class="login-bg" style="background: #111 url('/MyStadium/public/img/signupbackground.jpg') center/cover no-repeat; min-height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
  <section class="card" style="max-width: 440px; width: 100%; margin: 48px 0; text-align: center; background: #181818; color: #fff; box-shadow:0 8px 32px #0004; border-radius:18px;">
    <h1 class="login-title" style="font-size:2.2em; color:#3bb54a; font-family:'Montserrat',Arial,sans-serif; font-weight:900; text-transform:uppercase; margin-bottom: 18px;">Inscription</h1>
    <?php
    if (function_exists('get_flash')) {
      $flash = get_flash();
      if ($flash) {
        $type = $flash['type'] === 'success' ? 'alert-success' : 'alert-error';
        echo '<div class="alert ' . $type . '">' . htmlspecialchars($flash['msg']) . '</div>';
      }
    }
    ?>
    <form id="register-form" class="login-form" onsubmit="event.preventDefault(); register();">
      <div class="form-group">
        <input type="text" id="reg-lastname" placeholder="Nom" class="input-field" required autocomplete="family-name" />
      </div>
      <div class="form-group">
        <input type="text" id="reg-firstname" placeholder="Prénom" class="input-field" required autocomplete="given-name" />
      </div>
      <div class="form-group">
        <input type="email" id="reg-email" placeholder="Email" class="input-field" required autocomplete="email" />
      </div>
      <div class="form-group">
        <input type="text" id="reg-telephone" placeholder="Téléphone" class="input-field" required autocomplete="tel" />
      </div>
      <div class="form-group">
        <input type="text" id="reg-login" placeholder="Identifiant" class="input-field" required autocomplete="username" />
      </div>
      <div class="form-group" style="position:relative;">
        <input type="password" id="reg-password" placeholder="Mot de passe" class="input-field" required autocomplete="new-password" />
        <button type="button" onclick="togglePassword('reg-password', this)" style="position:absolute; right:12px; top:50%; transform:translateY(-50%); background:none; border:none; cursor:pointer; color:#1e5d2d; font-size:1.2em;">
          <i class="fa fa-eye" id="reg-password-eye"></i>
        </button>
      </div>
      <button type="submit" class="btn-main">S'inscrire</button>
    </form>
    <div id="register-feedback"></div>
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
    async function register() {
      const data = {
        lastname: document.getElementById('reg-lastname').value,
        firstname: document.getElementById('reg-firstname').value,
        email: document.getElementById('reg-email').value,
        telephone: document.getElementById('reg-telephone').value,
        login: document.getElementById('reg-login').value,
        password: document.getElementById('reg-password').value
      };
      const res = await fetch('/MyStadium/api/register.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
      });
      const result = await res.json();
      const feedback = document.getElementById('register-feedback');
      if(result.success) {
        feedback.innerHTML = '<div class="alert alert-success">Inscription réussie ! Vous pouvez vous connecter.</div>';
        setTimeout(()=>window.location.href='/MyStadium/views/connexion.php', 1200);
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
        }
      }
      </script>
        </div>
        <button type="submit" class="btn-main">Valider</button>
      </form>
      <div class="register-link">
        <span>Déjà inscrit ?</span>
        <a href="connexion.php">Connectez-vous ici</a>
      </div>
    </div>
  </div>
  <?php include(__DIR__ . "/footer.php")?>
</body>
</html>