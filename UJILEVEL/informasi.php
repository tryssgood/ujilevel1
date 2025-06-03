<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Informasi Pendaftaran Ulang</title>
  <style>
    body {
      background-color: #1f1b2d;
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 20px;
    }

    .container {
      max-width: 600px;
      margin: 80px auto 0 auto; /* Tambahkan margin-top */
      background-color: #2b2640;
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.05);
    }

    h2 {
      color: #ffc107;
      margin-bottom: 15px;
      border-bottom: 2px solid #ffc107;
      padding-bottom: 5px;
    }

    ul {
      padding-left: 20px;
    }

    li {
      margin-bottom: 10px;
      line-height: 1.6;
    }

    .section {
      margin-bottom: 30px;
    }

    .highlight {
      background-color: #3b3455;
      padding: 15px;
      border-left: 4px solid #ffc107;
      border-radius: 8px;
    }

    .highlight p {
      margin: 0;
    }

    .icon {
      color: #ffc107;
      margin-right: 8px;
    }
  </style>
</head>
<body>
  <div class="container">

    <div class="section">
      <h2><i class="fas fa-folder-open icon"></i>Dokumen yang Harus Dibawa saat Daftar Ulang</h2>
      <ul>
        <li>📄 Fotokopi Kartu Keluarga (KK) – 2 lembar</li>
        <li>📄 Fotokopi Akta Kelahiran – 2 lembar</li>
        <li>📄 Fotokopi Ijazah/Surat Keterangan Lulus – 2 lembar</li>
        <li>📄 Pas foto 3x4 cm latar belakang merah – 3 lembar</li>
        <li>📄 Fotokopi KTP orang tua/wali – 2 lembar</li>
        <li>📄 Formulir Pendaftaran (yang sudah diisi dan ditandatangani)</li>
      </ul>
    </div>

    <div class="section">
      <h2><i class="fas fa-money-bill-wave icon"></i>Informasi Pembayaran</h2>
      <div class="highlight">
        <p><strong>Total biaya yang harus dibayarkan saat daftar ulang:</strong></p>
        <ul>
          <li>🔹 Biaya Pendaftaran: Rp100.000</li>
          <li>🔹 Biaya Awal Tahun: Rp950.000</li>
          <li>🔹 Biaya Seragam: Rp750.000</li>
          <li>🔹 Biaya SPP Bulan Pertama: Rp290.000</li>
        </ul>
        <p><strong>Total: Rp2.090.000</strong></p>
        <p><strong>Pembayaran dapat dilakukan melalui metode berikut:</strong></p>
        <ul>
          <li>📱 QRIS (QR Code tersedia saat daftar ulang)</li>
          <li>🏦 Virtual Account / Transfer ke rekening berikut:</li>
          <ul>
            <li>Bank BRI – <strong>1234567890</strong> a.n. <strong>Trysthan</strong></li>
            <li>Bank Mandiri – <strong>9876543210</strong> a.n. <strong>Tedduh</strong></li>
            <li>Bank BNI – <strong>1122334455</strong> a.n. <strong>Fazar Ihsan</strong></li>
          </ul>
          <li>💵 Tunai langsung ke panitia pada hari daftar ulang</li>
        </ul>
        <p>Harap simpan bukti pembayaran untuk ditunjukkan saat daftar ulang.</p>
      </div>
    </div>

  </div>

  <!-- Font Awesome Icon CDN -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
