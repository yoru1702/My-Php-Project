<?php
    include "head.php";
?>
<div class="bg"><br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-sm-2"></div>
            <div class="col-lg-8 col-sm-8 col-12">
                <div class="card" style="border-radius:30px">
                    <div class="card-header">
                        <center><h2><b>ติดต่อเรา</b></h2></center>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <center><br>
                                    <img src="img/lg1.png" width="250" class="img-fluid">
                                </center>
                            </div>
                            <div class="col-sm-6">
                            <table>
                                <tr>
                                    <th>E-mail</th>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <th>:</th>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <td>grandhealth@gmail.com</td>
                                </tr>
                                <tr>
                                    <th>Facebook</th>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <th>:</th>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <td>Grand Health</td>
                                </tr>
                                <tr>
                                    <th>Line</th>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <th>:</th>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <td>@grandhealth001</td>
                                </tr>
                                <tr>
                                    <th>Tel</th>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <th>:</th>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <td>000-0000000</td>
                                </tr>
                            </table>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <h5><b>แนะนำแพ็คเกจ!!!</b></h5>
                                <p><b>แพ็คเกจร่างกายแข็งแรง </b>ท่านจะได้รับบริการต่างๆ เช่น แบบบันทึกสุขภาพประจำวัน สะสมแต้มแลกซื้อจากการบันทึกสุขภาพประจำวัน รับใบนัดและแจ้งเตือนรับประทานยา 
                                    ปรึกษาปัญหาสุขภาพกับแพทย์โดยตรง อีกทั้งยังได้รับส่วนลดจากค่าบริการทางการแพทย์ถึง 10%!!!!
                                </p>
                                <?php if($_SESSION["valid_user"]==""){ ?>
                                    <a href="regis.php" class="btn btn-lg btn-outline-success w-100" style="border-radius:30px">สนใจ สมัครสมาชิกเลย!!!!</a>
                                <?php }else if($_SESSION["valid_user"]!=""){ ?>
                                    <a href="pack.php" class="btn btn-lg btn-outline-success w-100" style="border-radius:30px">สนใจ สั่งซื้อแพ็คเกจเลย!!!!</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-2"></div>
        </div><br><br>
    </div>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>