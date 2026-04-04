<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
	<title>Boutique — MyStadium</title>
	<!-- Style global géré par index.css -->
</head>

<body>
<?php include(__DIR__ . "/header.php")?>
<div class="login-bg" style="background: linear-gradient(135deg, #1e5d2d 0%, #3bb54a 100%), url('/MyStadium/public/img/shoplogo.png') center/contain no-repeat; min-height: 100vh;">
	<section class="card" style="max-width: 900px; width: 100%; margin: 48px auto 32px auto; text-align: center; background: rgba(255,255,255,0.97); box-shadow:0 8px 32px #1e5d2d22;">
		<h1 class="login-title" style="font-size:2.3em; color:#1e5d2d; font-family:'Ms Madi',cursive; margin-bottom: 18px;">Boutique officielle</h1>
		<div style="display:flex;flex-wrap:wrap;gap:32px;justify-content:center;align-items:stretch;">
			<div style="flex:1 1 220px;min-width:200px;max-width:260px;background:#f5f5f5;border-radius:12px;padding:24px 12px;margin-bottom:12px;box-shadow:0 2px 8px #3bb54a22;">
				<img src="/MyStadium/public/img/maillot.jpg" alt="Maillot" style="width:120px;border-radius:8px;box-shadow:0 2px 8px #3bb54a22;"/>
				<div style="font-weight:700;font-size:1.1em;margin-top:8px;">Maillot MyStadium</div>
				<div style="color:#3bb54a;font-weight:700;">29,99€</div>
				<button class="btn-main" style="margin-top:10px;">Ajouter au panier</button>
			</div>
			<div style="flex:1 1 220px;min-width:200px;max-width:260px;background:#f5f5f5;border-radius:12px;padding:24px 12px;margin-bottom:12px;box-shadow:0 2px 8px #3bb54a22;">
				<img src="/MyStadium/public/img/ballon.jpg" alt="Ballon" style="width:120px;border-radius:8px;box-shadow:0 2px 8px #3bb54a22;"/>
				<div style="font-weight:700;font-size:1.1em;margin-top:8px;">Ballon officiel</div>
				<div style="color:#3bb54a;font-weight:700;">19,99€</div>
				<button class="btn-main" style="margin-top:10px;">Ajouter au panier</button>
			</div>
			<div style="flex:1 1 220px;min-width:200px;max-width:260px;background:#f5f5f5;border-radius:12px;padding:24px 12px;margin-bottom:12px;box-shadow:0 2px 8px #3bb54a22;">
				<img src="/MyStadium/public/img/gourde.jpg" alt="Gourde" style="width:120px;border-radius:8px;box-shadow:0 2px 8px #3bb54a22;"/>
				<div style="font-weight:700;font-size:1.1em;margin-top:8px;">Gourde MyStadium</div>
				<div style="color:#3bb54a;font-weight:700;">9,99€</div>
				<button class="btn-main" style="margin-top:10px;">Ajouter au panier</button>
			</div>
		</div>
		<div style="margin-top:32px;">
			<a href="/MyStadium/views/index.php" class="btn-main" style="font-size:1.1em;">Retour à l'accueil</a>
		</div>
	</section>
</div>
<?php include(__DIR__ . "/footer.php")?>
</body>
</html>
