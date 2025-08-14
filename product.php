<?php
    include "head.php";
    include "function_sum.php";
    if($_SESSION["valid_user"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $name=$_POST["name"];
    if($name==""){
        $sql="select * from tb_product order by id_pro desc";
    }else{
        $sql="select * from tb_product where name_pro like '%$name%' order by id_pro desc"; 
    }
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    $sql1="select * from tb_user where id_user='$_SESSION[valid_user]'";
    $result1=mysqli_query($conn,$sql1);
    $read1=mysqli_fetch_assoc($result1);
    $coin_user=$read1["coin_user"];
    if($coin_user>0){
        $c="<b class='text-success'>$coin_user แต้ม</b>";
    }else{
        $c="<b class='text-danger'>$coin_user แต้ม</b>";
    }
?>
<div class="bg"><br><br><br>
    <div class="container">
        <center><h2><b>สินค้า</b></h2></center><hr><br>
        <form action="product.php" name="form1" method="post">
            <div class="input-group">
                <span class="input-group-text">ค้นหา</span>
                <input type="text" class="form-control" name="name" id="name" placeholder="ค้นหา...." required>
                <button class="btn btn-lg btn-success" type="submit">ค้นหา</button>
            </div>
        </form><br>
        <?php
            if($num==0){
                echo "<br><br><br><br><center><h2><b class='text-danger'>ไม่พบสินค้า</b></h2></center><br><br><br><br>";
            }else{
                echo "<center><h4><b class='text-primary'>สินค้าจำนวน $num รายการ</b></h4></center>";
        ?>
        <?php
            $chk=1;
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
                if($chk%4==1){
                    echo "<div class='row'>";
                }
        ?>
        <?php if($_SESSION["valid_user"]=="" or $num_pro==0){ ?>
            <div class="col-lg-3 col-sm-3 col-12">
                <?php echo "<a class='btn_pro' id_pro='$id_pro' style='text-decoration:none;color:#000;'>"; ?>
                    <div class="card" style="border-radius:30px">
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
                    </div>
                <?php echo "</a>"; ?>
            </div>
        <?php }else if($_SESSION["valid_user"]!=""){ ?>
            <div class="col-lg-3 col-sm-3 col-12">
                <?php echo "<a class='btn_pro' id_pro='$id_pro' style='text-decoration:none;color:#000;'>"; ?>
                    <div class="card" style="border-radius:30px">
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
                    </div>
                <?php echo "</a>"; ?>
            </div>
        <?php } ?>
        <?php
            if($chk%4==0){
                echo "</div><br>";
            }
            $chk++;
            }
        ?>
        <?php } ?>
    </div><br><br>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>
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