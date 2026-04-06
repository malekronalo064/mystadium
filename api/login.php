<?php
// POST: {login, password}
require_once __DIR__ . '/../bdd/config.php';
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
$login = $data['login'] ?? '';
$password = $data['password'] ?? '';
if (!$login || !$password) {
  echo json_encode(['success'=>false,'message'=>'Champs obligatoires manquants.']); exit;
}
$stmt = $pdo->prepare('SELECT * FROM users WHERE login = :login');
$stmt->execute([':login'=>$login]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if ($user && password_verify($password, $user['password'])) {
  require_once __DIR__ . '/../bdd/helpers.php';
  start_secure_session();
  unset($user['password']);
  $_SESSION['user'] = $user;
  echo json_encode(['success'=>true,'user'=>$user]);
} else {
  echo json_encode(['success'=>false,'message'=>'Identifiants invalides.']);
}