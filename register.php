<html>
    <head>
        <meta charset="utf-8">
        <title>Registrasi | GamerStore</title>
		<link rel="shorcut icon" href="Image/favicon.ico">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">		
        <link rel="stylesheet" href="CSS/login.css">		
        <link rel="shorcut icon" href="image/index/logoicon.png">
        <!-- <script src="js/particles.min.js"></script> -->
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
                <li class="nav-item mr-3 text-center">
                    <a href="register.php" class="t4--argo nav-link text-white">Daftar</a>
                </li>
                <li class="nav-item mr-3 text-center">
                    <a href="login.php" class="t4--argo nav-link text-white">Login</a>
                </li>
            </ul>
        </div>        
    </nav>
    

  <section class="section">
    <div id="particles"></div>
    <div class="container">            
        <div class="row">                        
            <div class="col-lg-6 col-md-6 col-sm-12 isi-box animated fadeInRight" id="isi-login">
                <span class="form-judul">Registrasi</span>

                <?php
                if(isset($_GET['status']) && $_GET['status'] == 'salah'){                
                    echo "<span class='txt-error'>Password Tidak Sama, Silahkan Masukkan Kembali</span>";                
                }
                elseif(isset($_GET['status']) && $_GET['status'] == 'kosong'){
                    echo "<span class='txt-error'>Terdapat Field Kosong, Silahkan Isi Kembali</span>";
                }
                elseif(isset($_GET['status']) && $_GET['status'] == 'usama'){
                    echo "<span class='txt-error'>Username Sudah Terdaftar, Silahkan Isi Kembali</span>";
                }
                elseif(isset($_GET['status']) && $_GET['status'] == 'esama'){
                    echo "<span class='txt-error'>Email Sudah Terdaftar, Silahkan Isi Kembali</span>";
                }
                ?>                
                <form action="controller-register.php" method="post">
                    <div class="form-masukan">
                        <input class="masukan" type="text" name="username" placeholder="Username" autocomplete="off">
                        <span class="symbol-masukan">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="form-masukan">
                        <input class="masukan" type="text" name="email" placeholder="Email" autocomplete="off">
                        <span class="symbol-masukan">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="form-masukan">
                        <input class="masukan" type="text" name="address" placeholder="Address" autocomplete="off">
                        <span class="symbol-masukan">
                            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="form-masukan">
                        <input class="masukan" type="text" name="city" placeholder="City" autocomplete="off">
                        <span class="symbol-masukan">
                            <i class="fas fa-building" aria-hidden="true"></i>
                        </span>
                    </div>                
                    <div class="form-masukan">
                        <input class="masukan" type="password" name="password" placeholder="Password"> 
                        <span class="symbol-masukan">
                            <i class="fa fa-lock" aria-hidden="lock"></i>
                        </span>
                    </div>          
                    <div class="form-masukan">
                        <input class="masukan" type="password" name="konfirmpass" placeholder="Konfirmasi Password"> 
                        <span class="symbol-masukan">
                            <i class="fa fa-key" aria-hidden="lock"></i>
                        </span>
                    </div>                                    
                    <button type="submit" name="submitregister" class="btn-selengkap" onclick="window.location.href = ''">Submit</button>
                </form>

                    <div class="text_daftar">
                            <span class="txt1">
                                Sudah punya akun?
                            </span>
                            <a class="txt2" href="login.html">
                                Login
                            </a>
                    </div>                
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 isi-box animated fadeInLeft d-flex align-items-center justify-content-center" id="logo-login">
                    <img src="image/index/logo2fix.png" id="logomage">
                </div>                        
            </div>          
      </div>
      </div>
  </section>
    <!-- <script type="text/javascript" src="js/particle-config.js"></script> -->
</body>
    
</html>