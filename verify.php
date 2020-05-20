<?php
include 'connect.php';

if(isset($_POST['submitverify'])){
    if(isset($_POST['verifycode'])){        
        $verifycode = $_POST['verifycode'];
        $id = $_SESSION['userId'];
        $sql = "SELECT verifyCode FROM pengguna WHERE userId = '$id'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        if($verifycode == $row['verifyCode']){
            $sql = "UPDATE pengguna SET isVerify = '1' WHERE userId = '$id'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $_SESSION['status'] = "login";
            // echo $_SESSION['userId'];
            return header("Location: index.php");
        }
        else{
            // echo $verifycode;
            // echo $row['verifyCode'];
            return header("Location: verify.php?id=$id&status=cnotsame");
        }                
    }
}

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
    <link rel="stylesheet" href="css/login.css">
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
                    <a href="help.html" class="nav-link t4--argo text-center text-white">Bantuan</a>
                </li>
                <li class="nav-item mr-3">
                    <a href="kategori.php" class="nav-link t4--argo text-center text-white">Kategori</a>                                
                </li>
                <li class="nav-item mr-3 text-center">
                    <a href="register.php" class="t4--argo nav-link text-white">Daftar</a>
                </li>
                <li class="nav-item mr-3 text-center">
                    <a href="login.html" class="t4--argo nav-link text-white">Login</a>
                </li>
            </ul>
        </div>        
    </nav>

    <div class="c-section1">
        <div class="container">
            <div class="row d-flex justify-content-center">                
                <div class="col-lg-6 text-center t--montserrat h6">
                    Kami telah mengirimkan kode verifikasi ke alamat email anda silahkan masukan kode tersebut disini                
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-5">            
                <div class="col-lg-5">                
                    <form action="" method="post">
                        <div class="form-masukan">
                            <input class="masukan" type="text" name="verifycode" placeholder="Verify Code" style="padding-left: 35px" autocomplete="off" required>                             
                        </div>                                    
                        <button type="submit" name="submitverify" class="btn-selengkap" onclick="window.location.href = ''">Submit</button>                                                
                    </form>
                </div>
            </div>
        </div>
    </div>    
    
</body>
</html>