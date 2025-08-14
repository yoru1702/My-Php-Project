<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_act=$_REQUEST["id_act"];
    $sql="update tb_act set status_act='y' where id_act='$id_act'";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<center><font color='green'><h2><b>ปิดโหวตสำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=act.php'>";
    }else{
        echo "<center><font color='red'><h2><b>ปิดโหวตไม่สำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=act.php'>";
    }
?>