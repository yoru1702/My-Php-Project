<?php
    session_start();
    include "config.inc.php";
    $id_meet=$_POST["id_meet"];
    $type_cost=$_POST["type_cost"];
    $total=$_POST["total"];
    $sql="update tb_meet set total='$total',type_cost='$type_cost' where id_meet='$id_meet'";
    $result=mysqli_query($conn,$sql);
    echo "<center><font color='green'><h2><b>ยืนยันการเลือกบริการรับส่งเรียบร้อย</b></h2></font></center>";
    echo "<meta http-equiv='refresh' content='1;url=meet.php'>";
?>