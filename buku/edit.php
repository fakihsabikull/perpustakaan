<?php
include '../config/koneksi.php';
include '../navbar.php';

$id   = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM buku WHERE id='$id'");
$b    = mysqli_fetch_assoc($data);
?>

<div class="container mt-4">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow-lg border-0">

<div class="card-body p-4">

<h4 class="text-center mb-4">
<i class="bi bi-pencil-square"></i> Edit Buku
</h4>

<form action="proses.php" method="post">

<input type="hidden" name="id" value="<?= $b['id'] ?>">

<div class="mb-3">
<label class="form-label">Judul Buku</label>

<div class="input-group">
<span class="input-group-text">
<i class="bi bi-book"></i>
</span>

<input type="text"
name="judul"
class="form-control"
value="<?= $b['judul'] ?>"
required>
</div>

</div>

<div class="mb-3">
<label class="form-label">Penulis</label>

<div class="input-group">
<span class="input-group-text">
<i class="bi bi-person"></i>
</span>

<input type="text"
name="penulis"
class="form-control"
value="<?= $b['penulis'] ?>"
required>
</div>

</div>

<div class="mb-3">
<label class="form-label">Tahun Terbit</label>

<div class="input-group">
<span class="input-group-text">
<i class="bi bi-calendar"></i>
</span>

<input type="number"
name="tahun"
class="form-control"
value="<?= $b['tahun'] ?>"
required>
</div>

</div>

<div class="mb-4">
<label class="form-label">Stok Buku</label>

<div class="input-group">
<span class="input-group-text">
<i class="bi bi-box"></i>
</span>

<input type="number"
name="stok"
class="form-control"
value="<?= $b['stok'] ?>"
min="0"
required>
</div>

</div>

<div class="d-flex justify-content-between">

<a href="index.php" class="btn btn-outline-secondary">
<i class="bi bi-arrow-left"></i> Kembali
</a>

<button type="submit" name="update" class="btn btn-primary">
<i class="bi bi-save"></i> Update
</button>

</div>

</form>

</div>

</div>

</div>

</div>

</div>