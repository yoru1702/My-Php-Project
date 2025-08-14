<?php
    session_start();
    include "config.inc.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_ad=$_POST["id_ad"];
    $del=$_POST["del"];
    $pic_ad=$_POST["pic_ad"];
    $id_pack=$_POST["id_pack"];
    $name_ad=$_POST["name_ad"];
    $sname_ad=$_POST["sname_ad"];
    $user_ad=$_POST["user_ad"];
    $pass_ad=$_POST["pass_ad"];
    $tel_ad=$_POST["tel_ad"];
    $type_ad=$_POST["type_ad"];
    $pic_new=$_FILES["pic_new"]["tmp_name"];
    $pic_new_name=$_FILES["pic_new"]["name"];
        $sql1="update tb_admin set id_pack='$id_pack',name_ad='$name_ad',sname_ad='$sname_ad',user_ad='$user_ad',pass_ad='$pass_ad',tel_ad='$tel_ad',type_ad='$type_ad' where id_ad='$id_ad'";
        $result1=mysqli_query($conn,$sql1);
        if($del==1){
            $sql2="update tb_admin set pic_ad='' where id_ad='$id_ad'";
            $result2=mysqli_query($conn,$sql2);
            unlink("admin/$pic_ad");
        } 
        if($pic_new!=""){
            $type=strtolower($pic_new_name);
            $ext=strchr($type,".");
            if($ext==".jpg" or $ext==".png" or $ext==".gif"){
                $filename=$id_ad.$ext;
                copy($pic_new,"admin/$filename");
                $sql3="update tb_admin set pic_ad='$filename' where id_ad='$id_ad'";
                $result3=mysqli_query($conn,$sql3);
            }else{
                echo "<center><font color='red'><h2><b>นามสกุลเอกสารไม่ถูกต้อง</b></h2></font></center>";
                echo "<meta http-equiv='refresh' content='1;url=admin.php'>";
            }
        }
        if($result1){
            echo "<center><font color='green'><h2><b>แก้ไขข้อมูลสำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=admin.php'>";
        }else{
            echo "<center><font color='red'><h2><b>แก้ไขข้อมูลไม่สำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=admin.php'>";
        }
?>