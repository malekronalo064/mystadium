<div id="content">
            <h1>Se connecter</h1>
            <?php 
            session_start();
            require_once("../bdd/config.php"); 
            if(isset($_POST["login"])){
                $login = isset($_POST["login"]) ? trim($_POST["login"]) : "";
                $password = isset($_POST["password"]) ? $_POST["password"] : "";
                $valide = !empty($login) && !empty($password);
                if(!$valide){
                    echo "<p style='color:red'>Tous les champs sont obligatoires!</p>";
                } else if (strlen($login) > 255 || !preg_match('/^[A-Za-z0-9_.@-]+$/', $login)) {
                    echo "<p style='color:red'>Identifiant invalide !</p>";
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
                        echo "<p style='color:red'>Identifiants incorrects !</p>";
                    }
                }
            } else if(isset($_SESSION["user"])){
                header('Location: ../views/monespace.php');
                exit;
            }
            
            ?>
            <form method="POST" action="#">
                <input type="text" name="login" placeholder="login"/>
                <input type="password" name="password" placeholder="password"/>
                <input type="submit" value="Valider"/>
            <p class="box-register">Pas encore inscrit ? 
  <a href="inscription.php">Inscrivez-vous ici</a></p>

        </div>