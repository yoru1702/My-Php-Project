<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_wques=$_POST["id_wques"];
    $sql="select * from tb_webques where id_wques='$id_wques'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $detail_ques=$read["detail_ques"];
?>
<form action="wques_edit2.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            <h2><b>แก้ไขโพสต์</b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12 col-12 py-1">
                    <label>รายละเอียดโพสต์ :</label>
                    <textarea type="text" class="form-control" rows="5" name="detail_ques" id="detail_ques" placeholder="กรอกรายละเอียดโพสต์" required><?php echo "$detail_ques";?></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-1">
            <center>
                <button class="btn btn-lg btn-warning w-100" type="submit" style="border-radius:30px">แก้ไขโพสต์</button>&nbsp;&nbsp;&nbsp;
                <input type="hidden" name="id_wques" id="id_wques" value="<?php echo "$id_wques";?>">
            </center>
        </div>
    </div>
</form>