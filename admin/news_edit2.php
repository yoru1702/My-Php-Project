<?php
    session_start();
    include "config.inc.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_news=$_POST["id_news"];
    $del=$_POST["del"];
    $pic_news=$_POST["pic_news"];
    $head_news=$_POST["head_news"];
    $detail_news=$_POST["detail_news"];
    $day_up=date("Y-m-d");
    $pic_new=$_FILES["pic_new"]["tmp_name"];
    $pic_new_name=$_FILES["pic_new"]["name"];
        $sql1="update tb_news set head_news='$head_news',detail_news='$detail_news',day_up='$day_up'  where id_news='$id_news'";
        $result1=mysqli_query($conn,$sql1);
        if($del==1){
            $sql2="update tb_news set pic_news='' where id_news='$id_news'";
            $result2=mysqli_query($conn,$sql2);
            unlink("news/$pic_news");
        }
        if($pic_new!=""){
            $type=strtolower($pic_new_name);
            $ext=strchr($type,".");
            if($ext==".jpg" or $ext==".png" or $ext==".gif"){
                $filename=$id_news.$ext;
                copy($pic_new,"news/$filename");
                $sql3="update tb_news set pic_news='$filename' where id_news='$id_news'";
                $result3=mysqli_query($conn,$sql3);
            }else{
                echo "<center><font color='red'><h2><b>นามสกุลเอกสารไม่ถูกต้อง</b></h2></font></center>";
                echo "<meta http-equiv='refresh' content='1;url=news.php'>";
            }
        }
        if($result1){
            echo "<center><font color='green'><h2><b>แก้ไขข้อมูลสำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=news.php'>";
        }else{
            echo "<center><font color='red'><h2><b>แก้ไขข้อมูลไม่สำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=news.php'>";
        }
?>