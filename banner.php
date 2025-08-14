<?php
    $sql="select * from tb_pr where type_ques='4' order by id_pr desc";
    $result=mysqli_query($conn,$sql);
?>
<div class="carousel slide" id="dome" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#dome" data-bs-slide-to="1" class="active"></button>
        <button type="button" data-bs-target="#dome" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#dome" data-bs-slide-to="3"></button>
    </div>
    <div class="carousel-inner">
        <?php
            $i=1;
            while($read=mysqli_fetch_assoc($result)){
                $pic_pr=$read["pic_pr"];
        ?>
        <div class="carousel-item <?php if($i==1){ echo "active"; } ?>">
            <?php echo "<img src='admin/pr/$pic_pr' class='d-block img-fluid w-100'>"; ?>
        </div>
        <?php
            $i++;
            }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#dome" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#dome" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>