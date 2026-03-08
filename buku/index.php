<?php
session_start();
if(!isset($_SESSION['admin'])){
  header("location:../auth/login.php");
  exit;
}

include '../config/koneksi.php';
include '../navbar.php';

$data = mysqli_query($koneksi, "SELECT * FROM buku");

$total = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM buku");
$total_buku = mysqli_fetch_assoc($total);
?>

<style>
  .data-card{
  border:none;
  border-radius:14px;
}

.table thead{
  font-size:14px;
}

.table tbody tr{
  transition:0.15s;
}

.table tbody tr:hover{
  background:#f5f7fa;
}

.search-box{
  position:relative;
}

.search-box i{
  position:absolute;
  top:10px;
  left:12px;
  color:#6c757d;
}

.search-box input{
  padding-left:35px;
  border-radius:8px;
}

.badge-stok{
  font-size:13px;
  padding:6px 10px;
}

.action-btns .btn{
  border-radius:6px;
}
</style>

<div class="container mt-4">

<div class="d-flex justify-content-between align-items-center mb-3">
<h3><i class="bi bi-book"></i> Data Buku</h3>

<a href="tambah.php" class="btn btn-primary">
<i class="bi bi-plus-lg"></i> Tambah Buku
</a>
</div>

<div class="row mb-3">
<div class="col-md-4">
<div class="search-box">
<i class="bi bi-search"></i>
<input type="text" id="search" class="form-control" placeholder="Cari judul / penulis...">
</div>
</div>

<div class="col-md-8 text-end">
<span class="badge bg-primary fs-6">
Total Buku : <?= $total_buku['jumlah'] ?>
</span>
</div>
</div>

<div class="card data-card shadow-sm">
<div class="card-body">

<table class="table table-hover table-striped align-middle" id="tabelBuku">

<thead class="table-dark">
<tr>
<th>No</th>
<th>Judul</th>
<th>Penulis</th>
<th>Tahun</th>
<th>Stok</th>
<th class="text-center">Aksi</th>
</tr>
</thead>

<tbody>

<?php
if(mysqli_num_rows($data) > 0){
$no = 1;
while($b = mysqli_fetch_assoc($data)){
?>

<tr>

<td><?= $no++ ?></td>

<td><?= $b['judul'] ?></td>

<td><?= $b['penulis'] ?></td>

<td><?= $b['tahun'] ?></td>

<td>

<?php if($b['stok'] > 5){ ?>

<span class="badge bg-success"><?= $b['stok'] ?></span>

<?php }elseif($b['stok'] > 0){ ?>

<span class="badge bg-warning"><?= $b['stok'] ?></span>

<?php }else{ ?>

<span class="badge bg-danger">0</span>

<?php } ?>

</td>

<td class="text-center">

<?php if($b['stok'] > 0){ ?>

<a href="../peminjaman/index.php?id=<?= $b['id'] ?>" 
class="btn btn-primary btn-sm">
<i class="bi bi-box-arrow-up"></i>
</a>

<?php }else{ ?>

<span class="badge bg-secondary">Stok Habis</span>

<?php } ?>

<a href="edit.php?id=<?= $b['id'] ?>" 
class="btn btn-warning btn-sm">
<i class="bi bi-pencil"></i>
</a>

<a href="index.php?hapus=<?= $b['id'] ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin hapus buku ini?')">
<i class="bi bi-trash"></i>
</a>

</td>

</tr>

<?php
}
}else{
?>

<tr>
<td colspan="6" class="text-center text-muted py-4">
📚 Data buku masih kosong
</td>
</tr>

<?php } ?>

</tbody>

</table>

</div>
</div>

</div>

<script>

document.getElementById("search").addEventListener("keyup", function(){

let value = this.value.toLowerCase();

let rows = document.querySelectorAll("#tabelBuku tbody tr");

rows.forEach(function(row){

row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";

});

});

</script>