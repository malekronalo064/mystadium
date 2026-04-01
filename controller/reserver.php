<?php
class Reservation {

  // (A) CONSTRUCTOR - CONNECTION DATABASE
  private $pdo; // PDO object
  private $stmt; // SQL statement
  public $error; // Error message
  function __construct() {
    try {
      $this->pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
        DB_USER, DB_PASSWORD, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NAMED
        ]
      );
    } catch (Exception $ex) { exit($ex->getMessage()); }
  }

  // (B1) DESTRUCTOR - CLOSE DATABASE CONNECTION
  function __destruct() {
    $this->pdo = null;
    $this->stmt = null;
  }

  // (B2) Select - le terrain disponible approprié

  function select_terrain($date_debut, $heure_debut, $duree_select){
    $date_debut2 = $date_debut." ".$heure_debut.":00:00";
    $date_fin = $date_debut." ".(intval($heure_debut)+intval($duree_select)).":00:00";
    $this->stmt = $this->pdo->prepare(
      "SELECT * FROM `terrain` WHERE id not in (select `id_1` from reservation where res_date_debut >= ? 
      and res_date_fin <= ? ) "  );
    $this->stmt->execute([$date_debut2, $date_fin]);
    return $this->stmt->fetchAll();
  }

  // (C) Enregistrer les RESERVATIONS
  function save ($date_debut, $duree_select, $name, $email, $tel, $terrain , $heure_debut ="") {
   
    
    // (C1) DATABASE ENTRY (récupération des données d'utilisateur lors de sa réserevation)
    try {
      $this->stmt = $this->pdo->prepare(
        "INSERT INTO `reservation` (`res_date_debut`,`res_date_fin`, `res_name`, `res_email`, `res_tel`, `res_prix`, `id_1`,`id`)
         VALUES (?,?,?,?,?,10,?,?)");
         
      $date_debut2 = $date_debut." ".$heure_debut.":00:00";
      $date_fin = $date_debut." ".(intval($heure_debut)+intval($duree_select)).":00:00";
      
      $this->stmt->execute([$date_debut2, $date_fin, $name, $email, $tel, $terrain, $_SESSION['user']['id'] ]);
    } catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }

    // (C3) EMAIL
    // CONFIRMER OU ANNULER OU MODIFIER
    $subject = "Reservation reçue";
    $message = "Merci, on a bien reçu votre demande.";
    @mail($email, $subject, $message);
    return true;
  }

  // (D) GET RESERVATIONS FOR THE DAY
  function getDay ($day="") {

    // (D1) DEFAULT TO TODAY
    if ($day=="") { $day = date("Y-m-d"); }

    // (D2) GET ENTRIES
    $this->stmt = $this->pdo->prepare(
      "SELECT * FROM `reservation` WHERE `res_date_debut`=?"
    );
    $this->stmt->execute([$day]);
    return $this->stmt->fetchAll();

     // (D3) GET ENTRIES
     $this->stmt = $this->pdo->prepare(
      "SELECT * FROM `reservation` WHERE `res_duree_select`=?"
    );
    $this->stmt->execute([$day]);
    return $this->stmt->fetchAll();

     // (D4) GET ENTRIES
     $this->stmt = $this->pdo->prepare(
      "SELECT * FROM `reservation` WHERE `res_heure_debut`=?"
    );
    $this->stmt->execute([$day]);
    return $this->stmt->fetchAll();
  }
}


// (E) DATABASE SETTINGS 
define("DB_HOST", "localhost");
define("DB_NAME", "mystadium1");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");

// (F) NEW RESERVATION OBJECT
$_RSV = new Reservation();
