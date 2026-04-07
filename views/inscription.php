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
  <link rel="stylesheet" href="/MyStadium/public/css/inscription-modern.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Inscription — MyStadium</title>
</head>
<body>
<?php include(__DIR__ . "/header.php")?>
<div class="insc-wrapper">
  <div class="insc-left">
    <img src="/MyStadium/public/img/signupbackground1.jpg" alt="Visuel inscription" class="insc-img" />
    <div class="insc-caption">Rejoignez MyStadium et vivez l'expérience football premium.<br>Créez votre compte en quelques secondes !</div>
  </div>
  <div class="insc-right">
    <div class="insc-title">Créer un compte</div>
    <div class="insc-subtitle">Déjà inscrit ? <a href="connexion.php" style="color:#3bb54a;text-decoration:underline;">Se connecter</a></div>
    <form id="register-form" class="insc-form" autocomplete="off" onsubmit="event.preventDefault(); register();">
      <div class="insc-form-row">
        <div class="field-group" style="flex:1;">
          <label for="reg-firstname">Prénom</label>
          <input type="text" id="reg-firstname" required autocomplete="given-name" />
          <div class="field-error" id="err-reg-firstname"></div>
        </div>
        <div class="field-group" style="flex:1;">
          <label for="reg-lastname">Nom</label>
          <input type="text" id="reg-lastname" required autocomplete="family-name" />
          <div class="field-error" id="err-reg-lastname"></div>
        </div>
      </div>
      <div class="field-group">
        <label for="reg-email">Email</label>
        <input type="email" id="reg-email" required autocomplete="email" />
        <div class="field-error" id="err-reg-email"></div>
      </div>
      <div class="field-group">
        <label for="reg-telephone">Téléphone</label>
        <input type="text" id="reg-telephone" required autocomplete="tel" />
        <div class="field-error" id="err-reg-telephone"></div>
      </div>
      <div class="field-group">
        <label for="reg-login">Identifiant</label>
        <input type="text" id="reg-login" required autocomplete="username" />
        <div class="field-error" id="err-reg-login"></div>
      </div>
      <div class="field-group">
        <label for="reg-password">Mot de passe</label>
        <input type="password" id="reg-password" required autocomplete="new-password" />
        <button type="button" class="insc-eye-btn" tabindex="-1" onclick="togglePassword('reg-password', this)"><i class="fa fa-eye"></i></button>
        <div class="field-error" id="err-reg-password"></div>
      </div>
      <button type="submit" class="insc-btn-main">Créer mon compte</button>
      <div id="register-feedback"></div>
      <div style="margin-top:10px;color:#bbb;font-size:0.93em;">Le mot de passe doit contenir au moins 10 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.</div>
    </form>
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
async function register() {
  // Reset erreurs
  ['reg-firstname','reg-lastname','reg-email','reg-telephone','reg-login','reg-password'].forEach(id => {
    document.getElementById(id).classList.remove('error');
    document.getElementById('err-'+id).textContent = '';
  });
  const firstname = document.getElementById('reg-firstname').value.trim();
  const lastname = document.getElementById('reg-lastname').value.trim();
  const email = document.getElementById('reg-email').value.trim();
  const telephone = document.getElementById('reg-telephone').value.trim();
  const login = document.getElementById('reg-login').value.trim();
  const password = document.getElementById('reg-password').value;
  let hasError = false;
  if (!firstname) { document.getElementById('reg-firstname').classList.add('error'); document.getElementById('err-reg-firstname').textContent = 'Champ obligatoire.'; hasError = true; }
  if (!lastname) { document.getElementById('reg-lastname').classList.add('error'); document.getElementById('err-reg-lastname').textContent = 'Champ obligatoire.'; hasError = true; }
  if (!email || !/^\S+@\S+\.\S+$/.test(email)) { document.getElementById('reg-email').classList.add('error'); document.getElementById('err-reg-email').textContent = 'Email invalide.'; hasError = true; }
  if (!telephone) { document.getElementById('reg-telephone').classList.add('error'); document.getElementById('err-reg-telephone').textContent = 'Champ obligatoire.'; hasError = true; }
  if (!login) { document.getElementById('reg-login').classList.add('error'); document.getElementById('err-reg-login').textContent = 'Champ obligatoire.'; hasError = true; }
  if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\d]).{10,}$/.test(password)) {
    document.getElementById('reg-password').classList.add('error');
    document.getElementById('err-reg-password').textContent = 'Mot de passe trop faible.';
    hasError = true;
  }
  if (hasError) return;
  const feedback = document.getElementById('register-feedback');
  feedback.innerHTML = '';
  try {
    const res = await fetch('/MyStadium/api/register.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({firstname, lastname, email, telephone, login, password}),
      credentials: 'same-origin'
    });
    const data = await res.json();
    if (data.success) {
      feedback.innerHTML = '<div class="insc-alert insc-alert-success">Inscription réussie ! Vous pouvez vous connecter.</div>';
      document.getElementById('register-form').reset();
    } else {
      feedback.innerHTML = '<div class="insc-alert">'+data.message+'</div>';
    }
  } catch (err) {
    feedback.innerHTML = '<div class="insc-alert">Erreur réseau.</div>';
  }
}
// ...existing code...
        <a href="connexion.php">Connectez-vous ici</a>
      </div>
    </div>
  </div>
  <?php include(__DIR__ . "/footer.php")?>
</body>
</html>