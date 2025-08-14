<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    $id_order=$_POST["id_order"];
    $sql="select * from tb_order,tb_user where tb_order.id_user=tb_user.id_user and tb_order.id_order='$id_order'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $id_pro=$read["id_pro"];
    $id_user=$read["id_user"];
    $name_user=$read["name_user"];
    $sname_user=$read["sname_user"];
    $tel=$read["tel"];
    $addr=$read["addr"];
    $total_order=$read["total_order"];
    $exp=$read["exp"];
    $no_order=$read["no_order"];
    $status_order=$read["status_order"];
    if($exp==0){
        $ex="<b class='text-danger'>รอแอดมินอนุมัติ</b>";
    }else if($exp==1){
        $ex="<b class='text-warning'>Flash Express</b>";
    }else{
        $ex="<b class='text-warning'>Kerry Express</b>";
    }
    if($status_order=="n"){
        $so="<b class='text-danger'>รอแอดมินอนุมัติ</b>";
        $no="<b class='text-danger'>รอแอดมินอนุมัติ</b>";
    }else if($status_order=="y"){
        $so="<b class='text-primary'>กำลังจัดส่ง</b>";
        $no="<b class='text-warning'>$no_order</b>";
    }else{
        $so="<b class='text-success'>รับสินค้าเรียบร้อยแล้ว</b>";
        $no="<b class='text-warning'>$no_order</b>";
    }
    $coin_user=$read["coin_user"];
    $born=$read["born"];
    $born=getage($born);
    $day_order=$read["day_order"];
    if($day_order!=""){
        $day_order=displaydate($day_order);
    }
    $pay_order=$read["pay_order"];
    if($pay_order==1){
        $show="<font color='green'><b>ใช้แต้มแลกซื้อ</b></font>";
    }else{
        $show="<font color='red'><b>ไม่ใช้แต้มแลกซื้อ</b></font>";
    }
    $sql1="select * from tb_product where id_pro='$id_pro'";
    $result1=mysqli_query($conn,$sql1);
    $read1=mysqli_fetch_assoc($result1);
    $name_pro=$read1["name_pro"];
    $price_pro=$read1["price_pro"];
    $coin_pro=$read1["coin_pro"];
?>
<form action="pro_his2.php" enctype="multipart/form-data" name="form1" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            <h2><b>ใบสั่งซื้อสินค้า <?php echo "$name_user $sname_user";?></b></h2>
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
                                <h4><b>ใบสั่งซื้อสินค้าเว็บไซต์ส่งเสริมสุขภาพผู้สูงอายุ</b></h4>
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
                                        <th>จำนวนแต้มที่มี</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <th>:</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td><?php echo "".number_format($coin_user)." แต้ม";?></td>
                                    </tr>
                                    <tr>
                                        <th>สถานะ</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <th>:</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td><?php echo "$show";?></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <th>บริษัทจัดส่ง</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <th>:</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td><?php echo "$ex";?></td>
                                    </tr>
                                    <tr>
                                        <th>เลขที่จัดส่ง</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <th>:</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td><?php echo "$no";?></td>
                                    </tr>
                                    <tr>
                                        <th>สถานะสินค้า</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <th>:</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td><?php echo "$so";?></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <th>วันที่สั่ง</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <th>:</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td><?php echo "$day_order";?></td>
                                    </tr>
                                    <tr>
                                        <th>สินค้า</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <th>:</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td><?php echo "$name_pro";?></td>
                                    </tr>
                                    <tr>
                                        <th>จำนวนแต้มที่ใช้แลก</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <th>:</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td><?php echo "".number_format($coin_pro)." แต้ม";?></td>
                                    </tr>
                                    <tr>
                                        <th>ราคาสินค้า</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <th>:</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td><?php echo "".number_format($price_pro)." บาท";?></td>
                                    </tr>
                                </table><hr>
                                <b>ขอบคุณที่ใช้บริการเว็บไซต์ส่งเสริมสุขภาพผู้สูงอายุ</b>
                            </center>
                        </div>
                    </div><br>
                    <?php if($status_order=="y"){?>
                        <center><h2><b><button type="submit" class="btn btn-lg btn-outline-success">ยืนยันสถานะการรับสินค้า
                            <input type="hidden" name="id_order" id="id_order" value="<?php echo "$id_order";?>">
                        </button></b></h2><center>
                    <?php } ?>
                </div>
                <div class="col-lg-3 col-sm-6"></div>
            </div>
        </div>
    </div>
</form>