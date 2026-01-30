<?php
session_start();
require_once '../config/database.php';
if(!isset($_SESSION['login'])) header("Location: ../login.php");

// Filter tanggal
$start = $_GET['start'] ?? date('Y-m-01');
$end = $_GET['end'] ?? date('Y-m-d');

$query = "SELECT t.*, m.merk, m.model, p.nama 
          FROM transaksi t
          JOIN mobil m ON t.mobil_id = m.id
          JOIN pelanggan p ON t.pelanggan_id = p.id
          WHERE t.tanggal_sewa BETWEEN '$start' AND '$end'
          ORDER BY t.id DESC";
$result = mysqli_query($koneksi, $query);

// Total pendapatan
$total_query = "SELECT SUM(total_biaya) as total FROM transaksi 
                WHERE tanggal_sewa BETWEEN '$start' AND '$end'";
$total = mysqli_fetch_assoc(mysqli_query($koneksi, $total_query));
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan Transaksi</title>
<link rel="stylesheet" href="../assets/style.css">
<style>
.container { max-width: 1000px; margin:40px auto; padding:25px; background:#fffaf2; border-radius:10px; box-shadow:0 0 15px rgba(0,0,0,0.1);}
h3 { color:#ff7a00; text-align:center; margin-bottom:20px;}
.btn-orange { background-color:#ff7a00; color:white; padding:6px 12px; border-radius:6px; text-decoration:none; font-weight:bold; margin-right:5px;}
.btn-orange:hover { background-color:#e68900; opacity:0.9;}
table { width:100%; border-collapse:collapse; margin-top:20px;}
table th { background:#ff7a00; color:white; padding:12px; text-align:left;}
table td { padding:10px; background:#fffaf2; border-bottom:1px solid #ddd;}
table tr:nth-child(even) td { background:#fdf1df;}
table tr:hover td { background:#ffe0b2;}
</style>
</head>
<body>
<div class="container">
<h3>Laporan Transaksi</h3>

<form method="GET" style="margin-bottom:15px;">
<label>Dari Tanggal:</label>
<input type="date" name="start" value="<?=$start?>">
<label>Sampai Tanggal:</label>
<input type="date" name="end" value="<?=$end?>">
<button type="submit" class="btn-orange">Filter</button>
<a href="?start=<?=date('Y-m-01')?>&end=<?=date('Y-m-d')?>" class="btn btn-secondary">Reset</a>
</form>

<div class="alert alert-info" style="background:#fff3e0; color:#ff7a00; padding:10px; border-radius:6px;">
<strong>Total Pendapatan: Rp <?=number_format($total['total']??0,0,',','.')?></strong>
</div>

<table>
<thead>
<tr>
<th>ID</th>
<th>Kode</th>
<th>Pelanggan</th>
<th>Mobil</th>
<th>Tanggal</th>
<th>Lama</th>
<th>Total</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<?php while($row=mysqli_fetch_assoc($result)): ?>
<tr>
<td><?=$row['id']?></td>
<td><?=$row['kode_transaksi']?></td>
<td><?=$row['nama']?></td>
<td><?=$row['merk']?> <?=$row['model']?></td>
<td><?=$row['tanggal_sewa']?></td>
<td><?=$row['lama_sewa']?> hari</td>
<td>Rp <?=number_format($row['total_biaya'],0,',','.')?></td>
<td><?=$row['status']?></td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>
</body>
</html>
