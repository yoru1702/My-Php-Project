<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_admin order by id_ad desc";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    $per=($num*100)/100;

?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-12 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-12">
        <div class="container"><br>
            <center><h2><b>รายงานข้อมูลแอดมิน/แพทย์</b></h2></center><br>
            <a class="btn btn-primary" href="read2.php" targer="_blank">พิมพ์รายงาน</a><br><hr><br>
            <!-- <a class="btn btn-primary" href="read2.php" onclick="window.print()">พิมพ์รายงาน</a><br><hr><br> -->
            <?php
                if($num==0){
                    echo "<center><h2><b><font color='red'>ไม่พบข้อมูล</font></b></h2></center>";
                }else{
                    echo "<center><h2><b><font color='blue'>ข้อมูล $num รายการ</font></b></h2></center>";
            ?><br>
            <h4><b>ยอดแอดมิน/แพทย์ :</b></h4>
            <div class="progress" style="height:60px">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" aria-value="<?php echo "$per";?>" style="width:<?php echo "$per";?>">
                    <h4><b><?php echo "$per";?> คน</b></h4>
                </div>
            </div><br>
            <table class="table table holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>เบอร์โทร</th>
                    <th>แพ็คเกจ</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_ad=$read["id_ad"];
                        $id_pack=$read["id_pack"];
                        $name_ad=$read["name_ad"];
                        $sname_ad=$read["sname_ad"];
                        $tel_ad=$read["tel_ad"];
                        $type_ad=$read["type_ad"];
                        $pic_ad=$read["pic_ad"];
                        if($pic_ad==""){
                            $pic_ad="admin.jpg";
                        }
                        $sql1="select * from tb_package where id_pack='$id_pack'";
                        $result1=mysqli_query($conn,$sql1);
                        $read1=mysqli_fetch_assoc($result1);
                        $name_pack=$read1["name_pack"];
                        if($type_ad==1){
                            $type_ad="Admin";
                        }else{
                            $type_ad="$name_pack";
                        }
                ?>
                <tr align="center">
                    <td><?php echo "$i";?></td>
                    <td><?php echo "<img src='admin/$pic_ad' class='rounded-pill' width='100'><br>$name_ad $sname_ad";?></td>
                    <td class="text-success"><?php echo "".substr($tel_ad,0,3)."-".substr($tel_ad,3,7)."";?></td>
                    <td><?php echo "$type_ad";?></td>
                </tr>
                <?php 
                    $i++;
                    }
                ?>
            </table>
            <?php } ?>
        </div>
    </div>
</div>
<?php include "footer.php";?>