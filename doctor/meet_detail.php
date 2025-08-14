<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    $id_meet=$_POST["id_meet"];
    $sql="select * from tb_meet,tb_user where tb_meet.id_user=tb_user.id_user and tb_meet.id_meet='$id_meet'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $id_user=$read["id_user"];
    $name_user=$read["name_user"];
    $sname_user=$read["sname_user"];
    $tel=$read["tel"];
    $addr=$read["addr"];
    $type_cost=$read["type_cost"];
    $total=$read["total"];
    $born=$read["born"];
    $born=getage($born);
    $day_meet=$read["day_meet"];
    if($day_meet!=""){
        $day_meet=displaydate($day_meet);
    }
    $time_meet=$read["time_meet"];
    $status_meet=$read["status_meet"];
    $detail_meet=$read["detail_meet"];
    if($status_meet=="n"){
        $show="<font color='red'><b>ยังไม่ได้พบแพทย์</b></font>";
    }
?>
<form action="meet_confirm.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            <h2><b>ใบนัดพบพแพทย์ <?php echo "$name_user $sname_user";?></b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
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
                                <?php }if($type_cost=="0" and $total=="0"){?>
                                    <center><h2><b class="text-danger">ผู้ป่วยยังไม่ได้อัปเดตสถานะ</b></h2></center>
                                <?php } ?>
                            </center>
                            <?php if($type_cost!="0" and $total!="0"){?>
                                <center><h2><b><button type="submit" class="btn btn-lg btn-outline-success">ยืนยันสถานะเข้าพบแพทย์
                                    <input type="hidden" name="id_meet" id="id_meet" value="<?php echo "$id_meet";?>">
                                </button></b></h2><center>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6"></div>
            </div>
        </div>
    </div>
</form>