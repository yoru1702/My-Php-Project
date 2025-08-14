<?php
    include "head.php";
    include "function_sum.php";
    if($_SESSION["valid_user"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_meet,tb_user where tb_meet.id_user=tb_user.id_user and tb_user.id_user='$_SESSION[valid_user]' and status_meet='n'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $num=mysqli_num_rows($result);
    $id_meet=$read["id_meet"];
    $day_meet=$read["day_meet"];
    if($day_meet!=""){
        $day_meet=displaydate($day_meet);
    }
    $time_meet=$read["time_meet"];
    $detail_meet=$read["detail_meet"];
    $status_meet=$read["status_meet"];
    if($status_meet=="n"){
        $show="<b class='text-danger'>ยังไม่ได้เข้าพบแพทย์</b>";
    }
    $total=$read["total"];
    $type_cost=$read["type_cost"];
    $name_user=$read["name_user"];
    $sname_user=$read["sname_user"];
    $born=$read["born"];
    $born=getage($born);
    $tel=$read["tel"];
    $addr=$read["addr"];
    $id_pack=$read["id_pack"];
    $sql1="select * from tb_package where id_pack='$id_pack'";
    $result1=mysqli_query($conn,$sql1);
    $read1=mysqli_fetch_assoc($result1);
    $disc=$read1["disc"];
?>
<div class="bg"><br><br><br>
    <div class="container">
        <div class="card" style="border-radius:30px">
            <div class="card-header">
                <center><h2><b><?php if($num>0){ echo "<div class='spinner-grow bg-danger'></div>&nbsp;&nbsp;&nbsp;
                                <audio autoplay='1' loop='loop'><source src='sound/Alarm04.wav' type='audio/wav'></audio>"; 
                                } ?>ใบนัดพบแพทย์</b></h2></center>
            </div>
            <div class="card-body">
                <?php
                    if($num==0){
                        echo "<center><img src='img/2.png' width='250' class='img-fluid'></center><br><br><br><br><center><h2><b class='text-danger'>ยังไม่มีการแจ้งเตือน</b></h2></center><br><br><br><br>";
                    }else{
                ?>
                <div class="row">
                    <div class="col-lg-3 col-sm-6"></div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="card p-4" style="border-radius:30px">
                            <div class="card-body">
                                <center>
                                    <img src="img/lg1.png" class="img-fluid" width="250">
                                    <h4><b>ใบนัดพบพแพทย์เว็บไซต์ส่งเสริมสุขภาพผู้สูงอายุ</b></h4>
                                    <p>เลขที่ 2 ถนนรอบทิศกำแพงเมืองตะวันตก ตำบลในเวียง อำเภอเมือง จังหวัดน่าน</p><hr>
                                    <table>
                                        <tr>
                                            <th>ชื่อ-นามสกุล</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <th>:</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td><?php echo "$name_user $sname_user";?></td>
                                        </tr>
                                        <tr>
                                            <th>อายุ</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <th>:</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td><?php echo "$born";?> ปี</td>
                                        </tr>
                                        <tr>
                                            <th>ที่อยู่ปัจจุบัน</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <th>:</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td><?php echo "$addr";?></td>
                                        </tr>
                                        <tr>
                                            <th>เบอร์โทร</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <th>:</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td class="text-success"><?php echo "".substr($tel,0,3)."-".substr($tel,3,7)."";?></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <th>สถานะ</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <th>:</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td><?php echo "$show";?></td>
                                        </tr>
                                        <tr>
                                            <th>วันที่นัด</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <th>:</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td><?php echo "$day_meet";?></td>
                                        </tr>
                                        <tr>
                                            <th>เวลานัด</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <th>:</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td><?php echo "$time_meet";?></td>
                                        </tr>
                                        <tr>
                                            <th>รายละเอียดการนัดพบแพทย์</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <th>:</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td><?php echo "$detail_meet";?></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <th>สถานที่</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <th>:</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td><?php echo "โรงพยาบาลน่าน";?></td>
                                        </tr>
                                        <tr>
                                            <th>ห้องตรวจ</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <th>:</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td><?php echo "A165";?></td>
                                        </tr>
                                    </table><hr>
                                    <?php if($type_cost!="0" and $total!="0"){?>
                                        <center><h2><b>ค่าใช้จ่ายทั้งหมด : <?php echo "".number_format($total)." บาท"?></b></h2></center>
                                        <font color="red">[ค่าบริการนอกสถานที่, ค่าวิชาชีพแพทย์ ไม่รวมค่ายา กรุณาเตรียมเงินมาชำระ]</font><br>
                                        <b>ขอบคุณที่ใช้บริการเว็บไซต์ส่งเสริมสุขภาพผู้สูงอายุ</b>
                                    <?php }if($type_cost=="0" and $total=="0"){?>
                                        <b>ขอบคุณที่ใช้บริการเว็บไซต์ส่งเสริมสุขภาพผู้สูงอายุ</b>
                                    <?php } ?>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6"></div>
                </div>
                <?php } ?>
            </div>
        </div><br>
        <?php if($num==0 or $total!="0" and $type_cost!="0"){ ?>
        <?php }else{ ?>
            <br><br>
            <div class="card" style="border-radius:30px">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-3"></div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <center><h2><b>เลือกบริการรับส่ง</b></h2></center><hr><br>
                            <form action="meet2.php" name="form1" method="post">
                                <div class="row">
                                    <div class="col-sm-6 col-12 py-1">
                                        <b>ค่าบริการนอกสถานที่ :</b>
                                        <input type="text" class="form-control" name="pay" id="pay" value="1000" style="text-align:right" readonly>
                                    </div>
                                    <div class="col-sm-6 col-12 py-1">
                                        <b>ค่าวิชาชีพแพทย์ :</b>
                                        <input type="text" class="form-control" name="cost" id="cost" value="300" style="text-align:right" readonly>
                                    </div>
                                    <div class="col-sm-12 col-12 py-1">
                                        <b>เลือกบริการรับส่ง :</b>
                                        <input type="radio" class="form-check-input" name="type_cost" id="type_cost" value="1" onchange="cal_num()">&nbsp;บริการรับ/ส่ง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" class="form-check-input" name="type_cost" id="type_cost" value="2" onchange="cal_num()">&nbsp;เดินทางด้วยตัวเอง<br>
                                        <font color="green">[ค่าบริการรับส่ง 500 บาท]</font>
                                    </div>
                                    <div class="col-sm-6 col-12 py-1">
                                        <b>ส่วนลด (สำหรับสมาชิกแพ็คเกจ) :</b>
                                        <input type="text" class="form-control" name="discount" id="discount" style="text-align:right" readonly>
                                        <input type="hidden" name="disc" id="disc" value="<?php echo "$disc"; ?>">
                                    </div>
                                    <div class="col-sm-12 col-12 py-1">
                                        <b>เลือกบริการรับส่ง :</b>
                                        <input type="text" class="form-control bg-dark text-warning" name="total" id="total" value="<?php echo "$total"; ?>" style="text-align:right;font-size:20px" readonly>
                                        <font color="red">[ค่าบริการนอกสถานที่, ค่าวิชาชีพแพทย์ ไม่รวมค่ายา กรุณาเตรียมเงินมาชำระ]</font><br>
                                    </div>
                                </div><br>
                                <center>
                                    <button class="btn btn-lg btn-success w-100" type="submit" style="border-radius:30px">ยืนยันการเลือกบริการรับส่ง</button>
                                    <input type="hidden" name="id_meet" id="id_meet" value="<?php echo "$id_meet"; ?>">
                                </center>
                            </form>
                        </div>
                        <div class="col-lg-3 col-sm-3"></div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div><br><br>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>