<?php
    session_start();
    include "config.inc.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_pro=$_POST["id_pro"];
    $del=$_POST["del"];
    $pic_pro=$_POST["pic_pro"];
    $name_pro=$_POST["name_pro"];
    $price_pro=$_POST["price_pro"];
    $num_pro=$_POST["num_pro"];
    $coin_pro=$_POST["coin_pro"];
    $detail_pro=$_POST["detail_pro"];
    $type_ques=$_POST["type_ques"];
    $pic_new=$_FILES["pic_new"]["tmp_name"];
    $pic_new_name=$_FILES["pic_new"]["name"];
        $sql1="update tb_product set name_pro='$name_pro',price_pro='$price_pro',num_pro='$num_pro',coin_pro='$coin_pro',detail_pro='$detail_pro',type_ques='$type_ques' where id_pro='$id_pro'";
        $result1=mysqli_query($conn,$sql1);
        if($del==1){
            $sql2="update tb_product set pic_pro='' where id_pro='$id_pro'";
            $result2=mysqli_query($conn,$sql2);
            unlink("product/$pic_pro");
        }
        if($pic_new!=""){
            $type=strtolower($pic_new_name);
            $ext=strchr($type,".");
            if($ext==".jpg" or $ext==".png" or $ext==".gif"){
                $filename=$id_pro.$ext;
                copy($pic_new,"product/$filename");
                $sql3="update tb_product set pic_pro='$filename' where id_pro='$id_pro'";
                $result3=mysqli_query($conn,$sql3);
            }else{
                echo "<center><font color='red'><h2><b>นามสกุลเอกสารไม่ถูกต้อง</b></h2></font></center>";
                echo "<meta http-equiv='refresh' content='1;url=product.php'>";
            }
        }
        if($result1){
            echo "<center><font color='green'><h2><b>แก้ไขข้อมูลสำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=product.php'>";
        }else{
            echo "<center><font color='red'><h2><b>แก้ไขข้อมูลไม่สำเร็จ</b></h2></font></center>";
            echo "<meta http-equiv='refresh' content='1;url=product.php'>";
        }
?>