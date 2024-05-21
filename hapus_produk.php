<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
<?php
session_start();
$id_produk = $_GET["id"];
unset($_SESSION["keranjang"][$id_produk]);

echo "<script>alert('Produk Di Hapus');</script>";
echo "<script>location='keranjang.php';</script>";
?>
