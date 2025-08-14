<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_user=$_REQUEST["id_user"];
    $coin_user=$_REQUEST["coin_user"];
    $coin=$_REQUEST["coin"];
    for($k=0;$k<count($id_user);$k++){
        $total_coin=$coin[$k]+$coin_user[$k];
        $sql="update tb_user set coin_user='$total_coin' where id_user='$id_user[$k]'";
        $result=mysqli_query($conn,$sql);
        $total_coin=0;
    }
    if($result){
        echo "<center><font color='green'><h2><b>อนุมัติแต้มสำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=act.php'>";
    }else{
        echo "<center><font color='red'><h2><b>อนุมัติแต้มไม่สำเร็จ</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=act.php'>";
    }
?>