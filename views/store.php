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
	<div class="login-bg" style="background: linear-gradient(135deg, #1e5d2d 0%, #3bb54a 100%), url('/MyStadium/public/img/shoplogo.png') center/contain no-repeat; min-height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
		<div class="card" style="max-width: 700px; width: 100%; margin: 48px 0; text-align: center; background: rgba(255,255,255,0.97);">
			<h1 class="login-title" style="font-size:2.2em; color:#1e5d2d; font-family:'Ms Madi',cursive; margin-bottom: 18px;">Boutique</h1>
			<div style="display:flex;gap:32px;flex-wrap:wrap;justify-content:center;">
				<div style="background:#fff;padding:24px 18px 18px 18px;border-radius:14px;min-width:180px;box-shadow:0 2px 8px #1e5d2d22;">
					<img src="/MyStadium/public/img/maillot.jpg" alt="Maillot" style="width:110px;border-radius:8px;box-shadow:0 2px 8px #3bb54a22;"/>
					<div style="font-weight:600;margin-top:8px;">Maillot MyStadium</div>
					<div style="color:#3bb54a;font-weight:700;">29,99€</div>
					<button class="btn-main" style="margin-top:10px;">Ajouter au panier</button>
				</div>
				<div style="background:#fff;padding:24px 18px 18px 18px;border-radius:14px;min-width:180px;box-shadow:0 2px 8px #1e5d2d22;">
					<img src="/MyStadium/public/img/ballon.jpg" alt="Ballon" style="width:110px;border-radius:8px;box-shadow:0 2px 8px #3bb54a22;"/>
					<div style="font-weight:600;margin-top:8px;">Ballon officiel</div>
					<div style="color:#3bb54a;font-weight:700;">19,99€</div>
					<button class="btn-main" style="margin-top:10px;">Ajouter au panier</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
