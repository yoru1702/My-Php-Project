<?php
    session_start();
    include "config.inc.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $name_pack=$_POST["name_pack"];
    $price_pack=$_POST["price_pack"];
    $detail_pack=$_POST["detail_pack"];
    $disc=$_POST["disc"];
        $sql1="insert into tb_package values(null,'$name_pack','$price_pack','$detail_pack','$disc')";
        $result1=mysqli_query($conn,$sql1);
                $sql2="select max(id_pack) as id_pack from tb_package";
                $result2=mysqli_query($conn,$sql2);
                $read2=mysqli_fetch_assoc($result2);
                $id_pack=$read2["id_pack"];
                $sql3="update tb_package set id_pack='$id_pack' where id_pack='$id_pack'";
                $result3=mysqli_query($conn,$sql3);
                if($result1){
                    echo "<center><font color='green'><h2><b>เพิ่มข้อมูลสำเร็จ</b></h2></font></center>";
                    echo "<meta http-equiv='refresh' content='1;url=pack.php'>";
                }else{
                    echo "<center><font color='red'><h2><b>เพิ่มข้อมูลไม่สำเร็จ</b></h2></font></center>";
                    echo "<meta http-equiv='refresh' content='1;url=pack.php'>";
                }
?>