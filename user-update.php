<?php
include 'connect.php';

if(isset($_POST['uploadbt'])){
    $targetDir = "image/buktitransfer/";
    $buktitransfer = $_FILES['buktitransfer'];
    $transactionid = $_POST['tid'];

    if(getimagesize($buktitransfer['tmp_name']) && $buktitransfer['size'] < "200000"){
        $temp = explode(".", $buktitransfer["name"]);
        $newfilename = $transactiondate . round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($buktitransfer["tmp_name"], $targetDir . $newfilename);
        $sql = "UPDATE transaksi SET imgUser = '$newfilename' WHERE transactionId = '$transactionid'";
        $stmt = $pdo->prepare($sql);
        if($stmt->execute()){
          return header("location: user-dashboard.php?tprocess=transaction");
        }      
    }
    else{
        return header("location: user-update.php?status=gagal");
    }   
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Update</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>        
    <link rel="stylesheet" href="css/dashboard-admin.css">
</head>
<body>
    <div class="l-popup t--small t--montserrat p-5" style="width: fit-content; height: fit-content">
        <p class="h4">Upload Bukti Transfer</p>
        <br>
        <form class="" action="" method="post" enctype="multipart/form-data">
        <label for="buktitransferid">Pilih Gambar Bukti Transfer (max 200kb hanya jpg, jpeg, png)</label>
        <br>
        <input type="file" name="buktitransfer" id="buktitransferid" autocomplete="off" required accept="image/png, .jpeg, .jpg">
        <input type="hidden" name="tid" value="<?php echo $_GET['tid']?>">
        <br>
        <br>
        <button type="submit" name="uploadbt" class="o__button">Upload</button>                    
        </form>      
    </div>
</body>
</html>