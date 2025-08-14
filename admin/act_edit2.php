<?php
    session_start();
    include "config.inc.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_act=$_POST["id_act"];
    $del=$_POST["del"];
    $pic_act=$_POST["pic_act"];
    $name_act=$_POST["name_act"];
    $detail_act=$_POST["detail_act"];
    $coin=$_POST["coin"];
    $day_out=$_POST["day_out"];
    $pic_new=$_FILES["pic_new"]["tmp_name"];
    $pic_new_name=$_FILES["pic_new"]["name"];
        $sql1="update tb_act set name_act='$name_act',detail_act='$detail_act',coin='$coin',day_out='$day_out' where id_act='$id_act'";
        $result1=mysqli_query($conn,$sql1);
        if($del==1){
            $sql2="update tb_act set pic_act='' where id_act='$id_act'";
            $result2=mysqli_query($conn,$sql2);
            unlink("act/$pic_act");
        }
        if($pic_new!=""){
            $type=strtolower($pic_new_name);
            $ext=strchr($type,".");
            if($ext==".jpg" or $ext==".png" or $ext==".gif"){
                $filename=$id_act.$ext;
                copy($pic_new,"act/$filename");
                $sql3="update tb_act set pic_act='$filename' where id_act='$id_act'";
                $result3=mysqli_query($conn,$sql3);
            }else{
                echo "<center><font color='red'><h2><b>นามสกุลเอกสารไม่ถูกต้อง</b></h2></font></center>";
                echo "<meta http-equiv='refresh' content='1;url=act.php'>";
            }
        }
        if($result1){
            echo "<center><font color='green'><h2><b>แก้ไขข้อมูลสำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=act.php'>";
        }else{
            echo "<center><font color='red'><h2><b>แก้ไขข้อมูลไม่สำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=act.php'>";
        }
?>