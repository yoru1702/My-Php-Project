<div class="modal fade" id="btn_add1" tabindex="-1" aria-labelledby="addnewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius:30px">
            <div class="modal-header">
                <div class="modal-title" id="addnewLabel">โพสต์</div>
                <button class="btn-close" type="submit" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="webboard2.php" name="form1" method="post">
                    <input type="text" class="form-control" name="detail_ques" id="detail_ques" placeholder="แสดงความคิดเห็น...." required>
                    <button class="btn btn-lg btn-success w-100" type="submit">ส่ง
                        <input type="hidden" name="id_wques" id="id_wques" value="<?php echo "$id_wques"; ?>">
                        <input type="hidden" name="type_ques" id="type_ques" value="<?php echo "$type_ques"; ?>">
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>