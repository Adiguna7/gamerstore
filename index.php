<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="shorcut icon" href="image/index/logoicon.png">
    <title>Selamat Datang | GamerStore</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm px-5 c-nav">
        <p class="navbar-brand t3--freshscript pointer" onclick="window.location.href = 'index.html'">GamerStore</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i style="color: white;" class="fas fa-bars"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">                
                <li class="nav-item mr-3">
                    <a href="kategori2.php" class="nav-link t4--argo text-center text-white">Kategori</a>                                
                </li>
                <?php
                if(!isset($_SESSION['status'])){
                ?>
                <li class="nav-item mr-3 text-center">
                    <a href="register.php" class="t4--argo nav-link text-white">Daftar</a>
                </li>
                <li class="nav-item mr-3 text-center">
                    <a href="login.php" class="t4--argo nav-link text-white">Login</a>
                </li>
                <?php
                }
                else{
                ?>
                <li class="nav-item mr-3 text-center">
                    <a href="user-dashboard.php?tprocess=keranjang" class="t4--argo nav-link text-white">Dashboard User</a>
                </li>
                <li class="nav-item mr-3 text-center">
                    <a href="logout.php" class="t4--argo nav-link text-white">Logout</a>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>        
    </nav>

    <div class="c-section1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="image/index/asset1.png" class="img-fluid" alt="" srcset="">            
                </div>
                <div class="col-lg-6 d-flex justify-content-center align-items-center flex-column">
                    <p class="t--argo h2">Gamers</p>
                    <p class="t--freshscript h3">dont die</p>
                    <p class="t--argo h2">They Respawn</p>
                </div>
            </div>
        </div>    
    </div>

    <div class="c-section2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center flex-column">
                    <div class="t--line t--argo h3">
                        Why Choose Us
                    </div>
                    <div class="t--argo mt-4 h2">
                        Simply From Gamer
                    </div>
                    <div class="t--freshscript h3">
                        to
                    </div>
                    <div class="t--argo h2">
                        Gamer
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-center">
                    <img src="image/index/asset2.png" class="img-fluid o__image--medium o__image--shadow" alt="" srcset="">
                </div>
            </div>
        </div>
    </div>

    <div class="c-section3">
        <div class="container">
            <div class="row">
                <div class="col-4 d-flex align-items-center flex-column">
                    <img src="image/index/asset3.png" class="o__image--icon img-fluid" alt="" srcset="">
                </div>
                <div class="col-4 d-flex align-items-center flex-column">
                    <img src="image/index/asset4.png" class="o__image--icon img-fluid" alt="" srcset="">
                </div>
                <div class="col-4 d-flex align-items-center flex-column">
                    <img src="image/index/asset5.png" class="o__image--icon img-fluid" alt="" srcset="">
                </div>                                
            </div>
            <div class="row">
                <div class="col-4 d-flex align-items-center flex-column">
                    <p class="t--line mt-4 t--argo h5">
                        Find
                    </p>
                </div>
                <div class="col-4 d-flex align-items-center flex-column">
                    <p class="t--line mt-4 t--argo h5">
                        Buy
                    </p>
                </div>
                <div class="col-4 d-flex align-items-center flex-column">
                    <p class="t--line mt-4 t--argo h5">
                        Play Together
                    </p>
                </div>                
            </div>
        </div>
    </div>

    <div class="c-section4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <p class="t--line t--argo h4">
                        Choose Category
                    </p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-4 d-flex justify-content-center">
                    <div class="o__card">
                        <img src="image/index/asset6.png" class="o__image--category img-fluid" alt="" srcset="">                        
                        <p class="o__button t--montserrat" onclick="window.location.href='kategori2.php?category=keyboard&search=Search'">
                            Keyboard
                        </p>
                    </div>                
                </div>
                <div class="col-lg-4 d-flex justify-content-center">
                    <div class="o__card">                        
                        <img src="image/index/asset7.png" class="o__image--category img-fluid" alt="" srcset="">                                                
                        <p class="o__button t--montserrat" onclick="window.location.href='kategori2.php?category=mouse&search=Search'">
                            Mouse
                        </p>   
                    </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-center">
                    <div class="o__card">                        
                        <img src="image/index/asset8.png" class="o__image--category img-fluid" alt="" srcset="">                                                                        
                        <p class="o__button t--montserrat" onclick="window.location.href='kategori2.php?category=headset&search=Search'">
                            Headset
                        </p>                                                
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="c-section5 c__footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="t--freshscript h2">GamerStore</div>
                    <div class="t--montserrat mt-5 t--small">Jalan Simo Pomahan 3 no. 1</div>
                    <div class="t--montserrat mt-3 t--small">0859 6117 5115</div>
                    <div class="t--montserrat mt-3 t--small">pahlevystore@gmail.com</div>
                    <div class="t--montserrat mt-3 t--small">Buka setiap hari kecuali pas tutup</div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>