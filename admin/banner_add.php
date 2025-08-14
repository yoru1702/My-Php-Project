<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
?>
<form action="banner_add2.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            &nbsp;<h2><b>เพิ่มป้ายประชาสัมพันธ์</b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-4 col-12 py-1">
                    <label>ผู้ลงประชาสัมพันธ์ :</label>
                    <input type="text" class="form-control" name="name_pr" id="name_pr" placeholder="ผู้ลงประชาสัมพันธ์" required>
                </div>
                <div class="col-sm-4 col-12 py-1">
                    <label>เบอร์โทรติดต่อ :</label>
                    <input type="text" class="form-control" maxlength="10" name="tel_pr" id="tel_pr" placeholder="เบอร์โทรติดต่อ" required>
                </div>
                <div class="col-sm-4 col-12 py-1">
                    <label>URL.... :</label>
                    <input type="text" class="form-control" name="url_pr" id="url_pr" placeholder="http:........" required>
                </div>
            </div>
            <div class="row">
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>รายละเอียดป้ายโฆษณา :</label>
                    <textarea type="text" class="form-control" rows="5" name="detail_pr" id="detail_pr" placeholder="กรอกรายละเอียดป้ายโฆษณา" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>รูปป้ายโฆษณา :</label>
                    <input type="file" class="form-control" name="pic_pr" id="pic_pr">
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