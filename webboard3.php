<?php
    session_start();
    include "config.inc.php";
    $id_wques=$_REQUEST["id_wques"];
    $type_ques=$_REQUEST["type_ques"];
    $status_like=$_REQUEST["status_like"];
    if($status_like==""){
        $sql="insert into tb_like values(null,'$_SESSION[valid_user]','$id_wques','y')";
    }else if($status_like=="n"){
        $sql="update tb_like set status_like='y' where id_wques='$id_wques'";
    }else if($status_like=="y"){
        $sql="update tb_like set status_like='n' where id_wques='$id_wques'";
    } 
    $result=mysqli_query($conn,$sql);
    echo "<meta http-equiv='refresh' content='0;url=online.php?id_wques=$id_wques&type_ques=$type_ques&status_like=$status_like'>";
?>