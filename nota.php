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

        <h2>Detail Pembelian</h2>
        <?php
        $ambil = $db_koneksi->query("SELECT * FROM pembelian JOIN pelanggan
                ON pembelian.id_pelanggan=pelanggan.id_pelanggan
                WHERE pembelian.id_pembelian='$_GET[id]'");
        $detail = $ambil->fetch_assoc();
        ?>


        <div class="row">
            <div class="col-md-4">
                <h3>Pembelian</h3>
                <strong><?php echo $detail['id_pembelian'] ?></strong><br>
                <?php echo $detail['tanggal_pembelian']; ?><br>
                Rp. <?php echo number_format($detail['total_pembelian']) ?>
            </div>
            <div class="col-md-4">
                <h3>Pelanggan</h3>
                <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
                <p>
                    <?php echo $detail['telepon_pelanggan']; ?> <br>
                    <?php echo $detail['email_pelanggan']; ?>
                </p>
            </div>
            <div class="col-md-4"></div>
                <h3>Pengiriman</h3>
                <strong><?php echo $detail['nama_kota'] ?></strong><br>
                <?php echo $detail['alamat_pengiriman']; ?><br>
                Rp. <?php echo number_format($detail['tarif']); ?><br>
                
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
                <?php $nomor=1 ?>
                <?php $ambil=$db_koneksi-> query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
                <?php while($pecah=$ambil->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah ['nama']; ?></td>
                    <td>Rp. <?php echo number_format($pecah ['harga']); ?></td>
                    <td><?php echo $pecah ['kelas']; ?></td>
                    <td><?php echo $pecah ['jumlah_produk']; ?></td>
                    <td>Rp. <?php echo number_format($pecah ['subharga']); ?></td>
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
                    </p>
                </div>
            </div>
        </div>

        </div>
    </section>
    
</body>
</html>