<?php
    session_start();
    include "config.inc.php";
    $username=$_REQUEST["username"];
    $password=$_REQUEST["password"];
    $sql="select * from tb_admin where user_ad='$username' and pass_ad='$password'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num>0){
        $read=mysqli_fetch_assoc($result);
        $id_ad=$read["id_ad"];
        $id_pack=$read["id_pack"];
        $name_ad=$read["name_ad"];
        $sname_ad=$read["sname_ad"];
        $pic_ad=$read["pic_ad"];
        $tel_ad=$read["tel_ad"];
        $type_ad=$read["type_ad"];
        $_SESSION["valid_admin"]=$id_ad;
        $_SESSION["id_pack"]=$id_pack;
        $_SESSION["name_ad"]=$name_ad;
        $_SESSION["sname_ad"]=$sname_ad;
        $_SESSION["pic_ad"]=$pic_ad;
        $_SESSION["tel_ad"]=$tel_ad;
        echo "<center><font color='green'><h2><b>เข้าสู่ระบบสำเร็จ</b></h2></font></center>";
        if($type_ad==1){
            echo "<meta http-equiv='refresh' content='1;url=user.php'>";
        }else{
            echo "<meta http-equiv='refresh' content='1;url=../doctor/index.php'>";
        }
    }else{
        echo "<center><font color='red'><h2><b>เข้าสู่ระบบไม่สำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
    }
?>