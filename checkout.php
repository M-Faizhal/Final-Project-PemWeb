<?php
session_start();
require_once 'conn.php';

if (!isset($_SESSION["pelanggan"])) {
    echo "<script>alert('Anda Belum Login');</script>";
    echo "<script>location='index.php'</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
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
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>SubHarga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $nomor = 1; 
                    $totalbelanja = 0; 
                    foreach ($_SESSION["keranjang"] as $id_produk => $jumlah):
                        $ambil = $db_koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah["harga_produk"] * $jumlah;
                    ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah["nama_produk"]; ?></td>
                        <td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
                        <td><?php echo $jumlah; ?></td>
                        <td>Rp. <?php echo number_format($subharga); ?></td>
                    </tr>
                    <?php 
                        $nomor++; 
                        $totalbelanja += $subharga; 
                    endforeach; 
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th>Rp. <?php echo number_format($totalbelanja); ?></th>
                    </tr>
                </tfoot>
            </table>
        <?php endif; ?>

        <form method="post">
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan']; ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-control" name="id_ongkir" required>
                            <option value="">--Pilih Kota Pengiriman--</option>
                            <?php
                            $ambil = $db_koneksi->query("SELECT * FROM ongkir");
                            while ($perongkir = $ambil->fetch_assoc()): 
                            ?>
                                <option value="<?php echo $perongkir['id_ongkir']; ?>">
                                    <?php echo $perongkir['nama_kota']; ?> - Rp. <?php echo number_format($perongkir['tarif']); ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label>Alamat Pengiriman</label>
                <textarea class="form-control" name="alamat_pengiriman" rows="3" required></textarea>
            </div>
            <button class="btn btn-primary" name="checkout">Checkout</button>
        </form>

        <?php 
        if (isset($_POST["checkout"])) {
            $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
            $id_ongkir = $_POST["id_ongkir"];
            $tanggal_pembelian = date("Y-m-d");
            $alamat_pengiriman = $_POST['alamat_pengiriman'];

            $ambil = $db_koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
            $hargaongkir = $ambil->fetch_assoc();
            $nama_kota = $hargaongkir['nama_kota'];
            $tarif = $hargaongkir['tarif'];
            
            $total_pembelian = $totalbelanja + $tarif;

            $db_koneksi->query("INSERT INTO pembelian (id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian, nama_kota, tarif, alamat_pengiriman) 
            VALUES ('$id_pelanggan', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian','$nama_kota', '$tarif', '$alamat_pengiriman')");

            $id_pembelian_baru = $db_koneksi->insert_id;

            foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
            {
                $ambil = $db_koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                $perproduk = $ambil->fetch_assoc();

                $nama = $perproduk['nama_produk'];
                $harga = $perproduk['harga_produk'];
                $kelas = $perproduk['kelas_produk'];

                $subharga = $perproduk['harga_produk'] * $jumlah;
                $db_koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_produk, nama, harga, kelas, subharga, jumlah_produk) 
                VALUES ('$id_pembelian_baru', '$id_produk', '$nama', '$harga','$kelas', '$subharga', '$jumlah')");
            }

            unset($_SESSION["keranjang"]);

            echo "<script>alert('Pembelian Berhasil');</script>";
            echo "<script>location='nota.php?id=$id_pembelian_baru';</script>";
        }
        ?>
    </div>
</section>

<!-- Bootstrap JS -->
<script src="bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
