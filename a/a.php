<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    $sql="select * from tb_user";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-12 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-2 col-sm-2 col-12">
        <div class="container"><br>
            <center><h2><b>ข้อมูลแอดมิน/แพทย์</b></h2></center><br>
            <a class="btn btn_add btn-pirmary">เพิ่มแอดมิน/แพทย์</a>
            <form action="admin.php" method="post">
                <div class="input-group">
                    <span class="input-group-text">ค้นหา</span>
                    <input type="text" name="name" id="name" class="form-control" placeholder="ค้นหา">
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </div>
            </form><br>
            
        </div>
    </div>
</div>`````````````


            <?php
                if($num==0){
                    echo "<center><h2><b><font color='red'>ไม่พบข้อมูล</font></b></h2></center>";
                }else{
                    echo "<center><h2><b><font color='blue'>ข้อมูล $num รายการ</font></b></h2></center>";
            ?>
            <table class="table table holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_ad=$read["id_ad"];
                    
                ?>
                <tr align="center">
                    <th><?php echo "$i";?></th>
                </tr>
                <?php } ?>
            </table>
            <?php } ?>