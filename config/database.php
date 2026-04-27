<?php
define('DB_HOST', 'localhost');
define('DB_PORT', '5432');
define('DB_NAME', 'pph21_db');
define('DB_USER', 'fauzi');
define('DB_PASS', 'abdilah');  // ← ganti ini

function getDB()
{
    $dsn = sprintf(
        "host=%s port=%s dbname=%s user=%s password=%s",
        DB_HOST,
        DB_PORT,
        DB_NAME,
        DB_USER,
        DB_PASS
    );
    $conn = pg_connect($dsn);
    if (!$conn) {
        header('Content-Type: application/json');
        die(json_encode(['error' => 'Database connection failed']));
    }
    return $conn;
}
