<?php
session_start();
require_once '../config/database.php';
if(!isset($_SESSION['login'])) header("Location: ../login.php");

$result = mysqli_query($koneksi,"SELECT * FROM pelanggan");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Pelanggan</title>
<link rel="stylesheet" href="../assets/style.css">
<style>
.container {
    max-width: 900px;
    margin: 40px auto;
    padding: 25px;
    background: #fffaf2;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
}
h3 {
    color: #ff7a00;
    text-align: center;
    margin-bottom: 20px;
}
.btn-orange {
    background-color: #ff7a00;
    color: white;
    padding: 6px 12px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: bold;
    margin-right: 5px;
}
.btn-orange:hover { background-color: #e68900; opacity:0.9; }
.btn-danger { background-color: #d32f2f; color:white; padding:5px 10px; border-radius:6px; text-decoration:none;}
.btn-danger:hover { background-color:#b71c1c; opacity:0.9;}
table { width:100%; border-collapse:collapse; margin-top:20px;}
table th { background:#ff7a00; color:white; padding:12px; text-align:left;}
table td { padding:10px; background:#fffaf2; border-bottom:1px solid #ddd;}
table tr:nth-child(even) td { background:#fdf1df;}
table tr:hover td { background:#ffe0b2;}
</style>
</head>
<body>
<div class="container">
<h3>Data Pelanggan</h3>
<div style="margin-bottom:15px;">
<a href="../index.php" class="btn btn-secondary">Kembali Dashboard</a>
<a href="tambah.php" class="btn-orange">Tambah Pelanggan</a>
</div>
<table>
<thead>
<tr>
<th>ID</th>
<th>Nama</th>
<th>Email</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php while($row=mysqli_fetch_assoc($result)): ?>
<tr>
<td><?=$row['id']?></td>
<td><?=$row['nama']?></td>
<td><?=$row['email']?></td>
<td>
<a href="edit.php?id=<?=$row['id']?>" class="btn-orange btn-sm">Edit</a>
<a href="hapus.php?id=<?=$row['id']?>" class="btn-danger btn-sm" onclick="return confirm('Hapus pelanggan ini?')">Hapus</a>
</td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>
</body>
</html>
