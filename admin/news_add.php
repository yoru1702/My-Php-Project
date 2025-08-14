<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
?>
<form action="news_add2.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            &nbsp;<h2><b>เพิ่มข้อมูลข่าวสาร</b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>หัวข้อข่าว :</label>
                    <input type="text" class="form-control" name="head_news" id="head_news" placeholder="ผู้ลงประชาสัมพันธ์" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>รายละเอียดข่าวสาร :</label>
                    <textarea type="text" class="form-control" rows="5" name="detail_news" id="detail_news" placeholder="กรอกรายละเอียดข่าวสาร" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>รูปข่าวสาร :</label>
                    <input type="file" class="form-control" name="pic_news" id="pic_news">
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