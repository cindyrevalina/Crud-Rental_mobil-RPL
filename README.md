### SISTEM RENTAL MOBIL

Aplikasi Web Rental Mobil adalah aplikasi berbasis PHP dan MySQL yang digunakan untuk mengelola proses penyewaan mobil, mulai dari pendataan mobil, pelanggan, transaksi, hingga laporan. Aplikasi ini dibuat untuk memenuhi kebutuhan tugas perkuliahan dan menerapkan konsep CRUD (Create, Read, Update, Delete).

### Fitur Utama Aplikasi
### 1. Dashboard

Menampilkan ringkasan data:

Total mobil

Mobil tersedia

Jumlah pelanggan

Total pendapatan

Menyediakan navigasi ke menu:

Data Mobil

Data Pelanggan

Transaksi

Laporan

Profil

### 2. Manajemen Data Mobil

Fitur ini digunakan untuk mengelola data mobil yang tersedia untuk disewa.
Fungsi yang tersedia:

Menampilkan daftar mobil

Menambahkan data mobil baru

Mengedit data mobil

Menghapus data mobil

Setiap mobil memiliki status:

Tersedia

Tidak Tersedia
Status akan otomatis berubah saat mobil disewa.

### 3. Manajemen Data Pelanggan

Digunakan untuk menyimpan dan mengelola data pelanggan.
Fungsi yang tersedia:

Menampilkan data pelanggan

Menambahkan pelanggan baru

Mengedit data pelanggan

Menghapus data pelanggan

Catatan:

Nomor telepon tidak ditampilkan untuk menghindari warning PHP.

### 4. Transaksi Penyewaan

Digunakan untuk mencatat proses penyewaan mobil.
Fungsi transaksi:

Memilih pelanggan

Memilih mobil yang masih tersedia

Menentukan tanggal dan lama sewa

Menghitung total biaya secara otomatis

Saat transaksi berhasil:

Data transaksi tersimpan ke database

Status mobil otomatis berubah menjadi Tidak Tersedia

### 5. Laporan Transaksi

Digunakan untuk melihat rekap transaksi penyewaan.
Fitur laporan:

Menampilkan daftar transaksi

Filter transaksi berdasarkan tanggal

Menampilkan total pendapatan

Tampilan tabel dengan header berwarna oranye

### 6. Login & Logout

Login digunakan untuk membatasi akses ke aplikasi (admin)

Logout akan menghapus session dan mengarahkan kembali ke halaman login

### 7. Database

Aplikasi menggunakan database MySQL dengan nama database: rental_mobil
Database berisi tabel utama:

Admin

Mobil

Pelanggan

Transaksi

Users

Koneksi database disesuaikan dengan:

XAMPP → localhost

Hosting → https://cindyrentalmobil.42web.io/rental_mobil/

### 8. Teknologi yang Digunakan

PHP (Native)

MySQL

HTML

CSS

Apache (XAMPP / Hosting)

### 9. Tujuan Pembuatan

Menerapkan konsep CRUD

Melatih penggunaan PHP & MySQL

Membuat aplikasi web sederhana yang fungsional

Memenuhi tugas mata kuliah Rekayasa Perangkat Lunak


### 10 Untuk akses :
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

