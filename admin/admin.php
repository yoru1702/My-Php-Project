<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $name=$_POST["name"];
    if($name==""){
        $sql="select * from tb_admin order by id_ad desc";
    }else{
        $sql="select * from tb_admin where name_ad like '%$name%' order by id_ad desc";
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
            <center><h2><b>ข้อมูลแอดมิน/แพทย์</b></h2></center><br>
            <a class="btn btn_add btn-primary">เพิ่มแอดมิน/แพทย์</a>
            <form action="admin.php" method="post">
                <div class="input-group">
                    <span class="input-group-text">ค้นหา</span>
                    <input type="text" name="name" id="name" class="form-control" placeholder="ค้นหา">
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </div>
            </form><br>
            <?php
                if($num==0){
                    echo "<center><h2><b><font color='red'>ไม่พบข้อมูล</font></b></h2></center>";
                }else{
                    echo "<center><h2><b><font color='blue'>ข้อมูล $num รายการ</font></b></h2></center>";
            ?>
            <table class="table table holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>เบอร์โทร</th>
                    <th>แพ็คเกจ</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_ad=$read["id_ad"];
                        $id_pack=$read["id_pack"];
                        $name_ad=$read["name_ad"];
                        $sname_ad=$read["sname_ad"];
                        $tel_ad=$read["tel_ad"];
                        $type_ad=$read["type_ad"];
                        $pic_ad=$read["pic_ad"];
                        if($pic_ad==""){
                            $pic_ad="admin.jpg";
                        }
                        $sql1="select * from tb_package where id_pack='$id_pack'";
                        $result1=mysqli_query($conn,$sql1);
                        $read1=mysqli_fetch_assoc($result1);
                        $name_pack=$read1["name_pack"];
                        if($type_ad==1){
                            $type_ad="Admin";
                        }else{
                            $type_ad="$name_pack";
                        }
                ?>
                <tr align="center">
                    <td><?php echo "$i";?></td>
                    <td><?php echo "<img src='admin/$pic_ad' class='rounded-pill' width='100'><br>$name_ad $sname_ad";?></td>
                    <td class="text-success"><?php echo "".substr($tel_ad,0,3)."-".substr($tel_ad,3,7)."";?></td>
                    <td><?php echo "$type_ad";?></td>
                    <td><?php echo "<a class='btn btn_edit btn-warning' id_ad='$id_ad'>แก้ไข</a>";?></td>
                    <td><?php echo "<a class='btn btn-danger' href='admin_del.php?id_ad=$id_ad&pic_ad=$pic_ad' onclick=\"return confirm('ต้องการลบช้อมู,ใช่หรือไม่')\">ลบ</a>";?></td>
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
                url:"admin_add.php",
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