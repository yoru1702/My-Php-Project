<?php
    include "head.php";
    include "function_sum.php";
    include "banner.php";
    $sql="select * from tb_user where id_user='$_SESSION[valid_user]'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $id_pack=$read["id_pack"];
    $coin_user=$read["coin_user"];
    $status_mem=$read["status_mem"];
    $status_pack=$read["status_pack"];
    if($status_mem==7){
        $show="<b class='text-danger'>พบแพทย์</b>";
    }else if($status_mem==6){
        $show="<b class='text-warning'>อัตราความดันสูง <br>อัตราการเต้นของหัวใจผิดปกติ</b>";
    }else if($status_mem==5){
        $show="<b class='text-warning'>อัตราความดันสูง <br>อัตราการเต้นของหัวใจปกติ</b>";
    }else if($status_mem==4){
        $show="<b class='text-warning'>อัตราความดันเริ่มสูง <br>อัตราการเต้นของหัวใจผิดปกติ</b>";
    }else if($status_mem==3){
        $show="<b class='text-warning'>อัตราความดันเริ่มสูง <br>อัตราการเต้นของหัวใจปกติ</b>";
    }else if($status_mem==2){
        $show="<b class='text-warning'>อัตราความดันกปกติ <br>อัตราการเต้นของหัวใจผิดปกติ</b>";
    }else{
        $show="<b class='text-success'>สุขภาพร่างกายปกติ</b>";
    }
    if($coin_user>0){
        $c="<b class='text-success'>$coin_user แต้ม</b>";
    }else{
        $c="<b class='text-danger'>$coin_user แต้ม</b>";
    }
    $sql1="select * from tb_meet where id_user='$_SESSION[valid_user]' and status_meet='n'";
    $result1=mysqli_query($conn,$sql1);
    $num1=mysqli_num_rows($result1);
    $sql2="select * from tb_alert where id_user='$_SESSION[valid_user]' and status_alert='n'";
    $result2=mysqli_query($conn,$sql2);
    $num2=mysqli_num_rows($result2);
?>
<?php if($_SESSION["valid_user"]==""){ ?>
    <div class="bg"><br><br>
        <div class="container">
            <?php include "us1.php"; ?>
        </div><br><br>
    </div>
    <div class="bg-1"><br><br>
        <div class="container">
            <?php include "news1.php"; ?>
        </div><br><br>
    </div>
    <div class="bg"><br><br>
        <div class="container">
            <?php include "product1.php"; ?>
        </div><br><br>
    </div>
<?php }else if($_SESSION["valid_user"]!=""){ ?>
    <div class="bg-1"><br><br>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-12">
                    <h4><b>สวัสดี,คุณ <?php echo "$_SESSION[name_user] $_SESSION[sname_user]"; ?></b></h4>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <h4><b>สถานะอาการปัจจุบัน : <?php echo "$show"; if($status_mem==7){ echo "&nbsp;&nbsp;<a href='tel:1669' class='btn btn-danger'>1669</a>"; } ?></b></h4>
                </div>
            </div>
        </div><br>
    </div>
    <div class="bg"><br><br>
        <div class="container">
            <h4><b><img src="img/coin.png" width="25" class="img-fluid">&nbsp;&nbsp;&nbsp;จำนวนแต้มแลกซื้อของท่าน : <?php echo "$c"; ?></b></h4>
            <div class="row">
                <?php if($id_pack>=3 and $status_pack=="y"){ ?>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                        <div class="f-block" style="border-radius:30px">
                            <a href="health.php"><img src="img/1.png" width="250" class="img-fluid f-block-img"></a>
                            <p class="f-block-text">แบบบันทึกสุขภาพประจำวัน</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                        <div class="f-block" style="border-radius:30px">
                            <a href="meet.php"><img src="img/2.png" width="250" class="img-fluid f-block-img"></a>
                            <p class="f-block-text"><?php if($num1>0){ echo "<div class='spinner-grow bg-danger'></div>&nbsp;&nbsp;&nbsp;
                                <audio autoplay='1' loop='loop'><source src='sound/Alarm04.wav' type='audio/wav'></audio>"; 
                                } ?>ใบนัดพบแพทย์</p>
                        </div>
                    </div>
                <?php if($id_pack>=4 and $status_pack=="y"){ ?>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                        <div class="f-block" style="border-radius:30px">
                            <a href="warn.php"><img src="img/3.png" width="250" class="img-fluid f-block-img"></a>
                            <p class="f-block-text"><?php if($num2>0){ echo "<div class='spinner-grow bg-danger'></div>&nbsp;&nbsp;&nbsp;
                                <audio autoplay='1' loop='loop'><source src='sound/Alarm04.wav' type='audio/wav'></audio>"; 
                                } ?>แจ้งเตือนรับประทานยา</p>
                        </div>
                    </div>
                <?php }} ?>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="f-block" style="border-radius:30px">
                        <a href="news.php"><img src="img/4.png" width="250" class="img-fluid f-block-img"></a>
                        <p class="f-block-text">ข่าวสารสุขภาพ</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="f-block" style="border-radius:30px">
                        <a href="web.php"><img src="img/5.png" width="250" class="img-fluid f-block-img"></a>
                        <p class="f-block-text">สังคมออนไลน์</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="f-block" style="border-radius:30px">
                        <a href="#btn_add" data-bs-toggle="modal" data-bs-target="#btn_add"><img src="img/6.png" width="250" class="img-fluid f-block-img"></a>
                        <p class="f-block-text">โทรฉุกเฉิน</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="f-block" style="border-radius:30px">
                        <a href="pack.php"><img src="img/7.png" width="250" class="img-fluid f-block-img"></a>
                        <p class="f-block-text">แพ็คเกจสุขภาพ</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="f-block" style="border-radius:30px">
                        <a href="product.php"><img src="img/8.png" width="250" class="img-fluid f-block-img"></a>
                        <p class="f-block-text">สินค้า</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="f-block" style="border-radius:30px">
                        <a href="pro_his.php"><img src="img/9.png" width="250" class="img-fluid f-block-img"></a>
                        <p class="f-block-text">ประวัติการสั่งซื้อ</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="f-block" style="border-radius:30px">
                        <a href="#btn_add1" data-bs-toggle="modal" data-bs-target="#btn_add1"><img src="img/10.png" width="250" class="img-fluid f-block-img"></a>
                        <p class="f-block-text">เกณฑ์การสะสมแต้มแลกซื้อ</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="f-block" style="border-radius:30px">
                        <a href="ques_n_form.php"><img src="img/11.png" width="250" class="img-fluid f-block-img"></a>
                        <p class="f-block-text">แบบประเมินเว็บไซต์</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="f-block" style="border-radius:30px">
                        <a href="act.php"><img src="img/12.png" width="250" class="img-fluid f-block-img"></a>
                        <p class="f-block-text">กิจกรรมชิงแต้มแลกซื้อ</p>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="bg-1"><br><br>
        <div class="container">
            <?php include "news1.php"; ?>
        </div><br><br>
    </div>
    <div class="bg"><br><br>
        <div class="container">
            <?php include "product1.php"; ?>
        </div><br><br>
    </div>
<?php } ?>
<?php
    include "tel.php";
    include "coin.php";
    include "footer.php";
?>