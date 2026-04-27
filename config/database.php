<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');       // Ganti dengan DB user cPanel
define('DB_PASS', '');           // Ganti dengan DB password cPanel
define('DB_NAME', 'pph21_db');   // Ganti dengan nama database cPanel

function getDB() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die(json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]));
    }
    $conn->set_charset('utf8mb4');
    return $conn;
}
