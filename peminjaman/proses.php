<?php
include '../config/koneksi.php';

if(isset($_POST['pinjam'])){

$buku_id = $_POST['buku_id'];
$id_anggota = $_POST['id_anggota'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];

mysqli_query($koneksi,"
INSERT INTO peminjaman
(buku_id, id_anggota, tanggal_pinjam, status)
VALUES
('$buku_id','$id_anggota','$tanggal_pinjam','dipinjam')
");

mysqli_query($koneksi,"
UPDATE buku
SET stok = stok - 1
WHERE id='$buku_id'
");

header("location:../buku/index.php");
}
?>