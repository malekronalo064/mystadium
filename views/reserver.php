<!DOCTYPE html>
<html>
  <head>
    <title>RESERVATION PAGE</title>
    <link rel="stylesheet" href="/MyStadium/public/css/reserver.css">
    <link rel="stylesheet" href="/MyStadium/public/css/header.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap"/>

  </head>

  <body>

  <style>
body {    
  background-image: linear-gradient(rgba(0,0,0,0.70), rgba(0,0,0,0.70)),url('/MyStadium/public/img/reservform.jpg');
  background-size: cover;
  background-position: center;  
}  
</style>
    
    <?php  include("../views/header.php") ?>

      <?php
      
      if (isset($_SESSION['user'])){

      } else {
        header('Location: ../views/connexion.php');  
      }
    
          // PROCESS RESERVATION
    if (isset($_POST["date_debut"])) {
      require "../controller/reserver.php";
      $terrain = $_RSV->select_terrain($_POST["date_debut"],  $_POST["heure_debut"], $_POST["duree_select"]);

      
      if(empty($terrain)){

       //cas pas de terrain disponible
       
       echo "<div class='err'> Pas de terrain disponible, veuillez changer d'horraire.</div>";
       
       //sinon dispo

      }else{
        
        if ($_RSV->save(
          $_POST["date_debut"], $_POST["duree_select"], $_POST["name"],
          $_POST["email"], $_POST["tel"], $terrain[0]["id"], $_POST["heure_debut"])) 
        {
          echo "<div class='ok'>Reservation faite sur: ". $terrain[0]["nom_terrain"]."</div>";
        } 
        else { echo "<div class='err'>".$_RSV->error."</div>"; }
      }
      
    }
    ?>

    <!-- RESERVATION FORM -->
    <h1 style="font-family: Abril fatface, sans-serif;
    margin-left:10%; color:#fff">RESERVATION</h1>

    <form id="resForm"  method="POST" target="_self">

   <!-- method="POST" action="../controller/inscription.php"-->

      <label for="res_name">Name</label>
      <input type="text" required name="name" value="<?php echo $_SESSION['user']['firstname'];?>"/>


      <label for="res_email">Email</label>
      <input type="email" required name="email" value="<?php echo $_SESSION['user']['email'];?>" id="email"/>


      <label for="res_tel">Telephone</label> 
      <input type="text" required name="tel" value="<?php echo $_SESSION['user']['telephone'];?>" id="telephone"/>
      

      <input  type="hidden" required name="statut" value="inprogress"/>

      

      <?php


      // MINIMUM DATE (TODAY)
      $mindate = date("Y-m-d");
      ?>


      <label>Date</label>
      <input type="date" required id="res_date_debut" name="date_debut"
             min="<?=$mindate?>">
             
      
      <label>Heure :</label>
      <select name='heure_debut' required id="res_heure_debut">
      <?php for ($i=8; $i<18;$i++){
        echo "<option value='$i'> $i h 00</option>";
      }?>
      </select>


      <label>Durée</label>
      

      <select name='duree_select'  
      min="<?=$mindate?>">
      <?php for ($i=1; $i<3;$i++){
        echo "<option value='$i'> $i h 00</option>";
      }?>
      </select>

      <input type="submit" value="Valider"/>
    </form>


  </body>
</html>
