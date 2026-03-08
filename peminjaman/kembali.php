<?php
include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi,"SELECT buku_id FROM peminjaman WHERE id='$id'");
$d = mysqli_fetch_assoc($data);

$buku_id = $d['buku_id'];

mysqli_query($koneksi,"
UPDATE peminjaman
SET tanggal_kembali = CURDATE()
WHERE id='$id'
");

mysqli_query($koneksi,"
UPDATE buku
SET stok = stok + 1
WHERE id='$buku_id'
");

header("Location: aktif.php");
exit;
?>