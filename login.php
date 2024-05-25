<?php
session_start();
$db_koneksi = new mysqli("localhost","root","","db_hphub");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | HPhub</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <!-- BOOTSTRAP STYLES-->
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="admin/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="admin/assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
            <div class="cool-md-12">
                <br /><br />
                <h2>Login Pelanggan</h2>
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
                            <br/>
                            <div class="form-group input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control" name="email" placeholder="email">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" name="password" placeholder="password">
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" /> Ingat Aku
                                </label>
                                <span class="pull-right">
                                    <a href="#">Lupa Password</a>
                                </span>
                            </div>
                            <button class="btn btn-primary" name=login>Login</button>
                            <hr/>
                            Daftar Pelanggan <a href="register.php">Klik Disini</a>
                        </form>                       
                        <?php
                        if(isset($_POST['login']))
                        {
                            $email = $_POST["email"];
                            $password = $_POST["password"];
                            $ambil = $db_koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

                            $akunyangcocok = $ambil->num_rows;

                            if ($akunyangcocok== 1)
                            {
                                $akun = $ambil->fetch_assoc();

                                $_SESSION["pelanggan"] = $akun;
                                echo "<div class='alert alert-info'>Login Berhasil</div>";
                                echo "<script>location='checkout.php';</script>";
                            }
                            else
                            {
                                echo "<div class='alert alert-danger'>Login Gagal</div>";
                                echo "<script>location='login.php';</script>";
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