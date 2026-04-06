<?php
require_once __DIR__ . '/../bdd/helpers.php';
start_secure_session();
session_destroy();
header('Content-Type: application/json');
echo json_encode(['success'=>true]);