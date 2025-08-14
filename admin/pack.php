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
        $sql="select * from tb_package where id_pack between '3' and '10' order by id_pack desc";
    }else{
        $sql="select * from tb_package where id_pack between '3' and '10' and name_user like '%$name%' order by id_pack desc";
    }
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-12 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-12"><br>
        <div class="container"><br>
            <center><h2><b>จัดการแพ็คเกจ</b></h2></center><br>
            <a class="btn btn_add btn-primary">เพิ่มแพ็คเกจ</a>
            <form action="pack.php" name="form1" method="post">
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
            ?><br>
            <table class="table table-holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>แพ็คเกจ</th>
                    <th>ราคาแพ็คเกจ</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
                <?php 
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_pack=$read["id_pack"];
                        $name_pack=$read["name_pack"];
                        $price_pack=$read["price_pack"];
                ?>
                <tr align="center">
                    <td><?php echo "$i";?></td>
                    <td><?php echo "$name_pack";?></td>
                    <td><?php echo "".number_format($price_pack)." บาท";?></td>
                    <td><?php echo "<a class='btn btn_edit btn-warning' id_pack='$id_pack'>แก้ไข</a>";?></td>
                    <td><?php echo "<a class='btn btn-danger' href='pack_del.php?id_pack=$id_pack' onclick=\"return confirm('ต้องการลบข้อมูลใช่หรือไม่')\">ลบ</a>";?></td>
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
                url:"pack_add.php",
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
                url:"pack_edit.php",
                data:"id_pack="+$(this).attr("id_pack"),
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
