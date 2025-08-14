<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_pro=$_POST["id_pro"];
    $sql="select * from tb_product where id_pro='$id_pro'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $pic_pro=$read["pic_pro"];
    $name_pro=$read["name_pro"];
    $price_pro=$read["price_pro"];
    $num_pro=$read["num_pro"];
    $coin_pro=$read["coin_pro"];
    $detail_pro=$read["detail_pro"];
    $type_ques=$read["type_ques"];
?>
<form action="pro_edit2.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            &nbsp;<h2><b>แก้ไขสินค้า</b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-4 col-12 py-1">
                    <label>สินค้า :</label>
                    <input type="text" value="<?php echo "$name_pro";?>" class="form-control" name="name_pro" id="name_pro" placeholder="กรอกชื่อ" required>
                </div>
                <div class="col-sm-4 col-12 py-1">
                    <label>ราคาสินค้า :</label>
                    <input type="text" value="<?php echo "$price_pro";?>" class="form-control" name="price_pro" id="price_pro" placeholder="กรอกนามสกุล" required>
                </div>
                <div class="col-sm-4 col-12 py-1">
                    <label>จำนวนสินค้า :</label>
                    <input type="text" value="<?php echo "$num_pro";?>" class="form-control" name="num_pro" id="num_pro" placeholder="จำนวนสินค้า" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-12 py-1">
                    <label>จำนวนแต้ม :</label>
                    <input type="text" value="<?php echo "$num_pro";?>" class="form-control" name="coin_pro" id="coin_pro" placeholder="จำนวนแต้ม" required>
                </div>
                <div class="col-sm-6 col-12 py-1">
                    <label>ประเภทสินค้า :</label>
                    <select name="type_ques" id="type_ques" class="form-select" required>
                        <option value="">==เลือกประเภทสินค้า==</option>
                        <option value="1" <?php if($type_ques==1){echo "selected";}?>>สุขภาพ</option>
                        <option value="2" <?php if($type_ques==2){echo "selected";}?>>เวชสำอาง</option>
                        <option value="3" <?php if($type_ques==3){echo "selected";}?>>ทั่วไป</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>รายละเอียดสินค้า :</label>
                    <textarea type="text" class="form-control" rows="5" name="detail_pro" id="detail_pro" placeholder="กรอกรายละเอียดสินค้า" required><?php echo "$detail_pro"?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>รูปสินค้า :</label>
                    <?php if($pic_pro!=""){?>
                        <center>
                            <input type="checkbox" name="del" id="del" value="1">&nbsp;ลบ&nbsp;
                            <td><?php echo "<img src='product/$pic_pro' class='rounded-pill' width='200'>";?></td>
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
                <input type="hidden" name="id_pro" id="id_pro" value="<?php echo "$id_pro";?>">
                <input type="hidden" name="pic_pro" id="pic_pro" value="<?php echo "$pic_pro";?>">
                <button class="btn btn-lg btn-danger" type="reset" style="border-radius:30px">ยกเลิก</button>
            </center>
        </div>
    </div>
</form>