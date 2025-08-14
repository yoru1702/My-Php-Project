<?php
    include "head.php";
    include "function_sum.php";
    if($_SESSION["valid_user"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_order where id_user='$_SESSION[valid_user]' order by id_order desc";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="bg"><br><br>
    <div class="container">
        <center><h2><b>ประวัติการสั่งซื้อ</b></h2></center><hr><br>
        <?php
            if($num==0){
                echo "<br><br><br><br><center><h2><b class='text-danger'>ยังไม่มีการสั่งซื้อสินค้า</b></h2></center><br><br><br><br>";
            }else{
        ?>
        <table class="table table-hover table-striped">
            <tr class="h5" align="center">
                <th>บริษัทจัดส่ง</th>
                <th>เลขที่จัดส่ง</th>
                <th>ชื่อสินค้า</th>
                <th>ราคา</th>
                <th>ราคาสุทธิ</th>
                <th>สถานะสินค้า</th>
                <th>รายละเอียด</th>
            </tr>
            <?php
                $i=1;
                while($read=mysqli_fetch_assoc($result)){
                    $id_order=$read["id_order"];
                    $id_user=$read["id_user"];
                    $id_pro=$read["id_pro"];
                    $total_order=$read["total_order"];
                    $exp=$read["exp"];
                    $no_order=$read["no_order"];
                    $status_order=$read["status_order"];
                    if($exp==0){
                        $ex="<b class='text-danger'>รอแอดมินอนุมัติ</b>";
                    }else if($exp==1){
                        $ex="<b class='text-warning'>Flash Express</b>";
                    }else{
                        $ex="<b class='text-warning'>Kerry Express</b>";
                    }
                    if($status_order=="n"){
                        $so="<b class='text-danger'>รอแอดมินอนุมัติ</b>";
                        $no="<b class='text-danger'>รอแอดมินอนุมัติ</b>";
                    }else if($status_order=="y"){
                        $so="<b class='text-primary'>กำลังจัดส่ง</b>";
                        $no="<b class='text-warning'>$no_order</b>";
                    }else{
                        $so="<b class='text-success'>รับสินค้าเรียบร้อยแล้ว</b>";
                        $no="<b class='text-warning'>$no_order</b>";
                    }
                    $sql1="select * from tb_product where id_pro='$id_pro'";
                    $result1=mysqli_query($conn,$sql1);
                    $read1=mysqli_fetch_assoc($result1);
                    $name_pro=$read1["name_pro"];
                    $price_pro=$read1["price_pro"];
            ?>
            <tr align="center">
                <td><?php echo "$ex"; ?></td>
                <td><?php echo "$no"; ?></td>
                <td><?php echo "$name_pro"; ?></td>
                <td><?php echo "".number_format($price_pro)." บาท"; ?></td>
                <td><?php echo "".number_format($total_order)." บาท"; ?></td>
                <td><?php echo "$so"; ?></td>
                <?php
                    if($status_order=="n"){
                        echo "<td><a class='btn btn_order btn-danger' id_order='$id_order'>รายละเอียด</a></td>";
                    }else if($status_order=="y"){
                        echo "<td><a class='btn btn_order btn-success' id_order='$id_order'>ยืนยันการรับสินค้า</a></td>";
                    }else{
                        echo "<td><a class='btn btn_order btn-primary' id_order='$id_order'>รายละเอียด</a></td>";
                    }
                ?>
                
            </tr>
            <?php
                $i++;
                }
            ?>
        </table><br><br><br><br><br><br><br>
        <?php } ?>
    </div><br><br>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>
<script>
    $(function(){
        $(".btn_order").on('click',function(){
            $.ajax({
                url:"pro_his1.php",
                data:"id_order="+$(this).attr("id_order"),
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