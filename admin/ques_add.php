<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
?>
<form action="ques_add2.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            <h2><b>เพิ่มแบบประเมิน</b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6 col-12 py-1">
                    <label>คำถาม :</label>
                    <input type="text" class="form-control" name="question" id="question" placeholder="กรอกแพ็คเกจ" required>
                </div>
                <div class="col-sm-6 col-12 py-1">
                    <label>ประเภท :</label>
                    <select name="type_ques_n" id="type_ques_n" class="form-select" required>
                        <option value="">==เลือกประเภทแบบประเมิน==</option>
                        <option value="1">แบบประเมินสำหรับเว็บไซต์</option>
                        <option value="2">แบบประเมินสำหรับแพทย์</option>
                    </select>
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