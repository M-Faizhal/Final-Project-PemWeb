    <?php
        session_start();
        require_once 'conn.php';

        $idpem = $_GET["id"];
        $ambil = $db_koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$idpem'");
        $detpem = $ambil->fetch_assoc();
        
        $idpel = $detpem["id_pelanggan"];

        $idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pembayaran</title>
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
                <div class="search-container">
                    <input type="text" id="search" class="form-control search-input" placeholder="Cari Produk..." style="display: none;" onkeyup="cariProduk()">
                    <i class="fa fa-search" id="search-icon" onclick="toggleSearch()"></i>
                </div>
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

    <div class="container">
    <div class="row text-center">
        <div class="col-md-12">
            <br /><br />
            <h2 style="margin-top: -1em">Silahkan Konfirmasi Pembayaran Anda</h2>
            <h5>Untuk Proses Lebih Lanjut</h5>
            <br />
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7 col-sm-6 col-xs-10 offset-sm-0 offset-xs-1">
            <div class="card">
                <div class="card-header">
                    <strong>Konfirmasi Pembayaran</strong>
                    <div class="alert alert-info"><strong>Total Tagihan Rp. <?php echo number_format($detpem["total_pembelian"]); ?></strong></div>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="nama_pelanggan">Nama Penyetor<font color=red>*</font></label>
                            <input class="form-control" type="text" name="nama" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="email_pelanggan">Bank<font color=red>*</font></label>
                            <input class="form-control" type="text" name="bank" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="telepon_pelanggan">Jumlah<font color=red>*</font></label>
                            <input class="form-control" type="text" name="jumlah" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_pelanggan">Bukti Pembayaran<font color=red>*</font></label>
                            <input class="form-control" type="file" name="bukti" />
                        </div>
                        <button class="btn btn-success" name="kirim">Konfirmasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST["kirim"])) 
{
    $namabukti = $_FILES["bukti"]["name"];
    $lokasibukti = $_FILES["bukti"]["tmp_name"];
    $namafiks = date("YmdHis").$namabukti;
    move_uploaded_file($lokasibukti, "bukti_pembayaran/$namabukti");

    $nama = $_POST["nama"];
    $bank = $_POST["bank"];
    $jumlah = $_POST["jumlah"];
    $tanggal = date("Y-m-d");

    $db_koneksi->query("INSERT INTO pembayaran(id_pembelian, nama, bank, jumlah, tanggal, bukti) 
    VALUES ('$idpem', '$nama', '$bank', '$jumlah', '$tanggal', '$namafiks')");

    $db_koneksi->query("UPDATE pembelian SET status_pembelian='SUDAH LUNAS' WHERE id_pembelian='$idpem'");

    echo "<script>alert('Pembayaran Berhasil Sukses');</script>";
    echo "<script>location='riwayat.php';</script>";

}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>


        
    </body>
    </html>