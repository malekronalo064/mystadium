<?php
// Contrôleur minimal : session + vue, toute la logique métier passe par l'API (AJAX)
require_once __DIR__ . '/../bdd/helpers.php';
start_secure_session();
if (!isset($_SESSION["user"])) {
    header('Location: ../views/connexion.php');
    exit;
}
// Affichage de la page de réservation (style UrbanSoccer)
include __DIR__ . '/../views/reserver.php';
