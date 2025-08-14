<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_wques=$_REQUEST["id_wques"];
    $sql="delete from tb_webques where id_wques='$id_wques'";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<center><font color='green'><h2><b>ลบข้อมูลสำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=online.php'>";
    }else{
        echo "<center><font color='red'><h2><b>ลบข้อมูลไม่สำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=online.php'>";
    }
?>