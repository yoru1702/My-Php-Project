<?php
    $sql="select * from tb_pr where type_ques='$type_ques' order by id_pr desc";
    $result=mysqli_query($conn,$sql);
?><br>
<div class="card" style="border-radius:20px">
    <div class="carousel slide" id="dome1" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#dome1" data-bs-slide-to="1" class="active"></button>
            <button type="button" data-bs-target="#dome1" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#dome1" data-bs-slide-to="3"></button>
        </div>
        <div class="carousel-inner">
            <?php
                $i=1;
                while($read=mysqli_fetch_assoc($result)){
                    $name_pr=$read["name_pr"];
                    $detail_pr=$read["detail_pr"];
                    $tel_pr=$read["tel_pr"];
                    $pic_pr=$read["pic_pr"];
            ?>
            <div class="carousel-item <?php if($i==1){ echo "active"; } ?>">
                <div class="card-img-top"><?php echo "<img src='admin/pr/$pic_pr' class='d-block img-fluid w-100'>"; ?></div>
                <div class="card-body">
                    <div class="card-text"><h4><b><?php echo "$name_pr"; ?></b></h4></div><hr>
                    <div class="card-text"><h5><?php echo "$detail_pr"; ?></h5></div>
                    <div align="right"><span class="badge bg-success"><h6><b>Tel. <?php echo "$tel_pr"; ?></b></h6></span></div>
                </div>
            </div>
            <?php
                $i++;
                }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#dome1" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#dome1" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>