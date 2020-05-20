<?php
include 'connect.php';

$category = NULL;
$sql = NULL;
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

function selected($select){
    global $category;
    if($category == $select){
        return "selected";
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
                    <a href="user-dashboard.php" class="t4--argo nav-link text-white">Dashboard User</a>
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

    <section id="section-2">
        <div class="container">
            <div class="row" id="wrapper-row-1">
                <div class="col-md-12" id="wrapper-col-1">

                    <div class="row" id="wrapper-row-2">
                        <div class="col-md-6" id="wrapper-col-2">
                            <form action="" method="get">
                                <select name="category" id="category" required>                                    
                                    <option value="">------</option>
                                    <option value="keyboard" <?php echo selected("keyboard")?>>Keyboard</option>
                                    <option value="mouse" <?php echo selected("mouse")?>>Mouse</option>
                                    <option value="headset" <?php echo selected("headset")?>>Headset</option>                                    
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
                        if($sql){
                            if($stmt = $pdo->prepare($sql)){
                            $stmt->execute();
                                
                            while($row = $stmt->fetch()){
                                                                    
                            ?>
                            <div class="col-lg-2.5 transition--up" id="wrapper-col-2">                            
                                <div class="kotak" onclick="">
                                    <img src="image/<?php echo $row['itemImage']?>" alt="" srcset="" id="barang">
                                    <div>
                                        <p><?php echo $row['itemName']?></p>
                                        <p>Rp. <?php echo $row['itemPrice']?></p>                                                   
                                    </div>                                                                
                                </div>
                                <div class="beli-detail">
                                    <div class="row">                                        
                                        <div class="col-12 d-flex justify-content-center pointer bg--putih" onclick="window.location.href='item-detail.php?iid=<?php echo $row['itemId']?>'">Detail</div>
                                    </div>
                                </div>                                                    
                            </div>
                            <?php                            
                            }
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