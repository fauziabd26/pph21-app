<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../config/database.php';

$input      = json_decode(file_get_contents('php://input'), true);
$session_id = $input['session_id'] ?? $_GET['session_id'] ?? '';

if (empty($session_id)) {
    echo json_encode(['success' => false, 'message' => 'Session ID tidak valid']);
    exit;
}

$conn = getDB();
$res  = pg_query_params($conn, "DELETE FROM perhitungan_pajak WHERE session_id=$1", [$session_id]);
pg_close($conn);

echo json_encode(['success' => true, 'deleted' => pg_affected_rows($res)]);
