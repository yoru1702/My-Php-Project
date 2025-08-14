<?php
    session_start();
    include "config.inc.php";
    include "check_word.php";
    $id_act=$_POST["id_act"];
    $id_post=$_POST["id_post"];
    $id_vote=$_POST["id_vote"];
    $sumvote=$_POST["sumvote"];
    $sql1="select * from tb_vote where id_user='$_SESSION[valid_user]' and id_post='$id_post'";
    $result1=mysqli_query($conn,$sql1);
    $num1=mysqli_num_rows($result1);
    if($num1>0){
        echo "<center><font color='red'><h2><b>คุณให้ดาวไปแล้ว!!!</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=act_post.php?id_act=$id_act'>";
    }else{
        if(isset($_POST["5"])){
            $vote="5";
        }
        if(isset($_POST["4"])){
            $vote="4";
        }
        if(isset($_POST["3"])){
            $vote="3";
        }
        if(isset($_POST["2"])){
            $vote="2";
        }
        if(isset($_POST["1"])){
            $vote="1";
        }
        $sumvote=$sumvote+$vote;
        $sql="insert into tb_vote values(null,'$_SESSION[valid_user]','$id_act','$id_post','$vote')";
        $result=mysqli_query($conn,$sql);
        $sql2="update tb_post set sumvote='$sumvote' where id_post='$id_post'";
        $result2=mysqli_query($conn,$sql2);
        echo "<center><font color='green'><h2><b>ให้ดาวเรียบร้อย</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=act_post.php?id_act=$id_act'>";
    }
?>