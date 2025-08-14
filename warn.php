<?php
    include "head.php";
    include "function_sum.php";
    if($_SESSION["valid_user"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_alert where id_user='$_SESSION[valid_user]' and status_alert='n'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $num=mysqli_num_rows($result);
    $day_alert=$read["day_alert"];
    if($day_alert!=""){
        $day_alert=displaydate($day_alert);
    }
    $time_alert=$read["time_alert"];
    $detail_alert=$read["detail_alert"];
    $status_alert=$read["status_alert"];
    if($status_alert=="n"){
        $show="<b class='text-danger'>ยังไม่ได้รับประทานยา</b>";
    }
?>
<div class="bg"><br><br><br>
    <div class="container">
        <div class="card" style="border-radius:30px">
            <div class="card-header">
                <center><h2><b><?php if($num>0){ echo "<div class='spinner-grow bg-danger'></div>&nbsp;&nbsp;&nbsp;
                                <audio autoplay='1' loop='loop'><source src='sound/Alarm04.wav' type='audio/wav'></audio>"; 
                                } ?>แจ้งเตือนรับประทานยา</b></h2></center>
            </div>
            <div class="card-body">
                <center><img src="img/3.png" width="250" class="img-fluid"></center>
                <?php
                    if($num==0){
                        echo "<br><br><br><br><center><h2><b class='text-danger'>ยังไม่มีการแจ้งเตือน</b></h2></center><br><br><br><br>";
                    }else{
                ?>
                <center><h4><br><br>
                    <?php echo "$show"; ?><br>
                    <table>
                        <tr>
                            <th>วันที่แจ้งเตือน</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <th>:</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><b class="text-success"><?php echo "$day_alert"; ?></b></td>
                        </tr>
                        <tr>
                            <th>เวลาแจ้งเตือน</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <th>:</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><b class="text-success"><?php echo "$time_alert"; ?></b></td>
                        </tr>
                        <tr>
                            <th>รายละเอียดแจ้งเตือน</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <th>:</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><b class="text-success"><?php echo "$detail_alert"; ?></b></td>
                        </tr>
                    </table><br>
                    <a href="warn2.php" class="btn btn-lg btn-success w-50" type="submit" style="border-radius:30px">ยืนยันการรับประทานยา</a>
                </h4></center>
                <?php } ?>
            </div>
        </div>
    </div><br><br>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>