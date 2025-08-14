<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    $id_user=$_POST["id_user"];
    $sql="select * from tb_user where id_user='$id_user'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $pic_user=$read["pic_user"];
    $name_user=$read["name_user"];
    $sname_user=$read["sname_user"];
    $user=$read["user"];
    $pass=$read["pass"];
    $born=$read["born"];
    $sex=$read["sex"];
    $tel=$read["tel"];
    $addr=$read["addr"];
    $sys=$read["sys"];
    $dia=$read["dia"];
    $heart=$read["heart"];
    $dise=$read["dise"];
    if($pic_user==""){
        $pic_user="user.jpg";
    }
?>
<form action="user_edit2.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius">
        <div class="modal-header bg-p">
            <h2><b>ข้อมูลผู้ป่วย</b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-3 col-12 py-1">
                    <label>ชื่อ :</label>
                    <input type="text" value="<?php echo "$name_user";?>" class="form-control" name="name_user" id="name_user" placeholder="กรอกชื่อ" disabled>
                </div>
                <div class="col-sm-3 col-12 py-1">
                    <label>นามสกุล :</label>
                    <input type="text" value="<?php echo "$sname_user";?>" class="form-control" name="sname_user" id="sname_user" placeholder="กรอกนามสกุล" disabled>
                </div>
                <div class="col-sm-3 col-12 py-1">
                    <label>Username (ชื่อผู้ใช้) :</label>
                    <input type="text" value="<?php echo "$user";?>" class="form-control" name="user" id="user" placeholder="กรอก Username (ชื่อผู้ใช้)" disabled>
                </div>
                <div class="col-sm-3 col-12 py-1">
                    <label>Password (รหัสผ่าน) :</label>
                    <input type="password" value="<?php echo "$pass";?>" class="form-control" name="pass" id="pass" placeholder="กรอก Password (รหัสผ่าน)" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-12 py-1">
                    <label>วันเกิด (ปี ค.ศ) :</label>
                    <input type="date" class="form-control" value="<?php echo "$born";?>" name="born" id="born" disabled>
                </div>
                <div class="col-sm-4 col-12 py-1">
                    <label>เพศ :</label>
                    <select name="sex" id="sex" class="form-select" disabled>
                        <option value="">==เลือกเพศ==</option>
                        <option value="1" <?php if($sex==1){echo "selected";}?>>ชาย</option>
                        <option value="2" <?php if($sex==2){echo "selected";}?>>หญิง</option>
                    </select>
                </div>
                <div class="col-sm-4 col-12 py-1">
                    <label>เบอร์โทรติดต่อ :</label>
                    <input type="text" class="form-control" value="<?php echo "$tel";?>" name="tel" id="tel" maxlength="10" placeholder="กรอกนามสกุล" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>ที่อยู่ปัจจุบัน :</label>
                    <textarea name="addr" id="addr" rows="3" placeholder="กรอกที่อยู่ปัจจุบัน" class="form-control" disabled><?php echo "$addr";?></textarea>
                </div>
                <div class="col-sm-12 col-12 py-1">
                    <label>โปรไฟล์ :</label>
                        <center>
                            <td><?php echo "<img src='../admin/user/$pic_user' class='rounded-pill' width='200'>";?></td>
                        </center>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-12 py-1">
                    <label>ความดันค่าบน :</label>
                    <input type="text" class="form-control" value="<?php echo "$sys";?>" name="sys" id="sys" placeholder="กรอกความดันค่าบน" disabled>
                </div>
                <div class="col-sm-4 col-12 py-1">
                    <label>ความดันค่าล่าง :</label>
                    <input type="text" class="form-control" value="<?php echo "$dia";?>" name="dia" id="dia" placeholder="กรอกความดันค่าล่าง" disabled>
                </div>
                <div class="col-sm-4 col-12 py-1">
                    <label>อัตราการเต้นของหัวใจ :</label>
                    <input type="text" class="form-control" value="<?php echo "$heart";?>" name="heart" id="heart" placeholder="กรอกอัตราการเต้นของหัวใจ" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>โรคประจำตัว (ถ้ามี) :</label>
                    <textarea name="dise" id="dise" rows="3" placeholder="กรอกโรคประจำตัว (ถ้ามี)" class="form-control" disabled><?php echo "$dise";?></textarea>
                </div>
            </div>
        </div>
    </div>
</form>