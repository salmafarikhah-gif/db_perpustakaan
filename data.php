<?php
// Koneksi ke database MySQL
require_once "koneksi.php";

$sql ="SELECT * FROM anggota order by id desc";
$hasil = mysqli_query($koneksi, $sql);

$jumlah = mysqli_num_Rows($hasil);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Nomor Anggota</th><th>Nama Lengkap</th><th>Email</th><th>Nomor HP</th><th>Jenis Anggota</th><th>Alamat</th>
        </tr>
        <?php $no_anggota = 1; while ($baris = mysqli_fetch_assoc($hasil)) { ?>
        <tr>
            <td><?php echo $no_anggota++; ?></td>
            <td><?php echo htmlspecialchars($baris["nama_lengkap"]); ?></td>
            <td><?php echo htmlspecialchars($baris["email"]); ?></td>
            <td><?php echo htmlspecialchars($baris["no_hp"]); ?></td>
            <td><?php echo htmlspecialchars($baris["jenis_anggota"]); ?></td>
            <td><?php echo htmlspecialchars($baris["alamat"]); ?></td>
        <td>
            <a href="detail.php?id=<?php echo (int) $baris["id"]; ?>">Detail</a>
            <form class="inline" action="hapus.php" method="post"
                onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                <input type="hidden" name="id" value="<?php echo (int) $baris["id"]; ?>">
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
<?php mysqli_free_result($hasil);?>

</body>
</html>