<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    $id_pro=$_POST["id_pro"];
    $sql="select * from tb_product where id_pro='$id_pro'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $name_pro=$read["name_pro"];
    $detail_pro=$read["detail_pro"];
    $num_pro=$read["num_pro"];
    if($num_pro==0){
        $np="<b class='text-danger'>สินค้าหมด</b>";
    }else{
        $np="<b>คงเหลือ $num_pro ชิ้น</b>";
    }
    $type_ques=$read["type_ques"];
    if($type_ques==1){
        $tp="สุขภาพ";
    }else if($type_ques==2){
        $tp="เวชสำอาง";
    }else{
        $tp="ทั่วไป";
    }
    $pic_pro=$read["pic_pro"];
    if($pic_pro==""){
        $pic_pro="no.png";
    }
    $coin_pro=$read["coin_pro"];
    $price_pro=$read["price_pro"];
    $sql1="select * from tb_user where id_user='$_SESSION[valid_user]'";
    $result1=mysqli_query($conn,$sql1);
    $read1=mysqli_fetch_assoc($result1);
    $coin_user=$read1["coin_user"];
    $id_pack=$read1["id_pack"];
    $sql2="select * from tb_package where id_pack='$id_pack'";
    $result2=mysqli_query($conn,$sql2);
    $read2=mysqli_fetch_assoc($result2);
    $disc=$read2["disc"];
?>
<form action="pro_detail2.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            <h2><b>สั่งซื้อสินค้า</b></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card-img-top"><?php echo "<img src='admin/product/$pic_pro' class='rounded img-fluid w-100'>"; ?></div>
                </div>
                <div class="col-sm-6">
                    <table>
                        <tr>
                            <th>ชื่อสินค้า</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <th>:</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><?php echo "$name_pro";?></td>
                        </tr>
                        <tr>
                            <th>จำนวน</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <th>:</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><?php echo "$np";?></td>
                        </tr>
                        <tr>
                            <th>ราคา</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <th>:</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><?php echo "".number_format($price_pro)." บาท"; ?></td>
                        </tr>
                        <tr>
                            <th>ประเภทสินค้า</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <th>:</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><?php echo "$tp";?></td>
                        </tr>
                    </table>
                    <b>รายละเอียดสินค้า :</b>
                    <?php echo "$detail_pro"; ?><br><br><br>
                    <div class="row">
                        <div class="col-sm-8"></div>
                        <div class="col-sm-4">
                            <div class="card" style="border-radius:30px">
                                <table>
                                    <center><img src="img/coin.png" width="25" class="img-fluid">&nbsp;&nbsp;&nbsp;แลก <?php echo "$coin_pro"; ?> แต้ม</center>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>
            <?php include "banner3.php"; ?><hr><br>
            <div class="row">
                <div class="col-lg-3 col-sm-3"></div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <center><h2><b>สั่งซื้อสินค้า</b></h2>
                        <b>จำนวนแต้มแลกซื้อของท่าน : <b class="text-warning"><?php echo "$coin_user"; ?></b> แต้ม</b>
                    </center><hr><br>
                    <b>สั่งซื้อโดย :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php if($coin_user>=$coin_pro){ ?>
                        <input type="radio" class="form-check-input" name="pay_order1" id="pay_order1" value="1" onchange="cal_order1()">&nbsp;ใช้แต้มแลกซื้อ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="form-check-input" name="pay_order2" id="pay_order2" value="2" onchange="cal_order2()">&nbsp;ใช้เงินสด
                    <?php }else if($coin_user<$coin_pro){ ?>
                        <input type="radio" class="form-check-input" name="pay_order3" id="pay_order3" value="3" onchange="cal_order3()">&nbsp;ใช้เงินสด
                    <?php } ?><br><br>
                    <div class="row">
                        <div class="col-sm-6 col-12 py-1">
                            <b>ราคาสินค้า :</b>
                            <input type="text" class="form-control" name="price_pro" id="price_pro" value="<?php echo "$price_pro"; ?>" style="text-align:right" readonly>
                        </div>
                        <div class="col-sm-6 col-12 py-1">
                            <b>แต้มที่ใช้แลก :</b>
                            <?php if($coin_user>=$coin_pro){ ?>
                                <input type="text" class="form-control" name="coin_pro" id="coin_pro" value="<?php echo "$coin_pro"; ?>" style="text-align:right" readonly>
                                <input type="hidden" name="coin_pro1" id="coin_pro1" value="<?php echo "$coin_pro"; ?>">
                            <?php }else if($coin_user<$coin_pro){ ?>
                                <input type="text" class="form-control" name="coin_pro" id="coin_pro" placeholder="แต้มไม่เพียงพอ" style="text-align:right" readonly>
                            <?php } ?>
                        </div>
                        <div class="col-sm-12 col-12 py-1">
                            <b>ยอดสั่งซื้อ :</b>
                            <input type="text" class="form-control bg-dark text-warning" name="sum1" id="sum1" value="<?php echo "$sum1"; ?>" style="text-align:right;font-size:20px" readonly>
                        </div>
                        <div class="col-sm-6 col-12 py-1">
                            <b>ส่วนลด (สำหรับสมาชิกแพ็คเกจ) :</b>
                            <input type="text" class="form-control" name="discount" id="discount" style="text-align:right" readonly>
                            <input type="hidden" name="disc" id="disc" value="<?php echo "$disc"; ?>">
                        </div>
                        <div class="col-sm-12 col-12 py-1">
                            <b>ราคาสุทธิ :</b>
                            <input type="text" class="form-control bg-dark text-warning" name="total_order" id="total_order" value="<?php echo "$total_order"; ?>" style="text-align:right;font-size:20px" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3"></div>
            </div>
        </div>
        <div class="modal-footer bg-1">
            <input type="hidden" name="id_pro" id="id_pro" value="<?php echo "$id_pro"; ?>">
            <input type="hidden" name="coin_user" id="coin_user" value="<?php echo "$coin_user"; ?>">
            <button class="btn btn-lg btn-success" type="submit" style="border-radius:30px">&nbsp;&nbsp;สั่งซื้อสินค้า&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn btn-lg btn-danger" type="reset" style="border-radius:30px">&nbsp;&nbsp;ยกเลิก&nbsp;&nbsp;</button>
        </div>
    </div>
