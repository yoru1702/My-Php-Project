<?php
    session_start();
    include "config.inc.php";
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
    $pic_user=$_FILES["pic_user"]["tmp_name"];
    $pic_user_name=$_FILES["pic_user"]["name"];
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
    $sql="select * from tb_user where user='$user' or tel='$tel'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==0){
        $sql1="insert into tb_user values(null,'$name_user','$sname_user','$user','$pass','$born','$sex','$tel','$addr','$sys','$dia','$heart','$dise','$coin_user','$status_mem','1','n','','y')";
        $result1=mysqli_query($conn,$sql1);
        if($pic_user!=""){
            $type=strtolower($pic_user_name);
            $ext=strchr($type,".");
            if($ext==".jpg" or $ext==".png" or $ext==".gif"){
                $sql2="select max(id_user) as id_user from tb_user";
                $result2=mysqli_query($conn,$sql2);
                $read2=mysqli_fetch_assoc($result2);
                $id_user=$read2["id_user"];
                $filename=$id_user.$ext;
                copy($pic_user,"admin/user/$filename");
                $sql3="update tb_user set pic_user='$filename' where id_user='$id_user'";
                $result3=mysqli_query($conn,$sql3);
            }else{
                echo "<center><font color='red'><h2><b>นามสกุลเอกสารไม่ถูกต้อง</b></h2></font></center>";
                echo "<meta http-equiv='refresh' content='1;url=regis.php'>";
            }
        }
        if($result1){
            echo "<center><font color='green'><h2><b>สมัครสมาชิกสำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=check_user.php?user=$user&pass=$pass&url=1'>";
        }else{
            echo "<center><font color='red'><h2><b>สมัครสมาชิกไม่สำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=regis.php'>";
        }
    }else{
        echo "<center><font color='red'><h2><b>สมัครสมาชิกไม่สำเร็จเนื่องจากมี Username หรือเบอร์โทรติดต่อในระบบนี้แล้ว</b></h2></font></center>";
        echo "<meta http-equiv='refresh' content='2;url=regis.php'>";
    }
?>