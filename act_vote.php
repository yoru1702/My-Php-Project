<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    $id_post=$_POST["id_post"];
    $sql="select * from tb_post,tb_user where tb_post.id_user=tb_user.id_user and tb_post.id_post='$id_post'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $id_user=$read["id_user"];
    $id_act=$read["id_act"];
    $day_post=$read["day_post"];
    $day_post=displaydate($day_post);
    $time_post=$read["time_post"];
    $detail_post=$read["detail_post"];
    $sumvote=$read["sumvote"];
    $name_user=$read["name_user"];
    $sname_user=$read["sname_user"];
    $pic_user=$read["pic_user"];
    if($pic_user==""){
        $pic_user="user.jpg";
    }
    $pic_post=$read["pic_post"];
    if($pic_post==""){
        $pic_post="no.jpg";
    }
    $sql1="select * from tb_vote where id_post='$id_post'";
    $result1=mysqli_query($conn,$sql1);
    $read1=mysqli_fetch_assoc($result1);
    $vote=$read1["vote"];
?>
<form action="act_vote2.php" enctype="multipart/form-data" name="form1" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            <h2><b>โพสต์ของคุณ <?php echo "$name_user $sname_user";?></b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card-img-top"><?php echo "<img src='admin/post/$pic_post' class='rounded img-fluid w-100'>"; ?></div>
                </div>
                <div class="col-sm-6">
                    <div class="card-text"><h4><b>วันที่เข้าร่วม : <?php echo "$day_post"; ?></b></h4></div><hr>
                    <div class="card-text"><h5><b>รายละเอียด : <?php echo "$detail_post"; ?></b></h5></div><br><br><hr>
                    <h5><b>ให้ดาว :</b></h5>
                    <table class="table">
                        <tr>
                            <th><button class="btn btn-lg btn-outline-primary" type="submit" style="border-radius:10px" name="5" id="5"><h1>5<img src="img/star.png" width="30" class="img-fluid"></h1></button></th>
                            <th><button class="btn btn-lg btn-outline-danger" type="submit" style="border-radius:10px" name="4" id="4"><h1>4<img src="img/star.png" width="30" class="img-fluid"></h1></button></th>
                            <th><button class="btn btn-lg btn-outline-success" type="submit" style="border-radius:10px" name="3" id="3"><h1>3<img src="img/star.png" width="30" class="img-fluid"></h1></button></th>
                            <th><button class="btn btn-lg btn-outline-danger" type="submit" style="border-radius:10px" name="2" id="2"><h1>2<img src="img/star.png" width="30" class="img-fluid"></h1></button></th>
                            <th><button class="btn btn-lg btn-outline-primary" type="submit" style="border-radius:10px" name="1" id="1"><h1>1<img src="img/star.png" width="30" class="img-fluid"></h1></button></th>
                        </tr>
                    </table>
                    <input type="hidden" name="id_post" id="id_post" value="<?php echo "$id_post"; ?>">
                    <input type="hidden" name="id_act" id="id_act" value="<?php echo "$id_act"; ?>">
                    <input type="hidden" name="id_vote" id="id_vote" value="<?php echo "$id_vote"; ?>">
                    <input type="hidden" name="sumvote" id="sumvote" value="<?php echo "$sumvote"; ?>">
                </div>
            </div>
        </div>
    </div>
</form>