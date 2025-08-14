<?php
    session_start();
    include "config.inc.php";
    $id_pro=$_POST["id_pro"];
    $coin_user=$_POST["coin_user"];
    $total_order=$_POST["total_order"];
    $pay_order1=$_POST["pay_order1"];
    $pay_order2=$_POST["pay_order2"];
    $pay_order3=$_POST["pay_order3"];
    $day_order=date("Y-m-d");
    if($pay_order1!=""){
        $sql="insert into tb_order values(null,'$_SESSION[valid_user]','$id_pro','$day_order','1','1','0','$total_order','0','0','n')";
    }else if($pay_order2!=""){
        $sql="insert into tb_order values(null,'$_SESSION[valid_user]','$id_pro','$day_order','2','1','0','$total_order','0','0','n')";
    }else if($pay_order3!=""){
        $sql="insert into tb_order values(null,'$_SESSION[valid_user]','$id_pro','$day_order','3','1','0','$total_order','0','0','n')";
    }
    $result=mysqli_query($conn,$sql);
    echo "<center><font color='green'><h2><b>สั่งซื้อสินค้าสำเร็จ <br>(รอแอดมินอนุมัติ)</b></h2></font></center>";
    echo "<meta http-equiv='refresh' content='1;url=pro_his.php'>";
?>