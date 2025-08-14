<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_pr where type_ques!='4' order by id_pr desc";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-12 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-12">
        <div class="container"><br>
            <center><h2><b>รายงานรายได้จากป้ายโฆษณา</b></h2></center><br>
            <a class="btn btn-primary" href="repr2.php" targer="_blank">พิมพ์รายงาน</a><br><hr><br>
            <!-- <a class="btn btn-primary" href="repr2.php" onclick="window.print()">พิมพ์รายงาน</a><br><hr><br> -->
            <?php
                if($num==0){
                    echo "<center><h2><b><font color='red'>ไม่พบข้อมูล</font></b></h2></center>";
                }else{
                    echo "<center><h2><b><font color='blue'>ข้อมูล $num รายการ</font></b></h2></center>";
            ?>
            <table class="table table holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th width="60%">ป้ายโฆษณา</th>
                    <th>ผู้ลงโฆษณา</th>
                    <th>เบอร์โทร</th>
                    <th>ประเภท</th>
                    <th>รายได้</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_pr=$read["id_pr"];
                        $name_pr=$read["name_pr"];
                        $tel_pr=$read["tel_pr"];
                        $type_ques=$read["type_ques"];
                        $price_pr=$read["price_pr"];
                        if($type_ques==1){
                            $type_ques="สุขภาพ";
                        }else if($type_ques==2){
                            $type_ques="เวชสำอาง";
                        }else{
                            $type_ques="ทั่วไป";
                        }
                        $pic_pr=$read["pic_pr"];
                        if($pic_pr==""){
                            $pic_pr="no.jpg";
                        }
                ?>
                <tr align="center">
                    <td><?php echo "$i";?></td>
                    <td><?php echo "<img src='pr/$pic_pr' class='img-fluid' width='40%'>";?></td>
                    <td><?php echo "$name_pr";?></td>
                    <th class="text-success"><?php echo "".substr($tel_pr,0,3)."-".substr($tel_pr,3,7);?></th>
                    <td><?php echo "$type_ques";?></td>
                    <td><?php echo "".number_format($price_pr)." บาท";?></td>
                </tr>
                <?php 
                    $i++;
                    $net+=$price_pr;
                    }
                ?>
                <tr align="center">
                    <th colspan="5"><h3>รวมรายได้จากป้ายโฆษณา</h3></th>
                    <th><h3><?php echo "".number_format($net)." บาท";?></h3></th>
                </tr>
            </table>
            <?php } ?>
        </div>
    </div>
</div>
<?php include "footer.php";?>