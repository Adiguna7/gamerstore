<?php
include 'connect.php';

if(isset($_GET['status']) && $_GET['status']=="delete" && $_GET['tprocess'] == "keranjang"){
    $orderid = $_GET['orderid'];
    $sql = "DELETE FROM pesanan WHERE orderId = '$orderid'";
    $stmt = $pdo->prepare($sql);
    if($stmt->execute()){
        header("location: user-dashboard.php?tprocess=keranjang&status=deletesukses");
    }
}

?>