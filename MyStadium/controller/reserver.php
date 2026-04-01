<?php
class Reservation {

  // (A) CONSTRUCTOR - CONNECTION DATABASE
  private $pdo; // PDO object
  private $stmt; // SQL statement
  public $error; // Error message
  function __construct() {
    try {
      $this->pdo = new PDO(
        "sqlsrv:Server=" . DB_HOST . ";Database=" . DB_NAME . ";TrustServerCertificate=yes",
        DB_USER, DB_PASSWORD, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NAMED
        ]
      );
    } catch (Exception $ex) { exit($ex->getMessage()); }
  }

  // (B) DESTRUCTOR - CLOSE DATABASE CONNECTION
  function __destruct() {
    $this->pdo = null;
    $this->stmt = null;
  }

  // (C) SAVE RESERVATION
  function save ($date, $slot, $name, $email, $tel ="") {
   
    // (C1) CHECKS & RESTRICTIONS
    // MY OWN RULES & REGULATIONS HERE
    

    // (C2) DATABASE ENTRY
    try {
      $this->stmt = $this->pdo->prepare(
        "INSERT INTO `reservation` (`res_date`, `res_slot`, `res_name`, `res_email`, `res_tel`)
         VALUES (?,?,?,?,?)");

      $this->stmt->execute([$date, $slot, $name, $email, $tel]);
    } catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }

    // (C3) EMAIL
    // IF YOU WANT TO MANUALLY CALL TO CONFIRM OR SOMETHING
    // OR EMAIL THIS TO A MANAGER OR SOMETHING
    $subject = "Reservation reçue";
    $message = "Merci, on a bien recu votre demande.";
    @mail($email, $subject, $message);
    return true;
  }

  // (D) GET RESERVATIONS FOR THE DAY
  function getDay ($day="") {

    // (D1) DEFAULT TO TODAY
    if ($day=="") { $day = date("Y-m-d"); }

    // (D2) GET ENTRIES
    $this->stmt = $this->pdo->prepare(
      "SELECT * FROM `reservation` WHERE `res_date`=?"
    );
    $this->stmt->execute([$day]);
    return $this->stmt->fetchAll();
  }
}

// (E) DATABASE SETTINGS 
define("DB_HOST", "localhost");
define("DB_NAME", "mystadium");
define("DB_USER", "root"); // adapte avec ton user SQL Server
define("DB_PASSWORD", ""); // adapte avec ton mot de passe

// (F) NEW RESERVATION OBJECT
$_RSV = new Reservation();
