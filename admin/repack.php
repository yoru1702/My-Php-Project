<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_user where status_pack='y'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    $sql1="select * from tb_package where id_pack between '3' and '10'";
    $result1=mysqli_query($conn,$sql1);
    $num1=mysqli_num_rows($result1);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-12 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-12">
        <div class="container"><br>
            <center><h2><b>รายงานรายได้จากแพ็คเกจ</b></h2></center><br>
            <a class="btn btn-primary" href="repack2.php" targer="_blank">พิมพ์รายงาน</a><br><hr><br>
            <!-- <a class="btn btn-primary" href="repack2.php" onclick="window.print()">พิมพ์รายงาน</a><br><hr><br> -->
            <?php
                if($num==0){
                    echo "<center><h2><b><font color='red'>ไม่พบข้อมูล</font></b></h2></center>";
                }else{
                    echo "<center><h2><b><font color='blue'>ข้อมูล $num1 รายการ</font></b></h2></center>";
            ?>
            <table class="table table holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>แพ็คเกจ</th>
                    <th>ราคาแพ็คเกจ</th>
                    <th>จำนวน</th>
                    <th>รายได้</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result1)){
                        $id_pack=$read["id_pack"];
                        $name_pack=$read["name_pack"];
                        $price_pack=$read["price_pack"];
                        $sql2="select * from tb_package,tb_user where tb_package.id_pack=tb_user.id_pack and tb_package.id_pack between '3' and '10' and tb_package.id_pack='$id_pack'";
                        $result2=mysqli_query($conn,$sql2);
                        $num2=mysqli_num_rows($result2);
                        $total=$price_pack*$num2;
                    ?>
                <tr align="center">
                    <td><?php echo "$i";?></td>
                    <td><?php echo "$name_pack";?></td>
                    <td><?php echo "".number_format($price_pack)." บาท";?></td>
                    <td><?php echo "".number_format($num2)." บาท";?></td>
                    <td><?php echo "".number_format($total)." บาท";?></td>
                </tr>
                <?php 
                    $i++;
                    $net+=$total;
                    $count+=$num2;
                    }
                ?>
                <tr align="center">
                    <th colspan="3"><h3>รวมรายได้จากแพ็คเกจ</h3></th>
                    <th><h3><?php echo "".number_format($count)." คน";?></h3></th>
                    <th><h3><?php echo "".number_format($net)." บาท";?></h3></th>
                </tr>
            </table>
            <?php } ?>
        </div>
    </div>
</div>
<?php include "footer.php";?>