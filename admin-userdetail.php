<?php
include "connect.php";
if(isset($_GET['id'])){
    $userid = $_GET['id'];
    $sql = "CALL userDetail('$userid')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
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
    <title>Admin | Userdetail</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/admin-userdetail.css">
    <link rel="shorcut icon" href="image/index/logoicon.png">
</head>
<body>
    <nav class="navbar navbar-expand-sm px-5 c-nav">
        <p class="navbar-brand t3--freshscript pointer" onclick="window.location.href = 'index.html'">GamerStore</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i style="color: white;" class="fas fa-bars"></i></span>
        </button>                
    </nav>

    <div class="container c-udetail-section1">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="h2 t--freshscript">User Detail</div>
            </div>              
        </div>
        <?php
        if(isset($_GET['id'])){
        ?>
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center">
                <div class="h4 t--argo">User Data</div>
            </div>              
        </div>        
        <div class="row mt-3">
            <div class="col-12">
                <table class="table">
                    <thead class="l-thead">
                      <tr>
                        <th scope="col">userId</th>
                        <th scope="col">userName</th>
                        <th scope="col">userEmail</th>
                        <th scope="col">userAddress</th>
                        <th scope="col">userCity</th>
                      </tr>
                    </thead>
                    </tbody>
                    <?php                    
                        while($row = $stmt->fetch()){                                                                
                    ?>                        
                        <tr>
                            <th scope="row"><?php echo $row['userId']?></th>
                            <td><?php echo $row['userName']?></td>
                            <td><?php echo $row['userEmail']?></td>
                            <td><?php echo $row['userAddress']?></td>
                            <td><?php echo $row['userCity']?></td>
                        </tr>                                          
                    <?php                        
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center">
                <div class="h4 t--argo">User Pesanan</div>
            </div>              
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <table class="table">
                    <thead class="l-thead">
                      <tr>
                        <th scope="col">orderId</th>
                        <th scope="col">userId</th>
                        <th scope="col">itemId</th>
                        <th scope="col">itemName</th>
                        <th scope="col">quantity</th>
                        <th scope="col">orderPrice</th>
                        <th scope="col">isDone</th>                        
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt->nextRowset();
                        while($row = $stmt->fetch()){                                                
                        ?>
                      <tr>
                        <th scope="row"><?php echo $row['orderId']?></th>
                        <td><?php echo $row['userId']?></td>
                        <td><?php echo $row['itemId']?></td>
                        <td><?php echo $row['itemName']?></td>
                        <td><?php echo $row['quantity']?></td>
                        <td><?php echo $row['orderPrice']?></td>
                        <td><?php echo $row['isDone']?></td>                        
                      </tr>
                      <?php
                        }
                      ?>                      
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center">
                <div class="h4 t--argo">User Transaksi</div>
            </div>              
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <table class="table">
                    <thead class="l-thead">
                      <tr>
                        <th scope="col">transactionId</th>
                        <th scope="col">userId</th>
                        <th scope="col">userName</th>
                        <th scope="col">transactionDate</th>
                        <th scope="col">totalPrice</th>
                        <th scope="col">isApproval</th>                                                
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $stmt->nextRowset();
                    while($row = $stmt->fetch()){                                            
                    ?>
                      <tr>
                        <th scope="row"><?php echo $row['transactionId']?></th>                        
                        <td><?php echo $row['userId']?></td>
                        <td><?php echo $row['userName']?></td>
                        <td><?php echo $row['transactionDate']?></td>
                        <td><?php echo $row['totalPrice']?></td> 
                        <td><?php echo $row['isApproval']?></td>                                              
                      </tr>
                    <?php
                    }
                    ?>                      
                    </tbody>
                </table>
            </div>
        </div>
        <?php
        }
        else{
        ?>
            <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center">
                <div class="h4 t--argo">Data tidak ditemukan</div>
            </div>              
            </div> 
        <?php
        }
        ?>
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
