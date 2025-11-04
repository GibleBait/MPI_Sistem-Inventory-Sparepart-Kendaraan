<?php
include '../config/koneksi.php';
$id = $_GET['id'];

$hapus = mysqli_query($koneksi, "DELETE FROM tb_barang WHERE id_barang='$id'");

if ($hapus) {
    echo "<script>alert('Data berhasil dihapus'); window.location='index.php';</script>";
} else {
    echo "Gagal hapus data: " . mysqli_error($koneksi);
}
?>
