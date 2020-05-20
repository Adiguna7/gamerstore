<?php
$mysqli = new mysqli('localhost', 'root', '123', 'basisdata2020v2');

if(!$mysqli){
    echo "error";
}
$category = NULL;
$sql = 0;
if(isset($_GET['search'])){
    $category = $_GET['category'];
    if($category == 'keyboard'){        
        $sql = "SELECT * FROM item WHERE itemCategory = '$category'";
    }
    elseif($category == 'mouse'){
        $sql = "SELECT * FROM item WHERE itemCategory = '$category'";
    }
    elseif($category == 'headset'){
        $sql = "SELECT * FROM item WHERE itemCategory = '$category'";
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
    <link rel="stylesheet" href="css/kategori.css">
    <link rel="shorcut icon" href="image/headset.svg">
    <title>Selamat Datang | PahlevyStore</title>
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
                    <a href="kategori.html" class="nav-link t4--argo text-center text-white">Kategori</a>                                
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

    <section id="section-2">
        <div class="container">
            <div class="row" id="wrapper-row-1">
                <div class="col-md-12" id="wrapper-col-1">

                    <div class="row" id="wrapper-row-2">
                        <div class="col-md-6" id="wrapper-col-2">
                            <form action="" method="get">
                                <select name="category" id="category">                                    
                                    <option value="">------</option>
                                    <option value="keyboard">Keyboard</option>
                                    <option value="mouse">Mouse</option>
                                    <option value="headset">Headset</option>                                    
                                </select>
                                <input type="submit" name="search" value="Search" id="search">
                            </form>
                        </div>
                    </div>

                    <div class="row" id="wrapper-row-2">
                        <div class="col-md-6" id="wrapper-col-1">
                            <p>Menampilkan kategori <?php echo $category?></p>
                        </div>
                    </div>

                    <div class="row" id="wrapper-row-2">
                        <?php
                        if($data = $mysqli->query($sql)){

                            
                        while($d = $data->fetch_assoc()){
                                                                
                        ?>
                        <div class="col-lg-2.5 transition--up" id="wrapper-col-2">                            
                            <div class="kotak" onclick="">
                                <img src="image/<?php echo $d['itemImage']?>" alt="" srcset="" id="barang">
                                <div>
                                    <p><?php echo $d['itemName']?></p>
                                    <p>Rp. <?php echo $d['itemPrice']?></p>                                                   
                                </div>                                                                
                            </div>
                            <div class="beli-detail">
                                <div class="row">
                                    <div class="col-6 d-flex justify-content-center pointer bg--putih">Beli</div>
                                    <div class="col-6 d-flex justify-content-center pointer bg--putih">Detail</div>
                                </div>
                            </div>                                                    
                        </div>
                        <?php                            
                        }
                        }
                        ?>
                    </div>

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

    
    <script type="text/javascript" src="js/kategori.js"></script>
</body>
</html>