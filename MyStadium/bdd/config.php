<?php

// information d'identification

define('DB_NAME','mystadium');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');

// connexion à la base de données MySQL

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


// vérification de connexion

if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}


$pdo = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER,DB_PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// include helpers and start secure session
require_once __DIR__ . '/helpers.php';
start_secure_session();

?>