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
    $day_out=$read["day_out"];
    $coin=$read["coin"];
    $pic_act=$read["pic_act"];
?>
<form action="act_edit2.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            &nbsp;<h2><b>แก้ไขกิจกรรมออนไลน์</b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-4 col-12 py-1">
                    <label>หัวข้อกิจกรรม :</label>
                    <input type="text" value="<?php echo "$name_act";?>" class="form-control" name="name_act" id="name_act" placeholder="หัวข้อกิจกรรม" required>
                </div>
                <div class="col-sm-4 col-12 py-1">
                    <label>วันที่สิ้นสุด :</label>
                    <input type="date" value="<?php echo "$day_out";?>" class="form-control" maxlength="10" name="day_out" id="day_out" placeholder="วันที่สิ้นสุด" required>
                </div>
                <div class="col-sm-4 col-12 py-1">
                    <label>รางวัล(แต้ม) :</label>
                    <input type="text" value="<?php echo "$coin";?>" class="form-control" name="coin" id="coin" placeholder="รางวัล(แต้ม)" required>
                </div>
            </div>
            <div class="row">
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>รายละเอียดกิจกรรม :</label>
                    <textarea type="text" class="form-control" rows="5" name="detail_act" id="detail_act" placeholder="กรอกรายละเอียดกิจกรรม" required><?php echo "$detail_act";?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>รูปกิจกรรม :</label>
                    <?php if($pic_act!=""){?>
                        <center>
                            <input type="checkbox" name="del" id="del" value="1">&nbsp;ลบ&nbsp;
                            <td><?php echo "<img src='act/$pic_act' class='rounded-pill' width='200'>";?></td>
                        </center>
                    <?php }else{?>
                        <input type="file" class="form-control" name="pic_new" id="pic_new">
                        <font color="red">[เฉพาะไฟล์ .jpg .png และไฟล์ .gif เท่านั้น!!!!]</font>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-1">
            <center>
                <button class="btn btn-lg btn-warning" type="submit" style="border-radius:30px">แก้ไขข้อมูล</button>&nbsp;&nbsp;&nbsp;
                <input type="hidden" name="id_act" id="id_act" value="<?php echo "$id_act";?>">
                <input type="hidden" name="pic_act" id="pic_act" value="<?php echo "$pic_act";?>">
                <button class="btn btn-lg btn-danger" type="reset" style="border-radius:30px">ยกเลิก</button>
            </center>
        </div>
    </div>
</form>