# 🏛️ PPh 21 Calculator — Panduan Deploy cPanel

## 📋 Requirements
- PHP 7.4+ (disarankan PHP 8.x)
- MySQL 5.7+ / MariaDB 10.x
- Composer (untuk install PhpSpreadsheet)
- cPanel hosting

---

## 🚀 Langkah Deploy

### Step 1 — Setup Database di phpMyAdmin
1. Login cPanel → buka **phpMyAdmin**
2. Buat database baru, contoh: `namauser_pph21`
3. Import file `database.sql` yang ada di folder ini
4. Pastikan semua tabel berhasil dibuat (ter_a, ter_b, ter_c, perhitungan_pajak)

### Step 2 — Edit Konfigurasi Database
Buka file `config/database.php` dan sesuaikan:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'namauser_pph21');  // ← user database cPanel
define('DB_PASS', 'passwordmu');      // ← password database
define('DB_NAME', 'namauser_pph21'); // ← nama database
```

> ⚠️ Di cPanel, nama user & database biasanya diawali dengan username cPanel kamu.
> Contoh: `cpaneluser_pph21`

### Step 3 — Install Dependencies (PhpSpreadsheet)
Ada 2 cara:

#### Cara A — Via SSH (jika tersedia)
```bash
cd /home/namauser/public_html/pph21
composer install --no-dev
```

#### Cara B — Install di lokal, upload vendor folder
1. Di komputer lokal, jalankan: `composer install --no-dev`
2. Upload seluruh folder `vendor/` ke server via FTP/FileManager
3. Folder vendor cukup besar (~30MB), bersabarlah saat upload

### Step 4 — Upload File ke cPanel
Via File Manager atau FTP, upload semua file ke:
```
public_html/pph21/
```

Struktur akhir di server:
```
public_html/
└── pph21/
    ├── index.php
    ├── composer.json
    ├── .htaccess
    ├── database.sql
    ├── config/
    │   └── database.php
    ├── api/
    │   ├── upload.php
    │   ├── export.php
    │   ├── delete_session.php
    │   └── tax_engine.php
    └── vendor/        ← hasil composer install
        └── autoload.php
```

### Step 5 — Test Aplikasi
Buka browser: `https://domainmu.com/pph21/`

---

## 📊 Format File Excel untuk Upload

| Kolom | Isi |
|-------|-----|
| A | Nama Pegawai |
| B | NPWP |
| C | Jabatan |
| D | Status PTKP (TK/0, TK/1, TK/2, TK/3, K/0, K/1, K/2, K/3) |
| E | Jumlah Gaji (angka, tanpa Rp) |

Baris pertama boleh header atau langsung data.

---

## 🔢 Kategori TER berdasarkan Status PTKP

| Kategori | Status PTKP |
|----------|-------------|
| TER A    | TK/0 |
| TER B    | TK/1, TK/2, K/0 |
| TER C    | TK/3, K/1, K/2, K/3 |

---

## 🔒 Keamanan
- File Excel yang diupload **tidak disimpan** di server — langsung diproses dan dihapus
- Data hasil tersimpan sementara di database per session
- Klik Reset untuk hapus data dari database

---

## ❓ Troubleshooting

**Error "Database connection failed"**
→ Cek konfigurasi di `config/database.php`

**Error "Class not found / autoload"**
→ Vendor folder belum diinstall. Jalankan `composer install`

**Upload gagal**
→ Cek PHP `upload_max_filesize` di cPanel PHP Settings (set ke 10M)

**File tidak terbaca**
→ Pastikan format file .xlsx bukan .csv
