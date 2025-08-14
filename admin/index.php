<?php include "head.php"; ?>
<br><br><br><br><br><br><br><br><br><br>
<div class="row">
    <div class="col-lg-7 col-sm-12 col-12">
        <center>
            <img src="img/lg1.png" width="900" class="img-fluid">
            <h2 class="display-6">เว็บไซต์ส่งเสริมสุขภาพผู้สูงอายุ</h2>
        </center>
    </div>
    <div class="col-lg-4 col-sm-12 col-12">
        <center>
            <h2><b>เข้าสู่ระบบ</b></h2>
            <form action="check_user.php" name="form1" method="post" style="border-radius:30px" class="border p-4">
                <div class="form-floating mt-3">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                    <label class="floatinginput">Username</label>
                </div>
                <div class="form-floating mt-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label class="floatinginput">Password</label>
                </div><br>
                <button class="btn btn-lg btn-success w-100" type="submit" style="border-radius:30px">เข้าสู่ระบบ</button>
            </form>
        </center>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br>
<?php include "footer.php"; ?>