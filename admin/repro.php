<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_order,tb_user where tb_order.id_user=tb_user.id_user and status_order='f'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-12 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-12">
        <div class="container"><br>
            <center><h2><b>รายงานรายได้จากการขายสินค้า</b></h2></center><br>
            <a class="btn btn-primary" href="repro2.php" targer="_blank">พิมพ์รายงาน</a><br><hr><br>
            <!-- <a class="btn btn-primary" href="repro2.php" onclick="window.print()">พิมพ์รายงาน</a><br><hr><br> -->
            <?php
                if($num==0){
                    echo "<center><h2><b><font color='red'>ไม่พบข้อมูล</font></b></h2></center>";
                }else{
                    echo "<center><h2><b><font color='blue'>ข้อมูล $num รายการ</font></b></h2></center>";
            ?>
            <table class="table table holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>หมายเลขจัดส่ง</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>วันที่สั่ง</th>
                    <th>สินค้า</th>
                    <th>ประเภท</th>
                    <th>รายได้</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_order=$read["id_order"];
                        $no_order=$read["no_order"];
                        $id_user=$read["id_user"];
                        $id_pro=$read["id_pro"];
                        $name_user=$read["name_user"];
                        $sname_user=$read["sname_user"];
                        $total_order=$read["total_order"];
                        $day_order=$read["day_order"];
                        if($day_order!=""){
                            $day_order=displaydate($day_order);
                        }
                        $sql1="select * from tb_product where id_pro='$id_pro'";
                        $result1=mysqli_query($conn,$sql1);
                        $read1=mysqli_fetch_assoc($result1);
                        $name_pro=$read1["name_pro"];
                        $type_ques=$read1["type_ques"];
                        if($type_ques==1){
                            $type_ques="สุขภาพ";
                        }else if($type_ques==2){
                            $type_ques="เวชสำอาง";
                        }else{
                            $type_ques="ทั่วไป";
                        }
                ?>
                <tr align="center">
                    <td><?php echo "$i";?></td>
                    <td><?php echo "<a class='btn btn_order' id_order='$id_order'>$no_order</a>";?></td>
                    <td><?php echo "$name_user $sname_user";?></td>
                    <td><?php echo "$day_order";?></td>
                    <td><?php echo "$name_pro";?></td>
                    <td><?php echo "$type_ques";?></td>
                    <td><?php echo "".number_format($total_order)." บาท";?></td>
                </tr>
                <?php 
                    $i++;
                    $net+=$total_order;
                    }
                ?>
                <tr align="center">
                    <th colspan="6"><h3>รวมรายได้จากการขายสินค้า</h3></th>
                    <th><h3><?php echo "".number_format($net)." บาท";?></h3></th>
                </tr>
            </table>
            <?php } ?>
        </div>
    </div>
</div>
<?php include "footer.php";?>
<script>
    $(function(){
        $(".btn_order").on('click',function(){
            $.ajax({
                url:"prodetail.php",
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