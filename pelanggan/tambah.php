<?php
session_start();
require_once '../config/database.php';
if(!isset($_SESSION['login'])) header("Location: ../login.php");

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];

    mysqli_query($koneksi,"INSERT INTO pelanggan (nama,email,telp) VALUES ('$nama','$email','$telp')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Pelanggan</title>
<link rel="stylesheet" href="../assets/style.css">
<style>
.container {
    max-width: 600px;
    margin: 40px auto;
    padding: 25px;
    background: #fffaf2;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
}
h3 { color:#ff7a00; text-align:center; margin-bottom:30px; }
form label { display:block; margin-top:15px; font-weight:bold; }
form input { width:100%; padding:10px; margin-top:5px; border-radius:6px; border:1px solid #ccc;}
form button, form a.btn { margin-top:20px; }
</style>
</head>
<body>
<div class="container">
<h3>Tambah Pelanggan</h3>
<form method="POST">
<label>Nama</label>
<input type="text" name="nama" required>
<label>Email</label>
<input type="email" name="email" required>
<label>Telp</label>
<input type="text" name="telp" required>
<button type="submit" name="simpan" class="btn-orange">Simpan</button>
<a href="index.php" class="btn btn-secondary">Batal</a>
</form>
</div>
</body>
</html>
