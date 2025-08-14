<?php
    session_start();
    include "config.inc.php";
    include "check_word.php";
    $id_his=$_POST["id_his"];
    $id_user=$_POST["id_user"];
    $name_user=$_POST["name_user"];
    $sname_user=$_POST["sname_user"];
    $detail_chat=$_POST["detail_chat"];
    $day_chat=date("Y-m-d");
    $time_chat=date("H:i:s");
    $video_name='';
    $video_mime='';
    if(isset($_FILES['video_chat']) && $_FILES['video_chat']['error'] == 0){
        $video_name = $_FILES['video_chat']['name'];
        $video_tmp_name = $_FILES['video_chat']['tmp_name'];
        $video_mime = $_FILES['video_chat']['type'];
        $upload_dir = 'uploads/';
        $upload_file = $upload_dir.basename($video_name);
        if(move_uploaded_file($video_tmp_name,$upload_file)){

        } else{
            exit();
        }
    }
    $replace="<font color=red>***</font>";
    for($i=1;$i<count($rudeword);$i++){
        $detail_chat=str_replace(trim($rudeword[$i]),$replace,$detail_chat);
    }
    $sql="insert into tb_chat values(null,'$id_his','$_SESSION[valid_admin]','$day_chat','$time_chat','$detail_chat','2','n','$video_name','$video_mime')";
    $result=mysqli_query($conn,$sql);
    echo "<meta http-equiv='refresh' content='0;url=doc_h.php?id_his=$id_his&id_user=$id_user&name_user=$name_user&sname_user=$sname_user'>";
?>