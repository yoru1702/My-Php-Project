<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
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
<form action="pay_pro.php" enctype="multipart/form-data" name="form1" onsubmit="return check()" method="post">
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
                            </center>
                            <div class="row">
                                <div class="col-sm-1 col-12"></div>
                                <div class="col-sm-10 col-12">
                                    <center><h4><b>เลือกช่องทางขนส่ง :</b></h4></center>
                                    <div class="row">
                                        <div class="col-sm-12 col-12">
                                            <center>
                                                <b>&nbsp;ช่องทางขนส่ง : &nbsp;</b>
                                                <input type="radio" name="type_order1" id="type_order1" value="1" onchange="order1()" class="form-check-input">&nbsp;แบบธรรมดา&nbsp;&nbsp;
                                                <input type="radio" name="type_order2" id="type_order2" value="2" onchange="order2()" class="form-check-input">&nbsp;แบบ EMS&nbsp;
                                            </center>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <b>&nbsp;ช่องทางขนส่ง : &nbsp;</b>
                                            <input type="text" name="total_order" id="total_order" value="<?php echo "$total_order"?>" style="text-align:right" class="form-control" readonly>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <b>&nbsp;ค่าจัดส่ง : &nbsp;</b>
                                            <input type="text" name="tran" id="tran" value="<?php echo "$tran"?>" style="text-align:right" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-12">
                                            <b>&nbsp;ยอดค่าใช้จ่ายทั้งหมด : &nbsp;</b>
                                            <input type="text" name="net" id="net" value="<?php echo "$net"?>" style="text-align:right;font-Size:28px" class="form-control bg-dark text-warning" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <b>&nbsp;บริษัทจัดส่ง : &nbsp;</b>
                                            <select name="exp" id="exp" class="form-select" required>
                                                <option value="">==เลือกบริษัทจัดส่ง==</option>
                                                <option value="1">Flash Express</option>
                                                <option value="2">Kerry Express</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <b>&nbsp;หมายเลขจัดส่ง : &nbsp;</b>
                                            <input type="text" name="no_order" id="no_order" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1 col-12"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6"></div>
            </div>
        </div>
        <div class="modal-footer bg-1">
            <center>
                <button class="btn btn-lg btn-success" type="submit" style="border-radius:30px">อนุมัตคำสั่งซื้อ</button>&nbsp;&nbsp;&nbsp;
                <input type="hidden" name="id_order" id="id_order" value="<?php echo "$id_order";?>">
                <input type="hidden" name="id_user" id="id_user" value="<?php echo "$id_user";?>">
                <input type="hidden" name="id_pro" id="id_pro" value="<?php echo "$id_pro";?>">
                <input type="hidden" name="coin_user" id="coin_user" value="<?php echo "$coin_user";?>">
                <input type="hidden" name="coin_pro" id="coin_pro" value="<?php echo "$coin_pro";?>">
                <input type="hidden" name="pay_order" id="pay_order" value="<?php echo "$pay_order";?>">
                <button class="btn btn-lg btn-danger" type="reset" style="border-radius:30px">ยกเลิก</button>
            </center>
        </div>
    </div>
</form>
<script>
    function order1(){
        var type_order1=document.getElementById("type_order1").value;
        document.getElementById("type_order2").checked=false;
        if(type_order1==1){
            var total_order=parseInt(document.getElementById("total_order").value);
            document.getElementById("tran").value="0";
            var tran=parseInt(document.getElementById("tran").value);
            var net=total_order+tran;
            document.getElementById("net").value=net.toString();
        } else {
            document.form1.total_order.disabled=false;
            document.form1.tran.disabled=true;
        }
    }
    function order2(){
        var type_order2=document.getElementById("type_order2").value;
        document.getElementById("type_order1").checked=false;
        if(type_order2==2){
            var total_order=parseInt(document.getElementById("total_order").value);
            document.getElementById("tran").value="50";
            var tran=parseInt(document.getElementById("tran").value);
            var net=total_order+tran;
            document.getElementById("net").value=net.toString();
        } else {
            document.form1.total_order.disabled=false;
            document.form1.tran.disabled=true;
        }
    }
</script>