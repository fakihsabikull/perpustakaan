<?php
include '../config/koneksi.php';
include '../navbar.php';

$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

$data = mysqli_query($koneksi, "
SELECT p.id, b.judul, a.nama, p.tanggal_pinjam
FROM peminjaman p
JOIN buku b ON p.buku_id = b.id
JOIN anggota a ON p.id_anggota = a.id
WHERE p.tanggal_kembali IS NULL
AND (
  b.judul LIKE '%$cari%' 
  OR a.nama LIKE '%$cari%'
)
");
?>

<div class="container mt-4">

<h3>
<i class="bi bi-arrow-left-right me-2"></i>Peminjaman Aktif
</h3>

<!-- SEARCH (sama kayak data buku) -->
<form method="GET" class="mb-3">
<input type="text" 
       name="cari" 
       class="form-control" 
       placeholder="Cari peminjam / buku..."
       value="<?= $cari ?>"
       style="max-width:300px;">
</form>

<div class="card shadow-sm">
<div class="card-body">

<table class="table table-bordered">

<tr class="table-dark">
<th>No</th>
<th>Judul Buku</th>
<th>Peminjam</th>
<th>Tanggal Pinjam</th>
<th>Aksi</th>
</tr>

<?php $no=1; while($p = mysqli_fetch_assoc($data)){ ?>

<tr>
<td><?= $no++ ?></td>
<td><?= $p['judul'] ?></td>
<td><?= $p['nama'] ?></td>
<td><?= $p['tanggal_pinjam'] ?></td>
<td>

<a href="kembali.php?id=<?= $p['id'] ?>"
class="btn btn-success btn-sm"
onclick="return confirm('Kembalikan buku ini?')">
Kembalikan
</a>

</td>
</tr>

<?php } ?>

</table>

</div>
</div>
</div>