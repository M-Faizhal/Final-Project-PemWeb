<?php
session_start();
$db_koneksi = new mysqli("localhost", "root", "", "db_hphub");

if (!isset($_SESSION["keranjang"]) || !is_array($_SESSION["keranjang"])) {
    $_SESSION["keranjang"] = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
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
            <a href="link-ke-favorites">
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
                    <a class="nav-link text-uppercase" href="">Categories</a>
                </li>
                <li class="nav-item px-2 py-2">
                    <a class="nav-link text-uppercase" href="">Product</a>
                </li>
                <li class="nav-item px-2 py-2">
                    <a class="nav-link text-uppercase" href="">Specials</a>
                </li>
                <li class="nav-item px-2 py-2">
                    <a class="nav-link text-uppercase" href="">About Us</a>
                </li>
                <li class="nav-item px-2 py-2 border-0">
                    <a class="nav-link text-uppercase" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="konten mt-5 pt-5">
    <div class="container mt-5">
        <h1 class="mb-4">Keranjang Belanja</h1>
        <hr>
        <?php if (empty($_SESSION["keranjang"])): ?>
            <p class="text-center">Keranjang belanja kosong.</p>
        <?php else: ?>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Gambar</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>SubHarga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
                        <?php
                        $ambil = $db_koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah["harga_produk"] * $jumlah;
                        ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah["nama_produk"]; ?></td>
                            <td><img src="admin/foto_produk/<?php echo $pecah["foto_produk"]; ?>" width="100"></td>
                            <td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td>Rp. <?php echo number_format($subharga); ?></td>
                            <td>
                                <a href="hapus_produk.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <div class="d-flex justify-content-between">
            <a href="index.php" class="btn btn-secondary">Belanja Lagi</a>
            <a href="checkout.php" class="btn btn-primary">Bayar</a>
        </div>
    </div>
</section>

<!-- Bootstrap JS -->
<script src="bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
