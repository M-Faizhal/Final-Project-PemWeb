<?php
session_start();
require_once 'db_koneksi.php';

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Admin Techzone</title>
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
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <br /><br />
                <h2>Login Admin</h2>
                <h5>Silahkan Masuk</h5>
                <br />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Login</strong>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST">
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tag"></i>
                                </span>
                                <input type="text" class="form-control" name="user" placeholder="Username" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" name="pass" placeholder="Password" />
                            </div>
                            
                            <button class="btn btn-primary" name="login">Login</button>
                            <hr />
                            Daftar Admin <a href="registration.php">Klik Disini</a>
                        </form>
                        <?php 
                        if (isset($_POST['login'])) {
                            $username = $db_koneksi->real_escape_string($_POST['user']);
                            $password = $db_koneksi->real_escape_string($_POST['pass']);
                            $ambil = $db_koneksi->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
                            
                            if ($ambil->num_rows == 1) {
                                $_SESSION['admin'] = $ambil->fetch_assoc();
                                echo "<div class='alert alert-info'>Login Berhasil</div>";
                                echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                            } else {
                                echo "<div class='alert alert-danger'>Login Gagal</div>";
                                echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
