<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
	<title>Tournois — MyStadium</title>
</head>
<body>
	<?php include(__DIR__ . "/header.php")?>
	<div class="login-bg" style="background: linear-gradient(135deg, #1e5d2d 0%, #3bb54a 100%), url('/MyStadium/public/img/backgroundaccueil.jpg') center/cover no-repeat; min-height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
		<div class="card" style="max-width: 680px; width: 100%; margin: 48px 0; text-align: center; background: rgba(255,255,255,0.97);">
			<h1 class="login-title" style="font-size:2.2em; color:#1e5d2d; font-family:'Ms Madi',cursive; margin-bottom: 18px;">Tournois à venir</h1>
			<ul style="list-style:none; padding:0; margin-bottom:18px;">
				<li style="margin-bottom:8px;"><strong>Tournoi 5v5 Printemps</strong> — <span style="color:#3bb54a;">12 mai 2026</span></li>
				<li><strong>Tournoi Nocturne</strong> — <span style="color:#3bb54a;">28 juin 2026</span></li>
			</ul>
			<a href="/MyStadium/views/index.php" class="btn-main" style="margin-top:18px;">Retour à l'accueil</a>
		</div>
	</div>
			<ul>
				<li><strong>Tournoi 5v5 Printemps</strong> — 12 mai 2026 — <button class="btn-main">S'inscrire</button></li>
				<li><strong>Tournoi Nocturne</strong> — 28 juin 2026 — <button class="btn-main">S'inscrire</button></li>
			</ul>
			<h2>Proposer un tournoi</h2>
			<form>
				<input type="text" placeholder="Nom du tournoi" required style="margin-bottom:8px;width:100%;"/>
				<input type="date" required style="margin-bottom:8px;width:100%;"/>
				<button class="btn-main" type="submit">Proposer</button>
			</form>
		</div>
	</div>
</body>
</html>
