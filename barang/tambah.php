<?php include '../config/koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
</head>
<body>
    <h2>Tambah Barang Baru</h2>
    <form method="post">
        <label>Kode Barang:</label><br>
        <input type="text" name="kode_barang" required><br>
        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" required><br>
        <label>Kategori:</label><br>
        <input type="text" name="kategori"><br>
        <label>Stok:</label><br>
        <input type="number" name="stok" value="0"><br>
        <label>Satuan:</label><br>
        <input type="text" name="satuan"><br>
        <label>Harga Beli:</label><br>
        <input type="number" name="harga_beli" step="0.01"><br>
        <label>Harga Jual:</label><br>
        <input type="number" name="harga_jual" step="0.01"><br>
        <label>Lokasi Rak:</label><br>
        <input type="text" name="lokasi_rak"><br><br>

        <button type="submit" name="simpan">Simpan</button>
        <a href="index.php">Kembali</a>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $kode = $_POST['kode_barang'];
        $nama = $_POST['nama_barang'];
        $kategori = $_POST['kategori'];
        $stok = $_POST['stok'];
        $satuan = $_POST['satuan'];
        $beli = $_POST['harga_beli'];
        $jual = $_POST['harga_jual'];
        $rak = $_POST['lokasi_rak'];

        $query = mysqli_query($koneksi, "INSERT INTO tb_barang 
        (kode_barang, nama_barang, kategori, stok, satuan, harga_beli, harga_jual, lokasi_rak)
        VALUES ('$kode','$nama','$kategori','$stok','$satuan','$beli','$jual','$rak')");

        if ($query) {
            echo "<script>alert('Data berhasil disimpan'); window.location='index.php';</script>";
        } else {
            echo "Gagal menyimpan data: " . mysqli_error($koneksi);
        }
    }
    ?>
</body>
</html>
