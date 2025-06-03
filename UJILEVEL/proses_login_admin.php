<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli("localhost", "root", "", "ppdb_igasar_ujilevel");
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Pastikan tabel 'admin' memiliki kolom username dan password
    $sql = "SELECT id, nama_admin, password FROM admin WHERE username='$username' LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        $admin = $result->fetch_assoc();

        // Ganti password comparison jika menggunakan hash
        if ($password === $admin['password']) { // Gunakan password_verify jika sudah di-hash
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_nama'] = $admin['nama_admin'];
            $_SESSION['user_level'] = 'admin';

            header("Location: admin_panel.php");
            exit;
        } else {
            echo "<script>alert('Password salah!');window.location='login.php';</script>";
            exit;
        }
    } else {
        echo "<script>alert('Akun admin tidak ditemukan!');window.location='login.php';</script>";
        exit;
    }

    $conn->close();
} else {
    header("Location: login.php");
    exit;
}
?>
