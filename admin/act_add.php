<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
?>
<form action="act_add2.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            &nbsp;<h2><b>เพิ่มกิจกรรมออนไลน์</b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-4 col-12 py-1">
                    <label>หัวข้อกิจกรรม :</label>
                    <input type="text" class="form-control" name="name_act" id="name_act" placeholder="หัวข้อกิจกรรม" required>
                </div>
                <div class="col-sm-4 col-12 py-1">
                    <label>วันที่สิ้นสุด :</label>
                    <input type="date" class="form-control" maxlength="10" name="day_out" id="day_out" placeholder="วันที่สิ้นสุด" required>
                </div>
                <div class="col-sm-4 col-12 py-1">
                    <label>รางวัล(แต้ม) :</label>
                    <input type="text" class="form-control" name="coin" id="coin" placeholder="รางวัล(แต้ม)" required>
                </div>
            </div>
            <div class="row">
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>รายละเอียดกิจกรรม :</label>
                    <textarea type="text" class="form-control" rows="5" name="detail_act" id="detail_act" placeholder="กรอกรายละเอียดกิจกรรม" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>รูปกิจกรรม :</label>
                    <input type="file" class="form-control" name="pic_act" id="pic_act">
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