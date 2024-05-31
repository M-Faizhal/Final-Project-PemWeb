<?php
session_start();

if(isset($_GET["id"])) {
    $id_produk = $_GET["id"];

    // Cari indeks ID produk di array
    $key = array_search($id_produk, $_SESSION["favorit"]);
    if($key !== false) {
        // Hapus produk dari array favorit
        unset($_SESSION["favorit"][$key]);
        
        $_SESSION["favorit"] = array_values($_SESSION["favorit"]);
    }
}

header("Location: favorit.php");
exit();
?>
