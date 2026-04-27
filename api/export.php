<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../vendor/autoload.php';

use Shuchkin\SimpleXLSXGen;

$session_id = $_GET['session_id'] ?? '';
if (empty($session_id)) die('Session ID tidak valid');

$conn = getDB();
$res  = pg_query_params($conn, "SELECT * FROM perhitungan_pajak WHERE session_id=$1 ORDER BY id ASC", [$session_id]);
$rows = pg_fetch_all($res) ?: [];
pg_close($conn);

if (empty($rows)) die('Data tidak ditemukan');

$data   = [];
$data[] = ['** REKAPITULASI PERHITUNGAN PPh PASAL 21 - PEGAWAI TETAP **', '', '', '', '', '', '', '', ''];
$data[] = ['Berdasarkan PMK-168/PMK.010/2023 (Tarif Efektif Rata-rata / TER)', '', '', '', '', '', '', '', ''];
$data[] = ['', '', '', '', '', '', '', '', ''];
$data[] = ['** No **', '** Nama Pegawai **', '** NPWP **', '** Jabatan **', '** Status PTKP **', '** Jumlah Gaji (Rp) **', '** Kategori TER **', '** Tarif TER (%) **', '** PPh 21 Sebulan (Rp) **'];

$totalGaji = 0;
$totalPajak = 0;
$no = 1;
foreach ($rows as $row) {
    $gaji  = (float) $row['jumlah_gaji'];
    $pajak = (float) $row['nominal_pajak'];
    $totalGaji  += $gaji;
    $totalPajak += $pajak;
    $data[] = [
        $no++,
        $row['nama_pegawai'],
        $row['npwp'] ?: '-',
        $row['jabatan'] ?: '-',
        $row['status_ptkp'],
        $gaji,
        $row['kategori_ter'] ?: '-',
        (float) $row['persentase_ter'],
        $pajak,
    ];
}

$data[] = ['** TOTAL **', '', '', '', '', "** $totalGaji **", '', '', "** $totalPajak **"];
$data[] = [''];
$data[] = ['Digenerate otomatis oleh Sistem PPh 21 | ' . date('d/m/Y H:i:s')];

SimpleXLSXGen::fromArray($data)->downloadAs('PPh21_' . date('Ymd_His') . '.xlsx');
