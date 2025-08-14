<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_ques_n where type_ques_n='1' and status_n='y'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-12 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-12">
        <div class="container"><br>
            <center><h2><b>รายงานแบบประเมินความพึงพอใจต่อการใช้งานเว็บไซต์</b></h2></center><br>
            <a class="btn btn-primary" href="reques2.php" targer="_blank">พิมพ์รายงาน</a><br><hr><br>
            <!-- <a class="btn btn-primary" href="reques2.php" onclick="window.print()">พิมพ์รายงาน</a><br><hr><br> -->
            <?php
                if($num==0){
                    echo "<center><h2><b><font color='red'>ไม่พบข้อมูล</font></b></h2></center>";
                }else{
            ?>
            <table class="table table holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>คำถาม</th>
                    <th>คะแนนความพึงพอใจ เต็ม 5 คะแนน</th>
                    <th>ระดับความพึงพอใจ</th>
                    
                </tr>
                <?php
                    $i=1;
                    $sql1="select * from tb_question where type_ques_n='1'";
                    $result1=mysqli_query($conn,$sql1);
                    while($read=mysqli_fetch_assoc($result1)){
                        $id_ques=$read["id_ques"];
                        $question=$read["question"];
                        $sum[$i]=totalscor($id_ques,$num);
                        if($sum[$i] <= 5 and $sum[$i] >= 4.50){
                            $b="<center><b><font color='green'>มากที่สุด</font></b></center>";
                        }else if($sum[$i] <= 4.49 and $sum[$i] >= 3.50){
                            $b="<center><b><font color='green'>มาก</font></b></center>";
                        }else if($sum[$i] <= 3.49 and $sum[$i] >= 2.50){
                            $b="<center><b><font color='orange'>ปานกลาง</font></b></center>";
                        }else if($sum[$i] <= 2.49 and $sum[$i] >= 1.50){
                            $b="<center><b><font color='red'>น้อย</font></b></center>";
                        }else{
                            $b="<center><b><font color='red'>น้อยที่สุด</font></b></center>";
                        }
                        $total=$sum[$i]+$total;
                ?>
                <tr align="center">
                    <td><?php echo "$i";?></td>
                    <td align="left"><?php echo "$question";?></td>
                    <td><?php echo "".number_format($sum[$i],2,'.',',')."";?></td>
                    <td><?php echo "$b";?></td>
                </tr>
                <?php 
                    $i++;
                    $net=$total/($i-1);
                    }
                    if($net <= 5 and $net >= 4.50){
                        $b="<center><b><font color='green'>มากที่สุด</font></b></center>";
                    }else if($net <= 4.49 and $net >= 3.50){
                        $b="<center><b><font color='green'>มาก</font></b></center>";
                    }else if($net <= 3.49 and $net >= 2.50){
                        $b="<center><b><font color='orange'>ปานกลาง</font></b></center>";
                    }else if($net <= 2.49 and $net >= 1.50){
                        $b="<center><b><font color='red'>น้อย</font></b></center>";
                    }else{
                        $b="<center><b><font color='red'>น้อยที่สุด</font></b></center>";
                    }
                ?>
                <tr align="center">
                    <th colspan="2"><h3>รวมคะแนนความพึงพอใจ</h3></th>
                    <th><h3><?php echo "".number_format($net,2,'.',',')."";?></h3></th>
                    <th><h3><?php echo "$b";?></h3></th>
                </tr>
            </table>
            <?php } ?>
        </div>
    </div>
</div>
<?php include "footer.php";?>