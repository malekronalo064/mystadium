<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/MyStadium/public/css/footer.css"/>
    <link rel="stylesheet" href="/MyStadium/public/css/header.css"/>
    <link rel="stylesheet" href="/MyStadium/public/css/inscription.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap"/>

    <title>MyStadium</title>
    
</head>



<body>
<?php  include("/xampp/htdocs/MyStadium/views/header.php") ?>

<?php
include('/xampp/htdocs/MyStadium/controller/inscription.php')

?>

<style>
        body {
    background-image: linear-gradient(rgba(0,0,0,0.60), rgba(0,0,0,0.60)),url('/MyStadium/public/img/signupbackground1.jpg');
    background-size:cover;
    background-position: center; 
        }
</style>

<body>
<div class="content">
                 
            <form method="POST" action="../controller/inscription.php" id="formInscription">
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

</html>
