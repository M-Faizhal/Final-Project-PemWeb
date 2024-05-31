<?php
require_once 'db_koneksi.php';

if ($db_koneksi->connect_error) {
    die("Connection failed: " . $db_koneksi->connect_error);
}

if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];

    $query_foto = $db_koneksi->query("SELECT foto_produk FROM produk WHERE id_produk = '$id_produk'");
    if ($query_foto->num_rows > 0) {
        $data_foto = $query_foto->fetch_assoc();
        $nama_file_foto = $data_foto['foto_produk'];

        if (file_exists("foto_produk/" . $nama_file_foto)) {
            unlink("foto_produk/" . $nama_file_foto);
        }

        $db_koneksi->query("DELETE FROM produk WHERE id_produk = '$id_produk'");

        echo "<div class='alert alert-info'>Produk Terhapus</div>";
    } else {
        echo "<div class='alert alert-danger'>Produk tidak ditemukan</div>";
    }

    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
} else {
    echo "<div class='alert alert-danger'>ID produk tidak valid</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
?>
