<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_act=$_POST["id_act"];
    $sql="select * from tb_act where id_act='$id_act'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $name_act=$read["name_act"];
    $detail_act=$read["detail_act"];
    $coin=$read["coin"];
    $status_act=$read["status_act"];
    if($status_act=="n"){
        $sa="<b class='text-success'>เริ่มแล้ว!!!</b>";
    }else if($status_act=="y"){
        $sa="<b class='text-danger'>หมดเวลา!!!</b>";
    }
    $day_in=$read["day_in"];
    $day_in=displaydate($day_in);
    $day_out=$read["day_out"];
    $day_out=displaydate($day_out);
    $pic_act=$read["pic_act"];
    if($pic_act==""){
        $pic_act="no.jpg";
    }
    $sql2="select * from tb_post,tb_user where tb_post.id_user=tb_user.id_user and tb_post.id_act='$id_act' order by sumvote desc";
    $result2=mysqli_query($conn,$sql2);
    $num2=mysqli_num_rows($result2);
?>
<form action="act_confirm.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            <h2><b><?php echo "$name_act";?></b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="card" style="border-radius:30px">
                    <div class="card-header">
                        <center><h2><b><?php echo "$name_act"; ?></b></h2></center>
                    </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card-img-top"><?php echo "<img src='act/$pic_act' class='rounded img-fluid w-100'>"; ?></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card-body">
                            <div class="card-text"><h5><b>วันที่เริ่ม : <b class="text-success"><?php echo "$day_in"; ?></b></b></h5></div>
                            <div class="card-text"><h5><b>วันที่สิ้นสุด : <b class="text-danger"><?php echo "$day_out"; ?></b></b></h5></div><hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div align="left"><h5><b>รางวัล : <b class="text-success"><?php echo "$coin"; ?></b>  <img src="img/coin.png" width="25" class="img-fluid"></b></h5></div>
                                </div>
                                <div class="col-sm-6">
                                    <div align="right"><h5><b>สถานะ : <?php echo "$sa"; ?></b></h5></div>
                                </div>
                            </div><hr>
                            <div class="card-title"><h4><b><?php echo "$detail_act"; ?></b></h4></div>
                        </div>
                    </div>
                </div>
            </div><br>
            <?php if($status_act=="y"){ ?>
                <?php
                    if($num2==0){
                        echo "<br><br><br><br><center><h2><b class='text-danger'>ไม่มีผู้เข้าร่วมกิจกรรม</b></h2></center><br><br><br><br>";
                    }else{
                ?><br>
                <center><h2><b class="text-success">ผู้ชนะทั้ง 3 ท่าน!!!</b></h2></center>
                <table class="table table-hover table-striped">
                    <tr class="h5" align="center">
                        <th>จำนวน</th>
                        <th>ผู้เข้าร่วม</th>
                        <th>วันที่เข้าร่วม</th>
                        <th>คะแนน</th>
                        <th>รางวัล</th>
                    </tr>
                    <?php
                        $i=1;
                        $sql2="select * from tb_post,tb_user where tb_post.id_user=tb_user.id_user and tb_post.id_act='$id_act' order by sumvote desc limit 0,3";
                        $result2=mysqli_query($conn,$sql2); 
                        while($read2=mysqli_fetch_assoc($result2)){
                            $id_post=$read2["id_post"];
                            $id_user=$read2["id_user"];
                            $id_act=$read2["id_act"];
                            $day_post=$read2["day_post"];
                            $day_post=displaydate($day_post);
                            $time_post=$read2["time_post"];
                            $detail_post=$read2["detail_post"];
                            $sumvote=$read2["sumvote"];
                            $name_user=$read2["name_user"];
                            $coin_user=$read2["coin_user"];
                            $sname_user=$read2["sname_user"];
                            $pic_user=$read2["pic_user"];
                            if($pic_user==""){
                                $pic_user="user.jpg";
                            }
                            $pic_post=$read2["pic_post"];
                            if($pic_post==""){
                                $pic_post="no.jpg";
                            }
                            $vote=sumvote($id_post);
                    ?>
                    <tr align="center">
                        <td><?php echo "$i"; ?></td>
                        <td><?php echo "<img src='user/$pic_user' class='rounded-pill' width='100'><br>$name_user $sname_user";?></td>
                        <td><?php echo "$day_post"; ?></td>
                        <td><?php echo "$sumvote"; ?> <img src="img/star.png" width="25" class="img-fluid"></td>
                        <td><img src="img/coin.png" width="25" class="img-fluid"><input type="text" name="coin[]" id="coin[]" value="<?php echo "$coin";?>" class="form-control" style="width:45px" readonly></td>
                        <input type="hidden" name="id_user[]" id="id_user[]" value="<?php echo "$id_user";?>">
                        <input type="hidden" name="coin_user[]" id="coin_user[]" value="<?php echo "$coin_user";?>">
                    </tr>
                    <?php
                        $coin=$coin-5;
                        $i++;
                        }
                    ?>
                </table>
                <?php } ?>
            <?php }else if($status_act=="n"){ ?>
                <?php
                    if($num2==0){
                        echo "<br><br><br><br><center><h2><b class='text-danger'>ยังไม่มีผู้เข้าร่วมกิจกรรม</b></h2></center><br><br><br><br>";
                    }else{
                ?>
                <table class="table table-hover table-striped">
                    <tr class="h5" align="center">
                        <th>จำนวน</th>
                        <th>ผู้เข้าร่วม</th>
                        <th>วันที่เข้าร่วม</th>
                        <th>คะแนน</th>
                    </tr>
                    <?php
                        $i=1;
                        while($read2=mysqli_fetch_assoc($result2)){
                            $id_post=$read2["id_post"];
                            $id_user=$read2["id_user"];
                            $id_act=$read2["id_act"];
                            $day_post=$read2["day_post"];
                            $day_post=displaydate($day_post);
                            $time_post=$read2["time_post"];
                            $detail_post=$read2["detail_post"];
                            $sumvote=$read2["sumvote"];
                            $name_user=$read2["name_user"];
                            $sname_user=$read2["sname_user"];
                            $pic_user=$read2["pic_user"];
                            if($pic_user==""){
                                $pic_user="user.jpg";
                            }
                            $pic_post=$read2["pic_post"];
                            if($pic_post==""){
                                $pic_post="no.jpg";
                            }
                            $vote=sumvote($id_post);
                    ?>
                    <tr align="center">
                        <td><?php echo "$i"; ?></td>
                        <td><?php echo "<img src='user/$pic_user' class='rounded-pill' width='100'><br>$name_user $sname_user";?></td>
                        <td><?php echo "$day_post"; ?></td>
                        <td><?php echo "$sumvote"; ?> <img src="img/star.png" width="25" class="img-fluid"></td>
                    </tr>
                    <?php
                        $i++;
                        }
                    ?>
                </table>
                <?php } ?>
            <?php } ?>
            </div>
        </div>
        <?php if($status_act=="y"){?>
            <div class="modal-footer bg-1">
                <center>
                    <button class="btn btn-lg btn-success" type="submit" style="border-radius:30px">อนุมัติแต้ม</button>&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-lg btn-danger" type="reset" style="border-radius:30px">ยกเลิก</button>
                </center>
            </div>
        <?php } ?>
    </div>
</form>