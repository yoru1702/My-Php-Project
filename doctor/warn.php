<?php
    session_start();
    include "config.inc.php";
    include "head2.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_alert,tb_user where tb_alert.id_user=tb_user.id_user and status_alert='n'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-12 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-12">
        <div class="container"><br>
            <form action="warn2.php" name="form1" method="post" enctype="multipart/form-data">
                <div class="card" style="border-radius:30px">
                    <div class="card-header">
                        <center><h2><b>แจ้งเตือนรับประทานยา</b></h2></center>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-12 py-1">
                                <label>วันที่แจ้งเตือน :</label>
                                <input type="date" class="form-control" name="day_alert" id="day_alert" placeholder="กรอกชื่อ" required>
                            </div>
                            <div class="col-sm-6 col-12 py-1">
                                <label>เวลาแจ้งเตือน :</label>
                                <input type="time" class="form-control" name="time_alert" id="time_alert" placeholder="กรอกนามสกุล" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-12 py-1">
                                <label>ข้อความแจ้งเตือนรับปะรทานยา :</label>
                                <textarea name="detail_alert" id="detail_alert" rows="3" placeholder="ข้อความแจ้งเตือนรับปะรทานยา................" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <center>
                        <button class="btn btn-lg btn-success" type="submit" style="border-radius:30px">แจ้งเตือนรับประทานยา</button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-lg btn-danger" type="reset" style="border-radius:30px">ยกเลิก</button>&nbsp;
                    </center><br>
                </div><br>
            </form>
            <center><h2><b>รายการแจ้งเตือนรับประทานยา</b></h2></center><br><hr><br>
            <?php
                if($num==0){
                    echo "<center><h2><b><font color='red'>ไม่พบข้อมูล</font></b></h2></center>";
                }else{ 
            ?><br>
            <table class="table table-holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>วันที่แจ้ง</th>
                    <th>เวลาแจ้ง</th>
                    <th>สถานะ</th>
                    <th>โทรติดต่อ</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_alert=$read["id_alert"];
                        $id_user=$read["id_user"];
                        $name_user=$read["name_user"];
                        $sname_user=$read["sname_user"];
                        $tel=$read["tel"];
                        $day_alert=$read["day_alert"];
                        if($day_alert!=""){
                            $day_alert=displaydate($day_alert);
                        }
                        $time_alert=$read["time_alert"];
                        $status_alert=$read["status_alert"];
                        if($status_alert=="n"){
                            $show="<font color='red'><b>ยังไม่ได้รับประทานยา</b></font>";
                        }
                ?>
                <tr align="center">
                    <td><?php echo "$i";?></td>
                    <td><?php echo "$name_user $sname_user";?></td>
                    <td><?php echo "$day_alert";?></td>
                    <td><?php echo "$time_alert";?></td>
                    <td><?php echo "$show";?></td>
                    <td><?php echo "<a class='btn btn-warning' href='tel:$tel'>โทรติดต่อ</a>";?></td>
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