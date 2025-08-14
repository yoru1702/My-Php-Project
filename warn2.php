<?php
    session_start();
    include "config.inc.php";
    $sql="update tb_alert set status_alert='y' where id_user='$_SESSION[valid_user]'";
    $result=mysqli_query($conn,$sql);
    echo "<center><font color='green'><h2><b>ยืนยันการรับประทานยาเรียบร้อย</b></h2></font></center>";
    echo "<meta http-equiv='refresh' content='1;url=warn.php'>";
?>