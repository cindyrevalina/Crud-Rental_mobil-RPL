<?php
session_start();
require_once '../config/database.php';
if(!isset($_SESSION['login'])) header("Location: ../login.php");

if(isset($_POST['simpan'])){
    $merk = $_POST['merk'];
    $model = $_POST['model'];
    $tahun = $_POST['tahun'];
    $status = $_POST['status'];

    mysqli_query($koneksi,"INSERT INTO mobil (merk, model, tahun, status) VALUES ('$merk','$model','$tahun','$status')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Mobil</title>
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
h3 {
    color: #ff7a00;
    text-align: center;
    margin-bottom: 30px;
}
form label {
    display: block;
    margin-top: 15px;
    font-weight: bold;
}
form input, form select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 6px;
    border: 1px solid #ccc;
}
form button, form a.btn {
    margin-top: 20px;
}
</style>
</head>
<body>
<div class="container">
<h3>Tambah Mobil</h3>
<form method="POST">
<label>Merk</label>
<input type="text" name="merk" required>
<label>Model</label>
<input type="text" name="model" required>
<label>Tahun</label>
<input type="number" name="tahun" required>
<label>Status</label>
<select name="status" required>
<option value="Tersedia">Tersedia</option>
<option value="Tidak Tersedia">Tidak Tersedia</option>
</select>
<button type="submit" name="simpan" class="btn-orange">Simpan</button>
<a href="index.php" class="btn btn-secondary">Batal</a>
</form>
</div>
</body>
</html>
