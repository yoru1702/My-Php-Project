<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_pr=$_POST["id_pr"];
    $sql="select * from tb_pr where id_pr='$id_pr'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $pic_pr=$read["pic_pr"];
    $name_pr=$read["name_pr"];
    $tel_pr=$read["tel_pr"];
    $price_pr=$read["price_pr"];
    $url_pr=$read["url_pr"];
    $detail_pr=$read["detail_pr"];
    $type_ques=$read["type_ques"];
?>
<form action="pr_edit2.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            &nbsp;<h2><b>แก้ไขป้ายโฆษณา</b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6 col-12 py-1">
                    <label>ผู้ลงโฆษณา :</label>
                    <input type="text" value="<?php echo "$name_pr";?>" class="form-control" name="name_pr" id="name_pr" placeholder="ผู้ลงโฆษณา" required>
                </div>
                <div class="col-sm-6 col-12 py-1">
                    <label>เบอร์โทรติดต่อ :</label>
                    <input type="text" value="<?php echo "$tel_pr";?>" maxlength="10" class="form-control" name="tel_pr" id="tel_pr" placeholder="เบอร์โทรติดต่อ" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-12 py-1">
                    <label>URL.... :</label>
                    <input type="text" value="<?php echo "$url_pr";?>" class="form-control" name="url_pr" id="url_pr" placeholder="http:........" required>
                </div>
                <div class="col-sm-6 col-12 py-1">
                    <label>ประเภทป้ายโฆษณา :</label>
                    <select name="type_ques" id="type_ques" class="form-select" required>
                        <option value="">==เลือกประเภทป้ายโฆษณา==</option>
                        <option value="1" <?php if($type_ques==1){echo "selected";}?>>สุขภาพ</option>
                        <option value="2" <?php if($type_ques==2){echo "selected";}?>>เวชสำอาง</option>
                        <option value="3" <?php if($type_ques==3){echo "selected";}?>>ทั่วไป</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>รายละเอียดป้ายโฆษณา :</label>
                    <textarea type="text" class="form-control" rows="5" name="detail_pr" id="detail_pr" placeholder="กรอกรายละเอียดป้ายโฆษณา" required><?php echo "$detail_pr";?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>รูปป้ายโฆษณา :</label>
                    <?php if($pic_pr!=""){?>
                        <center>
                            <input type="checkbox" name="del" id="del" value="1">&nbsp;ลบ&nbsp;
                            <td><?php echo "<img src='pr/$pic_pr' class='rounded-pill' width='200'>";?></td>
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
                <input type="hidden" name="id_pr" id="id_pr" value="<?php echo "$id_pr";?>">
                <input type="hidden" name="pic_pr" id="pic_pr" value="<?php echo "$pic_pr";?>">
                <button class="btn btn-lg btn-danger" type="reset" style="border-radius:30px">ยกเลิก</button>
            </center>
        </div>
    </div>
</form>