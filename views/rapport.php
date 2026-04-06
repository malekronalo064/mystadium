<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Rapport — MyStadium</title>
</head>
<body>
<?php include(__DIR__ . "/header.php")?>
<div class="login-bg" style="background: #111 url('/MyStadium/public/img/aboutback.jpg') center/cover no-repeat; min-height: 100vh; display: flex; flex-direction: column; align-items: center;">
	<section class="card" style="max-width: 700px; width: 100%; margin: 48px 0; text-align: center; background: rgba(255,255,255,0.97); box-shadow:0 8px 32px #1e5d2d22;">
		<h1 class="login-title" style="font-size:2.2em; color:#1e5d2d; font-family:'Ms Madi',cursive; margin-bottom: 18px;">Rapport</h1>
		<p style="font-size:1.1em;">Téléchargez vos rapports d'activité ou d'utilisation au format CSV pour analyse.</p>
		<form method="post" action="/MyStadium/api/export.php" style="margin:24px 0;">
			<button class="btn-main" type="submit"><i class="fa fa-download" style="margin-right:8px;"></i>Télécharger le rapport CSV</button>
		</form>
	</section>
</div>
<?php include(__DIR__ . "/footer.php")?>
</body>
</html>
