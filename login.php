<?php
session_start();
require_once 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | HPhub</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            padding-top: 150px;
        }

        .card {
            margin-top: 20px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="index.php">
                <img src="img/logo.png" style="width: 75px; height: 75px" alt="">
                <span class="fw-lighter ms-2">Tech Zone</span>
            </a>

            <div class="order-lg-2">
                <a href="keranjang.php">
                    <button type="button" class="btn position-relative">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge bg-primary"></span>
                    </button>
                </a>
                <a href="favorit.php">
                    <button type="button" class="btn position-relative">
                        <i class="fa fa-heart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge bg-primary"></span>
                    </button>
                </a>
                <a href="link-ke-search">
                    <button type="button" class="btn position-relative">
                        <i class="fa fa-search"></i>
                    </button>
                </a>
            </div>


            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-lg-1" id="navMenu">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item px-2 py-2"> 
                        <a class="nav-link text-uppercase" href="index.php">Home</a>
                    </li>
                    <li class="nav-item px-2 py-2"> 
                        <a class="nav-link text-uppercase" href="product.php">Product</a>
                    </li>
                    <li class="nav-item px-2 py-2"> 
                        <a class="nav-link text-uppercase" href="about.php">About Us</a>
                    </li>
                    <?php if (isset($_SESSION["pelanggan"])): ?>
                    <li class="nav-item px-2 py-2 border-0">
                        <a class="nav-link text-uppercase" href="logout.php">Logout</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item px-2 py-2 border-0">
                        <a class="nav-link text-uppercase" href="login.php">Login</a>
                    </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h2>Login Pelanggan</h2>
                    <p>Silahkan Masuk</p>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3 input-group">
                            <span class="input-group-text">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="mb-3 input-group">
                            <span class="input-group-text">
                                <i class="fa fa-lock"></i>
                            </span>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <button class="btn btn-primary w-100" name="login">Login</button>
                        <hr>
                        <div class="text-center">
                            Daftar Pelanggan <a href="register.php" class="text-decoration-none">Klik Disini</a>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['login'])) {
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                        $ambil = $db_koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

                        $akunyangcocok = $ambil->num_rows;

                        if ($akunyangcocok == 1) {
                            $akun = $ambil->fetch_assoc();
                            $_SESSION["pelanggan"] = $akun;
                            echo "<div class='alert alert-info mt-3'>Login Berhasil</div>";
                            echo "<script>location='keranjang.php';</script>";
                        } else {
                            echo "<div class='alert alert-danger mt-3'>Login Gagal</div>";
                            echo "<script>location='login.php';</script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
