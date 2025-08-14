<?php
    session_start();
    include "config.inc.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $name_pr=$_POST["name_pr"];
    $tel_pr=$_POST["tel_pr"];
    $url_pr=$_POST["url_pr"];
    $detail_pr=$_POST["detail_pr"];
    $type_ques=$_POST["type_ques"];
    $pic_pr=$_FILES["pic_pr"]["tmp_name"];
    $pic_pr_name=$_FILES["pic_pr"]["name"];
        $sql1="insert into tb_pr values(null,'$name_pr','$tel_pr','3500','$url_pr','$detail_pr','$type_ques','')";
        $result1=mysqli_query($conn,$sql1);
        if($pic_pr!=""){
            $type=strtolower($pic_pr_name);
            $ext=strchr($type,".");
            if($ext==".jpg" or $ext==".png" or $ext==".gif"){
                $sql2="select max(id_pr) as id_pr from tb_pr";
                $result2=mysqli_query($conn,$sql2);
                $read2=mysqli_fetch_assoc($result2);
                $id_pr=$read2["id_pr"];
                $filename=$id_pr.$ext;
                copy($pic_pr,"pr/$filename");
                $sql3="update tb_pr set pic_pr='$filename' where id_pr='$id_pr'";
                $result3=mysqli_query($conn,$sql3);
            }else{
                echo "<center><font color='red'><h2><b>นามสกุลเอกสารไม่ถูกต้อง</b></h2></font></center>";
                echo "<meta http-equiv='refresh' content='1;url=pr.php'>";
            }
        }
        if($result1){
            echo "<center><font color='green'><h2><b>เพิ่มข้อมูลสำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=pr.php'>";
        }else{
            echo "<center><font color='red'><h2><b>เพิ่มข้อมูลไม่สำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=pr.php'>";
        }
?>