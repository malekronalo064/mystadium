<div class="login-bg">
  <div class="login-card">
    <h1 class="login-title">Se connecter</h1>
    <?php 
    session_start();
    require_once("../bdd/config.php"); 
    if(isset($_POST["login"])){
        $login = isset($_POST["login"]) ? trim($_POST["login"]) : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";
        $valide = !empty($login) && !empty($password);
        if(!$valide){
            echo "<div class='alert alert-error'>Tous les champs sont obligatoires !</div>";
        } else if (strlen($login) > 255 || !preg_match('/^[A-Za-z0-9_.@-]+$/', $login)) {
            echo "<div class='alert alert-error'>Identifiant invalide !</div>";
        } else {
            $sql = "SELECT * FROM stadium_user WHERE login = :login";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':login' => $login]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result && password_verify($password, $result["password"])){
                $_SESSION["user"] = $result;
                header('Location: ../views/monespace.php');
                exit;
            } else {
                echo "<div class='alert alert-error'>Identifiants incorrects !</div>";
            }
        }
    } else if(isset($_SESSION["user"])){
        header('Location: ../views/monespace.php');
        exit;
    }
    ?>
    <form method="POST" action="#" class="login-form">
      <div class="form-group">
        <input type="text" name="login" placeholder="Identifiant" class="input-field" autocomplete="username"/>
      </div>
      <div class="form-group">
        <input type="password" name="password" placeholder="Mot de passe" class="input-field" autocomplete="current-password"/>
      </div>
      <button type="submit" class="btn-main">Valider</button>
    </form>
    <div class="register-link">
      <span>Pas encore inscrit ?</span>
      <a href="inscription.php">Inscrivez-vous ici</a>
    </div>
  </div>
</div>