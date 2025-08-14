<?php
    session_start();
    include "config.inc.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $question=$_POST["question"];
    $type_ques_n=$_POST["type_ques_n"];
        $sql1="insert into tb_question values(null,'$question','$type_ques_n')";
        $result1=mysqli_query($conn,$sql1);
                $sql2="select max(id_ques) as id_ques from tb_question";
                $result2=mysqli_query($conn,$sql2);
                $read2=mysqli_fetch_assoc($result2);
                $id_ques=$read2["id_ques"];
                $sql3="update tb_question set id_ques='$id_ques' where id_ques='$id_ques'";
                $result3=mysqli_query($conn,$sql3);
                if($result1){
                    echo "<center><font color='green'><h2><b>เพิ่มข้อมูลสำเร็จ</b></h2></font></center>";
                    echo "<meta http-equiv='refresh' content='1;url=ques.php'>";
                }else{
                    echo "<center><font color='red'><h2><b>เพิ่มข้อมูลไม่สำเร็จ</b></h2></font></center>";
                    echo "<meta http-equiv='refresh' content='1;url=ques.php'>";
                }
?>