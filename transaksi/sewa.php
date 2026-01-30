<?php
session_start();
require_once '../config/database.php';
if(!isset($_SESSION['login'])) header("Location: ../login.php");

$mobil = mysqli_query($koneksi,"SELECT * FROM mobil WHERE status='Tersedia'");
$pelanggan = mysqli_query($koneksi,"SELECT * FROM pelanggan");

if(isset($_POST['simpan'])){
    $kode = $_POST['kode_transaksi'];
    $pelanggan_id = $_POST['pelanggan_id'];
    $mobil_id = $_POST['mobil_id'];
    $tanggal = $_POST['tanggal'];
    $lama = $_POST['lama_sewa'];
    $total = $_POST['total_biaya'];
    
    mysqli_query($koneksi,"INSERT INTO transaksi (kode_transaksi, pelanggan_id, mobil_id, tanggal_sewa, lama_sewa, total_biaya, status) 
    VALUES ('$kode','$pelanggan_id','$mobil_id','$tanggal','$lama','$total','Belum Selesai')");
    
    mysqli_query($koneksi,"UPDATE mobil SET status='Tidak Tersedia' WHERE id='$mobil_id'");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Transaksi</title>
<link rel="stylesheet" href="../assets/style.css">
<style>
/* Container rapi tengah */
.container {
    max-width: 600px;
    margin: 40px auto;
    padding: 30px;
    background: #fffaf2; /* cream putih */
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
}

/* Judul oranye */
h3 {
    color: #ff7a00;
    text-align: center;
    margin-bottom: 30px;
}

/* Form vertical */
form label {
    display: block;
    margin-top: 15px;
    font-weight: bold;
    color: #333;
}
form input, form select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

/* Tombol */
form button, form a.btn {
    display: inline-block;
    margin-top: 20px;
}

form a.btn {
    text-decoration: none;
    text-align: center;
    padding: 10px 20px;
}
</style>
</head>
<body>
<div class="container">
<h3>Tambah Transaksi</h3>
<form method="POST">
    <label>Kode Transaksi</label>
    <input type="text" name="kode_transaksi" required>

    <label>Pelanggan</label>
    <select name="pelanggan_id" required>
        <?php while($p=mysqli_fetch_assoc($pelanggan)): ?>
            <option value="<?=$p['id']?>"><?=$p['nama']?></option>
        <?php endwhile; ?>
    </select>

    <label>Mobil</label>
    <select name="mobil_id" required>
        <?php while($m=mysqli_fetch_assoc($mobil)): ?>
            <option value="<?=$m['id']?>"><?=$m['merk']?> <?=$m['model']?></option>
        <?php endwhile; ?>
    </select>

    <label>Tanggal Sewa</label>
    <input type="date" name="tanggal" required>

    <label>Lama Sewa (hari)</label>
    <input type="number" name="lama_sewa" required>

    <label>Total Biaya</label>
    <input type="number" name="total_biaya" required>

    <button type="submit" name="simpan" class="btn-orange">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
</form>
</div>
</body>
</html>
