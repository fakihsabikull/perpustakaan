<?php session_start(); ?>
<?php include '../config/koneksi.php'; ?>

<!doctype html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login | Perpustakaan</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="/perpustakaan/assets/logo.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
  background:#f1f3f7;
  min-height:100vh;
}

body::before{
  content:"";
  position:absolute;
  width:300px;
  height:300px;
  background:#0d6efd;
  filter:blur(120px);
  opacity:0.15;
  top:-50px;
  left:-50px;
}

body::after{
  content:"";
  position:absolute;
  width:300px;
  height:300px;
  background:#6ea8fe;
  filter:blur(120px);
  opacity:0.15;
  bottom:-50px;
  right:-50px;
}

.login-card{
  border:none;
  border-radius:18px;
  backdrop-filter:blur(10px);
  background:rgba(255,255,255,0.75);
  box-shadow:0 20px 40px rgba(0,0,0,0.1);
}

.logo-icon{
  width:70px;
  height:70px;
  background:#eef4ff;
  color:#0d6efd;
  font-size:32px;
  display:flex;
  align-items:center;
  justify-content:center;
  border-radius:50%;
  margin:auto;
}

.form-control{
  border-radius:8px;
}

.input-group-text{
  background:#f1f3f5;
  border-radius:8px 0 0 8px;
}

.btn-primary{
  border-radius:8px;
  padding:10px;
  font-weight:500;
}

.btn-primary:hover{
  transform:translateY(-1px);
  box-shadow:0 5px 15px rgba(0,0,0,0.2);
}
</style>
</head>

<body class="d-flex align-items-center" style="height:100vh;">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">

      <div class="card login-card shadow">
        <div class="card-body p-4">

          <div class="text-center mb-3">
            <div class="logo-icon">
              <i class="bi bi-book-half"></i>
            </div>
          </div>

          <h4 class="text-center mb-4">
            <i class="bi bi-person-circle me-1"></i>
            Login Admin
          </h4>

          <form method="post">

            <div class="mb-3">
              <label class="form-label">Username</label>
              <div class="input-group">
                <span class="input-group-text">
                  <i class="bi bi-person"></i>
                </span>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Password</label>
              <div class="input-group">
                <span class="input-group-text">
                  <i class="bi bi-lock"></i>
                </span>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
              </div>
            </div>

            <button type="submit" name="login" class="btn btn-primary w-100">
              <i class="bi bi-box-arrow-in-right"></i> Login
            </button>

          </form>

        </div>
      </div>

      <p class="text-center text-muted mt-3" style="font-size:13px;">
        © <?= date('Y') ?> Sistem Perpustakaan
      </p>

    </div>
  </div>
</div>

</body>
</html>

<?php
if(isset($_POST['login'])){
  $u = $_POST['username'];
  $p = $_POST['password'];

  $q = mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$u' AND password='$p'");

  if(mysqli_num_rows($q) > 0){
    $_SESSION['admin']=$u;
    header("location:../index.php");
    exit;
  }else{
    echo "<script>alert('Username atau password salah');</script>";
  }
}
?>