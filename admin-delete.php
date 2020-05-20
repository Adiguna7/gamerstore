<?php
include 'connect.php';

if(isset($_GET['ucontrols']) && isset($_GET['id'])){
    $ucontrols = $_GET['ucontrols'];
    $id = $_GET['id'];
    if($ucontrols == "users"){
        $sql = "DELETE FROM pengguna WHERE userId = '$id'";
        $stmt = $pdo->prepare($sql);
        if($stmt->execute()){
            header("location: admin-dashboard.php?ucontrols=users");
        }
    }
    elseif($ucontrols == "items"){
        $sql = "DELETE FROM item WHERE itemId = '$id'";
        $stmt = $pdo->prepare($sql);
        if($stmt->execute()){
            header("location: admin-dashboard.php?ucontrols=items");
        }
    }
    elseif($ucontrols == "transaction"){
        $sql = "DELETE FROM transaksi WHERE transactionId = '$id'";
        $stmt = $pdo->prepare($sql);
        if($stmt->execute()){
            header("location: admin-dashboard.php?ucontrols=transaction");
        }
    }   
}


?>