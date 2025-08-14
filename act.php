<?php
    include "head.php";
    include "function_sum.php";
    if($_SESSION["valid_user"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_act order by id_act desc";
    $result=mysqli_query($conn,$sql);
?>
<div class="bg"><br><br><br>
    <div class="container">
        <center><h2><b>กิจกรรมชิงแต้มแลกซื้อ</b></h2></center><hr><br>
        <?php
            $chk=1;
            while($read=mysqli_fetch_assoc($result)){
                $id_act=$read["id_act"];
                $name_act=$read["name_act"];
                $detail_act=$read["detail_act"];
                $coin=$read["coin"];
                $status_act=$read["status_act"];
                if($status_act=="n"){
                    $sa="<b class='text-success'>เริ่มแล้ว!!!</b>";
                }else if($status_act=="y"){
                    $sa="<b class='text-danger'>หมดเวลา!!!</b>";
                }
                $day_in=$read["day_in"];
                $day_in=displaydate($day_in);
                $day_out=$read["day_out"];
                $day_out=displaydate($day_out);
                $pic_act=$read["pic_act"];
                if($pic_act==""){
                    $pic_act="no.jpg";
                }
                if($chk%2==1){
                    echo "<div class='row'>";
                }
        ?>
        <div class="col-lg-6 col-sm-6 col-12">
            <div class="card" style="border-radius:30px">
                <div class="card-img-top"><?php echo "<a href='act_post.php?id_act=$id_act'><img src='admin/act/$pic_act' class='rounded img-fluid w-100'></a>"; ?></div>
                <div class="card-body">
                    <div class="card-title"><h4><b><?php echo "$name_act"; ?></b></h4></div><hr>
                    <div class="card-text"><h5><b>วันที่เริ่ม : <b class="text-success"><?php echo "$day_in"; ?></b></b></h5></div>
                    <div class="card-text"><h5><b>วันที่สิ้นสุด : <b class="text-danger"><?php echo "$day_out"; ?></b></b></h5></div><hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div align="left"><h5><b>รางวัล : <b class="text-success"><?php echo "$coin"; ?></b>  <img src="img/coin.png" width="25" class="img-fluid"></b></h5></div>
                        </div>
                        <div class="col-sm-6">
                            <div align="right"><h5><b>สถานะ : <?php echo "$sa"; ?></b></h5></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        <?php
            if($chk%2==0){
                echo "</div><br>";
            }
            $chk++;
            }
        ?>
    </div><br><br>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>