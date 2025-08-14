<?php
    include "head.php";
    if($_SESSION["valid_user"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
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
    $sql1="select * from tb_package order by id_pack limit 2,10";
    $result1=mysqli_query($conn,$sql1);
?>
<div class="bg"><br><br>
    <div class="container">
        <center><h2><b>แพ็คเกจสุขภาพ</b></h2></center><hr><br>
        <?php if($status_pack=="n"){ ?>
            <form action="recom2.php" name="form1" method="post">
                <?php
                    $chk=1;
                    while($read1=mysqli_fetch_assoc($result1)){
                        $id_pack=$read1["id_pack"];
                        $name_pack=$read1["name_pack"];
                        $detail_pack=$read1["detail_pack"];
                        $price_pack=$read1["price_pack"];
                        if($chk%2==1){
                            echo "<div class='row'>";
                        }
                ?>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="card" style="border-radius:30px">
                        <div class="card-body">
                            <div class="card-title"><h4 class="border-bottom"><b><?php echo "$name_pack"; ?></b></h4></div>
                            <div class="card-text"><h5><b><?php echo "$detail_pack"; ?></b></h5></div><br><br><br><br>
                            <div align="right"><span class="badge bg-success"><h5><b>ราคา <?php echo "$price_pack"; ?> บาท</b></h5></span></div>
                            <h3><input type="radio" class="form-check-input" name="id_pack" id="id_pack" value="<?php echo "$id_pack"; ?>"></h3>
                        </div>
                    </div>
                </div><br>
                <?php
                    if($chk%2==0){
                        echo "</div><br>";
                    }
                    $chk++;
                    }
                ?>  
                <center>
                    <button class="btn btn-lg btn-success" type="submit" style="border-radius:30px">เลือกแพ็คเกจ</button>&nbsp;&nbsp;&nbsp;
                    <a href="index.php" class="btn btn-lg btn-outline-success" style="border-radius:30px">ไว้ภายหลัง</a>
                </center>
            </form><br>
        <?php }else if($status_pack=="y"){ ?>
            <h5><b>แพ็คเกจสุขภาพปัจจุบันของท่าน :</b></h5>
            <?php
                $sql2="select * from tb_package,tb_user where tb_package.id_pack=tb_user.id_pack and tb_user.id_user='$_SESSION[valid_user]'";
                $result2=mysqli_query($conn,$sql2);
                $read2=mysqli_fetch_assoc($result2);
                $id_pack=$read2["id_pack"];
                $name_pack=$read2["name_pack"];
                $detail_pack=$read2["detail_pack"];
                $price_pack=$read2["price_pack"];
            ?>
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
                <a href="pack2.php" class="btn btn-lg btn-warning w-100" style="border-radius:30px">เปลี่ยนแพ็คเกจ</a>
            </center>
        <?php } ?>
    </div><br><br>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>