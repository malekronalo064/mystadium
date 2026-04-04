<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Mon Centre — MyStadium</title>
</head>
<body>
<?php include(__DIR__ . "/header.php")?>
<div class="login-bg" style="background: linear-gradient(135deg, #1e5d2d 0%, #3bb54a 100%); min-height: 100vh; display: flex; flex-direction: column; align-items: center;">
  <section class="card" style="max-width: 700px; width: 100%; margin: 48px 0; text-align: center; background: rgba(255,255,255,0.97); box-shadow:0 8px 32px #1e5d2d22;">
    <h1 class="login-title" style="font-size:2.2em; color:#1e5d2d; font-family:'Ms Madi',cursive; margin-bottom: 18px;">Mon Centre</h1>
    <img src="https://images.unsplash.com/photo-1505843279827-4b522b6c1d68?auto=format&fit=crop&w=800&q=80" alt="Photo du centre" style="width:100%;max-width:400px;border-radius:18px;box-shadow:0 4px 24px #1e5d2d22;object-fit:cover;margin-bottom:24px;"/>
    <div style="font-size:1.1em; margin-bottom: 12px;"><i class="fa fa-map-marker" style="color:#3bb54a;margin-right:8px;"></i><strong>Adresse :</strong> 123 avenue du Foot, 75000 Paris</div>
    <div style="font-size:1.1em; margin-bottom: 12px;"><i class="fa fa-clock-o" style="color:#3bb54a;margin-right:8px;"></i><strong>Horaires :</strong> 8h00 - 23h00, 7j/7</div>
    <div style="font-size:1.1em; margin-bottom: 12px;"><i class="fa fa-futbol-o" style="color:#3bb54a;margin-right:8px;"></i><strong>Terrains :</strong> 2 synthétiques, 1 couvert</div>
    <div style="font-size:1.1em; margin-bottom: 12px;"><i class="fa fa-shower" style="color:#3bb54a;margin-right:8px;"></i><strong>Services :</strong> Vestiaires, douches, bar, boutique</div>
  </section>
</div>
<?php include(__DIR__ . "/footer.php")?>
</body>
</html>
