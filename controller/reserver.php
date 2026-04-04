<?php
// Use the global $pdo from config.php
require_once __DIR__ . '/../bdd/config.php';

class Reservation {
  private $stmt; // SQL statement
  public $error; // Error message

  // (C) SAVE RESERVATION
  function save ($date, $slot, $name, $email, $tel ="") {
    global $pdo;
    // (C1) CHECKS & RESTRICTIONS
    // MY OWN RULES & REGULATIONS HERE

    // (C2) DATABASE ENTRY
    try {
      $this->stmt = $pdo->prepare(
        "INSERT INTO reservation (res_date, res_slot, res_name, res_email, res_tel)
         VALUES (?,?,?,?,?)");

      $this->stmt->execute([$date, $slot, $name, $email, $tel]);
    } catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }

    // (C3) EMAIL
    $subject = "Reservation reçue";
    $message = "Merci, on a bien recu votre demande.";
    @mail($email, $subject, $message);
    return true;
  }

  // (D) GET RESERVATIONS FOR THE DAY
  function getDay ($day="") {
    global $pdo;
    // (D1) DEFAULT TO TODAY
    if ($day=="") { $day = date("Y-m-d"); }

    // (D2) GET ENTRIES
    $this->stmt = $pdo->prepare(
      "SELECT * FROM reservation WHERE res_date=?"
    );
    $this->stmt->execute([$day]);
    return $this->stmt->fetchAll();
  }
}

// (F) NEW RESERVATION OBJECT
$_RSV = new Reservation();
