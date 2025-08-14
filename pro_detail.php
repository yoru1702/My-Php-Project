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
?>
<form action="pro_detail2.php" enctype="multipart/form-data" onsubmit="return check()" method="post">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            <h2><b>รายละเอียดสินค้า</b></h2>
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
            <?php include "banner3.php"; ?>
        </div>
    </div>
</form>