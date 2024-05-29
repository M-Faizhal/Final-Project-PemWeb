<?php
    session_start();
    $db_koneksi = new mysqli("localhost", "root", "", "db_hphub");
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

    <div class="container mt-5 pt-5">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/galaxy.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/iphone.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/oppo.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <h2 class="mt-5 text-center">Welcome to Tech Zone</h2>
    </div>

    <div class="container mt-5 pt-5">
        <h4 style="margin-left: 10px;">Product</h4>
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
                            <a href="detail.php?id=<?php echo $perproduk["id_produk"]; ?>" class="btn btn-secondary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <div class="container mt-5 pt-5">
        <div class="product-gallery">
            <div class="product-item">
                <img src="img/samsung.png" alt="Samsung">
            </div>
            <div class="product-item">
                <img src="img/oppos.png" alt="Oppo">
            </div>
            <div class="product-item">
                <img src="img/ip.png" alt="iPhone">
            </div>
            <div class="product-item">
                <img src="img/xiaomi.png" alt="Xiaomi">
            </div>
            <div class="product-item">
                <img src="img/infinix.png" alt="Infinix">
            </div>
        </div>
    </div>

    <div class="container mt-5 pt-5">
        
    </div>

    <script src="js/jquery-3.7.1.js"></script>
    <script src="bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
