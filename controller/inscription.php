<?php
session_start();
if (isset($_SESSION["user"])) {
    header('Location: ../views/monespace.php');
    exit;
}
// Toute la logique métier passe désormais par l'API (register via AJAX)
include __DIR__ . '/../views/inscription.php';