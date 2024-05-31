<?php
session_start();
require_once 'db_koneksi.php';

if (isset($_POST['register'])) {
    // Ambil data yang diinputkan dan bersihkan
    $nama = trim($_POST['nama']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Periksa apakah kolom nama dan username diisi
    if (empty($nama) || empty($username)) {
        echo "<script>
                alert('jangan kosong harus diisi!');
                document.location.href='registration.php';
            </script>";
        exit; // Hentikan eksekusi skrip
    }

    // Menyiapkan query
    $sql = "INSERT INTO admin (nama, username, password) VALUES (?, ?, ?)";
    $stmt = $db_koneksi->prepare($sql);

    if ($stmt) {
        // bind parameter ke query
        $stmt->bind_param("sss", $nama, $username, $password);
        
        // Eksekusi query untuk menyimpan ke database
        $saved = $stmt->execute();

        if ($saved) {
            echo "<script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href='login.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data gagal ditambahkan!');
                    document.location.href='login.php';
                </script>";
        }

        $stmt->close();
    } else {
        echo "Error: " . $db_koneksi->error;
    }
}



$db_koneksi->close();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Admin HPhub</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="index.php">Home</a>

        <h4>REGISTRATION</h4>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>

        <form action="" method="POST">

            <div class="form-group">
                <label for="name">Nama Lengkap<font color=red>*</font></label>
                <input class="form-control" type="text" name="nama" placeholder="Nama" />
            </div>

            <div class="form-group">
                <label for="username">Username<font color=red>*</font></label>
                <input class="form-control" type="text" name="username" placeholder="Username" />
            </div>

            <div class="form-group">
                <label for="password">Password<font color=red>*</font></label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>

            <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />

        </form>
            
        </div>

    </div>
</div>

</body>