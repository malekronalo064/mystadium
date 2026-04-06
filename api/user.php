<?php
require_once __DIR__ . '/../bdd/helpers.php';
start_secure_session();
header('Content-Type: application/json');
if (!isset($_SESSION['user'])) { echo json_encode(['success'=>false]); exit; }
echo json_encode(['success'=>true,'user'=>$_SESSION['user']]);