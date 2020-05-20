<?php
include 'connect.php';

if(isset($_GET['iid'])){
    $itemid = $_GET['iid'];    
    $sql = "SELECT * FROM item WHERE itemId = '$itemid'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    $itemname = $row['itemName'];
    $itemprice = $row['itemPrice'];
    $itemstock = $row['itemStock'];
    $itemimage = $row['itemImage'];
    $itemdescription = $row['itemDescription'];    
}

if(isset($_GET['submitkerangjang']) || isset($_GET['submitbeli'])){
    if(isset($_GET['submitkerangjang'])){
        return header("location: item-detail.php?status=keranjangsukses");
    }
    elseif(isset($_GET['submitbeli'])){
        return header("location: userdashboard-detail.php?");
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
    <link rel="stylesheet" href="css/item-detail.css">
    <link rel="shorcut icon" href="image/index/logoicon.png">
    <title>Item | Detail</title>
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

    <div class="c-idetail-section1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="l-itemimage">
                        <img class="img-fluid" src="image/<?php echo $itemimage?>" alt="" srcset="">
                    </div>
                </div>
                <div class="col-lg-6 l-itemdetail">
                    <p class="h5 t--montserrat"><?php echo $itemname ?></p>
                    <div class="l-itemdetail--exclusive mt-4 pb-2">
                        <img class="img-fluid" src="image/index/Asset 1@4x.png" alt="" srcset="">
                        <p class="h3 ml-4 mt-3 t--montserrat t--merahmuda"><?php echo $itemprice?></p>
                    </div>
                    <br>
                    <p class="t--montserrat mt-3">Tersisa <?php echo $itemstock?> Buah</p>
                    <form class="t--montserrat mt-1" action="user-dashboard.php" method="get">
                        <?php
                        if(isset($_SESSION['role']) && $_SESSION['role'] == "user"){
                        ?>
                        <label for="quantityid">Quantity</label>
                        <input class="ml-3" type="number" name="quantity" id="quantityid" min="1" autofocus style="width: 50px; border-radius: 5px;" required>                        
                        <input type="hidden" name="iid" value="<?php echo $itemid?>">
                        <input type="hidden" name="tprocess" value="transaction">
                        <br>
                        <br>                                                
                        <button type="submit" name="submitkeranjang" class="o__buttonitemdetail">Tambah ke Keranjang</button>
                        <button type="submit" name="submitbeli" class="o__buttonitemdetail">Beli Sekarang</button>
                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>

            <div class="row mt-5 l-itemdescription">
                <div class="col-12">
                    <p class="t--montserrat">Deskripsi Produk</p>
                    <p class="t--montserrat t--small"><?php echo $itemdescription?></p>                    
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