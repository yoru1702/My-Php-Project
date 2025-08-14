<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=../admin/index.php'>";
        exit();
    }
    $id_user=$_REQUEST["id_user"];
    $day_meet=$_REQUEST["day_meet"];
    $time_meet=$_REQUEST["time_meet"];
    $detail_meet=$_REQUEST["detail_meet"];
        $sql1="insert into tb_meet values(null,'$id_user','$day_meet','$time_meet','$detail_meet','0','0','n')";
        $result1=mysqli_query($conn,$sql1);
    if($result1){
        echo "<center><font color='green'><h2><b>ออกใบนัดพบแพทย์สำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=meet.php'>";
    }else{
        echo "<center><font color='red'><h2><b>ออกใบนัดพบแพทย์ไม่สำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=meet.php'>";
    }
?>