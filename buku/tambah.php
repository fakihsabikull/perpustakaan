<?php include '../navbar.php'; ?>

<div class="container mt-4">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow-lg border-0">

<div class="card-body p-4">

<h4><i class="bi bi-plus-circle me-2"></i>Tambah Buku</h4>

<form method="post" action="proses.php">

<div class="mb-3">
<label class="form-label">Judul Buku</label>
<div class="input-group">
<span class="input-group-text">
<i class="bi bi-book"></i>
</span>
<input type="text" name="judul" class="form-control" placeholder="Masukkan judul buku" required>
</div>
</div>

<div class="mb-3">
<label class="form-label">Penulis</label>
<div class="input-group">
<span class="input-group-text">
<i class="bi bi-person"></i>
</span>
<input type="text" name="penulis" class="form-control" placeholder="Nama penulis" required>
</div>
</div>

<div class="mb-3">
<label class="form-label">Tahun Terbit</label>
<div class="input-group">
<span class="input-group-text">
<i class="bi bi-calendar"></i>
</span>
<input type="number" name="tahun" class="form-control" placeholder="Contoh: 2024" required>
</div>
</div>

<div class="mb-4">
<label class="form-label">Stok Buku</label>
<div class="input-group">
<span class="input-group-text">
<i class="bi bi-box"></i>
</span>
<input type="number" name="stok" class="form-control" min="1" required>
</div>
</div>

<div class="d-flex justify-content-between">

<a href="index.php" class="btn btn-outline-secondary">
<i class="bi bi-arrow-left"></i> Kembali
</a>

<button name="simpan" class="btn btn-success">
<i class="bi bi-save"></i> Simpan
</button>

</div>

</form>

</div>

</div>

</div>

</div>

</div>