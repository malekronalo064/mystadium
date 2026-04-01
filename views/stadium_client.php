<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/MyStadium/public/css/footer.css"/>
    <link rel="stylesheet" href="/MyStadium/public/css/header.css"/>
    <title>MyStadium - Espace Client</title>
</head>
<body>
    <?php include("/MyStadium/views/header.php"); ?>
    <div class="content">
        <h1>Espace Client</h1>
        <p>Bienvenue dans votre espace client.</p>
    </div>
    <?php include("/MyStadium/views/footer.php"); ?>
</body>
</html>
<div id="content">
            <h1>Se connecter</h1>
            <?php 
            session_start();
            require_once("../bdd/config.php"); 
            if(isset($_POST["login"])){
                $valide= !empty($_POST["login"]) &&
                         !empty($_POST["password"]);
                if(!$valide){
                    echo "<p style='color:red'>Tous les champs sont obligatoire!</p>";
                }else{
                    $sql = "select * from stadium_user where login='".$_POST['login']."'";
                    $stmt = $pdo->query($sql, PDO::FETCH_ASSOC);
                    $stmt->execute();
                    $result= $stmt->fetch();
                    $goodPassword= password_verify($_POST['password'], $result["password"]);
                    if(password_verify($_POST['password'], $result["password"])){
                        $_SESSION["user"]= $result;
                        header('Location: ../views/monespace.php');  
                    }else{
                        echo "<p>Identifiants incorrect!</p>";
                    }
                }
            }else if(isset($_SESSION["user"])){
                header('Location: ../views/monespace.php'); 
            }
            
            ?>
            <form method="POST" action="#">
                <input type="text" name="login" placeholder="login"/>
                <input type="password" name="password" placeholder="password"/>
                <input type="submit" value="Valider"/>
            </form>
            <p class="box-register">Déjà inscrit? 
  <a href="inscription.php">Connectez-vous ici</a></p>
        </div>