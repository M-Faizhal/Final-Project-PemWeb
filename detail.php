<?php
session_start();
require_once 'conn.php';

$id_produk = $_GET["id"];

$ambil = $db_koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            padding-top: 25px;
        }

        .card {
            margin-top: 20px;
        }

        .img-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 400px;
            overflow: hidden;
        }

        .img-container img {
            max-width: 100%;
            max-height: 100%;
        }

        .product-details {
            margin-top: 20px;
        }

        .product-details h2, .product-details h4 {
            margin-bottom: 20px;
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
                    <a class="nav-link text-uppercase" href="./about.php">About Us</a>
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

    <section class="konten">
        <div class="container mt-5 pt-5">
            <div class="row mt-5 pt-5">
                <div class="col-md-6 img-container">
                    <img src="admin/foto_produk/<?php echo $detail["foto_produk"]; ?>" alt="" class="img-responsive">
                </div>
                <div class="col-md-6 product-details">
                    <h2><?php echo $detail["nama_produk"] ?></h2>
                    <h4>Rp. <?php echo number_format($detail["harga_produk"]); ?></h4>

                    <form method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" min="1" class="form-control" name="jumlah">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" name="beli">Beli</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST["beli"])) {
                        $jumlah = $_POST["jumlah"];
                        $_SESSION["keranjang"][$id_produk] = $jumlah;

                        echo "<script>alert('Produk Ditambahkan Ke Keranjang');</script>";
                        echo "<script>location='keranjang.php';</script>";
                    }
                    ?>

                    <p><?php echo $detail["deskripsi_produk"]; ?></p>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>
