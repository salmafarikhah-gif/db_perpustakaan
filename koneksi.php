<?php
// koneksi.php - Koneksi PHP ke database db_perpustakaan (MySQLi procedural)

// Matikan exception bawaan PHP 8.1+ agar kesalahan diperiksa dengan if
mysqli_report(MYSQLI_REPORT_OFF);

// Parameter koneksi
$host     = "localhost";
$username = "root";
$password = "";
$database = "db_perpustakaan";

// Membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . htmlspecialchars(mysqli_connect_error()));
} else {
    echo "Koneksi Berhasil";
}

mysqli_set_charset($koneksi, "utf8mb4");