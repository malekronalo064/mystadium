<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/MyStadium/public/css/login.css"/>
<link rel="stylesheet" href="/MyStadium/public/css/header.css"/>
<link rel="stylesheet" href="/MyStadium/public/css/footer.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

</style>

</head>

<body>
<style>
body {    
  background-image: linear-gradient(rgba(0,0,0,0.70), rgba(0,0,0,0.70)),url('/MyStadium/public/img/loginposter.jpg');
  background-size: cover;
  background-position: center;  
}  
</style>

<?php include("/xampp/htdocs/MyStadium/views/header.php")?>




<div class="container">
  <form action="../controller/connexion.php" method="POST">
    <div class="row">

        <input type="text" name="username" placeholder="Login" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Se connecter">
        <a href="../views/inscription.php" class="login btn">
          <i class="fa fa-sign-in"></i> S'inscrire
        </a>
      </div>
      
    </div>
  </form>
</div>


<?php include("../views/footer.php")?>

</body>
</html>
