<?php
    session_start();
    include "config.inc.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $head_news=$_POST["head_news"];
    $detail_news=$_POST["detail_news"];
    $day_up=date("Y-m-d");
    $detail_news=$_POST["detail_news"];
    $pic_news=$_FILES["pic_news"]["tmp_name"];
    $pic_news_name=$_FILES["pic_news"]["name"];
        $sql1="insert into tb_news values(null,'$head_news','$detail_news','$day_up','0','')";
        $result1=mysqli_query($conn,$sql1);
        if($pic_news!=""){
            $type=strtolower($pic_news_name);
            $ext=strchr($type,".");
            if($ext==".jpg" or $ext==".png" or $ext==".gif"){
                $sql2="select max(id_news) as id_news from tb_news";
                $result2=mysqli_query($conn,$sql2);
                $read2=mysqli_fetch_assoc($result2);
                $id_news=$read2["id_news"];
                $filename=$id_news.$ext;
                copy($pic_news,"news/$filename");
                $sql3="update tb_news set pic_news='$filename' where id_news='$id_news'";
                $result3=mysqli_query($conn,$sql3);
            }else{
                echo "<center><font color='red'><h2><b>นามสกุลเอกสารไม่ถูกต้อง</b></h2></font></center>";
                echo "<meta http-equiv='refresh' content='1;url=news.php'>";
            }
        }
        if($result1){
            echo "<center><font color='green'><h2><b>เพิ่มข้อมูลสำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=news.php'>";
        }else{
            echo "<center><font color='red'><h2><b>เพิ่มข้อมูลไม่สำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=news.php'>";
        }
?>