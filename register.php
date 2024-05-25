<?php
session_start();
$db_koneksi = new mysqli("localhost", "root", "", "db_hphub");

if ($db_koneksi->connect_error) {
    die("Connection failed: " . $db_koneksi->connect_error);
}


if (isset($_POST['register'])) {
    // Ambil data yang diinputkan dan bersihkan
    $nama = trim($_POST['nama_pelanggan']);
    $email = trim($_POST['email_pelanggan']);
    $telepon = trim($_POST['telepon_pelanggan']);
    $password = trim($_POST['password_pelanggan']);
    
    // Periksa apakah semua kolom diisi
    if (empty($nama) || empty($email) || empty($telepon) || empty($password)) {
      echo "<script>
              alert('Semua kolom harus diisi!');
              document.location.href='registration.php';
          </script>";
      exit; // Hentikan eksekusi skrip
    }

    // Menyiapkan query
    $sql = "INSERT INTO pelanggan (nama_pelanggan, email_pelanggan, telepon_pelanggan, password_pelanggan) VALUES (?, ?, ?, ?)";
    $stmt = $db_koneksi->prepare($sql);

    if ($stmt) {
        // bind parameter ke query
        $stmt->bind_param("ssss", $nama, $email, $telepon, $password);
        
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
    <title>Register | Pelanggan HPhub</title>
    <!-- Bootstrap CSS -->
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- Font Awesome CSS -->
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="admin/assets/css/custom.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="keranjang.php">Keranjang</a></li>

                <?php if (isset($_SESSION["pelanggan"])): ?>
                    <li><a href="logout.php">Logout</a></li>


                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif ?>

                
                <li><a href="checkout.php">Checkout</a></li>
            </ul>
        </div>
    </nav>


<div class="container">
    <div class="row text-center">
        <div class="col-md-12" >
            <br /><br />
            <h2 style="margin-top: -1em">Daftar Pelanggan</h2>
            <h5>Silahkan Daftar</h5>
            <br />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Login</strong>
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama_pelanggan">Nama Lengkap<font color=red>*</font></label>
                            <input class="form-control" type="text" name="nama_pelanggan" placeholder="Nama" />
                        </div>

                        <div class="form-group">
                            <label for="email_pelanggan">Email<font color=red>*</font></label>
                            <input class="form-control" type="email" name="email_pelanggan" placeholder="Email" />
                        </div>

                        <div class="form-group">
                            <label for="telepon_pelanggan">Telepon<font color=red>*</font></label>
                            <input class="form-control" type="text" name="telepon_pelanggan" placeholder="Telepon" />
                        </div>

                        <div class="form-group">
                            <label for="password_pelanggan">Password<font color=red>*</font></label>
                            <input class="form-control" type="password" name="password_pelanggan" placeholder="Password" />
                        </div>
                        <button class="btn btn-primary" name="register">Daftar</button>
                        <hr/>
                        Sudah punya akun? <a href="login.php">Login di sini</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
