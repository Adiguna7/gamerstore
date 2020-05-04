<?php
$mysqli = new mysqli('localhost', 'root', '123', 'basisdata2020v2');

if(!$mysqli){
    echo "error";
}
$category = NULL;
$sql = "SELECT MONTH(t.transactionDate) AS bulan, SUM(p.quantity) AS jumlah FROM pesanan=p, transaksi = t WHERE t.orderId = p.orderId GROUP BY YEAR(t.transactionDate), MONTH(t.transactionDate)"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
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
                        <div class="col-md-6" id="wrapper-col-1">
                            <p>Menampilkan Ringkasan Barang yang telah laku terjual <?php echo $category?></p>
                        </div>
                    </div>

                    <div class="row" id="wrapper-row-2">
                        <?php
                        if($data = $mysqli->query($sql)){

                            
                        while($d = $data->fetch_assoc()){
                                                                
                        ?>
                        <div class="col-lg-12">
                            <p id="ringkas" style="font-family: 'montserrat'; font-size: 1.2rem">Jumlah Item Yang Terjual Pada Bulan Ke <?php echo $d['bulan']?> adalah <?php echo $d['jumlah']?></p>
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