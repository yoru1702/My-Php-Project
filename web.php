<?php
    include "head.php";
    include "function_sum.php";
    if($_SESSION["valid_user"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
?>
<div class="bg"><br><br>
    <div class="container">
        <center><h2><b>สังคมออนไลน์</b></h2></center><hr><br>
        <div class="row">
            <div class="col-lg-4 col-sm-4 col-12">
                <div class="f-block" style="border-radius:30px">
                    <a href="online.php?type_ques=1"><img src="img/on1.png" class="img-fluid w-100"></a>
                    <p class="f-block-text">สุขภาพ</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-12">
                <div class="f-block" style="border-radius:30px">
                    <a href="online.php?type_ques=2"><img src="img/on2.png" class="img-fluid w-100"></a>
                    <p class="f-block-text">เวชสำอาง</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-12">
                <div class="f-block" style="border-radius:30px">
                    <a href="online.php?type_ques=3"><img src="img/on3.png" class="img-fluid w-100"></a>
                    <p class="f-block-text">ทั่วไป</p>
                </div>
            </div>
        </div>
    </div><br><br><br>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>