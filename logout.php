<?php
include 'connect.php';
session_destroy();
return header("location: index.php");
?>