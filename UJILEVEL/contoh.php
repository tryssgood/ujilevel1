<?php include 'header1.php'; ?>
<?php
$conn = new mysqli("localhost", "root", "", "ppdb_igasar_ujilevel");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['hapus_id'])) {
    $id = $_POST['hapus_id'];
    $conn->query("DELETE FROM pendaftaran WHERE id_pendaftar='$id'");
    echo "<script>alert('Data berhasil dihapus.'); window.location.href='contoh.php';</script>";
}

if (isset($_POST['update'])) {
    $id = $_POST['id_pendaftar'];
    $nis = $_POST['NIS'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $rata = $_POST['rata'];
    $jurusan = $_POST['jurusan'];

    if ($_FILES['surat_kelulusan']['size'] > 0) {
        $gambar = addslashes(file_get_contents($_FILES['surat_kelulusan']['tmp_name']));
        $conn->query("UPDATE pendaftaran SET NIS='$nis', nama='$nama', email='$email', telepon='$telepon', rata='$rata', jurusan='$jurusan', surat_kelulusan='$gambar' WHERE id_pendaftar='$id'");
    } else {
        $conn->query("UPDATE pendaftaran SET NIS='$nis', nama='$nama', email='$email', telepon='$telepon', rata='$rata', jurusan='$jurusan' WHERE id_pendaftar='$id'");
    }

    echo "<script>alert('Data berhasil diperbarui.'); window.location.href='contoh.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pendaftar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            padding: 40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .edit-form {
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto 40px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .edit-form h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            font-size: 14px;
            color: #333;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            box-sizing: border-box;
        }

        .edit-form button {
            width: 100%;
            padding: 10px;
            background-color: #3b725b;
            color: white;
            font-weight: bold;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .edit-form button:hover {
            background-color: #2f5d47;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3b725b;
            color: #fff;
        }

        img {
            width: 60px;
            height: auto;
            border-radius: 6px;
        }

        .aksi-buttons {
            display: flex;
            justify-content: center;
            gap: 6px;
        }

        .btn-aksi {
            padding: 8px 10px;
            border-radius: 6px;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 15px;
        }

        .btn-edit {
            background-color: #0ea5e9;
        }

        .btn-delete {
            background-color: #ef4444;
        }
    </style>
</head>
<body>

<h2>Data Lengkap Pendaftar PPDB</h2>

<?php
if (isset($_GET['edit'])) {
    $id_edit = $_GET['edit'];
    $res = $conn->query("SELECT * FROM pendaftaran WHERE id_pendaftar='$id_edit'");

    // Periksa apakah data ditemukan
    if ($res && $res->num_rows > 0) {
        $data = $res->fetch_assoc();
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location.href='contoh.php';</script>";
        exit;
    }
?>
    <form class="edit-form" method="POST" enctype="multipart/form-data">
        <h3>Edit Data</h3>
        <input type="hidden" name="id_pendaftar" value="<?= $data['id_pendaftar'] ?>">

        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" id="nis" name="NIS" value="<?= htmlspecialchars($data['NIS'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($data['nama'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($data['email'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="text" id="telepon" name="telepon" value="<?= htmlspecialchars($data['telepon'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="rata">Nilai Rata-rata</label>
            <input type="number" step="0.01" id="rata" name="rata" value="<?= htmlspecialchars($data['rata'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select id="jurusan" name="jurusan" required>
                <option value="TKJ" <?= ($data['jurusan'] ?? '') == "TKJ" ? "selected" : "" ?>>TKJ</option>
                <option value="RPL" <?= ($data['jurusan'] ?? '') == "RPL" ? "selected" : "" ?>>RPL</option>
                <option value="TP" <?= ($data['jurusan'] ?? '') == "RPL" ? "selected" : "" ?>>TP</option>
            </select>
        </div>

        <div class="form-group">
            <label for="surat_kelulusan">Ganti Surat Kelulusan (Opsional)</label>
            <input type="file" name="surat_kelulusan" id="surat_kelulusan" accept="image/*">
        </div>

        <button type="submit" name="update">Simpan Perubahan</button>
    </form>
<?php } ?>

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Rata</th>
            <th>Jurusan</th>
            <th>Surat Kelulusan</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $data = $conn->query("SELECT * FROM pendaftaran");
        while ($row = $data->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['nama']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['telepon']}</td>";
            echo "<td>{$row['rata']}</td>";
            echo "<td>{$row['jurusan']}</td>";
            echo "<td>";
            if (!empty($row['surat_kelulusan'])) {
                $img = base64_encode($row['surat_kelulusan']);
                echo "<img src='data:image/jpeg;base64,{$img}' />";
            } else {
                echo "Tidak ada";
            }
            echo "</td>";
            echo "<td>
                <div class='aksi-buttons'>
                    <form method='GET'>
                        <input type='hidden' name='edit' value='{$row['id_pendaftar']}'>
                        <button class='btn-aksi btn-edit' title='Edit'><i class='fas fa-pen'></i></button>
                    </form>
                    <form method='POST' onsubmit=\"return confirm('Yakin ingin menghapus data ini?')\">
                        <input type='hidden' name='hapus_id' value='{$row['id_pendaftar']}'>
                        <button class='btn-aksi btn-delete' title='Hapus'><i class='fas fa-trash'></i></button>
                    </form>
                </div>
            </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
