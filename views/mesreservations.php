<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Mes réservations — MyStadium</title>
</head>
<body>
<?php include(__DIR__ . "/header.php"); ?>
  <div class="login-bg" style="background: #111; min-height: 100vh; display: flex; flex-direction: column; align-items: center;">
    <section class="card" style="max-width: 900px; width: 100%; margin: 48px 0; text-align: center; background: #181818; color: #fff; box-shadow:0 8px 32px #0004; border-radius:18px;">
      <h1 class="login-title" style="font-size:2.2em; color:#3bb54a; font-family:'Montserrat',Arial,sans-serif; font-weight:900; text-transform:uppercase; margin-bottom: 18px;">Mes réservations</h1>
    <table id="mes-reservations-table" style="width:100%;margin-bottom:24px;"></table>
    <script src="/MyStadium/public/js/app.js"></script>
    <script>chargerMesReservations();</script>
  </section>
</div>
<?php include(__DIR__ . "/footer.php"); ?>
</body>
</html>