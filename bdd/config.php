<?php

// information d'identification

// Connexion à SQL Server (SSMS) avec la chaîne de connexion complète

try {
    $pdo = new PDO(
        "sqlsrv:Server=LAPTOPMALEK-79046NH9;Database=mystadium;Encrypt=True;TrustServerCertificate=True",
        'malek.toukebri',
        'Titou**123'
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion SQL Server: " . $e->getMessage());
}

// include helpers and start secure session
require_once __DIR__ . '/helpers.php';
start_secure_session();

?>