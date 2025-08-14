<div class="modal fade" id="btn_add1" tabindex="-1" aria-labelledby="addnewLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:30px">
            <div class="modal-header">
                <div class="modal-title" id="addnewLabel">แบบบันทึกสุขภาพประจำวัน</div>
                <button class="btn-close" type="submit" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="health2.php" name="form1" method="post">
                    <div class="row">
                        <div class="col-sm-6 col-12 py-1">
                            <label>ความดันค่าบน :</label>
                            <input type="text" class="form-control" name="sys" id="sys" placeholder="กรอกความดันค่าบน" required>
                        </div>
                        <div class="col-sm-6 col-12 py-1">
                            <label>ความดันค่าล่าง :</label>
                            <input type="text" class="form-control" name="dia" id="dia" placeholder="กรอกความดันค่าล่าง" required>
                        </div>
                        <div class="col-sm-6 col-12 py-1">
                            <label>อัตราการเต้นของหัวใจ :</label>
                            <input type="text" class="form-control" name="heart" id="heart" placeholder="กรอกอัตราการเต้นของหัวใจ" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-12 py-1">
                            <label>อาการเพิ่มเติม (ถ้ามี) :</label>
                            <textarea name="detail" id="detail" rows="3" placeholder="กรอกอาการเพิ่มเติม (ถ้ามี)" class="form-control"></textarea>
                        </div>
                    </div>
                    <button class="btn btn-success btn-lg w-100" type="submit" style="border-radius:30px">บันทึกสุขภาพ</button>
                </form>
            </div>
        </div>
    </div>
</div>