<?php
    session_start();
    include "config.inc.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_ques=$_POST["id_ques"];
    $question=$_POST["question"];
    $type_ques_n=$_POST["type_ques_n"];
        $sql1="update tb_question set question='$question',type_ques_n='$type_ques_n' where id_ques='$id_ques'";
        $result1=mysqli_query($conn,$sql1);
        if($result1){
            echo "<center><font color='green'><h2><b>แก้ไขข้อมูลสำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=ques.php'>";
        }else{
            echo "<center><font color='red'><h2><b>แก้ไขข้อมูลไม่สำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=ques.php'>";
        }
?>