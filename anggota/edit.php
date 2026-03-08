<?php
include '../config/koneksi.php';
include '../navbar.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
  mysqli_query($koneksi, "SELECT * FROM anggota WHERE id='$id'")
);

if(isset($_POST['update'])){
  $nama  = $_POST['nama'];
  $kelas = $_POST['kelas'];
  $no_hp = $_POST['no_hp'];

  mysqli_query($koneksi, "UPDATE anggota SET
                          nama='$nama',
                          kelas='$kelas',
                          no_hp='$no_hp'
                          WHERE id='$id'");

  header("Location: index.php");
}
?>

<h3>Edit Anggota</h3>

<form method="post" class="col-md-6">
  <div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama"
           value="<?= $data['nama'] ?>"
           class="form-control">
  </div>

  <div class="mb-3">
    <label>Kelas</label>
    <input type="text" name="kelas"
           value="<?= $data['kelas'] ?>"
           class="form-control">
  </div>

  <div class="mb-3">
    <label>No HP</label>
    <input type="text" name="no_hp"
           value="<?= $data['no_hp'] ?>"
           class="form-control">
  </div>

  <button name="update" class="btn btn-primary">Update</button>
  <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

</div></div>
