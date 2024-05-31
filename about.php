<?php
    session_start();
    require_once 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body{
        background-color: white;
    }
    .row{
        display: flex;
        flex-wrap: wrap;
        padding: 2em 1em;
        text-align: center;
    }
    .column{
        width: 100%;
        padding: 0.5em 0;
    }

    h1{
        width: 100%;
        text-align:center;
        font-size: 3.5em;
        color: black;
    }
    .card{
        box-shadow: 0 0 0.2em rgba(25, 0, 58, 0.15);
        padding: 3.5em 1em;
        border-radius: 0.6em;
        color: black;
        cursor: pointer;
        transition: 0.3s;
        background-color: #ffffff;
    }

.card .img-container{
    width: 8em;
    height: 8em;
    background-color: #a993ff;
    padding: 0.5em;
    border-radius: 50%;
    margin: 0 auto 2em auto;
}

.card img{
    width: 100%;
    border-radius: 50%;
    object-fit: cover;
    height: 100%;
}
.card h3{
    font-weight: 500;
}
.card p{
    font-weight: 300;
    text-transform: uppercase;
    margin: 0.5em 0 2em 0;
    letter-spacing: 2px;
}
.icons{
    width: 50%;
    min-width: 180px;
    margin: auto;
    display: flex;
    justify-content: space-between;
}
.card a{
    text-decoration:none;
    color: inherit;
    font-size: 1.4em;
}
.card:hover{
    background: linear-gradient(#6045ea, #8567f7) ;
    color: #ffffff;
}
.card:hover .img-container{
    transform: scale(1.15);
}

@media screen and (min-width: 768px){
    section{
        padding: 1em 7em;
    }
}
@media screen and (min-width: 992px){
    section{
        padding: 1em;
    }
    .card{
        padding: 5em 1em;
    }
    .column{
        flex: 0 0 33.33%;
        max-width: 33.33%;
        padding: 0 1em;
    }
}

</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="index.php">
                <img src="img/logo.png" style="width: 75px; height: 75px" alt="">
                <span class="fw-lighter ms-2">Tech Zone</span>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-lg-1" id="navMenu">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item px-2 py-2"> 
                        <a class="nav-link text-uppercase" href="index.php">Home</a>
                    </li>
                    <li class="nav-item px-2 py-2"> 
                        <a class="nav-link text-uppercase" href="product.php">Product</a>
                    </li>
                    <li class="nav-item px-2 py-2"> 
                        <a class="nav-link text-uppercase" href="./about.php">About Us</a>
                    </li>
                    <?php if (isset($_SESSION["pelanggan"])): ?>
                    <li class="nav-item px-2 py-2 border-0">
                        <a class="nav-link text-uppercase" href="logout.php">Logout</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item px-2 py-2 border-0">
                        <a class="nav-link text-uppercase" href="login.php">Login</a>
                    </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <div class = "row" style="margin-top: 150px;">
            <h1>Our Team</h1>
        </div>
        <div class = row>
            <!-- Column 1-->
            <div class = "column">
                <div class = "card">
                    <div class = "img-container">
                        <img src= "./img/Pro1.jpg" alt=""/>
                    </div>
                    <h3>Muh Fadel Akbar</h3>
                    <p>22081010018</p>
                    <div class="icon">
                        <a href="https://github.com/xGfrost">
                        <i class="fa-brands fa-github"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/muhammad-fadel-akbar-99a87230a/">
                        <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a href="mailto:fadelakbar528@gmail.com">
                        <i class="fa-solid fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
             <!-- Column 2-->
             <div class = "column">
                <div class = "card">
                    <div class = "img-container">
                        <img src= "./img/Pro2.jpg" alt=""/>
                    </div>
                    <h3>Mayhikal Ferdiananta</h3>
                    <p>22081010023</p>
                    <div class="icon">
                        <a href="https://github.com/Mayhikall">
                        <i class="fa-brands fa-github"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/mayhikal-ferdiananta-1aa746270">
                        <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a href="mailto:mayhikalf99@gmail.com">
                        <i class="fa-solid fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
             <!-- Column 3-->
             <div class = "column">
                <div class = "card">
                    <div class = "img-container">
                        <img src= "./img/Pro3.jpg" alt=""/>
                    </div>
                    <h3>Muh Rohman Irysadi</h3>
                    <p>22081010024</p>
                    <div class="icon">
                        <a href="https://github.com/muhrohman">
                        <i class="fa-brands fa-github"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/muhammad-rohman-irsyadi-32b04b251/">
                        <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a href="mailto:22081010024@student.upnjatim.ac.id">
                        <i class="fa-solid fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
             <!-- Column 4-->
             <div class = "column">
                <div class = "card">
                    <div class = "img-container">
                        <img src= "./img/Pro4.jpg" alt=""/>
                    </div>
                    <h3>Muh Faizhal Musthafa</h3>
                    <p>22081010032</p>
                    <div class="icon">
                        <a href="https://github.com/M-Faizhal">
                        <i class="fa-brands fa-github"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/muhamad-faizhal-musthafa-1670ba25a/">
                        <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a href="mailto:musthafafaizhal@gmail.com">
                        <i class="fa-solid fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
             <!-- Column 5-->
             <div class = "column">
                <div class = "card">
                    <div class = "img-container">
                        <img src= "./img/Pro5.jpg" alt=""/>
                    </div>
                    <h3>M. Zaky Pria Maulana</h3>
                    <p>22081010006</p>
                    <div class="icon">
                        <a href="https://github.com/zkyymaulana">
                        <i class="fa-brands fa-github"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/m-zaky-pria-maulana/">
                        <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a href="mailto:zakymaulana363@gmail.com">
                        <i class="fa-solid fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>