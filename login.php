<?php
session_start();
require_once 'config/database.php';

// Jika sudah login, redirect ke dashboard
if(isset($_SESSION['login'])){
    header("Location: index.php");
    exit;
}

$error = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Ambil hanya kolom yang diperlukan: username + password
    $query = "SELECT username, password FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($koneksi, $query);

    if(mysqli_num_rows($result) === 1){
        $user = mysqli_fetch_assoc($result);

        // Cek password hash
        if(password_verify($password, $user['password'])){
            $_SESSION['login'] = true;
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Rental Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #fff3e0; } /* oranye muda background */
        .card { border-top: 4px solid #ff9800; } /* garis oranye */
        .btn-primary { background-color: #ff9800; border: none; } /* tombol oranye */
        .btn-primary:hover { background-color: #e68900; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <h4 class="text-center mb-3" style="color:#ff9800;">Login Sistem Rental</h4>
                <?php if($error): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
