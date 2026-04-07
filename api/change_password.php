<?php
require_once __DIR__ . '/../bdd/helpers.php';
start_secure_session();
header('Content-Type: application/json');

if (!isset($_SESSION['user'])) {
    echo json_encode(['success'=>false, 'message'=>'Non authentifié.']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
$old = $data['old_password'] ?? '';
$new = $data['new_password'] ?? '';

if (!$old || !$new) {
    echo json_encode(['success'=>false, 'message'=>'Champs obligatoires manquants.']);
    exit;
}

// Vérification robustesse du nouveau mot de passe
if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\d]).{10,}$/', $new)) {
    echo json_encode(['success'=>false, 'message'=>'Le nouveau mot de passe doit contenir au moins 10 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.']);
    exit;
}

require_once __DIR__ . '/../bdd/config.php';
$user = $_SESSION['user'];
$stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
$stmt->execute([':id'=>$user['id']]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$row || !password_verify($old, $row['password'])) {
    echo json_encode(['success'=>false, 'message'=>'Ancien mot de passe incorrect.']);
    exit;
}

$newHash = password_hash($new, PASSWORD_DEFAULT);
$stmt = $pdo->prepare('UPDATE users SET password = :pwd WHERE id = :id');
$stmt->execute([':pwd'=>$newHash, ':id'=>$user['id']]);
echo json_encode(['success'=>true, 'message'=>'Mot de passe modifié avec succès.']);
