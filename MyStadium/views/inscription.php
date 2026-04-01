<link rel="stylesheet" href="/MyStadium/public/css/inscription.css"/>
<style>
        body {
          background-image: url('/MyStadium/public/img/signupbackground.jpg');
        }
        </style>

<body>
<div class="content">
        <h1>Inscription</h1>
        <hr>
            
      <form method="POST" action="/MyStadium/controller/inscription.php" id="formInscription">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(isset($_SESSION['csrf_token'])?$_SESSION['csrf_token']:''); ?>">
                <input type="text" name="lastname" placeholder="Nom"/>
                <input type="text" name="firstname" placeholder="Prénom"/>
                <input type="text" name="email" placeholder="Email"/>
                <input type="text" name="telephone" placeholder="Téléphone"/>
                <input type="text" name="login" placeholder="login"/>
                <input type="password" name="password" placeholder="password"/>
                <input type="submit" class="valider" value="Valider"/>
               
            </form>
</div>
</body>