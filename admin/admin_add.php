<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_package where id_pack between '2' and '10'";
    $result=mysqli_query($conn,$sql);
?>
<form action="admin_add2.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            &nbsp;<h2><b>เพิ่มข้อมูลแอดมิน/แพทย์</b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-3 col-12 py-1">
                    <label>ชื่อ :</label>
                    <input type="text" class="form-control" name="name_ad" id="name_ad" placeholder="กรอกชื่อ" required>
                </div>
                <div class="col-sm-3 col-12 py-1">
                    <label>นามสกุล :</label>
                    <input type="text" class="form-control" name="sname_ad" id="sname_ad" placeholder="กรอกนามสกุล" required>
                </div>
                <div class="col-sm-3 col-12 py-1">
                    <label>Username (ชื่อผู้ใช้) :</label>
                    <input type="text" class="form-control" name="user_ad" id="user_ad" placeholder="กรอก Username (ชื่อผู้ใช้)" required>
                </div>
                <div class="col-sm-3 col-12 py-1">
                    <label>Password (รหัสผ่าน) :</label>
                    <input type="password" class="form-control" name="pass_ad" id="pass_ad" placeholder="กรอก Password (รหัสผ่าน)" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-12 py-1">
                    <label>ประเภทแอดมิน :</label>
                    <select name="type_ad" id="type_ad" class="form-select" required>
                        <option value="">==เลือกประเภทแอดมิน==</option>
                        <option value="1">Admin</option>
                        <option value="2">แพทย์</option>
                    </select>
                </div>
                <div class="col-sm-4 col-12 py-1">
                    <label>แพ็คเกจ :</label>
                    <select name="id_pack" id="id_pack" class="form-select" required>
                        <option value="">==เลือกแพ็คเกจ==</option>
                        <?php
                            while($read=mysqli_fetch_assoc($result)){
                                $id_pack=$read["id_pack"];
                                $name_pack=$read["name_pack"];
                            
                        ?>
                        <option value="<?php echo "$id_pack";?>"><?php echo "$name_pack"?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-4 col-12 py-1">
                    <label>เบอร์โทรติดต่อ :</label>
                    <input type="text" class="form-control" name="tel_ad" id="tel_ad" placeholder="กรอกเบอร์โทรติดต่อ" maxlength="10" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>โปรไฟล์ :</label>
                    <input type="file" class="form-control" name="pic_ad" id="pic_ad">
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