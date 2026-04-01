<?php


// Informations d'identification SQL Server (mode SQL Server Authentication)
define('DB_NAME','mystadium');
define('DB_HOST', 'LAPTOPMALEK-790'); // ou l'adresse de ton serveur SQL
define('DB_USER', 'malek.toukebri'); // exemple : 'sa'
define('DB_PASSWORD', 'Titou**123');

$connectionInfo = array(
    "Database" => DB_NAME,
    "UID" => DB_USER,
    "PWD" => DB_PASSWORD,
    "CharacterSet" => "UTF-8",
    "TrustServerCertificate" => true
);
$conn = sqlsrv_connect(DB_HOST, $connectionInfo);
if($conn === false){
    die("ERREUR : Impossible de se connecter. ".print_r(sqlsrv_errors(), true));
}

try {
    $pdo = new PDO("sqlsrv:Server=" . DB_HOST . ";Database=" . DB_NAME . ";TrustServerCertificate=1;", DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    die("ERREUR PDO : " . $e->getMessage());
}

?>


