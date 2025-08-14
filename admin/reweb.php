<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_webques order by id_wques desc";
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
            <center><h2><b>รายงานสังคมออนไลน์</b></h2></center><br>
            <a class="btn btn-primary" href="reweb2.php" targer="_blank">พิมพ์รายงาน</a><br><hr><br>
            <!-- <a class="btn btn-primary" href="reweb2.php" onclick="window.print()">พิมพ์รายงาน</a><br><hr><br> -->
            <?php
                if($num==0){
                    echo "<center><h2><b><font color='red'>ไม่พบข้อมูล</font></b></h2></center>";
                }else{
                    echo "<center><h2><b><font color='blue'>ข้อมูล $num รายการ</font></b></h2></center>";
            ?><br>
            <table class="table table-holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>หัวข้อ</th>
                    <th>วันที่อัปโหลด</th>
                    <th>ประเภท</th>
                    <th>ยอด Like</th>
                    <th>ความคิดเห็น</th>
                    <th>ยอดเข้าชม</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_wques=$read["id_wques"];
                        $detail_ques=$read["detail_ques"];
                        $type_ques=$read["type_ques"];
                        if($type_ques==1){
                            $type_ques="สุขภาพ";
                        }else if($type_ques==2){
                            $type_ques="เวชสำอาง";
                        }else{
                            $type_ques="ทั่วไป";
                        }
                        $day_ques=$read["day_ques"];
                        if($day_ques!=""){
                            $day_ques=displaydate($day_ques);
                        }
                        $sql1="select * from tb_like where id_wques='$id_wques'";
                        $result1=mysqli_query($conn,$sql1);
                        $num1=mysqli_num_rows($result1);
                        $sql2="select * from tb_webans where id_wques='$id_wques'";
                        $result2=mysqli_query($conn,$sql2);
                        $num2=mysqli_num_rows($result2);
                        $num3=$num1+$num2;
                ?>
                <tr align="center">
                    <td><?php echo "$i";?></td>
                    <td align="left"><?php echo "$detail_ques";?></td>
                    <td><?php echo "$day_ques";?></td>
                    <td><?php echo "$type_ques";?></td>
                    <td><?php echo "".number_format($num1). " Like";?></td>
                    <td><?php echo "".number_format($num2). " รายการ";?></td>
                    <td><?php echo "".number_format($num3). " ครั้ง";?></td>
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