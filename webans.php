<?php
    session_start();
    include "config.inc.php";
    include "check_word.php";
    $id_wques=$_POST["id_wques"];
    $type_ques=$_POST["type_ques"];
    $detail_ans=$_POST["detail_ans"];
    $day_ans=date("Y-m-d");
    $time_ans=date("H:i:s");
    $replace="<font color=red>***</font>";
    for($i=1;$i<count($rudeword);$i++){
        $detail_ans=str_replace(trim($rudeword[$i]),$replace,$detail_ans);
    }
    $sql="insert into tb_webans values(null,'$_SESSION[valid_user]','$id_wques','$day_ans','$time_ans','$detail_ans','1')";
    $result=mysqli_query($conn,$sql);
    echo "<meta http-equiv='refresh' content='0;url=online.php?id_wques=$id_wques&type_ques=$type_ques'>";
?>