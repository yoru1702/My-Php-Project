<?php
    include "head.php";
?>
<div class="bg"><br><br><br>
    <div class="container">
        <form action="regis2.php" name="form1" method="post" enctype="multipart/form-data">
            <div class="card" style="border-radius:30px">
                <div class="card-header">
                    <center><h2><b>สมัครสมาชิก</b></h2></center>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 col-12 py-1">
                            <label>ชื่อ :</label>
                            <input type="text" class="form-control" name="name_user" id="name_user" placeholder="กรอกชื่อ" required>
                        </div>
                        <div class="col-sm-3 col-12 py-1">
                            <label>นามสกุล :</label>
                            <input type="text" class="form-control" name="sname_user" id="sname_user" placeholder="กรอกนามสกุล" required>
                        </div>
                        <div class="col-sm-3 col-12 py-1">
                            <label>Username (ชื่อผู้ใช้) :</label>
                            <input type="text" class="form-control" name="user" id="user" placeholder="กรอก Username (ชื่อผู้ใช้)" required>
                        </div>
                        <div class="col-sm-3 col-12 py-1">
                            <label>Password (รหัสผ่าน) :</label>
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="กรอก Password (รหัสผ่าน)" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-12 py-1">
                            <label>วันเกิด (ปี ค.ศ) :</label>
                            <input type="date" class="form-control" name="born" id="born" required>
                        </div>
                        <div class="col-sm-4 col-12 py-1">
                            <label>เพศ :</label>
                            <select name="sex" id="sex" class="form-select" required>
                                <option value="">==เลือกเพศ==</option>
                                <option value="1">ชาย</option>
                                <option value="2">หญิง</option>
                            </select>
                        </div>
                        <div class="col-sm-4 col-12 py-1">
                            <label>เบอร์โทรติดต่อ :</label>
                            <input type="text" class="form-control" name="tel" id="tel" maxlength="10" placeholder="กรอกนามสกุล" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-12 py-1">
                            <label>ที่อยู่ปัจจุบัน :</label>
                            <textarea name="addr" id="addr" rows="3" placeholder="กรอกที่อยู่ปัจจุบัน" class="form-control" required></textarea>
                        </div>
                        <div class="col-sm-12 col-12 py-1">
                            <label>โปรไฟล์ :</label>
                            <input type="file" class="form-control" name="pic_user" id="pic_user">
                            <font color="red">[เฉพาะไฟล์ .jpg .png และไฟล์ .gif เท่านั้น!!!]</font>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="card" style="border-radius:30px">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 col-12 py-1">
                            <label>ความดันค่าบน :</label>
                            <input type="text" class="form-control" name="sys" id="sys" placeholder="กรอกความดันค่าบน" required>
                        </div>
                        <div class="col-sm-4 col-12 py-1">
                            <label>ความดันค่าล่าง :</label>
                            <input type="text" class="form-control" name="dia" id="dia" placeholder="กรอกความดันค่าล่าง" required>
                        </div>
                        <div class="col-sm-4 col-12 py-1">
                            <label>อัตราการเต้นของหัวใจ :</label>
                            <input type="text" class="form-control" name="heart" id="heart" placeholder="กรอกอัตราการเต้นของหัวใจ" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-12 py-1">
                            <label>โรคประจำตัว (ถ้ามี) :</label>
                            <textarea name="dise" id="dise" rows="3" placeholder="กรอกโรคประจำตัว (ถ้ามี)" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div><br>
            <center>
                <button class="btn btn-lg btn-success" type="submit" style="border-radius:30px">สมัครสมาชิก</button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-lg btn-danger" type="reset" style="border-radius:30px">ยกเลิก</button>
            </center>
        </form>
    </div><br><br>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>