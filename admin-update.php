<?php
  include 'connect.php';

  if(isset($_GET['ucontrols'])){
    $ucontrols = $_GET['ucontrols'];
    if($ucontrols == "users"){
      if($ucontrols == "users" && isset($_GET['subadminupdate']) && isset($_GET['userid'])){
        $isverify = $_GET['isverify'];
        $verifycode = $_GET['verifycode'];
        $userid = $_GET['userid'];

        $sql = "UPDATE pengguna SET isVerify = '$isverify', verifyCode = '$verifycode' WHERE userid = '$userid'";
        $stmt = $pdo->prepare($sql);
        if($status = $stmt->execute()){
          return header("location: admin-dashboard.php?ucontrols=users"); 
        }
      }   
      elseif($ucontrols == "users" && isset($_GET['id'])){      
        $userid = $_GET['id'];
        $sql = "SELECT userId, userName, isVerify, verifyCode FROM pengguna WHERE userId = $userid";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();              
      }     
    }
    elseif($ucontrols == "transaction"){
      $transactionid = $_GET['id'];
      $sql = "SELECT * FROM transaksi WHERE transactionId = '$transactionid'";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $row = $stmt->fetch(); 
    }

    elseif($ucontrols == "items"){
      if($ucontrols == "items" && isset($_GET['id'])){      
        $userid = $_GET['id'];
        $sql = "SELECT itemId, itemName, itemPrice, itemCategory, itemDescription, itemStock, itemImage FROM item WHERE itemId = $userid";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();              
        }     
    }
  }
  if(isset($_POST['ucontrols'])){    
    $ucontrols = $_POST['ucontrols'];
    if($ucontrols == "items" && isset($_POST['subadminupdate'])){      
      $targetDir = "image/";
      $itemid = $_POST['id'];
      $itemname = $_POST['itemname'];
      $itemprice = $_POST['itemprice'];
      $itemcategory = $_POST['itemcategory'];    
      $itemdescription = $_POST['itemdescription'];
      $itemstock = $_POST['itemstock'];
      $itemimage = $_FILES['itemimage'];
      $sql = "SELECT itemImage FROM item WHERE itemId = '$itemid'";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $row = $stmt->fetch();
      $itemimagename = $row['itemImage'];
      if(getimagesize($itemimage['tmp_name']) && $itemimage['size'] < "200000"){                
        move_uploaded_file($itemimage["tmp_name"], $targetDir . $itemimage);
        $sql = "UPDATE item
                SET itemName = '$itemname', itemPrice = '$itemprice', itemCategory = '$itemcategory', itemDescription = '$itemdescription', itemStock = '$itemstock', itemImage = '$itemimagename'
                WHERE itemId = '$itemid'
                ";
        $stmt = $pdo->prepare($sql);
        if($stmt->execute()){
            return header("location: admin-dashboard.php?ucontrols=items");
        }
      }   
      else{
        header("location: admin-update.php?ucontrols=item&status=imagesalah");
      }
    }
    elseif($ucontrols == "transaction" && isset($_POST['subadminupdatetransaksi'])){
      $targetDir = "image/transaction/";
      $transactionid = $_POST['transactionid'];
      $transactiondate = $_POST['transactiondate'];      
      $isapproval = $_POST['isapproval'];
      $imgadmin = $_FILES['imgadmin'];      
      if(getimagesize($imgadmin['tmp_name']) && $imgadmin['size'] < "200000"){
        $temp = explode(".", $imgadmin["name"]);
        $newfilename = $transactiondate . round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($imgadmin["tmp_name"], $targetDir . $newfilename);
        $sql = "UPDATE transaksi SET isApproval = '$isapproval', imgAdmin = '$newfilename' WHERE transactionId = '$transactionid'";
        $stmt = $pdo->prepare($sql);
        if($stmt->execute()){
          header("location: admin-dashboard.php?ucontrols=transaction");
        }      
      }
    }
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Update</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>        
    <link rel="stylesheet" href="css/dashboard-admin.css">
    <link rel="shorcut icon" href="image/index/logoicon.png">
</head>
<body>
  <?php
  if($ucontrols == "users"){
  ?>
  <div class="l-popup">
    <p class="mt-4">Update Data</p>
    <br>
    <form action="" method="get">
      <label for="usernameid">Username</label>
      <br>
      <input type="text" name="username" id="usernameid" autocomplete="off" disabled value="<?php echo $row['userName']?>">       
      <br>
      <label for="isverifyid">isVerify</label>
      <br>
      <input type="text" name="isverify" id="isverifyid" autocomplete="off" value="<?php echo $row['isVerify']?>">
      <br>
      <label for="verifycodeid">verifyCode</label>
      <br>
      <input type="text" name="verifycode" id="verifycodeid" autocomplete="off" value="<?php echo $row['verifyCode']?>">      
      <br>
      <br>
      <br>
      <input type="hidden" name="userid" value="<?php echo $row['userId']?>">
      <input type="hidden" name="ucontrols" value="users">
      <div class="row justify-content-center">
        <button type="submit" name="subadminupdate" class="o__button">Update</button> 
      </div>     
    </form>      
  </div>
  <?php
  }
  elseif($ucontrols == "items"){  
  ?>
  <div class="l-popup py-3 t--montserrat t--small" style="min-width: 500px; min-height: 425px; height:fit-content">
        <div class="container">
            <div class="row h4 mt-3 justify-content-center">Update Data Items</div>
            <div class="row justify-content-center mt-4">
                <form action="" method="post" enctype="multipart/form-data" class="d-flex justify-content-center flex-column">                    
                    <label for="itemnameid">itemName</label>                    
                    <input type="text" name="itemname" id="itemnameid" required value="<?php echo $row['itemName']?>" autocomplete="off">
                    <br>
                    <label for="itemnameid">itemPrice</label>                                    
                    <input type="number" name="itemprice" id="itempriceid" required value="<?php echo $row['itemPrice'] ?>" autocomplete="off">
                    <br>
                    <label for="wrapper-radio">itemCategory</label>
                    <div id="wrapper-radio">
                        <label class="" for="keyboardid">Keyboard
                        <input style="vertical-align: middle" type="radio" name="itemcategory" id="keyboard" value="keyboard" required>
                        </label>
                        <label class="ml-2" for="mouseid">Mouse
                        </label>
                        <input style="vertical-align: middle" type="radio" name="itemcategory" id="mouseid" value="mouse">
                        <label class="ml-2" for="headsetid">Headset
                        </label>
                        <input style="vertical-align: middle" type="radio" name="itemcategory" id="headsetid" value="headset">
                    </div>
                    <br>
                    <label for="itemdescriptionid">itemDescription</label>
                    <input type="text" name="itemdescription" id="itemdescriptionid" required value="<?php echo $row['itemDescription'] ?>" autocomplete="off">
                    <br>
                    <label for="itemstockid">itemStock</label>
                    <input type="number" name="itemstock" id="itemstockid" required value="<?php echo $row['itemStock'] ?>" autocomplete="off">
                    <br>
                    <label for="itemimageid">itemImage</label>
                    <input type="file" name="itemimage" id="itemimageid" required accept="image/png, .jpeg, .jpg">
                    <input type="hidden" name="id" required value="<?php echo $row['itemId']?>">
                    <input type="hidden" name="ucontrols" required value="items">
                    <div class="row mt-5 justify-content-center">
                        <div class="col-5">
                            <button type="submit" name="subadminupdate" class="o__button">Update Data</button>
                        </div>
                    </div>
                </form>            
            </div>           
        </div>
    </div> 
  <?php
  }
  elseif($ucontrols == "transaction"){    
    ?>
      <div class="l-popup p-5 t--small t--montserrat" style="width: fit-content; height: fit-content;">
      <p class="mt-4">Update Transaksi</p>
      <br>
      <form action="" method="post" class="d-flex justify-content-center flex-column" enctype="multipart/form-data">
        <label for="transactionidid">transactionId</label>      
        <input type="number" name="transactionid" id="transactionidid" autocomplete="off" value="<?php echo $row['transactionId']?>">       
        <br>
        <label for="useridid">userId</label>
        <input type="number" name="userid" id="useridid" autocomplete="off" disabled value="<?php echo $row['userId']?>">       
        <br>
        <label for="transactiondateid">transactionDate</label>
        <input type="date" name="transactiondate" id="transactiondateid" autocomplete="off" disabled value="<?php echo $row['transactionDate']?>">       
        <br>
        <label for="totalpriceid">totalPrice</label>      
        <input type="number" name="totalprice" id="totalpriceid" autocomplete="off" disabled value="<?php echo $row['totalPrice']?>">       
        <br>    
        <label for="isapprovalid">isApproval</label>      
        <input type="number" name="isapproval" id="isapprovalid" autocomplete="off" min="0" max="1" required>
        <br>
        <label for="imgadminid">imgAdmin (Resi)</label>
        <input type="file" name="imgadmin" id="imgadminid" required accept="image/png, .jpeg, .jpg">      
        <br>
        <br>      
        <input type="hidden" name="ucontrols" value="transaction">
        <div class="row justify-content-center">
          <button type="submit" name="subadminupdatetransaksi" class="o__button">Update</button> 
        </div>     
      </form>      
      </div>
    <?php
    }
    ?>
</body>
</html>