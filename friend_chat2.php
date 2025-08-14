<?php
    session_start();
    include "config.inc.php";
    include "check_word.php";
    $id_friend=$_POST["id_friend"];
    $name_user=$_POST["name_user"];
    $sname_user=$_POST["sname_user"];
    $pic_user=$_POST["pic_user"];
    $type_ques=$_POST["type_ques"];
    $detail_chat=$_POST["detail_chat"];
    $day_chat=date("Y-m-d");
    $time_chat=date("H:i:s");
    $replace="<font color=red>***</font>";
    for($i=1;$i<count($rudeword);$i++){
        $detail_chat=str_replace(trim($rudeword[$i]),$replace,$detail_chat);
    }
    $sql="insert into tb_chat_f values(null,'$_SESSION[valid_user]','$id_friend','$day_chat','$time_chat','$detail_chat')";
    $result=mysqli_query($conn,$sql);
    echo "<meta http-equiv='refresh' content='0;url=friend_chat.php?id_friend=$id_friend&name_user=$name_user&sname_user=$sname_user&pic_user=$pic_user&type_ques=$type_ques'>";
?>