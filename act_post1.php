<div class="modal fade" id="btn_add1" tabindex="-1" aria-labelledby="addnewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius:30px">
            <div class="modal-header">
                <div class="modal-title" id="addnewLabel">เข้าร่วมกิจกรรม</div>
                <button class="btn-close" type="submit" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="act_post2.php" name="form1" method="post">
                    <input type="text" class="form-control" name="detail_post" id="detail_post" placeholder="แสดงความคิดเห็น...." required>
                    <input type="file" class="form-control" name="pic_post" id="pic_post">
                    <font color="red">[เฉพาะไฟล์ .jpg .png และไฟล์ .gif เท่านั้น!!!]</font><br>
                    <button class="btn btn-lg btn-success w-100" type="submit">ส่ง
                        <input type="hidden" name="id_act" id="id_act" value="<?php echo "$id_act"; ?>">
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>