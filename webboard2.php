<?php
    session_start();
    include "config.inc.php";
    include "check_word.php";
    $id_wques=$_POST["id_wques"];
    $type_ques=$_POST["type_ques"];
    $detail_ques=$_POST["detail_ques"];
    $day_ques=date("Y-m-d");
    $time_ques=date("H:i:s");
    $replace="<font color=red>***</font>";
    for($i=1;$i<count($rudeword);$i++){
        $detail_ques=str_replace(trim($rudeword[$i]),$replace,$detail_ques);
    }
    $sql="insert into tb_webques values(null,'$_SESSION[valid_user]','$day_ques','$time_ques','$detail_ques','$type_ques')";
    $result=mysqli_query($conn,$sql);
    echo "<meta http-equiv='refresh' content='0;url=online.php?id_wques=$id_wques&type_ques=$type_ques'>";
?>