<?php
$path = $_SERVER['PHP_SELF'];
?>

<head>
<title>Sistem Perpustakaan</title>

<link rel="icon" type="image/png" href="/perpustakaan/assets/logo.png">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<style>
body{
  background-color:#f4f6f9;
}

.logo{
  display:flex;
  align-items:center; 
  gap:12px;
  padding:10px 8px;
  margin-bottom:20px;
}

.logo-icon{
  width:40px;
  height:40px;
  background:#0d6efd;
  display:flex;
  align-items:center;
  justify-content:center;
  border-radius:10px;
  color:white;
  font-size:20px;
  box-shadow:0 4px 10px rgba(13,110,253,.4);
}

.logo-text span{
  color:white;
  font-weight:600;
  font-size:15px;
  display:block;
}

.logo-text small{
  color:#9aa4af;
  font-size:11px;
}

.sidebar{
  width:250px;
  min-height:100vh;
}

.sidebar ul{
  gap:6px;
}

.sidebar .list-group-item{
  background:transparent;
  border:none;
  color:#c2c7d0;
  padding:10px 14px;
  border-radius:8px;
  transition:all .2s ease;
  display:flex;
  align-items:center;
  gap:10px;
}

.sidebar .list-group-item:hover{
  background:#495057;
  color:#fff;
  transform:translateX(4px);
}

.sidebar .list-group-item.active{
  background:#0d6efd;
  color:#fff;
  box-shadow:0 4px 10px rgba(13,110,253,.3);
}

.sidebar .list-group-item i{
  font-size:18px;
}
</style>

<div class="d-flex">

<div class="sidebar bg-dark p-3"> 
<div class="logo mb-4">
    <div class="logo-icon">
        <i class="bi bi-book-half"></i>
    </div>
    <div class="logo-text">
        <span>PERPUSTAKAAN</span>
        <small>Management</small>
    </div>
</div>

<ul class="nav flex-column">

<li>
<a href="/perpustakaan/index.php"
class="list-group-item <?= $path == '/perpustakaan/index.php' ? 'active' : '' ?>">
<i class="bi bi-speedometer2 me-2"></i> Dashboard
</a>
</li>

<li>
<a href="/perpustakaan/buku/index.php"
class="list-group-item <?= strpos($path,'/buku/') !== false ? 'active' : '' ?>">
<i class="bi bi-book me-2"></i> Data Buku
</a>
</li>

<li>
<a href="/perpustakaan/anggota/index.php"
class="list-group-item <?= strpos($path,'/anggota/') !== false ? 'active' : '' ?>">
<i class="bi bi-people me-2"></i> Data Anggota
</a>
</li>

<li>
<a href="/perpustakaan/peminjaman/aktif.php"
class="list-group-item <?= strpos($path,'/peminjaman/') !== false && strpos($path,'riwayat') === false ? 'active' : '' ?>">
<i class="bi bi-arrow-left-right me-2"></i> Peminjaman Aktif
</a>
</li>

<li>
<a href="/perpustakaan/peminjaman/riwayat.php"
class="list-group-item <?= strpos($path,'riwayat') !== false ? 'active' : '' ?>">
<i class="bi bi-clock-history me-2"></i> Riwayat Peminjaman
</a>
</li>

<hr class="text-secondary">

<li>
<a href="/perpustakaan/auth/logout.php" class="list-group-item text-danger">
<i class="bi bi-box-arrow-right me-2"></i> Logout
</a>
</li>

</ul>
</div>

<div class="flex-grow-1 p-4">