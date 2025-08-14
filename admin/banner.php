<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_pr where type_ques='4' order by id_pr desc";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-12 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-12"><br>
        <div class="container"><br>
            <center><h2><b>จัดการป้ายประชาสัมพันธ์</b></h2></center><br>
            <a class="btn btn_add btn-primary">เพิ่มป้ายประชาสัมพันธ์</a><br><hr><br>
            <?php 
                if($num==0){
                    echo "<center><h2><b><font color='red'>ไม่พบข้อมูล</font></b></h2></center>";
                }else{
                    echo "<center><h2><b><font color='blue'>ข้อมูล $num รายการ</font></b></h2></center>";
            ?><br>
            <table class="table table-holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th width="60%">ป้ายประชาสัมพันธ์</th>
                    <th>ผู้ลงประชาสัมพันธ์</th>
                    <th>เบอร์โทร</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
                <?php 
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_pr=$read["id_pr"];
                        $name_pr=$read["name_pr"];
                        $tel_pr=$read["tel_pr"];
                        $pic_pr=$read["pic_pr"];
                        if($pic_pr==""){
                            $pic_pr="banner.png";
                        }
                ?>
                <tr align="center">
                    <td><?php echo "$i";?></td>
                    <td><?php echo "<img src='pr/$pic_pr' class='img-fluid' width='40%'>";?></td>
                    <td><?php echo "$name_pr";?></td>
                    <th class="text-success"><?php echo "".substr($tel_pr,0,3)."-".substr($tel_pr,3,7);?></th>
                    <td><?php echo "<a class='btn btn_edit btn-warning' id_pr='$id_pr'>แก้ไข</a>";?></td>
                    <td><?php echo "<a class='btn btn-danger' href='banner_del.php?id_pr=$id_pr&pic_pr=$pic_pr' onclick=\"return confirm('ต้องการลบข้อมูลใช่หรือไม่')\">ลบ</a>";?></td>
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
                url:"banner_add.php",
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
                url:"banner_edit.php",
                data:"id_pr="+$(this).attr("id_pr"),
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