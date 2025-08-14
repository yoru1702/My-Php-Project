<?php
    $sql="select * from tb_pr where type_ques!='4' order by id_pr desc limit 0,3";
    $result=mysqli_query($conn,$sql);
?>
    <div class="container">
        <center><h2><b>ผู้สนับสนุน</b></h2></center><hr><br>
        <?php
            $chk=1;
            while($read=mysqli_fetch_assoc($result)){
                $id_pr=$read["id_pr"];
                $name_pr=$read["name_pr"];
                $detail_pr=$read["detail_pr"];
                $tel_pr=$read["tel_pr"];
                $pic_pr=$read["pic_pr"];
                if($pic_pr==""){
                    $pic_pr="no.jpg";
                }
                if($chk%3==1){
                    echo "<div class='row'>";
                }
        ?>
        <div class="col-lg-4 col-sm-4 col-12">
            <div class="card" style="border-radius:30px">
                <div class="card-img-top"><?php echo "<img src='admin/pr/$pic_pr' class='img-fluid rounded w-100'>"; ?></div>
                <div class="card-body">
                    <div class="card-title"><h4><b><?php echo "$name_pr"; ?></b></h4></div><hr>
                    <div class="card-text"><h5><b><?php echo "$detail_pr"; ?></b></h5></div>
                    <div align="right"><span class="badge bg-success"><h5><b>Tel : <?php echo "$tel_pr"; ?></b></h5></span></div>
                </div>
            </div>
        </div>
        <?php
            if($chk%3==0){
                echo "</div><br>";
            }
            $chk++;
            }
        ?>
    </div><br><br>