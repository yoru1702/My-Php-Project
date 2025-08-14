<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_pr=$_REQUEST["id_pr"];
    $pic_pr=$_REQUEST["pic_pr"];
    $sql="delete from tb_pr where id_pr='$id_pr'";
    $result=mysqli_query($conn,$sql);
    unlink("pr/$pic_pr");
    if($result){
        echo "<center><font color='green'><h2><b>ลบข้อมูลสำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=pr.php'>";
    }else{
        echo "<center><font color='red'><h2><b>ลบข้อมูลไม่สำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=pr.php'>";
    }
?>