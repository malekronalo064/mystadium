<?php
// POST: {firstname, lastname, email, telephone, login, password}
require_once __DIR__ . '/../bdd/config.php';
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
$fields = ['firstname','lastname','email','telephone','login','password'];
foreach($fields as $f) if(empty($data[$f])) { echo json_encode(['success'=>false,'message'=>'Champs manquants']); exit; }
// Vérification robustesse du mot de passe
if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\d]).{10,}$/', $data['password'])) {
  echo json_encode(['success'=>false,'message'=>'Le mot de passe doit contenir au moins 10 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.']);
  exit;
}
$hash = password_hash($data['password'], PASSWORD_DEFAULT);
try {
  $stmt = $pdo->prepare('INSERT INTO users (firstname, lastname, email, telephone, login, password) VALUES (:firstname, :lastname, :email, :telephone, :login, :password)');
  $stmt->execute([
    ':firstname'=>$data['firstname'], ':lastname'=>$data['lastname'], ':email'=>$data['email'], ':telephone'=>$data['telephone'], ':login'=>$data['login'], ':password'=>$hash
  ]);
  echo json_encode(['success'=>true]);
} catch (PDOException $e) {
  echo json_encode(['success'=>false,'message'=>'Erreur: '.$e->getMessage()]);
}