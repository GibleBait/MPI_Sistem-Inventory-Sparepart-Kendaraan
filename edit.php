<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang='$id'"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
</head>
<body>
    <h2>Edit Data Barang</h2>
    <form method="post">
        <label>Kode Barang:</label><br>
        <input type="text" name="kode_barang" value="<?= $data['kode_barang'] ?>"><br>
        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" value="<?= $data['nama_barang'] ?>"><br>
        <label>Kategori:</label><br>
        <input type="text" name="kategori" value="<?= $data['kategori'] ?>"><br>
        <label>Stok:</label><br>
        <input type="number" name="stok" value="<?= $data['stok'] ?>"><br>
        <label>Satuan:</label><br>
        <input type="text" name="satuan" value="<?= $data['satuan'] ?>"><br>
        <label>Harga Beli:</label><br>
        <input type="number" name="harga_beli" value="<?= $data['harga_beli'] ?>"><br>
        <label>Harga Jual:</label><br>
        <input type="number" name="harga_jual" value="<?= $data['harga_jual'] ?>"><br>
        <label>Lokasi Rak:</label><br>
        <input type="text" name="lokasi_rak" value="<?= $data['lokasi_rak'] ?>"><br><br>

        <button type="submit" name="update">Update</button>
        <a href="index.php">Kembali</a>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $kode = $_POST['kode_barang'];
        $nama = $_POST['nama_barang'];
        $kategori = $_POST['kategori'];
        $stok = $_POST['stok'];
        $satuan = $_POST['satuan'];
        $beli = $_POST['harga_beli'];
        $jual = $_POST['harga_jual'];
        $rak = $_POST['lokasi_rak'];

        $update = mysqli_query($koneksi, "UPDATE tb_barang SET 
            kode_barang='$kode', nama_barang='$nama', kategori='$kategori', stok='$stok',
            satuan='$satuan', harga_beli='$beli', harga_jual='$jual', lokasi_rak='$rak'
            WHERE id_barang='$id'");

        if ($update) {
            echo "<script>alert('Data berhasil diupdate'); window.location='index.php';</script>";
        } else {
            echo "Gagal update data: " . mysqli_error($koneksi);
        }
    }
    ?>
</body>
</html>
