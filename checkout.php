<?php
session_start();
$db_koneksi = new mysqli("localhost","root","","db_hphub");


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
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container">
        <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="keranjang.php">Keranjang</a></li>
            <?php if (isset($_SESSION["pelanggan"])): ?>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
            <?php endif ?>
            <li><a href="checkout.php">Checkout</a></li>
        </ul>
    </div>
</nav>

<section class="konten">
    <div class="container">
        <h1>Keranjang Belanja</h1>
        <hr>
        <?php if (empty($_SESSION["keranjang"])): ?>
            <p>Keranjang belanja kosong.</p>
        <?php else: ?>
            <table class="table table-bordered">
                <thead>
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
            <div class="row">
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
            <div class="form-group">
                <label>Alamat Pengiriman</label>
                <textarea class="form-control" name="alamat_pengiriman" id=""></textarea>
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

</body>
</html>
