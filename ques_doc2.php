<?php
    session_start();
    include "config.inc.php";
    $i=$_POST["i"];
    $num=(int)$i;
    $a=1;
    while($a<$num){
        $id_ques=$_POST["id_ques"];
        $answer=$_POST["answer"];
        $sql="insert into tb_answer values(null,'$id_ques[$a]','$_SESSION[id_ques_n]','2','$answer[$a]')";
        $result=mysqli_query($conn,$sql);
        $sql1="update tb_ques_n set status_n='y' where id_ques_n='$_SESSION[id_ques_n]'";
        $result1=mysqli_query($conn,$sql1);
        $a++;
    }
    echo "<center><font color='green'><h2><b>ขอบคุณสำหรับการตอบกลับแบบประเมิน</b></h2></font></center>";
    echo "<meta http-equiv='refresh' content='1;url=index.php'>";
?>