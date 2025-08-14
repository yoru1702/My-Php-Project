<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_user=$_REQUEST["id_user"];
    $sql="update tb_user set status_pack='y' where id_user='$id_user'";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<center><font color='green'><h2><b>อนุมัตคำสั่งซื้อสำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=buy_pack.php'>";
    }else{
        echo "<center><font color='red'><h2><b>อนุมัตคำสั่งซื้อไม่สำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=buy_pack.php'>";
    }
?>