<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_hphub";

$db_koneksi = mysqli_connect($servername, $username, $password, $database);

if ($db_koneksi->connect_error) {
    die("Koneksi gagal: " . $db_koneksi->connect_error);
}
// echo "Koneksi berhasil";
?>
