<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli("localhost", "root", "", "ppdb_igasar_ujilevel");

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $nama = trim($conn->real_escape_string($_POST['nama']));
    $email = trim($conn->real_escape_string($_POST['email']));
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Validasi: Password dan konfirmasi harus sama
    if ($password !== $password_confirm) {
        header("Location: register.php?msg=Password tidak sesuai");
        exit;
    }

    // Validasi: Email harus unik
    $check = $conn->query("SELECT id FROM peserta WHERE email = '$email'");
    if ($check->num_rows > 0) {
        header("Location: register.php?msg=Email sudah terdaftar");
        exit;
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Simpan ke database
    $sql = "INSERT INTO peserta (nama, email, password) VALUES ('$nama', '$email', '$hashed_password')";
    if ($conn->query($sql) === TRUE) {
        header("Location: login.php?msg=Registrasi berhasil, silakan login");
        exit;
    } else {
        header("Location: register.php?msg=Terjadi kesalahan: " . urlencode($conn->error));
        exit;
    }

    $conn->close();
} else {
    header("Location: register.php");
    exit;
}
?>
