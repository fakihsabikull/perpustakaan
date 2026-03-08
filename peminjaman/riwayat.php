<?php
include '../config/koneksi.php';
include '../navbar.php';

$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

$data = mysqli_query($koneksi, "
SELECT p.id, b.judul, a.nama, p.tanggal_pinjam, p.tanggal_kembali
FROM peminjaman p
JOIN buku b ON p.buku_id = b.id
JOIN anggota a ON p.id_anggota = a.id
WHERE 
b.judul LIKE '%$cari%'
OR a.nama LIKE '%$cari%'
ORDER BY p.id DESC
");

$total = mysqli_num_rows($data);
?>

<div class="container mt-4">

<h3 class="mb-3">
<i class="bi bi-clock-history me-2"></i>Riwayat Peminjaman
</h3>

<div class="card shadow-sm">
<div class="card-body">

<div class="d-flex justify-content-between align-items-center mb-3">

<!-- SEARCH -->
<form method="GET">
<input type="text"
name="cari"
class="form-control"
placeholder="Cari judul buku / peminjam..."
value="<?= $cari ?>"
style="width:250px;">
</form>

<span class="badge bg-secondary">
Total Riwayat : <?= $total ?>
</span>

</div>

<div class="table-responsive">

<table class="table table-hover align-middle">

<thead class="table-dark">
<tr>
<th>No</th>
<th>Judul Buku</th>
<th>Peminjam</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Kembali</th>
<th>Status</th>
</tr>
</thead>

<tbody>

<?php
if($total > 0){
$no = 1;
while($r = mysqli_fetch_assoc($data)){
?>

<tr>
<td><?= $no++ ?></td>
<td><?= $r['judul'] ?></td>
<td><?= $r['nama'] ?></td>
<td><?= $r['tanggal_pinjam'] ?></td>
<td><?= $r['tanggal_kembali'] ?></td>

<td>
<?php if($r['tanggal_kembali'] == NULL){ ?>

<span class="badge bg-warning text-dark">
Dipinjam
</span>

<?php }else{ ?>

<span class="badge bg-success">
Selesai
</span>

<?php } ?>
</td>

</tr>

<?php
}
}else{
?>

<tr>
<td colspan="6" class="text-center text-muted py-4">
📚 Belum ada riwayat peminjaman
</td>
</tr>

<?php } ?>

</tbody>
</table>

</div>
</div>
</div>
</div>