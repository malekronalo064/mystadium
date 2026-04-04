<?php
// api/admin.php
require_once __DIR__ . '/../bdd/config.php';
session_start();
header('Content-Type: application/json');
if (!isset($_SESSION['user']) || ($_SESSION['user']['role'] ?? '') !== 'admin') {
  echo json_encode(['success'=>false,'message'=>'Accès refusé']);
  exit;
}
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'GET') {
  $reservations = $pdo->query('SELECT * FROM reservations ORDER BY res_date DESC')->fetchAll(PDO::FETCH_ASSOC);
  $users = $pdo->query('SELECT * FROM users ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode(['success'=>true,'reservations'=>$reservations,'users'=>$users]);
} elseif ($method === 'DELETE') {
  $data = json_decode(file_get_contents('php://input'), true);
  if (!empty($data['reservation_id'])) {
    $stmt = $pdo->prepare('DELETE FROM reservations WHERE id = :id');
    $stmt->execute([':id'=>$data['reservation_id']]);
    echo json_encode(['success'=>true]);
  } elseif (!empty($data['user_id'])) {
    $stmt = $pdo->prepare('DELETE FROM users WHERE id = :id');
    $stmt->execute([':id'=>$data['user_id']]);
    echo json_encode(['success'=>true]);
  } else {
    echo json_encode(['success'=>false,'message'=>'ID manquant']);
  }
} else {
  echo json_encode(['success'=>false,'message'=>'Méthode non supportée']);
}
