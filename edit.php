<?php

require_once "koneksi.php"; //untuk menghubungkan kedalam database karna kita menggunakan query select

$id = $_GET["id"];

//mengambil data anggota berdasarkan id
$query = "SELECT * FROM anggota WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) { //memeriksa apakah data ditemukan
    die("Data anggota tidak ditemukan.");
}

$data = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Edit Data Anggota</h2>

    <form action="proses_update.php" method="post">
    <input type="hidden" name="id"
        value="<?= $data['id']; ?>">
    <label>Nomor Anggota</label><br>
    <input type="text" name="no_anggota"
        value="<?= htmlspecialchars($data['no_anggota']); ?>"
        max_length="15" required>
    <br></br>
    <label>Nama Lengkap</label><br>
    <input type="text" name="nama_lengkap"
        value="<?= htmlspecialchars($data['nama_lengkap']); ?>"
        max_length="100" required>
    <br></br>
    <label>Email</label><br>
    <input type="email" name="email"
        value="<?= htmlspecialchars($data['email']); ?>"
        max_length="100" required>
    <br></br>
    <label>Nomor HP</label><br>
    <input type="text" name="no_hp"
        value="<?= htmlspecialchars($data['no_hp']); ?>"
        max_length="15" required>
    <br></br>
    <label>Jenis Anggota</label><br>
    <select name="jenis_anggota" required>
        <option value="Mahasiswa"
            <?= $data['jenis_anggota'] == "Mahasiswa" ? "selected" : ""; ?>>Mahasiswa
        </option>
        <option value="Dosen"
            <?= $data['jenis_anggota'] == "Dosen" ? "selected" : ""; ?>>Dosen
        </option>
        <option value="Tenaga Kependidikan"
            <?= $data['jenis_anggota'] == "Tenaga Kependidikan" ? "selected" : ""; ?>>Tenaga Kependidikan
        </option>
    </select>
    <br></br>
    <label>Alamat</label><br>
    <textarea name="alamat" rows="4" cols="40"
        required><?= htmlspecialchars($data['alamat']); ?></textarea>
    <br></br>

    <button type="submit" name="update">
        Update Data
    </button>

    <a href= data.php>Kembali</a>
    </form>
</body>
</html>