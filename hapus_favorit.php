<?php
session_start();

if(isset($_GET["id"])) {
    $id_produk = $_GET["id"];

    if(array_key_exists($id_produk, $_SESSION["favorit"])) {
        unset($_SESSION["favorit"][$id_produk]);
    }
}

header("Location: favorit.php");
exit();
?>
