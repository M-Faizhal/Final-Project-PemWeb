    <?php
        session_start();
        require_once 'conn.php';
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Selamat Datang Di TechZone | TechZone The Number One Smartphone Shop</title>

        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
        <!-- css -->
        <link rel="stylesheet" href="css/style.css">
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

    <section class="konten mt-5 pt-5">
        <div class="container mt-5">
            <h1 class="mb-4">Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"]; ?></h1>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor=1;
                    $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                    $db_koneksi->query("SELECT * FROM pembelian");

                    $ambil = $db_koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan = $id_pelanggan");
                    while($pecah = $ambil->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah["tanggal_pembelian"]; ?></td>
                        <td><?php echo $pecah["status_pembelian"]; ?></td>
                        <br>
                        <?php if (!empty($pecah['resi_pengiriman'])): ?>
                            Resi : <?php echo $pecah['resi_pengiriman']; ?>
                        <?php endif ?>
                        <td>Rp. <?php echo number_format($pecah["total_pembelian"]) ?></td>
                        <td>
                            <a href="nota.php?id=<?php echo $pecah["id_pembelian"]?>" class="btn btn-info">Nota</a>
                            <?php if ($pecah["status_pembelian"] == "MENUNGGU PEMBAYARAN"): ?>
                            <a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"]?>" class="btn btn-success">Lanjut Pembayaran</a>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </section>
    
</body>
</html>