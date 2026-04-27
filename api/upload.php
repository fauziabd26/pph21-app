<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/tax_engine.php';
require_once __DIR__ . '/../vendor/autoload.php';

use Shuchkin\SimpleXLSX;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

if (!isset($_FILES['excel_file']) || $_FILES['excel_file']['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['success' => false, 'message' => 'File tidak ditemukan atau gagal upload']);
    exit;
}

$file = $_FILES['excel_file'];
$ext  = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

if (!in_array($ext, ['xlsx', 'xls'])) {
    echo json_encode(['success' => false, 'message' => 'Format file harus .xlsx atau .xls']);
    exit;
}

$tmp_path   = $file['tmp_name'];
$session_id = bin2hex(random_bytes(16));

try {
    $xlsx = SimpleXLSX::parse($tmp_path);

    // Hapus file segera setelah dibaca
    if (file_exists($tmp_path)) @unlink($tmp_path);

    if (!$xlsx) {
        echo json_encode(['success' => false, 'message' => 'Gagal membaca file: ' . SimpleXLSX::parseError()]);
        exit;
    }

    $conn    = getDB();
    $results = [];
    $errors  = [];
    $row_num = 0;

    foreach ($xlsx->rows() as $row) {
        $col_a = trim($row[0] ?? '');
        if (empty($col_a) || strtolower($col_a) === 'nama pegawai') continue;

        $row_num++;
        $nama        = trim($row[0] ?? '');
        $npwp        = trim($row[1] ?? '');
        $jabatan     = trim($row[2] ?? '');
        $status_ptkp = strtoupper(trim($row[3] ?? ''));
        $gaji        = (float) preg_replace('/[^0-9.]/', '', str_replace(',', '', $row[4] ?? 0));

        if (empty($nama) || empty($status_ptkp) || $gaji <= 0) {
            $errors[] = "Baris $row_num: Data tidak lengkap (nama='$nama', ptkp='$status_ptkp', gaji=$gaji)";
            continue;
        }

        $hasil = hitungPajak($gaji, $status_ptkp, $conn);

        $sql = "INSERT INTO perhitungan_pajak
                (session_id, nama_pegawai, npwp, jabatan, status_ptkp, jumlah_gaji, kategori_ter, persentase_ter, nominal_pajak)
                VALUES ($1,$2,$3,$4,$5,$6,$7,$8,$9)";

        pg_query_params($conn, $sql, [
            $session_id,
            $nama,
            $npwp,
            $jabatan,
            $status_ptkp,
            $gaji,
            $hasil['kategori'],
            $hasil['tarif'],
            $hasil['pajak']
        ]);

        $results[] = [
            'no'             => $row_num,
            'nama_pegawai'   => $nama,
            'npwp'           => $npwp,
            'jabatan'        => $jabatan,
            'status_ptkp'    => $status_ptkp,
            'jumlah_gaji'    => $gaji,
            'kategori_ter'   => $hasil['kategori'],
            'persentase_ter' => $hasil['tarif'],
            'nominal_pajak'  => $hasil['pajak'],
            'error'          => $hasil['error'],
        ];
    }

    pg_close($conn);

    echo json_encode([
        'success'    => true,
        'session_id' => $session_id,
        'total'      => count($results),
        'errors'     => $errors,
        'data'       => $results,
    ]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
