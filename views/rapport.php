<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/MyStadium/public/css/footer.css"/>
  <link rel="stylesheet" href="/MyStadium/public/css/header.css"/>
  <title>MyStadium - Rapport</title>
</head>
<body>
  <?php include("/MyStadium/views/header.php"); ?>
  <div class="content">
    <h1>Rapport</h1>
    <p>Contenu du rapport à venir...</p>
  </div>
  <?php include("/MyStadium/views/footer.php"); ?>
</body>
</html>
<?php
// (A) GET ALL RESERVATIONS
require "../controller/reserver.php";
$all = $_RSV->getDay();

// (B) OUTPUT CSV
header("Content-Type: text/csv");
header("Content-Disposition: attachment;filename=reservation.csv");
if (count($all)==0) { echo "No reservations"; }
else {
  // (B1) FIRST ROW - HEADERS
  foreach ($all[0] as $k=>$v) { echo "$k,"; }
  echo "\r\n";

  // (B2) RESERVATION DETAILS
  foreach ($all as $r) {
    foreach ($r as $k=>$v) { echo "$v,"; }
    echo "\r\n";
  }
}
