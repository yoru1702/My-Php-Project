<?php
    session_start();
    include "config.inc.php";
    include "check_word.php";
    $id_news=$_POST["id_news"];
    $detail_com=$_POST["detail_com"];
    $day_com=date("Y-m-d");
    $time_com=date("H:i:s");
    $replace="<font color=red>***</font>";
    for($i=1;$i<count($rudeword);$i++){
        $detail_com=str_replace(trim($rudeword[$i]),$replace,$detail_com);
    }
    $sql="insert into tb_comment values(null,'$_SESSION[valid_user]','$id_news','$day_com','$time_com','$detail_com')";
    $result=mysqli_query($conn,$sql);
    echo "<meta http-equiv='refresh' content='0;url=news_detail.php?id_news=$id_news'>";
?>