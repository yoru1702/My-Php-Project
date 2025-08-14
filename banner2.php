<?php
    $sql="select * from tb_product where type_ques='$type_ques' order by id_pro desc";
    $result=mysqli_query($conn,$sql);
?><br>
<div class="card" style="border-radius:20px">
    <div class="carousel slide" id="dome2" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#dome2" data-bs-slide-to="1" class="active"></button>
            <button type="button" data-bs-target="#dome2" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#dome2" data-bs-slide-to="3"></button>
        </div>
        <div class="carousel-inner">
            <?php
                $i=1;
                while($read=mysqli_fetch_assoc($result)){
                    $id_pro=$read["id_pro"];
                $name_pro=$read["name_pro"];
                $num_pro=$read["num_pro"];
                if($num_pro==0){
                    $np="<b class='text-danger'>สินค้าหมด</b>";
                }else{
                    $np="<b>คงเหลือ $num_pro ชิ้น</b>";
                }
                $type_ques=$read["type_ques"];
                if($type_ques==1){
                    $tp="สุขภาพ";
                }else if($type_ques==2){
                    $tp="เวชสำอาง";
                }else{
                    $tp="ทั่วไป";
                }
                $pic_pro=$read["pic_pro"];
                if($pic_pro==""){
                    $pic_pro="no.png";
                }
                $coin_pro=$read["coin_pro"];
                $price_pro=$read["price_pro"];
            ?>
            <div class="carousel-item <?php if($i==1){ echo "active"; } ?>">
            <?php if($_SESSION["valid_user"]=="" or $num_pro==0){ ?>
                <?php echo "<a class='btn_pro' id_pro='$id_pro' style='text-decoration:none;color:#000;'>"; ?>
                        <div class="card-img-top"><?php echo "<img src='admin/product/$pic_pro' class='rounded img-fluid w-100'>"; ?></div>
                        <div class="card-body">
                            <div class="card-text"><h4><b><?php echo "$name_pro"; ?></b></h4></div><hr>
                            <div class="card-text"><h5><?php echo "$np"; ?></h5></div>
                            <div class="card-text"><span class="badge bg-success"><h5><b>ราคา <?php echo "".number_format($price_pro).""; ?> บาท</b></h5></span></div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="card" style="border-radius:30px">
                                        <table>
                                            <center><img src="img/coin.png" width="25" class="img-fluid">&nbsp;&nbsp;&nbsp;แลก <?php echo "$coin_pro"; ?> แต้ม</center>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-4"><span class="badge bg-info"><h6><b><?php echo "$tp"; ?></b></h6></span></div>
                            </div>
                        </div>
                <?php echo "</a>"; ?>
        <?php }else if($_SESSION["valid_user"]!=""){ ?>
                <?php echo "<a class='btn_pro' id_pro='$id_pro' style='text-decoration:none;color:#000;'>"; ?>
                        <div class="card-img-top"><?php echo "<img src='admin/product/$pic_pro' class='rounded img-fluid w-100'>"; ?></div>
                        <div class="card-body">
                            <div class="card-text"><h4><b><?php echo "$name_pro"; ?></b></h4></div><hr>
                            <div class="card-text"><h5><?php echo "$np"; ?></h5></div>
                            <div class="card-text"><span class="badge bg-success"><h5><b>ราคา <?php echo "".number_format($price_pro).""; ?> บาท</b></h5></span></div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="card" style="border-radius:30px">
                                        <table>
                                            <center><img src="img/coin.png" width="25" class="img-fluid">&nbsp;&nbsp;&nbsp;แลก <?php echo "$coin_pro"; ?> แต้ม</center>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-4"><span class="badge bg-info"><h6><b><?php echo "$tp"; ?></b></h6></span></div>
                            </div><br>
                            <?php echo "<a class='btn btn_pro1 btn-outline-success w-100 btn-lg' id_pro='$id_pro' style='border-radius:30px'>สั่งซื้อสินค้า</a>"; ?>
                        </div>
                <?php echo "</a>"; ?>
        <?php } ?>
            </div>
            <?php
                $i++;
                }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#dome2" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#dome2" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>
<script>
    $(function(){
        $(".btn_pro").on('click',function(){
            $.ajax({
                url:"pro_detail.php",
                data:"id_pro="+$(this).attr("id_pro"),
                type:"POST",
                success:function(result){
                    $("#adm").html('');
                    $("#adm").html(result);
                    $("#am").modal('show');
                },
                error:function(error){
                    alert(error.responsetext);
                },
            });
        });
    });
    $(function(){
        $(".btn_pro1").on('click',function(){
            $.ajax({
                url:"pro_detail1.php",
                data:"id_pro="+$(this).attr("id_pro"),
                type:"POST",
                success:function(result){
                    $("#adm").html('');
                    $("#adm").html(result);
                    $("#am").modal('show');
                },
                error:function(error){
                    alert(error.responsetext);
                },
            });
        });
    });
</script>
<div class="modal fade" id="am" role="dialog">
    <div class="modal-dialog modal-xl" role="document" id="adm"></div>
</div>