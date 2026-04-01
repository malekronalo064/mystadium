<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/MyStadium/public/css/login.css"/>
  <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
  <link rel="stylesheet" href="/MyStadium/public/css/reserver.css"/>
  <title>Réserver un terrain — MyStadium</title>
  <style>
    body {
      background: linear-gradient(135deg, #1e5d2d 0%, #3bb54a 100%);
      min-height: 100vh;
    }
  </style>
</head>
<body>
  <?php include(__DIR__ . "/header.php")?>
  <div class="login-bg">
    <div class="login-card" style="max-width: 420px;">
      <h1 class="login-title">Réserver un terrain</h1>
      <?php
      // (A) PROCESS RESERVATION
      $showSuccess = false;
      if (isset($_POST["date"])) {
        require "../controller/reserver.php";
        if ($_RSV->save(
          $_POST["date"], $_POST["slot"], $_POST["name"],
          $_POST["email"], $_POST["tel"])) {
          require_once __DIR__ . '/../utils/mail.php';
          require_once __DIR__ . '/../utils/sms.php';
          $mailError = $smsError = null;
          $mailSent = send_reservation_email($_POST["email"], $_POST["name"], $_POST["date"], $_POST["slot"], $mailError);
          $smsSent = true;
          if (!empty($_POST["tel"])) {
            $smsSent = send_reservation_sms($_POST["tel"], $_POST["name"], $_POST["date"], $_POST["slot"], $smsError);
          }
          $showSuccess = true;
          if ($mailSent && $smsSent) {
            echo "<div class='alert alert-success'>Réservation faite ! Un email et un SMS de confirmation ont été envoyés.</div>";
          } else {
            echo "<div class='alert alert-warning'>Réservation faite, mais :<ul style='margin:0 0 0 18px;'>";
            if (!$mailSent) echo "<li>Erreur d'envoi email : ".htmlspecialchars($mailError ?? '')."</li>";
            if (!$smsSent) echo "<li>Erreur d'envoi SMS : ".htmlspecialchars($smsError ?? '')."</li>";
            echo "</ul></div>";
          }
        } else {
          echo "<div class='alert alert-error'>".htmlspecialchars($_RSV->error)."</div>";
        }
      }
      // (B) AUTO-RESERVATION APRÈS PAIEMENT
      if (isset($_GET['paid']) && $_GET['paid'] == '1' && empty($_POST)) {
        echo "<script>
          if (localStorage.getItem('pendingReservation')) {
            var data = JSON.parse(localStorage.getItem('pendingReservation'));
            var form = document.createElement('form');
            form.method = 'POST';
            form.style.display = 'none';
            for (var key in data) {
              if (data.hasOwnProperty(key)) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = key;
                input.value = data[key];
                form.appendChild(input);
              }
            }
            document.body.appendChild(form);
            localStorage.removeItem('pendingReservation');
            form.submit();
          }
        </script>";
      }
      // @TODO - MINIMUM DATE (TODAY)
      $mindate = date("Y-m-d");
      ?>
      <div id="calendar" style="margin-bottom:24px;"></div>
      <form id="resForm" method="post" class="login-form">
          <script src="/MyStadium/public/js/calendar.js"></script>
        <div class="form-group">
          <input type="text" required name="name" placeholder="Nom et prénom" class="input-field" />
        </div>
        <div class="form-group">
          <input type="email" required name="email" placeholder="Email" class="input-field" />
        </div>
        <div class="form-group">
          <input type="text" required name="tel" placeholder="Téléphone" class="input-field" />
        </div>
        <div class="form-group">
          <label for="res_date" style="color:#1e5d2d;font-weight:bold;">Date de réservation</label>
          <input type="date" required id="res_date" name="date" min="<?=$mindate?>" class="input-field" />
        </div>
        <div class="form-group">
          <label for="slot" style="color:#1e5d2d;font-weight:bold;">Choix de terrain</label>
          <select name="slot" id="slot" class="input-field">
            <option value="TERRAIN-1">TERRAIN-1</option>
            <option value="TERRAIN-2">TERRAIN-2</option>
            <option value="TERRAIN-3">TERRAIN-3</option>
            <option value="TERRAIN-4">TERRAIN-4</option>
            <option value="TERRAIN-5">TERRAIN-5</option>
            <option value="TERRAIN-6">TERRAIN-6</option>
          </select>
        </div>
        <div class="form-group">
          <label for="amount" style="color:#1e5d2d;font-weight:bold;">Montant (€)</label>
          <input type="number" id="amount" name="amount" class="input-field" min="1" value="10" required />
        </div>
        <button type="submit" class="btn-main">Valider la réservation</button>
        <button id="pay-btn" class="btn-main" style="margin-top:10px;background:#3bb54a;" type="button">Payer en ligne</button>
      </form>
      <script src="https://js.stripe.com/v3/"></script>
      <script src="/MyStadium/public/js/payment.js"></script>
    </div>
  </div>
  <?php include(__DIR__ . "/footer.php")?>
</body>
</html>
