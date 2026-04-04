<?php
// views/admin.php
session_start();
if (!isset($_SESSION['user']) || ($_SESSION['user']['role'] ?? '') !== 'admin') {
  unset($_SESSION['user']);
  session_destroy();
  header('Location: /MyStadium/views/connexion.php');
  exit;
}
require_once __DIR__ . '/../bdd/config.php';

// Récupérer les réservations
$stmt = $pdo->query('SELECT * FROM reservation ORDER BY res_date DESC');
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Récupérer les utilisateurs
$stmt2 = $pdo->query('SELECT * FROM stadium_user ORDER BY id DESC');
$users = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <title>Admin — MyStadium</title>
  <style>body { font-family: 'Roboto', 'Segoe UI', Arial, sans-serif; }</style>
</head>
<body>
<?php include(__DIR__ . "/header.php")?>
<div class="login-bg">
  <div class="login-card" style="max-width:900px;width:100%;">
    <h1 class="login-title">Espace Administration</h1>
    <h2>Réservations</h2>
    <table style="width:100%;margin-bottom:24px;">
      <tr><th>Date</th><th>Terrain</th><th>Nom</th><th>Email</th><th>Téléphone</th></tr>
      <?php foreach($reservations as $r): ?>
      <tr>
        <td><?=htmlspecialchars($r['res_date'])?></td>
        <td><?=htmlspecialchars($r['res_slot'])?></td>
        <td><?=htmlspecialchars($r['res_name'])?></td>
        <td><?=htmlspecialchars($r['res_email'])?></td>
        <td><?=htmlspecialchars($r['res_tel'])?></td>
      </tr>
      <?php endforeach; ?>
    </table>
    <h2>Utilisateurs</h2>
    <table style="width:100%;">
      <tr><th>Login</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Rôle</th></tr>
      <?php foreach($users as $u): ?>
      <tr>
        <td><?=htmlspecialchars($u['login'])?></td>
        <td><?=htmlspecialchars($u['lastname'])?></td>
        <td><?=htmlspecialchars($u['firstname'])?></td>
        <td><?=htmlspecialchars($u['email'])?></td>
        <td><?=htmlspecialchars($u['role'] ?? 'user')?></td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>
<?php include(__DIR__ . "/footer.php")?>
</body>
</html>
