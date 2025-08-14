<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_news=$_POST["id_news"];
    $sql="select * from tb_news where id_news='$id_news'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $head_news=$read["head_news"];
    $detail_news=$read["detail_news"];
    $count_news=$read["count_news"];
    $day_up=$read["day_up"];
    $day_up=displaydate($day_up);
    $pic_news=$read["pic_news"];
    if($pic_news==""){
        $pic_news="no.jpg";
    }
    $count_news++;
    $sql1="update tb_news set count_news='$count_news' where id_news='$id_news'";
    $result1=mysqli_query($conn,$sql1);
    $sql2="select * from tb_comment,tb_user where tb_comment.id_user=tb_user.id_user and tb_comment.id_news='$id_news' order by id_com desc";
    $result2=mysqli_query($conn,$sql2);
    $num2=mysqli_num_rows($result2);
?>
<form action="user_add2.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            <center><h2><b><?php echo "$head_news"; ?></b></h2></center>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="card" style="border-radius:30px">
                <div class="card-header">
                    <center><h2><b><?php echo "$head_news"; ?></b></h2></center>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card-img-top"><?php echo "<img src='news/$pic_news' class='rounded img-fluid w-100'>"; ?></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card-body">
                            <div class="card-title"><h4><b>อัปโหลดวันที่ : <?php echo "$day_up"; ?></b></h4></div><hr>
                            <div class="card-text"><h5><b>รายละเอียด : <?php echo "$detail_news"; ?></b></h5></div><br><br><br><br>
                            <div align="right"><span class="badge bg-success"><h6><b>ยอดเข้าชม : <?php echo "$count_news"; ?> ครั้ง</b></h6></span></div>
                        </div>
                    </div>
                </div>
            </div><br>
            <h5><b>ความคิดเห็นจำนวน <?php echo "$num2"; ?> รายการ</b></h5>
            <?php
                $i=1;
                while($read2=mysqli_fetch_assoc($result2)){
                    $id_com=$read2["id_com"];
                    $id_user=$read2["id_user"];
                    $id_news=$read2["id_news"];
                    $day_com=$read2["day_com"];
                    $day_com=displaydate($day_com);
                    $time_com=$read2["time_com"];
                    $detail_com=$read2["detail_com"];
                    $name_user=$read2["name_user"];
                    $sname_user=$read2["sname_user"];
                    $pic_user=$read2["pic_user"];
                    if($pic_user==""){
                        $pic_user="user.jpg";
                    }
            ?>
            <div class="d-flex md-3">
                <?php echo "<img src='user/$pic_user' class='rounded-pill' width='50' height='50'>"; ?>&nbsp;&nbsp;&nbsp;
                <div class="rounded-3 px-3 py-2 border" style="background:#fff">
                    <strong><?php echo "$name_user $sname_user"; ?></strong>
                    <small><?php echo "$day_com $time_com"; ?></small>
                    <h4><?php echo "$detail_com"; ?></h4>
                </div>
            </div><br>
            <?php
                $i++;
                }
            ?>
        </div>
    </div>
</form>