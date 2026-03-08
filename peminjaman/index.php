<?php
include '../config/koneksi.php';
include '../navbar.php';

$id = $_GET['id'] ?? null;
$buku = null;

if($id){
    $query = mysqli_query($koneksi,"SELECT * FROM buku WHERE id='$id'");
    $buku = mysqli_fetch_assoc($query);
}
?>

<div class="container mt-4">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow-lg border-0">

<div class="card-body p-4">

<h4 class="mb-4 text-center">
<i class="bi bi-journal-arrow-up"></i> Peminjaman Buku
</h4>

<form method="post" action="proses.php">

<input type="hidden" name="buku_id" value="<?= $buku['id'] ?? '' ?>">

<div class="mb-3">
<label class="form-label">Judul Buku</label>

<div class="input-group">
<span class="input-group-text">
<i class="bi bi-book"></i>
</span>

<input 
type="text" 
class="form-control"
value="<?= $buku['judul'] ?? '' ?>"
placeholder="Judul buku akan muncul jika dipilih dari Data Buku"
readonly>

</div>
</div>

<div class="mb-3">

<label class="form-label">Nama Anggota</label>

<select name="id_anggota" class="form-select" required>

<option value="">Pilih Anggota</option>

<?php
$anggota = mysqli_query($koneksi, "SELECT * FROM anggota");
while ($row = mysqli_fetch_assoc($anggota)) {
echo "<option value='{$row['id']}'>{$row['nama']}</option>";
}
?>

</select>

</div>

<div class="mb-3">

<label class="form-label">Tanggal Pinjam</label>

<input 
type="date" 
name="tanggal_pinjam" 
id="tanggal_pinjam"
class="form-control"
required>

</div>

<div class="mb-4">

<label class="form-label">Tanggal Kembali</label>

<input 
type="date"
name="tanggal_kembali"
id="tanggal_kembali"
class="form-control"
required>

</div>

<div class="d-flex justify-content-between">

<a href="../buku/index.php" class="btn btn-outline-secondary">
<i class="bi bi-arrow-left"></i> Batal
</a>

<button name="pinjam" class="btn btn-success">
<i class="bi bi-check-circle"></i> Konfirmasi Pinjam
</button>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

<script>

document.getElementById("tanggal_pinjam").addEventListener("change", function(){

let pinjam = new Date(this.value);

pinjam.setDate(pinjam.getDate() + 7);

let kembali = pinjam.toISOString().split('T')[0];

document.getElementById("tanggal_kembali").value = kembali;

});

</script>