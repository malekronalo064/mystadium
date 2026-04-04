<?php
  session_start();
  if(!isset($_SESSION["user"]) || ($_SESSION['user']['role'] ?? '') !== 'admin'){
    header("Location: ../../views/connexion.php");
    exit(); 
  }
  // Toute la logique métier passe désormais par l'API (admin via AJAX)
  include __DIR__ . '/../../views/admin.php';
?>

