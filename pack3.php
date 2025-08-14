<?php
    session_start();
    include "config.inc.php";
    $id_pack=$_POST["id_pack"];
    unset($_SESSION["id_pack"]);
    unset($_SESSION["status_pack"]);
    $_SESSION["id_pack"]=$id_pack;
    $_SESSION["status_pack"]="n";
    $sql="update tb_user set status_pack='n',id_pack='$id_pack' where id_user='$_SESSION[valid_user]'";
    $result=mysqli_query($conn,$sql);
    echo "<meta http-equiv='refresh' content='0;url=recom3.php'>";
?>