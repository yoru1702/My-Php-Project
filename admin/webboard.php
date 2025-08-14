<?php
    $type=$_POST["type"];
    if($type==""){
        $sql="select * from tb_webques,tb_user where tb_webques.id_user=tb_user.id_user order by id_wques desc";
    }else{
        $sql="select * from tb_webques,tb_user where tb_webques.id_user=tb_user.id_user and type_ques='$type' order by id_wques desc";
    }
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    $sql1="select * from tb_admin where type_ad='1'";
    $result1=mysqli_query($conn,$sql1);
    $read1=mysqli_fetch_assoc($result1);
    $pic_ad=$read1["pic_ad"];
    if($pic_ad==""){
        $pic_ad="admin.jpg";
    }
    if($type==1){
        $tp="สุขภาพ";
    }else if($type==2){
        $tp="เวชสำอาง";
    }else if($type==3){
        $tp="ทั่วไป";
    }else{
        $tp="ทั้งหมด";
    }
?>
<div class="container">
    <center><h2><b>สังคมออนไลน์</b></h2></center><br>
    <form action="online.php" method="post">
        <div class="input-group">
            <span class="input-group-text">ค้นหา</span>
            <select name="type" id="type" class="form-select" required>
                <option value="">==เลือกหมวดหมู่==</option>
                <option value="1">สุขภาพ</option>
                <option value="2">เวชสำอาง</option>
                <option value="3">ทั่วไป</option>
            </select>
            <button type="submit" class="btn btn-primary">ค้นหา</button>
        </div>
    </form><br>
    <div class="card p-4" style="border-radius:30px">
        <div class="card-body">
            <center><h2><b><?php echo "$tp"; ?></b></h2></center><hr><br>
            <h5><b>โพสต์หน้าฟีด :</b></h5>
            <?php 
                if($num==0){
                    echo "<center><h2><b><font color='red'>ไม่พบข้อมูล</font></b></h2></center>";
                }else{
                    echo "<center><h2><b><font color='blue'>ข้อมูล $num รายการ</font></b></h2></center>";
            ?><br>
            <?php
                $no=1;
                while($read=mysqli_fetch_assoc($result)){
                    $id_wques=$read["id_wques"];
                    $id_user=$read["id_user"];
                    $day_ques=$read["day_ques"];
                    $day_ques=displaydate($day_ques);
                    $time_ques=$read["time_ques"];
                    $detail_ques=$read["detail_ques"];
                    $type_ques=$read["type_ques"];
                    $name_user=$read["name_user"];
                    $sname_user=$read["sname_user"];
                    $pic_user=$read["pic_user"];
                    if($pic_user==""){
                        $pic_user="user.jpg";
                    }
                    $sql2="select * from tb_like where id_wques='$id_wques' and id_user='$_SESSION[valid_user]'";
                    $result2=mysqli_query($conn,$sql2);
                    $read2=mysqli_fetch_assoc($result2);
                    $status_like=$read2["status_like"];
                    $sql3="select * from tb_like where id_wques='$id_wques' and status_like='y'";
                    $result3=mysqli_query($conn,$sql3);
                    $num3=mysqli_num_rows($result3);
                    $sql4="select * from tb_webans where id_wques='$id_wques' order by id_wans desc";
                    $result4=mysqli_query($conn,$sql4);
                    $num4=mysqli_num_rows($result4);
            ?>
            <div class="col-lg-12 co-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex md-3">
                            <?php echo "<img src='user/$pic_user' class='rounded-pill' width='50' height='50'>"; ?>&nbsp;&nbsp;&nbsp;
                            <div class="rounded-3 px-3 py-2" style="background:#fff">
                                <strong><?php echo "$name_user $sname_user"; ?></strong>
                                <small><?php echo "$day_ques $time_ques"; ?></small>
                                <td><?php echo "<a class='btn btn_wques_edit btn-warning' id_wques='$id_wques'>แก้ไข</a>";?></td>
                                <td>
                                    <?php if($num4>0){?>
                                    <td><?php echo "<a class='btn btn-danger'>ไม่สามารถลบได้</a>";?></td>
                                    <?php }else{?>
                                        <?php echo "<a class='btn btn-danger' href='wques_del.php?id_wques=$id_wques' onclick=\"return confirm('ต้องการลบข้อมูลใช่หรือไม่')\">ลบ</a>";?></td>
                                    <?php } ?>
                                <h4><?php echo "$detail_ques"; ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-lg btn-dark w-25" type="submit"><?php echo "$num3";?> Like</button>
                        <button class="btn btn-lg btn-outline-dark w-50" type="submit" onclick="showHideTable('block',<?php echo ''.$no.''; ?>)">Comment</button>
                        <button class="btn btn-lg btn-outline-dark w-25" type="submit" onclick="showHideTable('none',<?php echo ''.$no.''; ?>)">Hide Comment</button>
                    </div>
                    <div class="container" id="<?php echo "".$no.""; ?>" style="display:none;" slice><br>
                        <?php
                            $i=1;
                            while($read4=mysqli_fetch_assoc($result4)){
                                $id_wans=$read4["id_wans"];
                                $id_user=$read4["id_user"];
                                $id_wques=$read4["id_wques"];
                                $day_ans=$read4["day_ans"];
                                $time_ans=$read4["time_ans"];
                                $detail_ans=$read4["detail_ans"];
                                $type_ans=$read4["type_ans"];
                                if($type_ans==1){
                                    $sql5="select * from tb_user where id_user='$_SESSION[valid_user]'";
                                    $result5=mysqli_query($conn,$sql5);
                                    $read5=mysqli_fetch_assoc($result5);
                                    $name_user=$read5["name_user"];
                                    $sname_user=$read5["sname_user"];
                                    $pic_user=$read5["pic_user"];
                                    if($pic_user==""){
                                        $pic_user="user.jpg";
                                    }
                                }
                        ?>
                        <?php if($type_ans==1){ ?>
                            <div class="d-flex md-3">
                                <?php echo "<img src='user/$pic_user' class='rounded-pill' width='50' height='50'>"; ?>&nbsp;&nbsp;&nbsp;
                                <div class="rounded-3 px-3 py-2 border" style="background:#e2fff3">
                                    <strong><?php echo "$name_user $sname_user"; ?></strong>
                                    <small><?php echo "$day_ans $time_ans"; ?></small>
                                    <td><?php echo "<a class='btn btn_wans_edit btn-warning' id_wans='$id_wans'>แก้ไข</a>";?></td>
                                    <td><?php echo "<a class='btn btn-danger' href='wans_del.php?id_wans=$id_wans' onclick=\"return confirm('ต้องการลบข้อมูลใช่หรือไม่')\">ลบ</a>";?></td>
                                    <h4><?php echo "$detail_ans"; ?></h4>
                                </div>
                            </div><br>
                        <?php }else if($type_ans==2){ ?>
                            <div class="d-flex md-3">
                                <?php echo "<img src='admin/$pic_ad' class='rounded-pill' width='50' height='50'>"; ?>&nbsp;&nbsp;&nbsp;
                                <div class="rounded-3 px-3 py-2 border" style="background:#ffe2ff">
                                    <strong>Admin</strong>
                                    <small><?php echo "$day_ans $time_ans"; ?></small>
                                    <td><?php echo "<a class='btn btn_wans_edit btn-warning' id_wans='$id_wans'>แก้ไข</a>";?></td>
                                    <td><?php echo "<a class='btn btn-danger' href='wans_del.php?id_wans=$id_wans' onclick=\"return confirm('ต้องการลบข้อมูลใช่หรือไม่')\">ลบ</a>";?></td>
                                    <h4><?php echo "$detail_ans"; ?></h4>
                                </div>
                            </div><br>
                        <?php } ?>
                        <?php
                            $i++;
                            }
                        ?>
                        <h5><b>ความคิดเห็นจำนวน <?php echo "$num4"; ?> รายการ</b></h5>
                        <?php if($_SESSION["valid_user"]!=""){ ?>
                            <form action="webans.php" name="form1" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="detail_ans" id="detail_ans" placeholder="แสดงความคิดเห็น...." required>
                                    <button class="btn btn-lg btn-success" type="submit">ส่ง
                                        <input type="hidden" name="id_wques" id="id_wques" value="<?php echo "$id_wques"; ?>">
                                        <input type="hidden" name="type_ques" id="type_ques" value="<?php echo "$type_ques"; ?>">
                                    </button>
                                </div>
                            </form><br>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php
                $no++;
                }}
            ?>
        </div>
    </div>
</div>
<script>
    $(function(){
        $(".btn_wques_edit").on('click',function(){
            $.ajax({
                url:"wques_edit.php",
                data:"id_wques="+$(this).attr("id_wques"),
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
    $(function(){
        $(".btn_wans_edit").on('click',function(){
            $.ajax({
                url:"wans_edit.php",
                data:"id_wans="+$(this).attr("id_wans"),
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