<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" >
    <title>MyStadium — Réservez votre terrain de foot</title>
</head>
<body>
    <?php include(__DIR__ . "/views/header.php")?>

    <main class="home-main" style="background-image: url('/MyStadium/public/img/backgroundaccueil.jpg'); background-size:cover; background-position:center; min-height:calc(100vh - 120px);">
        <section class="home-hero">
            <h1 class="home-title">Réservez votre terrain de foot en quelques clics</h1>
            <p class="home-subtitle">Simple, rapide, et 100% en ligne. Trouvez le terrain idéal, choisissez votre créneau, et jouez !</p>
            <div class="home-cta">
                <a href="/MyStadium/views/reserver.php" class="btn-main home-btn">Réserver maintenant</a>
                <a href="/MyStadium/views/moncentre.php" class="btn-secondary home-btn">Découvrir les centres</a>
            </div>
        </section>
        <section class="home-features">
            <div class="feature">
                <i class="fa fa-futbol-o feature-icon"></i>
                <h3>Terrains modernes</h3>
                <p>Des terrains de qualité pour tous les niveaux et toutes les équipes.</p>
            </div>
            <div class="feature">
                <i class="fa fa-calendar-check-o feature-icon"></i>
                <h3>Réservation instantanée</h3>
                <p>Choisissez votre créneau, réservez et recevez la confirmation immédiatement.</p>
            </div>
            <div class="feature">
                <i class="fa fa-users feature-icon"></i>
                <h3>Jouez entre amis</h3>
                <p>Invitez vos amis et gérez vos équipes facilement depuis votre espace personnel.</p>
            </div>
        </section>
    </main>

    <?php include(__DIR__ . "/views/footer.php")?>
</body>
</html>