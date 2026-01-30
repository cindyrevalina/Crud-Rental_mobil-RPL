<?php
session_start();
require_once '../config/database.php';
if(!isset($_SESSION['login'])) header("Location: ../login.php");

$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM mobil WHERE id='$id'");
header("Location: index.php");
