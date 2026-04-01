<!DOCTYPE html>
<html>


<head>
    <title>MyStadium</title>
    <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
    <link rel="stylesheet" href="/MyStadium/public/css/header.css"/>
    <link rel="stylesheet" href="/MyStadium/public/css/footer.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap"/>


</head>



<body>



     <div class="banner">
    <?php include("/xampp/htdocs/MyStadium/views/header.php")?>

         <div class="content">
             <h1  style="font-family: Abril fatface, sans-serif;">A VOUS DE JOUER ! </h1>
             <p>Relevez les défis, organisez des événements avec vos équipes</br>
              et réserver votre terrain en quelques cliques seulement</p>
             <div class="btnContent">
                <a href="/MyStadium/views/moncentre.php" class="btnMain"><span></span>MON CENTRE</a>
                <a href="/MyStadium/views/reserver.php" class="btnMain"><span></span>RESERVER</a>
             </div>
         </div>
         

     </div>

    <?php include("/xampp/htdocs/MyStadium/views/footer.php")?>

</body>

</html>