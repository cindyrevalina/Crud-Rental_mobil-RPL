<?php
$host = "localhost";
$user = "root";      // ganti sesuai user db
$pass = "";          // ganti sesuai password db
$db   = "rental_mobil";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if(!$koneksi){
    die("Koneksi database gagal: ". mysqli_connect_error());
}
?>
