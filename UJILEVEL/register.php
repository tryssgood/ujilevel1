<!-- register.php -->


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Registrasi PPDB</title>
  <style>
    .container-form {
      max-width: 400px;
      margin: 40px auto;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      padding: 32px 24px;
      font-family: 'Segoe UI', Arial, sans-serif;
    }
    .container-form h2 {
      text-align: center;
      margin-bottom: 24px;
      color: #333;
    }
    .container-form label {
      display: block;
      margin-bottom: 6px;
      color: #444;
      font-size: 15px;
    }
    .container-form input {
      width: 100%;
      padding: 10px 12px;
      margin-bottom: 18px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 15px;
    }
    .container-form button {
      width: 100%;
      padding: 10px 0;
      background: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
    }
    .error-msg {
      background: #ffecec;
      border: 1px solid #f5c2c2;
      color: #d8000c;
      padding: 10px;
      margin-bottom: 18px;
      border-radius: 4px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container-form">
    <h2>Form Registrasi</h2>

    <?php if (isset($_GET['msg'])): ?>
      <div class="error-msg"><?= htmlspecialchars($_GET['msg']) ?></div>
    <?php endif; ?>

    <form action="register_process.php" method="POST" autocomplete="off">
      <label for="nama">Nama:</label>
      <input type="text" id="nama" name="nama" required maxlength="100">

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required minlength="6">

      <label for="password_confirm">Konfirmasi Password:</label>
      <input type="password" id="password_confirm" name="password_confirm" required minlength="6">

      <button type="submit">Daftar</button>
    </form>

    <p style="text-align:center;margin-top:18px;">
      Sudah punya akun? <a href="login.php">Masuk di sini</a>
    </p>
  </div>
</body>
</html>
