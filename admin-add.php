<?php
include "connect.php";

if(isset($_GET['ucontrols'])){
    $ucontrols = $_GET['ucontrols'];
}

if(isset($_POST['submitadditem'])){
    $targetDir = "image/";
    $itemname = $_POST['itemname'];
    $itemprice = $_POST['itemprice'];
    $itemcategory = $_POST['itemcategory'];    
    $itemdescription = $_POST['itemdescription'];
    $itemstock = $_POST['itemstock'];
    $itemimage = $_FILES['itemimage'];
    
    if(getimagesize($itemimage['tmp_name']) && $itemimage['size'] < "200000"){
        $temp = explode(".", $itemimage["name"]);
        $newfilename = $itemcategory . round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($itemimage["tmp_name"], $targetDir . $newfilename);
        $sql = "INSERT INTO item (itemName, itemPrice, itemCategory, itemDescription, itemStock, itemImage)
                VALUES ('$itemname', '$itemprice', '$itemcategory', '$itemdescription', '$itemstock', '$newfilename');
                ";
        $stmt = $pdo->prepare($sql);
        if($stmt->execute()){
            header("location: admin-dashboard.php?ucontrols=items");
        }
    }   
    else{
        header("location: admin-add.php?status=imagesalah");
    }       
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Add Data</title>
    <!-- CSS Milik Dashboard Admin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/dashboard-admin.css">
    <link rel="shorcut icon" href="image/index/logoicon.png">
</head>
<body>
    <?php
    if($ucontrols == "items"){
    ?>
    <div class="l-popup py-3 t--montserrat t--small" style="min-width: 500px; min-height: 425px; height:fit-content">
        <div class="container">
            <div class="row h4 mt-3 justify-content-center">Add Data Items</div>
            <div class="row justify-content-center mt-4">
                <form action="" method="post" enctype="multipart/form-data" class="d-flex justify-content-center flex-column">                    
                    <label for="itemnameid">itemName</label>                    
                    <input type="text" name="itemname" id="itemnameid" required autocomplete="off">
                    <br>
                    <label for="itemnameid">itemPrice</label>                                    
                    <input type="number" name="itemprice" id="itempriceid" required autocomplete="off">
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
                    <input type="text" name="itemdescription" id="itemdescriptionid" required autocomplete="off">
                    <br>
                    <label for="itemstockid">itemStock</label>
                    <input type="number" name="itemstock" id="itemstockid" required autocomplete="off">
                    <br>
                    <label for="itemimageid">itemImage</label>
                    <input type="file" name="itemimage" id="itemimageid" required accept="image/png, .jpeg, .jpg">
                    <div class="row mt-5 justify-content-center">
                        <div class="col-5">
                            <button type="submit" name="submitadditem" class="o__button">Add Data</button>
                        </div>
                    </div>
                </form>            
            </div>           
        </div>
    </div>
    <?php
    }
    ?>
</body>
</html>