<?php
    include "head.php";
    include "function_sum.php";
    if($_SESSION["valid_user"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_act=$_REQUEST["id_act"];
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
<div class="bg"><br><br>
    <div class="container">
    <a href="act.php" class="btn btn-lg btn-outline-success" style="border-radius:30px"><< กลับไปยังหน้าเมนู</a><br><br>
        <div class="card" style="border-radius:30px">
            <div class="card-header">
                <center><h2><b><?php echo "$name_act"; ?></b></h2></center>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card-img-top"><?php echo "<img src='admin/act/$pic_act' class='rounded img-fluid w-100'>"; ?></div>
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
                    <td><?php echo "<img src='admin/user/$pic_user' class='rounded-pill' width='100'><br>$name_user $sname_user";?></td>
                    <td><?php echo "$day_post"; ?></td>
                    <td><?php echo "$sumvote"; ?> <img src="img/star.png" width="25" class="img-fluid"></td>
                    <td><img src="img/coin.png" width="25" class="img-fluid"> <?php echo "$coin"; ?></td>
                </tr>
                <?php
                    $coin=$coin-5;
                    $i++;
                    }
                ?>
            </table>
            <?php } ?>
        <?php }else if($status_act=="n"){ ?>
            <a href="#btn_add1" data-bs-toggle="modal" data-bs-target="#btn_add1" style="border-radius:30px;font-size:20px" class="btn btn-lg btn-outline-dark w-100">เข้าร่วมกิจกรรม!!!</a><br><br>
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
                    <th>รายละเอียด</th>
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
                    <td><?php echo "<img src='admin/user/$pic_user' class='rounded-pill' width='100'><br>$name_user $sname_user";?></td>
                    <td><?php echo "$day_post"; ?></td>
                    <td><?php echo "$sumvote"; ?> <img src="img/star.png" width="25" class="img-fluid"></td>
                    <td><?php echo "<a class='btn btn_post btn-primary' id_post='$id_post'>รายละเอียด</a>"; ?></td>
                </tr>
                <?php
                    $i++;
                    }
                ?>
            </table>
            <?php } ?>
        <?php } ?>
    </div><br><br>
</div>
<?php
    include "tel.php";
    include "act_post1.php";
    include "footer.php";
?>
<script>
    $(function(){
        $(".btn_post").on('click',function(){
            $.ajax({
                url:"act_vote.php",
                data:"id_post="+$(this).attr("id_post"),
                type:"POST",
                success:function(result){
                    $("#adm").html('');
                    $("#adm").html(result);
                    $("#am").modal('show');
                },
                error:function(error){
                    alert(error.responsetext);
                },
            });
        });
    });
</script>
<div class="modal fade" id="am" role="dialog">
    <div class="modal-dialog modal-xl" role="document" id="adm"></div>
</div>