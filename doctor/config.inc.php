<?php
    $serv="localhost";
    $user="root";
    $pass="";
    $data="ghtest45";
    $conn=mysqli_connect($serv,$user,$pass,$data);
    if(!$conn){
        die("Error Connect!".mysqli_connect_error());
    }
    mysqli_set_charset($conn,"utf8");
    date_default_timezone_set("Asia/bangkok");
    error_reporting(0);
    // error_reporting(~E_NOTICE);
?>