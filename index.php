<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PPh 21 Calculator — ANPAL</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --navy: #0F2040;
      --navy-2: #1E3A5F;
      --navy-3: #2B5080;
      --gold: #C9A84C;
      --gold-light: #F0D080;
      --cream: #F8F5EE;
      --white: #FFFFFF;
      --gray-1: #F1F4F8;
      --gray-2: #E2E8F0;
      --gray-3: #94A3B8;
      --gray-4: #64748B;
      --red: #C0392B;
      --green: #1A7A3A;
      --green-bg: #E8F5EC;
      --orange: #D97706;
      --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.08);
      --shadow: 0 4px 16px rgba(15, 32, 64, 0.10);
      --shadow-lg: 0 12px 40px rgba(15, 32, 64, 0.18);
      --radius: 12px;
      --radius-lg: 18px;
      --transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    }

    *,
    *::before,
    *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

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
      box-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
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
      background: rgba(201, 168, 76, 0.15);
      border: 1px solid rgba(201, 168, 76, 0.3);
      color: var(--gold-light);
      padding: 5px 14px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
    }

    /* ===== MAIN ===== */
    .main {
      max-width: 1100px;
      margin: 0 auto;
      padding: 36px 28px 80px;
    }

    /* ===== STATS ===== */
    .hero {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap: 18px;
      margin-bottom: 32px;
    }

    .stat-card {
      background: var(--white);
      border-radius: var(--radius-lg);
      padding: 22px 26px;
      box-shadow: var(--shadow-sm);
      border: 1px solid var(--gray-2);
      position: relative;
      overflow: hidden;
    }

    .stat-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--navy-2), var(--gold));
    }

    .stat-label {
      font-size: 11px;
      font-weight: 600;
      color: var(--gray-4);
      text-transform: uppercase;
      letter-spacing: 0.8px;
      margin-bottom: 8px;
    }

    .stat-value {
      font-size: 28px;
      font-weight: 800;
      color: var(--navy);
      font-family: 'JetBrains Mono', monospace;
      letter-spacing: -1px;
    }

    .stat-value.gold {
      color: var(--gold);
    }

    .stat-value.green {
      color: var(--green);
    }

    .stat-sub {
      font-size: 11px;
      color: var(--gray-3);
      margin-top: 4px;
    }

    /* ===== TAB SWITCHER ===== */
    .tab-wrapper {
      background: var(--white);
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow);
      border: 1px solid var(--gray-2);
      overflow: hidden;
      margin-bottom: 28px;
    }

    .tab-bar {
      display: grid;
      grid-template-columns: 1fr 1fr;
      border-bottom: 1px solid var(--gray-2);
      background: var(--gray-1);
    }

    .tab-btn {
      padding: 18px 24px;
      border: none;
      background: transparent;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 14px;
      font-weight: 600;
      color: var(--gray-4);
      cursor: pointer;
      transition: var(--transition);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 9px;
      border-bottom: 3px solid transparent;
      position: relative;
    }

    .tab-btn:hover {
      color: var(--navy-2);
      background: rgba(30, 58, 95, 0.04);
    }

    .tab-btn.active {
      color: var(--navy);
      background: var(--white);
      border-bottom-color: var(--gold);
    }

    .tab-btn .tab-icon {
      width: 30px;
      height: 30px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 15px;
      background: var(--gray-2);
      transition: var(--transition);
    }

    .tab-btn.active .tab-icon {
      background: var(--navy);
    }

    .tab-pane {
      display: none;
      padding: 32px;
    }

    .tab-pane.active {
      display: block;
    }

    /* ===== FORMAT INFO BAR ===== */
    .format-bar {
      background: linear-gradient(135deg, var(--navy), var(--navy-2));
      border-radius: var(--radius);
      padding: 20px 24px;
      display: flex;
      gap: 32px;
      flex-wrap: wrap;
      margin-bottom: 28px;
      align-items: flex-start;
    }

    .format-bar-section {
      flex: 1;
      min-width: 200px;
    }

    .format-bar h4 {
      font-size: 11px;
      font-weight: 700;
      color: var(--gold);
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 10px;
    }

    .col-pills {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
    }

    .col-pill {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.12);
      padding: 5px 12px;
      border-radius: 7px;
      font-size: 12px;
      font-weight: 500;
      color: rgba(255, 255, 255, 0.85);
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .col-pill .ltr {
      font-family: 'JetBrains Mono', monospace;
      background: var(--gold);
      color: var(--navy);
      padding: 1px 6px;
      border-radius: 4px;
      font-size: 11px;
      font-weight: 700;
    }

    .col-pill.auto {
      background: rgba(201, 168, 76, 0.12);
      border-color: rgba(201, 168, 76, 0.25);
      color: var(--gold-light);
    }

    .ptkp-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 6px;
    }

    .ptkp-item {
      background: rgba(255, 255, 255, 0.06);
      border-radius: 6px;
      padding: 6px 10px;
      font-size: 11px;
      color: rgba(255, 255, 255, 0.75);
    }

    .ptkp-item .ter {
      color: var(--gold);
      font-weight: 700;
      font-size: 10px;
      margin-bottom: 1px;
    }

    /* ===== DROPZONE ===== */
    .dropzone {
      border: 2px dashed var(--gray-2);
      border-radius: var(--radius-lg);
      padding: 52px 32px;
      text-align: center;
      cursor: pointer;
      transition: var(--transition);
      background: var(--gray-1);
      position: relative;
    }

    .dropzone:hover,
    .dropzone.dragging {
      border-color: var(--navy-2);
      background: rgba(30, 58, 95, 0.04);
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
      width: 60px;
      height: 60px;
      margin: 0 auto 18px;
      background: linear-gradient(135deg, var(--navy), var(--navy-2));
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 26px;
      box-shadow: 0 8px 24px rgba(15, 32, 64, 0.2);
    }

    .drop-title {
      font-size: 16px;
      font-weight: 700;
      color: var(--navy);
      margin-bottom: 6px;
    }

    .drop-sub {
      font-size: 13px;
      color: var(--gray-4);
      line-height: 1.7;
    }

    .drop-sub span {
      font-family: 'JetBrains Mono', monospace;
      background: var(--gray-2);
      padding: 1px 7px;
      border-radius: 4px;
      font-size: 12px;
    }

    .file-selected {
      display: none;
      align-items: center;
      gap: 14px;
      background: var(--navy);
      color: var(--white);
      border-radius: var(--radius);
      padding: 16px 20px;
      margin-top: 16px;
    }

    .file-selected.show {
      display: flex;
    }

    .file-icon-box {
      width: 44px;
      height: 44px;
      background: var(--green);
      border-radius: 9px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      flex-shrink: 0;
    }

    .file-name {
      font-weight: 600;
      font-size: 13px;
      font-family: 'JetBrains Mono', monospace;
      word-break: break-all;
    }

    .file-size {
      font-size: 11px;
      color: var(--gray-3);
      margin-top: 2px;
    }

    /* ===== CALCULATOR FORM ===== */
    .calc-intro {
      background: linear-gradient(135deg, #EBF4FF, #F0F7FF);
      border: 1px solid #C3DAFF;
      border-radius: var(--radius);
      padding: 16px 20px;
      margin-bottom: 28px;
      display: flex;
      align-items: center;
      gap: 12px;
      font-size: 13.5px;
      color: var(--navy-2);
    }

    .calc-intro .ci-icon {
      font-size: 22px;
      flex-shrink: 0;
    }

    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .form-grid.full {
      grid-template-columns: 1fr;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 7px;
    }

    .form-label {
      font-size: 12px;
      font-weight: 700;
      color: var(--navy-2);
      text-transform: uppercase;
      letter-spacing: 0.6px;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .form-label .req {
      color: var(--red);
    }

    .form-input,
    .form-select {
      padding: 12px 16px;
      border: 1.5px solid var(--gray-2);
      border-radius: var(--radius);
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 14px;
      color: var(--navy);
      background: var(--white);
      transition: var(--transition);
      outline: none;
    }

    .form-input:focus,
    .form-select:focus {
      border-color: var(--navy-2);
      box-shadow: 0 0 0 3px rgba(30, 58, 95, 0.08);
    }

    .form-input.mono {
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
    }

    .form-select {
      cursor: pointer;
      appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%2364748B' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 14px center;
      padding-right: 40px;
    }

    .input-prefix-wrap {
      position: relative;
    }

    .input-prefix {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 13px;
      font-weight: 600;
      color: var(--gray-4);
      font-family: 'JetBrains Mono', monospace;
      pointer-events: none;
    }

    .input-prefix-wrap .form-input {
      padding-left: 42px;
      font-family: 'JetBrains Mono', monospace;
    }

    .form-hint {
      font-size: 11px;
      color: var(--gray-3);
      margin-top: 2px;
    }

    /* ===== BUTTONS ===== */
    .btn-row {
      display: flex;
      gap: 10px;
      margin-top: 24px;
      flex-wrap: wrap;
    }

    .btn {
      padding: 12px 26px;
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
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--navy), var(--navy-2));
      color: var(--white);
      box-shadow: 0 4px 16px rgba(15, 32, 64, 0.25);
    }

    .btn-primary:hover:not(:disabled) {
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(15, 32, 64, 0.35);
    }

    .btn-primary:disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }

    .btn-gold {
      background: linear-gradient(135deg, var(--gold), #B8942A);
      color: var(--navy);
      box-shadow: 0 4px 16px rgba(201, 168, 76, 0.3);
    }

    .btn-gold:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(201, 168, 76, 0.4);
    }

    .btn-outline {
      background: transparent;
      color: var(--gray-4);
      border: 1.5px solid var(--gray-2);
    }

    .btn-outline:hover {
      background: var(--gray-1);
      border-color: var(--gray-3);
      color: var(--navy);
    }

    .btn-success {
      background: linear-gradient(135deg, var(--green), #236B36);
      color: var(--white);
      box-shadow: 0 4px 16px rgba(26, 122, 58, 0.25);
    }

    .btn-success:hover {
      transform: translateY(-2px);
    }

    .btn-danger {
      background: linear-gradient(135deg, var(--red), #9B2318);
      color: var(--white);
    }

    .btn-danger:hover {
      transform: translateY(-2px);
    }

    /* ===== PROGRESS ===== */
    .progress-wrap {
      display: none;
      margin-top: 18px;
    }

    .progress-wrap.show {
      display: block;
    }

    .progress-label {
      font-size: 13px;
      font-weight: 600;
      color: var(--navy-2);
      margin-bottom: 8px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .progress-bar-bg {
      height: 7px;
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
      padding: 13px 18px;
      border-radius: var(--radius);
      font-size: 13.5px;
      font-weight: 500;
      margin-top: 14px;
      display: none;
      align-items: flex-start;
      gap: 10px;
      line-height: 1.5;
    }

    .alert.show {
      display: flex;
    }

    .alert-error {
      background: #FFF0EE;
      border-left: 4px solid var(--red);
      color: var(--red);
    }

    .alert-success {
      background: var(--green-bg);
      border-left: 4px solid var(--green);
      color: var(--green);
    }

    /* ===== RESULTS TABLE ===== */
    .results-section {
      display: none;
      background: var(--white);
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow);
      border: 1px solid var(--gray-2);
      overflow: hidden;
      margin-bottom: 28px;
      animation: fadeUp 0.35s ease;
    }

    .results-section.show {
      display: block;
    }

    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(16px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .section-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 28px;
      border-bottom: 1px solid var(--gray-2);
      background: var(--gray-1);
    }

    .section-title {
      font-size: 15px;
      font-weight: 700;
      color: var(--navy);
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .section-title .icon {
      width: 32px;
      height: 32px;
      background: var(--navy);
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 15px;
    }

    .table-wrap {
      overflow-x: auto;
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
      font-size: 11.5px;
      text-transform: uppercase;
      letter-spacing: 0.4px;
      padding: 13px 15px;
      text-align: left;
      white-space: nowrap;
    }

    thead th:first-child {
      padding-left: 22px;
    }

    thead th.right {
      text-align: right;
    }

    tbody tr {
      border-bottom: 1px solid var(--gray-2);
      transition: background 0.15s;
    }

    tbody tr:nth-child(even) {
      background: var(--gray-1);
    }

    tbody tr:hover {
      background: rgba(30, 58, 95, 0.05);
    }

    tbody td {
      padding: 13px 15px;
      vertical-align: middle;
    }

    tbody td:first-child {
      padding-left: 22px;
      color: var(--gray-3);
      font-weight: 600;
    }

    .td-right {
      text-align: right;
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
    }

    .td-center {
      text-align: center;
    }

    .ter-badge {
      display: inline-flex;
      align-items: center;
      padding: 3px 11px;
      border-radius: 20px;
      font-size: 11px;
      font-weight: 700;
    }

    .ter-a {
      background: #EBF5FF;
      color: #1565C0;
    }

    .ter-b {
      background: #FFF3E0;
      color: #E65100;
    }

    .ter-c {
      background: #F3E5F5;
      color: #7B1FA2;
    }

    .pajak-val {
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      color: var(--red);
    }

    .pajak-zero {
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      color: var(--green);
    }

    tfoot td {
      padding: 15px;
      font-weight: 800;
      font-size: 14px;
      background: var(--navy);
      color: var(--white);
      border-top: 2px solid var(--gold);
    }

    tfoot td:first-child {
      padding-left: 22px;
    }

    .errors-box {
      display: none;
      background: #FFF5F5;
      border: 1px solid #FED7D7;
      border-radius: var(--radius);
      padding: 18px 22px;
      margin: 0 28px 20px;
    }

    .errors-box.show {
      display: block;
    }

    .errors-box h4 {
      font-size: 13px;
      color: var(--red);
      margin-bottom: 8px;
    }

    .errors-box ul {
      font-size: 12px;
      color: #C53030;
      padding-left: 16px;
      line-height: 2;
    }

    /* ===== MODAL ===== */
    .modal-overlay {
      display: none;
      position: fixed;
      inset: 0;
      z-index: 999;
      background: rgba(10, 20, 40, 0.65);
      backdrop-filter: blur(4px);
      align-items: center;
      justify-content: center;
      padding: 20px;
      animation: fadeOverlay 0.2s ease;
    }

    .modal-overlay.show {
      display: flex;
    }

    @keyframes fadeOverlay {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    .modal {
      background: var(--white);
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow-lg);
      width: 100%;
      max-width: 560px;
      overflow: hidden;
      animation: slideModal 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
      position: relative;
    }

    @keyframes slideModal {
      from {
        opacity: 0;
        transform: scale(0.88) translateY(20px);
      }

      to {
        opacity: 1;
        transform: scale(1) translateY(0);
      }
    }

    .modal-header {
      background: linear-gradient(135deg, var(--navy), var(--navy-2));
      padding: 24px 28px;
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 16px;
    }

    .modal-header-icon {
      width: 52px;
      height: 52px;
      flex-shrink: 0;
      background: rgba(255, 255, 255, 0.12);
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 26px;
      margin-right: 4px;
    }

    .modal-header-text .modal-title {
      color: var(--white);
      font-size: 18px;
      font-weight: 800;
    }

    .modal-header-text .modal-sub {
      color: rgba(255, 255, 255, 0.55);
      font-size: 12px;
      margin-top: 3px;
    }

    .modal-close {
      width: 32px;
      height: 32px;
      flex-shrink: 0;
      background: rgba(255, 255, 255, 0.12);
      border: none;
      border-radius: 8px;
      color: var(--white);
      font-size: 18px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: var(--transition);
      margin-top: 2px;
    }

    .modal-close:hover {
      background: rgba(255, 255, 255, 0.22);
    }

    .modal-body {
      padding: 28px;
    }

    /* Pegawai info */
    .modal-pegawai {
      background: var(--gray-1);
      border-radius: var(--radius);
      padding: 16px 20px;
      margin-bottom: 22px;
    }

    .modal-pegawai-name {
      font-size: 17px;
      font-weight: 800;
      color: var(--navy);
    }

    .modal-pegawai-meta {
      font-size: 12.5px;
      color: var(--gray-4);
      margin-top: 4px;
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
    }

    .modal-pegawai-meta span {
      display: flex;
      align-items: center;
      gap: 4px;
    }

    /* Result rows */
    .modal-rows {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-bottom: 24px;
    }

    .modal-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 13px 18px;
      border-radius: var(--radius);
      border: 1px solid var(--gray-2);
    }

    .modal-row.highlight {
      background: linear-gradient(135deg, #FFF8ED, #FFFBF3);
      border-color: rgba(201, 168, 76, 0.35);
    }

    .modal-row.pajak-row {
      background: linear-gradient(135deg, #FFF5F5, #FFF8F8);
      border-color: rgba(192, 57, 43, 0.25);
      padding: 16px 18px;
    }

    .modal-row .row-label {
      font-size: 12px;
      font-weight: 600;
      color: var(--gray-4);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .modal-row .row-val {
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      font-size: 14px;
      color: var(--navy);
    }

    .modal-row.highlight .row-val {
      color: var(--orange);
    }

    .modal-row.pajak-row .row-label {
      font-size: 13px;
      color: var(--red);
    }

    .modal-row.pajak-row .row-val {
      font-size: 20px;
      color: var(--red);
    }

    .modal-row.pajak-row .row-val.zero {
      color: var(--green);
    }

    /* Annual estimate */
    .modal-annual {
      background: var(--green-bg);
      border: 1px solid rgba(26, 122, 58, 0.2);
      border-radius: var(--radius);
      padding: 14px 18px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 22px;
    }

    .modal-annual .al {
      font-size: 12px;
      font-weight: 600;
      color: var(--green);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .modal-annual .av {
      font-family: 'JetBrains Mono', monospace;
      font-weight: 800;
      font-size: 16px;
      color: var(--green);
    }

    .modal-footer {
      display: flex;
      gap: 10px;
      padding-top: 4px;
    }

    .modal-footer .btn {
      flex: 1;
      justify-content: center;
    }

    /* ===== SPINNER ===== */
    .spinner {
      width: 17px;
      height: 17px;
      border: 2.5px solid rgba(255, 255, 255, 0.3);
      border-top-color: var(--white);
      border-radius: 50%;
      animation: spin 0.7s linear infinite;
      flex-shrink: 0;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 700px) {
      .main {
        padding: 18px 14px 60px;
      }

      .header {
        padding: 0 18px;
      }

      .hero {
        grid-template-columns: 1fr;
        gap: 12px;
      }

      .form-grid {
        grid-template-columns: 1fr;
      }

      .ptkp-grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .tab-btn {
        font-size: 13px;
        padding: 14px 12px;
      }

      .tab-pane {
        padding: 20px;
      }

      .modal {
        max-width: 100%;
      }
    }
  </style>
</head>

<body>

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

    <!-- TAB WRAPPER -->
    <div class="tab-wrapper">
      <div class="tab-bar">
        <button class="tab-btn active" onclick="switchTab('upload', this)">
          <div class="tab-icon">📤</div>
          Upload Excel — Batch Pegawai
        </button>
        <button class="tab-btn" onclick="switchTab('calc', this)">
          <div class="tab-icon">🧮</div>
          Kalkulator — Hitung Per Orang
        </button>
      </div>

      <!-- ===== TAB: UPLOAD ===== -->
      <div class="tab-pane active" id="pane-upload">

        <div class="format-bar">
          <div class="format-bar-section">
            <h4>📋 Kolom Input (diisi user)</h4>
            <div class="col-pills">
              <div class="col-pill"><span class="ltr">A</span> Nama Pegawai</div>
              <div class="col-pill"><span class="ltr">B</span> NPWP</div>
              <div class="col-pill"><span class="ltr">C</span> Jabatan</div>
              <div class="col-pill"><span class="ltr">D</span> Status PTKP</div>
              <div class="col-pill"><span class="ltr">E</span> Jumlah Gaji (Rp)</div>
            </div>
          </div>
          <div class="format-bar-section">
            <h4>⚡ Output Otomatis Sistem</h4>
            <div class="col-pills">
              <div class="col-pill auto"><span class="ltr">F</span> Kategori TER</div>
              <div class="col-pill auto"><span class="ltr">G</span> Tarif TER (%)</div>
              <div class="col-pill auto"><span class="ltr">H</span> PPh 21 / Bulan</div>
            </div>
          </div>
          <div class="format-bar-section">
            <h4>🏷️ Status PTKP Valid</h4>
            <div class="ptkp-grid">
              <div class="ptkp-item">
                <div class="ter">TER A</div>TK/0
              </div>
              <div class="ptkp-item">
                <div class="ter">TER B</div>TK/1
              </div>
              <div class="ptkp-item">
                <div class="ter">TER B</div>TK/2
              </div>
              <div class="ptkp-item">
                <div class="ter">TER B</div>K/0
              </div>
              <div class="ptkp-item">
                <div class="ter">TER C</div>TK/3
              </div>
              <div class="ptkp-item">
                <div class="ter">TER C</div>K/1
              </div>
              <div class="ptkp-item">
                <div class="ter">TER C</div>K/2
              </div>
              <div class="ptkp-item">
                <div class="ter">TER C</div>K/3
              </div>
            </div>
          </div>
        </div>

        <div class="dropzone" id="dropzone">
          <input type="file" id="fileInput" accept=".xlsx,.xls">
          <div class="drop-icon">📊</div>
          <div class="drop-title">Drag & Drop file Excel ke sini</div>
          <div class="drop-sub">atau klik untuk browse · Format: <span>.xlsx</span> <span>.xls</span></div>
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
            <div class="progress-bar-fill" id="progressFill"></div>
          </div>
        </div>

        <div class="alert alert-error" id="alertError"></div>
        <div class="alert alert-success" id="alertSuccess"></div>

        <div class="btn-row">
          <button class="btn btn-primary" id="btnProcess" disabled onclick="processFile()">⚡ Proses & Hitung Pajak</button>
          <button class="btn btn-outline" onclick="resetUpload()">🔄 Reset</button>
        </div>
      </div><!-- /pane-upload -->

      <!-- ===== TAB: KALKULATOR ===== -->
      <div class="tab-pane" id="pane-calc">

        <div class="calc-intro">
          <div class="ci-icon">💡</div>
          <div>Hitung PPh 21 untuk <strong>satu orang</strong> secara cepat. Isi form di bawah lalu klik <strong>Hitung Sekarang</strong> — hasil langsung muncul di modal.</div>
        </div>

        <div class="form-grid">
          <div class="form-group">
            <label class="form-label">Nama Pegawai <span class="req">*</span></label>
            <input type="text" id="cNama" class="form-input" placeholder="Contoh: Budi Santoso">
          </div>
          <div class="form-group">
            <label class="form-label">NPWP</label>
            <input type="text" id="cNpwp" class="form-input mono" placeholder="00.000.000.0-000.000">
            <span class="form-hint">Opsional</span>
          </div>
          <div class="form-group">
            <label class="form-label">Jabatan</label>
            <input type="text" id="cJabatan" class="form-input" placeholder="Contoh: Staff Keuangan">
          </div>
          <div class="form-group">
            <label class="form-label">Status PTKP <span class="req">*</span></label>
            <select id="cPtkp" class="form-select">
              <option value="">— Pilih Status PTKP —</option>
              <optgroup label="TER A">
                <option value="TK/0">TK/0 — Tidak Kawin, 0 Tanggungan</option>
              </optgroup>
              <optgroup label="TER B">
                <option value="TK/1">TK/1 — Tidak Kawin, 1 Tanggungan</option>
                <option value="TK/2">TK/2 — Tidak Kawin, 2 Tanggungan</option>
                <option value="K/0">K/0 — Kawin, 0 Tanggungan</option>
              </optgroup>
              <optgroup label="TER C">
                <option value="TK/3">TK/3 — Tidak Kawin, 3 Tanggungan</option>
                <option value="K/1">K/1 — Kawin, 1 Tanggungan</option>
                <option value="K/2">K/2 — Kawin, 2 Tanggungan</option>
                <option value="K/3">K/3 — Kawin, 3 Tanggungan</option>
              </optgroup>
            </select>
          </div>
          <div class="form-group" style="grid-column: 1 / -1;">
            <label class="form-label">Gaji Bruto per Bulan <span class="req">*</span></label>
            <div class="input-prefix-wrap">
              <span class="input-prefix">Rp</span>
              <input type="text" id="cGaji" class="form-input" placeholder="10.000.000"
                oninput="formatGajiInput(this)">
            </div>
            <span class="form-hint">Masukkan total gaji bruto sebulan (termasuk tunjangan tetap)</span>
          </div>
        </div>

        <div class="alert alert-error" id="calcError"></div>

        <!-- State: belum hitung -->
        <div class="btn-row" id="btnRowBefore">
          <button class="btn btn-primary" onclick="hitungManual()">🧮 Hitung</button>
        </div>

        <!-- State: sudah hitung -->
        <div class="btn-row" id="btnRowAfter" style="display:none;">
          <button class="btn btn-gold" onclick="openModal()">📋 Lihat Hasil</button>
          <button class="btn btn-outline" onclick="resetCalc()">🔄 Reset</button>
        </div>

      </div><!-- /pane-calc -->
    </div><!-- /tab-wrapper -->

    <!-- RESULTS (upload) -->
    <div class="results-section" id="resultsSection">
      <div class="section-header">
        <div class="section-title">
          <div class="icon">📊</div>
          Hasil Perhitungan PPh 21
        </div>
        <button class="btn btn-gold" onclick="exportExcel()">⬇️ Download Excel</button>
      </div>
      <div class="errors-box" id="errorsBox">
        <h4>⚠️ Beberapa baris tidak dapat diproses:</h4>
        <ul id="errorsList"></ul>
      </div>
      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th style="width:46px">No</th>
              <th>Nama Pegawai</th>
              <th>NPWP</th>
              <th>Jabatan</th>
              <th class="td-center">PTKP</th>
              <th class="right">Gaji Bruto (Rp)</th>
              <th class="td-center">TER</th>
              <th class="td-center">Tarif</th>
              <th class="right">PPh 21/Bln (Rp)</th>
            </tr>
          </thead>
          <tbody id="tableBody">
            <tr>
              <td colspan="9" style="text-align:center;padding:40px;color:var(--gray-3);font-size:13px;">Belum ada data — upload file Excel di atas</td>
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

  <!-- ===== MODAL HASIL KALKULATOR ===== -->
  <div class="modal-overlay" id="modalOverlay">
    <div class="modal" id="modalBox">
      <div class="modal-header">
        <div style="display:flex;align-items:center;gap:14px;">
          <div class="modal-header-icon">🧾</div>
          <div class="modal-header-text">
            <div class="modal-title">Hasil Perhitungan PPh 21</div>
            <div class="modal-sub">Berdasarkan PMK-168/PMK.010/2023 · TER</div>
          </div>
        </div>

      </div>

      <div class="modal-body">
        <!-- Pegawai info -->
        <div class="modal-pegawai">
          <div class="modal-pegawai-name" id="mNama">—</div>
          <div class="modal-pegawai-meta">
            <span>🪪 <span id="mNpwp">—</span></span>
            <span>💼 <span id="mJabatan">—</span></span>
            <span>👨‍👩‍👧 <span id="mPtkp">—</span></span>
          </div>
        </div>

        <!-- Detail rows -->
        <div class="modal-rows">
          <div class="modal-row">
            <div class="row-label">Gaji Bruto / Bulan</div>
            <div class="row-val" id="mGaji">—</div>
          </div>
          <div class="modal-row highlight">
            <div>
              <div class="row-label">Kategori TER</div>
              <div style="font-size:11px;color:var(--gray-3);margin-top:2px;" id="mTerDesc">—</div>
            </div>
            <div style="text-align:right;">
              <div id="mTerBadge" style="margin-bottom:4px;"></div>
              <div class="row-val" id="mTarif">—</div>
            </div>
          </div>
          <div class="modal-row pajak-row">
            <div class="row-label">💰 PPh 21 Terutang / Bulan</div>
            <div class="row-val" id="mPajak">—</div>
          </div>
        </div>

        <!-- Annual -->
        <div class="modal-annual">
          <div class="al">📅 Estimasi PPh 21 Setahun</div>
          <div class="av" id="mAnnual">—</div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-outline" onclick="closeModal()">🧮 Kembali</button>
          <!-- <button class="btn btn-danger" onclick="resetCalc()">🔄 Reset Form</button> -->
        </div>
      </div>
    </div>
  </div>

  <script>
    let currentSessionId = null;
    let selectedFile = null;

    // ===== TAB SWITCHER =====
    function switchTab(tab, btn) {
      document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
      document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
      btn.classList.add('active');
      document.getElementById('pane-' + tab).classList.add('active');
    }

    // ===== FORMAT HELPERS =====
    function formatRupiah(val) {
      return 'Rp ' + Math.round(val).toLocaleString('id-ID');
    }

    function formatBytes(bytes) {
      if (bytes < 1024) return bytes + ' B';
      if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
      return (bytes / 1024 / 1024).toFixed(2) + ' MB';
    }

    function formatGajiInput(el) {
      let raw = el.value.replace(/\D/g, '');
      if (!raw) {
        el.value = '';
        return;
      }
      el.value = parseInt(raw).toLocaleString('id-ID');
    }

    function parseGaji(str) {
      return parseFloat(String(str).replace(/\./g, '').replace(',', '.')) || 0;
    }

    function escHtml(s) {
      return String(s || '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    }

    // ===== DRAG & DROP UPLOAD =====
    const dropzone = document.getElementById('dropzone');
    const fileInput = document.getElementById('fileInput');
    dropzone.addEventListener('dragover', e => {
      e.preventDefault();
      dropzone.classList.add('dragging');
    });
    dropzone.addEventListener('dragleave', () => dropzone.classList.remove('dragging'));
    dropzone.addEventListener('drop', e => {
      e.preventDefault();
      dropzone.classList.remove('dragging');
      if (e.dataTransfer.files[0]) handleFileSelect(e.dataTransfer.files[0]);
    });
    fileInput.addEventListener('change', e => {
      if (e.target.files[0]) handleFileSelect(e.target.files[0]);
    });

    function handleFileSelect(file) {
      const ext = file.name.split('.').pop().toLowerCase();
      if (!['xlsx', 'xls'].includes(ext)) {
        showUploadAlert('error', '❌ Format tidak valid. Harap upload .xlsx atau .xls');
        return;
      }
      selectedFile = file;
      document.getElementById('fileName').textContent = file.name;
      document.getElementById('fileSize').textContent = formatBytes(file.size);
      document.getElementById('fileSelected').classList.add('show');
      document.getElementById('btnProcess').disabled = false;
      hideUploadAlert('error');
      hideUploadAlert('success');
    }

    // ===== PROCESS UPLOAD =====
    async function processFile() {
      if (!selectedFile) return;
      const btn = document.getElementById('btnProcess');
      btn.disabled = true;
      btn.innerHTML = '<div class="spinner"></div> Memproses...';
      showProgress(true);
      hideUploadAlert('error');
      hideUploadAlert('success');

      const fd = new FormData();
      fd.append('excel_file', selectedFile);
      try {
        const res = await fetch('api/upload.php', {
          method: 'POST',
          body: fd
        });
        const data = await res.json();
        if (!data.success) {
          showUploadAlert('error', '❌ ' + (data.message || 'Terjadi kesalahan'));
        } else {
          currentSessionId = data.session_id;
          renderResults(data);
          showUploadAlert('success', `✅ Berhasil memproses ${data.total} pegawai. File telah dihapus dari server.`);
        }
      } catch (e) {
        showUploadAlert('error', '❌ Gagal terhubung ke server. Cek konfigurasi database.');
      } finally {
        showProgress(false);
        btn.disabled = false;
        btn.innerHTML = '⚡ Proses & Hitung Pajak';
      }
    }

    function animateProgress() {
      const fill = document.getElementById('progressFill');
      const lbl = document.getElementById('progressLabel');
      const msgs = ['Membaca file Excel...', 'Validasi data...', 'Mencocokkan tarif TER...', 'Menghitung PPh 21...', 'Menyimpan hasil...'];
      let pct = 0;
      const iv = setInterval(() => {
        pct = Math.min(pct + 3, 90);
        fill.style.width = pct + '%';
      }, 80);
      msgs.forEach((m, i) => setTimeout(() => {
        lbl.textContent = m;
      }, i * 1000));
      window._piv = iv;
    }

    function showProgress(show) {
      const w = document.getElementById('progressWrap');
      if (show) {
        w.classList.add('show');
        document.getElementById('progressFill').style.width = '0%';
        animateProgress();
      } else {
        clearInterval(window._piv);
        document.getElementById('progressFill').style.width = '100%';
        setTimeout(() => w.classList.remove('show'), 600);
      }
    }

    function resetUpload() {
      if (currentSessionId) {
        fetch('api/delete_session.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            session_id: currentSessionId
          })
        });
        currentSessionId = null;
      }
      selectedFile = null;
      fileInput.value = '';
      document.getElementById('fileSelected').classList.remove('show');
      document.getElementById('btnProcess').disabled = true;
      document.getElementById('resultsSection').classList.remove('show');
      document.getElementById('errorsBox').classList.remove('show');
      document.getElementById('tableBody').innerHTML = '<tr><td colspan="9" style="text-align:center;padding:40px;color:var(--gray-3);font-size:13px;">Belum ada data — upload file Excel di atas</td></tr>';
      document.getElementById('tableFoot').style.display = 'none';
      document.getElementById('statTotal').textContent = '—';
      document.getElementById('statGaji').textContent = '—';
      document.getElementById('statPajak').textContent = '—';
      hideUploadAlert('error');
      hideUploadAlert('success');
    }

    // ===== RENDER RESULTS TABLE =====
    function renderResults(data) {
      let tGaji = 0,
        tPajak = 0;
      data.data.forEach(r => {
        tGaji += r.jumlah_gaji;
        tPajak += r.nominal_pajak;
      });
      document.getElementById('statTotal').textContent = data.total;
      document.getElementById('statGaji').textContent = formatRupiah(tGaji);
      document.getElementById('statPajak').textContent = formatRupiah(tPajak);

      if (data.errors && data.errors.length) {
        document.getElementById('errorsBox').classList.add('show');
        document.getElementById('errorsList').innerHTML = data.errors.map(e => `<li>${escHtml(e)}</li>`).join('');
      }

      document.getElementById('tableBody').innerHTML = data.data.map((r, i) => {
        const tc = r.kategori_ter === 'TER A' ? 'ter-a' : (r.kategori_ter === 'TER B' ? 'ter-b' : 'ter-c');
        const pc = r.nominal_pajak === 0 ? 'pajak-zero' : 'pajak-val';
        return `<tr>
      <td>${i+1}</td>
      <td><strong>${escHtml(r.nama_pegawai)}</strong></td>
      <td style="font-family:'JetBrains Mono',monospace;font-size:12px;color:var(--gray-4)">${escHtml(r.npwp||'—')}</td>
      <td>${escHtml(r.jabatan||'—')}</td>
      <td class="td-center"><strong>${escHtml(r.status_ptkp)}</strong></td>
      <td class="td-right">${formatRupiah(r.jumlah_gaji)}</td>
      <td class="td-center"><span class="ter-badge ${tc}">${escHtml(r.kategori_ter||'—')}</span></td>
      <td class="td-center" style="font-family:'JetBrains Mono',monospace;font-weight:600;">${parseFloat(r.persentase_ter).toFixed(2)}%</td>
      <td class="td-right"><span class="${pc}">${formatRupiah(r.nominal_pajak)}</span></td>
    </tr>`;
      }).join('');

      document.getElementById('footGaji').textContent = formatRupiah(tGaji);
      document.getElementById('footPajak').textContent = formatRupiah(tPajak);
      document.getElementById('tableFoot').style.display = '';
      document.getElementById('resultsSection').classList.add('show');
      setTimeout(() => document.getElementById('resultsSection').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      }), 100);
    }

    function exportExcel() {
      if (currentSessionId) window.location.href = 'api/export.php?session_id=' + currentSessionId;
    }

    // ===== KALKULATOR MANUAL =====
    // Tabel TER di client-side (sama persis dengan database)
    const TER = {
      A: [
        [0, 5400000, 0],
        [5400001, 5650000, 0.25],
        [5650001, 5950000, 0.5],
        [5950001, 6300000, 0.75],
        [6300001, 6750000, 1],
        [6750001, 7500000, 1.25],
        [7500001, 8550000, 1.5],
        [8550001, 9650000, 1.75],
        [9650001, 10050000, 2],
        [10050001, 10350000, 2.25],
        [10350001, 10700000, 2.5],
        [10700001, 11050000, 3],
        [11050001, 11600000, 3.5],
        [11600001, 12500000, 4],
        [12500001, 13750000, 5],
        [13750001, 15100000, 6],
        [15100001, 16950000, 7],
        [16950001, 19750000, 8],
        [19750001, 24150000, 9],
        [24150001, 26450000, 10],
        [26450001, 28000000, 11],
        [28000001, 30050000, 12],
        [30050001, 32400000, 13],
        [32400001, 35400000, 14],
        [35400001, 39100000, 15],
        [39100001, 43850000, 16],
        [43850001, 47800000, 17],
        [47800001, 51400000, 18],
        [51400001, 56300000, 19],
        [56300001, 62200000, 20],
        [62200001, 68600000, 21],
        [68600001, 77500000, 22],
        [77500001, 89000000, 23],
        [89000001, 103000000, 24],
        [103000001, 125000000, 25],
        [125000001, 157000000, 26],
        [157000001, 206000000, 27],
        [206000001, 337000000, 28],
        [337000001, 454000000, 29],
        [454000001, 550000000, 30],
        [550000001, 695000000, 31],
        [695000001, 910000000, 32],
        [910000001, 1400000000, 33],
        [1400000001, Infinity, 34]
      ],
      B: [
        [0, 6200000, 0],
        [6200001, 6500000, 0.25],
        [6500001, 6850000, 0.5],
        [6850001, 7300000, 0.75],
        [7300001, 9200000, 1],
        [9200001, 10750000, 1.5],
        [10750001, 11250000, 2],
        [11250001, 11600000, 2.5],
        [11600001, 12600000, 3],
        [12600001, 13600000, 4],
        [13600001, 14950000, 5],
        [14950001, 16400000, 6],
        [16400001, 18450000, 7],
        [18450001, 21850000, 8],
        [21850001, 26000000, 9],
        [26000001, 27700000, 10],
        [27700001, 29350000, 11],
        [29350001, 31450000, 12],
        [31450001, 33950000, 13],
        [33950001, 37100000, 14],
        [37100001, 41100000, 15],
        [41100001, 45800000, 16],
        [45800001, 49500000, 17],
        [49500001, 53800000, 18],
        [53800001, 58500000, 19],
        [58500001, 64000000, 20],
        [64000001, 71000000, 21],
        [71000001, 80000000, 22],
        [80000001, 93000000, 23],
        [93000001, 109000000, 24],
        [109000001, 129000000, 25],
        [129000001, 163000000, 26],
        [163000001, 211000000, 27],
        [211000001, 374000000, 28],
        [374000001, 459000000, 29],
        [459000001, 555000000, 30],
        [555000001, 704000000, 31],
        [704000001, 957000000, 32],
        [957000001, 1405000000, 33],
        [1405000001, Infinity, 34]
      ],
      C: [
        [0, 6600000, 0],
        [6600001, 6950000, 0.25],
        [6950001, 7350000, 0.5],
        [7350001, 7800000, 0.75],
        [7800001, 8850000, 1],
        [8850001, 9800000, 1.25],
        [9800001, 10950000, 1.5],
        [10950001, 11200000, 1.75],
        [11200001, 12050000, 2],
        [12050001, 12950000, 3],
        [12950001, 14150000, 4],
        [14150001, 15550000, 5],
        [15550001, 17050000, 6],
        [17050001, 19500000, 7],
        [19500001, 22700000, 8],
        [22700001, 26600000, 9],
        [26600001, 28100000, 10],
        [28100001, 30100000, 11],
        [30100001, 32600000, 12],
        [32600001, 35400000, 13],
        [35400001, 38900000, 14],
        [38900001, 43000000, 15],
        [43000001, 47400000, 16],
        [47400001, 51200000, 17],
        [51200001, 55800000, 18],
        [55800001, 60400000, 19],
        [60400001, 66700000, 20],
        [66700001, 74500000, 21],
        [74500001, 83200000, 22],
        [83200001, 95600000, 23],
        [95600001, 110000000, 24],
        [110000001, 134000000, 25],
        [134000001, 169000000, 26],
        [169000001, 221000000, 27],
        [221000001, 390000000, 28],
        [390000001, 463000000, 29],
        [463000001, 561000000, 30],
        [561000001, 709000000, 31],
        [709000001, 965000000, 32],
        [965000001, 1419000000, 33],
        [1419000001, Infinity, 34]
      ]
    };

    function getKategoriTER(ptkp) {
      const p = ptkp.toUpperCase().trim();
      if (['TK/0'].includes(p)) return 'A';
      if (['TK/1', 'TK/2', 'K/0'].includes(p)) return 'B';
      if (['TK/3', 'K/1', 'K/2', 'K/3'].includes(p)) return 'C';
      return null;
    }

    function getTarif(gaji, kat) {
      const tbl = TER[kat];
      for (const [lo, hi, t] of tbl) {
        if (gaji >= lo && gaji <= hi) return t;
      }
      return 0;
    }

    function hitungManual() {
      const nama = document.getElementById('cNama').value.trim();
      const npwp = document.getElementById('cNpwp').value.trim();
      const jabatan = document.getElementById('cJabatan').value.trim();
      const ptkp = document.getElementById('cPtkp').value;
      const gaji = parseGaji(document.getElementById('cGaji').value);

      // Validasi
      if (!nama) {
        showCalcError('❌ Nama pegawai wajib diisi');
        return;
      }
      if (!ptkp) {
        showCalcError('❌ Status PTKP wajib dipilih');
        return;
      }
      if (gaji <= 0) {
        showCalcError('❌ Jumlah gaji harus lebih dari 0');
        return;
      }
      document.getElementById('calcError').classList.remove('show');

      const kat = getKategoriTER(ptkp);
      const tarif = getTarif(gaji, kat);
      const pajak = Math.round(gaji * tarif / 100);

      // Isi modal
      document.getElementById('mNama').textContent = nama;
      document.getElementById('mNpwp').textContent = npwp || '—';
      document.getElementById('mJabatan').textContent = jabatan || '—';
      document.getElementById('mPtkp').textContent = ptkp;
      document.getElementById('mGaji').textContent = formatRupiah(gaji);
      document.getElementById('mTerDesc').textContent = kat === 'A' ? 'Berlaku untuk status PTKP TK/0' : kat === 'B' ? 'Berlaku untuk TK/1, TK/2, K/0' : 'Berlaku untuk TK/3, K/1, K/2, K/3';
      const badgeClass = kat === 'A' ? 'ter-a' : kat === 'B' ? 'ter-b' : 'ter-c';
      document.getElementById('mTerBadge').innerHTML = `<span class="ter-badge ${badgeClass}">TER ${kat}</span>`;
      document.getElementById('mTarif').textContent = tarif.toFixed(2) + '%';
      const pajakEl = document.getElementById('mPajak');
      pajakEl.textContent = formatRupiah(pajak);
      pajakEl.className = 'row-val' + (pajak === 0 ? ' zero' : '');
      document.getElementById('mAnnual').textContent = formatRupiah(pajak * 12);

      // Switch tombol: sembunyikan "Hitung", tampilkan "Lihat Hasil" + "Reset"
      document.getElementById('btnRowBefore').style.display = 'none';
      document.getElementById('btnRowAfter').style.display = 'flex';

      // Langsung buka modal
      openModal();
    }

    function openModal() {
      document.getElementById('modalOverlay').classList.add('show');
      document.body.style.overflow = 'hidden';
    }

    function closeModal() {
      document.getElementById('modalOverlay').classList.remove('show');
      document.body.style.overflow = '';
    }

    function resetCalc() {
      // Reset form
      document.getElementById('cNama').value = '';
      document.getElementById('cNpwp').value = '';
      document.getElementById('cJabatan').value = '';
      document.getElementById('cPtkp').value = '';
      document.getElementById('cGaji').value = '';
      document.getElementById('calcError').classList.remove('show');
      // Tutup modal
      closeModal();
      // Balik ke state awal: tombol "Hitung"
      document.getElementById('btnRowBefore').style.display = 'flex';
      document.getElementById('btnRowAfter').style.display = 'none';
    }

    function showUploadAlert(type, msg) {
      const el = document.getElementById(type === 'error' ? 'alertError' : 'alertSuccess');
      el.textContent = msg;
      el.classList.add('show');
    }

    function hideUploadAlert(type) {
      document.getElementById(type === 'error' ? 'alertError' : 'alertSuccess').classList.remove('show');
    }

    function showCalcError(msg) {
      const el = document.getElementById('calcError');
      el.textContent = msg;
      el.classList.add('show');
    }
  </script>
</body>

</html>