<?php
session_start();
require_once 'conn.php';

if (isset($_POST['register'])) {
    // Ambil data yang diinputkan dan bersihkan
    $nama = trim($_POST['nama_pelanggan']);
    $email = trim($_POST['email_pelanggan']);
    $telepon = trim($_POST['telepon_pelanggan']);
    $password = trim($_POST['password_pelanggan']);
    
    // Periksa apakah semua kolom diisi
    if (empty($nama) || empty($email) || empty($telepon) || empty($password)) {
        echo "<script>
                alert('Semua kolom harus diisi!');
                document.location.href='registration.php';
            </script>";
        exit; // Hentikan eksekusi skrip
    }

    // Menyiapkan query
    $sql = "INSERT INTO pelanggan (nama_pelanggan, email_pelanggan, telepon_pelanggan, password_pelanggan) VALUES (?, ?, ?, ?)";
    $stmt = $db_koneksi->prepare($sql);

    if ($stmt) {
        // Bind parameter ke query
        $stmt->bind_param("ssss", $nama, $email, $telepon, $password);
        
        // Eksekusi query untuk menyimpan ke database
        $saved = $stmt->execute();

        if ($saved) {
            echo "<script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href='login.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data gagal ditambahkan!');
                    document.location.href='login.php';
                </script>";
        }

        $stmt->close();
    } else {
        echo "Error: " . $db_koneksi->error;
    }
}

$db_koneksi->close();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Pelanggan HPhub</title>
     <!-- font awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <!-- css -->
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
                    <a class="nav-link text-uppercase" href="">Product</a>
                </li>
                <li class="nav-item px-2 py-2"> 
                    <a class="nav-link text-uppercase" href="">About Us</a>
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
    <div class="row text-center">
        <div class="col-md-12">
            <br /><br />
            <h2 style="margin-top: -1em">Daftar Pelanggan</h2>
            <h5>Silahkan Daftar</h5>
            <br />
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7 col-sm-6 col-xs-10 offset-sm-0 offset-xs-1">
            <div class="card">
                <div class="card-header">
                    <strong>Daftar</strong>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group mb-3">
                            <label for="nama_pelanggan">Nama Lengkap<font color=red>*</font></label>
                            <input class="form-control" type="text" name="nama_pelanggan" placeholder="Nama" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="email_pelanggan">Email<font color=red>*</font></label>
                            <input class="form-control" type="email" name="email_pelanggan" placeholder="Email" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="telepon_pelanggan">Telepon<font color=red>*</font></label>
                            <input class="form-control" type="text" name="telepon_pelanggan" placeholder="Telepon" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_pelanggan">Password<font color=red>*</font></label>
                            <input class="form-control" type="password" name="password_pelanggan" placeholder="Password" />
                        </div>
                        <button class="btn btn-primary" name="register">Daftar</button>
                        <hr/>
                        Sudah punya akun? <a href="login.php">Login di sini</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
