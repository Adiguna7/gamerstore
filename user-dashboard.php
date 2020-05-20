<?php
include "connect.php";

if(isset($_SESSION['userId'])){
  $userid = $_SESSION['userId'];
  $sql = "SELECT userName, isAdmin FROM pengguna WHERE userId = '$userid'";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $row = $stmt->fetch();
  $username = $row['userName'];
  if(isset($_GET['tprocess'])){
    $tprocess = $_GET['tprocess'];
    if($tprocess == "keranjang"){
      $sql = "SELECT p.orderId, i.itemName, p.quantity, p.orderPrice, p.isDone FROM pesanan p, item i WHERE i.itemId = p.itemId AND p.userId = '$userid'";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();      
    }
    elseif($tprocess == "transaction"){
      $sql = "SELECT * FROM transaksi WHERE userId = '$userid'";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      if(isset($_GET['submitbeli'])){
        $itemid = $_GET['iid'];
        $sql = "SELECT itemPrice FROM item WHERE itemId = '$itemid'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        $itemid = $_GET['iid'];
        $quantity = $_GET['quantity'];
        $itempricetot = ($quantity) * ($row['itemPrice']);
        $sql2 = "INSERT INTO pesanan VALUES(NULL, '$userid', '$itemid', '$quantity', '$itempricetot', NULL)";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute();
      }
      elseif(isset($_GET['status']) && $_GET['status'] == "bayar"){
        $sql = "SELECT SUM(orderPrice) AS totalharga FROM pesanan WHERE userId = '$userid' GROUP BY userId";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        $hargatottransaksi = $row['totalharga'];
        $date = date("y/m/d");        
        $sql2 = "INSERT INTO transaksi VALUES(NULL, '$userid', '$date',  '$hargatottransaksi', NULL, NULL, NULL)";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute();
      } 
    }
  }
}
else{
  header("location: login.php");
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard-admin.css">
    <link rel="shorcut icon" href="image/index/logoicon.png">
    <title>Nama User | Dashboard</title>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
  
      <!-- Sidebar -->
      <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #042a38;">
        
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
          <div class="sidebar-brand-icon">
            <i class="fas fa-user-cog"></i>
          </div>
          <div class="sidebar-brand-text mx-3"><?php echo $username?> Page</div>
        </a>
        
        <hr class="sidebar-divider my-0">
        
        <li class="nav-item active">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
        
        <hr class="sidebar-divider">
        
        <div class="sidebar-heading">
          Transaction Process
        </div>
        
        <li class="nav-item">
          <a class="nav-link collapsed" href="user-dashboard.php?tprocess=keranjang">
              <i class="fas fa-fw fa-shopping-basket"></i>
              <span>Keranjang</span>
          </a>        
        </li>
                  
        <li class="nav-item">
          <a class="nav-link" href="user-dashboard.php?tprocess=transaction">
              <i class="fas fa-fw fa-money-check-alt"></i>
              <span>Transaction</span>
          </a>        
        </li>                            
  
      </ul>
      
        <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars" style="color: #760933;"></i>
          </button>
          
          <div class="h5 ml-5 mb-0">
            <?php
            if($tprocess == "keranjang"){
              echo  "Show Keranjang dari $username";
            }
            elseif($tprocess == "transaction"){
              echo  "Show Items Data $username";
            }            
            ?>                        
          </div>          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn" type="button" style="background-color: #760933;">
                        <i class="fas fa-search fa-sm" style="color: white;"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>                     
                        
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username?></span>                
              </a>                            
            </li>
            <li class="nav-item  no-arrow">
              <a class="nav-link" href="index.php" id="userDropdown" role="button">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Home</span>                
              </a>                            
            </li>
            <li class="nav-item  no-arrow">
              <a class="nav-link" href="kategori2.php" id="userDropdown" role="button">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Kategori</span>                
              </a>                            
            </li>
            <li class="nav-item  no-arrow">
              <a class="nav-link" href="logout.php" id="userDropdown" role="button">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Logout</span>                
              </a>                            
            </li>

          </ul>

        </nav>

        <div class="container">          
        <?php
        if($tprocess == "transaction"){                      
        ?>
        <div class="row">
          <div class="col-12">
            Silahkan mengupload foto buktitransfer jika isApproval masih kosong
          </div>
        </div>
        <?php
        }
        ?>                        
          <div class="row">
            <div class="col-12">            
                <table class="table">
                  <thead class="l-thead">                    
                    <tr>
                      <?php
                      if($tprocess == "keranjang"){
                      ?>
                      <th scope="col" class="text-center">orderId</th>                                            
                      <th scope="col" class="text-center">itemName</th>
                      <th scope="col" class="text-center">quantity</th>
                      <th scope="col" class="text-center">Price</th>
                      <th scope="col" class="text-center">isDone</th>
                      <th scope="col" class="text-center">Action</th>
                      <?php
                      }
                      elseif($tprocess == "transaction"){                      
                      ?>
                      <th scope="col" class="text-center">transactionId</th>
                      <th scope="col" class="text-center">userId</th>
                      <th scope="col" class="text-center">transactionDate</th>
                      <th scope="col" class="text-center">totalPrice</th>
                      <th scope="col" class="text-center">isApproval</th>
                      <th scope="col" class="text-center">Resi</th>
                      <th scope="col" class="text-center">BuktiTransfer</th>
                      <th scope="col" class="text-center">Action</th>
                      <?php
                      }
                      ?>                                               
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($tprocess == "keranjang") {                                          
                    while($rowkeranjang = $stmt->fetch()){
                    ?>                  
                    <tr>                      
                      <th class="c-read--wrapper text-center" scope="row"><?php echo $rowkeranjang['orderId']?></th>                        
                      <td class="text-center"><?php echo $rowkeranjang['itemName']?></td>
                      <td class="text-center"><?php echo $rowkeranjang['quantity']?></td>
                      <td class="text-center"><?php echo $rowkeranjang['orderPrice']?></td>
                      <td class="text-center"><?php echo $rowkeranjang['isDone']?></td>                      
                      <td style="width: 165px">                      
                        <div class="row">                          
                          <div class="col-6"><div class="o__button" onclick="window.location.href='user-dashboard.php?tprocess=transaction&status=bayar'">Bayar</div></div>
                          <div class="col-6"><div class="o__button" onclick="window.location.href='user-delete.php?tprocess=keranjang&status=delete&orderid=<?php echo $rowkeranjang['orderId']?>'">Delete</div></div>
                        </div>
                      </td>                                                                     
                    </tr>
                    <?php
                    }
                    }
                    ?>
                    
                    <?php
                    if ($tprocess == "transaction") {                                          
                    while($rowtransaction = $stmt->fetch()){
                    ?>                  
                    <tr>
                      <th scope="row" class="text-center align-middle"><?php echo $rowtransaction['transactionId']?></th>                        
                      <td class="text-center align-middle"><?php echo $rowtransaction['userId']?></td>
                      <td class="text-center align-middle"><?php echo $rowtransaction['transactionDate']?></td>
                      <td class="text-center align-middle"><?php echo $rowtransaction['totalPrice']?></td>
                      <td class="text-center align-middle"><?php echo $rowtransaction['isApproval']?></td>
                      <td class="text-center align-middle"><img src="image/transaction/<?php echo $rowtransaction['imgAdmin']?>" style="max-width: 100px"></td>
                      <td class="text-center align-middle"><img src="image/buktitransfer/<?php echo $rowtransaction['imgUser']?>" style="max-width: 100px"></td>                      
                      <td class="align-middle" style="width: 165px">
                        <div class="row">
                          <div class="col-12"><div class="o__button" onclick="window.location.href='user-update.php?tid=<?php echo $rowtransaction['transactionId']?>'">Upload Transfer</div></div>                          
                        </div>
                      </td>                                                                     
                    </tr>
                    <?php
                    }
                    }
                    ?>                    
                  </tbody>
              </table>
            </div>
          </div>                     


          </div>
        </div>      

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; GamerStore 2020</span>
          </div>
        </div>
      </footer>      

    </div>
    </div>

    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/dashboard-admin.js"></script> 
</body>
</html>