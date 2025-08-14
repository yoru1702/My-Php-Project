<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_act order by id_act desc";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-12 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-12"><br>
        <div class="container"><br>
            <center><h2><b>จัดการกิจกรรมออนไลน์</b></h2></center><br>
            <a class="btn btn_add btn-primary">เพิ่มกิจกรรมออนไลน์</a><br><hr><br>
            <?php 
                if($num==0){
                    echo "<center><h2><b><font color='red'>ไม่พบข้อมูล</font></b></h2></center>";
                }else{
                    echo "<center><h2><b><font color='blue'>ข้อมูล $num รายการ</font></b></h2></center>";
            ?><br>
            <table class="table table-holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>หัวข้อกิจกรรม</th>
                    <th>วันที่เริ่ม</th>
                    <th>วันที่สิ้นสุด</th>
                    <th>สถานะ</th>
                    <th>เปิด/ปิดโหวต</th>
                    <th>รายละเอียด</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
                <?php 
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_act=$read["id_act"];
                        $name_act=$read["name_act"];
                        $status_act=$read["status_act"];
                        if($status_act=="n"){
                            $show="<b class='text-success'>กำลังโหวต</b>";
                        }else{
                            $show="<b class='text-danger'>กิจกรรมสิ้นสุด</b>";
                        }
                        $day_in=$read["day_in"];
                        if($day_in!=""){
                            $day_in=displaydate($day_in);
                        }
                        $day_out=$read["day_out"];
                        if($day_out!=""){
                            $day_out=displaydate($day_out);
                        }
                        $pic_act=$read["pic_act"];
                ?>
                <tr align="center">
                    <td><?php echo "$i";?></td>
                    <td><?php echo "$name_act";?></td>
                    <td><?php echo "$day_in";?></td>
                    <td><?php echo "$day_out";?></td>
                    <td><?php echo "$show";?></td>
                    <td>
                        <?php if($status_act=="n"){?>
                            <?php echo "<a class='btn btn-danger' href='act_y.php?id_act=$id_act' onclick=\"return confirm('ต้องการปิดโหวตใช่หรือไม่')\">ปิดโหวต</a>";?>
                        <?php }else{?>
                            <?php echo "<a class='btn btn-success' href='act_n.php?id_act=$id_act' onclick=\"return confirm('ต้องการเปิดโหวตใช่หรือไม่')\">เปิดโหวต</a>";?>
                        <?php }?>
                    </td>
                    <td>
                        <?php if($status_act=="n"){?>
                            <?php echo "<a class='btn btn_act btn-primary' id_act='$id_act'>รายละเอียด</a>";?>
                        <?php }else{?>
                            <?php echo "<a class='btn btn_act btn-primary' id_act='$id_act'>อนุมัติแต้ม</a>";?>
                        <?php }?>
                    </td>
                    <td><?php echo "<a class='btn btn_edit btn-warning' id_act='$id_act'>แก้ไข</a>";?></td>
                    <td><?php echo "<a class='btn btn-danger' href='act)del.php?id_act=$id_act&pic_act=$pic_act' onclick=\"return confirm('ต้องการลบข้อมูลใช่หรือไม่')\">ลบ</a>";?></td>
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
<?php include "footer.php";?>
<script>
    $(function(){
        $(".btn_add").on('click',function(){
            $.ajax({
                url:"act_add.php",
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
                url:"act_edit.php",
                data:"id_act="+$(this).attr("id_act"),
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
        $(".btn_act").on('click',function(){
            $.ajax({
                url:"act_detail.php",
                data:"id_act="+$(this).attr("id_act"),
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