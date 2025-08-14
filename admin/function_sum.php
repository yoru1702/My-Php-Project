<?php
    function totalscor($id_ques,$num){
        include "config.inc.php";
        $sql="select sum(answer) as total from tb_answer where id_ques='$id_ques'";
        $result=mysqli_query($conn,$sql);
        $read=mysqli_fetch_assoc($result);
        $num2=mysqli_num_rows($result);
        if($num2==0){
            $sum=0;
        }else{
            $total=$read["total"];
            $sum=$total/$num;
        }
        return $sum;
    }
    function displaydate($x){
        $date_m=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม",);
        $date_array=explode("-",$x);
        $y=$date_array[0]+543;
        $m=$date_array[1]-1;
        $d=$date_array[2];
        $m=$date_m[$m];
        $displaydate="$d $m $y";
        return $displaydate;
    }
    function sumperson($typenum){
        include "config.inc.php";
        if($typenum==1){
            $sql="select * from tb_user";
            $result=mysqli_query($conn,$sql);
            $read=mysqli_fetch_assoc($result);
            $num=mysqli_num_rows($result);
        }else if($typenum==2){
            $sql="select * from tb_admin";
            $result=mysqli_query($conn,$sql);
            $read=mysqli_fetch_assoc($result);
            $num=mysqli_num_rows($result);
        }else if($typenum==3){
            $sql="select * from tb_package where id_pack between '3' and '10'";
            $result=mysqli_query($conn,$sql);
            $read=mysqli_fetch_assoc($result);
            $num=mysqli_num_rows($result);
        }else if($typenum==4){
            $sql="select * from tb_webques";
            $result=mysqli_query($conn,$sql);
            $read=mysqli_fetch_assoc($result);
            $num=mysqli_num_rows($result);
        }
        return $num;
    }
    function sumvote($id_post){
        include "config.inc.php";
        $sql="select sum(vote) as vote from tb_vote where id_post='$id_post'";
        $result=mysqli_query($conn,$sql);
        $read=mysqli_fetch_assoc($result);
        $vote=$read["vote"];
        return $vote;
    }
    function getage($birthday){
        $them=strtotime($birthday);
        return(floor((time()-$them)/31556926));
    }

?>