<?php
session_start();

if(isset($_GET['id'])) {
    $id_produk = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    
    if(!isset($_SESSION['keranjang'])) {
        $_SESSION['keranjang'] = [];
    }
    
    if(isset($_SESSION['keranjang'][$id_produk])) {
        $_SESSION['keranjang'][$id_produk] = (int)$_SESSION['keranjang'][$id_produk] + 1;
    } else {
        $_SESSION['keranjang'][$id_produk] = 1;
    }
    
    echo "<script>location='keranjang.php';</script>";
} else {
    echo "<script>location='produk.php';</script>";
}
?>
