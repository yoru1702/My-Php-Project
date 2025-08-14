<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_meet,tb_user where tb_meet.id_user=tb_user.id_user and status_meet='y'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-12 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-12">
        <div class="container"><br>
            <center><h2><b>รายงานรายได้จากค่าบริการนอกสถานที่ของแพทย์</b></h2></center><br>
            <a class="btn btn-primary" href="remeet2.php" targer="_blank">พิมพ์รายงาน</a><br><hr><br>
            <!-- <a class="btn btn-primary" href="remeet2.php" onclick="window.print()">พิมพ์รายงาน</a><br><hr><br> -->
            <?php
                if($num==0){
                    echo "<center><h2><b><font color='red'>ไม่พบข้อมูล</font></b></h2></center>";
                }else{
                    echo "<center><h2><b><font color='blue'>ข้อมูล $num รายการ</font></b></h2></center>";
            ?>
            <table class="table table holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>วันที่นัด</th>
                    <th>เวลานัด</th>
                    <th>รายได้</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_meet=$read["id_meet"];
                        $id_user=$read["id_user"];
                        $name_user=$read["name_user"];
                        $sname_user=$read["sname_user"];
                        $day_meet=$read["day_meet"];
                        if($day_meet!=""){
                            $day_meet=displaydate($day_meet);
                        }
                        $time_meet=$read["time_meet"];
                        $sql2="select sum(total) as total from tb_meet,tb_user where tb_meet.id_user=tb_user.id_user and tb_meet.id_meet='$id_meet' and status_meet='y'";
                        $result2=mysqli_query($conn,$sql2);
                        $read2=mysqli_fetch_assoc($result2);
                        $total=$read2["total"];
                    ?>
                <tr align="center">
                    <td><?php echo "$i";?></td>
                    <td><?php echo "$name_user $sname_user";?></td>
                    <td><?php echo "$day_meet";?></td>
                    <td><?php echo "$time_meet";?></td>
                    <td><?php echo "".number_format($total)." บาท";?></td>
                </tr>
                <?php 
                    $i++;
                    $net+=$total;
                    }
                ?>
                <tr align="center">
                    <th colspan="4"><h3>รวมรายได้จากค่าบริการนอกสถานที่ของแพทย์</h3></th>
                    <th><h3><?php echo "".number_format($net)." บาท";?></h3></th>
                </tr>
            </table>
            <?php } ?>
        </div>
    </div>
</div>
<?php include "footer.php";?>