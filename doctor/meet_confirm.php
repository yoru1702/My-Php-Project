<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    $id_meet=$_POST["id_meet"];
    $sql="update tb_meet set status_meet='y' where id_meet='$id_meet'";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<center><font color='green'><h2><b>ยืนยันเข้าพบแพทย์สำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=meet.php'>";
    }else{
        echo "<center><font color='red'><h2><b>ยืนยันเข้าพบแพทย์ไม่สำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=meet.php'>";
    }
?>