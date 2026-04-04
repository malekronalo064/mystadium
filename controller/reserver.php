<?php
session_start();
if (!isset($_SESSION["user"])) {
    header('Location: ../views/connexion.php');
    exit;
}
// Toute la logique métier passe désormais par l'API (réservation via AJAX)
include __DIR__ . '/../views/reserver.php';
    $this->stmt = $pdo->prepare(
      "SELECT * FROM reservation WHERE res_date=?"
    );
    $this->stmt->execute([$day]);
    return $this->stmt->fetchAll();
  }
}

// (F) NEW RESERVATION OBJECT
$_RSV = new Reservation();
