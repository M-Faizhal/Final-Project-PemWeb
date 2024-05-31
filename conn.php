<?php
// koneksi database
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "db_hphub"; 

// Membuat koneksi
$db_koneksi = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($db_koneksi->connect_error) {
    die("Koneksi gagal: " . $db_koneksi->connect_error);
}

// Set encoding karakter ke UTF-8
$db_koneksi->set_charset("utf8");
?>
