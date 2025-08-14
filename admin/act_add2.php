<?php
    session_start();
    include "config.inc.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $name_act=$_POST["name_act"];
    $detail_act=$_POST["detail_act"];
    $day_in=date("Y-m-d");
    $day_out=$_POST["day_out"];
    $coin=$_POST["coin"];
    $pic_act=$_FILES["pic_act"]["tmp_name"];
    $pic_act_name=$_FILES["pic_act"]["name"];
        $sql1="insert into tb_act values(null,'$name_act','$detail_act','$day_in','$day_out','$coin','n','')";
        $result1=mysqli_query($conn,$sql1);
        if($pic_act!=""){
            $type=strtolower($pic_act_name);
            $ext=strchr($type,".");
            if($ext==".jpg" or $ext==".png" or $ext==".gif"){
                $sql2="select max(id_act) as id_act from tb_act";
                $result2=mysqli_query($conn,$sql2);
                $read2=mysqli_fetch_assoc($result2);
                $id_act=$read2["id_act"];
                $filename=$id_act.$ext;
                copy($pic_act,"act/$filename");
                $sql3="update tb_act set pic_act='$filename' where id_act='$id_act'";
                $result3=mysqli_query($conn,$sql3);
            }else{
                echo "<center><font color='red'><h2><b>นามสกุลเอกสารไม่ถูกต้อง</b></h2></font></center>";
                echo "<meta http-equiv='refresh' content='1;url=act.php'>";
            }
        }
        if($result1){
            echo "<center><font color='green'><h2><b>เพิ่มข้อมูลสำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=act.php'>";
        }else{
            echo "<center><font color='red'><h2><b>เพิ่มข้อมูลไม่สำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=act.php'>";
        }
?>