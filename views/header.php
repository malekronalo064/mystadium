<div class="navbar">
        <img src="/MyStadium/public/img/logo.png" class="logo" >
             <div id="topHead">
        <h1 style="font-family: Abril fatface, sans-serif;">My Stadium</h1>
            </div>



             <ul>
                 <li><a href="/MyStadium/index.php">Home</a></li>
                 <?php
                session_start();
                if(isset($_SESSION['user'])){
                ?>
                <li><a href="/MyStadium/views/mesreservations.php">Réservations</a></li>
                <li><a href="/MyStadium/views/logout.php" class="active">Déconnexion</a></li>
                <?php
                    
                } else {
                ?>
                <li><a href="/MyStadium/views/connexion.php" class="inactive">Se Connecter</a></li>
                <?php
                }
                ?>               
                 <li><a href="/MyStadium/views/store.php">Store</a></li>
                 <li><a href="/MyStadium/views/about.php">About</a></li>

             </ul>
</div>

