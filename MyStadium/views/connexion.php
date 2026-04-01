<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/MyStadium/public/css/login.css"/>
  <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Connexion — MyStadium</title>
  <style>
    body {
      background-image: url('/MyStadium/public/img/loginposter.jpg');
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
      <h1 class="login-title">Connexion</h1>
      <?php
      session_start();
      if (isset($_SESSION["user"])) {
        header('Location: monespace.php');
        exit;
      }
      if (isset($_GET['msg'])) {
        $type = isset($_GET['type']) && $_GET['type'] === 'success' ? 'alert-success' : 'alert-error';
        echo '<div class="alert ' . $type . '">' . htmlspecialchars($_GET['msg']) . '</div>';
      }
      ?>
      <form method="POST" action="/MyStadium/controller/connexion.php" class="login-form">
        <div class="form-group">
          <input type="text" name="username" placeholder="Identifiant" class="input-field" autocomplete="username" required />
        </div>
        <div class="form-group">
          <input type="password" name="password" placeholder="Mot de passe" class="input-field" autocomplete="current-password" required />
        </div>
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(isset($_SESSION['csrf_token'])?$_SESSION['csrf_token']:''); ?>">
        <button type="submit" class="btn-main">Se connecter</button>
      </form>
      <div class="register-link">
        <span>Pas encore inscrit ?</span>
        <a href="inscription.php">Inscrivez-vous ici</a>
      </div>
    </div>
  </div>
  <?php include(__DIR__ . "/footer.php")?>
</body>
</html>
        </a>
        <a href="#" class="google btn"><i class="fa fa-google fa-fw">
          </i> Login with Google+
        </a>
      </div>

      <div class="col">
        <div class="hide-md-lg">
          <p>Or sign in manually:</p>
        </div>

    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(
      isset(
                
                
                
                
        $_SESSION['csrf_token']
      ) ? $_SESSION['csrf_token'] : '' ); ?>">
        <input type="submit" value="Login">
      </div>
      
    </div>
  </form>
</div>

  <div class="bottom-container">
  <div class="row">
    <div class="col">
      <a href="/views/inscription.php" style="color:white" class="btn">Sign up</a>
    </div>
    <div class="col">
      <a href="#" style="color:white" class="btn">Forgot password?</a>
    </div>
  </div>
</div>

<?php include("../views/footer.php")?>

</body>
</html>
