<?php
include '../config/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Barang - Inventory Sparepart</title>
</head>
<body>
    <h2>Data Barang Gudang</h2>
    <a href="tambah.php">+ Tambah Barang</a><br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Lokasi Rak</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM tb_barang ORDER BY id_barang DESC");
        while ($data = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['kode_barang'] ?></td>
            <td><?= $data['nama_barang'] ?></td>
            <td><?= $data['kategori'] ?></td>
            <td><?= $data['stok'] ?></td>
            <td><?= $data['satuan'] ?></td>
            <td><?= number_format($data['harga_beli'], 0, ',', '.') ?></td>
            <td><?= number_format($data['harga_jual'], 0, ',', '.') ?></td>
            <td><?= $data['lokasi_rak'] ?></td>
            <td>
                <a href="edit.php?id=<?= $data['id_barang'] ?>">Edit</a> | 
                <a href="hapus.php?id=<?= $data['id_barang'] ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
