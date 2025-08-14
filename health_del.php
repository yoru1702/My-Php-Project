<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    $id_his=$_REQUEST["id_his"];
    $sql="delete from tb_his where id_his='$id_his'";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<center><font color='green'><h2><b>ลบข้อมูลสำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=health.php'>";
    }else{
        echo "<center><font color='red'><h2><b>ลบข้อมูลไม่สำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=health.php'>";
    }
?>