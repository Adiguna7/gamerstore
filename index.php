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
                        <div class="col-lg-2.5" id="wrapper-col-2">                            
                            <div class="kotak" onclick="window.location">
                                <img src="image/<?php echo $d['itemImage']?>" alt="" srcset="" id="barang">
                                <div>
                                    <p><?php echo $d['itemName']?></p>
                                    <p>Rp. <?php echo $d['itemPrice']?></p>                                                   
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

</body>
</html>