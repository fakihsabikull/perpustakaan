<?php
include '../config/koneksi.php';
include '../navbar.php';

$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

$data = mysqli_query($koneksi, "
SELECT * FROM anggota
WHERE 
nama LIKE '%$cari%' 
OR kelas LIKE '%$cari%' 
OR no_hp LIKE '%$cari%'
ORDER BY id DESC
");

$total = mysqli_num_rows($data);
?>

<div class="container mt-4">

<div class="d-flex justify-content-between align-items-center mb-3">
<h3 class="mb-4">
<i class="bi bi-people me-2"></i>Data Anggota
</h3>

<a href="tambah.php" class="btn btn-primary">
+ Tambah Anggota
</a>
</div>

<div class="card shadow-sm">
<div class="card-body">

<div class="d-flex justify-content-between align-items-center mb-3">

<!-- SEARCH DI KIRI -->
<form method="GET">
<input type="text"
name="cari"
class="form-control"
placeholder="Cari nama / kelas / no hp..."
value="<?= $cari ?>"
style="width:250px;">
</form>

<!-- TOTAL DI KANAN -->
<span class="badge bg-secondary">
Total Anggota : <?= $total ?>
</span>

</div>

<div class="table-responsive">

<table class="table table-hover align-middle">

<thead class="table-dark">
<tr>
<th width="60">No</th>
<th>Nama</th>
<th>Kelas</th>
<th>No HP</th>
<th class="text-center">Aksi</th>
</tr>
</thead>

<tbody>

<?php
if($total > 0){
$no = 1;
while($row = mysqli_fetch_assoc($data)){
?>

<tr>
<td><?= $no++ ?></td>
<td><?= $row['nama'] ?></td>
<td><?= $row['kelas'] ?></td>
<td><?= $row['no_hp'] ?></td>

<td class="text-center">

<a href="edit.php?id=<?= $row['id'] ?>"
class="btn btn-warning btn-sm">
Edit
</a>

<a href="hapus.php?id=<?= $row['id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin hapus anggota ini?')">
Hapus
</a>

</td>
</tr>

<?php
}
}else{
?>

<tr>
<td colspan="5" class="text-center text-muted py-4">
👤 Data anggota tidak ditemukan
</td>
</tr>

<?php } ?>

</tbody>
</table>

</div>
</div>
</div>
</div>