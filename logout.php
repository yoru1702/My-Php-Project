<?php
    session_start();
    include "config.inc.php";
    if($_SESSION["valid_user"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql1="update tb_user set status_on='n' where id_user='$_SESSION[valid_user]'";
    $result1=mysqli_query($conn,$sql1);  
    unset($_SESSION["valid_user"]);
    unset($_SESSION["id_pack"]);
    unset($_SESSION["name_user"]);
    unset($_SESSION["sname_user"]);
    unset($_SESSION["pic_user"]);
    unset($_SESSION["status_pack"]);
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
?>