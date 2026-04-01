<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/MyStadium/public/css/login.css"/>
  <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
  <link rel="stylesheet" href="/MyStadium/public/css/inscription.css"/>
  <title>Inscription — MyStadium</title>
  <style>
    body {
      background-image: url('/MyStadium/public/img/signupbackground.jpg');
      background-size: cover;
      background-position: center;
      min-height: 100vh;
    }
  </style>
</head>
<body>
  <?php include(__DIR__ . "/header.php")?>
  <div class="login-bg">
    <div class="login-card">
      <h1 class="login-title">Inscription</h1>
      <?php
      session_start();
      if (isset($_GET['msg'])) {
        $type = isset($_GET['type']) && $_GET['type'] === 'success' ? 'alert-success' : 'alert-error';
        echo '<div class="alert ' . $type . '">' . htmlspecialchars($_GET['msg']) . '</div>';
      }
      ?>
      <form method="POST" action="/MyStadium/controller/inscription.php" class="login-form">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(isset($_SESSION['csrf_token'])?$_SESSION['csrf_token']:''); ?>">
        <div class="form-group">
          <input type="text" name="lastname" placeholder="Nom" class="input-field" required />
        </div>
        <div class="form-group">
          <input type="text" name="firstname" placeholder="Prénom" class="input-field" required />
        </div>
        <div class="form-group">
          <input type="email" name="email" placeholder="Email" class="input-field" required />
        </div>
        <div class="form-group">
          <input type="text" name="telephone" placeholder="Téléphone" class="input-field" required />
        </div>
        <div class="form-group">
          <input type="text" name="login" placeholder="Identifiant" class="input-field" required />
        </div>
        <div class="form-group">
          <input type="password" name="password" placeholder="Mot de passe" class="input-field" required />
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