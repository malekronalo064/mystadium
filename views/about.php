<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
	<title>À propos — MyStadium</title>
	<!-- Style global géré par index.css -->
</head>
<body>
<?php include(__DIR__ . "/header.php")?>
<div class="login-bg" style="background: #111 url('/MyStadium/public/img/backgroundaccueil.jpg') center/cover no-repeat; min-height: 100vh;">
	<section class="card" style="max-width: 900px; width: 100%; margin: 48px auto 32px auto; text-align: center; background: #181818; color: #fff; box-shadow:0 8px 32px #0004; border-radius:18px;">
		<h1 class="login-title" style="font-size:2.3em; color:#fff; font-family:'Montserrat',Arial,sans-serif; font-weight:900; text-transform:uppercase; margin-bottom: 18px;">À propos de MyStadium</h1>
		<p style="font-size:1.15em; color:#fff; margin-bottom: 24px;">MyStadium est la plateforme premium de réservation de terrains de football, inspirée des meilleurs centres comme UrbanSoccer et Le Five. Notre mission : rendre la réservation simple, rapide et agréable pour tous les passionnés, dans une ambiance conviviale et haut de gamme.</p>
		<img src="https://images.unsplash.com/photo-1517649763962-0c623066013b?auto=format&fit=crop&w=800&q=80" alt="Ambiance MyStadium" style="width:100%;max-width:420px;border-radius:18px;box-shadow:0 4px 24px #0004;object-fit:cover;margin-bottom:24px;"/>
		<a href="/MyStadium/views/index.php" class="btn-main" style="margin-top:18px;font-size:1.1em; background:#111; color:#3bb54a; border:2px solid #3bb54a; font-weight:900;">Retour à l'accueil</a>
	</section>
	<section class="card" style="max-width: 900px; width: 100%; margin: 0 auto 32px auto; text-align: center; background: #181818; color: #fff; box-shadow:0 8px 32px #0004; border-radius:18px;">
		<h2 style="color:#3bb54a;font-size:1.3em;margin-bottom:12px;text-transform:uppercase;font-weight:900;">Nos valeurs</h2>
		<ul style="list-style:none;padding:0;margin:0 auto 18px auto;max-width:600px;display:flex;flex-wrap:wrap;gap:24px;justify-content:center;">
			<li style="background:#222;border-radius:12px;padding:18px 24px;flex:1 1 180px;min-width:180px;max-width:240px;box-shadow:0 2px 8px #3bb54a22;">
				<i class="fa fa-users" style="color:#3bb54a;font-size:1.5em;margin-bottom:8px;"></i><br>Communauté & esprit sportif
			</li>
			<li style="background:#222;border-radius:12px;padding:18px 24px;flex:1 1 180px;min-width:180px;max-width:240px;box-shadow:0 2px 8px #3bb54a22;">
				<i class="fa fa-check-circle" style="color:#3bb54a;font-size:1.5em;margin-bottom:8px;"></i><br>Accessibilité & simplicité
			</li>
			<li style="background:#222;border-radius:12px;padding:18px 24px;flex:1 1 180px;min-width:180px;max-width:240px;box-shadow:0 2px 8px #3bb54a22;">
				<i class="fa fa-eur" style="color:#3bb54a;font-size:1.5em;margin-bottom:8px;"></i><br>Transparence des tarifs
			</li>
			<li style="background:#222;border-radius:12px;padding:18px 24px;flex:1 1 180px;min-width:180px;max-width:240px;box-shadow:0 2px 8px #3bb54a22;">
				<i class="fa fa-star" style="color:#ffd600;font-size:1.5em;margin-bottom:8px;"></i><br>Qualité & innovation
			</li>
		</ul>
	</section>
	<section class="card" style="max-width: 900px; width: 100%; margin: 0 auto 48px auto; text-align: center; background: #181818; color: #fff; box-shadow:0 8px 32px #0004; border-radius:18px;">
		<h2 style="color:#3bb54a;font-size:1.3em;margin-bottom:12px;text-transform:uppercase;font-weight:900;">Contact</h2>
		<div style="font-size:1.1em;">Email : <a href="mailto:contact@mystadium.fr" style="color:#3bb54a;text-decoration:underline;">contact@mystadium.fr</a></div>
		<div style="font-size:1.1em;">Téléphone : <a href="tel:0123456789" style="color:#3bb54a;text-decoration:underline;">01 23 45 67 89</a></div>
		<div style="margin-top:12px;">123 avenue du Foot, 75000 Paris</div>
	</section>
</div>
<?php include(__DIR__ . "/footer.php")?>
</body>
</html>
</html>
