<?php
include 'connect.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM pengguna WHERE username = '$username'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    $hashed = $row['userPassword'];
    if(password_verify($password, $hashed)){    
        $_SESSION['userId'] = $row['userId'];
        $_SESSION['userName'] = $row['userName'];
        $_SESSION['userEmail'] = $row['userEmail'];
        $_SESSION['userAddress'] = $row['userAddress'];
        $_SESSION['userCity'] = $row['userCity'];
        $_SESSION['isAdmin'] = $row['isAdmin'];
        if($row['isVerify'] == "1"){        
            $_SESSION['isVerify'] = $row['isVerify'];        
            $_SESSION['status'] = "login";            
            if($_SESSION['isAdmin'] == "1"){
                $_SESSION['role'] = "admin";
                return header("location: admin-dashboard.php?ucontrols=users");                
            }
            else{
                $_SESSION['role'] = "user";
                return header("location: index.php");
            }                        
        }
        else{
            // echo $_SESSION['userId'];
            return header("location: verify.php");
        }    

    }
    else{
        return header("location: login.php?status=salah");
    }
}

?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Login | GamerStore</title>
		<link rel="shorcut icon" href="image/index/logoicon.png">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
		<!-- <link rel="stylesheet" href="CSS/animate.css"> -->        
        <!-- <link rel="stylesheet" href="CSS/login.css"> -->
        <link rel="stylesheet" href="CSS/login.css">
        <!-- <link rel="stylesheet" href="css/index.css"> -->
        <!-- <script src="js/particles.min.js"></script>         -->
    </head>
    
<body style="overflow-y: hidden;">
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
            <div class="row justify-content-center">                        
                <div class="col-lg-6 col-md-6 col-sm-12 isi-box animated fadeInRight" id="isi-login">
                    <span class="form-judul">Login</span>
                    <?php
                    if((isset($_GET['status'])) && $_GET['status'] == "salah")
                    {
                    ?>
                    <span class="txt-error">Username / Password salah</span>
                    <?php
                    }
                    ?>

                    <form action="" method="post">
                        <div class="form-masukan">
                            <input class="masukan" type="text" name="username" placeholder="Username" autocomplete="off" required>
                            <span class="symbol-masukan">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="form-masukan">
                            <input class="masukan" id="showPassword" type="password" name="password" placeholder="Password" style="padding-right:68px;" required> 
                            <span class="symbol-masukan">
                                <i class="fa fa-lock" aria-hidden="lock"></i>
                            </span>
                        </div>
                        <div class="show-password" style="text-align: left; padding-left: 35px; font-size: 0.75em; display: flex; align-items: center;">
                            <input type="checkbox" onclick="showPassword()"><span style="margin-left: 20px;">Tampilkan Password</span>
                        </div>
                        <br>

                        <button class="btn-selengkap" name="login" onclick="location.href=''">Login</button>
                    </form>
                            
                    <div class="text_daftar">
                            <span class="txt1">
                                Belum punya akun?
                            </span>
                            <a class="txt2" href="register.php">
                                Daftar
                            </a>
                    </div>                
                </div>
                <div class="col-lg-6 col-md-6 sm-12 isi-box animated fadeInLeft" id="logo-login">
                    <img src="image/index/logo2fix.png" id="logomage">
                </div>                      
          </div>
          </div>

      </section>
      <!-- <script  src="js/particle-config.js"></script>   -->
</body>
    
</html>