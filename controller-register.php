<?php
include 'connect.php';

if (isset($_POST['submitregister'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $password = $_POST['password'];
    $konfirmpass = $_POST['konfirmpass'];
    $hashedpassword = password_hash($password, PASSWORD_BCRYPT);

    if(empty($username) || empty($email) || empty($password) || empty($konfirmpass)){
        return header("Location: register.php?status=kosong");
    }
    elseif ($password != $konfirmpass){    
        return header("Location: register.php?status=salah");
    }
    else{
        $sqluser = "SELECT * FROM pengguna WHERE userName = '$username'";
        $stmtuser = $pdo->prepare($sqluser);
        $stmtuser->execute();
        $jumlahBarisUser = $stmtuser->rowCount();

        // $sqlemail = "SELECT * FROM pengguna WHERE userEmail = '$email'";
        // $stmtemail = $pdo->prepare($sqlemail);
        // $stmtemail->execute();
        // $jumlahBarisEmail = $stmtemail->rowCount();

        if($jumlahBarisUser){
            return header("Location: register.php?status=usama");
        }
        // elseif($jumlahBarisEmail){
        //     return header("Location: register.php?status=esama");
        // }
        else{
            $verifycode = mt_rand(1000, 9999);
            $sql = "INSERT INTO pengguna VALUES (NULL, '$username', '$email', '$address', '$city', '$hashedpassword', NULL, NULL, '$verifycode')";            
            $stmt = $pdo->prepare($sql);
            $stmt -> execute();

            $sql = "SELECT userId, verifyCode FROM pengguna WHERE userName = '$username'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch();
            $useridparam = $row['userId'];
            $verifycodeparam = $row['verifyCode'];
            
            $to = "emailtestuntukbasdat123@gmail.com";
            $subject = "Verify Code From GameStore";
            $txt = "Terimakasih telah mendaftarkan akun di GameStore, Silahkan Masukan $verifycodeparam pada field verifycode\nHappy Shopping :)";            
            $headers = "From: emailtestuntukbasdat123@gmail.com" . "\r\n" .
                        "CC: emailtestuntukbasdat123@gmail.com";

            if (mail($to, $subject, $txt, $headers)) {
                return header("Location: login.php");
            }                        
        }
    }
}    
?>