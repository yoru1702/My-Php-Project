<?php
    session_start();
    include "config.inc.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_user=$_POST["id_user"];
    $del=$_POST["del"];
    $pic_user=$_POST["pic_user"];
    $name_user=$_POST["name_user"];
    $sname_user=$_POST["sname_user"];
    $user=$_POST["user"];
    $pass=$_POST["pass"];
    $born=$_POST["born"];
    $sex=$_POST["sex"];
    $tel=$_POST["tel"];
    $addr=$_POST["addr"];
    $sys=$_POST["sys"];
    $dia=$_POST["dia"];
    $heart=$_POST["heart"];
    $dise=$_POST["dise"];
    $pic_new=$_FILES["pic_new"]["tmp_name"];
    $pic_new_name=$_FILES["pic_new"]["name"];
    if($sys>=160 and $dia<=100){
        $status_mem=7;
        $coin_user=-1;
    }else if($sys>=140 and $dia>=90){
        if($heart>=60 and $heart<100){
            $status_mem=5;
            $coin_user=1;
        }else{
            $status_mem=6;
            $coin_user=0;
        }
    }else if($sys>=120 and $dia>=80){
        if($heart>=60 and $heart<100){
            $status_mem=3;
            $coin_user=3;
        }else{
            $status_mem=4;
            $coin_user=2;
        }
    }else{
        if($heart>=60 and $heart<100){
            $status_mem=1;
            $coin_user=5;
        }else{
            $status_mem=2;
            $coin_user=4;
        }
    }
        $sql1="update tb_user set name_user='$name_user',sname_user='$sname_user',user='$user',pass='$pass',born='$born',sex='$sex',tel='$tel',addr='$addr',sys='$sys',dia='$dia',heart='$heart',dise='$dise' where id_user='$id_user'";
        $result1=mysqli_query($conn,$sql1);
        if($del==1){
            $sql2="update tb_user set pic_user='' where id_user='$id_user'";
            $result2=mysqli_query($conn,$sql2);
            unlink("user/$pic_user");
        }
        if($pic_new!=""){
            $type=strtolower($pic_new_name);
            $ext=strchr($type,".");
            if($ext==".jpg" or $ext==".png" or $ext==".gif"){
                $filename=$id_user.$ext;
                copy($pic_new,"user/$filename");
                $sql3="update tb_user set pic_user='$filename' where id_user='$id_user'";
                $result3=mysqli_query($conn,$sql3);
            }else{
                echo "<center><font color='red'><h2><b>นามสกุลเอกสารไม่ถูกต้อง</b></h2></font></center>";
                echo "<meta http-equiv='refresh' content='1;url=user.php'>";
            }
        }
        if($result1){
            echo "<center><font color='green'><h2><b>แก้ไขข้อมูลสำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=user.php'>";
        }else{
            echo "<center><font color='red'><h2><b>แก้ไขข้อมูลไม่สำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=user.php'>";
        }
?>