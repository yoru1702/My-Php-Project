<?php
    session_start();
    include "config.inc.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_pack=$_POST["id_pack"];
    $name_ad=$_POST["name_ad"];
    $sname_ad=$_POST["sname_ad"];
    $user_ad=$_POST["user_ad"];
    $pass_ad=$_POST["pass_ad"];
    $tel_ad=$_POST["tel_ad"];
    $type_ad=$_POST["type_ad"];
    $pic_ad=$_FILES["pic_ad"]["tmp_name"];
    $pic_ad_name=$_FILES["pic_ad"]["name"];
        $sql1="insert into tb_admin values(null,'$id_pack','$name_ad','$sname_ad','$user_ad','$pass_ad','$tel_ad','$type_ad','')";
        $result1=mysqli_query($conn,$sql1);
        if($pic_ad!=""){
            $type=strtolower($pic_ad_name);
            $ext=strchr($type,".");
            if($ext==".jpg" or $ext==".png" or $ext==".gif"){
                $sql2="select max(id_ad) as id_ad from tb_admin";
                $result2=mysqli_query($conn,$sql2);
                $read2=mysqli_fetch_assoc($result2);
                $id_ad=$read2["id_ad"];
                $filename=$id_ad.$ext;
                copy($pic_ad,"admin/$filename");
                $sql3="update tb_admin set pic_ad='$filename' where id_ad='$id_ad'";
                $result3=mysqli_query($conn,$sql3);
            }else{
                echo "<center><font color='red'><h2><b>นามสกุลเอกสารไม่ถูกต้อง</b></h2></font></center>";
                echo "<meta http-equiv='refresh' content='1;url=admin.php'>";
            }
        }
        if($result1){
            echo "<center><font color='green'><h2><b>เพิ่มข้อมูลสำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=admin.php'>";
        }else{
            echo "<center><font color='red'><h2><b>เพิ่มข้อมูลไม่สำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=admin.php'>";
        }
?>