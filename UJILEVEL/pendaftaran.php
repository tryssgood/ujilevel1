<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pendaftaran Siswa Baru</title>
  <style>
    body {
      background-color: #1f1b2d;
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 20px;
    }

    .container {
      max-width: 700px;
      margin: 80px auto 0 auto;
      background-color: #2b2640;
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.05);
    }

    h2 {
      color: #ffc107;
      margin-bottom: 5px;
      text-align: center;
    }

    p.sub-title {
      text-align: center;
      color: #aaa;
      margin-bottom: 30px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      color: #ccc;
      font-size: 14px;
    }

    input[type="text"],
    input[type="email"],
    select {
      width: 100%;
      padding: 10px 14px;
      font-size: 14px;
      border: 1px solid #555;
      border-radius: 8px;
      background-color: #1f1b2d;
      color: #fff;
      margin-bottom: 20px;
      outline: none;
    }

    input[type="file"] {
      display: none;
    }

    .upload-box {
      text-align: center;
      border: 2px dashed #888;
      border-radius: 8px;
      padding: 24px;
      background-color: #3b3455;
      position: relative;
      margin-bottom: 20px;
    }

    .upload-box i {
      font-size: 40px;
      color: #ccc;
    }

    .upload-box p {
      font-size: 14px;
      color: #bbb;
      margin: 10px 0;
    }

    .upload-btn {
      display: inline-block;
      padding: 6px 16px;
      margin-top: 10px;
      background-color: #007bff;
      color: white;
      border-radius: 6px;
      cursor: pointer;
      font-size: 14px;
    }

    #preview-image {
      display: none;
      margin-top: 16px;
      max-width: 100%;
      border-radius: 8px;
    }

    button[type="submit"] {
      display: block;
      width: 100%;
      padding: 14px;
      background-color: #007bff;
      color: #fff;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Peserta PPDB</h2>
    <p class="sub-title">Tolong isi data diri peserta</p>
    <form method="POST" action="proses_pendaftaran.php" enctype="multipart/form-data">
      <label for="nis">NIS</label>
      <input type="text" id="nis" name="nis" placeholder="NIS Peserta" />

      <label for="nama">Nama Peserta</label>
      <input type="text" id="nama" name="nama" placeholder="Nama" />

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Email" />

      <label for="telepon">No-Telepon</label>
      <input type="text" id="telepon" name="telepon" placeholder="No-Telepon" />

      <label for="rata">Rata-Rata</label>
      <input type="text" id="rata" name="rata" placeholder="Rata-Rata" />

      <label for="jurusan">Pilihan Jurusan</label>
      <select id="jurusan" name="jurusan">
        <option value="TKR">Teknik Kendaraan Ringan</option>
        <option value="TBSM">Teknik Bisnis Sepeda Motor</option>
        <option value="TP">Teknik Permesinan</option>
        <option value="TKJ">Teknik Komputer dan Jaringan</option>
        <option value="RPL">Rekayasa Perangkat Lunak</option>
      </select>

      <label>Surat Kelulusan</label>
      <div id="upload-container" class="upload-box">
        <i class="fa fa-cloud-upload"></i>
        <p>Upload atau drop<br>Foto Surat Kelulusan</p>
        <input type="file" id="upload-file" name="surat_kelulusan" accept="image/*" />
        <label for="upload-file" class="upload-btn">Upload</label>
        <img id="preview-image" src="" alt="Preview" />
      </div>

      <button type="submit">KIRIM</button>
    </form>
  </div>

  <script>
    const uploadContainer = document.getElementById('upload-container');
    const fileInput = document.getElementById('upload-file');
    const previewImage = document.getElementById('preview-image');

    uploadContainer.addEventListener('dragover', (e) => {
      e.preventDefault();
      uploadContainer.style.borderColor = '#ffc107';
      uploadContainer.style.backgroundColor = '#2b2640';
    });

    uploadContainer.addEventListener('dragleave', () => {
      uploadContainer.style.borderColor = '#888';
      uploadContainer.style.backgroundColor = '#3b3455';
    });

    uploadContainer.addEventListener('drop', (e) => {
      e.preventDefault();
      uploadContainer.style.borderColor = '#888';
      uploadContainer.style.backgroundColor = '#3b3455';
      const files = e.dataTransfer.files;
      if (files.length > 0 && files[0].type.startsWith('image/')) {
        displayImage(files[0]);
      } else {
        alert('Harap unggah file gambar!');
      }
    });

    fileInput.addEventListener('change', (e) => {
      if (e.target.files[0]) displayImage(e.target.files[0]);
    });

    function displayImage(file) {
      const reader = new FileReader();
      reader.onload = (e) => {
        previewImage.src = e.target.result;
        previewImage.style.display = 'block';
      };
      reader.readAsDataURL(file);
    }
  </script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