</form>
<script>
    function cal_order1(){
        var pay_order1=document.getElementById("pay_order1").value;
        document.getElementById("pay_order2").checked=false;
        if(pay_order1=="1"){
            var coin_pro=document.getElementById("coin_pro1").value;
            document.getElementById("coin_pro").value=coin_pro.toString();
            var price_pro=parseInt(document.getElementById("price_pro").value);
            var disc=parseInt(document.getElementById("disc").value);
            var sum1=price_pro*50/100;
            var discount=sum1*disc/100;
            var total_order=sum1-discount;
            document.getElementById("sum1").value=sum1.toString();
            document.getElementById("discount").value=discount.toString();
            document.getElementById("total_order").value=total_order.toString();
        }else{
            document.form1.price_pro.disabled=false;
            document.form1.coin_pro.disabled=true;
        }
    }
    function cal_order2(){
        var pay_order2=document.getElementById("pay_order2").value;
        document.getElementById("pay_order1").checked=false;
        if(pay_order2=="2"){
            var coin_pro=document.getElementById("coin_pro1").value;
            document.getElementById("coin_pro").value="0";
            var price_pro=parseInt(document.getElementById("price_pro").value);
            var disc=parseInt(document.getElementById("disc").value);
            var sum1=price_pro-0;
            var discount=sum1*disc/100;
            var total_order=sum1-discount;
            document.getElementById("sum1").value=sum1.toString();
            document.getElementById("discount").value=discount.toString();
            document.getElementById("total_order").value=total_order.toString();
        }else{
            document.form1.price_pro.disabled=true;
            document.form1.coin_pro.disabled=false;
        }
    }
    function cal_order3(){
        var pay_order3=document.getElementById("pay_order3").value;
        if(pay_order3=="3"){
            var coin_pro=document.getElementById("coin_pro").value;
            document.getElementById("coin_pro").value="แต้มไม่เพียงพอ";
            var price_pro=parseInt(document.getElementById("price_pro").value);
            var disc=parseInt(document.getElementById("disc").value);
            var sum1=price_pro-0;
            var discount=sum1*disc/100;
            var total_order=sum1-discount;
            document.getElementById("sum1").value=sum1.toString();
            document.getElementById("discount").value=discount.toString();
            document.getElementById("total_order").value=total_order.toString();
        }else{
            document.form1.price_pro.disabled=true;
            document.form1.coin_pro.disabled=false;
        }
    }
</script>