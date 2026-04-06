<?php
require_once __DIR__ . '/../bdd/helpers.php';
start_secure_session();
if (isset($_SESSION["user"])) {
    header('Location: ../views/monespace.php');
    exit;
}
// Toute la logique métier passe désormais par l'API (register via AJAX)
include __DIR__ . '/../views/inscription.php';