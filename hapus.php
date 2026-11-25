<?php

require_once "koneksi.php"; //untuk menghubungkan kedalam database karna kita menggunakan query DELETE

if ($_SERVER["REQUEST_METHOD"] !== "POST") { //untuk mengecek apakah menggunakan method yang sesuai, jika iya yang bawah akan dijalankan
    header("Location: data.php");
    exit;
}

$id = $_POST["id"];

$query = "DELETE FROM anggota WHERE id = ?";

$stmt = mysqli_prepare($koneksi, $query);

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    header("Location: data.php");
    exit;
} else {
    die("Gagal menghapus data: " . mysqli_stmt_error($stmt));
}

?>