<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_order=$_REQUEST["id_order"];
    $id_user=$_REQUEST["id_user"];
    $id_pro=$_REQUEST["id_pro"];
    $coin_user=$_REQUEST["coin_user"];
    $coin_pro=$_REQUEST["coin_pro"];
    $pay_order=$_REQUEST["pay_order"];
    $type_order1=$_REQUEST["type_order1"];
    $type_order2=$_REQUEST["type_order2"];
    $exp=$_REQUEST["exp"];
    $no_order=$_REQUEST["no_order"];
    $net=$_REQUEST["net"];
    if($type_order1==1){
        $sql="update tb_order set status_order='y' ,type_order='1' ,exp='$exp' ,no_order='$no_order' ,total_order='$net' where id_order='$id_order'";
        $result=mysqli_query($conn,$sql);
    }else if($type_order2==2){
        $sql="update tb_order set status_order='y' ,type_order='2' ,exp='$exp' ,no_order='$no_order' ,total_order='$net' where id_order='$id_order'";
        $result=mysqli_query($conn,$sql);
    }
    $sql1="select * from tb_product where id_pro='$id_pro'";
    $result1=mysqli_query($conn,$sql1);
    $read1=mysqli_fetch_assoc($result1);
    $num_pro=$read1["num_pro"];
    $num_pro--;
    $sql2="update tb_product set num_pro='$num_pro' where id_pro='$id_pro'";
    $result2=mysqli_query($conn,$sql2);
    if($pay_order==1){
        $total_coin=$coin_user-$coin_pro;
        $sql3="update tb_user set coin_user='$total_coin' where id_user='$id_user'";
        $result3=mysqli_query($conn,$sql3);
    }else if($pay_order==1){
        $sql3="update tb_user set coin_user='$coin_user' where id_user='$id_user'";
        $result3=mysqli_query($conn,$sql3);
    }else{
        $sql3="update tb_user set coin_user='$coin_user' where id_user='$id_user'";
        $result3=mysqli_query($conn,$sql3);
    }
    if($result){
        echo "<center><font color='green'><h2><b>อนุมัตคำสั่งซื้อสำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=buy_pro.php'>";
    }else{
        echo "<center><font color='red'><h2><b>อนุมัตคำสั่งซื้อไม่สำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=buy_pro.php'>";
    }
?>