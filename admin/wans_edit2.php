<?php
    session_start();
    include "config.inc.php";
    include "check_word.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_wans=$_POST["id_wans"];
    $detail_ans=$_POST["detail_ans"];
    $replace="<font color=red>***</font>";
    for($i=1;$i<count($rudeword);$i++){
        $detail_ans=str_replace(trim($rudeword[$i]),$replace,$detail_ans);
    }
        $sql1="update tb_webans set detail_ans='$detail_ans' where id_wans='$id_wans'";
        $result1=mysqli_query($conn,$sql1);
        if($result1){
            echo "<center><font color='green'><h2><b>แก้ไขข้อมูลสำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=online.php'>";
        }else{
            echo "<center><font color='red'><h2><b>แก้ไขข้อมูลไม่สำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=online.php'>";
        }
?>