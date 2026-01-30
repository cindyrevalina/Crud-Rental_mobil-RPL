<?php
session_start();
require_once 'config/database.php';

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

// Ambil statistik cepat
$stok = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM mobil"))['total'];
$tersedia = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as tersedia FROM mobil WHERE status='Tersedia'"))['tersedia'];
$pelanggan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pelanggan"))['total'];
$pendapatan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(total_biaya) as total FROM transaksi"))['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Rental Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #fff3e0; }
        .sidebar {
            width: 220px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #ff9800;
            padding-top: 20px;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            font-weight: bold;
        }
        .sidebar a:hover {
            background-color: #e68900;
            text-decoration: none;
        }
        .main {
            margin-left: 240px;
            padding: 20px;
        }
        .card-stat { background-color: #ff9800; color:white; text-align:center; padding:20px; border-radius:8px; }
        .card-stat:hover { background-color: #e68900; transition:0.3s; }
    </style>
</head>
<body>

<!-- SIDEBAR KIRI -->
<div class="sidebar">
    <h4 class="text-center text-white mb-4">Menu</h4>
    <a href="mobil.php">Data Mobil</a>
    <a href="pelanggan.php">Data Pelanggan</a>
    <a href="transaksi.php">Transaksi Sewa</a>
    <a href="laporan/index.php">Laporan Transaksi</a>
    <a href="profil.php">Profil Admin</a>
    <a href="logout.php" style="margin-top:20px;">Logout</a>
</div>

<!-- KONTEN UTAMA -->
<div class="main">
    <h3 style="color:#ff9800;">Dashboard Rental Mobil</h3>
    <p> <strong><?= $_SESSION['username']; ?></strong></p>

    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card-stat">
                <h5>Stok Mobil</h5>
                <h3><?= $stok ?></h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card-stat">
                <h5>Mobil Tersedia</h5>
                <h3><?= $tersedia ?></h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card-stat">
                <h5>Pelanggan</h5>
                <h3><?= $pelanggan ?></h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card-stat">
                <h5>Pendapatan</h5>
                <h3>Rp <?= number_format($pendapatan ?? 0,0,',','.'); ?></h3>
            </div>
        </div>
    </div>

    <div class="card p-3">
        <h5>Selamat Datang!</h5>
        <p>Kamu bisa pilih mau pake mobil apa hari ini.</p>
    </div>
</div>

</body>
</html>
