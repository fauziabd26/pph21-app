<?php
require_once __DIR__ . '/../config/database.php';

function getKategoriTER($status_ptkp)
{
    $s = strtoupper(trim($status_ptkp));
    if (in_array($s, ['TK/0', 'TK/1', 'K/0']))           return 'A';
    if (in_array($s, ['TK/2', 'TK/3', 'K/1', 'K/2']))    return 'B';
    if (in_array($s, ['K/3']))                             return 'C';
    return null;
}

function getTarifTER($gaji, $kategori, $conn)
{
    $tabel = 'ter_' . strtolower($kategori);
    $gaji  = (float) $gaji;
    $sql   = "SELECT tarif FROM $tabel
              WHERE batas_bawah <= $1
              AND (batas_atas >= $1 OR batas_atas IS NULL)
              LIMIT 1";
    $res = pg_query_params($conn, $sql, [$gaji]);
    if ($res && $row = pg_fetch_assoc($res)) {
        return (float) $row['tarif'];
    }
    return 0.00;
}

function hitungPajak($gaji, $status_ptkp, $conn)
{
    $kategori = getKategoriTER($status_ptkp);
    if (!$kategori) {
        return ['kategori' => null, 'tarif' => 0, 'pajak' => 0, 'error' => 'Status PTKP tidak valid'];
    }
    $tarif = getTarifTER($gaji, $kategori, $conn);
    $pajak = round($gaji * ($tarif / 100));
    return ['kategori' => 'TER ' . $kategori, 'tarif' => $tarif, 'pajak' => $pajak, 'error' => null];
}
