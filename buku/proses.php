<?php
include '../config/koneksi.php';

// simpan
if(isset($_POST['simpan'])){
  $judul   = $_POST['judul'];
  $penulis = $_POST['penulis'];
  $tahun   = $_POST['tahun'];
  $stok    = $_POST['stok'];

  mysqli_query($koneksi, "
    INSERT INTO buku (judul, penulis, tahun, stok)
    VALUES ('$judul', '$penulis', '$tahun', '$stok')
  ");

  header("location:index.php");
}

// hapus
if(isset($_GET['hapus'])){
  mysqli_query($koneksi, "DELETE FROM buku WHERE id='$_GET[hapus]'");
  header("location:index.php");
}

// update
if(isset($_POST['update'])){
  mysqli_query($koneksi, "
    UPDATE buku SET
      judul='$_POST[judul]',
      penulis='$_POST[penulis]',
      tahun='$_POST[tahun]',
      stok='$_POST[stok]'
    WHERE id='$_POST[id]'
  ");

  header("location:index.php");
}