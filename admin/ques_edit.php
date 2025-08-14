<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_ques=$_POST["id_ques"];
    $sql="select * from tb_question where id_ques='$id_ques'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $question=$read["question"];
    $type_ques_n=$read["type_ques_n"];
?>
<form action="ques_edit2.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            <h2><b>แก้ไขแบบประเมิน</b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6 col-12 py-1">
                    <label>คำถาม :</label>
                    <input type="text" value="<?php echo "$question";?>" class="form-control" name="question" id="question" placeholder="กรอกแพ็คเกจ" required>
                </div>
                <div class="col-sm-6 col-12 py-1">
                    <label>ประเภท :</label>
                    <select name="type_ques_n" id="type_ques_n" class="form-select" required>
                        <option value="">==เลือกประเภทแบบประเมิน==</option>
                        <option value="1" <?php if($type_ques_n==1){echo "selected";}?>>แบบประเมินสำหรับเว็บไซต์</option>
                        <option value="2" <?php if($type_ques_n==2){echo "selected";}?>>แบบประเมินสำหรับแพทย์</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-1">
            <center>
                <button class="btn btn-lg btn-warning" type="submit" style="border-radius:30px">แก้ไขข้อมูล</button>&nbsp;&nbsp;&nbsp;
                <input type="hidden" name="id_ques" id="id_ques" value="<?php echo "$id_ques";?>">
                <button class="btn btn-lg btn-danger" type="reset" style="border-radius:30px">ยกเลิก</button>
            </center>
        </div>
    </div>
</form>