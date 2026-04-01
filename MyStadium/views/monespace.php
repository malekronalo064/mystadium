<div id="content">
            <h1>Mon espace</h1>
            <?php session_start();
            if(!isset($_SESSION["user"])){
                header('Location: /'); 
            }else if(isset($_GET["deconnexion"])){
                unset($_SESSION['user']);
                header('Location: /'); 
            }
        
            ?>
            <a href="?deconnexion=1">Se deconnecter</a>
        </div>