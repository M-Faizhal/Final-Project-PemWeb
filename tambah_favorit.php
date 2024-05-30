<?php
session_start();

if (!isset($_SESSION["favorit"]) || !is_array($_SESSION["favorit"])) {
    $_SESSION["favorit"] = [];
}

$id_produk = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

if ($id_produk > 0 && !in_array($id_produk, $_SESSION["favorit"])) {
    $_SESSION["favorit"][] = $id_produk;
}

header("Location: favorit.php");
exit();
?>
