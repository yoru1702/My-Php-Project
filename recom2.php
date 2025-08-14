<?php
    session_start();
    include "config.inc.php";
    $id_pack=$_POST["id_pack"];
    $sql="update tb_user set id_pack='$id_pack' where id_user='$_SESSION[valid_user]'";
    $result=mysqli_query($conn,$sql);
    echo "<meta http-equiv='refresh' content='0;url=recom3.php'>";
?>