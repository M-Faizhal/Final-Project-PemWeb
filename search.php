<?php
    require_once 'conn.php';

    if (isset($_GET['query'])) {
        $query = $_GET['query'];
        $searchQuery = $db_koneksi->prepare("SELECT * FROM produk WHERE nama_produk LIKE ?");
        $likeQuery = "%" . $query . "%";
        $searchQuery->bind_param("s", $likeQuery);
        $searchQuery->execute();
        $result = $searchQuery->get_result();
        
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        echo json_encode($products);
    }