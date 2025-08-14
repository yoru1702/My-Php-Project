<?php
    session_start();
    include "config.inc.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $name_pro=$_POST["name_pro"];
    $price_pro=$_POST["price_pro"];
    $num_pro=$_POST["num_pro"];
    $coin_pro=$_POST["coin_pro"];
    $detail_pro=$_POST["detail_pro"];
    $type_ques=$_POST["type_ques"];
    $pic_pro=$_FILES["pic_pro"]["tmp_name"];
    $pic_pro_name=$_FILES["pic_pro"]["name"];
        $sql1="insert into tb_product values(null,'$name_pro','$price_pro','$num_pro','$coin_pro','$detail_pro','$type_ques','')";
        $result1=mysqli_query($conn,$sql1);
        if($pic_pro!=""){
            $type=strtolower($pic_pro_name);
            $ext=strchr($type,".");
            if($ext==".jpg" or $ext==".png" or $ext==".gif"){
                $sql2="select max(id_pro) as id_pro from tb_product";
                $result2=mysqli_query($conn,$sql2);
                $read2=mysqli_fetch_assoc($result2);
                $id_pro=$read2["id_pro"];
                $filename=$id_pro.$ext;
                copy($pic_pro,"product/$filename");
                $sql3="update tb_product set pic_pro='$filename' where id_pro='$id_pro'";
                $result3=mysqli_query($conn,$sql3);
            }else{
                echo "<center><font color='red'><h2><b>นามสกุลเอกสารไม่ถูกต้อง</b></h2></font></center>";
                echo "<meta http-equiv='refresh' content='1;url=product.php'>";
            }
        }
        if($result1){
            echo "<center><font color='green'><h2><b>เพิ่มข้อมูลสำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=product.php'>";
        }else{
            echo "<center><font color='red'><h2><b>เพิ่มข้อมูลไม่สำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=product.php'>";
        }
?>