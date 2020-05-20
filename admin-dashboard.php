<?php
include 'connect.php';

if (isset($_GET['ucontrols']) && $_SESSION['role'] == "admin") {
  $ucontrols = $_GET['ucontrols'];
  if($ucontrols == "users"){
    $sql = "SELECT * FROM pengguna";
  }
  elseif($ucontrols == "items"){
    $sql = "SELECT * FROM item";
  }
  elseif($ucontrols == "transaction"){
    $sql = "SELECT * FROM transaksi";  
  }
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
}
else{
  header("location: login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Dashboard | GamerStore</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/dashboard-admin.css">

</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #b32442;">
      
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <i class="fas fa-user-cog"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Page</div>
      </a>
      
      <hr class="sidebar-divider my-0">
      
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      
      <hr class="sidebar-divider">
      
      <div class="sidebar-heading">
        User Controls
      </div>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="admin-dashboard.php?ucontrols=users">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span>
        </a>        
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="admin-dashboard.php?ucontrols=items">
            <i class="fas fa-fw fa-dolly-flatbed"></i>
            <span>Items</span>
        </a>        
      </li>

      <li class="nav-item">
        <a class="nav-link" href="admin-dashboard.php?ucontrols=transaction">
            <i class="fas fa-fw fa-money-check-alt"></i>
            <span>Transaction</span>
        </a>        
      </li>                            

    </ul>    

    <!-- Content Wrapper -->
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
            if(isset($_GET['ucontrols'])){
            if($ucontrols == "users"){
              echo  "Show Users Data";
            }
            elseif($ucontrols == "items"){
              echo  "Show Items Data";
            }
            elseif($ucontrols == "transaction"){
              echo  "Show Transactions Data";
            }
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
          if(isset($_GET['ucontrols'])){
          ?>
            <?php
            if($ucontrols == "items"){
            ?>
            <div class="row mb-4">
              <div class="col-2">
                <div class="o__button" onclick="window.location.href='admin-add.php?ucontrols=items'">Add Data</div>
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
                      if($ucontrols == "users"){
                      ?>                                            
                      <th scope="col" class="text-center">userId</th>
                      <th scope="col" class="text-center">userName</th>
                      <th scope="col" class="text-center">isVerify</th>
                      <th scope="col" class="text-center">verifyCode</th>
                      <th scope="col" class="text-center">Action</th>
                      <?php
                      }
                      elseif($ucontrols == "items"){                      
                      ?>
                      <th scope="col" class="text-center">itemId</th>
                      <th scope="col" class="text-center">itemName</th>
                      <th scope="col" class="text-center">itemPrice</th>
                      <th scope="col" class="text-center">itemCategory</th>
                      <th scope="col" class="text-center">itemDescription</th>
                      <th scope="col" class="text-center">itemStock</th>
                      <th scope="col" class="text-center">itemImage</th>
                      <th scope="col" class="text-center">Action</th>
                      <?php
                      }
                      elseif($ucontrols == "transaction"){                      
                        ?>
                        <th scope="col" class="text-center">transactionId</th>
                        <th scope="col" class="text-center">userId</th>
                        <th scope="col" class="text-center">transactionDate</th>
                        <th scope="col" class="text-center">totalPrice</th>
                        <th scope="col" class="text-center">isApproval</th>
                        <th scope="col" class="text-center">imgAdmin</th>
                        <th scope="col" class="text-center">imgUser</th>                                                
                        <th scope="col" class="text-center">Action</th>
                      <?php
                        }
                      ?>                                                
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($ucontrols == "users") {                                          
                    while($row = $stmt->fetch()){
                    ?>                  
                    <tr>                      
                      <th class="c-read--wrapper text-center" onclick="window.location.href='admin-userdetail.php?id=<?php echo $row['userId']?>'" scope="row"><?php echo $row['userId']?></th>                        
                      <td class="text-center"><?php echo $row['userName']?></td>
                      <td class="text-center"><?php echo $row['isVerify']?></td>
                      <td class="text-center"><?php echo $row['verifyCode']?></td>                      
                      <td style="width: 165px">                      
                        <div class="row">
                          <div class="col-6"><div class="o__button" onclick="window.location.href='admin-update.php?ucontrols=users&id=<?php echo $row['userId']?>'">Update</div></div>
                          <div class="col-6"><div class="o__button" onclick="window.location.href='admin-delete.php?ucontrols=users&id=<?php echo $row['userId']?>'">Delete</div></div>
                        </div>
                      </td>                                                                     
                    </tr>
                    <?php
                    }
                    }
                    ?>
                    
                    <?php
                    if ($ucontrols == "items") {                                          
                    while($row = $stmt->fetch()){
                    ?>                  
                    <tr>
                      <th scope="row" class="text-center align-middle"><?php echo $row['itemId']?></th>                        
                      <td class="text-center align-middle"><?php echo $row['itemName']?></td>
                      <td class="text-center align-middle"><?php echo $row['itemPrice']?></td>
                      <td class="text-center align-middle"><?php echo $row['itemCategory']?></td>
                      <td class="text-center align-middle"><?php echo $row['itemDescription']?></td>
                      <td class="text-center align-middle"><?php echo $row['itemStock']?></td>
                      <td class="text-center align-middle"><img class="img-fluid" src="image/<?php echo $row['itemImage']?>" style="max-width: 100px" alt="" srcset=""></td>
                      <td class="align-middle" style="width: 165px">
                        <div class="row">
                          <div class="col-6"><div class="o__button" onclick="window.location.href='admin-update.php?ucontrols=items&id=<?php echo $row['itemId']?>'">Update</div></div>
                          <div class="col-6"><div class="o__button" onclick="window.location.href='admin-delete.php?ucontrols=items&id=<?php echo $row['itemId']?>'">Delete</div></div>
                        </div>
                      </td>                                                                     
                    </tr>
                    <?php
                    }
                    }
                    ?>

                    <?php
                    if ($ucontrols == "transaction") {                                          
                    while($row = $stmt->fetch()){
                    ?>                  
                    <tr>
                      <th scope="row" class="text-center"><?php echo $row['transactionId']?></th>                        
                      <td class="text-center"><?php echo $row['userId']?></td>
                      <td class="text-center"><?php echo $row['transactionDate']?></td>
                      <td class="text-center"><?php echo $row['totalPrice']?></td>
                      <td class="text-center"><?php echo $row['isApproval']?></td>
                      <td class="text-center"><img class="img-fluid" src="image/transaction/<?php echo $row['imgAdmin']?>" style="max-width: 100px" alt="" srcset=""></td>
                      <td class="text-center"><img class="img-fluid" src="image/buktitransfer/<?php echo $row['imgUser']?>" style="max-width: 100px" alt="" srcset=""></td>
                      <td style="width: 165px">
                        <div class="row">
                          <div class="col-6"><div class="o__button" onclick="window.location.href='admin-update.php?ucontrols=transaction&id=<?php echo $row['transactionId']?>'">Update</div></div>
                          <div class="col-6"><div class="o__button" onclick="window.location.href='admin-delete.php?ucontrols=transaction&id=<?php echo $row['transactionId']?>'">Delete</div></div>
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
          <?php
          }
          ?>            


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
