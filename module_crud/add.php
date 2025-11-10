<?php
include '../config/config.php';

if (isset($_POST['submit'])) {
    $kode = $_POST['kode_barang'];
    $nama = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $satuan = $_POST['satuan'];
    $hb = $_POST['harga_beli'];
    $hj = $_POST['harga_jual'];
    $lokasi = $_POST['lokasi_rak'];

    $sql = "INSERT INTO barang (kode_barang, nama_barang, kategori, stok, satuan, harga_beli, harga_jual, lokasi_rak)
            VALUES ('$kode','$nama','$kategori','$stok','$satuan','$hb','$hj','$lokasi')";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Tambah Barang</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="container">
  <h1>Tambah Barang</h1>
  <form method="POST">
    <input type="text" name="kode_barang" placeholder="Kode Barang" required>
    <input type="text" name="nama_barang" placeholder="Nama Barang" required>
    <input type="text" name="kategori" placeholder="Kategori">
    <input type="number" name="stok" placeholder="Stok">
    <input type="text" name="satuan" placeholder="Satuan">
    <input type="number" name="harga_beli" placeholder="Harga Beli">
    <input type="number" name="harga_jual" placeholder="Harga Jual">
    <input type="text" name="lokasi_rak" placeholder="Lokasi Rak">
    <button type="submit" name="submit">Simpan</button>
  </form>
  <br>
  <a href="../index.php" class="btn">Kembali</a>
</div>
</body>
</html>
