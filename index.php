<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PPh 21 Calculator — ANPAL</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
  :root {
    --navy:      #0F2040;
    --navy-2:    #1E3A5F;
    --navy-3:    #2B5080;
    --gold:      #C9A84C;
    --gold-light:#F0D080;
    --cream:     #F8F5EE;
    --white:     #FFFFFF;
    --gray-1:    #F1F4F8;
    --gray-2:    #E2E8F0;
    --gray-3:    #94A3B8;
    --gray-4:    #64748B;
    --red:       #C0392B;
    --green:     #1A7A3A;
    --green-bg:  #E8F5EC;
    --orange:    #D97706;
    --orange-bg: #FFF8ED;

    --shadow-sm: 0 1px 3px rgba(0,0,0,0.08);
    --shadow:    0 4px 16px rgba(15,32,64,0.10);
    --shadow-lg: 0 12px 40px rgba(15,32,64,0.15);
    --radius:    12px;
    --radius-lg: 18px;
    --transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: var(--cream);
    color: var(--navy);
    min-height: 100vh;
  }

  /* ===== HEADER ===== */
  .header {
    background: var(--navy);
    padding: 0 40px;
    height: 68px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: sticky;
    top: 0;
    z-index: 100;
    box-shadow: 0 2px 20px rgba(0,0,0,0.3);
  }
  .header-logo {
    display: flex;
    align-items: center;
    gap: 14px;
  }
  .header-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, var(--gold), var(--gold-light));
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
  }
  .header-title {
    color: var(--white);
    font-weight: 700;
    font-size: 18px;
    letter-spacing: -0.3px;
  }
  .header-sub {
    color: var(--gold);
    font-size: 11px;
    font-weight: 500;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-top: 1px;
  }
  .header-badge {
    background: rgba(201,168,76,0.15);
    border: 1px solid rgba(201,168,76,0.3);
    color: var(--gold-light);
    padding: 5px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 0.5px;
  }

  /* ===== MAIN LAYOUT ===== */
  .main {
    max-width: 1280px;
    margin: 0 auto;
    padding: 40px 32px 80px;
  }

  /* ===== HERO SECTION ===== */
  .hero {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 20px;
    margin-bottom: 36px;
  }
  .stat-card {
    background: var(--white);
    border-radius: var(--radius-lg);
    padding: 24px 28px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray-2);
    position: relative;
    overflow: hidden;
  }
  .stat-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--navy-2), var(--gold));
  }
  .stat-label {
    font-size: 12px;
    font-weight: 600;
    color: var(--gray-4);
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 10px;
  }
  .stat-value {
    font-size: 32px;
    font-weight: 800;
    color: var(--navy);
    font-family: 'JetBrains Mono', monospace;
    letter-spacing: -1px;
  }
  .stat-value.gold { color: var(--gold); }
  .stat-value.green { color: var(--green); }
  .stat-sub {
    font-size: 12px;
    color: var(--gray-3);
    margin-top: 4px;
  }

  /* ===== UPLOAD CARD ===== */
  .upload-section {
    background: var(--white);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    border: 1px solid var(--gray-2);
    overflow: hidden;
    margin-bottom: 28px;
  }
  .section-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 24px 32px;
    border-bottom: 1px solid var(--gray-2);
    background: var(--gray-1);
  }
  .section-title {
    font-size: 16px;
    font-weight: 700;
    color: var(--navy);
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .section-title .icon {
    width: 34px;
    height: 34px;
    background: var(--navy);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
  }
  .section-body { padding: 32px; }

  /* ===== DROPZONE ===== */
  .dropzone {
    border: 2px dashed var(--gray-2);
    border-radius: var(--radius-lg);
    padding: 60px 32px;
    text-align: center;
    cursor: pointer;
    transition: var(--transition);
    background: var(--gray-1);
    position: relative;
  }
  .dropzone:hover, .dropzone.dragging {
    border-color: var(--navy-2);
    background: rgba(30,58,95,0.04);
  }
  .dropzone input[type="file"] {
    position: absolute;
    inset: 0;
    opacity: 0;
    cursor: pointer;
    width: 100%;
    height: 100%;
  }
  .drop-icon {
    width: 64px;
    height: 64px;
    margin: 0 auto 20px;
    background: linear-gradient(135deg, var(--navy), var(--navy-2));
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    box-shadow: 0 8px 24px rgba(15,32,64,0.2);
  }
  .drop-title {
    font-size: 17px;
    font-weight: 700;
    color: var(--navy);
    margin-bottom: 8px;
  }
  .drop-sub {
    font-size: 13px;
    color: var(--gray-4);
    line-height: 1.6;
  }
  .drop-sub span {
    font-family: 'JetBrains Mono', monospace;
    background: var(--gray-2);
    padding: 2px 8px;
    border-radius: 4px;
    font-size: 12px;
  }

  /* ===== FILE SELECTED ===== */
  .file-selected {
    display: none;
    align-items: center;
    gap: 16px;
    background: var(--navy);
    color: var(--white);
    border-radius: var(--radius);
    padding: 20px 24px;
    margin-top: 20px;
  }
  .file-selected.show { display: flex; }
  .file-icon-box {
    width: 48px;
    height: 48px;
    background: var(--green);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    flex-shrink: 0;
  }
  .file-name {
    font-weight: 600;
    font-size: 14px;
    font-family: 'JetBrains Mono', monospace;
    word-break: break-all;
  }
  .file-size { font-size: 12px; color: var(--gray-3); margin-top: 2px; }

  /* ===== BUTTONS ===== */
  .btn-row {
    display: flex;
    gap: 12px;
    margin-top: 24px;
    flex-wrap: wrap;
  }
  .btn {
    padding: 12px 28px;
    border-radius: 10px;
    font-weight: 700;
    font-size: 14px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    cursor: pointer;
    border: none;
    transition: var(--transition);
    display: flex;
    align-items: center;
    gap: 8px;
    letter-spacing: 0.2px;
  }
  .btn-primary {
    background: linear-gradient(135deg, var(--navy), var(--navy-2));
    color: var(--white);
    box-shadow: 0 4px 16px rgba(15,32,64,0.25);
  }
  .btn-primary:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(15,32,64,0.35);
  }
  .btn-primary:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none;
  }
  .btn-success {
    background: linear-gradient(135deg, var(--green), #236B36);
    color: var(--white);
    box-shadow: 0 4px 16px rgba(26,122,58,0.25);
  }
  .btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(26,122,58,0.35);
  }
  .btn-outline {
    background: transparent;
    color: var(--gray-4);
    border: 1.5px solid var(--gray-2);
  }
  .btn-outline:hover {
    background: var(--gray-1);
    border-color: var(--gray-3);
  }
  .btn-gold {
    background: linear-gradient(135deg, var(--gold), #B8942A);
    color: var(--navy);
    box-shadow: 0 4px 16px rgba(201,168,76,0.3);
  }
  .btn-gold:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(201,168,76,0.4);
  }

  /* ===== PROGRESS BAR ===== */
  .progress-wrap {
    display: none;
    margin-top: 20px;
  }
  .progress-wrap.show { display: block; }
  .progress-label {
    font-size: 13px;
    font-weight: 600;
    color: var(--navy-2);
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .progress-bar-bg {
    height: 8px;
    background: var(--gray-2);
    border-radius: 99px;
    overflow: hidden;
  }
  .progress-bar-fill {
    height: 100%;
    border-radius: 99px;
    background: linear-gradient(90deg, var(--navy), var(--gold));
    transition: width 0.4s ease;
    width: 0%;
  }

  /* ===== ALERTS ===== */
  .alert {
    padding: 14px 20px;
    border-radius: var(--radius);
    font-size: 13.5px;
    font-weight: 500;
    margin-top: 16px;
    display: none;
    align-items: flex-start;
    gap: 10px;
    line-height: 1.5;
  }
  .alert.show { display: flex; }
  .alert-error { background: #FFF0EE; border-left: 4px solid var(--red); color: var(--red); }
  .alert-warning { background: var(--orange-bg); border-left: 4px solid var(--orange); color: var(--orange); }
  .alert-success { background: var(--green-bg); border-left: 4px solid var(--green); color: var(--green); }

  /* ===== RESULTS SECTION ===== */
  .results-section {
    display: none;
    background: var(--white);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    border: 1px solid var(--gray-2);
    overflow: hidden;
    margin-bottom: 28px;
    animation: fadeUp 0.4s ease;
  }
  .results-section.show { display: block; }
  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  /* ===== TABLE ===== */
  .table-wrap {
    overflow-x: auto;
    padding: 0 0 4px;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13.5px;
  }
  thead th {
    background: var(--navy);
    color: var(--white);
    font-weight: 700;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 14px 16px;
    text-align: left;
    white-space: nowrap;
  }
  thead th:first-child { padding-left: 24px; }
  thead th.right { text-align: right; }
  tbody tr {
    border-bottom: 1px solid var(--gray-2);
    transition: background 0.15s;
  }
  tbody tr:nth-child(even) { background: var(--gray-1); }
  tbody tr:hover { background: rgba(30,58,95,0.05); }
  tbody td {
    padding: 14px 16px;
    color: var(--navy);
    vertical-align: middle;
  }
  tbody td:first-child { padding-left: 24px; color: var(--gray-3); font-weight: 600; }
  .td-right { text-align: right; font-family: 'JetBrains Mono', monospace; font-size: 13px; }
  .td-center { text-align: center; }

  /* TER badge */
  .ter-badge {
    display: inline-flex;
    align-items: center;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.5px;
  }
  .ter-a { background: #EBF5FF; color: #1565C0; }
  .ter-b { background: #FFF3E0; color: #E65100; }
  .ter-c { background: #F3E5F5; color: #7B1FA2; }

  .tarif-pct {
    font-family: 'JetBrains Mono', monospace;
    font-weight: 600;
    font-size: 13px;
    color: var(--navy-2);
  }
  .pajak-val {
    font-family: 'JetBrains Mono', monospace;
    font-weight: 700;
    color: var(--red);
    font-size: 13px;
  }
  .pajak-zero {
    color: var(--green);
  }

  /* ===== TFOOT TOTAL ===== */
  tfoot td {
    padding: 16px 16px;
    font-weight: 800;
    font-size: 14px;
    background: var(--navy);
    color: var(--white);
    border-top: 2px solid var(--gold);
  }
  tfoot td:first-child { padding-left: 24px; }
  tfoot .td-right { text-align: right; font-family: 'JetBrains Mono', monospace; }

  /* ===== SPINNER ===== */
  .spinner {
    width: 18px;
    height: 18px;
    border: 2.5px solid rgba(255,255,255,0.3);
    border-top-color: var(--white);
    border-radius: 50%;
    animation: spin 0.7s linear infinite;
    flex-shrink: 0;
  }
  @keyframes spin { to { transform: rotate(360deg); } }

  /* ===== ERRORS LIST ===== */
  .errors-box {
    display: none;
    background: #FFF5F5;
    border: 1px solid #FED7D7;
    border-radius: var(--radius);
    padding: 20px 24px;
    margin: 0 32px 24px;
  }
  .errors-box.show { display: block; }
  .errors-box h4 { font-size: 14px; color: var(--red); margin-bottom: 10px; }
  .errors-box ul { font-size: 13px; color: #C53030; padding-left: 18px; line-height: 2; }

  /* ===== INFO FORMAT ===== */
  .format-info {
    background: linear-gradient(135deg, var(--navy), var(--navy-2));
    border-radius: var(--radius-lg);
    padding: 28px 32px;
    color: var(--white);
    margin-bottom: 28px;
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 24px;
    align-items: center;
  }
  .format-info h3 {
    font-size: 15px;
    font-weight: 700;
    margin-bottom: 10px;
    color: var(--gold-light);
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .col-list {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
  }
  .col-pill {
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.15);
    padding: 6px 14px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 6px;
  }
  .col-pill .col-letter {
    font-family: 'JetBrains Mono', monospace;
    background: var(--gold);
    color: var(--navy);
    padding: 1px 6px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 700;
  }
  .col-pill.auto {
    background: rgba(201,168,76,0.15);
    border-color: rgba(201,168,76,0.3);
    color: var(--gold-light);
  }
  .ptkp-list {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 8px;
    font-size: 12px;
  }
  .ptkp-item {
    background: rgba(255,255,255,0.07);
    border-radius: 6px;
    padding: 8px 12px;
  }
  .ptkp-item .ter { color: var(--gold); font-weight: 700; font-size: 11px; }

  /* ===== EMPTY STATE ===== */
  .empty-state {
    text-align: center;
    padding: 60px 32px;
    color: var(--gray-3);
  }
  .empty-state .emo { font-size: 48px; margin-bottom: 16px; }
  .empty-state p { font-size: 14px; }

  /* ===== RESPONSIVE ===== */
  @media (max-width: 768px) {
    .main { padding: 20px 16px 60px; }
    .header { padding: 0 20px; }
    .hero { grid-template-columns: 1fr; }
    .format-info { grid-template-columns: 1fr; }
    .ptkp-list { grid-template-columns: 1fr 1fr; }
    .section-body { padding: 20px; }
    .btn-row { flex-direction: column; }
    .btn { width: 100%; justify-content: center; }
  }
</style>
</head>
<body>

<!-- HEADER -->
<header class="header">
  <div class="header-logo">
    <div class="header-icon">🏛️</div>
    <div>
      <div class="header-title">PPh 21 Calculator</div>
      <div class="header-sub">Tarif Efektif Rata-rata · PMK-168/2023</div>
    </div>
  </div>
  <div class="header-badge">ANPAL · 2024</div>
</header>

<!-- MAIN -->
<main class="main">

  <!-- STATS -->
  <div class="hero">
    <div class="stat-card">
      <div class="stat-label">Total Pegawai Diproses</div>
      <div class="stat-value" id="statTotal">—</div>
      <div class="stat-sub">dari file yang diupload</div>
    </div>
    <div class="stat-card">
      <div class="stat-label">Total Gaji Bruto</div>
      <div class="stat-value gold" id="statGaji">—</div>
      <div class="stat-sub">akumulasi semua pegawai</div>
    </div>
    <div class="stat-card">
      <div class="stat-label">Total PPh 21 Terutang</div>
      <div class="stat-value green" id="statPajak">—</div>
      <div class="stat-sub">sebulan · semua pegawai</div>
    </div>
  </div>

  <!-- FORMAT INFO -->
  <div class="format-info">
    <div>
      <h3>📋 Format File Excel yang Diperlukan</h3>
      <div style="margin-bottom:14px;">
        <div style="font-size:12px;color:rgba(255,255,255,0.6);margin-bottom:8px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Kolom Input (diisi user)</div>
        <div class="col-list">
          <div class="col-pill"><span class="col-letter">A</span> Nama Pegawai</div>
          <div class="col-pill"><span class="col-letter">B</span> NPWP</div>
          <div class="col-pill"><span class="col-letter">C</span> Jabatan</div>
          <div class="col-pill"><span class="col-letter">D</span> Status PTKP</div>
          <div class="col-pill"><span class="col-letter">E</span> Jumlah Gaji (Rp)</div>
        </div>
      </div>
      <div>
        <div style="font-size:12px;color:rgba(255,255,255,0.6);margin-bottom:8px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Kolom Output (otomatis sistem)</div>
        <div class="col-list">
          <div class="col-pill auto"><span class="col-letter">F</span> Kategori TER</div>
          <div class="col-pill auto"><span class="col-letter">G</span> Tarif TER (%)</div>
          <div class="col-pill auto"><span class="col-letter">H</span> PPh 21 Sebulan (Rp)</div>
        </div>
      </div>
    </div>
    <div style="min-width:280px;">
      <div style="font-size:12px;color:rgba(255,255,255,0.6);margin-bottom:10px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Status PTKP yang Valid</div>
      <div class="ptkp-list">
        <div class="ptkp-item"><div class="ter">TER A</div>TK/0</div>
        <div class="ptkp-item"><div class="ter">TER B</div>TK/1</div>
        <div class="ptkp-item"><div class="ter">TER B</div>TK/2</div>
        <div class="ptkp-item"><div class="ter">TER B</div>K/0</div>
        <div class="ptkp-item"><div class="ter">TER C</div>TK/3</div>
        <div class="ptkp-item"><div class="ter">TER C</div>K/1</div>
        <div class="ptkp-item"><div class="ter">TER C</div>K/2</div>
        <div class="ptkp-item"><div class="ter">TER C</div>K/3</div>
      </div>
    </div>
  </div>

  <!-- UPLOAD SECTION -->
  <div class="upload-section">
    <div class="section-header">
      <div class="section-title">
        <div class="icon">📤</div>
        Upload File Excel
      </div>
    </div>
    <div class="section-body">
      <div class="dropzone" id="dropzone">
        <input type="file" id="fileInput" accept=".xlsx,.xls">
        <div class="drop-icon">📊</div>
        <div class="drop-title">Drag & Drop file Excel ke sini</div>
        <div class="drop-sub">
          atau klik untuk browse file<br>
          Format yang didukung: <span>.xlsx</span> <span>.xls</span>
        </div>
      </div>

      <div class="file-selected" id="fileSelected">
        <div class="file-icon-box">📄</div>
        <div>
          <div class="file-name" id="fileName">—</div>
          <div class="file-size" id="fileSize">—</div>
        </div>
      </div>

      <div class="progress-wrap" id="progressWrap">
        <div class="progress-label">
          <div class="spinner" style="border-color:rgba(30,58,95,0.2);border-top-color:var(--navy-2);"></div>
          <span id="progressLabel">Memproses file...</span>
        </div>
        <div class="progress-bar-bg">
          <div class="progress-bar-fill" id="progressFill" style="width:0%"></div>
        </div>
      </div>

      <div class="alert alert-error" id="alertError"></div>
      <div class="alert alert-success" id="alertSuccess"></div>

      <div class="btn-row">
        <button class="btn btn-primary" id="btnProcess" disabled>
          ⚡ Proses & Hitung Pajak
        </button>
        <button class="btn btn-outline" id="btnReset" onclick="resetApp()">
          🔄 Reset
        </button>
      </div>
    </div>
  </div>

  <!-- RESULTS SECTION -->
  <div class="results-section" id="resultsSection">
    <div class="section-header">
      <div class="section-title">
        <div class="icon">📊</div>
        Hasil Perhitungan PPh 21
      </div>
      <button class="btn btn-gold" id="btnExport" onclick="exportExcel()">
        ⬇️ Download Excel
      </button>
    </div>

    <div class="errors-box" id="errorsBox">
      <h4>⚠️ Beberapa baris tidak dapat diproses:</h4>
      <ul id="errorsList"></ul>
    </div>

    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <th style="width:50px">No</th>
            <th>Nama Pegawai</th>
            <th>NPWP</th>
            <th>Jabatan</th>
            <th class="td-center">Status PTKP</th>
            <th class="right">Gaji Bruto (Rp)</th>
            <th class="td-center">Kategori TER</th>
            <th class="td-center">Tarif TER</th>
            <th class="right">PPh 21/Bulan (Rp)</th>
          </tr>
        </thead>
        <tbody id="tableBody">
          <tr>
            <td colspan="9">
              <div class="empty-state">
                <div class="emo">📭</div>
                <p>Belum ada data. Upload file Excel terlebih dahulu.</p>
              </div>
            </td>
          </tr>
        </tbody>
        <tfoot id="tableFoot" style="display:none;">
          <tr>
            <td colspan="5">TOTAL</td>
            <td class="td-right" id="footGaji">—</td>
            <td colspan="2"></td>
            <td class="td-right" id="footPajak">—</td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

</main>

<script>
let currentSessionId = null;
let selectedFile = null;

// ===== FORMAT ANGKA =====
function formatRupiah(val) {
  return 'Rp ' + Math.round(val).toLocaleString('id-ID');
}
function formatPct(val) {
  return parseFloat(val).toFixed(2) + '%';
}
function formatBytes(bytes) {
  if (bytes < 1024) return bytes + ' B';
  if (bytes < 1024*1024) return (bytes/1024).toFixed(1) + ' KB';
  return (bytes/1024/1024).toFixed(2) + ' MB';
}

// ===== DRAG & DROP =====
const dropzone = document.getElementById('dropzone');
const fileInput = document.getElementById('fileInput');

dropzone.addEventListener('dragover', e => { e.preventDefault(); dropzone.classList.add('dragging'); });
dropzone.addEventListener('dragleave', () => dropzone.classList.remove('dragging'));
dropzone.addEventListener('drop', e => {
  e.preventDefault();
  dropzone.classList.remove('dragging');
  const f = e.dataTransfer.files[0];
  if (f) handleFileSelect(f);
});
fileInput.addEventListener('change', e => {
  if (e.target.files[0]) handleFileSelect(e.target.files[0]);
});

function handleFileSelect(file) {
  const ext = file.name.split('.').pop().toLowerCase();
  if (!['xlsx','xls'].includes(ext)) {
    showAlert('error', '❌ Format file tidak valid. Harap upload file .xlsx atau .xls');
    return;
  }
  selectedFile = file;
  document.getElementById('fileName').textContent = file.name;
  document.getElementById('fileSize').textContent = formatBytes(file.size);
  document.getElementById('fileSelected').classList.add('show');
  document.getElementById('btnProcess').disabled = false;
  hideAlert('error');
  hideAlert('success');
}

// ===== PROCESS =====
document.getElementById('btnProcess').addEventListener('click', processFile);

async function processFile() {
  if (!selectedFile) return;

  const btn = document.getElementById('btnProcess');
  btn.disabled = true;
  btn.innerHTML = '<div class="spinner"></div> Memproses...';

  showProgress(true);
  animateProgress();
  hideAlert('error');
  hideAlert('success');

  const fd = new FormData();
  fd.append('excel_file', selectedFile);

  try {
    const res = await fetch('api/upload.php', { method: 'POST', body: fd });
    const data = await res.json();

    if (!data.success) {
      showAlert('error', '❌ ' + (data.message || 'Terjadi kesalahan saat memproses file'));
    } else {
      currentSessionId = data.session_id;
      renderResults(data);
      showAlert('success', `✅ Berhasil memproses ${data.total} pegawai. File upload telah dihapus dari server.`);
    }
  } catch(e) {
    showAlert('error', '❌ Gagal terhubung ke server. Pastikan konfigurasi database sudah benar.');
  } finally {
    showProgress(false);
    btn.disabled = false;
    btn.innerHTML = '⚡ Proses & Hitung Pajak';
  }
}

function animateProgress() {
  const fill = document.getElementById('progressFill');
  const label = document.getElementById('progressLabel');
  const steps = [
    [0.5, 'Membaca file Excel...'],
    [1.2, 'Validasi kolom data...'],
    [2.5, 'Mencocokkan tarif TER...'],
    [3.8, 'Menghitung PPh 21...'],
    [5.0, 'Menyimpan hasil...'],
  ];
  let pct = 0;
  const interval = setInterval(() => {
    pct = Math.min(pct + 3, 90);
    fill.style.width = pct + '%';
  }, 80);

  steps.forEach(([t, msg]) => setTimeout(() => { label.textContent = msg; }, t * 1000));

  // Store interval to clear later
  window._progressInterval = interval;
}

function showProgress(show) {
  const wrap = document.getElementById('progressWrap');
  if (show) {
    wrap.classList.add('show');
    document.getElementById('progressFill').style.width = '0%';
  } else {
    clearInterval(window._progressInterval);
    document.getElementById('progressFill').style.width = '100%';
    setTimeout(() => wrap.classList.remove('show'), 600);
  }
}

// ===== RENDER RESULTS =====
function renderResults(data) {
  const section = document.getElementById('resultsSection');
  const tbody = document.getElementById('tableBody');
  const tfoot = document.getElementById('tableFoot');

  // Stats
  let totalGaji = 0, totalPajak = 0;
  data.data.forEach(r => {
    totalGaji  += r.jumlah_gaji;
    totalPajak += r.nominal_pajak;
  });

  document.getElementById('statTotal').textContent = data.total;
  document.getElementById('statGaji').textContent  = formatRupiah(totalGaji);
  document.getElementById('statPajak').textContent = formatRupiah(totalPajak);

  // Errors
  if (data.errors && data.errors.length > 0) {
    document.getElementById('errorsBox').classList.add('show');
    document.getElementById('errorsList').innerHTML = data.errors.map(e => `<li>${e}</li>`).join('');
  }

  // Rows
  tbody.innerHTML = data.data.map((r, i) => {
    const terClass = r.kategori_ter === 'TER A' ? 'ter-a' : (r.kategori_ter === 'TER B' ? 'ter-b' : 'ter-c');
    const pajakClass = r.nominal_pajak === 0 ? 'pajak-zero' : 'pajak-val';
    return `<tr>
      <td>${i+1}</td>
      <td><strong>${escHtml(r.nama_pegawai)}</strong></td>
      <td style="font-family:'JetBrains Mono',monospace;font-size:12px;color:var(--gray-4)">${escHtml(r.npwp || '—')}</td>
      <td>${escHtml(r.jabatan || '—')}</td>
      <td class="td-center"><strong>${escHtml(r.status_ptkp)}</strong></td>
      <td class="td-right">${formatRupiah(r.jumlah_gaji)}</td>
      <td class="td-center"><span class="ter-badge ${terClass}">${escHtml(r.kategori_ter || '—')}</span></td>
      <td class="td-center tarif-pct">${formatPct(r.persentase_ter)}</td>
      <td class="td-right"><span class="${pajakClass}">${formatRupiah(r.nominal_pajak)}</span></td>
    </tr>`;
  }).join('');

  // Footer
  document.getElementById('footGaji').textContent  = formatRupiah(totalGaji);
  document.getElementById('footPajak').textContent = formatRupiah(totalPajak);
  tfoot.style.display = '';
  section.classList.add('show');

  // Scroll to results
  setTimeout(() => section.scrollIntoView({ behavior: 'smooth', block: 'start' }), 100);
}

// ===== EXPORT =====
function exportExcel() {
  if (!currentSessionId) return;
  window.location.href = 'api/export.php?session_id=' + currentSessionId;
}

// ===== RESET =====
function resetApp() {
  if (currentSessionId) {
    fetch('api/delete_session.php', {
      method: 'POST',
      headers: {'Content-Type':'application/json'},
      body: JSON.stringify({session_id: currentSessionId})
    });
    currentSessionId = null;
  }
  selectedFile = null;
  fileInput.value = '';
  document.getElementById('fileSelected').classList.remove('show');
  document.getElementById('btnProcess').disabled = true;
  document.getElementById('resultsSection').classList.remove('show');
  document.getElementById('errorsBox').classList.remove('show');
  document.getElementById('tableBody').innerHTML = `<tr><td colspan="9"><div class="empty-state"><div class="emo">📭</div><p>Belum ada data. Upload file Excel terlebih dahulu.</p></div></td></tr>`;
  document.getElementById('tableFoot').style.display = 'none';
  document.getElementById('statTotal').textContent = '—';
  document.getElementById('statGaji').textContent  = '—';
  document.getElementById('statPajak').textContent = '—';
  hideAlert('error');
  hideAlert('success');
}

// ===== HELPERS =====
function showAlert(type, msg) {
  const el = document.getElementById('alert' + (type === 'error' ? 'Error' : 'Success'));
  el.textContent = msg;
  el.classList.add('show');
}
function hideAlert(type) {
  const el = document.getElementById('alert' + (type === 'error' ? 'Error' : 'Success'));
  el.classList.remove('show');
}
function escHtml(str) {
  if (!str) return '';
  return String(str).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}
</script>
</body>
</html>
