<?php
    session_start();
    include "config.inc.php";
    include "check_word.php";
    $id_act=$_POST["id_act"];
    $detail_post=$_POST["detail_post"];
    $day_post=date("Y-m-d");
    $time_post=date("H:i:s");
    $replace="<font color=red>***</font>";
    $pic_post=$_FILES["pic_post"]["tmp_name"];
    $pic_post_name=$_FILES["pic_post"]["name"];
    $sql1="select * from tb_post where id_user='$_SESSION[valid_user]' and id_act='$id_act'";
    $result1=mysqli_query($conn,$sql1);
    $num1=mysqli_num_rows($result1);
    if($num1>0){
        echo "<center><font color='red'><h2><b>คุณเข้าร่วมกิจกรรมไปแล้ว!!!</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=act_post.php?id_act=$id_act'>";
    }else{
        for($i=1;$i<count($rudeword);$i++){
            $detail_post=str_replace(trim($rudeword[$i]),$replace,$detail_post);
        }
        $sql="insert into tb_post values(null,'$_SESSION[valid_user]','$id_act','$day_post','$time_post','$detail_post','','0')";
        $result=mysqli_query($conn,$sql);
        if($pic_post!=""){
            $type=strtolower($pic_post_name);
            $ext=strchr($type,".");
            if($ext==".jpg" or $ext==".png" or $ext==".gif"){
                $sql2="select max(id_post) as id_post from tb_post";
                $result2=mysqli_query($conn,$sql2);
                $read2=mysqli_fetch_assoc($result2);
                $id_post=$read2["id_post"];
                $filename=$id_post.$ext;
                copy($pic_post,"admin/post/$filename");
                $sql3="update tb_post set pic_post='$filename' where id_post='$id_post'";
                $result3=mysqli_query($conn,$sql3);
            }else{
                echo "<center><font color='red'><h2><b>นามสกุลเอกสารไม่ถูกต้อง</b></h2></font></center>";
                echo "<meta http-equiv='refresh' content='1;url=act_post.php?id_act=$id_act'>";
            }
        }
        echo "<center><font color='green'><h2><b>เข้าร่วมกิจกรรมเรียบร้อย</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='1;url=act_post.php?id_act=$id_act'>";
    }
?>