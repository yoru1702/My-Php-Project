<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_news=$_POST["id_news"];
    $sql="select * from tb_news where id_news='$id_news'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $pic_news=$read["pic_news"];
    $head_news=$read["head_news"];
    $detail_news=$read["detail_news"];
?>
<form action="news_edit2.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            &nbsp;<h2><b>แก้ไขข้อมูลข่าวสาร</b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>หัวข้อข่าว :</label>
                    <input type="text" value="<?php echo "$head_news";?>" class="form-control" name="head_news" id="head_news" placeholder="ผู้ลงประชาสัมพันธ์" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>รายละเอียดข่าวสาร :</label>
                    <textarea type="text" class="form-control" rows="5" name="detail_news" id="detail_news" placeholder="กรอกรายละเอียดข่าวสาร" required><?php echo "$detail_news";?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>รูปข่าวสาร :</label>
                    <?php if($pic_news!=""){?>
                        <center>
                            <input type="checkbox" name="del" id="del" value="1">&nbsp;ลบ&nbsp;
                            <td><?php echo "<img src='news/$pic_news' class='rounded-pill' width='200'>";?></td>
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
                <input type="hidden" name="id_news" id="id_news" value="<?php echo "$id_news";?>">
                <input type="hidden" name="pic_news" id="pic_news" value="<?php echo "$pic_news";?>">
                <button class="btn btn-lg btn-danger" type="reset" style="border-radius:30px">ยกเลิก</button>
            </center>
        </div>
    </div>
</form>