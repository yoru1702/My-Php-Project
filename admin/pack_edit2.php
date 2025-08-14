<?php
    session_start();
    include "config.inc.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_pack=$_POST["id_pack"];
    $name_pack=$_POST["name_pack"];
    $price_pack=$_POST["price_pack"];
    $detail_pack=$_POST["detail_pack"];
    $disc=$_POST["disc"];
        $sql1="update tb_package set name_pack='$name_pack',price_pack='$price_pack',detail_pack='$detail_pack',disc='$disc' where id_pack='$id_pack'";
        $result1=mysqli_query($conn,$sql1);
        if($result1){
            echo "<center><font color='green'><h2><b>แก้ไขข้อมูลสำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=pack.php'>";
        }else{
            echo "<center><font color='red'><h2><b>แก้ไขข้อมูลไม่สำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=pack.php'>";
        }
?>