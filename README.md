### SISTEM RENTAL MOBIL


### 1. index.php

Halaman dashboard utama

Menampilkan ringkasan:

Stok mobil

Mobil tersedia

Jumlah pelanggan

Total pendapatan

Menu navigasi ke Mobil, Pelanggan, Transaksi, Laporan, Profil

### 2. config/database.php

File untuk koneksi database MySQL

<?php
$host = "localhost";       // Host database (XAMPP: localhost, Hosting: sesuai host)
$user = "root";            // Username database
$pass = "";                // Password database
$db   = "rental_mobil";    // Nama database

$koneksi = mysqli_connect($host, $user, $pass, $db);
if(!$koneksi){
    die("KONEKSI DATABASE GAGAL: " . mysqli_connect_error());
}
?>

### 3. assets/style.css

File CSS untuk warna, layout, tabel

Warna utama: oranye (#ff7a00)

Mengatur tampilan tabel, tombol, form, dan dashboard card

### 4. Folder mobil/

index.php → menampilkan semua data mobil (Read)

tambah.php → tambah mobil baru (Create)

edit.php → edit mobil (Update)

hapus.php → hapus mobil (Delete)

### 5. Folder pelanggan/

index.php → menampilkan semua pelanggan

tambah.php → tambah pelanggan

edit.php → edit pelanggan

hapus.php → hapus pelanggan

Tidak menampilkan nomor telepon → menghindari warning PHP

### 6. Folder transaksi/

index.php → daftar transaksi

tambah.php → tambah transaksi/sewa mobil

Saat transaksi dibuat → status mobil otomatis berubah

### 7. Folder laporan/

index.php → laporan transaksi

Fitur filter tanggal & total pendapatan

Header tabel berwarna oranye

### 8. login.php & logout.php

login.php → login admin

logout.php → hapus session & redirect ke login

### 9. README.md

Dokumentasi aplikasi

Menjelaskan struktur folder, cara instalasi, fitur CRUD, dan cara pakai

### 10Untuk akses :
http://localhost/rental_mobil/index.php (Dasboard)

http://localhost/rental_mobil/mobil/index.php
http://localhost/rental_mobil/mobil/tambah.php
http://localhost/rental_mobil/mobil/edit.php?id=1

http://localhost/rental_mobil/pelanggan/index.php
http://localhost/rental_mobil/pelanggan/tambah.php

http://localhost/rental_mobil/transaksi/index.php
http://localhost/rental_mobil/transaksi/sewa.php

http://localhost/rental_mobil/laporan/index.php
http://localhost/rental_mobil/profil/index.php

http://localhost/rental_mobil/login.php 
user[admin] password[admin123]

