<!DOCTYPE html>
<html>
  <head>
    <title>RESERVATION PAGE</title>
    <link href="/public/css/reserver.css" rel="stylesheet">

  </head>
  <body>
    <?php
    // (A) PROCESS RESERVATION
    if (isset($_POST["date"])) {
      require "../controller/reserver.php";
      if ($_RSV->save(
        $_POST["date"], $_POST["slot"], $_POST["name"],
        $_POST["email"], $_POST["tel"])) {
        echo "<div class='ok'>Reservation faite</div>";
      } else { echo "<div class='err'>".$_RSV->error."</div>"; }
    }
    ?>

    <!-- (B) RESERVATION FORM -->
    <h1>RESERVATION</h1>
    <form id="resForm" method="post" target="_self">
      <label for="res_name">Name</label>
      <input type="text" required name="name" value="Malek"/>

      <label for="res_email">Email</label>
      <input type="email" required name="email" value="Malek@123.com"/>

      <label for="res_tel">Telephone Number</label>
      <input type="text" required name="tel" value="123456789"/>

      

      <?php


      // @TODO - MINIMUM DATE (TODAY)
      // $mindate = date("Y-m-d", strtotime("+2 days"));

      $mindate = date("Y-m-d");
      ?>
      <label>Reservation Date</label>
      <input type="date" required id="res_date" name="date"
             min="<?=$mindate?>">

      <label>Choix de terrain</label>
      <select name="slot">
        <option value="TERRAIN-1">TERRAIN-1</option>
        <option value="TERRAIN-2">TERRAIN-2</option>
        <option value="TERRAIN-3">TERRAIN-3</option>
        <option value="TERRAIN-4">TERRAIN-4</option>
        <option value="TERRAIN-5">TERRAIN-5</option>
        <option value="TERRAIN-6">TERRAIN-6</option>
      </select>

      <input type="submit" value="Submit"/>
    </form>
  </body>
</html>
