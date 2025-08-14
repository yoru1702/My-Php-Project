<?php
    include "head.php";
    include "config.inc.php";
    $sql="select * from tb_user where id_user='$_SESSION[valid_user]'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $name_user=$read["name_user"];
    $sname_user=$read["sname_user"];
    $user=$read["user"];
    $pass=$read["pass"];
    $born=$read["born"];
    $sex=$read["sex"];
    $tel=$read["tel"];
    $addr=$read["addr"];
    $pic_user=$read["pic_user"];
    $sys=$read["sys"];
    $dia=$read["dia"];
    $heart=$read["heart"];
    $dise=$read["dise"];
?>
<div class="bg"><br><br><br>
    <div class="container">
        <form action="user_edit2.php" name="form1" method="post" enctype="multipart/form-data">
            <div class="card" style="border-radius:30px">
                <div class="card-header">
                    <center><h2><b>แก้ไขข้อมูลส่วนตัว</b></h2></center>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 col-12 py-1">
                            <label>ชื่อ :</label>
                            <input type="text" class="form-control" name="name_user" id="name_user" value="<?php echo "$name_user"; ?>" placeholder="กรอกชื่อ" required>
                        </div>
                        <div class="col-sm-3 col-12 py-1">
                            <label>นามสกุล :</label>
                            <input type="text" class="form-control" name="sname_user" id="sname_user" value="<?php echo "$sname_user"; ?>" placeholder="กรอกนามสกุล" required>
                        </div>
                        <div class="col-sm-3 col-12 py-1">
                            <label>Username (ชื่อผู้ใช้) :</label>
                            <input type="text" class="form-control" name="user" id="user" value="<?php echo "$user"; ?>" placeholder="กรอก Username (ชื่อผู้ใช้)" required>
                        </div>
                        <div class="col-sm-3 col-12 py-1">
                            <label>Password (รหัสผ่าน) :</label>
                            <input type="password" class="form-control" name="pass" id="pass" value="<?php echo "$pass"; ?>" placeholder="กรอก Password (รหัสผ่าน)" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-12 py-1">
                            <label>วันเกิด (ปี ค.ศ) :</label>
                            <input type="date" class="form-control" name="born" id="born"  value="<?php echo "$born"; ?>" required>
                        </div>
                        <div class="col-sm-4 col-12 py-1">
                            <label>เพศ :</label>
                            <select name="sex" id="sex" class="form-select" required>
                                <option value="">==เลือกเพศ==</option>
                                <option value="1" <?php if($sex==1){ echo "selected"; } ?>>ชาย</option>
                                <option value="2" <?php if($sex==2){ echo "selected"; } ?>>หญิง</option>
                            </select>
                        </div>
                        <div class="col-sm-4 col-12 py-1">
                            <label>เบอร์โทรติดต่อ :</label>
                            <input type="text" class="form-control" name="tel" id="tel" maxlength="10"  value="<?php echo "$tel"; ?>" placeholder="กรอกเบอร์โทรติดต่อ" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-12 py-1">
                            <label>ที่อยู่ปัจจุบัน :</label>
                            <textarea name="addr" id="addr" class="form-control" required placeholder="กรอกที่อยู่ปัจจุบัน" rows="3"><?php echo "$addr"; ?></textarea>
                        </div>
                        <div class="col-sm-12 col-12 py-1">
                            <label>โปรไฟล์ :</label>
                            <?php if($pic_user!=""){ ?>
                                <center>
                                    <input type="checkbox" name="del" id="del" value="1">&nbsp;&nbsp;ลบ&nbsp;&nbsp;&nbsp;
                                    <?php echo "<img src='admin/user/$pic_user' class='rounded-pill' width='150'>"; ?>
                                </center>
                            <?php }else if($pic_user==""){ ?>
                                <input type="file" class="form-control" name="pic_new" id="pic_new">
                                <font color="red">[เฉพาะไฟล์ .jpg .png และไฟล์ .gif เท่านั้น!!!!]</font>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="card" style="border-radius:30px">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 col-12 py-1">
                            <label>ความดันค่าบน :</label>
                            <input type="text" class="form-control" name="sys" id="sys"  value="<?php echo "$sys"; ?>" placeholder="กรอกความดันค่าบบน" required>
                        </div>
                        <div class="col-sm-4 col-12 py-1">
                            <label>ความดันค่าล่าง :</label>
                            <input type="text" class="form-control" name="dia" id="dia"  value="<?php echo "$dia"; ?>" placeholder="กรอกความดันค่าบล่าง" required>
                        </div>
                        <div class="col-sm-4 col-12 py-1">
                            <label>อัตราการเต้นของหัวใจ :</label>
                            <input type="text" class="form-control" name="heart" id="heart"  value="<?php echo "$heart"; ?>" placeholder="กรอกอัตราการเต้นของหัวใจ" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-12 py-1">
                            <label>โรคประจำตัว (ถ้ามี) :</label>
                            <textarea name="dise" id="dise" class="form-control" placeholder="กรอกโรคประจำตัว (ถ้ามี)" rows="3"><?php echo "$dise"; ?></textarea>
                        </div>
                    </div>
                </div>
            </div><br>
            <center>
                <button class="btn btn-lg btn-warning w-100" type="submit" style="border-radius:30px">แก้ไขข้อมูลส่วนตัว</button>&nbsp;&nbsp;&nbsp;
            </center>
        </form>
    </div><br><br>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>