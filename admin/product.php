<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $type=$_POST["type"];
    if($type==""){
        $sql="select * from tb_product order by id_pro desc";
    }else{
        $sql="select * from tb_product where type_ques='$type' order by id_pro desc";
    }
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-12 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-12">
        <div class="container"><br>
            <center><h2><b>จัดการสินค้า</b></h2></center><br>
            <a class="btn btn_add btn-primary">เพิ่มสินค้า</a>
            <form action="product.php" method="post">
                <div class="input-group">
                    <span class="input-group-text">ค้นหา</span>
                    <select name="type" id="type" class="form-select" required>
                        <option value="">==เลือกประเภทสินค้า==</option>
                        <option value="1">สุขภาพ</option>
                        <option value="2">เวชสำอาง</option>
                        <option value="3">ทั่วไป</option>
                    </select>
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </div>
            </form><br>
            <?php
                if($num==0){
                    echo "<center><h2><b><font color='red'>ไม่พบข้อมูล</font></b></h2></center>";
                }else{
                    echo "<center><h2><b><font color='blue'>ข้อมูล $num รายการ</font></b></h2></center>";
            ?><br>
            <table class="table table holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>สินค้า</th>
                    <th>ราคาสินค้า</th>
                    <th>ประเภท</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_pro=$read["id_pro"];
                        $name_pro=$read["name_pro"];
                        $price_pro=$read["price_pro"];
                        $type_ques=$read["type_ques"];
                        $pic_pro=$read["pic_pro"];
                        if($pic_pro==""){
                            $pic_pro="no.png";
                        }
                        if($type_ques==1){
                            $type_ques="สุขภาพ";
                        }else if($type_ques){
                            $type_ques="เวชสำอาง";
                        }else{
                            $type_ques="ทั่วไป";
                        }
                ?>
                <tr align="center">
                    <td><?php echo "$i";?></td>
                    <td><?php echo "<img src='product/$pic_pro' class='rounded-pill' width='100'><br>$name_pro";?></td>
                    <td><?php echo "".number_format($price_pro)." บาท";?></td>
                    <td><?php echo "$type_ques";?></td>
                    <td><?php echo "<a class='btn btn_edit btn-warning' id_pro='$id_pro'>แก้ไข</a>";?></td>
                    <td><?php echo "<a class='btn btn-danger' href='product_del.php?id_pro=$id_pro&pic_pro=$pic_pro' onclick=\"return confirm('ต้องการลบช้อมูลใช่หรือไม่')\">ลบ</a>";?></td>
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
<script>
    $(function(){
        $(".btn_add").on('click',function(){
            $.ajax({
                url:"pro_add.php",
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
        $(".btn_edit").on('click',function(){
            $.ajax({
                url:"pro_edit.php",
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