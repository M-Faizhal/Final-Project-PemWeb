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


        <h2 class="mt-5 text-center">Welcome to Tech Zone</h2>
    </div>

    <div class="container mt-5 pt-5">
        <!-- <h4 style="margin-left: 10px;">Product</h4> -->
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
            $ambil = $db_koneksi->query("SELECT * FROM produk");
            while ($perproduk = $ambil->fetch_assoc()) {
            ?>
            <div class="col">
                <div class="card card-custom mx-auto">
                    <img src="admin/foto_produk/<?php echo $perproduk['foto_produk']?>" class="card-img-top" alt="<?php echo $perproduk['nama_produk']?>">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $perproduk['nama_produk']?></h5>
                        <p class="card-text text-center">Rp. <?php echo number_format($perproduk['harga_produk'])?></p>
                        <div class="text-center">
                            <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
                            <a href="tambah_favorit.php?id=<?php echo $perproduk["id_produk"]; ?>" class="btn btn-warning">Favorit</a>
                            <a href="detail.php?id=<?php echo $perproduk["id_produk"]; ?>" class="btn btn-secondary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <div class="container mt-5 pt-5">
        
    </div>

    <script src="js/jquery-3.7.1.js"></script>
    <script src="bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/search.js"></script>
</body>
</html>
