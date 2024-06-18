<?php
session_start();
require_once 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <style>
    @media print {
        body * {
            visibility: hidden;
        }
        .print-section, .print-section * {
            visibility: visible;
        }
        .print-section {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
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

<section class="konten print-section" style="margin-top: 100px;">
    <div class="container">
        <h2>Detail Pembelian</h2>
        <?php
        $ambil = $db_koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
        $detail = $ambil->fetch_assoc();
        ?>
        <div class="row mb-3">
            <div class="col-md-4">
                <h3>Pembelian</h3>
                <strong><?php echo $detail['id_pembelian'] ?></strong><br>
                <?php echo $detail['tanggal_pembelian']; ?><br>
                Rp. <?php echo number_format($detail['total_pembelian']) ?>
            </div>
            <div class="col-md-4">
                <h3>Pelanggan</h3>
                <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
                <p>
                    <?php echo $detail['telepon_pelanggan']; ?><br>
                    <?php echo $detail['email_pelanggan']; ?>
                </p>
            </div>
            <div class="col-md-4">
                <h3>Pengiriman</h3>
                <strong><?php echo $detail['nama_kota'] ?></strong><br>
                <?php echo $detail['alamat_pengiriman']; ?><br>
                Rp. <?php echo number_format($detail['tarif']); ?><br>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Kelas</th>
                    <th>Jumlah</th>
                    <th>SubTotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1; ?>
                <?php $ambil = $db_koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
                <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah['nama']; ?></td>
                    <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                    <td><?php echo $pecah['kelas']; ?></td>
                    <td><?php echo $pecah['jumlah_produk']; ?></td>
                    <td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-7">
                <div class="alert alert-info">
                    <p>
                        Total Pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> Opsi Bayar <br>
                        <strong>Bank BCA</strong>
                        <strong>5827361234</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
    
<section class="konten" style="margin-top: 100px;">
    <div class="container">
        <!-- Tombol Cetak Nota -->
        <button onclick="window.print();" class="btn btn-primary">Cetak Nota</button>
        <!-- Tombol Kembali ke Halaman Utama -->
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </div>
</section>

    <script>
        function cetakNota() {
            window.print();
        }
    </script>
</body>
</html>