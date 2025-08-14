<?php
    include "head.php";
    include "function_sum.php";
    if($_SESSION["valid_user"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_his where id_user='$_SESSION[valid_user]' order by id_his desc";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="bg"><br><br>
    <div class="container">
        <center><h2><b>แบบบันทึกสุขภาพประจำวัน</b></h2></center>
        <a href="#btn_add1" data-bs-toggle="modal" data-bs-target="#btn_add1" style="border-radius:30px" class="btn btn-lg btn-success">แบบบันทุกสุขภาพ</a><hr><br>
        <?php
            if($num==0){
                echo "<br><br><br><br><center><h2><b class='text-danger'>ยังไม่มีการบันทึกสุขภาพ</b></h2></center><br><br><br><br>";
            }else{
        ?>
        <table class="table table-hover table-striped">
            <tr class="h5" align="center">
                <th>วันที่บันทึก</th>
                <th>ความดันค่าบน</th>
                <th>ความดันค่าล่าง</th>
                <th>อัตราการเต้นของหัวใจ</th>
                <th>อาการเพิ่มเติม</th>
                <th>แต้มแลกซื้อ</th>
                <th>สถานะอาการ</th>
                <th>แชท</th>
                <th>ลบ</th>
            </tr>
            <?php
                $i=1;
                while($read=mysqli_fetch_assoc($result)){
                    $id_his=$read["id_his"];
                    $id_user=$read["id_user"];
                    $sys=$read["sys"];
                    $dia=$read["dia"];
                    $heart=$read["heart"];
                    $day_in=$read["day_in"];
                    $day_in=displaydate($day_in);
                    $detail=$read["detail"];
                    $coin_user=$read["coin_user"];
                    $status_mem=$read["status_mem"];
                    if($status_mem==7){
                        $show="<b class='text-danger'>พบแพทย์</b>";
                        $c="<b class='text-danger'>$coin_user แต้ม</b>";
                        if($coin_user==0){
                            $c="<b class='text-danger'>ไม่ได้รับแต้ม</b>";
                        }
                    }else if($status_mem==6){
                        $show="<b class='text-warning'>อัตราความดันสูง <br>อัตราการเต้นของหัวใจผิดปกติ</b>";
                        $c="<b class='text-warning'>$coin_user แต้ม</b>";
                        if($coin_user==0){
                            $c="<b class='text-danger'>ไม่ได้รับแต้ม</b>";
                        }
                    }else if($status_mem==5){
                        $show="<b class='text-warning'>อัตราความดันสูง <br>อัตราการเต้นของหัวใจปกติ</b>";
                        $c="<b class='text-warning'>+$coin_user แต้ม</b>";
                        if($coin_user==0){
                            $c="<b class='text-danger'>ไม่ได้รับแต้ม</b>";
                        }
                    }else if($status_mem==4){
                        $show="<b class='text-warning'>อัตราความดันเริ่มสูง <br>อัตราการเต้นของหัวใจผิดปกติ</b>";
                        $c="<b class='text-warning'>+$coin_user แต้ม</b>";
                        if($coin_user==0){
                            $c="<b class='text-danger'>ไม่ได้รับแต้ม</b>";
                        }
                    }else if($status_mem==3){
                        $show="<b class='text-warning'>อัตราความดันเริ่มสูง <br>อัตราการเต้นของหัวใจปกติ</b>";
                        $c="<b class='text-warning'>+$coin_user แต้ม</b>";
                        if($coin_user==0){
                            $c="<b class='text-danger'>ไม่ได้รับแต้ม</b>";
                        }
                    }else if($status_mem==2){
                        $show="<b class='text-warning'>อัตราความดันกปกติ <br>อัตราการเต้นของหัวใจผิดปกติ</b>";
                        $c="<b class='text-warning'>+$coin_user แต้ม</b>";
                        if($coin_user==0){
                            $c="<b class='text-danger'>ไม่ได้รับแต้ม</b>";
                        }
                    }else{
                        $show="<b class='text-success'>สุขภาพร่างกายปกติ</b>";
                        $c="<b class='text-success'>+$coin_user แต้ม</b>";
                        if($coin_user==0){
                            $c="<b class='text-danger'>ไม่ได้รับแต้ม</b>";
                        }
                    }
            ?>
            <tr align="center">
                <td><?php echo "$day_in"; ?></td>
                <td><?php echo "$sys"; ?></td>
                <td><?php echo "$dia"; ?></td>
                <td><?php echo "$heart"; ?></td>
                <td><?php echo "$detail"; ?></td>
                <td><?php echo "$c"; ?></td>
                <td><?php echo "$show"; if($status_mem==7){ echo "&nbsp;&nbsp;<a href='tel:1669' class='btn btn-danger'>1669</a>"; } ?></td>
                <td><?php echo "<a href='doc_h.php?id_his=$id_his' class='btn btn-success'>แชท</a>"; ?></td>
                <td><?php echo "<a href='health_del.php?id_his=$id_his' class='btn btn-danger'>ลบ</a>"; ?></td>
            </tr>
            <?php
                $i++;
                }
            ?>
        </table><br><br><br><br><br><br><br>
        <?php } ?>
    </div><br><br>
</div>
<?php
    include "tel.php";
    include "health1.php";
    include "footer.php";
?>