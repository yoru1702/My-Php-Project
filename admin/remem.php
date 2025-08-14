<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_user order by id_user desc";
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
            <center><h2><b>รายงานข้อมูลผู้ใช้</b></h2></center><br>
            <a class="btn btn-primary" href="remem2.php" targer="_blank">พิมพ์รายงาน</a><br><hr><br>
            <!-- <a class="btn btn-primary" href="remem2.php" onclick="window.print()">พิมพ์รายงาน</a><br><hr><br> -->
            <?php
                if($num==0){
                    echo "<center><h2><b><font color='red'>ไม่พบข้อมูล</font></b></h2></center>";
                }else{
                    echo "<center><h2><b><font color='blue'>ข้อมูล $num รายการ</font></b></h2></center>";
            ?><br>
            <h4><b>ยอดผู้ใช้งาน :</b></h4>
            <div class="progress" style="height:60px">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" aria-value="<?php echo "$per";?>" style="width:<?php echo "$per";?>">
                    <h4><b><?php echo "$per";?> คน</b></h4>
                </div>
            </div><br>
            <table class="table table-holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>อายุ</th>
                    <th>สถานะ</th>
                    <th>แพ็คเกจ</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_user=$read["id_user"];
                        $id_pack=$read["id_pack"];
                        $name_user=$read["name_user"];
                        $sname_user=$read["sname_user"];
                        $born=$read["born"];
                        $born=getage($born);
                        $status_mem=$read["status_mem"];
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
                        $pic_user=$read["pic_user"];
                        if($pic_user==""){
                            $pic_user="user.jpg";
                        }
                        $sql1="select * from tb_package where id_pack='$id_pack'";
                        $result1=mysqli_query($conn,$sql1);
                        $read1=mysqli_fetch_assoc($result1);
                        $name_pack=$read1["name_pack"];
                ?>
                <tr align="center">
                    <td><?php echo "$i";?></td>
                    <td><?php echo "<img src='user/$pic_user' class='rounded-pill' width='100'><br>$name_user $sname_user";?></td>
                    <td><?php echo "$born";?> ปี</td>
                    <td><?php echo "$show";?></td>
                    <td><?php echo "$name_pack";?></td>
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