<?php
    $to = "emailtestuntukbasdat123@gmail.com";
    $subject = "My subject";
    $txt = "Hello world!";
    $headers = "From: emailtestuntukbasdat123@gmail.com" . "\r\n" .
    "CC: emailtestuntukbasdat123@gmail.com";    
    
    if (mail($to, $subject, $txt, $headers)) {        
        echo "sukses";
    }
    
?>
