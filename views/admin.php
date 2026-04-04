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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Admin — MyStadium</title>
</head>
<body>
<?php include(__DIR__ . "/header.php")?>
<div class="login-bg" style="background: linear-gradient(135deg, #1e5d2d 0%, #3bb54a 100%); min-height: 100vh; display: flex; flex-direction: column; align-items: center;">
  <section class="card" style="max-width:900px;width:100%;margin:48px 0;text-align:center;background:rgba(255,255,255,0.97);box-shadow:0 8px 32px #1e5d2d22;">
    <h1 class="login-title" style="font-size:2.2em;color:#1e5d2d;font-family:'Ms Madi',cursive;margin-bottom:18px;">Espace Administration</h1>
    <h2 style="color:#1e5d2d;font-size:1.3em;margin-bottom:12px;">Réservations</h2>
    <table id="admin-reservations-table" style="width:100%;margin-bottom:24px;"></table>
    <h2 style="color:#1e5d2d;font-size:1.3em;margin-bottom:12px;">Utilisateurs</h2>
    <table id="admin-users-table" style="width:100%;"></table>
    <script src="/MyStadium/public/js/app.js"></script>
    <script>
    async function chargerAdmin() {
      const res = await fetch('/MyStadium/api/admin.php', {credentials:'same-origin'});
      const data = await res.json();
      if(data.success) {
        // Réservations
        const rTable = document.getElementById('admin-reservations-table');
        rTable.innerHTML = '<tr><th>Date</th><th>Terrain</th><th>Nom</th><th>Email</th><th>Téléphone</th></tr>';
        data.reservations.forEach(r => {
          rTable.innerHTML += `<tr><td>${r.res_date}</td><td>${r.terrain_id||r.res_slot||''}</td><td>${r.res_name||''}</td><td>${r.res_email||''}</td><td>${r.res_tel||''}</td></tr>`;
        });
        // Utilisateurs
        const uTable = document.getElementById('admin-users-table');
        uTable.innerHTML = '<tr><th>Login</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Rôle</th></tr>';
        data.users.forEach(u => {
          uTable.innerHTML += `<tr><td>${u.login||''}</td><td>${u.lastname||''}</td><td>${u.firstname||''}</td><td>${u.email||''}</td><td>${u.role||'user'}</td></tr>`;
        });
      } else {
        alert('Accès refusé');
        window.location.href = '/MyStadium/views/connexion.php';
      }
    }
    chargerAdmin();
    </script>
  </section>
</div>
<?php include(__DIR__ . "/footer.php")?>
</body>
</html>
