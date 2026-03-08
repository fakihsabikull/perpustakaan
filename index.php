<?php
session_start();
if(!isset($_SESSION['admin'])){
  header("location:auth/login.php");
  exit;
}

include 'config/koneksi.php';
include 'navbar.php';

// total judul buku
$q_buku = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM buku");
$buku = mysqli_fetch_assoc($q_buku);

// total stok tersedia
$q_stok = mysqli_query($koneksi, "SELECT SUM(stok) as total FROM buku");
$stok = mysqli_fetch_assoc($q_stok);

// buku sedang dipinjam
$q_pinjam = mysqli_query($koneksi, "
  SELECT COUNT(*) as total 
  FROM peminjaman 
  WHERE tanggal_kembali IS NULL
");
$pinjam = mysqli_fetch_assoc($q_pinjam);
?>

<style>
  .dashboard-card{
  border:none;
  border-radius:14px;
  transition:0.25s;
  position:relative;
  overflow:hidden;
}

.dashboard-card:hover{
  transform:translateY(-4px);
  box-shadow:0 15px 30px rgba(0,0,0,0.1);
}

.dashboard-icon{
  font-size:40px;
  opacity:0.15;
  position:absolute;
  right:20px;
  bottom:10px;
}

.dashboard-number{
  font-size:32px;
  font-weight:700;
}

.dashboard-title{
  color:#6c757d;
  font-size:14px;
}
</style>

<div class="container mt-4">

<h3><i class="bi bi-speedometer2 me-2"></i>Dashboard</h3>

<div class="row g-3">

<!-- TOTAL BUKU -->
<div class="col-md-4">
  <div class="card dashboard-card shadow-sm">
    <div class="card-body">

      <div class="dashboard-title">Total Judul Buku</div>
      <div class="dashboard-number text-primary">
        <?= $buku['total'] ?>
      </div>

      <i class="bi bi-book dashboard-icon text-primary"></i>

    </div>
  </div>
</div>

<!-- STOK TERSEDIA -->
<div class="col-md-4">
  <div class="card dashboard-card shadow-sm">
    <div class="card-body">

      <div class="dashboard-title">Total Stok Tersedia</div>
      <div class="dashboard-number text-success">
        <?= $stok['total'] ?? 0 ?>
      </div>

      <i class="bi bi-box-seam dashboard-icon text-success"></i>

    </div>
  </div>
</div>

<!-- BUKU DIPINJAM -->
<div class="col-md-4">
  <div class="card dashboard-card shadow-sm">
    <div class="card-body">

      <div class="dashboard-title">Buku Sedang Dipinjam</div>
      <div class="dashboard-number text-danger">
        <?= $pinjam['total'] ?>
      </div>

      <i class="bi bi-arrow-left-right dashboard-icon text-danger"></i>

    </div>
  </div>
</div>

</div>
</div>