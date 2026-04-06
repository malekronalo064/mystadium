<?php
require_once __DIR__ . '/../bdd/config.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'GET') {
  $where = [];
  $params = [];
  if (!empty($_GET['date'])) { $where[] = 'res_date = :date'; $params[':date'] = $_GET['date']; }
  if (!empty($_GET['terrain_id'])) { $where[] = 'terrain_id = :terrain_id'; $params[':terrain_id'] = $_GET['terrain_id']; }
  $sql = 'SELECT * FROM reservations';
  if ($where) $sql .= ' WHERE ' . implode(' AND ', $where);
  $stmt = $pdo->prepare($sql);
  $stmt->execute($params);
  echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} elseif ($method === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);
  require_once __DIR__ . '/../bdd/helpers.php';
  start_secure_session();
  if (!isset($_SESSION['user'])) { echo json_encode(['success'=>false,'message'=>'Non connecté']); exit; }
  $fields = ['terrain_id','res_date','res_slot'];
  foreach($fields as $f) if(empty($data[$f])) { echo json_encode(['success'=>false,'message'=>'Champs manquants']); exit; }
  $stmt = $pdo->prepare('INSERT INTO reservations (user_id, terrain_id, res_date, res_slot) VALUES (:user_id, :terrain_id, :res_date, :res_slot)');
  $stmt->execute([
    ':user_id'=>$_SESSION['user']['id'], ':terrain_id'=>$data['terrain_id'], ':res_date'=>$data['res_date'], ':res_slot'=>$data['res_slot']
  ]);
  echo json_encode(['success'=>true]);
} elseif ($method === 'DELETE') {
  require_once __DIR__ . '/../bdd/helpers.php';
  start_secure_session();
  if (!isset($_SESSION['user'])) { echo json_encode(['success'=>false,'message'=>'Non connecté']); exit; }
  $data = json_decode(file_get_contents('php://input'), true);
  if (empty($data['id'])) { echo json_encode(['success'=>false,'message'=>'ID manquant']); exit; }
  $stmt = $pdo->prepare('DELETE FROM reservations WHERE id = :id AND user_id = :user_id');
  $stmt->execute([':id'=>$data['id'], ':user_id'=>$_SESSION['user']['id']]);
  echo json_encode(['success'=>true]);
}