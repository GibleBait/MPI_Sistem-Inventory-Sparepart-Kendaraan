<?php
include '../config/config.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $kode = $_POST['kode_barang'];
    $nama = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $satuan = $_POST['satuan'];
    $hb = $_POST['harga_beli'];
    $hj = $_POST['harga_jual'];
    $lokasi = $_POST['lokasi_rak'];

    $sql = "UPDATE barang SET 
            kode_barang='$kode',
            nama_barang='$nama',
            kategori='$kategori',
            stok='$stok',
            satuan='$satuan',
            harga_beli='$hb',
            harga_jual='$hj',
            lokasi_rak='$lokasi'
            WHERE id_barang='$id'";
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
  <title>Edit Barang</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="container">
  <h1>Edit Barang</h1>
  <form method="POST">
    <input type="text" name="kode_barang" value="<?= $row['kode_barang'] ?>" required>
    <input type="text" name="nama_barang" value="<?= $row['nama_barang'] ?>" required>
    <input type="text" name="kategori" value="<?= $row['kategori'] ?>">
    <input type="number" name="stok" value="<?= $row['stok'] ?>">
    <input type="text" name="satuan" value="<?= $row['satuan'] ?>">
    <input type="number" name="harga_beli" value="<?= $row['harga_beli'] ?>">
    <input type="number" name="harga_jual" value="<?= $row['harga_jual'] ?>">
    <input type="text" name="lokasi_rak" value="<?= $row['lokasi_rak'] ?>">
    <button type="submit" name="update">Update</button>
  </form>
  <br>
  <a href="../index.php" class="btn">Kembali</a>
</div>
</body>
</html>
