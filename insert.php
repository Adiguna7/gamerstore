<?php
    $mysqli = new mysqli('localhost', 'root', '123', 'basisdata2020v2');

    if(!$mysqli){
        echo "error";
    }

    if(isset($_GET['kirim'])){
        $nama = $_GET['nama'];
        $email = $_GET['email']; 
        $alamat = $_GET['alamat'];
        $kota = $_GET['kota'];                        

        $sql = "INSERT INTO customer VALUES (NULL, '$nama', '$email','$alamat', '$kota', '', '')";
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
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shorcut icon" href="image/headset.svg">
    <title>Selamat Datang | PahlevyStore</title>
</head>
<body>
    <section id="section-1">
        <div class="container">
            <div class="row" id="wrapper-row-1">
                <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="wrapper-col-1">
                    <p>PahlevyStore</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="wrapper-col-1">
                    <p>Login</p>                    
                    <p>Product</p>                    
                    <p>Home</p>
                </div>
            </div>
        </div>
    </section>

    <section id="section-2" style="height: 100px;">
        <div class="container">
            <div class="row" id="wrapper-row-1">
                <div class="col-lg-12">
                    <form action="" method="get">
                        <label for="nama">Nama</label>                        
                        <input type="text" name="nama" id="">
                        <label for="email">Email</label>                        
                        <input type="text" name="email" id="">
                        <label for="alamat">Alamat</label>                        
                        <input type="text" name="alamat" id="">
                        <label for="kota">Kota</label>                        
                        <input type="text" name="kota" id="">
                        <input type="submit" name="kirim" value="kirim" id="kirim">
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="section-3">
        <div class="container-fluid">
            <div class="row" id="wrapper-row-1">
                <div class="col-lg-4" id="wrapper-col-1">
                    <p>PahlevyStore</p>
                    <p>Jalan Simo Pomahan 3 no. 1</p>
                    <p>0859 6117 5115</p>
                    <p>pahlevystore@gmail.com</p>
                    <p>Buka setiap hari kecuali pas tutup</p>
                </div>
            </div>
        </div>
    </section>

</body>
</html>