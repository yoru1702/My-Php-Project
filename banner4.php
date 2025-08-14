<?php
    $sql="select * from tb_pr where type_ques!='4' order by id_pr desc limit 0,3";
    $result=mysqli_query($conn,$sql);
?>
<div class="container">
    <?php
        $chk=1;
        while($read=mysqli_fetch_assoc($result)){
            $pic_pr=$read["pic_pr"];
            if($pic_pr==""){
                $pic_pr="no.jpg";
            }
            if($chk%3==1){
                echo "<div class='row'>";
            }
    ?>
    <div class="col-lg-4 col-sm-4 col-12">
        <div class="card" >
            <div class="card-img-top"><?php echo "<img src='admin/pr/$pic_pr' class='img-fluid rounded w-100'>"; ?></div>
        </div>
    </div>
    <?php
        if($chk%3==0){
            echo "</div><br>";
        }
        $chk++;
        }
    ?>
</div>