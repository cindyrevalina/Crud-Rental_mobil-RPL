### SISTEM RENTAL MOBIL

---

## Penjelasan Folder & File

### 1. `index.php`
- Halaman dashboard utama
- Menampilkan ringkasan:
  - Stok mobil
  - Mobil tersedia
  - Jumlah pelanggan
  - Total pendapatan
- Menu navigasi ke Mobil, Pelanggan, Transaksi, Laporan, Profil

### 2. `config/database.php`
- File untuk koneksi database MySQL
```php
<?php
$host = "localhost";       // Host database (XAMPP: localhost, Hosting: sesuai host)
$user = "root";            // Username database
$pass = "";                // Password database
$db   = "rental_mobil";    // Nama database

$koneksi = mysqli_connect($host, $user, $pass, $db);
if(!$koneksi){
    die("KONEKSI DATABASE GAGAL: " . mysqli_connect_error());
}
?> '''


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

