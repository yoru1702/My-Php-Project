<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_ad=$_POST["id_ad"];
    $sql="select * from tb_admin where id_ad='$id_ad'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $pic_ad=$read["pic_ad"];
    $id_pack=$read["id_pack"];
    $name_ad=$read["name_ad"];
    $sname_ad=$read["sname_ad"];
    $user_ad=$read["user_ad"];
    $pass_ad=$read["pass_ad"];
    $tel_ad=$read["tel_ad"];
    $type_ad=$read["type_ad"];
?>
<form action="admin_edit2.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            &nbsp;<h2><b>แก้ไขข้อมูลแอดมิน/แพทย์</b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-3 col-12 py-1">
                    <label>ชื่อ :</label>
                    <input type="text" value="<?php echo "$name_ad";?>" class="form-control" name="name_ad" id="name_ad" placeholder="กรอกชื่อ" required>
                </div>
                <div class="col-sm-3 col-12 py-1">
                    <label>นามสกุล :</label>
                    <input type="text" value="<?php echo "$sname_ad";?>" class="form-control" name="sname_ad" id="sname_ad" placeholder="กรอกนามสกุล" required>
                </div>
                <div class="col-sm-3 col-12 py-1">
                    <label>Username (ชื่อผู้ใช้) :</label>
                    <input type="text" class="form-control" value="<?php echo "$user_ad";?>" name="user_ad" id="user_ad" placeholder="กรอก Username (ชื่อผู้ใช้)" required>
                </div>
                <div class="col-sm-3 col-12 py-1">
                    <label>Password (รหัสผ่าน) :</label>
                    <input type="password" class="form-control" value="<?php echo "$pass_ad";?>" name="pass_ad" id="pass_ad" placeholder="กรอก Password (รหัสผ่าน)" required>
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
                            $sql2="select * from tb_package where id_pack between '2' and '10'";
                            $result2=mysqli_query($conn,$sql2);
                            while($read2=mysqli_fetch_assoc($result2)){
                                $id_pack1=$read2["id_pack1"];
                                $id_pack1=$read2["id_pack"];
                                $name_pack=$read2["name_pack"];
                                if($id_pack==$id_pack1){
                            
                        ?>
                        <option value="<?php echo "$id_pack";?>" selected><?php echo "$name_pack"?></option>
                        <?php }else{ ?>
                        <option value="<?php echo "$id_pack1";?>"><?php echo "$name_pack"?></option>
                        <?php }}?>
                    </select>
                </div>
                <div class="col-sm-4 col-12 py-1">
                    <label>เบอร์โทรติดต่อ :</label>
                    <input type="text" class="form-control" name="tel_ad" value="<?php echo "$tel_ad";?>" id="tel_ad" placeholder="กรอกเบอร์โทรติดต่อ" maxlength="10" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>โปรไฟล์ :</label>
                    <?php if($pic_ad!=""){?>
                        <center>
                            <input type="checkbox" name="del" id="del" value="1">&nbsp;ลบ&nbsp;
                            <td><?php echo "<img src='admin/$pic_ad' class='rounded-pill' width='200'>";?></td>
                        </center>
                    <?php }else{?>
                        <input type="file" class="form-control" name="pic_new" id="pic_new">
                        <font color="red">[เฉพาะไฟล์ .jpg .png และไฟล์ .gif เท่านั้น!!!!]</font>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-1">
            <center>
                <button class="btn btn-lg btn-warning" type="submit" style="border-radius:30px">แก้ไขข้อมูล</button>&nbsp;&nbsp;&nbsp;
                <input type="hidden" name="id_ad" id="id_ad" value="<?php echo "$id_ad";?>">
                <input type="hidden" name="pic_ad" id="pic_ad" value="<?php echo "$pic_ad";?>">
                <button class="btn btn-lg btn-danger" type="reset" style="border-radius:30px">ยกเลิก</button>
            </center>
        </div>
    </div>
</form>