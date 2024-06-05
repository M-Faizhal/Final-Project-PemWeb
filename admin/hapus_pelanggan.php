<?php
require_once 'db_koneksi.php';

// Ngecek ID
if (isset($_GET['id'])) {
    $id_pelanggan = $_GET['id'];

    // Hapus data pelanggan dengan ID
    $hapus = $db_koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");


    if ($hapus) {
        echo "<script>alert('Data pelanggan telah dihapus');</script>";
        echo "<script>location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data pelanggan');</script>";
        echo "<script>location='index.php';</script>";
    }
} else {
    echo "<script>alert('ID pelanggan tidak ditemukan');</script>";
    echo "<script>location='index.php';</script>";
}
?>
