<?php
    include "head.php";
    if($_SESSION["valid_user"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql2="select * from tb_package,tb_user where tb_package.id_pack=tb_user.id_pack and tb_user.id_user='$_SESSION[valid_user]'";
    $result2=mysqli_query($conn,$sql2);
    $read2=mysqli_fetch_assoc($result2);
    $id_pack=$read2["id_pack"];
    $name_pack=$read2["name_pack"];
    $detail_pack=$read2["detail_pack"];
    $price_pack=$read2["price_pack"];
?>
<div class="bg"><br><br>
    <div class="container">
        <center><h2><b>ยืนยันการสั่งซื้อแพ็คเกจ</b></h2></center><hr><br>
            <div class="col-lg-12 col-sm-12 col-12">
                <div class="card" style="border-radius:30px">
                    <div class="card-body">
                        <div class="card-title"><h4 class="border-bottom"><b><?php echo "$name_pack"; ?></b></h4></div>
                        <div class="card-text"><h5><b><?php echo "$detail_pack"; ?></b></h5></div><br><br><br><br>
                        <div align="right"><span class="badge bg-success"><h5><b>ราคา <?php echo "$price_pack"; ?> บาท</b></h5></span></div>
                    </div>
                </div>
            </div><br>
            <center>
                <a href="tel:0000000000" class="btn btn-lg btn-success w-100" style="border-radius:30px">โทรสั่งซื้อ</a>
            </center>
    </div><br><br>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>