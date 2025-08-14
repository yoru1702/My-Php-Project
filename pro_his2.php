<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    $id_order=$_POST["id_order"];
    $sql="update tb_order set status_order='f' where id_order='$id_order'";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<center><font color='green'><h2><b>ยืนยันการรับสินค้าสำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=pro_his.php'>";
    }else{
        echo "<center><font color='red'><h2><b>ยืนยันการรับสินค้าไม่สำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=pro_his.php'>";
    }
?>