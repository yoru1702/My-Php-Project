<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_wans=$_POST["id_wans"];
    $sql="select * from tb_webans where id_wans='$id_wans'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $detail_ans=$read["detail_ans"];
?>
<form action="wans_edit2.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            <h2><b>แก้ไขความคิดเห็น</b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>รายละเอียดความคิดเห็น :</label>
                    <textarea type="text" class="form-control" rows="5" name="detail_ans" id="detail_ans" placeholder="กรอกรายละเอียดความคิดเห็น" required><?php echo "$detail_ans";?></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-1">
            <center>
                <button class="btn btn-lg btn-warning w-100" type="submit" style="border-radius:30px">แก้ไขความคิดเห็น</button>&nbsp;&nbsp;&nbsp;
                <input type="hidden" name="id_wans" id="id_wans" value="<?php echo "$id_wans";?>">
            </center>
        </div>
    </div>
</form>