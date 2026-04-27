<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/../config/database.php';

$input = json_decode(file_get_contents('php://input'), true);
$session_id = $input['session_id'] ?? $_GET['session_id'] ?? '';

if (empty($session_id)) {
    echo json_encode(['success' => false, 'message' => 'Session ID tidak valid']);
    exit;
}

$conn = getDB();
$stmt = $conn->prepare("DELETE FROM perhitungan_pajak WHERE session_id = ?");
$stmt->bind_param('s', $session_id);
$stmt->execute();
$affected = $stmt->affected_rows;
$conn->close();

echo json_encode(['success' => true, 'deleted' => $affected]);
