<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_package,tb_user where tb_package.id_pack=tb_user.id_pack and tb_package.id_pack between '3' and '10' and status_pack='n'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-12 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-12"><br>
        <div class="container"><br>
            <center><h2><b>รายการสั่งซื้อแพ็คเกจ</b></h2></center><br><hr><br>
            <?php 
                if($num==0){
                    echo "<center><h2><b><font color='red'>ไม่พบข้อมูล</font></b></h2></center>";
                }else{
                    echo "<center><h2><b><font color='blue'>ข้อมูล $num รายการ</font></b></h2></center>";
            ?><br>
            <table class="table table-holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>แพ็คเกจ</th>
                    <th>ราคาแพ็คเกจ</th>
                    <th>อนุมัติ</th>
                </tr>
                <?php 
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_pack=$read["id_pack"];
                        $id_user=$read["id_user"];
                        $name_user=$read["name_user"];
                        $sname_user=$read["sname_user"];
                        $name_pack=$read["name_pack"];
                        $price_pack=$read["price_pack"];
                ?>
                <tr align="center">
                    <td><?php echo "$i";?></td>
                    <td><?php echo "$name_user $sname_user";?></td>
                    <td><?php echo "$name_pack";?></td>
                    <td><?php echo "".number_format($price_pack)." บาท";?></td>
                    <td><?php echo "<a class='btn btn-warning' href='pay_pack.php?id_user=$id_user' onclick=\"return confirm('ต้องการอนุมัติใช่หรือไม่')\">อนุมัติ</a>";?></td>
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
