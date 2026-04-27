<?php
require_once __DIR__ . '/../config/database.php';

/**
 * Tentukan kategori TER berdasarkan status PTKP
 * TER A = TK/0
 * TER B = TK/1, TK/2, K/0
 * TER C = TK/3, K/1, K/2, K/3
 */
function getKategoriTER($status_ptkp) {
    $status = strtoupper(trim($status_ptkp));
    $ter_a = ['TK/0'];
    $ter_b = ['TK/1', 'TK/2', 'K/0'];
    $ter_c = ['TK/3', 'K/1', 'K/2', 'K/3'];

    if (in_array($status, $ter_a)) return 'A';
    if (in_array($status, $ter_b)) return 'B';
    if (in_array($status, $ter_c)) return 'C';
    return null;
}

/**
 * Ambil tarif TER dari database berdasarkan gaji bruto dan kategori
 */
function getTarifTER($gaji, $kategori, $conn) {
    $tabel = 'ter_' . strtolower($kategori);
    $stmt = $conn->prepare("
        SELECT tarif FROM `$tabel`
        WHERE batas_bawah <= ?
        AND (batas_atas >= ? OR batas_atas IS NULL)
        LIMIT 1
    ");
    $stmt->bind_param('dd', $gaji, $gaji);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        return (float)$row['tarif'];
    }
    return 0.00;
}

/**
 * Hitung PPh 21 untuk satu pegawai
 */
function hitungPajak($gaji, $status_ptkp, $conn) {
    $kategori = getKategoriTER($status_ptkp);
    if (!$kategori) {
        return ['kategori' => null, 'tarif' => 0, 'pajak' => 0, 'error' => 'Status PTKP tidak valid'];
    }

    $tarif = getTarifTER($gaji, $kategori, $conn);
    $pajak = round($gaji * ($tarif / 100));

    return [
        'kategori' => 'TER ' . $kategori,
        'tarif'    => $tarif,
        'pajak'    => $pajak,
        'error'    => null,
    ];
}
