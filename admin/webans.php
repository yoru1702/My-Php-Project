<?php
    session_start();
    include "config.inc.php";
    include "check_word.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_wques=$_POST["id_wques"];
    $type_ques=$_POST["type_ques"];
    $detail_ans=$_POST["detail_ans"];
    $day_ans=date("Y-m-d");
    $time_ans=date("H:i:s");
    $replace="<font color=red>***</font>";
    for($i=1;$i<count($rudeword);$i++){
        $detail_ans=str_replace(trim($rudeword[$i]),$replace,$detail_ans);
    }
    $sql="insert into tb_webans values(null,'$_SESSION[valid_admin]','$id_wques','$day_ans','$time_ans','$detail_ans','2')";
    $result=mysqli_query($conn,$sql);
    echo "<meta http-equiv='refresh' content='0;url=online.php'>";
?>