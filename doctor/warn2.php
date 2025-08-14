<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=../admin/index.php'>";
        exit();
    }
    $day_alert=$_REQUEST["day_alert"];
    $time_alert=$_REQUEST["time_alert"];
    $detail_alert=$_REQUEST["detail_alert"];
    $sql="select * from tb_user where id_user and id_pack='$_SESSION[id_pack]' and status_mem>'0'";
    $result=mysqli_query($conn,$sql);
    while($read=mysqli_fetch_assoc($result)){
        $id_user=$read["id_user"];
        $sql1="insert into tb_alert values(null,'$id_user','$day_alert','$time_alert','$detail_alert','n')";
        $result1=mysqli_query($conn,$sql1);
    }
    if($result1){
        echo "<center><font color='green'><h2><b>แจ้งเตือนรับประทานยาสำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=warn.php'>";
    }else{
        echo "<center><font color='red'><h2><b>แจ้งเตือนรับประทานยาไม่สำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=warn.php'>";
    }
?>