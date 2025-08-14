<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
?>
<form action="pro_add2.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            &nbsp;<h2><b>เพิ่มสินค้า</b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-4 col-12 py-1">
                    <label>สินค้า :</label>
                    <input type="text" class="form-control" name="name_pro" id="name_pro" placeholder="กรอกชื่อ" required>
                </div>
                <div class="col-sm-4 col-12 py-1">
                    <label>ราคาสินค้า :</label>
                    <input type="text" class="form-control" name="price_pro" id="price_pro" placeholder="กรอกนามสกุล" required>
                </div>
                <div class="col-sm-4 col-12 py-1">
                    <label>จำนวนสินค้า :</label>
                    <input type="text" class="form-control" name="num_pro" id="num_pro" placeholder="จำนวนสินค้า" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-12 py-1">
                    <label>จำนวนแต้ม :</label>
                    <input type="text" class="form-control" name="coin_pro" id="coin_pro" placeholder="จำนวนแต้ม" required>
                </div>
                <div class="col-sm-6 col-12 py-1">
                    <label>ประเภทสินค้า :</label>
                    <select name="type_ques" id="type_ques" class="form-select" required>
                        <option value="">==เลือกประเภทสินค้า==</option>
                        <option value="1">สุขภาพ</option>
                        <option value="2">เวชสำอาง</option>
                        <option value="3">ทั่วไป</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>รายละเอียดสินค้า :</label>
                    <textarea type="text" class="form-control" rows="5" name="detail_pro" id="detail_pro" placeholder="กรอกรายละเอียดสินค้า" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>รูปสินค้า :</label>
                    <input type="file" class="form-control" name="pic_pro" id="pic_pro">
                    <font color="red">[เฉพาะไฟล์ .jpg .png และไฟล์ .gif เท่านั้น!!!]</font>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-1">
            <center>
                <button class="btn btn-lg btn-success" type="submit" style="border-radius:30px">เพิ่มข้อมูล</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-lg btn-danger" type="reset" style="border-radius:30px">ยกเลิก</button>&nbsp;
            </center>
        </div>
    </div>
</form>