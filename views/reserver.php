<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Réserver un terrain — MyStadium</title>
</head>
<body>
<?php include(__DIR__ . "/header.php")?>
<div class="login-bg" style="background: #111 url('/MyStadium/public/img/reservform.jpg') center/cover no-repeat; min-height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
  <section class="card" style="max-width: 480px; width: 100%; margin: 48px 0; text-align: center; background: #181818; color: #fff; box-shadow:0 8px 32px #0004; border-radius:18px;">
    <h1 class="login-title" style="font-size:2.2em; color:#3bb54a; font-family:'Montserrat',Arial,sans-serif; font-weight:900; text-transform:uppercase; margin-bottom: 18px;">Réserver un terrain</h1>
    <form id="form-reservation" onsubmit="event.preventDefault(); reserver();">
      <div class="form-group">
        <label for="terrain">Terrain :</label>
        <select id="terrain" name="terrain" class="input-field"></select>
      </div>
      <div class="form-group">
        <label for="date">Date :</label>
        <input type="date" id="date" name="date" class="input-field" required />
      </div>
      <div class="form-group">
        <label for="slot">Créneau :</label>
        <select id="slot" name="slot" class="input-field">
          <option value="08:00-09:00">08:00-09:00</option>
          <option value="09:00-10:00">09:00-10:00</option>
          <option value="10:00-11:00">10:00-11:00</option>
          <option value="11:00-12:00">11:00-12:00</option>
          <option value="12:00-13:00">12:00-13:00</option>
          <option value="13:00-14:00">13:00-14:00</option>
          <option value="14:00-15:00">14:00-15:00</option>
          <option value="15:00-16:00">15:00-16:00</option>
          <option value="16:00-17:00">16:00-17:00</option>
          <option value="17:00-18:00">17:00-18:00</option>
          <option value="18:00-19:00">18:00-19:00</option>
          <option value="19:00-20:00">19:00-20:00</option>
          <option value="20:00-21:00">20:00-21:00</option>
        </select>
      </div>
      <button class="btn-main" type="submit">Réserver</button>
    </form>
    <div id="reservation-feedback"></div>
    <script src="/MyStadium/public/js/app.js"></script>
    <script>
    // Remplir la liste des terrains dynamiquement
    fetch('/MyStadium/api/terrains.php').then(r=>r.json()).then(terrains=>{
      const select = document.getElementById('terrain');
      terrains.forEach(t=>{
        const opt = document.createElement('option');
        opt.value = t.id; opt.textContent = t.name;
        select.appendChild(opt);
      });
    });
    async function reserver() {
      const data = {
        terrain: document.getElementById('terrain').value,
        date: document.getElementById('date').value,
        slot: document.getElementById('slot').value
      };
      const res = await fetch('/MyStadium/api/reservations.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data),
        credentials: 'same-origin'
      });
      const result = await res.json();
      const feedback = document.getElementById('reservation-feedback');
      if(result.success) {
        feedback.innerHTML = '<div class="alert alert-success">Votre réservation a bien été prise en compte.</div>';
        setTimeout(()=>window.location.href='/MyStadium/views/mesreservations.php', 1800);
      } else {
        feedback.innerHTML = '<div class="alert alert-error">'+result.message+'</div>';
      }
    }
    </script>
  </section>
</div>
<?php include(__DIR__ . "/footer.php")?>
</body>
</html>
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
