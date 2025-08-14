<?php
    session_start();
    include "config.inc.php";
    $id_user2=$_REQUEST["id_user2"];
    $type_ques=$_REQUEST["type_ques"];
    $sql="insert into tb_friend values(null,'$_SESSION[valid_user]','$id_user2')";
    $result=mysqli_query($conn,$sql);
    echo "<meta http-equiv='refresh' content='0;url=online.php?type_ques=$type_ques'>";
?>