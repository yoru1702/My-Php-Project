<?php
    session_start();
    include "config.inc.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_pr=$_POST["id_pr"];
    $del=$_POST["del"];
    $pic_pr=$_POST["pic_pr"];
    $name_pr=$_POST["name_pr"];
    $tel_pr=$_POST["tel_pr"];
    $url_pr=$_POST["url_pr"];
    $detail_pr=$_POST["detail_pr"];
    $type_ques=$_POST["type_ques"];
    $pic_new=$_FILES["pic_new"]["tmp_name"];
    $pic_new_name=$_FILES["pic_new"]["name"];
        $sql1="update tb_pr set name_pr='$name_pr',tel_pr='$tel_pr',url_pr='$url_pr',detail_pr='$detail_pr',type_ques='$type_ques' where id_pr='$id_pr'";
        $result1=mysqli_query($conn,$sql1);
        if($del==1){
            $sql2="update tb_pr set pic_pr='' where id_pr='$id_pr'";
            $result2=mysqli_query($conn,$sql2);
            unlink("pr/$pic_pr");
        }
        if($pic_new!=""){
            $type=strtolower($pic_new_name);
            $ext=strchr($type,".");
            if($ext==".jpg" or $ext==".png" or $ext==".gif"){
                $filename=$id_pr.$ext;
                copy($pic_new,"pr/$filename");
                $sql3="update tb_pr set pic_pr='$filename' where id_pr='$id_pr'";
                $result3=mysqli_query($conn,$sql3);
            }else{
                echo "<center><font color='red'><h2><b>นามสกุลเอกสารไม่ถูกต้อง</b></h2></font></center>";
                echo "<meta http-equiv='refresh' content='1;url=pr.php'>";
            }
        }
        if($result1){
            echo "<center><font color='green'><h2><b>แก้ไขข้อมูลสำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=pr.php'>";
        }else{
            echo "<center><font color='red'><h2><b>แก้ไขข้อมูลไม่สำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=pr.php'>";
        }
?>