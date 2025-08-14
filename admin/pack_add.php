<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
?>
<form action="pack_add2.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            <h2><b>เพิ่มแพ็คเกจ</b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-4 col-12 py-1">
                    <label>แพ็คเกจ :</label>
                    <input type="text" class="form-control" name="name_pack" id="name_pack" placeholder="กรอกแพ็คเกจ" required>
                </div>
                <div class="col-sm-4 col-12 py-1">
                    <label>ราคาแพ็คเกจ :</label>
                    <input type="text" class="form-control" name="price_pack" id="price_pack" placeholder="ราคาแพ็คเกจ" required>
                </div>
                <div class="col-sm-4 col-12 py-1">
                    <label>ส่วนลด:</label>
                    <input type="text" class="form-control" name="disc" id="disc" placeholder="กรอก ส่วนลด" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>รายละเอียดแพ็คเกจ :</label>
                    <textarea type="text" class="form-control" rows="5" name="detail_pack" id="detail_pack" placeholder="กรอกรายละเอียดแพ็คเกจ" required></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-1">
            <center>
                <button class="btn btn-lg btn-success" type="submit" style="border-radius:30px">เพิ่มข้อมูล</button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-lg btn-danger" type="reset" style="border-radius:30px">ยกเลิก</button>
            </center>
        </div>
    </div>
</form>