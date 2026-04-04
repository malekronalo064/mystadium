<?php
// controller/calendar_events.php
require_once __DIR__ . '/../bdd/config.php';
$today = date('Y-m-d');
$dates = [];
for ($i = 0; $i < 21; $i++) {
    $d = date('Y-m-d', strtotime("+$i day"));
    $dates[$d] = false;
}
// Use a prepared statement for safety and compatibility
$stmt = $pdo->prepare("SELECT res_date FROM reservation WHERE res_date >= ?");
$stmt->execute([$today]);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $dates[$row['res_date']] = true;
}
$out = [];
foreach ($dates as $date => $reserved) {
    $out[] = [ 'date' => $date, 'reserved' => $reserved ];
}
header('Content-Type: application/json');
echo json_encode($out);
