<?php
include '../config/config.php';
$result = mysqli_query($conn, "SELECT * FROM barang ORDER BY id_barang DESC");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Data Barang</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="container">
  <h1>Data Barang</h1>
  <a href="add.php" class="btn">+ Tambah Barang</a>
  <table>
    <tr>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Kategori</th>
      <th>Stok</th>
      <th>Satuan</th>
      <th>Harga Beli</th>
      <th>Harga Jual</th>
      <th>Lokasi Rak</th>
      <th>Aksi</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?= htmlspecialchars($row['kode_barang']) ?></td>
      <td><?= htmlspecialchars($row['nama_barang']) ?></td>
      <td><?= htmlspecialchars($row['kategori']) ?></td>
      <td><?= $row['stok'] ?></td>
      <td><?= htmlspecialchars($row['satuan']) ?></td>
      <td><?= number_format($row['harga_beli'],0,',','.') ?></td>
      <td><?= number_format($row['harga_jual'],0,',','.') ?></td>
      <td><?= htmlspecialchars($row['lokasi_rak']) ?></td>
      <td>
        <a href="edit.php?id=<?= $row['id_barang'] ?>" class="btn btn-warning">Edit</a>
        <a href="delete.php?id=<?= $row['id_barang'] ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>
</body>
</html>
