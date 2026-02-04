SISTEM APLIKASI RENTAL_MOBIL

PEJELASAN
1. index.php

Halaman dashboard utama

Menampilkan ringkasan:

Stok mobil

Mobil tersedia

Jumlah pelanggan

Total pendapatan

Menu navigasi ke Mobil, Pelanggan, Transaksi, Laporan, Profil

2. config/database.php

File untuk koneksi database MySQL

Contoh konfigurasi:

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


Semua query CRUD di aplikasi menggunakan $koneksi ini


3. assets/style.css

File CSS untuk warna, layout, dan tabel

Warna utama: oranye (#ff7a00)

Mengatur tampilan tabel, tombol, form, dan dashboard card


4. Folder mobil/

index.php → menampilkan semua data mobil (Read)

tambah.php → form tambah mobil baru (Create)

edit.php → form edit mobil (Update)

hapus.php → menghapus data mobil (Delete)

Semua file CRUD ini menggunakan database mobil


5. Folder pelanggan/

index.php → menampilkan semua data pelanggan

tambah.php → form tambah pelanggan

edit.php → form edit pelanggan

hapus.php → menghapus pelanggan

Tidak menampilkan kolom no telepon → menghindari warning


6. Folder transaksi/

index.php → menampilkan daftar transaksi penyewaan

tambah.php → form tambah transaksi/sewa mobil

Saat transaksi dibuat → status mobil otomatis diubah

Menampilkan informasi mobil, pelanggan, tanggal sewa, lama, total biaya, dan status


7. Folder laporan/

index.php → menampilkan laporan transaksi

Fitur filter tanggal dan total pendapatan

Tabel tetap konsisten dengan warna oranye untuk header


8. login.php & logout.php

login.php → login admin

logout.php → hapus session & redirect ke login

Untuk akses :
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

