<?php
    session_start();
    include "config.inc.php";
    $day_ques=date("Y-m-d");
    $sql="insert into tb_ques_n values(null,'$_SESSION[valid_user]','$day_ques','2','n')";
    $result=mysqli_query($conn,$sql);
    $sql1="select max(id_ques_n) as id_ques_n from tb_ques_n";
    $result1=mysqli_query($conn,$sql1);
    $read1=mysqli_fetch_assoc($result1);
    $id_ques_n=$read1["id_ques_n"];
    $_SESSION["id_ques_n"]=$id_ques_n;
    echo "<meta http-equiv='refresh' content='0;url=ques_doc.php'>";
?>