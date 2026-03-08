<?php
include '../config/koneksi.php';
include '../navbar.php';

if(isset($_POST['simpan'])){
  $nama  = $_POST['nama'];
  $kelas = $_POST['kelas'];
  $no_hp = $_POST['no_hp'];

  mysqli_query($koneksi,"INSERT INTO anggota (nama,kelas,no_hp)
                         VALUES ('$nama','$kelas','$no_hp')");

  header("Location: index.php");
  exit;
}
?>

<div class="container mt-4">
  <div class="card shadow-sm col-md-6 mx-auto">
    <div class="card-body">

      <h4 class="mb-3">Tambah Anggota</h4>

      <form method="post">

        <div class="mb-3">
          <label>Nama Anggota</label>
          <div class="input-group">
            <span class="input-group-text">
              <i class="bi bi-person"></i>
            </span>
            <input type="text" name="nama" class="form-control" required>
          </div>
        </div>

        <div class="mb-3">
          <label>Kelas</label>
          <div class="input-group">
            <span class="input-group-text">
              <i class="bi bi-mortarboard"></i>
            </span>
            <input type="text" name="kelas" class="form-control" required>
          </div>
        </div>

        <div class="mb-3">
          <label>No HP</label>
          <div class="input-group">
            <span class="input-group-text">
              <i class="bi bi-telephone"></i>
            </span>
            <input type="text" name="no_hp" class="form-control" required>
          </div>
        </div>

        <button name="simpan" class="btn btn-success">
          <i class="bi bi-save"></i> Simpan
        </button>

        <a href="index.php" class="btn btn-secondary">
          <i class="bi bi-arrow-left"></i> Kembali
        </a>

      </form>

    </div>
  </div>
</div>