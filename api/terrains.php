<?php
require_once __DIR__ . '/../bdd/config.php';
header('Content-Type: application/json');
$stmt = $pdo->query('SELECT * FROM terrains');
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));